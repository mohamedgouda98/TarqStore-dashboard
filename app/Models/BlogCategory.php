<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BlogCategory extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name'];

    public $translatable = ['name'];

    public $translatableAttributes = ['name' => 'string'];


//    public function getImageAttribute($value)
//    {
//        return env('AWS_URL') . $value;
//    }

}
