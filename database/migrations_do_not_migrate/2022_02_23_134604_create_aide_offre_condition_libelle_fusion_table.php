<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAideOffreConditionLibelleFusionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aide_offre_condition_libelle_fusion', function (Blueprint $table) {
            $table->string('CLE', 35)->default('')->index('CLE');
            $table->string('ID_AIDE_OFFRE_CONDITION_LIBELLE_FUSION', 32)->default('')->primary();
            $table->string('LANGUE', 10)->default('')->index('LANGUE');
            $table->string('LIBELLE', 60)->default('');
            $table->string('PID_AIDE_OFFRE_CONDITION', 32)->default('')->index('PID_AIDE_OFFRE_CONDITION');
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
        Schema::dropIfExists('aide_offre_condition_libelle_fusion');
    }
}
