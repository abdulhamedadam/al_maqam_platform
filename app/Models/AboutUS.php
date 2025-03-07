<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutUS extends Model
{
    use HasFactory,HasTranslations;
    protected $table='about_us';
    protected $guarded=[];
    public $translatable = ['title', 'description','notes','our_mission','meta_title','meta_description','meta_keywords','our_experience','our_vision'];
}
