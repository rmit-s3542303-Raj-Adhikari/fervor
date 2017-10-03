<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('location_table', function(Blueprint $table) {
            $table->integer('postcode');
            $table->string('suburbs');
            $table->string('state');
            $table->string('dc')->nullable();
            $table->string('type')->nullable();
            $table->double('lat');
            $table->double('lon');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('location_table');
    }


    }
