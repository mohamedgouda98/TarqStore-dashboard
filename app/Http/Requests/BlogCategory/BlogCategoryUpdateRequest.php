<?php

namespace App\Http\Requests\BlogCategory;

use App\Http\Services\LocalizationService;
use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryUpdateRequest extends FormRequest
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
        return LocalizationService::getLocalizationValidation((new BlogCategory)->translatableAttributes);
    }
}
