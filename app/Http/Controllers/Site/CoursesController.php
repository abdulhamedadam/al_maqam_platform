<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Interfaces\BasicRepositoryInterface;
use App\Models\CourseMoney;
use App\Services\Admin\CoursesService;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function __construct(CoursesService $coursesService)
    {
        $this->coursesService=$coursesService;
    }
    /****************************************************/
    public function get_course_details($id,$money_id)
    {
        $data['course']=$this->coursesService->find($id);
        $data['money'] =CourseMoney::find($money_id);
      //  dd();
        return view('site.pages.course-details',$data);
    }
}
