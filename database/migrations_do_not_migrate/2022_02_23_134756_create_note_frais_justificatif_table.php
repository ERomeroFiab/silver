<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteFraisJustificatifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_frais_justificatif', function (Blueprint $table) {
            $table->string('ID_NOTE_FRAIS_JUSTIFICATIF', 32)->default('')->primary();
            $table->longblob('JUSTIFICATIF_FICHIER_CONTENU');
            $table->dateTime('JUSTIFICATIF_FICHIER_DATE')->nullable()->index('JUSTIFICATIF_FICHIER_DATE');
            $table->string('JUSTIFICATIF_FICHIER_NOM', 100)->default('')->index('JUSTIFICATIF_FICHIER_NOM');
            $table->double('JUSTIFICATIF_FICHIER_TAILLE')->default(0);
            $table->string('JUSTIFICATIF_FICHIER_TYPE', 50)->default('');
            $table->string('PID_NOTE_FRAIS', 32)->default('')->index('PID_NOTE_FRAIS');
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
        Schema::dropIfExists('note_frais_justificatif');
    }
}
