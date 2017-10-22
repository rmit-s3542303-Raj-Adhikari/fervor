<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        DB::table('admins')->insert([
            'firstname' => 'Fervor',
            'lastname' => 'Test',
            'email' => 'FervorTest@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
