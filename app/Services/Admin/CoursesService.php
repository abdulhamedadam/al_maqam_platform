<?php


namespace App\Services\Admin;


use App\Repositories\Admin\AboutUsRepository;
use App\Repositories\Admin\CoursesRepository;
use App\Traits\ImageProcessing;

class CoursesService
{
    use ImageProcessing;
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


}
