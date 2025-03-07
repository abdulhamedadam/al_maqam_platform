<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded=[];
    protected $table='slider';
    public $translatable = ['title', 'description','button_text','meta_title','meta_description','meta_keywords'];
}
