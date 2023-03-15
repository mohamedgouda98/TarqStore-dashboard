<?php

namespace App\Http\Controllers;

use App\DataTables\BlogDataTable;
use App\Http\Interfaces\BlogInterface;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\DeleteBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public $blogInterface;

    public function __construct(BlogInterface $blogInterface)
    {
        $this->blogInterface = $blogInterface;
    }

    public function index(BlogDataTable $blogCategoriesDataTable)
    {
        return $this->blogInterface->index($blogCategoriesDataTable);
    }

    public function create()
    {
        return $this->blogInterface->create();
    }

    public function store(CreateBlogRequest $request)
    {
        return $this->blogInterface->store($request);
    }

    public function edit($id)
    {
        return $this->blogInterface->edit($id);
    }

    public function update(UpdateBlogRequest $request)
    {
        return $this->blogInterface->update($request);
    }

    public function delete(DeleteBlogRequest $request)
    {
        return $this->blogInterface->delete($request);
    }
}
