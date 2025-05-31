<?php


namespace App\Repositories\Admin;


use App\Interfaces\Admin\EvaluationQuestionInterface;
use App\Models\EvaluationQuestion;

class EvaluationQuestionRepository implements EvaluationQuestionInterface
{
    protected $model;

    public function __construct(EvaluationQuestion $model)
    {
        $this->model = $model;
    }

    // ////////////////////Dashboard///////////////////
    public function all()
    {
        return $this->model->with('course')->latest()->get();
    }

    /***********************************************/

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /***********************************************/

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /***********************************************/

    public function update($id, array $data)
    {
        $question = $this->find($id);
        $question->update($data);
        return $question;
    }

    /***********************************************/

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    /***********************************************/

    public function changeStatus($id)
    {
        $question = $this->find($id);
        $question->update(['is_active' => !$question->is_active]);
        return $question;
    }

    /***********************************************/

    public function getCourseSpecificQuestions($courseId)
    {
        return $this->model->where('type', 'course_specific')
                        ->where('course_id', $courseId)
                        ->where('is_active', true)
                        ->get();
    }

    /***********************************************/

    public function getGeneralQuestions()
    {
        return $this->model->where('type', 'general')
                        ->where('is_active', true)
                        ->get();
    }

    /***********************************************/

}
