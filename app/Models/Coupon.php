<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Coupon extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['name', 'code', 'value', 'type', 'usage_limit', 'usage_limit_per_user', 'discount_limit', 'expire_date'];


}
