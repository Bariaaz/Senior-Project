<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_instructor', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('instructor_id');
            $table->unsignedInteger('group_id');
            $table->smallInteger('is_active');
            $table->timestamp('start_date')->useCurrent()->nullable();
            $table->timestamp('leave_date')->useCurrent()->nullable();
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('group_id')->references('id')->on('instructors')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_instructor', function (Blueprint $table) {
            //
        });
    }
}
