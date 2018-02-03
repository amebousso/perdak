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
            $table->string('sexe');
            $table->string('dateNaissance');
            $table->string('lieuNaissance');
            $table->enum('type', ['terrain', 'topmanegement'])->nullable();
            $table->enum('contrat', ['journalier', 'stagiaire', 'cdd', 'cdi'])->nullable();
            $table->string('cni')->nullable();
            $table->string('matricule')->nullable();
            $table->date('dateEmbauche')->nullable();
            $table->string('profession')->nullable();
            $table->string('ipres')->nullable();
            $table->string('situationMatrimoniale')->nullable();
            $table->string('nombreEnfants')->nullable();
            $table->string('niveauEtude')->nullable();
            $table->string('tailleTenue')->nullable();
            $table->string('pointureBottePluie')->nullable();
            $table->string('pointureBotteSecurite')->nullable();
            $table->integer('etat')->unsigned()->default(0);

            $table->integer('fonction_id')->unsigned()->nullable();
            $table->foreign('fonction_id')->references('id')->on('fonctions')
                      ->onUpdate('cascade');

            $table->integer('cellule_id')->unsigned()->nullable();
            $table->foreign('cellule_id')->references('id')->on('cellules')
                      ->onUpdate('cascade');

            $table->integer('circuit_id')->unsigned()->nullable();
            $table->foreign('circuit_id')->references('id')->on('circuits')
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
        Schema::dropIfExists('employes');
    }
}
