<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->increments('bike_id');
            $table->string('status');
            $table->float('sellingPrice');
            $table->string('brand');
            $table->string('model');
            $table->string('category');
            $table->string('description');
            $table->string('quality');
            $table->string('gpsNumber')->nullable();
            $table->string('insurranceNumber')->nullable();;
            $table->string('certificateNumber')->nullable();
            $table->integer('owner_id')->unsigned();
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bikes');
    }
}
