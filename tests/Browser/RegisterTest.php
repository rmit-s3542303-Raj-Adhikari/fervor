<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
       $this->browse(function (Browser $browser) {
           $browser->visit('https://fervor-cloned-wbackpack-ryaii.c9users.io/')
                    ->clickLink('Login')
                    ->waitForLink('Login');
        });
    }
}
