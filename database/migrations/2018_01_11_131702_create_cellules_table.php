<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCellulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cellules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->integer('service_id')->unsigned();

            $table->foreign('service_id')->references('id')->on('services')
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
        Schema::dropIfExists('cellules');
    }
}
