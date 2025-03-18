<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSchedule extends Model
{
    use HasFactory;

    public $table = 'tbl_teacher_schedules';

    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
