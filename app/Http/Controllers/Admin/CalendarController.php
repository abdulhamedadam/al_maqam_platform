<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentCourse;
use App\Models\TeacherSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    protected $base_view = 'admin.pages.calendar.';

    public function index(Request $request)
    {
        $date = $request->input('date') ? Carbon::parse($request->input('date')) : Carbon::now();
        $startOfWeek = $date->copy()->startOfWeek(Carbon::SATURDAY);
        $endOfWeek = $date->copy()->endOfWeek(Carbon::FRIDAY);
        // dd($date, $startOfWeek, $endOfWeek);
        $arabicDays = [
            'Saturday' => 'السبت',
            'Sunday' => 'الأحد',
            'Monday' => 'الإثنين',
            'Tuesday' => 'الثلاثاء',
            'Wednesday' => 'الأربعاء',
            'Thursday' => 'الخميس',
            'Friday' => 'الجمعة',
        ];

        $studentCourses = StudentCourse::with(['teacher', 'student', 'course'])
            ->whereIn('day', array_keys($arabicDays))
            ->get()
            ->groupBy('day');

        $teacherSchedules = TeacherSchedule::with('teacher')
            ->whereIn('day', array_keys($arabicDays))
            ->where('is_booked', 0)
            ->get()
            ->groupBy('day');

        $weekDays = [];
        for ($i = 0; $i < 7; $i++) {
            $currentDate = $startOfWeek->copy()->addDays($i);
            $dayName = $currentDate->format('l');
            $arabicDayName = $arabicDays[$dayName];

            $weekDays[$dayName] = [
                'date' => $currentDate,
                'dayName' => $arabicDayName,
                'arabicDate' => $this->getArabicDate($currentDate),
                'booked_schedules' => $studentCourses[$dayName] ?? collect([]),
                'available_schedules' => $teacherSchedules[$dayName] ?? collect([])
            ];
        }
        // dd($weekDays);
        return view($this->base_view.'index', [
            'weekDays' => $weekDays,
            'currentWeek' => $startOfWeek->format('Y-m-d') . ' ' . trans('teachers.to') . ' ' . $endOfWeek->format('Y-m-d'),
            'previousWeek' => $startOfWeek->copy()->subWeek()->format('Y-m-d'),
            'nextWeek' => $startOfWeek->copy()->addWeek()->format('Y-m-d'),
        ]);
    }

    private function getArabicDate($date)
    {
        return $date->format('d') . ' ' . $date->translatedFormat('M');
    }

    public function siteCalendar(Request $request)
    {
        $date = $request->input('date') ? Carbon::parse($request->input('date')) : Carbon::now();
        $startOfWeek = $date->copy()->startOfWeek(Carbon::SATURDAY);
        $endOfWeek = $date->copy()->endOfWeek(Carbon::FRIDAY);

        $arabicDays = [
            'Saturday' => 'السبت',
            'Sunday' => 'الأحد',
            'Monday' => 'الإثنين',
            'Tuesday' => 'الثلاثاء',
            'Wednesday' => 'الأربعاء',
            'Thursday' => 'الخميس',
            'Friday' => 'الجمعة',
        ];

        $user = auth()->user();

        $studentCourses = collect([]);
        $teacherSchedules = collect([]);

        if ($user->role === 'student') {
            $studentCourses = StudentCourse::with(['teacher', 'student', 'course'])
                ->where('student_id', $user->id)
                ->whereIn('day', array_keys($arabicDays))
                ->get()
                ->groupBy('day');
        } elseif ($user->role === 'teacher') {
            $teacherCourses = StudentCourse::with(['teacher', 'student', 'course'])
                ->where('teacher_id', $user->id)
                ->whereIn('day', array_keys($arabicDays))
                ->get()
                ->groupBy('day');
        }

        $weekDays = [];
        for ($i = 0; $i < 7; $i++) {
            $currentDate = $startOfWeek->copy()->addDays($i);
            $dayName = $currentDate->format('l');
            $arabicDayName = $arabicDays[$dayName];

            $weekDays[$dayName] = [
                'date' => $currentDate,
                'dayName' => $arabicDayName,
                'arabicDate' => $this->getArabicDate($currentDate),
                'student_schedules' => $studentCourses[$dayName] ?? collect([]),
                'teacher_schedules' => $teacherCourses[$dayName] ?? collect([])
            ];
        }
        if ($user->role === 'student') {
            return view('site.pages.students.calendar', [
                'weekDays' => $weekDays,
                'currentWeek' => $startOfWeek->format('Y-m-d') . ' ' . trans('teachers.to') . ' ' . $endOfWeek->format('Y-m-d'),
                'previousWeek' => $startOfWeek->copy()->subWeek()->format('Y-m-d'),
                'nextWeek' => $startOfWeek->copy()->addWeek()->format('Y-m-d'),
            ]);
        } elseif ($user->role === 'teacher') {
            return view('site.pages.teachers.calendar', [
                'weekDays' => $weekDays,
                'currentWeek' => $startOfWeek->format('Y-m-d') . ' ' . trans('teachers.to') . ' ' . $endOfWeek->format('Y-m-d'),
                'previousWeek' => $startOfWeek->copy()->subWeek()->format('Y-m-d'),
                'nextWeek' => $startOfWeek->copy()->addWeek()->format('Y-m-d'),
            ]);

        }
    }


}
