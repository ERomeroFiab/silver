<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignesFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignes_factures', function (Blueprint $table) {
            $table->string('COMMERCIAL', 20)->default('')->index('COMMERCIAL');
            $table->date('DATE_FACTURE')->nullable()->index('DATE_FACTURE');
            $table->string('DESIGNATION', 50)->default('');
            $table->string('FAMILLE', 15)->default('')->index('FAMILLE');
            $table->string('ID_LIGNES_FACTURES', 32)->default('')->primary();
            $table->string('N_LF', 14)->default('')->index('N_LF');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->double('PRIX_UNITAIRE')->default(0);
            $table->double('QTE')->default(0);
            $table->string('REFERENCE_ARTICLE', 18)->default('')->index('REFERENCE_ARTICLE');
            $table->double('REMISE')->default(0);
            $table->string('SOUS_FAMILLE', 15)->default('')->index('SOUS_FAMILLE');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->double('TOTAL_LIGNE')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lignes_factures');
    }
}
