<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionMotiveEcoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_motive_eco', function (Blueprint $table) {
            $table->date('DATE_PREVISIONNELLE')->nullable();
            $table->double('ECO_ABANDONNEE')->default(0);
            $table->double('ECO_A_FACTURER')->default(0);
            $table->double('ECO_ECART')->default(0);
            $table->double('ECO_PRESENTEE')->default(0);
            $table->double('ECO_VALIDEE')->default(0);
            $table->string('ID_MISSION_MOTIVE_ECO', 32)->default('')->primary();
            $table->binary('NOTES');
            $table->double('PACKAGE')->default(0);
            $table->string('PID_MISSION_MOTIVE', 32)->default('')->index('PID_MISSION_MOTIVE');
            $table->char('SELECTION_ECO_A_FACTURER', 1)->default('');
            $table->char('SELECTION_ECO_VALIDEE', 1)->default('');
            $table->char('SELECTION_FACTURATION', 1)->default('');
            $table->string('SOUS_MOTIF_1', 50)->default('');
            $table->string('SOUS_MOTIF_1_FROM_MONTH', 2)->default('');
            $table->string('SOUS_MOTIF_1_FROM_YEAR', 4)->default('');
            $table->string('SOUS_MOTIF_1_TO_MONTH', 2)->default('');
            $table->string('SOUS_MOTIF_1_TO_YEAR', 4)->default('');
            $table->string('SOUS_MOTIF_2', 50)->default('');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->string('TMP_NO_INVOICE', 10)->default('');
            $table->string('YEAR', 10)->default('');
            $table->string('CRITICITY', 1)->default('');
            $table->string('TIME', 1)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission_motive_eco');
    }
}
