<?php

namespace App\Http\Controllers;


use App\DataTables\VendorDataTable;
use App\Http\Interfaces\VendorInterface;
use App\Http\Requests\Vendors\VendorCreateRequest;
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

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function delete()
    {
        //
    }
}
