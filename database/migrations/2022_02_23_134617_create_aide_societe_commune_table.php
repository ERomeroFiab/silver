<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAideSocieteCommuneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aide_societe_commune', function (Blueprint $table) {
            $table->string('CODE_POSTAL', 9)->default('')->index('CODE_POSTAL');
            $table->string('COMMUNE', 60)->default('')->index('COMMUNE');
            $table->string('ID_AIDE_SOCIETE_COMMUNE', 32)->default('')->primary();
            $table->string('INSEE', 6)->default('')->index('INSEE');
            $table->string('LANGUE', 10)->default('');
            $table->string('LIB_DEPARTEMENT', 35)->default('');
            $table->string('NUM_DEPARTEMENT', 3)->default('')->index('NUM_DEPARTEMENT');
            $table->string('PAYS', 20)->default('');
            $table->string('REGION', 30)->default('');
            $table->string('SECTEUR', 10)->default('');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->double('SYS_NO_LIGNE')->default(0);
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aide_societe_commune');
    }
}
