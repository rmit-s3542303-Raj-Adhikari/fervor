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
        Schema::create('profiles', function(Blueprint $table) {

            $table->integer('user_id');
            $table->string('nickname')->nullable();
            $table->string('location')->nullable();





            $table->string('status')->nullable();
            $table->string('occupation')->nullable();
            $table->integer('height')->nullable();

            $table->boolean('smoking')->nullable();





            $table->string('religion')->nullable();


            $table->text('language')->nullable();
            $table->text('language2')->nullable();
            $table->text('language3')->nullable();
            $table->text('language4')->nullable();
            $table->text('language5')->nullable();



            $table->string('Ethnicity')->nullable();

            $table->text('bio')->nullable();

            $table->string('interest')->nullable();
            $table->string('interest2')->nullable();
            $table->string('interest3')->nullable();
            $table->string('interest4')->nullable();
            $table->string('interest5')->nullable();



            $table->string('hobbies')->nullable();
            $table->string('hobbies2')->nullable();
            $table->string('hobbies3')->nullable();
            $table->string('hobbies4')->nullable();
            $table->string('hobbies5')->nullable();





            /*
                        $table->string('genderPreference')->nullable();
                        $table->integer('agePreference')->nullable();

                        $table->string('cityPreference')->nullable();
                        $table->string('religionPreference')->nullable();
                        $table->string('ethnicityPreference')->nullable();
                        $table->string('interestPreference')->nullable();
                        $table->string('hobbiesPreference')->nullable();

           */
                        $table->timestamps();
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