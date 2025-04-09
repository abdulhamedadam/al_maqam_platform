<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\StudentCourse;
use App\Models\ZoomMeeting;
use App\Services\Site\AppointmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use MacsiDigital\Zoom\Facades\Zoom;

class AppointmentController extends Controller
{
    protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function todaysAppointments()
    {
        $role = auth()->user()->role;
        $userId = auth()->id();
        $data['appointments'] = $this->appointmentService->getTodaysAppointments($role, $userId);
        return view("site.pages.{$role}s.appointments", $data);
    }

    public function startLecture($id)
    {
        $result = $this->appointmentService->startLecture($id, auth()->id());
        return redirect()->back()->with($result);
    }

    public function endLecture($id)
    {
        $result = $this->appointmentService->endLecture($id, auth()->id());
        return redirect()->back()->with($result);
    }
}
