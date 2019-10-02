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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                  ->references('id')->on('students')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')
                  ->references('id')->on('countries')
                  ->onDelete('cascade');
            $table->string('city')->nullable();
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
        Schema::dropIfExists('students');
    }
}
