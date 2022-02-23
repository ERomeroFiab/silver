<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratPartielConditionFiancieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrat_partiel_condition_fiancieres', function (Blueprint $table) {
            $table->string('COMMENTS', 150)->default('');
            $table->string('ID_CONTRAT_PARTIEL_CONDITION_FIANCIERES', 32)->default('')->primary();
            $table->string('PID_CONTRAT', 32)->default('')->index('PID_CONTRAT');
            $table->string('PID_CONTRAT_DETAIL_PRODUIT', 32)->default('')->index('PID_CONTRAT_DETAIL_PRODUIT');
            $table->string('REMUNERATION', 10)->default('')->index('REMUNERATION');
            $table->string('SENS', 5)->default('');
            $table->double('SEUIL_MAX')->default(0);
            $table->double('SEUIL_MIN')->default(0);
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->double('VALEUR')->default(0);
            $table->string('YEAR', 15)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrat_partiel_condition_fiancieres');
    }
}
