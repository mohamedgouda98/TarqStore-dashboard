<?php

namespace Tests\Feature\Vendors;

use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VendorTest extends TestCase
{

    public function test_index_vendors()
    {
        $response = $this->get('/admin/vendor');
        $response->assertStatus(200);

        $tableHeaders = ['ID', 'Name', 'Email', 'Status', 'Actions'];

        foreach ($tableHeaders as $tableHeader) {
            $response->assertSee($tableHeader);
        }
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_page()
    {
        $response = $this->get('/admin/vendor/create');

        $response->assertStatus(200);
    }

    public function test_store_with_invalid_data()
    {
        $data = [
            'name' => 'test',
            'phone' => '01000000',
            'password'=> '123456'
        ];
        $response = $this->post('/admin/vendor/store', $data);

        $response->assertStatus(302);
    }

//    public function test_store_with_valid_data()
//    {
//        $data = [
//            'name' => 'test',
//            'phone' => '01000000',
//            'email' => 'mohmaedowdmfo@gmail.com',
//            'password'=> '12345678'
//        ];
//        $response = $this->post('/admin/vendor/store', $data);
//
//        $response->assertStatus(200);
//    }
}
