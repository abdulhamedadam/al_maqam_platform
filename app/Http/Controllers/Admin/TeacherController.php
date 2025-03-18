<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TeacherStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Teachers\SaveRequest;
use App\Http\Requests\Admin\Teachers\UpdateRequest;
use App\Models\TeacherDetail;
use App\Models\User;
use App\Traits\ImageProcessing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller
{
    use ImageProcessing;

    protected $base_view = 'admin.pages.teachers.';

    public function index(Request $request)
    {
        $status = request()->status;
        if ($request->ajax()) {
            $teachers = User::where('role', 'teacher')
                ->whereHas('teacher', function ($query) use ($status) {
                    $query->where('status', $status);
                })
                ->with(['teacher' => function ($query) {
                    $query->select('user_id', 'status', 'id');
                }])
                ->select('id', 'name', 'email', 'phone', 'birthday', 'gender', 'country', 'state')
                ->get();

            return DataTables::of($teachers)
                ->editColumn('gender', function ($row) {
                    return $row->gender === 'm' ? 'Male' : ($row->gender === 'f' ? 'Female' : $row->gender);
                })
                ->addColumn('action', function ($row) {
                    $actions = '';

                    if ($row->teacher->status === TeacherStatus::Pending) {
                        $actions .= '
                            <div class="btn-group btn-group-sm">
                                <a href="' . route('admin.teachers.approve', $row->teacher->id) . '" class="btn btn-sm btn-success" title="' . trans('teachers.approve') . '" style="font-size: 16px;">
                                    <i class="bi bi-check-circle"></i>
                                </a>
                                <a href="' . route('admin.teachers.refuse', $row->teacher->id) . '" class="btn btn-sm btn-danger" title="' . trans('teachers.refuse') . '" style="font-size: 16px;">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            </div>
                        ';
                    } elseif ($row->teacher->status === TeacherStatus::Approved) {
                        $actions .= '
                            <div class="btn-group btn-group-sm">
                                <a href="' . route('admin.teachers.refuse', $row->teacher->id) . '" class="btn btn-sm btn-danger" title="' . trans('teachers.refuse') . '" style="font-size: 16px;">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            </div>
                        ';
                    } elseif ($row->teacher->status === TeacherStatus::Refused) {
                        $actions .= '
                            <div class="btn-group btn-group-sm">
                                <a href="' . route('admin.teachers.approve', $row->teacher->id) . '" class="btn btn-sm btn-success" title="' . trans('teachers.approve') . '" style="font-size: 16px;">
                                    <i class="bi bi-check-circle"></i>
                                </a>
                            </div>
                        ';
                    }

                    $actions .= '
                        <div class="btn-group btn-group-sm">
                            <a href="' . route('admin.teachers.show', $row->id) . '" class="btn btn-sm btn-success" title="' . trans('actions.details') . '" style="font-size: 16px;">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="' . route('admin.teachers.details', $row->id) . '" class="btn btn-sm btn-success" title="' . trans('actions.details') . '" style="font-size: 16px;">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="' . route('admin.teachers.edit', $row->id) . '" class="btn btn-sm btn-primary" title="' . trans('actions.edit') . '" style="font-size: 16px;">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button onclick="confirmDelete(' . $row->id . ')" class="btn btn-sm btn-danger" title="' . trans('actions.delete') . '" style="font-size: 16px;">
                                <i class="bi bi-trash3"></i>
                            </button>

                            <form id="delete-form-' . $row->id . '" action="' . route('admin.teachers.destroy', $row->id) . '" method="POST" style="display: none;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                            </form>
                        </div>
                    ';

                    return $actions;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view($this->base_view . 'index', compact('status'));
    }


    public function approve($id)
    {
        $teacher = TeacherDetail::findOrFail($id);
        $teacher->update(['status' => TeacherStatus::Approved]);

        return redirect()->back()->with('success', trans('teachers.approve_success'));
    }

    public function refuse($id)
    {
        $teacher = TeacherDetail::findOrFail($id);
        $teacher->update(['status' => TeacherStatus::Refused]);

        return redirect()->back()->with('success', trans('teachers.refuse_success'));
    }


    public function create()
    {
        return view($this->base_view . 'create');
    }


    public function store(SaveRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'teacher',
                'phone' => $request->phone,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'country' => $request->country,
                'state' => $request->state,
                'password' => Hash::make($request->password)
            ]);

            $audio = $request->audio;
            $audioPath = isset($audio) && $audio instanceof \Illuminate\Http\UploadedFile ? $this->saveFile($audio, 'user' . $user->id) : null;
            $cv = $request->cv;
            $cvPath = isset($cv) && $cv instanceof \Illuminate\Http\UploadedFile ? $this->saveFile($cv, 'user' . $user->id) : null;

            TeacherDetail::create([
                'user_id' => $user->id,
                'status' => TeacherStatus::Approved,
                'admission_terms' => json_encode($request->admission_terms),
                'education' => $request->education,
                'azhar' => $request->azhar,
                'quran_license' => $request->quran_license,
                'other_license' => $request->other_license,
                'other_license_details' => $request->other_license_details,
                'teaching_online' => $request->teaching_online,
                'communication_platforms' => json_encode($request->communication_platforms),
                'teaching_kids' => $request->teaching_kids,
                'teaching_subjects' => json_encode($request->teaching_subjects),
                'working_hours' => json_encode($request->working_hours),
                'other_working_hours' => $request->other_working_hours,
                'work_shifts' => json_encode($request->work_shifts),
                'fri_sat_work' => $request->fri_sat_work,
                'audio_recording' => $audioPath,
                'cv_summary' => $cvPath,
            ]);
            DB::commit();
            return redirect()->route('admin.teachers.index')->with('success', trans('teachers.store_success'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show(string $id)
    {
        $teacher = User::findOrFail($id);
        return view($this->base_view . 'show', compact('teacher'));
    }


    public function edit(string $id)
    {
        $teacher = User::findOrFail($id);
        return view($this->base_view . 'edit', compact('teacher'));
    }


    public function update(UpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'country' => $request->country,
                'state' => $request->state,
            ]);

            if ($request->filled('password')) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            $teacherDetail = $user->teacher;

            $teacherDetail->update([
                'admission_terms' => json_encode($request->admission_terms),
                'education' => $request->education,
                'azhar' => $request->azhar,
                'quran_license' => $request->quran_license,
                'other_license' => $request->other_license,
                'other_license_details' => $request->other_license === 'notherlicense' ? null : $request->other_license_details,
                'teaching_online' => $request->teaching_online,
                'communication_platforms' => json_encode($request->communication_platforms),
                'teaching_kids' => $request->teaching_kids,
                'teaching_subjects' => json_encode($request->teaching_subjects),
                'working_hours' => json_encode($request->working_hours),
                'other_working_hours' => $request->other_working_hours,
                'work_shifts' => json_encode($request->work_shifts),
                'fri_sat_work' => $request->fri_sat_work,
            ]);

            if ($request->hasFile('audio')) {
                if ($teacherDetail->audio_recording) {
                    $this->deleteFile($teacherDetail->audio_recording);
                }
                $audioPath = $this->saveFile($request->file('audio'), 'user' . $user->id);
                $teacherDetail->update([
                    'audio_recording' => $audioPath,
                ]);
            }

            if ($request->hasFile('cv')) {
                if ($teacherDetail->cv_summary) {
                    $this->deleteFile($teacherDetail->cv_summary);
                }
                $cvPath = $this->saveFile($request->file('cv'), 'user' . $user->id);
                $teacherDetail->update([
                    'cv_summary' => $cvPath,
                ]);
            }

            DB::commit();
            return redirect()->route('admin.teachers.index')->with('success', trans('teachers.update_success'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $teacherDetail = $user->teacher;
            if ($teacherDetail->audio_recording) {
                $this->deleteFile($teacherDetail->audio_recording);
            }
            if ($teacherDetail->cv_summary) {
                $this->deleteFile($teacherDetail->cv_summary);
            }
            $teacherDetail->delete();
            $user->delete();
            return redirect()->back()->with('success', trans('teachers.delete_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    private function deleteFile($filePath)
    {
        $fullPath = storage_path('app/files/') . $filePath;

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
    /**********************************************/
    public function details($id)
    {
        $data['all_data'] = User::with('teacher')->findOrFail($id);
        // dd($data);
        return view($this->base_view . 'overview.teacher_overview', $data);
    }
}
