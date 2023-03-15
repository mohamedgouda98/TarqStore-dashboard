<?php

namespace App\Http\Requests\Coupon;

use App\Http\Services\LocalizationService;
use App\Models\Coupon;
use App\Rules\DateUpcoming;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class CouponUpdateRequest extends FormRequest
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
            LocalizationService::getLocalizationValidation((new Coupon)->translatable),
            [
                'code'=> 'required',
                'value'=> 'required',
                'type'=> 'required',
                'usage_limit'=> 'required',
                'usage_limit_per_user'=> 'required',
                'discount_limit'=> 'required',
                'expire_date' => ['required', new DateUpcoming()],
                'id'=> 'required|exists:coupons,id'
            ]
        );
    }
}
