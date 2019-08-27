<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_language', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('language_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('course_language');
        Schema::enableForeignKeyConstraints();
    }
}
