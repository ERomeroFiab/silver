<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteFraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_frais', function (Blueprint $table) {
            $table->string('COMMERCIAL', 20)->default('')->index('COMMERCIAL');
            $table->date('DATE_DEBUT')->nullable();
            $table->date('DATE_FIN')->nullable();
            $table->decimal('FRAIS_HT', 10, 2)->default(0.00);
            $table->decimal('FRAIS_TTC', 10, 2)->default(0.00);
            $table->double('FRAIS_TVA')->default(0);
            $table->string('ID_NOTE_FRAIS', 32)->default('')->primary();
            $table->double('KM_DEBUT')->default(0);
            $table->double('KM_FIN')->default(0);
            $table->binary('MEMO');
            $table->string('NUM_NF', 20)->default('')->index('NUM_NF');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->decimal('TAUX_KM', 12, 4)->default(0.0000);
            $table->char('VALIDATED', 1)->default('');
            $table->double('PUISSANCE_FISCALE')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_frais');
    }
}
