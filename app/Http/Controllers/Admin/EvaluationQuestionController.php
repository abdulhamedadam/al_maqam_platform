<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\CoursesService;
use App\Services\Admin\EvaluationQuestionService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EvaluationQuestionController extends Controller
{
    protected $questionService;
    protected $coursesService;
    protected $base_view = 'admin.pages.evaluation_questions.';

    public function __construct(EvaluationQuestionService $questionService, CoursesService $coursesService)
    {
        $this->questionService = $questionService;
        $this->coursesService = $coursesService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $questions = $this->questionService->all();

            return DataTables::of($questions)
                ->editColumn('question', function ($row) {
                    return $row->getTranslation('question', app()->getLocale());
                })
                ->editColumn('type', function ($row) {
                    return $row->type === 'general'
                        ? '<span class="badge bg-info">عام</span>'
                        : '<span class="badge bg-success">خاص بالمادة</span>';
                })
                ->editColumn('answer_type', function ($row) {
                    switch ($row->answer_type) {
                        case 'text':
                            return '<span class="badge bg-primary">نصي</span>';
                        case 'rating_5':
                            return '<span class="badge bg-warning">تقييم من 5</span>';
                        case 'rating_10':
                            return '<span class="badge bg-danger">تقييم من 10</span>';
                        default:
                            return '<span class="badge bg-secondary">غير معروف</span>';
                    }
                })
                ->editColumn('is_required', function ($row) {
                    return $row->is_required
                        ? '<span class="badge bg-danger">نعم</span>'
                        : '<span class="badge bg-secondary">لا</span>';
                })
                ->editColumn('is_active', function ($row) {
                    return $row->is_active
                        ? '<span class="badge bg-success">نشط</span>'
                        : '<span class="badge bg-warning">غير نشط</span>';
                })
                ->addColumn('course_name', function ($row) {
                    return $row->course?->name ?? '-';
                })
                ->addColumn('action', function ($row) {
                    return '
                        <div class="btn-group btn-group-sm">
                            <a href="' . route('admin.evaluation_questions.edit', $row->id) . '"
                                class="btn btn-sm btn-primary"
                                title="' . trans('actions.edit') . '"
                                style="font-size: 16px;">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <button onclick="confirmDelete(' . $row->id . ')"
                                    class="btn btn-sm btn-danger"
                                    title="' . trans('actions.delete') . '"
                                    style="font-size: 16px;">
                                <i class="bi bi-trash3"></i>
                            </button>

                            <form id="delete-form-' . $row->id . '"
                                action="' . route('admin.evaluation_questions.destroy', $row->id) . '"
                                method="POST"
                                style="display: none;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                            </form>

                            <button onclick="toggleStatus(' . $row->id . ')"
                                    class="btn btn-sm ' . ($row->is_active ? 'btn-warning' : 'btn-success') . '"
                                    title="' . ($row->is_active ? 'تعطيل' : 'تفعيل') . '"
                                    style="font-size: 16px;">
                                <i class="bi ' . ($row->is_active ? 'bi-toggle-off' : 'bi-toggle-on') . '"></i>
                            </button>
                        </div>
                    ';
                })
                ->rawColumns(['type', 'is_required', 'is_active', 'action', 'answer_type'])
                ->make(true);
        }

        return view($this->base_view . 'index');
    }

    public function create()
    {
        $data['courses'] = $this->coursesService->all();
        return view($this->base_view . 'create', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'questions' => 'required|array|min:1',
            'questions.*.question' => 'required|array',
            'questions.*.question.en' => 'required|string|max:255',
            'questions.*.question.ar' => 'required|string|max:255',
            'questions.*.type' => 'required|in:general,course_specific',
            'questions.*.course_id' => 'nullable|exists:courses,id',
            'questions.*.answer_type' => 'required|in:text,rating_5,rating_10',
            'questions.*.is_required' => 'nullable|boolean',
            'questions.*.is_active' => 'nullable|boolean',
        ]);

        // dd($data, $data['questions']);

        try {
            $this->questionService->storeQuestion($data['questions']);

            return redirect()->route('admin.evaluation_questions.index')
                ->with('success', 'تم إضافة الأسئلة بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data['question'] = $this->questionService->find($id);
        $data['courses'] = $this->coursesService->all();
        return view($this->base_view . 'edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'question' => 'required|array',
            'question.en' => 'required|string|max:255',
            'question.ar' => 'required|string|max:255',
            'type' => 'required|in:general,course_specific',
            'course_id' => 'nullable|exists:courses,id',
            'answer_type' => 'required|in:text,rating_5,rating_10',
            'is_required' => 'boolean',
            'is_active' => 'boolean'
        ]);

        try {
            $this->questionService->updateQuestion($id, $data);

            return redirect()->route('admin.evaluation_questions.index')
                ->with('success', 'تم تحديث السؤال بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->questionService->deleteQuestion($id);
            return redirect()->route('admin.evaluation_questions.index')
                ->with('success', 'تم حذف السؤال بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function changeStatus(Request $request)
    {
        $this->questionService->toggleQuestionStatus($request->id);
        return response()->json(['status' => 'success']);
    }

    public function getEvaluationQuestions(Request $request)
    {
        $courseId = $request->input('course_id');

        $questions = $this->questionService->getQuestionsForEvaluation($courseId);
        // dd($questions);
        return response()->json($questions);
    }
}
