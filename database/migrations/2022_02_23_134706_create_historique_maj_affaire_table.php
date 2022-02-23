<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriqueMajAffaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historique_maj_affaire', function (Blueprint $table) {
            $table->string('ANCIENNE_VALEUR', 10)->default('');
            $table->string('ANCIENNE_VALEUR_LIBELLE', 100)->default('');
            $table->string('CHAMPS', 12)->default('');
            $table->date('DATE')->nullable();
            $table->string('ID_HISTORIQUE_MAJ_AFFAIRE', 32)->default('')->primary();
            $table->string('NOUVELLE_VALEUR', 10)->default('');
            $table->string('NOUVELLE_VALEUR_LIBELLE', 100)->default('');
            $table->string('PID_AFFAIRE', 32)->default('')->index('PID_AFFAIRE');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->string('USER', 10)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historique_maj_affaire');
    }
}
