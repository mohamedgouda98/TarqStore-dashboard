<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ProductInterface;
use App\Http\Requests\Product\ProductStoreRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productInterface;

    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    public function index($blogCategoriesDataTable)
    {
        return $this->productInterface->index($blogCategoriesDataTable);
    }

    public function create()
    {
        return $this->productInterface->create();
    }

    public function store(ProductStoreRequest $request)
    {
        return $this->productInterface->store($request);
    }

    public function edit($id)
    {
        return $this->productInterface->edit($id);
    }

    public function update( $request)
    {
        return $this->productInterface->update($request);
    }

    public function delete( $request)
    {
        return $this->productInterface->delete($request);
    }
}
