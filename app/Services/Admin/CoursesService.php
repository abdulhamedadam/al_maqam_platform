<?php


namespace App\Services\Admin;


use App\Repositories\Admin\AboutUsRepository;
use App\Repositories\Admin\CoursesRepository;
use App\Traits\ImageProcessing;

class CoursesService
{
    use ImageProcessing;

    protected $coursesRepository;

    public function __construct(CoursesRepository $coursesRepository)
    {
        $this->coursesRepository = $coursesRepository;
    }
    /**************************************************/
    public function all()
    {
        return $this->coursesRepository->all();
    }
    /**************************************************/
    public function all_active()
    {
        return $this->coursesRepository->all_active();
    }
    /**************************************************/
    public function find($id)
    {
        return $this->coursesRepository->find($id);
    }
    /****************************************************/
    public function storeCourse($data)
    {
        try {
            $storeCourse = $this->coursesRepository->storeCourse($data);
            return $storeCourse;
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    /****************************************************/
    public function getStudentCourses($studentId)
    {
        try {
            // dd('1111');
            return $this->coursesRepository->getStudentCourses($studentId);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    /****************************************************/
    public function getTeacherCourses($teacherId)
    {
        try {
            return $this->coursesRepository->getTeacherCourses($teacherId);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /****************************************************/
    public function getTeacherCoursesDash($teacherId)
    {
        try {
            return $this->coursesRepository->getTeacherCoursesDash($teacherId);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /****************************************************/
    public function getCourseStudentsDash($id)
    {
        try {
            return $this->coursesRepository->getCourseStudentsDash($id);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    
}
