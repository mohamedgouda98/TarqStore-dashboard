<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\VendorInterface;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class VendorRepository implements VendorInterface
{
    public $vendor;

    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }

    public function index($vendorDataTable)
    {
        return  $vendorDataTable->render('Vendors.index');
    }

    public function create()
    {
        return view('Vendors.create');
    }

    public function store($request)
    {
        $this->vendor::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        Alert::toast('Vendor Created');
        return redirect()->back();
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
