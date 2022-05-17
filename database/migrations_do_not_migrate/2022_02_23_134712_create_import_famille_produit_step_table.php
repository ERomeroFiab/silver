<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportFamilleProduitStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_famille_produit_step', function (Blueprint $table) {
            $table->string('ID_IMPORT_FAMILLE_PRODUIT_STEP', 32)->default('')->primary();
            $table->string('ST_ETAPE', 100)->default('')->index('ST_ETAPE');
            $table->string('ST_FAMILLE', 100)->default('')->index('ST_FAMILLE');
            $table->string('ST_MOTIF', 100)->default('')->index('ST_MOTIF');
            $table->string('ST_PRODUIT', 100)->default('')->index('ST_PRODUIT');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->string('VP_ETAPE', 100)->default('')->index('VP_ETAPE');
            $table->string('VP_FAMILLE', 100)->default('')->index('VP_FAMILLE');
            $table->string('VP_PRODUIT', 100)->default('')->index('VP_PRODUIT');
            $table->string('VP_SITE', 100)->default('')->index('VP_SITE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_famille_produit_step');
    }
}
