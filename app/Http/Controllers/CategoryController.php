<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesDataTable;
use App\Http\Interfaces\CategoryInterface;
use App\Http\Requests\Categories\CategoryCreateRequest;
use App\Http\Requests\Categories\CategoryDeleteRequest;
use App\Http\Requests\Categories\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    public function index(CategoriesDataTable $blogCategoriesDataTable)
    {
        return $this->categoryInterface->index($blogCategoriesDataTable);
    }

    public function create()
    {
        return $this->categoryInterface->create();
    }

    public function store(CategoryCreateRequest $request)
    {
        return $this->categoryInterface->store($request);
    }

    public function edit($id)
    {
        return $this->categoryInterface->edit($id);
    }

    public function update(CategoryUpdateRequest $request)
    {
        return $this->categoryInterface->update($request);
    }

    public function delete(CategoryDeleteRequest $request)
    {
        return $this->categoryInterface->delete($request);
    }
}
