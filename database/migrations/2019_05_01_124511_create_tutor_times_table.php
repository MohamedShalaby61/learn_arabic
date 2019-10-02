<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->time('from');
            $table->time('to');
            $table->integer('duration')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->datetime('booked_datetime')->nullable();
            $table->unsignedBigInteger('tutor_id');
            $table->foreign('tutor_id')
                  ->references('id')->on('tutors')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('booked_user_id')->nullable();
            $table->foreign('booked_user_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('tutor_times');
    }
}
