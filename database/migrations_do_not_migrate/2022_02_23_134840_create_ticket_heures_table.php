<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketHeuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_heures', function (Blueprint $table) {
            $table->binary('COMMENTAIRE');
            $table->string('CONSULTANT', 20)->default('')->index('CONSULTANT');
            $table->date('DATE')->nullable();
            $table->time('HEURE_DEBUT')->default('00:00:00');
            $table->time('HEURE_FIN')->default('00:00:00');
            $table->string('ID_TICKET_HEURES', 32)->default('')->primary();
            $table->char('MANUEL', 1)->default('')->index('MANUEL');
            $table->string('PID_TICKET', 32)->default('')->index('PID_TICKET');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->double('SYS_NO_LIGNE')->default(0);
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->double('TEMPS_PASSE')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_heures');
    }
}
