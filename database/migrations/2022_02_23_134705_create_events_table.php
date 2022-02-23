<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->string('CITY', 60)->default('')->index('CITY');
            $table->string('COMMENTS', 50)->default('');
            $table->char('CONFIRMATION_SENT', 1)->default('');
            $table->string('EVENTS', 30)->default('')->index('EVENTS');
            $table->date('EVENTS_DATE')->nullable();
            $table->string('ID_EVENTS', 32)->default('')->primary();
            $table->string('MANAGER1', 3)->default('');
            $table->string('MANAGER2', 3)->default('');
            $table->string('PID_CONTACT', 32)->default('')->index('PID_CONTACT');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('QUALIFICATION', 10)->default('');
            $table->string('SELECT_CONTACT_EVENTS', 60)->default('');
            $table->string('STATUS', 20)->default('')->index('STATUS');
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
        Schema::dropIfExists('events');
    }
}
