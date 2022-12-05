<?php

namespace App\Http\Interfaces;

interface VendorInterface
{

    public function index($vendorDataTable);
    public function create();
    public function store($request);
    public function storeImport($request);
    public function import();
    public function edit($id);
    public function update($request);
    public function delete($request);

}
