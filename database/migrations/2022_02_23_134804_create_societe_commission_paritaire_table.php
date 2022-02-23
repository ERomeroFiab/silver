<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocieteCommissionParitaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societe_commission_paritaire', function (Blueprint $table) {
            $table->string('COMMISSION_PARITAIRE', 10)->default('');
            $table->double('EFFECTIF')->default(0);
            $table->string('ID_SOCIETE_COMMISSION_PARITAIRE', 32)->default('')->primary();
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('societe_commission_paritaire');
    }
}
