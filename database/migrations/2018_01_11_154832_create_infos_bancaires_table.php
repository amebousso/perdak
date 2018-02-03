<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosBancairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos_bancaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codeGuichet');
            $table->string('numero_compte');
            $table->string('cleRIB');
            $table->integer('banque_id')->unsigned();
            $table->foreign('banque_id')->references('id')->on('banques')
                      ->onUpdate('cascade')
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
        Schema::dropIfExists('infos_bancaires');
    }
}
