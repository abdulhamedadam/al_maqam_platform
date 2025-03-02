<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Courses\CourseRequest;
use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    protected $base_view = 'admin.pages.courses.';

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $courses = Course::latest()->get();

            return DataTables::of($courses)
                ->editColumn('name', function ($row) {
                    return $row->getTranslation('name', app()->getLocale());
                })
                ->editColumn('description', function ($row) {
                    return $row->getTranslation('description', app()->getLocale());
                })
                ->editColumn('section', function ($row) {
                    return $row->section->name;
                })
                ->editColumn('age', function ($row) {
                    return $row->min_age . ' - ' . $row->max_age;
                })
                ->editColumn('status', function ($row) {
                    $badgeClass = $row->status === 1 ? 'badge-success' : 'badge-danger';
                    $statusText = $row->status === 1 ? trans('courses.active') : trans('courses.inactive');

                    return '<span class="badge ' . $badgeClass . '">' . $statusText . '</span>';
                })
                ->editColumn('unique', function ($row) {
                    $icon = $row->unique == 1
                        ? '<i class="bi bi-check-circle text-success fs-4"></i>'
                        : '<i class="bi bi-dash-circle text-danger fs-4"></i>';

                    return $icon;
                })
                ->addColumn('action', function ($row) {
                    return '
                        <div class="btn-group btn-group-sm">
                            <a href="' . route('admin.courses.edit', $row->id) . '" class="btn btn-sm btn-primary" title="' . trans('actions.edit') . '" style="font-size: 16px;">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <button onclick="confirmDelete(' . $row->id . ')" class="btn btn-sm btn-danger" title="' . trans('actions.delete') . '" style="font-size: 16px;">
                                <i class="bi bi-trash3"></i>
                            </button>

                            <form id="delete-form-' . $row->id . '" action="' . route('admin.courses.destroy', $row->id) . '" method="POST" style="display: none;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                            </form>

                        </div>
                    ';
                })
                ->rawColumns(['status','unique','action'])
                ->make(true);
        }
        return view($this->base_view . 'index');
    }


    public function create()
    {
        $sections = Section::select('id','name')->get();
        return view($this->base_view . 'create' , compact('sections'));
    }


    public function store(CourseRequest $request)
    {
        try {
            Course::create($request->only(
                'name',
                'description',
                'seo_head_keyword',
                'seo_head_description',
                'min_age',
                'max_age',
                'status',
                'unique',
                'section_id'
            ));
            return redirect()->route('admin.courses.index')->with('success', trans('courses.store_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        $sections = Section::select('id','name')->get();
        return view($this->base_view . 'edit' , compact('course','sections'));
    }


    public function update(CourseRequest $request, string $id)
    {
        try {
            $course = Course::findOrFail($id);
            $course->update($request->only(
                'name',
                'description',
                'seo_head_keyword',
                'seo_head_description',
                'min_age',
                'max_age',
                'status',
                'unique',
                'section_id'
            ));
            return redirect()->route('admin.courses.index')->with('success', trans('courses.update_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(string $id)
    {
        try {
            Course::destroy($id);
            return redirect()->back()->with('success', trans('courses.delete_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
