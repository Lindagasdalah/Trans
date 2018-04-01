<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agences', function (Blueprint $table) {
            $table->increments('id');

            $table->string('agence_name');
            $table->string('agence_adresse');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agences');
    }
}
