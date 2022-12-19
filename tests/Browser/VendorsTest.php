<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VendorsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testVendorsIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/vendor')
                    ->assertSee('Create Vendor');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateVendor()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/vendor/create')
                ->type('name_en', 'mohamed')
                ->type('name_ar', 'محمد')
                ->type('email', 'mohameddd@gmail.com')
                ->type('phone', '010000000')
                ->type('password', '12345678')
                ->press('Save')
                ->assertPathIs('/admin/vendor');
        });
    }
}
