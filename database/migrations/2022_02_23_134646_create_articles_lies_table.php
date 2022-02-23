<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesLiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_lies', function (Blueprint $table) {
            $table->string('CODE', 25)->default('');
            $table->string('DESIGNATION', 50)->default('');
            $table->string('ID_ARTICLES_LIES', 32)->default('')->primary();
            $table->string('PID_ARTICLE', 32)->default('')->index('PID_ARTICLE');
            $table->double('QUANTITE')->default(0);
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles_lies');
    }
}
