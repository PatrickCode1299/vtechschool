<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('course_title');
            $table->text('file1');
            $table->string('student_name')->nullable();
            $table->string('tutors_name');
            $table->string('unique_id');
            $table->string('price');
            $table->string('module_title');
            $table->string('preview');
            $table->string('views')->nullable();
            $table->string('category');
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
