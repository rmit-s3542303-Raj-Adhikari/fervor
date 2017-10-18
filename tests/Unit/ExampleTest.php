<?php

namespace Tests\Unit;

use App\Profile;
use App\User;
use Illuminate\Support\Facades\App;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Database\Seeder;
use Laravel\Dusk\DuskServiceProvider;





class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    use DatabaseMigrations;






//      ****  Registeration Test  ****
        public function testRegisteration(){


            $faker = \Faker\Factory::create();

             $user =   User::Create([
                    'firstname' => $faker->firstname($gender = 'male' | 'female' ),
                    'lastname' => 'labib',
                    'firstLogin' => 1,
                    'status' => 1,
                    'dob' => $faker->date($format = 'Y-m-d', $max = '1999/05/10'),
                    'email' => $faker->email,
                    'password' => bcrypt('123456'),
                    'gender' =>  $faker->randomElement($array = array ('male', 'female'))  ,
                    'preference' =>  $faker->randomElement($array = array ('male', 'female')) ,
                ]);


             $lastname = $user->value('lastname');

            $this->assertEquals($lastname, 'labib');


//       // $user = factory(User::class)->create();
//
//        $profile = $user->profiles()->create([
//
////            'id' => 3,
////            'nickname' => 'Johnny',
//
//
//        ]);

//        $found_Profile = Profile::find(3)->get();
//
//        $this->assertEquals($found_Profile->get('nickname'), 'Johnny' );

        }



}
