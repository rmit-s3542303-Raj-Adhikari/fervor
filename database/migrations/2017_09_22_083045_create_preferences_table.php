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







            //Hobbies
            $table->boolean('hiking')->default(false);
            $table->boolean('dancing')->default(false);
            $table->boolean('shopping')->default(false);
            $table->boolean('camping')->default(false);
            $table->boolean('videogaming')->default(false);
            $table->boolean('writing')->default(false);
            $table->boolean('hunting')->default(false);

            //religion


            $table->boolean('hinduism')->default(false);
            $table->boolean('chirstian')->default(false);
            $table->boolean('judaism')->default(false);
            $table->boolean('buddhism')->default(false);
            $table->boolean('atheist')->default(false);


            //interest

            $table->boolean('tech')->default(false);
            $table->boolean('science')->default(false);
            $table->boolean('art')->default(false);
            $table->boolean('history')->default(false);
            $table->boolean('sports')->default(false);
            $table->boolean('literature')->default(false);
            $table->boolean('traveling')->default(false);



            //language

            $table->boolean('english')->default(false);
            $table->boolean('french')->default(false);
            $table->boolean('spanish')->default(false);
            $table->boolean('chinese')->default(false);
            $table->boolean('hindi')->default(false);
            $table->boolean('arabic')->default(false);
            $table->boolean('persian')->default(false);
            $table->boolean('urdu')->default(false);


            
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
