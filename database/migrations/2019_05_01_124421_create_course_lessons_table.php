<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->mediumText('content');
            $table->text('categories')->nullable();
            $table->text('related_lessons')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('sort')->nullable();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
                  ->references('id')->on('courses')
                  ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_lessons');
    }
}
