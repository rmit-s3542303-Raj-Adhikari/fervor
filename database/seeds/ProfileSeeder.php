<?php

use Illuminate\Database\Seeder;
use App\Profile;


class ProfileSeeder extends Seeder
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
            Profile::Create([
            'user_id'    => $i+1,
            'nickname'   => $faker->word,
            'location'   => $faker->numberBetween($min = 1000, $max = 8000), 
            'status'     => $faker->randomElement($array = array ('single', 'married', 'divorced', 'complicated')),
            'occupation' => $faker->randomElement($array = array ('self-emplyed', 'engineer','doctor', 'writer', 'student', 'tradesman', 'teacher')),
            'height'     => 0,
            'smoking'    => $faker->randomElement($array = array (true, false))  ,  
            'religion'   => $faker->randomElement($array = array ('islam', 'hinduism', 'christian', 'judaism', 'buddhism', 'athiest' )) ,
            'ethnicity'  => $faker->randomElement($array = array ('caucasian', 'hispanic', 'black','middleeast','asian','indian','aboriginal','islander', 'mixed')) ,
            'bio'        => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
            'language1'  => $faker->randomElement($array = array ('english', 'french', 'spanish', 'chinese', 'hindi', 'urdu', null)) ,
            'language2'  => $faker->randomElement($array = array ('english', 'french', 'spanish', 'chinese', 'hindi', 'urdu', null)) ,
            'language3'  => $faker->randomElement($array = array ('english', 'french', 'spanish', 'chinese', 'hindi', 'urdu', null)) ,
            'language4'  => $faker->randomElement($array = array ('english', 'french', 'spanish', 'chinese', 'hindi', 'urdu', null)) ,
            'language5'  => $faker->randomElement($array = array ('english', 'french', 'spanish', 'chinese', 'hindi', 'urdu', null)) ,
            'interest1'  => $faker->randomElement($array = array ('tech', 'science', 'art', 'history', 'sports', 'literature', 'traveling', null)) ,
            'interest2'  => $faker->randomElement($array = array ('tech', 'science', 'art', 'history', 'sports', 'literature', 'traveling', null)) ,
            'interest3'  => $faker->randomElement($array = array ('tech', 'science', 'art', 'history', 'sports', 'literature', 'traveling', null)) ,
            'interest4'  => $faker->randomElement($array = array ('tech', 'science', 'art', 'history', 'sports', 'literature', 'traveling', null)) ,
            'interest5'  => $faker->randomElement($array = array ('tech', 'science', 'art', 'history', 'sports', 'literature', 'traveling', null)) ,
            'hobbies1'   => $faker->randomElement($array = array ('hiking', 'dancing', 'shopping', 'camping', 'gaming', 'writing', 'hunting', null)) ,
            'hobbies2'   => $faker->randomElement($array = array ('hiking', 'dancing', 'shopping', 'camping', 'gaming', 'writing', 'hunting', null)) ,
            'hobbies3'   => $faker->randomElement($array = array ('hiking', 'dancing', 'shopping', 'camping', 'gaming', 'writing', 'hunting', null)) ,
            'hobbies4'   => $faker->randomElement($array = array ('hiking', 'dancing', 'shopping', 'camping', 'gaming', 'writing', 'hunting', null)) ,
            'hobbies5'   => $faker->randomElement($array = array ('hiking', 'dancing', 'shopping', 'camping', 'gaming', 'writing', 'hunting', null)) ,           
            ]);
        }
    }
}
