<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEchantillonArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('echantillon_article', function (Blueprint $table) {
            $table->string('CODE_ARTICLE', 18)->default('');
            $table->string('ID_ECHANTILLON_ARTICLE', 32)->default('')->primary();
            $table->string('LIBELLE_ARTICLE', 30)->default('');
            $table->string('PID_ARTICLE', 32)->default('')->index('PID_ARTICLE');
            $table->string('PID_ECHANTILLON', 32)->default('')->index('PID_ECHANTILLON');
            $table->double('PRIX_TOTAL')->default(0);
            $table->double('PRIX_TOTAL_CLIENT')->default(0);
            $table->double('PRIX_VENTE')->default(0);
            $table->double('PRIX_VENTE_CLIENT')->default(0);
            $table->double('QTE_UVC')->default(0);
            $table->string('SYS_CONTEXTE', 32)->default('')->index('SYS_CONTEXTE');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->double('SYS_NO_LIGNE')->default(0);
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->string('TAILLE', 10)->default('');
            $table->string('UVC', 10)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('echantillon_article');
    }
}
