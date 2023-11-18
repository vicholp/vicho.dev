<?php

namespace Tests\Browser\Admin;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            // $browser->visit('/login')
            //         ->type('email', 'admin@example.com')
            //         ->type('password', 'password')
            //         ->press('Login')
            //         ->assertPathIs('/admin');
        });
    }
}
