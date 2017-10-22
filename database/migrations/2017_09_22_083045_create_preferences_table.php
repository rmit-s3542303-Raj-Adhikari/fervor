<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('ageMin')->nullable();
            $table->integer('ageMax')->nullable();
            $table->integer('age')->nullable();
            $table->boolean('smoking')->nullable();


            //ethnicity

            $table->boolean('caucasian')->default(false);
            $table->boolean('hispanic')->default(false);
            $table->boolean('black')->default(false);
            $table->boolean('middleeast')->default(false);
            $table->boolean('asian')->default(false);
            $table->boolean('indian')->default(false);
            $table->boolean('aboriginal')->default(false);
            $table->boolean('islander')->default(false);
            $table->boolean('mixed')->default(false);








            //religion
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
        Schema::dropIfExists('preferences');
    }
}
