<?php

namespace App\Http\Requests\Blog;

use App\Http\Services\LocalizationService;
use App\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
        return array_merge(
            LocalizationService::getLocalizationValidation((new Blog)->translatableAttributes),
            [
                'blog_category_id' => 'required|exists:blog_categories,id',
                'status' => 'required',
                'id' => 'required|exists:blogs,id'
            ]
        );
    }
}
