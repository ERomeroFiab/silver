<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrUserloginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_userlogin', function (Blueprint $table) {
            $table->string('user', 128);
            $table->char('password', 255)->nullable();
            $table->string('name', 60)->nullable();
            $table->boolean('admin')->default(0);
            $table->dateTime('passworddate')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('telephone', 100)->nullable();
            $table->integer('authentication')->default(2);
            $table->integer('ask_pw_change')->default(0);
            $table->integer('organization_id')->nullable();
            $table->tinyInteger('disabled')->nullable();
            
            $table->primary(['user', 'authentication']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_userlogin');
    }
}
