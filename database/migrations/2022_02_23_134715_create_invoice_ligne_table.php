<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceLigneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_ligne', function (Blueprint $table) {
            $table->double('AMOUNT')->default(0);
            $table->string('CN_CHOICE', 15)->default('');
            $table->date('CN_ESTIMATED_DATE')->nullable();
            $table->binary('COMMENTAIRE');
            $table->char('DISPLAY_NEW_FEE', 1)->default('');
            $table->double('ECO_AMOUNT')->default(0);
            $table->double('FEES')->default(0)->index('FEES');
            $table->char('FEE_INCLUDES_VAT', 1)->default('');
            $table->string('ID_INVOICE_LIGNE', 32)->default('')->primary();
            $table->string('MOTIVE', 70)->default('')->index('MOTIVE');
            $table->double('NO_LIGNE')->default(0);
            $table->string('PID_INVOICE', 32)->default('')->index('PID_INVOICE');
            $table->string('PID_INVOICE_LIGNE', 32)->default('')->index('PID_INVOICE_LIGNE');
            $table->string('PID_MISSION_MOTIVE_ECO', 32)->default('')->index('PID_MISSION_MOTIVE_ECO');
            $table->string('PRODUCT', 50)->default('')->index('PRODUCT');
            $table->string('SUB_MOTIVE1', 50)->default('');
            $table->string('SUB_MOTIVE2', 50)->default('');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->string('TYPE', 10)->default('')->index('TYPE');
            $table->string('YEAR', 10)->default('')->index('YEAR');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_ligne');
    }
}
