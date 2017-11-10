<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveryOrders', function (Blueprint $table) {
            $table->increments('deliveryOrder_id');
            $table->string('kind');
            $table->string('destination');
            $table->date('deliveryDate');
            $table->string('status');
            $table->integer('bike_id')->unsigned();
            $table->timestamps();

            $table->foreign('bike_id')->references('bike_id')
                ->on('bikes')
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
        Schema::dropIfExists('deliveryOrders');
    }
}
