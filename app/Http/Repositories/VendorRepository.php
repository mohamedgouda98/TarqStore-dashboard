<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\VendorInterface;
use App\Imports\Vendors\VendorImport;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use RealRashid\SweetAlert\Facades\Alert;

class VendorRepository implements VendorInterface
{
    public $vendorModel;

    public function __construct(Vendor $vendor)
    {
        $this->vendorModel = $vendor;
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
        $name = [];
        foreach (LaravelLocalization::getSupportedLanguagesKeys() as $lang)
        {
            $flag = 'name_' . $lang;
            $name [$lang] = $request->$flag;
        }

            $this->vendorModel::create([
            'name'=> ['en' => $request->name_en , 'ar' => $request->name_ar, 'fa' => $request->name_fa],
            'phone'=> $request->phone,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        Alert::toast('Vendor Created');
        return redirect()->back();
    }

    public function edit($id)
    {
        $vendor = $this->vendorModel::find($id);
        return ($vendor) ? view('vendors.edit', compact('vendor'))  : redirect(route('admin.vendor.index'));
    }

    public function update($request)
    {
        $vendor = $this->vendorModel::findOrFail($request->id);
        $vendor->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        Alert::toast('Vendor Updated');

        return redirect(route('admin.vendor.index'));
    }

    public function delete($request)
    {
        $vendor = $this->vendorModel::findOrFail($request->id);
        $vendor->delete();
        return 1;
    }

    public function import()
    {
        return view('Vendors.import');
    }

    public function storeImport($request)
    {
        Excel::import(new VendorImport(), $request->sheet);

        Alert::toast('Vendor Updated');
        return redirect(route('admin.vendor.index'));
    }
}
