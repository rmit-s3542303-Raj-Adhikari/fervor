<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FailedLoginTest extends DuskTestCase
{
    /**
     * Tests to see if Login with wrong credentials does not work.
     *
     * @return void
     */
      public function testExample()
    {
        $this->browse(function (Browser $browser) {
          $browser->visit('https://fervor-cloned-wbackpack-ryaii.c9users.io/')
                    ->clickLink('Login')
                    ->waitForLink('Login')
                    ->value('#email','test@thisshouldntwork.info')
                    ->value('#password', '123456')
                    ->press('Login')
                    ->assertPathIs('/login');
        });
    }
}
