<?php

namespace App\Models;

use App\Enums\TeacherStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'status' => TeacherStatus::class,
    ];

    public const DEFAULT_STATUS = TeacherStatus::Pending;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
