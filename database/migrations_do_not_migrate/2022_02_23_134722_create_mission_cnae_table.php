<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionCnaeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_cnae', function (Blueprint $table) {
            $table->string('CCC', 15)->default('');
            $table->string('CNAE_NEW', 10)->default('');
            $table->string('CNAE_OLD', 10)->default('');
            $table->string('ID_MISSION_CNAE', 32)->default('')->primary();
            $table->string('LIBELLE_NEW', 50)->default('');
            $table->string('LIBELLE_OLD', 50)->default('');
            $table->string('PID_MISSION', 32)->default('')->index('PID_MISSION');
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
        Schema::dropIfExists('mission_cnae');
    }
}
