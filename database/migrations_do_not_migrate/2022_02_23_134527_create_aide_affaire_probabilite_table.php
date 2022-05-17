<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAideAffaireProbabiliteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aide_affaire_probabilite', function (Blueprint $table) {
            $table->string('ID_AIDE_AFFAIRE_PROBABILITE', 32)->default('')->primary();
            $table->string('LIBELLE_PROBABILITE', 10)->default('');
            $table->double('PROBABILITE')->default(0);
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->double('SYS_NO_LIGNE')->default(0);
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aide_affaire_probabilite');
    }
}