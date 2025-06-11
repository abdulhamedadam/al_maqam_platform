<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class EvaluationQuestion extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    public $table = 'tbl_evaluation_questions';
    protected $guarded = [];
    public $translatable = ['question'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
