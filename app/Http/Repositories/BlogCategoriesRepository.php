<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\BlogCategoriesInterface;
use App\Http\Services\LocalizationService;
use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
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
        $blogCategory = $this->blogCategorisModel::find($id);
        return ($blogCategory) ? view('BlogCategories.edit', compact('blogCategory'))  : redirect(route('admin.blog.categories.index'));
    }

    public function update($request)
    {
        $blogCategory = $this->blogCategorisModel::findOrFail($request->id);

        $localizationList =  $this->localizationService::getLocalizationList($this->blogCategorisModel, $request);

        $blogCategory->update($localizationList);

        Alert::toast('Blog Category Updated');

        return redirect(route('admin.blog.category.index'));
    }

    public function delete($request)
    {
        $blogCategory = $this->blogCategorisModel::findOrFail($request->id);
        $blogCategory->delete();
        return 1;
    }

}
