<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
    public function testUserRegistration()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Register')
                ->value('#name', 'Test User') 
                ->value('#email', 'test@test.com')
                ->value('#password', '00000000')
                ->value('#password_confirmation', '00000000')
                ->click('button[type="submit"]')
                ->press('Test User');
                    if ($browser->seeLink('Log Out')) {
                        $browser->clickLink('Log Out');
                    }
        });
    }

    public function testUserLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Log in')
                ->value('#email', 'test@test.com')
                ->value('#password', '00000000')
                ->click('button[type="submit"]')
                ->press('Test User');
                    if ($browser->seeLink('Log Out')) {
                        $browser->clickLink('Log Out');
                    }
        });
    }
}
