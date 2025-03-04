<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'description', 'meta_title', 'meta_description', 'icon', 'image'];

    public $translatable = ['name', 'description', 'meta_title', 'meta_description'];
}
