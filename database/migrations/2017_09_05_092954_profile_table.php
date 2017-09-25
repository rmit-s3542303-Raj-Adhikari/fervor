<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {

            $table->integer('id')->unsigned();
            $table->string('nickname')->nullable();
            $table->string('location')->nullable();

            $table->string('status')->nullable();
            $table->string('occupation')->nullable();
            $table->integer('height')->nullable();

            $table->boolean('smoking')->nullable();

            $table->string('religion')->nullable();

            $table->text('language1')->nullable();
            $table->text('language2')->nullable();
            $table->text('language3')->nullable();
            $table->text('language4')->nullable();
            $table->text('language5')->nullable();


            $table->string('ethnicity')->nullable();

            $table->text('bio')->nullable();

            $table->string('interest1')->nullable();
            $table->string('interest2')->nullable();
            $table->string('interest3')->nullable();
            $table->string('interest4')->nullable();
            $table->string('interest5')->nullable();


            $table->string('hobbies1')->nullable();
            $table->string('hobbies2')->nullable();
            $table->string('hobbies3')->nullable();
            $table->string('hobbies4')->nullable();
            $table->string('hobbies5')->nullable();

            $table->timestamps();

            $table->foreign('id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}