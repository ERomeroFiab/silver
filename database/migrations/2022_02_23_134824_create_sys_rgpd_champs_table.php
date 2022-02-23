<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysRgpdChampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_rgpd_champs', function (Blueprint $table) {
            $table->string('ID_SYS_RGPD_CHAMPS', 32)->default('')->primary();
            $table->string('PID_SYS_RGPD_TABLES', 32)->default('')->index('PID_SYS_RGPD_TABLES');
            $table->string('SYS_CATEGORIE_DONNEES', 3)->default('');
            $table->string('SYS_NOM_CHAMP', 100)->default('')->index('SYS_NOM_CHAMP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_rgpd_champs');
    }
}
