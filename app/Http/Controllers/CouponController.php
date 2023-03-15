<?php

namespace App\Http\Controllers;

use App\DataTables\CouponDataTable;
use App\Http\Interfaces\CouponInterface;
use App\Http\Requests\Blog\DeleteBlogRequest;
use App\Http\Requests\Coupon\CouponCreatRequest;
use App\Http\Requests\Coupon\CouponDeleteRequest;
use App\Http\Requests\Coupon\CouponUpdateRequest;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public $couponInterface;

    public function __construct(CouponInterface $couponInterface)
    {
        $this->couponInterface = $couponInterface;
    }

    public function index(CouponDataTable $couponDataTable)
    {
        return $this->couponInterface->index($couponDataTable);
    }

    public function create()
    {
        return $this->couponInterface->create();
    }

    public function store(CouponCreatRequest $request)
    {
        return $this->couponInterface->store($request);
    }

    public function edit($id)
    {
        return $this->couponInterface->edit($id);
    }

    public function update(CouponUpdateRequest $request)
    {
        return $this->couponInterface->update($request);
    }

    public function delete(CouponDeleteRequest $request)
    {
        return $this->couponInterface->delete($request);
    }
}
