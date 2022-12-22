<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\BlogCategoriesInterface;
use App\Http\Services\LocalizationService;
use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use RealRashid\SweetAlert\Facades\Alert;

class BlogCategoriesRepository implements BlogCategoriesInterface
{

    private $blogCategorisModel;
    private $localizationService;

    public function __construct(BlogCategory $blogCategory, LocalizationService $localizationService)
    {
        $this->blogCategorisModel = $blogCategory;
        $this->localizationService = $localizationService;
    }

    public function index($blogCategoriesDataTable)
    {
        return  $blogCategoriesDataTable->render('BlogCategories.index');
    }

    public function create()
    {
        return view('BlogCategories.create');
    }

    public function store($request)
    {
        $localizationList =  $this->localizationService::getLocalizationList($this->blogCategorisModel, $request);

        $this->blogCategorisModel::create($localizationList);

        Alert::toast('Blog Category Created');
        return redirect(route('admin.blog.category.index'));
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

}
