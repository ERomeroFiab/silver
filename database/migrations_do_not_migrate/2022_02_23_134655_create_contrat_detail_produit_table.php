<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratDetailProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrat_detail_produit', function (Blueprint $table) {
            $table->string('DUPLICATION_CONTRAT_ID', 32)->default('');
            $table->string('ID_CONTRAT_DETAIL_PRODUIT', 32)->default('')->primary();
            $table->string('NO_CONTRAT_PARTIEL', 25)->default('')->index('NO_CONTRAT_PARTIEL');
            $table->string('PID_CONTRAT', 32)->default('')->index('PID_CONTRAT');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PRODUIT', 50)->default('')->index('PRODUIT');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->string('VP_NO_CONTRAT', 10)->default('')->index('VP_NO_CONTRAT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrat_detail_produit');
    }
}
