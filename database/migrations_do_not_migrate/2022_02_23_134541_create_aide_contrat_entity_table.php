<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAideContratEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aide_contrat_entity', function (Blueprint $table) {
            $table->string('IBAN', 30)->default('');
            $table->string('ID_AIDE_CONTRAT_ENTITY', 32)->default('')->primary();
            $table->string('INITIALS', 10)->default('');
            $table->string('NAME', 50)->default('')->index('NAME');
            $table->double('NB_ANNEE_A_SOUSTRAIRE')->default(0);
            $table->string('PREFIX_COMPTEUR', 10)->default('');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->string('VALEUR_COMPTEUR_CREDIT_NOTE', 4)->default('');
            $table->string('VALEUR_COMPTEUR_INVOICE', 4)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aide_contrat_entity');
    }
}
