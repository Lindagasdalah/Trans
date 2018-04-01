<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trip_name');
            $table->integer('sens');
            $table->integer('service_id')->unsigned();
            $table->integer('route_id')->unsigned();
            $table->foreign('service_id')
                ->references('id')
                ->on('calender')
                ->onDelete('cascade');

            $table->foreign('route_id')
                ->references('id')
                ->on('routes')
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
        Schema::dropIfExists('trips');
    }
}
