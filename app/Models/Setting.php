<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'value', 'type'];

    protected function getValueAttribute($value)
    {
        if($this->type == 'file')
        {
            return env('APP_URL') . $value;
        }
        return $value;
    }
}
