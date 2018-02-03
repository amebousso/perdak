<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircuitEmployeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circuit_employe', function (Blueprint $table) {
            $table->date('date');
            $table->integer('employe_id')->unsigned()->nullable();
            $table->integer('circuit_id')->unsigned()->nullable();

            $table->foreign('employe_id')->references('id')->on('employes')
                      ->onUpdate('cascade');
            $table->foreign('circuit_id')->references('id')->on('circuits')
                      ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circuit_employe');
    }
}
