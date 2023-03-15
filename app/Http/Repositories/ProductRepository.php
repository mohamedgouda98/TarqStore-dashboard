<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\ProductInterface;
use App\Http\Services\LocalizationService;
use App\Http\Services\ProductAttributeService;
use App\Models\Blog;
use App\Models\Product;
use App\Models\ProductAttribute;

class ProductRepository implements ProductInterface
{
    public $localizationService, $productModel, $productAttributeService;
    public function __construct(LocalizationService $localizationService, ProductAttributeService $productAttributeService, Product $productModel)
    {
        $this->localizationService = $localizationService;
        $this->productModel = $productModel;
        $this->productAttributeService = $productAttributeService;
    }

    public function index($ProductsDataTable)
    {
        // TODO: Implement index() method.
    }

    public function create()
    {
        return view('Product.create');
    }

    public function store($request)
    {
        $localizationList =  $this->localizationService::getLocalizationList($this->productModel, $request);

        $product = $this->productModel::create(array_merge($localizationList, [
                'image' => 'test',
                'price'=> 10
            ])
        );
        $productAttributes = $this->productAttributeService::getProductAttributesKeysWithRequest($request, $product->id);

    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function delete($request)
    {
        // TODO: Implement delete() method.
    }
}
