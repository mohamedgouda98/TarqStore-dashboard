<?php

namespace App\Imports;

use App\Http\Services\ProductAttributeService;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $product = Product::create([
            'name' => [
                'en' => $row['name_en'],
                'ar' => $row['name_ar'],
            ],
            'body' => [
                'en' => $row['body_en'],
                'ar' => $row['body_ar'],
            ],
            'image' => 'test.png',
            'price' => 100
        ]);

        ProductAttributeService::setProductAttributesKeysWithSheet($this->getHeading($row, ['name_en','name_ar','body_en','body_ar']), $product->id);

        return $product;
    }

    public function rules(): array
    {
        return [];
    }

    public function getHeading($row, $expect=[])
    {
        $data = [];
        foreach ($row as $key => $value)
        {
            if(!in_array($key,$expect)){
                $data[$key] = $value;
            }
        }
        return $data;
    }
}
