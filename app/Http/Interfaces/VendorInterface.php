<?php

namespace App\Http\Interfaces;

interface VendorInterface
{

    public function index($vendorDataTable);
    public function create();
    public function store($request);
    public function edit();
    public function update();
    public function delete();

}
