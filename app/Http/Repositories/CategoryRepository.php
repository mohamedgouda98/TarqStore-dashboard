<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\CategoryInterface;
use App\Http\Services\LocalizationService;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryRepository implements CategoryInterface
{

    private $categoryModel;
    private $localizationService;

    public function __construct(Category $category, LocalizationService $localizationService)
    {
        $this->categoryModel = $category;
        $this->localizationService = $localizationService;
    }


    public function index($categoriesDataTable)
    {
        return $categoriesDataTable->render('Categories.index');
    }

    public function create()
    {
        return view('Categories.create');
    }

    public function store($request)
    {
        $localizationList =  $this->localizationService::getLocalizationList($this->categoryModel, $request);
        $this->categoryModel::create($localizationList);
        Alert::toast('Category Created');
        return redirect(route('admin.category.index'));
    }

    public function edit($id)
    {
        $category = $this->categoryModel::find($id);
        return ($category) ? view('Categories.edit', compact('category'))  : redirect(route('admin.categories.index'));
    }

    public function update($request)
    {
        $category = $this->categoryModel::findOrFail($request->id);

        $localizationList =  $this->localizationService::getLocalizationList($this->categoryModel, $request);

        $category->update($localizationList);

        Alert::toast('Category Updated');

        return redirect(route('admin.category.index'));
    }

    public function delete($request)
    {
        $blogCategory = $this->categoryModel::findOrFail($request->id);
        $blogCategory->delete();
        return 1;
    }
}
