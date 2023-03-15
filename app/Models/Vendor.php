<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Vendor extends Model
{
    use HasFactory, HasTranslations;

    protected $table='vendors';

    protected $fillable = ['name', 'email', 'phone', 'password'];

    public $translatable = ['name'];

    public static function rules()
    {
        return [
            'email' => 'required|unique:vendors,email',
            'phone' => 'required|unique:vendors,phone',
            'password' => 'required',
        ];
    }

}
