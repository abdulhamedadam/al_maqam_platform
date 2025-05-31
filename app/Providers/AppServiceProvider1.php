<?php

namespace App\Providers;

use App\Models\StudentCourse;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider1 extends ServiceProvider
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
            // $this->checkAndUpdateAppointments();
        }
    }
    public function checkAndUpdateAppointments1()
    {
        $now = now();
        // $today = Carbon::now()->format('l');
        $today = 'Saturday';

        $appointments = StudentCourse::where('status', 'scheduled')
            ->where('day', $today)
            ->get();

        foreach ($appointments as $appointment) {
            $startTime = Carbon::parse($appointment->start_time);
            $endTime = Carbon::parse($appointment->end_time);

            if ($now->greaterThan($endTime) && $now->greaterThan($startTime)) {
                $appointment->update(['status' => 'missed']);
            }
        }
    }

    protected function checkAppointmentReminders()
    {
        $now = now();
        $today = now()->format('l');

        $appointments = StudentCourse::with(['teacher', 'student', 'course'])
            ->where('status', 'scheduled')
            ->where('day', $today)
            ->where(function($query) use ($now) {
                $query->whereBetween('start_time', [
                    $now->copy()->addMinutes(30)->format('H:i:s'),
                    $now->copy()->addMinutes(31)->format('H:i:s')
                ])
                ->orWhereBetween('start_time', [
                    $now->copy()->addMinutes(10)->format('H:i:s'),
                    $now->copy()->addMinutes(11)->format('H:i:s')
                ]);
            })
            ->get();

        foreach ($appointments as $appointment) {
            $startTime = Carbon::parse($appointment->start_time);

            // إرسال تنبيه قبل 30 دقيقة
            if ($now->diffInMinutes($startTime) == 30 && !$appointment->notified_30_min) {
                $this->sendPreLectureNotification($appointment, '30_min');
                $appointment->update(['notified_30_min' => true]);
            }

            // إرسال تنبيه قبل 10 دقائق
            if ($now->diffInMinutes($startTime) == 10 && !$appointment->notified_10_min) {
                $this->sendPreLectureNotification($appointment, '10_min');
                $appointment->update(['notified_10_min' => true]);
            }
        }
    }

    public function checkAndUpdateAppointments()
    {
        $now = now();
        $today = now()->format('l');

        $appointments = StudentCourse::with(['teacher', 'student', 'course', 'zoomMeeting'])
            ->whereIn('status', ['scheduled', 'in_progress'])
            ->where('day', $today)
            ->get();

        foreach ($appointments as $appointment) {
            $startTime = Carbon::parse($appointment->start_time);
            $endTime = Carbon::parse($appointment->end_time);

            // الحالة 1: بدء وقت المحاضرة
            if ($appointment->status === 'scheduled' && $now->between($startTime, $endTime) && !$appointment->notified_start) {
                $this->handleLectureStart($appointment);
                $appointment->update(['notified_start' => true]);
            }

            // الحالة 2: المحاضرة لم تبدأ بعد 5 دقائق من وقت البدء
            if ($appointment->status === 'scheduled' && $now->greaterThan($startTime->copy()->addMinutes(5))) {
                $this->sendLectureNotStartedNotification($appointment);
            }

            // الحالة 3: المحاضرة فائتة (لم تبدأ وانتهى وقتها)
            if ($appointment->status === 'scheduled' && $now->greaterThan($endTime) && !$appointment->notified_missed) {
                $this->handleMissedLecture($appointment);
                $appointment->update(['notified_missed' => true]);
            }

            // الحالة 4: تذكير للمعلم بعد انتهاء الوقت بربع ساعة
            if ($appointment->status === 'in_progress' && $now->greaterThan($endTime) && $now->lessThan($endTime->copy()->addMinutes(15))) {
                $this->sendLectureEndReminder($appointment);
            }

            // الحالة 5: انتهاء المحاضرة تلقائياً بعد ساعة
            if ($appointment->status === 'in_progress' && $now->greaterThan($endTime->copy()->addHour()) && !$appointment->notified_ended) {
                $this->handleAutoEndLecture($appointment);
                $appointment->update(['notified_ended' => true]);
            }
        }
    }

    protected function checkTomorrowLectures()
    {
        if (now()->format('H:i') === '20:00') {
            $tomorrow = now()->addDay()->format('l');

            $appointments = StudentCourse::with(['teacher', 'student', 'course'])
                ->where('status', 'scheduled')
                ->where('day', $tomorrow)
                ->get();

            foreach ($appointments as $appointment) {
                $this->sendTomorrowLectureReminder($appointment);
            }
        }
    }

    /*************************************************************/
    protected function sendPreLectureNotification($appointment, $type)
    {
        $minutes = $type === '30_min' ? '30' : '10';
        $message = "تذكير: المحاضرة ستبدأ بعد $minutes دقيقة";

        $appointment->teacher->notify(new LectureNotification($appointment, "lecture_reminder_$minutes", $message));
        $appointment->student->notify(new LectureNotification($appointment, "lecture_reminder_$minutes", $message));
    }

    protected function handleLectureStart($appointment)
    {
        $message = 'حان وقت بدء المحاضرة! يرجى البدء الآن';

        // إرسال للمعلم لبدء المحاضرة
        $appointment->teacher->notify(new LectureNotification($appointment, 'lecture_start_time', $message));

        // تحديث حالة المحاضرة عند البدء الفعلي
        if ($appointment->teacher_joined) {
            $appointment->update(['status' => 'in_progress']);
            $this->sendLectureStartedNotification($appointment);
        }
    }

    protected function sendLectureStartedNotification($appointment)
    {
        $message = 'تم بدء المحاضرة، يرجى الانضمام الآن';
        $appointment->student->notify(new LectureNotification($appointment, 'lecture_started', $message));
    }

    protected function sendLectureNotStartedNotification($appointment)
    {
        $message = 'لم يتم بدء المحاضرة بعد مرور 5 دقائق على وقت البدء';
        $appointment->teacher->notify(new LectureNotification($appointment, 'lecture_not_started', $message));

        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new LectureNotification($appointment, 'lecture_not_started', $message));
    }

    protected function handleMissedLecture($appointment)
    {
        $appointment->update(['status' => 'missed']);

        $message = 'تم تغيير حالة المحاضرة إلى "فائتة" لأنها لم تبدأ';
        $appointment->teacher->notify(new LectureNotification($appointment, 'lecture_missed', $message));
        $appointment->student->notify(new LectureNotification($appointment, 'lecture_missed', $message));

        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new LectureNotification($appointment, 'lecture_missed', $message));
    }

    protected function sendLectureEndReminder($appointment)
    {
        $message = 'انتهى وقت المحاضرة، يرجى إنهاء المحاضرة';
        $appointment->teacher->notify(new LectureNotification($appointment, 'lecture_end_reminder', $message));
    }

    protected function handleAutoEndLecture($appointment)
    {
        $appointment->update(['status' => 'ended']);

        $message = 'تم إنهاء المحاضرة تلقائياً لأن الوقت انتهى';
        $appointment->teacher->notify(new LectureNotification($appointment, 'lecture_auto_ended', $message));
        $appointment->student->notify(new LectureNotification($appointment, 'lecture_auto_ended', $message));

        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new LectureNotification($appointment, 'lecture_auto_ended', $message));

        $this->updateTeacherAccount($appointment);
    }

    protected function sendTomorrowLectureReminder($appointment)
    {
        $startTime = Carbon::parse($appointment->start_time);
        $message = 'تذكير: لديك محاضرة غداً في تمام الساعة ' . $startTime->format('H:i');

        $appointment->teacher->notify(new LectureNotification($appointment, 'tomorrow_lecture_reminder', $message));
        $appointment->student->notify(new LectureNotification($appointment, 'tomorrow_lecture_reminder', $message));
    }

    protected function updateTeacherAccount($appointment)
    {
        $duration = Carbon::parse($appointment->start_time)->diffInHours($appointment->end_time);

        $teacherAccount = $appointment->teacher->account;
        $teacherAccount->total_hours += $duration;
        $teacherAccount->total_earnings += ($duration * $teacherAccount->hourly_rate);
        $teacherAccount->save();
    }

}
