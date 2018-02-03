<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSousDossierPersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sous_dossier_personnels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->integer('dossierPersonnel_id')->unsigned();
            $table->foreign('dossierPersonnel_id')->references('id')->on('dossier_personnels')
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
        Schema::dropIfExists('sous_dossier_personnels');
    }
}
