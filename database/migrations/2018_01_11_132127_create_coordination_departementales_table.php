<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinationDepartementalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordination_departementales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->integer('pole_id')->unsigned();
            $table->foreign('pole_id')->references('id')->on('coordination_de_poles')
                      ->onCascade('cascade')
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
        Schema::dropIfExists('coordination_departementales');
    }
}
