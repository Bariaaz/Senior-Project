<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('course_language_id');
            $table->unsignedInteger('year_id');
            $table->timestamps();
            $table->foreign('course_language_id')->references('id')->on('course_language')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('groups');
        Schema::enableForeignKeyConstraints();
    }
}
