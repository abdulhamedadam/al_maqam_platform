<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentCancellation extends Model
{
    use HasFactory;
    public $table = 'tbl_appointment_cancellations';

    protected $fillable = [
        'appointment_id',
        'cancelled_by_id',
        'cancelled_by_type',
        'reason'
    ];

    public function appointment()
    {
        return $this->belongsTo(StudentCourse::class, 'appointment_id');
    }
}
