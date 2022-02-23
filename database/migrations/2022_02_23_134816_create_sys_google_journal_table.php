<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysGoogleJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_google_journal', function (Blueprint $table) {
            $table->string('ID_SYS_GOOGLE_JOURNAL', 32)->default('')->primary();
            $table->dateTime('SYS_DATE_SYNCHRO')->nullable()->index('SYS_DATE_SYNCHRO');
            $table->longblob('SYS_FICHIER_CONTENU');
            $table->dateTime('SYS_FICHIER_DATE')->nullable()->index('SYS_FICHIER_DATE');
            $table->string('SYS_FICHIER_NOM', 100)->default('')->index('SYS_FICHIER_NOM');
            $table->double('SYS_FICHIER_TAILLE')->default(0);
            $table->string('SYS_FICHIER_TYPE', 50)->default('');
            $table->string('SYS_STATUT', 200)->default('')->index('SYS_STATUT');
            $table->string('SYS_TYPE', 30)->default('')->index('SYS_TYPE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_google_journal');
    }
}
