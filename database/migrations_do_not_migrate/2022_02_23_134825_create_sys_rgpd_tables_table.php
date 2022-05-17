<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysRgpdTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_rgpd_tables', function (Blueprint $table) {
            $table->string('ID_SYS_RGPD_TABLES', 32)->default('')->primary();
            $table->binary('SYS_DESTINATAIRES_DONNEES_EXTERNES');
            $table->binary('SYS_DUREE_CONSERVATION');
            $table->binary('SYS_FINALITES');
            $table->binary('SYS_MODALITES_INFORMATIONS');
            $table->string('SYS_NOM_TABLE', 100)->default('')->index('SYS_NOM_TABLE');
            $table->binary('SYS_ORIGINE_DONNEES');
            $table->binary('SYS_TYPE_DONNEES');
            $table->binary('SYS_USAGERS_DONNEES');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_rgpd_tables');
    }
}
