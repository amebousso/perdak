<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prenom');
            $table->string('nom');
            $table->string('dateNaissance');
            $table->string('lieuNaissance');
            $table->string('matricule');
            $table->string('cni');
            $table->string('profession');
            $table->string('ipress');
            $table->string('sexe');
            $table->string('situationMatrimoniale');
            $table->string('nombreEnfants');
            $table->string('niveauEtude');

            $table->integer('fonction_id')->unsigned();
            $table->foreign('fonction_id')->references('id')->on('fonctions')
                      ->onCascade('cascade');

            $table->integer('cellule_id')->unsigned();
            $table->foreign('cellule_id')->references('id')->on('cellules')
                      ->onCascade('cascade');

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
        Schema::dropIfExists('employes');
    }
}
