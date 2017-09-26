<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Database seed to populate the User table with dummy data. 
     * Sets all the passwords to 123456 for testing purposes.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        
        for ($i = 0; $i< 5; $i++)
        {
            User::Create([
            'firstname' => $faker->firstname($gender = 'male' | 'female' ),
            'lastname' => $faker->lastname,
            'firstLogin' => 1, 
            'status' => 1,
            'dob' => $faker->date($format = 'Y-m-d', $max = '1999/05/10'),
            'email' => $faker->email,
            'password' => bcrypt('123456'), 
            'gender' =>  $faker->randomElement($array = array ('male', 'female'))  ,  
            'preference' =>  $faker->randomElement($array = array ('male', 'female')) ,
            ]);
        }
    }
}
