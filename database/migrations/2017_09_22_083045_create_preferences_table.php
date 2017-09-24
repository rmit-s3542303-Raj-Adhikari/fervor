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
            $table->string('ethnicity')->nullable();
            $table->boolean('smoking')->nullable();
            $table->string('interest1')->nullable();
            $table->string('interest2')->nullable();
            $table->string('interest3')->nullable();
            $table->string('interest4')->nullable();
            $table->string('interest5')->nullable();
            $table->string('hobbies1')->nullabble();
            $table->string('hobbies2')->nullabble();
            $table->string('hobbies3')->nullabble();
            $table->string('hobbies4')->nullabble();
            $table->string('hobbies5')->nullabble();

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
