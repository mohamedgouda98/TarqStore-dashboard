<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title', 'body', 'main_image', 'status', 'category_id', 'admin_id'];

    public $translatable = ['title', 'body'];
}
