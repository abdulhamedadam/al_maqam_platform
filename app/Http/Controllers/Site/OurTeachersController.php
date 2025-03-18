<?php

namespace App\Http\Controllers\Site;

use App\Enums\TeacherStatus;
use App\Http\Controllers\Controller;
use App\Models\TeacherSchedule;
use App\Models\User;
use Illuminate\Http\Request;

class OurTeachersController extends Controller
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
            ->get();
        return view('site.pages.our-teachers', compact('teachers'));
    }

    public function schedule()
    {
        $data['schedules'] = TeacherSchedule::where('teacher_id', auth('web')->id())->get();

        return view('site.pages.teachers.schedule', $data);
    }
    public function store_schedule(Request $request)
    {
        $request->validate([
            'day' => 'required|in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'note' => 'nullable|string|max:255',
        ]);
        try {
            $teacher = auth('web')->user();
            $isOverlap = TeacherSchedule::where('teacher_id', $teacher->id)
                ->where('day', $request->day)
                ->where(function ($query) use ($request) {
                    $query->where(function ($q) use ($request) {
                        $q->where('start_time', '<', $request->end_time)
                            ->where('end_time', '>', $request->start_time);
                    });
                })
                ->exists();

            if ($isOverlap) {
                return redirect()->back()->with('error', trans('messages.time_overlap_error'));
            }

            $data['teacher_id'] = $teacher->id;
            $data['day'] = $request->day;
            $data['start_time'] = $request->start_time;
            $data['end_time'] = $request->end_time;
            $data['note'] = $request->note;
            // dd($data);
            TeacherSchedule::create($data);

            return redirect()->back()->with('success', trans('messages.schedule_added_successfully'));
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', trans('messages.something_went_wrong'));
        }
    }

    public function delete_schedule($id)
    {
        try {
            $schedule = TeacherSchedule::findOrFail($id);

            if ($schedule->teacher_id != auth('web')->id()) {
                return redirect()->back()->with('error', trans('messages.unauthorized'));
            }

            $schedule->delete();

            return redirect()->back()->with('success', trans('messages.schedule_deleted_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('messages.something_went_wrong'));
        }
    }

    public function profile()
    {
        return view('site.pages.teachers.profile');
    }
}
