<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->char('ARCHIVE', 1)->default('')->index('ARCHIVE');
            $table->longblob('DOCUMENT_FICHIER_CONTENU');
            $table->dateTime('DOCUMENT_FICHIER_DATE')->nullable()->index('DOCUMENT_FICHIER_DATE');
            $table->string('DOCUMENT_FICHIER_NOM', 100)->default('')->index('DOCUMENT_FICHIER_NOM');
            $table->double('DOCUMENT_FICHIER_TAILLE')->default(0);
            $table->string('DOCUMENT_FICHIER_TYPE', 50)->default('');
            $table->string('ID_DOCUMENTS', 32)->default('')->primary();
            $table->string('ORIGINE', 20)->default('');
            $table->string('PID_ACTION', 32)->default('')->index('PID_ACTION');
            $table->string('PID_AFFAIRE', 32)->default('')->index('PID_AFFAIRE');
            $table->string('PID_CONTACT', 32)->default('')->index('PID_CONTACT');
            $table->string('PID_CONTRAT', 32)->default('')->index('PID_CONTRAT');
            $table->string('PID_ECHANTILLON', 32)->default('')->index('PID_ECHANTILLON');
            $table->string('PID_EMAIL', 32)->default('')->index('PID_EMAIL');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PID_INVOICE', 32)->default('')->index('PID_INVOICE');
            $table->string('PID_MISSION', 32)->default('')->index('PID_MISSION');
            $table->string('PID_MISSION_AUDIT_REPORT', 32)->default('')->index('PID_MISSION_AUDIT_REPORT');
            $table->string('PID_OFFRE_ENTETE', 32)->default('')->index('PID_OFFRE_ENTETE');
            $table->string('PID_RECLAMATION', 32)->default('')->index('PID_RECLAMATION');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->string('TEMPO_VP', 200)->default('');
            $table->string('PID_CONTRAT_FOURNISSEUR', 32)->default('')->index('PID_CONTRAT_FOURNISSEUR');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
