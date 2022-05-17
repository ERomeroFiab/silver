<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysGoogleDateSynchroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_google_date_synchro', function (Blueprint $table) {
            $table->string('ID_SYS_GOOGLE_DATE_SYNCHRO', 32)->default('')->primary();
            $table->dateTime('SYS_DATE_DERNIERE_SYNCHRO')->nullable()->index('SYS_DATE_DERNIERE_SYNCHRO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_google_date_synchro');
    }
}
