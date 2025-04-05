<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomMeeting extends Model
{
    use HasFactory;

    public $table = 'tbl_zoom_meetings';

    protected $guarded = [];

    public function appointment()
    {
        return $this->belongsTo(StudentCourse::class, 'appointment_id');
    }
}
