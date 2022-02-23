<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAideInvoiceLibelleFusionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aide_invoice_libelle_fusion', function (Blueprint $table) {
            $table->string('CLE', 40)->default('')->index('CLE');
            $table->string('CODE_FUSION', 20)->default('')->index('CODE_FUSION');
            $table->string('ID_AIDE_INVOICE_LIBELLE_FUSION', 32)->default('')->primary();
            $table->string('LANGUE', 2)->default('')->index('LANGUE');
            $table->string('LIBELLE_1', 60)->default('');
            $table->string('LIBELLE_2', 60)->default('');
            $table->string('LIBELLE_3', 60)->default('');
            $table->string('PID_AIDE_MISSION_MOTIF', 32)->default('')->index('PID_AIDE_MISSION_MOTIF');
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
        Schema::dropIfExists('aide_invoice_libelle_fusion');
    }
}
