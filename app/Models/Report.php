<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'imei1', 'imei2', 'phone_name', 'phone_color', 'contact_number', 'governorate', 'city', 'found'
    ];
}
