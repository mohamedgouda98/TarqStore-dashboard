<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'body', 'image', 'price'];

    public $translatable = ['name','body'];

    public $translatableAttributes = ['name' => 'string', 'body' => 'text'];

    public function productAttributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }
}
