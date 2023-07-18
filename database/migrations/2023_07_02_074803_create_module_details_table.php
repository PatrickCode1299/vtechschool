<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("module_title");
            $table->text("student_email");
            $table->text("creator_email");
            $table->text("trivia_answered");

        });
       

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_details');
    }
}
