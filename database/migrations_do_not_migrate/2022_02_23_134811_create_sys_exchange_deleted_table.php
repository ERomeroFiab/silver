<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysExchangeDeletedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_exchange_deleted', function (Blueprint $table) {
            $table->string('ID_SYS_EXCHANGE_DELETED', 32)->default('')->primary();
            $table->string('SYS_ID_EXCHANGE', 300)->default('')->index('SYS_ID_EXCHANGE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_exchange_deleted');
    }
}
