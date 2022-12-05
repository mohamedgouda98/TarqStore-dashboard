<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table='vendors';

    protected $fillable = ['name', 'email', 'phone', 'password'];

    public static function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:vendors,email',
            'phone' => 'required|unique:vendors,phone',
            'password' => 'required',
        ];
    }

}
