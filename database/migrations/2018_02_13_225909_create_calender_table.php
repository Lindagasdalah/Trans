<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calenders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name');
            $table->boolean('lundi');
            $table->boolean('mardi');
            $table->boolean('mercredi');
            $table->boolean('jeudi');
            $table->boolean('vendredi');
            $table->boolean('samedi');
            $table->boolean('dimanche');
            $table->boolean('feries');
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
        Schema::dropIfExists('calender');
    }
}
