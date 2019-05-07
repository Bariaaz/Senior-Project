<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_language_id');
            $table->string('name');
            $table->string('display_name');
            $table->integer('max_grade');
            $table->string('exam_date');
            $table->smallInteger('is_written_exam');
            $table->smallInteger('is_session_one');
            $table->foreign('course_language_id')->references('id')->on('course_language')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
