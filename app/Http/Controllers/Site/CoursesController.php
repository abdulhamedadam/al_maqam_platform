<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Interfaces\BasicRepositoryInterface;
use App\Models\CourseMoney;
use App\Models\StudentCourse;
use App\Models\TeacherSchedule;
use App\Models\User;
use App\Services\Admin\CoursesService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    /****************************************************/

    public function getAvailableTeachers(Request $request)
    {
        $day = $request->day;
        $startTime = $request->start_time;
        $endTime = $request->end_time;
        // return response()->json(['schedules' => $request->all()]);
        $schedules = TeacherSchedule::where('day', $day)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereTime('start_time', '<=', $endTime)
                    ->whereTime('end_time', '>=', $startTime)
                    ->orWhereTime('end_time', '<', '05:00');
            })
            ->where('is_booked', 0)
            ->with('teacher')
            ->get();

        $teacherCoursesCount = StudentCourse::select('teacher_id')
            ->selectRaw('COUNT(*) as total_courses')
            ->groupBy('teacher_id')
            ->get()
            ->keyBy('teacher_id');

        $schedules->each(function ($schedule) use ($teacherCoursesCount) {
            $teacherId = $schedule->teacher->id;
            $schedule->teacher->total_enrolled = $teacherCoursesCount->has($teacherId) ? $teacherCoursesCount[$teacherId]->total_courses : 0;
        });

        // dd($teachers);
        return response()->json(['schedules' => $schedules]);
    }
    /****************************************************/

    public function store_pay_course(Request $request)
    {

        try {
            $request->validate([
                'day' => 'required|string',
                'start_time' => 'required',
                'end_time' => 'required',
                'course_id' => 'required|exists:courses,id',
                'teacher_id' => 'required|exists:users,id',
                'payment' => 'required|in:fawry,Aman,mastercard-visa,mobile_wallet,bank-transfer',
            ]);

            $data['student_id'] = auth()->id();
            $data['teacher_id'] = $request->teacher_id;
            $data['course_id'] = $request->course_id;
            $data['payment_method'] = $request->payment;
            $data['day'] = $request->day;
            $data['start_time'] = $request->start_time;
            $data['end_time'] = $request->end_time;
            $data['money_id'] = $request->money_id;
            // dd($data);
            $CoursePayment = $this->coursesService->storeCourse($data);

            return redirect()->route('user.enrolled_courses')->with('success', 'تم التسجيل في الكورس بنجاح!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
    /****************************************************/
    public function enrolledCourses()
    {
        try {
            $studentId = auth('web')->id();
            $data['enrolledCourses'] = $this->coursesService->getStudentCourses($studentId);
            // dd($data);
            return view('site.pages.students.courses', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'SomeThing went wrong');
        }
    }
    /****************************************************/
    public function assignedCourses()
    {
        try {
            $teacherId = auth()->id();
            $data['assignedCourses'] = $this->coursesService->getTeacherCourses($teacherId);
            return view('site.pages.teachers.courses', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'SomeThing went wrong');
        }
    }
}
