<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAideSocieteUrssafTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aide_societe_urssaf', function (Blueprint $table) {
            $table->string('ADRESSE1', 35)->default('');
            $table->string('ADRESSE2', 35)->default('');
            $table->string('CODE_INTERNE', 3)->default('');
            $table->string('CODE_POSTAL', 5)->default('');
            $table->string('ID_AIDE_SOCIETE_URSSAF', 32)->default('')->primary();
            $table->string('NOM', 40)->default('');
            $table->string('NOM_ABREGE', 10)->default('');
            $table->string('NO_NATIONAL_EMETTEUR', 6)->default('');
            $table->string('SIRET', 14)->default('');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->string('VILLE', 35)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aide_societe_urssaf');
    }
}
