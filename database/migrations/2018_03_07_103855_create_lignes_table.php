<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLignesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ligne_name');

            $table->integer('transport_id')->unsigned();
            $table->integer('agence_id')->unsigned();

            $table->foreign('transport_id')
                ->references('id')
                ->on('transport_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('agence_id')
                ->references('id')
                ->on('agences')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('lignes');
    }
}
