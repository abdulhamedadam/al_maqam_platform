<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMoney extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'course_id',
        'num_of_minutes',
        'lecture_price',
        'num_of_lectures',
        'lectures_in_week',
        'total_price',
        'for_group',
        'max_in_group',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
