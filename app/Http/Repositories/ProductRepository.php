<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\ProductInterface;
use App\Http\Services\LocalizationService;
use App\Http\Services\ProductAttributeService;
use App\Imports\ProductsImport;
use App\Models\Blog;
use App\Models\Product;
use App\Models\ProductAttribute;
//use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ProductRepository implements ProductInterface
{
    public $localizationService, $productModel, $productAttributeService;
    public function __construct(LocalizationService $localizationService, ProductAttributeService $productAttributeService, Product $productModel)
    {
        $this->localizationService = $localizationService;
        $this->productModel = $productModel;
        $this->productAttributeService = $productAttributeService;
    }

    public function index($productDataTable)
    {
      return $productDataTable->render('Product.index');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('Product.show', compact('product'));
    }

    public function import()
    {
        return view('Product.import');
    }

    public function importSheet($request)
    {
        Excel::import(new ProductsImport(), $request->sheet);

        Alert::toast('Products Imported');
        return redirect(route('admin.product.index'));
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

        $this->productAttributeService::setProductAttributesKeysWithRequest($request, $product->id);

        Alert::toast('Product Created');
        return redirect(route('admin.product.index'));
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
