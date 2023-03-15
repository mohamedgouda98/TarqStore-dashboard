<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Attribute::create([
            'name' => 'ram',
            'data_type' => 'string',
            'rules' => 'required'
        ]);

        Attribute::create([
            'name' => 'storage',
            'data_type' => 'string',
            'rules' => 'required'
        ]);

        Attribute::create([
            'name' => 'gender',
            'data_type' => 'string',
            'rules' => 'required'
        ]);
    }
}
