<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'url', 'position'];

    public function getImageAttribute($value){
        return env('AWS_URL').$value;
    }
}
