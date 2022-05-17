<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysRgpdBddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_rgpd_bdd', function (Blueprint $table) {
            $table->string('ID_SYS_RGPD_BDD', 32)->default('')->primary();
            $table->char('SYS_DONNEES_PERSONNES_MINEURES', 1)->default('');
            $table->binary('SYS_LOCALISATION_STOCKAGE_DONNEES');
            $table->binary('SYS_NOM_DPO');
            $table->binary('SYS_SECURITE_DONNEES');
            $table->binary('SYS_SOUS_TRAITANTS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_rgpd_bdd');
    }
}
