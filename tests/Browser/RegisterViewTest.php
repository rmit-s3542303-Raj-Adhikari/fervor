<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

class RegisterViewTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
       $this->browse(function (Browser $browser) {
           $browser->visit('http://fervor-cloned-wbackpack-ryaii.c9users.io/register')
                    ->value('#firstname', 'Ryan')
                    ->value('#lastname', 'Meas')
                    ->select('month','10')
                    ->select('day','10')
                    ->select('year','1995')
                    ->select('gender','male')
                    ->select('gender','female')
                    ->value('email','ryaii@gmail.com')
                    ->value('password','123456')
                    ->value('confirm','123456')
                    ->press('Register')
                    ->assertPathIs('/home');
        });
    }


}
