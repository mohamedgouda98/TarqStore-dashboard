<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Interfaces\ProductInterface;
use App\Http\Requests\FileImportRequest;
use App\Http\Requests\Product\ProductStoreRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productInterface;

    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    public function index(ProductDataTable $productDataTable)
    {
        return $this->productInterface->index($productDataTable);
    }

    public function show($id)
    {
        return $this->productInterface->show($id);
    }

    public function import()
    {
        return $this->productInterface->import();
    }

    public function importSheet(FileImportRequest $request)
    {
        return $this->productInterface->importSheet($request);
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
