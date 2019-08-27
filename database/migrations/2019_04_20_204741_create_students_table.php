<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('major_id');
            $table->unsignedInteger('language_id');
            $table->string('Foreign_fullname');
            $table->string('Arabic_fullname');
            $table->string('academic_year');
            $table->text('note')->nullable();
            $table->smallInteger('has_L3_Course');
            $table->string('branch');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('students');
        Schema::enableForeignKeyConstraints();
    }
}
