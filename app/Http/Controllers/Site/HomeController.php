<?php

namespace App\Http\Controllers\Site;

use App\Enums\TeacherStatus;
use App\Http\Controllers\Controller;
use App\Interfaces\BasicRepositoryInterface;
use App\Models\Service;
use App\Models\User;
use App\Services\Admin\AboutUsService;
use App\Services\Admin\CoursesService;
use App\Services\Admin\SliderService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    /*******************************************************/
    public function index(SliderService $sliderService,AboutUsService $aboutUsService,CoursesService $coursesService)
    {
        $data['teachers'] = User::where('role', 'teacher')
                ->whereHas('teacher', function ($query) {
                    $query->where('status', TeacherStatus::Approved);
                })
                ->with(['teacher' => function ($query) {
                    $query->select('user_id', 'status', 'teaching_subjects');
                }])
                ->select('id', 'name', 'gender', 'country')
                ->limit(4)
                ->get();

        $data['sliders']  = $sliderService->getAllActiveSliders();
       // dd($data['sliders'][0]->description);
        $data['services'] = Service::select('id','name','description','icon','image')->get();
        $data['about_us'] = $aboutUsService->get_first_active();
        $data['courses']  = $coursesService->all_active();
     //  dd($data['courses']);
        return view('site.index' , $data);
    }
}
