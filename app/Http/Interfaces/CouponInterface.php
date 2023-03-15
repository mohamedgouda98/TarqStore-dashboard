<?php

namespace App\Http\Interfaces;

interface CouponInterface
{
    public function index($couponDataTable);
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request);
    public function delete($request);
}
