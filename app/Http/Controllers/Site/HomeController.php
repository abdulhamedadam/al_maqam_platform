<?php

namespace App\Http\Controllers\Site;

use App\Enums\TeacherStatus;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 'teacher')
                ->whereHas('teacher', function ($query) {
                    $query->where('status', TeacherStatus::Approved);
                })
                ->with(['teacher' => function ($query) {
                    $query->select('user_id', 'status', 'teaching_subjects');
                }])
                ->select('id', 'name', 'gender', 'country')
                ->limit(4)
                ->get();

        $services = Service::select('id','name','description','icon','image')->get();

        return view('site.index' , compact('teachers', 'services'));
    }
}
