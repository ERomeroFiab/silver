<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('ADDRESS2_FIABILIS', 60)->default('');
            $table->string('ADDRESS_FIABILIS', 60)->default('');
            $table->char('BELGIAN_OPTION', 1)->default('');
            $table->string('BIC', 10)->default('');
            $table->char('CHILEAN_OPTION', 1)->default('');
            $table->string('CITY_FIABILIS', 60)->default('');
            $table->string('CLIENT_REVIEW_LABEL', 100)->default('');
            $table->string('COMPANY_NAME', 60)->default('');
            $table->string('CONTRACT_COUNTER_PREFIX', 10)->default('');
            $table->double('CONTRACT_DUNNING_PERIOD')->default(0);
            $table->double('CONTRACT_DURATION')->default(0);
            $table->string('COUNTRY', 30)->default('');
            $table->string('CREDIT_NOTE_COUNTER_PREFIX', 10)->default('');
            $table->char('DUTCH_OPTION', 1)->default('');
            $table->string('FISCAL_NAME_1', 30)->default('');
            $table->string('FISCAL_NAME_2', 30)->default('');
            $table->string('FISCAL_NAME_3', 30)->default('');
            $table->char('FRENCH_OPTION', 1)->default('');
            $table->string('IBAN', 20)->default('');
            $table->string('ID_FIABILIS', 3)->default('')->index('ID_FIABILIS');
            $table->string('ID_SETTINGS', 32)->default('')->primary();
            $table->string('INVOICE_COUNTER_PREFIX', 10)->default('');
            $table->char('ITALIAN_OPTION', 1)->default('');
            $table->double('MILES_RATES')->default(0);
            $table->string('MISSION_AUDIT_REPORT_COUNTER_PREFIX', 10)->default('');
            $table->string('MISSION_COUNTER_PREFIX', 10)->default('');
            $table->string('MISSION_PM_NAME', 30)->default('');
            $table->char('MISSION_SHOW_COORDINATOR', 1)->default('');
            $table->string('NACE_NAME', 30)->default('');
            $table->string('OPPORTUNITY_COUNTER_PREFIX', 10)->default('');
            $table->char('POLISH_OPTION', 1)->default('');
            $table->double('SAGE_NO_PIECE_FCG')->default(0);
            $table->double('SAGE_NO_PIECE_JIB')->default(0);
            $table->double('SAGE_NO_PIECE_PRAE')->default(0);
            $table->char('SHOW_FISCAL_2', 1)->default('');
            $table->char('SHOW_FISCAL_3', 1)->default('');
            $table->char('SPANISH_OPTION', 1)->default('');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->string('TURNOVER_NAME', 30)->default('');
            $table->string('TURNOVER_NAME_2', 30)->default('');
            $table->binary('TWITTER_WIDGET');
            $table->string('VAT_NUMBER_FIABILIS', 20)->default('');
            $table->double('VAT_RATE')->default(0);
            $table->string('WORKFORCE_NAME', 30)->default('');
            $table->string('WORKFORCE_NAME_2', 30)->default('');
            $table->string('ZIP_CODE_FIABILIS', 10)->default('');
            $table->time('GENERIC_GROUP_INACTIVITY_TIME_1')->default('00:00:00');
            $table->time('GENERIC_GROUP_INACTIVITY_TIME_2')->default('00:00:00');
            $table->time('GENERIC_GROUP_INACTIVITY_TIME_3')->default('00:00:00');
            $table->dateTime('GENERIC_GROUP_STARTING_DATE')->nullable();
            $table->char('GERMAN_OPTION', 1)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
