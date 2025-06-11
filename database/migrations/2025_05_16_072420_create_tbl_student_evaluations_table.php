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
        Schema::create('tbl_student_evaluations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('appointment_id');
            $table->bigInteger('student_id');
            $table->bigInteger('teacher_id');
            $table->json('answers');
            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_student_evaluations');
    }
};
