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

    // public function index(Request $request)
    // {
    //     // Get the current week's start and end dates
    //     $date = $request->input('date') ? Carbon::parse($request->input('date')) : Carbon::now();
    //     $startOfWeek = $date->copy()->startOfWeek(Carbon::SATURDAY);
    //     $endOfWeek = $date->copy()->endOfWeek(Carbon::FRIDAY);

    //     $schedules = Schedule::whereBetween('date', [$startOfWeek->format('Y-m-d'), $endOfWeek->format('Y-m-d')])
    //         ->with('instructor')
    //         ->get()
    //         ->groupBy(function ($schedule) {
    //             return Carbon::parse($schedule->date)->format('Y-m-d');
    //         });

    //     // Prepare day names in Arabic
    //     $dayNames = [
    //         'السبت',
    //         'الأحد',
    //         'الإثنين',
    //         'الثلاثاء',
    //         'الأربعاء',
    //         'الخميس',
    //         'الجمعة',
    //     ];

    //     $dates = [];
    //     for ($i = 0; $i < 7; $i++) {
    //         $currentDate = $startOfWeek->copy()->addDays($i);
    //         $dates[$currentDate->format('Y-m-d')] = [
    //             'date' => $currentDate,
    //             'dayName' => $dayNames[$i],
    //             'schedules' => $schedules[$currentDate->format('Y-m-d')] ?? collect([])
    //         ];
    //     }

    //     return view($this->base_view.'index', [
    //         'dates' => $dates,
    //         'currentWeek' => $startOfWeek->format('Y-m-d') . ' to ' . $endOfWeek->format('Y-m-d'),
    //         'previousWeek' => $startOfWeek->copy()->subWeek()->format('Y-m-d'),
    //         'nextWeek' => $startOfWeek->copy()->addWeek()->format('Y-m-d'),
    //     ]);
    // }

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

}
