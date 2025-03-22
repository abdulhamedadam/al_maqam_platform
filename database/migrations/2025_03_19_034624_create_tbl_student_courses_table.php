<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_student_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('teacher_id');
            $table->integer('course_id');
            $table->integer('money_id');
            $table->string('day');
            $table->string('start_time');
            $table->string('end_time');
            $table->enum('payment_method', ['Fawry', 'Aman', 'mastercard-visa', 'mobile_wallet', 'bank-transfer'])->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_student_courses');
    }
};
