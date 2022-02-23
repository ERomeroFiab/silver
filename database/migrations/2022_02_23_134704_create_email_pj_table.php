<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailPjTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_pj', function (Blueprint $table) {
            $table->string('ID_EMAIL_PJ', 32)->default('')->primary();
            $table->string('ORIGINE', 10)->default('');
            $table->string('PID_EMAIL', 32)->default('')->index('PID_EMAIL');
            $table->longblob('PJ_FICHIER_CONTENU');
            $table->dateTime('PJ_FICHIER_DATE')->nullable()->index('PJ_FICHIER_DATE');
            $table->string('PJ_FICHIER_NOM', 100)->default('')->index('PJ_FICHIER_NOM');
            $table->double('PJ_FICHIER_TAILLE')->default(0);
            $table->string('PJ_FICHIER_TYPE', 50)->default('');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
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
        Schema::dropIfExists('email_pj');
    }
}
