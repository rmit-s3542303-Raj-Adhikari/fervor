<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannedTable extends Migration
{
    /**
     * Run the migrations.
     * Creates banned_user table.
     * This stores the users banned by admin.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('banned_users', function (Blueprint $table) {
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
            $table->string('avatar')->default('default.jpg');
            $table->rememberToken();
     });
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banned_users');
    }
}
