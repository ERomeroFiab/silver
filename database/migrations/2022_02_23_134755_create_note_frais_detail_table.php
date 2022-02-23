<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteFraisDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_frais_detail', function (Blueprint $table) {
            $table->char('ACCEPTED', 1)->default('');
            $table->double('AVION')->default(0);
            $table->string('COMPANY_COMMENTS', 40)->default('');
            $table->date('DATE')->nullable();
            $table->double('FRAIS_DIVERS')->default(0);
            $table->decimal('FRAIS_HT', 10, 2)->default(0.00);
            $table->double('FRAIS_KM')->default(0);
            $table->decimal('FRAIS_TTC', 10, 2)->default(0.00);
            $table->double('FRAIS_TVA')->default(0);
            $table->double('HOTEL')->default(0);
            $table->string('ID_NOTE_FRAIS_DETAIL', 32)->default('')->primary();
            $table->double('INVITATION')->default(0);
            $table->double('LOCATION')->default(0);
            $table->binary('MEMO');
            $table->string('NATURE', 25)->default('');
            $table->double('NB_INVITES')->default(0);
            $table->double('NB_KMS')->default(0);
            $table->double('PEAGE')->default(0);
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PID_NOTE_FRAIS', 32)->default('')->index('PID_NOTE_FRAIS');
            $table->char('REFUSED', 1)->default('');
            $table->double('REPAS')->default(0);
            $table->string('SERVICE_PROVIDER', 25)->default('');
            $table->string('SYS_CONTEXTE', 32)->default('')->index('SYS_CONTEXTE');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->double('SYS_NO_LIGNE')->default(0);
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->double('TAXI')->default(0);
            $table->double('TRAIN')->default(0);
            $table->string('TYPE', 25)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_frais_detail');
    }
}
