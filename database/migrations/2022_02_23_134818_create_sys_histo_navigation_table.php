<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysHistoNavigationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_histo_navigation', function (Blueprint $table) {
            $table->string('ID_SYS_HISTO_NAVIGATION', 32)->default('')->primary();
            $table->string('SYS_CODE_UTILISATEUR', 20)->default('')->index('SYS_CODE_UTILISATEUR');
            $table->string('SYS_COULEUR_FOND', 20)->default('');
            $table->dateTime('SYS_DATE_HEURE')->nullable()->index('SYS_DATE_HEURE');
            $table->string('SYS_ID_ENREG', 32)->default('')->index('SYS_ID_ENREG');
            $table->string('SYS_NOM_FICHIER_PLA', 60)->default('')->index('SYS_NOM_FICHIER_PLA');
            $table->string('SYS_POLICE', 30)->default('');
            $table->string('SYS_TABLE', 50)->default('')->index('SYS_TABLE');
            $table->string('SYS_TITRE', 300)->default('')->index('SYS_TITRE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_histo_navigation');
    }
}
