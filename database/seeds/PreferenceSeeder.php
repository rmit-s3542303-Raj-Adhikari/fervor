<?php

use Illuminate\Database\Seeder;

use App\Preferences;

class PreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        
        for ($i = 0; $i< 50; $i++)
        {
            Preferences::Create([
            'id'         => $i+1,
            'age'        => $faker->numberBetween($min = 18, $max = 40),
            'smoking'    => $faker->randomElement($array = array (1,0)),
            'caucasian'  => $faker->randomElement($array = array (1,0)),
            'hispanic'   => $faker->randomElement($array = array (1,0)),
            'black'      => $faker->randomElement($array = array (1,0)),
            'middleeast' => $faker->randomElement($array = array (1,0)),
            'asian'      => $faker->randomElement($array = array (1,0)),
            'indian'     => $faker->randomElement($array = array (1,0)),
            'aboriginal' => $faker->randomElement($array = array (1,0)),
            'islander'   => $faker->randomElement($array = array (1,0)),
            'mixed'      => $faker->randomElement($array = array (1,0)),
            ]);
        }
    }
}
