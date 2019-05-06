<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_student', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('group_id');
            $table->smallInteger('is_active');
            $table->timestamp('start_date')->useCurrent();
            $table->timestamp('leave_date')->useCurrent();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_student', function (Blueprint $table) {
            //
        });
    }
}
