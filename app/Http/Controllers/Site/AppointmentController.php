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
        $role = auth('web')->user()->role;
        $userId = auth('web')->id();
        $data['appointments'] = $this->appointmentService->getTodaysAppointments($role, $userId);
        return view("site.pages.{$role}s.appointments", $data);
    }

    public function startLecture($id)
    {
        $result = $this->appointmentService->startLecture($id, auth('web')->id());
        return redirect()->back()->with($result);
    }

    public function endLecture(Request $request, $id)
    {
        // dd($request->all(), $id);
        $validatedData = $request->validate([
            'appointment_id' => 'required|exists:tbl_student_courses,id',
            'evaluation' => 'required|array',
            'evaluation.questions' => 'required|array',
            'evaluation.notes' => 'nullable|string',
        ]);
        // dd($validatedData);
        $result = $this->appointmentService->endLecture($id, auth('web')->id(), $request->input('evaluation'));
        return redirect()->back()->with($result);
    }

    // public function cancelAppointment(Request $request, $id)
    // {
    //     $request->validate([
    //         'reason' => 'required|string|min:5',
    //     ]);
    //     $result = $this->appointmentService->cancelAppointment($id, auth('web')->user());
    //     return redirect()->back()->with($result);
    // }

    public function cancelAppointment(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required|string|min:5|max:500'
        ]);

        $user = auth('web')->user();
        $userType = null;
        $userId = $user->id;

        if (auth('web')->user()->role == 'teacher') {
            $userType = 'teacher';
        } else {
            $userType = 'student';
        }

        $result = $this->appointmentService->cancelAppointment($id, $userId, $userType, $request->reason);

        if (isset($result['error'])) {
            return redirect()->back()->with('error', $result['error']);
        }

        return redirect()->back()->with('success', $result['success']);
    }
}
