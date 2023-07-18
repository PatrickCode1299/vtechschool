<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('student_name');
            $table->string('student_email');
            $table->string('course_name');
            $table->string('instructor_name');
            $table->string('instructor_email')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('payment_amount')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('status');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
