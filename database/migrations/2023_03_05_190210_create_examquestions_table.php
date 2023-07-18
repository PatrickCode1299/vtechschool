<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamquestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examquestions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('course_title');
            $table->string('tutor_email');
            $table->longtext('question');
            $table->longtext('answer1');
            $table->longtext('answer2');
            $table->longtext('answer3');
            $table->longtext('answer4');
            $table->longtext('question_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examquestions');
    }
}
