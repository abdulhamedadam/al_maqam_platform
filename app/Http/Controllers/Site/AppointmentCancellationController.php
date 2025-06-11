<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\AppointmentCancellation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentCancellationController extends Controller
{
    public function index()
    {
        $user = Auth::guard('web')->user();
        $role = $user->role;

        if ($role === 'teacher') {
            $cancellations = AppointmentCancellation::where('cancelled_by_id', $user->id)
                ->where('cancelled_by_type', 'teacher')
                ->with(['appointment' => function($query) {
                    $query->with(['student', 'course']);
                }])
                ->latest()
                ->paginate(10);

            return view('site.pages.teachers.cancellations', compact('cancellations'));
        } else {
            $cancellations = AppointmentCancellation::where('cancelled_by_id', $user->id)
                ->where('cancelled_by_type', 'student')
                ->with(['appointment' => function($query) {
                    $query->with(['teacher', 'course']);
                }])
                ->latest()
                ->paginate(10);

            return view('site.pages.students.cancellations', compact('cancellations'));
        }
    }
}
