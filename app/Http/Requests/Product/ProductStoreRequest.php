<?php

namespace App\Http\Requests\Product;

use App\Http\Services\LocalizationService;
use App\Http\Services\ProductAttributeService;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $localization = LocalizationService::getLocalizationValidation((new Product)->translatableAttributes);
        $attributes = ProductAttributeService::getProductAttributesRules();
       return array_merge($localization,$attributes);
    }
}
