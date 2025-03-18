<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Interfaces\BasicRepositoryInterface;
use App\Models\CourseMoney;
use App\Models\TeacherSchedule;
use App\Models\User;
use App\Services\Admin\CoursesService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    protected $coursesService;

    public function __construct(CoursesService $coursesService)
    {
        $this->coursesService = $coursesService;
    }
    /****************************************************/
    public function get_course_details($id, $money_id)
    {
        $data['course'] = $this->coursesService->find($id);
        $data['money'] = CourseMoney::find($money_id);
        //  dd();
        return view('site.pages.course-details', $data);
    }

    public function getAvailableTeachers(Request $request)
    {
        $day = $request->day;
        $startTime = $request->start_time;
        $endTime = $request->end_time;

        $schedules = TeacherSchedule::where('day', $day)
            ->whereTime('start_time', '<=', $startTime)
            ->whereTime('end_time', '>=', $endTime)
            ->where('is_booked', 0)
            ->with('teacher')
            ->get()
            ->map(function ($schedule) {
                $schedule->start_time = Carbon::parse($schedule->start_time)->format('h:i A');
                $schedule->end_time = Carbon::parse($schedule->end_time)->format('h:i A');
                $schedule->start_time = str_replace(['AM', 'PM'], ['ص', 'م'], $schedule->start_time);
                $schedule->end_time = str_replace(['AM', 'PM'], ['ص', 'م'], $schedule->end_time);

                return $schedule;
            });
        // dd($teachers);
        return response()->json(['schedules' => $schedules]);
    }
}
