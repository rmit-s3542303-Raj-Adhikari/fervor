<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->date('dob');
            $table->string('password');
            $table->boolean('status')->default(0);
            $table->string('verifytoken')->nullable();
            $table->string('gender');
            $table->string('preference');
            $table->boolean('admin')->default(false);
            $table->boolean('firstLogin')->default(true);
<<<<<<< HEAD
            $table->string('avatar')->default('default.jpg');
=======
             $table->string('avatar')->default('default.jpg');
>>>>>>> 383e07f2b6f610b01b74f081cb2d658ced4c6250
            $table->rememberToken();
            $table->boolean('flagged')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
