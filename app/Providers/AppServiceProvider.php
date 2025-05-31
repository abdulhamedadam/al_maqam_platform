<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\StudentCourse;
use App\Notifications\AutoEndedLectureNotification;
use App\Notifications\EndLectureReminderNotification;
use App\Notifications\LectureReminderNotification;
use App\Notifications\LectureStartedNotification;
use App\Notifications\MissedLectureNotification;
use App\Notifications\StartLectureNotification;
use App\Notifications\TomorrowLectureNotification;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
        Lang::handleMissingKeysUsing(function ($key) {
            if (strpos($key, 'flasher') !== false) {
                return $key;
            }

            // Add custom logic to handle missing keys
            // For example, you can log the missing key
            Log::info("Missing translation key: $key");

            // You can also add the missing key to the language file dynamically
            $keyParts = explode('.', $key);
            if (count($keyParts) >= 2) {
                $group = $keyParts[0];
                $item = $keyParts[1];

                $langPath = base_path("lang/" . app()->getLocale() . "/$group.php");

                if (File::exists($langPath)) {
                    $translations = File::getRequire($langPath);
                    $translations[$item] = $item;
                    File::put($langPath, '<?php return ' . var_export($translations, true) . ';');
                } else {
                    File::put($langPath, '<?php return ' . var_export([$item => $item], true) . ';');
                }
            }

            // Return the key as the translation (optional)
            return $key;
        });

        if (Schema::hasTable('tbl_student_courses')) {
            $this->checkAndUpdateAppointmentsStatus();
        }
        // $this->app->booted(function () {
        //     $this->scheduleAppointmentChecks();
        // });
    }

    // protected function scheduleAppointmentChecks()
    // {
    //     // إنشاء عملية دورية كل 5 دقائق بدون كرون
    //     $this->app->make(\Illuminate\Console\Scheduling\Schedule::class)
    //         ->call(function () {
    //             $this->checkAndUpdateAppointmentsStatus();
    //         })
    //         ->name('check_appointments_status')
    //         ->everyFiveMinutes()
    //         ->withoutOverlapping(); //يمنع تنفيذ متعدد للمهمة في نفس الوقت
    // }

    protected function checkAndUpdateAppointmentsStatus()
    {
        $now = now();
        $today = Carbon::now()->format('l');
        $currentTime = Carbon::now();
        $todayDate = Carbon::now()->toDateString();
        $tomorrowDate = Carbon::now()->addDay()->toDateString();
        $eveningTime = Carbon::createFromTimeString('22:00:00');

        try {
            $todayAppointments = StudentCourse::where('status', 'scheduled')
                ->where('day', $today)
                ->get();

            foreach ($todayAppointments as $appointment) {
                $startTime = Carbon::parse($todayDate . ' ' . $appointment->start_time);
                $endTime = Carbon::parse($todayDate . ' ' . $appointment->end_time);

                // 30 minutes before lecture: Send reminder to teacher and student
                if ($currentTime->diffInMinutes($startTime, false) <= 30 &&
                    $currentTime->diffInMinutes($startTime, false) > 0 &&
                    !$appointment->notified_30_min) {

                    $this->sendReminderNotification($appointment, '30min');
                    $appointment->update(['notified_30_min' => true]);
                }

                // 10 minutes before lecture: Send reminder to teacher and student
                if ($currentTime->diffInMinutes($startTime, false) <= 10 &&
                    $currentTime->diffInMinutes($startTime, false) > 0 &&
                    !$appointment->notified_10_min) {

                    $this->sendReminderNotification($appointment, '10min');
                    $appointment->update(['notified_10_min' => true]);
                }

                // At lecture start time: Notify teacher to start lecture
                // Only notify if lecture is still in scheduled status (not started yet)
                if ($currentTime->greaterThanOrEqualTo($startTime) &&
                    $currentTime->lessThan($startTime->copy()->addMinutes(5)) &&
                    !$appointment->notified_start &&
                    $appointment->status === 'scheduled') {

                    $this->sendStartLectureNotification($appointment);
                    $appointment->update(['notified_start' => true]);
                }

                // If lecture time passed and status is still 'scheduled' (not started): Mark as missed
                if ($currentTime->greaterThan($endTime) &&
                    $appointment->status === 'scheduled' &&
                    !$appointment->notified_missed) {

                    $appointment->update([
                        'status' => 'missed',
                        'notified_missed' => true
                    ]);

                    $this->sendMissedLectureNotification($appointment);
                }

                // If lecture is in progress and 15 minutes past end time: Notify teacher to end
                if ($appointment->status === 'in_progress' &&
                    $currentTime->greaterThan($endTime->copy()->addMinutes(15)) &&
                    $currentTime->lessThan($endTime->copy()->addMinutes(60)) &&
                    !$appointment->notified_ended) {

                    $this->sendEndLectureReminderNotification($appointment);
                }

                // If lecture is in progress and 1 hour past end time: Auto end lecture
                if ($appointment->status === 'in_progress' &&
                    $currentTime->greaterThan($endTime->copy()->addMinutes(60))) {

                    $appointment->update([
                        'status' => 'completed',
                        'notified_ended' => true
                    ]);

                    $this->sendAutoEndedLectureNotification($appointment);
                }
            }

            // Send notifications for tomorrow's lectures at 10 PM
            if ($currentTime->hour === 22 && $currentTime->minute >= 0 && $currentTime->minute < 5) {
                $this->sendTomorrowLecturesNotification();
            }

        } catch (\Exception $e) {
            Log::error('خطأ في التحقق من المحاضرات: ' . $e->getMessage());
        }
    }

    private function sendReminderNotification($appointment, $timeframe)
    {
        try {
            $teacher = $appointment->teacher;
            $student = $appointment->student;

            $message = '';
            if ($timeframe === '30min') {
                $message = "تذكير: لديك محاضرة ستبدأ بعد 30 دقيقة في الساعة " . Carbon::parse($appointment->start_time)->format('h:i A');
            } else {
                $message = "تذكير: لديك محاضرة ستبدأ بعد 10 دقائق في الساعة " . Carbon::parse($appointment->start_time)->format('h:i A');
            }

            if ($teacher) {
                $teacher->notify(new LectureReminderNotification($message, $appointment));
            }

            if ($student) {
                $student->notify(new LectureReminderNotification($message, $appointment));
            }

            Log::info("تم إرسال تذكير {$timeframe} للمحاضرة رقم: {$appointment->id}");
        } catch (\Exception $e) {
            Log::error("خطأ في إرسال تذكير المحاضرة: " . $e->getMessage());
        }
    }

    private function sendStartLectureNotification($appointment)
    {
        try {
            $teacher = $appointment->teacher;

            if ($teacher) {
                $message = "حان وقت بدء محاضرتك مع الطالب {$appointment->student->name}";
                $teacher->notify(new StartLectureNotification($message, $appointment));
            }

            Log::info("تم إرسال تنبيه بدء المحاضرة رقم: {$appointment->id}");
        } catch (\Exception $e) {
            Log::error("خطأ في إرسال تنبيه بدء المحاضرة: " . $e->getMessage());
        }
    }

    public function notifyLectureStarted($appointment)
    {
        try {
            $student = $appointment->student;

            if ($student) {
                $message = "المعلم {$appointment->teacher->name} قد بدأ المحاضرة";
                $student->notify(new LectureStartedNotification($message, $appointment));
            }

            Log::info("تم إعلام الطالب ببدء المحاضرة رقم: {$appointment->id}");
        } catch (\Exception $e) {
            Log::error("خطأ في إعلام الطالب ببدء المحاضرة: " . $e->getMessage());
        }
    }

    private function sendMissedLectureNotification($appointment)
    {
        try {
            $teacher = $appointment->teacher;
            $student = $appointment->student;
            $admins = $this->getAdmins();

            $message = "تم تعيين المحاضرة المقررة في الساعة " . Carbon::parse($appointment->start_time)->format('h:i A') . " كمحاضرة فائتة";

            if ($teacher) {
                $teacher->notify(new MissedLectureNotification($message, $appointment));
            }

            if ($student) {
                $student->notify(new MissedLectureNotification($message, $appointment));
            }

            foreach ($admins as $admin) {
                $admin->notify(new MissedLectureNotification($message, $appointment));
            }

            Log::info("تم إرسال إشعارات المحاضرة الفائتة رقم: {$appointment->id}");
        } catch (\Exception $e) {
            Log::error("خطأ في إرسال إشعار المحاضرة الفائتة: " . $e->getMessage());
        }
    }


    private function sendEndLectureReminderNotification($appointment)
    {
        try {
            $teacher = $appointment->teacher;

            if ($teacher) {
                $message = "انتهى وقت المحاضرة، يرجى إنهاء المحاضرة الآن";
                $teacher->notify(new EndLectureReminderNotification($message, $appointment));
            }

            Log::info("تم إرسال تذكير إنهاء المحاضرة رقم: {$appointment->id}");
        } catch (\Exception $e) {
            Log::error("خطأ في إرسال تذكير إنهاء المحاضرة: " . $e->getMessage());
        }
    }

    private function sendAutoEndedLectureNotification($appointment)
    {
        try {
            $teacher = $appointment->teacher;
            $student = $appointment->student;
            $admins = $this->getAdmins();

            $message = "تم إنهاء المحاضرة تلقائياً لانتهاء وقتها بأكثر من ساعة";

            if ($teacher) {
                $teacher->notify(new AutoEndedLectureNotification($message, $appointment));
            }

            if ($student) {
                $student->notify(new AutoEndedLectureNotification($message, $appointment));
            }

            foreach ($admins as $admin) {
                $admin->notify(new AutoEndedLectureNotification($message, $appointment));
            }

            Log::info("تم إرسال إشعارات إنهاء المحاضرة تلقائياً رقم: {$appointment->id}");
        } catch (\Exception $e) {
            Log::error("خطأ في إرسال إشعار إنهاء المحاضرة تلقائياً: " . $e->getMessage());
        }
    }

    private function sendTomorrowLecturesNotification()
    {
        try {
            $tomorrow = Carbon::now()->addDay();
            $tomorrowDayName = $tomorrow->format('l');
            $tomorrowDate = $tomorrow->toDateString();

            $tomorrowLectures = StudentCourse::where('status', 'scheduled')
                ->where('day', $tomorrowDayName)
                ->get();

            foreach ($tomorrowLectures as $lecture) {
                $teacher = $lecture->teacher;
                $student = $lecture->student;

                $teacherMessage = "تذكير: لديك محاضرة غداً في الساعة " . Carbon::parse($lecture->start_time)->format('h:i A') . " مع الطالب {$student->name}";
                $studentMessage = "تذكير: لديك محاضرة غداً في الساعة " . Carbon::parse($lecture->start_time)->format('h:i A') . " مع المعلم {$teacher->name}";

                if ($teacher) {
                    $teacher->notify(new TomorrowLectureNotification($teacherMessage, $lecture));
                }

                if ($student) {
                    $student->notify(new TomorrowLectureNotification($studentMessage, $lecture));
                }
            }

            Log::info("تم إرسال إشعارات لعدد {$tomorrowLectures->count()} محاضرة مقررة غداً");
        } catch (\Exception $e) {
            Log::error("خطأ في إرسال إشعارات محاضرات الغد: " . $e->getMessage());
        }
    }

    private function getAdmins()
    {
        return Admin::all();
    }
}
