<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAideSocieteNafTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aide_societe_naf', function (Blueprint $table) {
            $table->string('CODE', 10)->default('')->index('CODE');
            $table->string('ID_AIDE_SOCIETE_NAF', 32)->default('')->primary();
            $table->char('IT_PART_TIME', 1)->default('');
            $table->string('LIBELLE', 300)->default('');
            $table->string('SEGMENT', 30)->default('');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->double('SYS_NO_LIGNE')->default(0);
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->char('TARGET_AT', 1)->default('');
            $table->char('TARGET_INNO', 1)->default('');
            $table->char('TARGET_ONSS', 1)->default('');
            $table->char('TARGET_PRP', 1)->default('');
            $table->char('TARGET_SOCIAL', 1)->default('');
            $table->decimal('TGG_2017', 6, 2)->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aide_societe_naf');
    }
}
