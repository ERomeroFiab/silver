<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAideSocieteSubSectorGeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aide_societe_sub_sector_geo', function (Blueprint $table) {
            $table->string('ID_AIDE_SOCIETE_SUB_SECTOR_GEO', 32)->default('')->primary();
            $table->string('SUB_SECTOR', 15)->default('');
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
        Schema::dropIfExists('aide_societe_sub_sector_geo');
    }
}
