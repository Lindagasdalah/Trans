<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_stops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordre');
            $table->integer('route_id')->unsigned();
            $table->integer('stop_id')->unsigned();

            $table->foreign('route_id')
                ->references('id')
                ->on('routes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('stop_id')
                ->references('id')
                ->on('stops')
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
        Schema::dropIfExists('route_stops');
    }
}
