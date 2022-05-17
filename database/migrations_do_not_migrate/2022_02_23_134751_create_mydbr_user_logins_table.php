<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrUserLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_user_logins', function (Blueprint $table) {
            $table->string('username', 128);
            $table->integer('authentication');
            $table->string('session_hash', 40);
            $table->dateTime('login_at')->nullable();
            $table->dateTime('logout_at')->nullable();
            
            $table->primary(['username', 'authentication', 'session_hash']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_user_logins');
    }
}
