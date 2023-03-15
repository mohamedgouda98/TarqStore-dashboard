<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\CouponInterface;
use App\Http\Services\LocalizationService;
use App\Models\Category;
use App\Models\Coupon;
use RealRashid\SweetAlert\Facades\Alert;

class CouponRepository implements CouponInterface
{
    private $couponModel;
    private $localizationService;

    public function __construct(Coupon $coupon, LocalizationService $localizationService)
    {
        $this->couponModel = $coupon;
        $this->localizationService = $localizationService;
    }


    public function index($couponDataTable)
    {
        return $couponDataTable->render('Coupon.index');
    }

    public function create()
    {
       return view('Coupon.create');
    }

    public function store($request)
    {
        $localizationList =  $this->localizationService::getLocalizationList($this->couponModel, $request);
        $this->couponModel::create(array_merge($localizationList,
        [
            'code' => $request->code,
            'value' => $request->value,
            'type' => $request->type,
            'usage_limit' => $request->usage_limit,
            'usage_limit_per_user' => $request->usage_limit_per_user,
            'discount_limit' => $request->discount_limit,
            'expire_date' => $request->expire_date
        ])
        );
        Alert::toast('Coupon Created');
        return redirect(route('admin.coupon.index'));
    }

    public function edit($id)
    {
        $coupon = $this->couponModel::find($id);
        return ($coupon) ? view('Coupon.edit', compact('coupon'))  : redirect(route('admin.coupon.index'));

    }

    public function update($request)
    {
        $coupon = $this->couponModel::findOrFail($request->id);
        $localizationList =  $this->localizationService::getLocalizationList($this->couponModel, $request);
        $coupon->update(array_merge($localizationList,
                [
                    'code' => $request->code,
                    'value' => $request->value,
                    'type' => $request->type,
                    'usage_limit' => $request->usage_limit,
                    'usage_limit_per_user' => $request->usage_limit_per_user,
                    'discount_limit' => $request->discount_limit,
                    'expire_date' => $request->expire_date
                ])
        );
        Alert::toast('Coupon Updated');
        return redirect(route('admin.coupon.index'));
    }

    public function delete($request)
    {
        $coupon = $this->couponModel::findOrFail($request->id);
        $coupon->delete();
        return 1;
    }
}
