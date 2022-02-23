<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTmpEcoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmp_eco', function (Blueprint $table) {
            $table->string('CLE_COMPANY', 32)->default('')->index('CLE_COMPANY');
            $table->string('CLE_ECO', 32)->default('')->index('CLE_ECO');
            $table->string('CLE_MISSION', 32)->default('')->index('CLE_MISSION');
            $table->string('CLE_MOTIVE', 32)->default('')->index('CLE_MOTIVE');
            $table->string('CONSULTANT', 20)->default('');
            $table->string('CURRENT_STEP', 50)->default('');
            $table->date('DEADLINE')->nullable();
            $table->double('ECO')->default(0);
            $table->date('ESTIMATED_DATE')->nullable();
            $table->string('ID_TMP_ECO', 32)->default('')->primary();
            $table->string('MOTIVE', 70)->default('');
            $table->string('MOTIVE_LIST', 150)->default('');
            $table->double('POURCENTAGE')->default(0);
            $table->string('SUBREASON1', 50)->default('');
            $table->string('SUBREASON2', 50)->default('');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->string('YEAR', 10)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tmp_eco');
    }
}
