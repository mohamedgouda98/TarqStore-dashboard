<?php

namespace App\Http\Controllers;

use App\DataTables\BlogCategoriesDataTable;
use App\Http\Interfaces\BlogCategoriesInterface;
use App\Http\Requests\BlogCategory\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategory\BlogCategoryDeleteRequest;
use App\Http\Requests\BlogCategory\BlogCategoryUpdateRequest;

class BlogCategoriesController extends Controller
{

    public $blogInterface;

    public function __construct(BlogCategoriesInterface $blogInterface)
    {
        $this->blogInterface = $blogInterface;
    }

    public function index(BlogCategoriesDataTable $blogCategoriesDataTable)
    {
        return $this->blogInterface->index($blogCategoriesDataTable);
    }

    public function create()
    {
        return $this->blogInterface->create();
    }

    public function store(BlogCategoryCreateRequest $request)
    {
        return $this->blogInterface->store($request);
    }

    public function edit($id)
    {
        return $this->blogInterface->edit($id);
    }

    public function update(BlogCategoryUpdateRequest $request)
    {
        return $this->blogInterface->update($request);
    }

    public function delete(BlogCategoryDeleteRequest $request)
    {
        return $this->blogInterface->delete($request);
    }
}
