<?php

namespace App\Http\Requests\Vendors;

use App\Http\Services\LocalizationService;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class VendorUpdateRequest extends FormRequest
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
        $localization =  LocalizationService::getLocalizationValidation((new Vendor())->translatable);

        return array_merge([
            'email' => 'required|unique:vendors,email,' . $this->id,
            'phone' => 'required|unique:vendors,phone,' . $this->id,
        ], $localization);
    }
}
