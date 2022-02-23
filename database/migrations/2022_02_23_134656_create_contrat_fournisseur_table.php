<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratFournisseurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrat_fournisseur', function (Blueprint $table) {
            $table->string('BILLING_CYCLE_TIME', 20)->default('');
            $table->string('CANCELLATION', 100)->default('');
            $table->string('CONTACT_EMAIL', 50)->default('');
            $table->string('CONTACT_FIRST_NAME', 36)->default('');
            $table->string('CONTACT_NAME', 80)->default('');
            $table->string('CONTACT_TITLE', 30)->default('');
            $table->date('CONTRACT_ENDING_DATE')->nullable();
            $table->string('CONTRACT_REFERENCE', 30)->default('');
            $table->date('CONTRACT_STARTING_DATE')->nullable();
            $table->double('DURATION_CONTRACT')->default(0);
            $table->decimal('ESTIMATED_ANNUAL_AMOUNT', 10, 2)->default(0.00);
            $table->string('ID_CONTRAT_FOURNISSEUR', 32)->default('')->primary();
            $table->binary('NOTES');
            $table->double('NUMBER_OF_DAYS_BEFORE_CANCELLATION')->default(0);
            $table->method`('PAYMENT');
            $table->string('PID_CONTACT', 32)->default('')->index('PID_CONTACT');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('SUBJECT', 100)->default('');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->renewal`('TACIT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrat_fournisseur');
    }
}
