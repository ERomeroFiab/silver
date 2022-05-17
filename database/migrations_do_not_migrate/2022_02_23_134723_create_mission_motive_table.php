<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionMotiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_motive', function (Blueprint $table) {
            $table->string('COMMENTS_SITE', 50)->default('');
            $table->string('CONSULTANT', 20)->default('')->index('CONSULTANT');
            $table->date('DATE_LIMITE')->nullable()->index('DATE_LIMITE');
            $table->string('ETAPE_COURANTE', 50)->default('')->index('ETAPE_COURANTE');
            $table->string('ID_MISSION_MOTIVE', 32)->default('')->primary();
            $table->string('MOTIF', 70)->default('')->index('MOTIF');
            $table->string('PID_MISSION', 32)->default('')->index('PID_MISSION');
            $table->double('POURCENTAGE')->default(0);
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
        Schema::dropIfExists('mission_motive');
    }
}
