<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Students\SaveRequest;
use App\Http\Requests\Admin\Students\UpdateRequest;
use App\Models\User;
use App\Services\Admin\CoursesService;
use App\Services\Admin\StudentService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    protected $studentService;
    protected $coursesService;
    protected $base_view = 'admin.pages.students.';

    public function __construct(StudentService $studentService, CoursesService $coursesService,)
    {
        $this->studentService = $studentService;
        $this->coursesService = $coursesService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $students = $this->studentService->listStudents();

            return DataTables::of($students)
                ->editColumn('gender', function ($row) {
                    return $row->gender === 'm' ? 'Male' : ($row->gender === 'f' ? 'Female' : $row->gender);
                })
                ->addColumn('action', function ($row) {
                    return '
                        <div class="btn-group btn-group-sm">
                            <a href="' . route('admin.students.edit', $row->id) . '" class="btn btn-sm btn-primary" title="' . trans('actions.edit') . '" style="font-size: 16px;">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <button onclick="confirmDelete(' . $row->id . ')" class="btn btn-sm btn-danger" title="' . trans('actions.delete') . '" style="font-size: 16px;">
                                <i class="bi bi-trash3"></i>
                            </button>

                            <form id="delete-form-' . $row->id . '" action="' . route('admin.students.destroy', $row->id) . '" method="POST" style="display: none;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                            </form>

                            <a href="' . route('admin.students.details', $row->id) . '" class="btn btn-sm btn-success" title="' . trans('actions.details') . '" style="font-size: 16px;">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view($this->base_view . 'index');
    }

    public function create()
    {
        return view($this->base_view . 'create');
    }

    public function store(SaveRequest $request)
    {
        try {
            $data = $request->validated();
            unset($data['password_confirmation']);
            $this->studentService->storeStudent($data);
            return redirect()->route('admin.students.index')->with('success', trans('students.store_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(string $id)
    {
        $student = $this->studentService->getStudent($id);
        return view($this->base_view . 'edit', compact('student'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        try {
            $data = $request->validated();
            unset($data['password_confirmation']);
            $this->studentService->updateStudent($id, $data);
            return redirect()->route('admin.students.index')->with('success', trans('students.update_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->studentService->deleteStudent($id);
            return redirect()->back()->with('success', trans('students.delete_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**********************************************/
    public function details($id)
    {
        $data['all_data'] = User::with('teacher')->findOrFail($id);

        $data['courses_count'] = $this->coursesService->getStudentsCoursesDash($id)->count();

        // dd($data);
        return view($this->base_view . 'details', $data);
    }
    /**********************************************/
    public function courses($id){
        $data['all_data'] = User::with('teacher')->findOrFail($id);

        $data['courses_count'] = $this->coursesService->getStudentsCoursesDash($id)->count();

        $data['courses_data'] = $this->coursesService->getStudentsCoursesDash($id);
        // dd($data);
        return view($this->base_view . 'courses.student_courses', $data);
    }
    /**********************************************/
    public function getTeachers($courseId, $moneyId){
        $teachers = $this->coursesService->getCourseStudentsDash($courseId, $moneyId);
        return response()->json($teachers);
    }
}
