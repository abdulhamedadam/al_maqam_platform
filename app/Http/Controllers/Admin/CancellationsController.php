<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppointmentCancellation;
use Illuminate\Http\Request;

class CancellationsController extends Controller
{
    public function index()
    {
        $cancellations = AppointmentCancellation::with('appointment.teacher', 'appointment.student', 'appointment.course')
                        ->latest()
                        ->paginate(15);

        return view('admin.pages.cancellations.index', compact('cancellations'));
    }
}
