<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeIdToInfosBancairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infos_bancaires', function (Blueprint $table) {
          $table->integer('employe_id')->unsigned();
          $table->foreign('employe_id')->references('id')->on('employes')
                    ->onUpdate('cascade')
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
        Schema::table('infos_bancaires', function (Blueprint $table) {
            $table->dropColumn('employe_id');
        });
    }
}
