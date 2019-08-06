<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesLanguagesInstructors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_language_instructor', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('instructor_id');
            $table->unsignedInteger('course_language_id');
            $table->unsignedInteger('year_id');
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('course_language_id')->references('id')->on('course_language')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_language_instructor', function (Blueprint $table) {
            //
        });
    }
}
