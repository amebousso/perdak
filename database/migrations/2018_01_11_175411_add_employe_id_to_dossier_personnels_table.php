<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeIdToDossierPersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dossier_personnels', function (Blueprint $table) {
          $table->integer('employe_id')->unsigned();
          $table->foreign('employe_id')->references('id')->on('employes')
                    ->onCascade('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dossier_personnels', function (Blueprint $table) {
            $table->dropColumn('employe_id');
        });
    }
}
