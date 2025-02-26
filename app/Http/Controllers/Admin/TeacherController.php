<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TeacherStatus;
use App\Http\Controllers\Controller;
use App\Models\TeacherDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller
{
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
                        <button onclick="confirmDelete(' . $row->id . ')" class="btn btn-sm btn-danger" title="' . trans('actions.delete') . '" style="font-size: 16px;">
                            <i class="bi bi-trash3"></i>
                        </button>

                        <form id="delete-form-' . $row->id . '" action="' . route('admin.teachers.destroy', $row->id) . '" method="POST" style="display: none;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                        </form>
                    ';

                    return $actions;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view($this->base_view . 'index');
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

    }


    public function store(Request $request)
    {

    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {

    }


    public function update(Request $request, string $id)
    {

    }


    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->teacher->delete();
            $user->delete();
            return redirect()->back()->with('success', trans('teachers.delete_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
