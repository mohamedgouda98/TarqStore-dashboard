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


    public static function getProductAttributesKeysWithRequest($request, $productId)
    {
        foreach (ProductAttributeService::getProductAttributes() as $productAttribute)
        {
            ProductAttribute::create([
                'product_id' => $productId,
                'attribute_id' => $productAttribute->id,
                'value' => $request->{$productAttribute->name}
            ]);
        }
    }


}
