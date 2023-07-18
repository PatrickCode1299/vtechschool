<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriviaQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trivia_questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longtext('course_title');
            $table->longtext('module_title');
            $table->longtext('instructor_email');
            $table->longtext('trivia_question');
            $table->longtext('answer');
            $table->longtext('answer1');
            $table->longtext('answer2');
            $table->longtext('answer3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trivia_questions');
    }
}
