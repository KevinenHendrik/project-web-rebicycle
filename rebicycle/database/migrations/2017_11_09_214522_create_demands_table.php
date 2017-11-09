<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('minimumQuality');
            $table->string('status');
            $table->integer('bike_id')->unsigned();
            $table->integer('buyer_id')->unsigned();
            $table->timestamps();

            $table->foreign('bike_id')->references('bike_id')
                ->on('bikes')
                ->onDelete('cascade');

            $table->foreign('buyer_id')->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demands');
    }
}
