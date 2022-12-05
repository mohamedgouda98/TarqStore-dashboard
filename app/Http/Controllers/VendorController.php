<?php

namespace App\Http\Controllers;


use App\DataTables\VendorDataTable;
use App\Http\Interfaces\VendorInterface;
use App\Http\Requests\Vendors\VendorCreateRequest;
use App\Http\Requests\Vendors\VendorDeleteRequest;
use App\Http\Requests\Vendors\VendorImportRequest;
use App\Http\Requests\Vendors\VendorUpdateRequest;
use Illuminate\Support\Facades\Request;

class VendorController extends Controller
{
    public $vendorInterface;

    public function __construct(VendorInterface $vendorInterface)
    {
        $this->vendorInterface = $vendorInterface;
    }

    public function index(VendorDataTable $vendorDataTable)
    {
        return $this->vendorInterface->index($vendorDataTable);
    }

    public function create()
    {
        return $this->vendorInterface->create();
    }

    public function store(VendorCreateRequest $request)
    {
        return $this->vendorInterface->store($request);
    }

    public function import()
    {
        return $this->vendorInterface->import();
    }

    public function storeImport(VendorImportRequest $request)
    {
        return $this->vendorInterface->storeImport($request);
    }

    public function edit($id)
    {
        return $this->vendorInterface->edit($id);
    }

    public function update(VendorUpdateRequest $request)
    {
        return $this->vendorInterface->update($request);
    }

    public function delete(VendorDeleteRequest $request)
    {
        return $this->vendorInterface->delete($request);
    }
}
