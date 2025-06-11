<?php


namespace App\Services\Admin;


use App\Repositories\Admin\EvaluationQuestionRepository;
use App\Traits\ImageProcessing;
use Illuminate\Support\Facades\DB;

class EvaluationQuestionService
{
    use ImageProcessing;

    protected $questionRepository;

    public function __construct(EvaluationQuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }
    /**************************************************/
    public function all()
    {
        return $this->questionRepository->all();
    }

    /**************************************************/
    public function find($id)
    {
        return $this->questionRepository->find($id);
    }
    /****************************************************/
    public function storeQuestion($data)
    {
        // try {
        //     $storeQuestion = $this->questionRepository->create($data);
        //     return $storeQuestion;
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'Something went wrong');
        // }
        DB::beginTransaction();

        try {
            foreach ($data as $questionData) {
                $this->questionRepository->create([
                    'type' => $questionData['type'],
                    'course_id' => $questionData['course_id'],
                    'question' => $questionData['question'],
                    'answer_type' => $questionData['answer_type'],
                    'is_required' => $questionData['is_required'] ?? 0,
                    'is_active' => $questionData['is_active'] ?? 0,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            throw $e;
        }
    }
    /****************************************************/
    public function updateQuestion($id, array $data)
    {
        try {
            return $this->questionRepository->update($id, $data);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
    /****************************************************/

    public function deleteQuestion($id)
    {
        return $this->questionRepository->delete($id);
    }
    /****************************************************/

    public function toggleQuestionStatus($id)
    {
        return $this->questionRepository->changeStatus($id);
    }
    /****************************************************/

    public function getQuestionsForEvaluation($courseId = null)
    {
        $generalQuestions = $this->questionRepository->getGeneralQuestions();
        $courseQuestions = $courseId ? $this->questionRepository->getCourseSpecificQuestions($courseId) : collect();

        // return [
        //     'general' => $generalQuestions,
        //     'course_specific' => $courseQuestions
        // ];
        $questions = $courseQuestions->merge($generalQuestions);
        return $questions;
    }
    /****************************************************/

}
