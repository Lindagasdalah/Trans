<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStopTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stop_times', function (Blueprint $table) {
            $table->increments('id');
            $table->time('arrived_time');
            $table->time('departure_time');
            $table->integer('trip_id')->unsigned();
            $table->integer('routeStop_id')->unsigned();

            $table->foreign('trip_id')
                ->references('id')->on('trips')
                ->onDelete('cascade');

            $table->foreign('routeStop_id')
                ->references('id')
                ->on('route_stops')
                ->onDelete('cascade');
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
        Schema::dropIfExists('stop_times');
    }
}
