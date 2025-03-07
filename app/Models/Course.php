<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Course extends Model
{
    use HasFactory, HasTranslations;
    protected $guarded=[];
    protected $table='courses';


    public $translatable = ['name', 'description', 'seo_head_keyword', 'seo_head_description'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function courseMoneys()
    {
        return $this->hasMany(CourseMoney::class);
    }
}
