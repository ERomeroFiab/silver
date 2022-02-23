<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionMotiveHistoriqueMajTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_motive_historique_maj', function (Blueprint $table) {
            $table->string('ANCIENNE_VALEUR', 10)->default('');
            $table->string('ANCIENNE_VALEUR_LIBELLE', 100)->default('');
            $table->string('CHAMPS', 12)->default('');
            $table->date('DATE')->nullable();
            $table->string('ID_MISSION_MOTIVE_HISTORIQUE_MAJ', 32)->default('')->primary();
            $table->string('NOUVELLE_VALEUR', 10)->default('');
            $table->string('NOUVELLE_VALEUR_LIBELLE', 100)->default('');
            $table->string('PID_MISSION', 32)->default('')->index('PID_MISSION');
            $table->string('PID_MISSION_MOTIVE', 32)->default('')->index('PID_MISSION_MOTIVE');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission_motive_historique_maj');
    }
}
