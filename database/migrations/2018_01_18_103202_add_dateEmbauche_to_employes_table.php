<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateEmbaucheToEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employes', function (Blueprint $table) {
            $table->date('dateEmbauche')->after('matricule')->nullable();
            $table->string('tailleTenue')->after('niveauEtude')->nullable();
            $table->string('pointureBottePluie')->after('niveauEtude')->nullable();
            $table->string('pointureBotteSecurite')->after('niveauEtude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employes', function (Blueprint $table) {
            $table->dropColumn('dateEmbauche');
            $table->dropColumn('tailleTenue');
            $table->dropColumn('pointureBottePluie');
            $table->dropColumn('pointureBotteSecurite');
        });
    }
}
