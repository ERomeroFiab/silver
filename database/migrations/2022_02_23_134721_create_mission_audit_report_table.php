<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionAuditReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_audit_report', function (Blueprint $table) {
            $table->date('DATE_PRESENTATION_RAPPORT')->nullable();
            $table->date('DATE_RAPPORT')->nullable();
            $table->date('DATE_VALIDATION_RAPPORT')->nullable();
            $table->string('ID_MISSION_AUDIT_REPORT', 32)->default('')->primary();
            $table->string('NO_AUDIT_REPORT', 25)->default('')->index('NO_AUDIT_REPORT');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PID_MISSION', 32)->default('')->index('PID_MISSION');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->char('VALIDATION', 1)->default('');
            $table->string('VALIDATION_USER', 20)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission_audit_report');
    }
}
