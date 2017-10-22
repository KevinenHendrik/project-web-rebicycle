<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikeMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikeMedia', function (Blueprint $table) {
            $table->increments('bikeMedia_id');
            $table->string('path');
            $table->boolean('isMainImage');
            $table->integer('bike_id')->unsigned();
            $table->timestamps();

            $table->foreign('bike_id')->references('bike_id')->on('bikes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bikeMedia');
    }
}
