<?php


namespace App\Repositories\Admin;


use App\Interfaces\Admin\CoursesInterface;
use App\Models\Course;
use App\Models\StudentCourse;

class CoursesRepository implements CoursesInterface
{
    public function all()
    {
        return Course::with(['courseMoneys'])->orderBy('id', 'desc')->get();
    }
    /***********************************************/
    public function all_active()
    {
        return Course::with(['courseMoneys'])->where('status', '1')->orderBy('id', 'desc')->get();
    }
    /***********************************************/
    public function find($id)
    {
        return Course::with(['courseMoneys'])->where('status', '1')->find($id);
    }
    /***********************************************/
    public function storeCourse(array $data)
    {
        return StudentCourse::create($data);
    }
    /***********************************************/
    public function getStudentCourses($studentId)
    {
        // dd('aaaa');
        return StudentCourse::where('student_id', $studentId)
            ->with('course', 'teacher', 'money')
            ->get();
    }
    /***********************************************/
    public function getTeacherCourses($teacherId)
    {
        return StudentCourse::where('teacher_id', $teacherId)
        ->with('course', 'student', 'money')
        ->get();
    }

    ////////////////////Dashboard///////////////////
    public function getTeacherCoursesDash($teacherId)
    {
        return StudentCourse::where('teacher_id', $teacherId)
        ->with('course')
        ->select('course_id')
        ->groupBy('course_id')
        ->get();
    }
    /***********************************************/
    public function getCourseStudentsDash($courseId)
    {
        return StudentCourse::where('course_id', $courseId)
        ->with('student')
        ->get();
    }

}
