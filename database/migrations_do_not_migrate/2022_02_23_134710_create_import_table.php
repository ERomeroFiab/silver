<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import', function (Blueprint $table) {
            $table->string('C1', 200)->default('');
            $table->string('C10', 100)->default('');
            $table->string('C11', 100)->default('');
            $table->string('C12', 100)->default('');
            $table->string('C13', 100)->default('');
            $table->string('C14', 100)->default('');
            $table->string('C15', 100)->default('');
            $table->string('C2', 100)->default('');
            $table->string('C3', 100)->default('');
            $table->string('C4', 100)->default('');
            $table->string('C5', 100)->default('');
            $table->string('C6', 100)->default('');
            $table->string('C7', 100)->default('');
            $table->string('C8', 100)->default('');
            $table->string('C9', 100)->default('');
            $table->string('ID_IMPORT', 32)->default('')->primary();
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
        Schema::dropIfExists('import');
    }
}
