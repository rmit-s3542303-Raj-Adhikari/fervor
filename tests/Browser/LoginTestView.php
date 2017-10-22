<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

class LoginTestView extends DuskTestCase
{
    /**
     * Browser test to see if clicking on register work
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
           $browser->visit('https://fervor-cloned-wbackpack-ryaii.c9users.io/')
                    ->clickLink('Login')
                    ->waitForLink('Login')
                    ->assertPathIs('/login');
        });
    }
    
    // public function testRegisterView()
    // {
    //      $this->browse(function (Browser $browser) {
    //       $browser->visit('https://fervor-cloned-wbackpack-ryaii.c9users.io/')
    //                 ->clickLink('Register')
    //                 ->waitForLink('Register')
    //                 ->assertPathIs('/register');
    //     });
        
    // }
}
