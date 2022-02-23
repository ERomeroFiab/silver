<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAideSocieteEffectifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aide_societe_effectif', function (Blueprint $table) {
            $table->string('EFFECTIF', 30)->default('')->index('EFFECTIF');
            $table->string('ID_AIDE_SOCIETE_EFFECTIF', 32)->default('')->primary();
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->double('SYS_NO_LIGNE')->default(0);
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->double('TRANCHE_MAXI')->default(0)->index('TRANCHE_MAXI');
            $table->double('TRANCHE_MINI')->default(0)->index('TRANCHE_MINI');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aide_societe_effectif');
    }
}
