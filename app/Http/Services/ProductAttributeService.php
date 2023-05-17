<?php


namespace App\Http\Services;


use App\Models\Attribute;
use App\Models\ProductAttribute;

class ProductAttributeService
{

    public static function getProductAttributes()
    {
        return Attribute::get();
    }

    public static function getProductAttributesRules()
    {
        $data = [];
        foreach (ProductAttributeService::getProductAttributes() as $productAttribute)
        {
            $data[$productAttribute->name] = $productAttribute->rules;
        }
        return $data;
    }


    public static function setProductAttributesKeysWithRequest($request, $productId)
    {
        foreach (ProductAttributeService::getProductAttributes() as $productAttribute)
        {
            if($request->{$productAttribute->name}){
                ProductAttribute::create([
                    'product_id' => $productId,
                    'attribute_id' => $productAttribute->id,
                    'value' => $request->{$productAttribute->name}
                ]);
            }
        }
    }

    public static function setProductAttributesKeysWithSheet($headingList, $productId)
    {
        foreach (ProductAttributeService::getProductAttributes() as $productAttribute)
        {
            if(isset($headingList[$productAttribute->name])){
                ProductAttribute::create([
                    'product_id' => $productId,
                    'attribute_id' => $productAttribute->id,
                    'value' => $headingList[$productAttribute->name]
                ]);
            }
        }
    }

    public static function getProductAttributesById($productId)
    {
        $data = [];
        $attributes = ProductAttribute::select(['attribute_id', 'value'])->where('product_id', $productId)->with('attribute:id,name')->get();
        foreach ($attributes as $attribute)
        {
            $data[] =[
                'name' => $attribute->attribute->name,
                'data' => $attribute->value,
            ];
        }

       return $data;
    }


}
