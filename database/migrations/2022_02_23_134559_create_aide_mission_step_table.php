<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAideMissionStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aide_mission_step', function (Blueprint $table) {
            $table->double('DUREE')->default(0);
            $table->string('ETAPE', 50)->default('');
            $table->string('FAMILLE', 30)->default('')->index('FAMILLE');
            $table->string('ID_AIDE_MISSION_STEP', 32)->default('')->primary();
            $table->string('MOTIF', 70)->default('')->index('MOTIF');
            $table->string('PID_AIDE_MISSION_MOTIF', 32)->default('')->index('PID_AIDE_MISSION_MOTIF');
            $table->double('POURCENTAGE')->default(0);
            $table->string('PRODUIT', 50)->default('')->index('PRODUIT');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->char('TO_AUDIT', 1)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aide_mission_step');
    }
}
