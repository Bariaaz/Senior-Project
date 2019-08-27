<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('fileNumber')->unique();
            $table->smallInteger('is_active');
            $table->string('password');
            $table->String('phone_Number');
            $table->unsignedInteger('role_id');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
