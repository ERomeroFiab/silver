<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission', function (Blueprint $table) {
            $table->string('COORDINATOR', 20)->default('')->index('COORDINATOR');
            $table->string('CURRENT_STEP', 50)->default('');
            $table->date('DATE_DEBUT')->nullable()->index('DATE_DEBUT');
            $table->date('DATE_DEBUT_ANALYSE')->nullable();
            $table->date('DATE_FIN_ANALYSE')->nullable();
            $table->date('DATE_FIN_MISSION')->nullable();
            $table->date('DEADLINE')->nullable();
            $table->string('FAMILLE', 30)->default('')->index('FAMILLE');
            $table->string('ID_MISSION', 32)->default('')->primary();
            $table->string('NO_CONTRAT', 20)->default('')->index('NO_CONTRAT');
            $table->string('NO_MISSION', 20)->default('')->index('NO_MISSION');
            $table->string('PID_CONTRAT', 32)->default('')->index('PID_CONTRAT');
            $table->string('PID_CONTRAT_DETAIL_PRODUIT', 32)->default('')->index('PID_CONTRAT_DETAIL_PRODUIT');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->double('POURCENTAGE')->default(0);
            $table->string('PRIORITY', 1)->default('');
            $table->string('PRODUIT', 50)->default('')->index('PRODUIT');
            $table->string('PROJECT_MANAGER', 20)->default('')->index('PROJECT_MANAGER');
            $table->char('STEPS_MANAGED_FROM_MOTIVE', 1)->default('');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->double('VP_FEES')->default(0);
            $table->string('VP_N_CONTRAT_CADRE', 15)->default('');
            $table->string('VP_N_CONTRAT_PARTIEL', 15)->default('')->index('VP_N_CONTRAT_PARTIEL');
            $table->string('VP_PRODUCT', 60)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission');
    }
}
