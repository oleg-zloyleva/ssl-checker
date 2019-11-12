<?php

namespace Tests\Browser\Login;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * @throws \Throwable
     */
    public function testGuestVisitAdminPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                    ->assertSee('Login');
        });
    }

    public function testFillLoginFormCorrect(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'admin@test.com')
                ->type('password','123456789')
                ->press('Login')
                ->assertPathIs('/admin');
        });
    }

    public function testFillLoginFormWrongPass(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('#email', 'admin@test.com')
                ->type('password','123')
                ->press('Login')
                ->assertSee('These credentials do not match our records.');
        });
    }
}
