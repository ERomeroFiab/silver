<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysTrackEmailingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_track_emailing', function (Blueprint $table) {
            $table->string('ID_SYS_TRACK_EMAILING', 32)->default('')->primary();
            $table->string('SYS_CATEGORIE_NON_DELIVRE', 25)->default('')->index('SYS_CATEGORIE_NON_DELIVRE');
            $table->string('SYS_CODE_CAMPAGNE', 32)->default('')->index('SYS_CODE_CAMPAGNE');
            $table->string('SYS_CODE_DESTINATAIRE', 32)->default('')->index('SYS_CODE_DESTINATAIRE');
            $table->date('SYS_DATE')->nullable()->index('SYS_DATE');
            $table->string('SYS_EMAIL_DESTINATAIRE', 100)->default('')->index('SYS_EMAIL_DESTINATAIRE');
            $table->time('SYS_HEURE')->default('00:00:00')->index('SYS_HEURE');
            $table->string('SYS_LIEN_REEL', 100)->default('')->index('SYS_LIEN_REEL');
            $table->string('SYS_MESSAGE_NON_DELIVRE', 50)->default('')->index('SYS_MESSAGE_NON_DELIVRE');
            $table->string('SYS_MOTIF_UNSUBSCRIBED', 100)->default('')->index('SYS_MOTIF_UNSUBSCRIBED');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->char('SYS_TRAITE', 1)->default('')->index('SYS_TRAITE');
            $table->string('SYS_TYPE_ACTION', 20)->default('')->index('SYS_TYPE_ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_track_emailing');
    }
}
