<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseLessonCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_lesson_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comment');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('course_lesson_id');
            $table->foreign('course_lesson_id')
                  ->references('id')->on('course_lessons')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('course_lesson_comments');
    }
}
