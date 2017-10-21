<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmintable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('status')->default(1);
            $table->string('verifytoken')->nullable();
            $table->rememberToken();
            $table->timestamps();
            //Don't think we need these categories for admin.
              // $table->date('dob');
            // $table->string('gender');
            // $table->string('preference');
            // $table->boolean('admin')->default(false);
            // $table->boolean('firstLogin')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
