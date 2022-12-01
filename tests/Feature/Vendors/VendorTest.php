<?php

namespace Tests\Feature\Vendors;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VendorTest extends TestCase
{
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

        $response->assertStatus(400);
    }
}
