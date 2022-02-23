<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot', function (Blueprint $table) {
            $table->date('DATE')->nullable();
            $table->string('EMAIL_DE_TEST', 50)->default('');
            $table->string('EMAIL_REPONDRE_A', 50)->default('');
            $table->double('ENVOIS_ARRIVES')->default(0);
            $table->double('ENVOIS_CLICS')->default(0);
            $table->double('ENVOIS_NON_OUVERTS')->default(0);
            $table->double('ENVOIS_OUVERTS')->default(0);
            $table->double('ENVOIS_REJETES')->default(0);
            $table->double('ENVOIS_TOTAL')->default(0);
            $table->double('ENVOIS_TOTAL_PAPIER')->default(0);
            $table->binary('ENVOI_EMAILING_MESSAGE');
            $table->string('FICHIER_FUSION', 100)->default('');
            $table->string('GESTION_MESSAGE', 30)->default('');
            $table->string('ID_LOT', 32)->default('')->primary();
            $table->binary('MEMO');
            $table->string('MESSAGE_HTML', 100)->default('');
            $table->string('MESSAGE_TXT', 100)->default('');
            $table->string('NO_LOT', 13)->default('')->index('NO_LOT');
            $table->string('PHONING_CATEGORIE', 20)->default('')->index('PHONING_CATEGORIE');
            $table->date('PHONING_DATE_APPEL')->nullable();
            $table->string('PHONING_OBJET', 80)->default('');
            $table->string('PHONING_SUIVI_PAR', 20)->default('');
            $table->string('PID_CAMPAGNE', 32)->default('')->index('PID_CAMPAGNE');
            $table->string('PIECES_JOINTES', 200)->default('');
            $table->string('SUJET', 100)->default('');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->string('TITRE', 100)->default('');
            $table->string('TYPE_LOT', 45)->default('');
            $table->date('VALIDATION')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lot');
    }
}
