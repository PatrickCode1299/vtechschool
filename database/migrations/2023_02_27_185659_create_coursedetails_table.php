<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursedetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("user_start_date");
            $table->string('course_title');
            $table->string('owner_email');
            $table->string('tutor_email');
            $table->string('views');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coursedetails');
    }
}
