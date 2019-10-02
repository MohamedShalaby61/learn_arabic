<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->text('certificates')->nullable();
            $table->text('teaching_experience')->nullable();
            $table->text('profession')->nullable();
            $table->text('education')->nullable();
            $table->text('interests')->nullable();
            $table->text('enjoys_discussing')->nullable();
            $table->tinyInteger('online')->nullable();
            $table->datetime('last_online')->nullable();
            $table->tinyInteger('rating')->nullable();
            $table->text('levels')->nullable();
            $table->integer('chats_count')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')
                  ->references('id')->on('countries')
                  ->onDelete('cascade');
            $table->string('city')->nullable();
            $table->unsignedBigInteger('lessons_type_id');
            $table->foreign('lessons_type_id')
                  ->references('id')->on('lessons_types')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('tutoring_personality_id');
            $table->foreign('tutoring_personality_id')
                  ->references('id')->on('tutoring_personalities')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('accent_id');
            $table->foreign('accent_id')
                  ->references('id')->on('accents')
                  ->onDelete('cascade');
            $table->tinyInteger('status')->nullable()->default(1);
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
        Schema::dropIfExists('tutors');
    }
}
