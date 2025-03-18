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
        Schema::create('tbl_teacher_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id');
            $table->string('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->text('note')->nullable();
            $table->boolean('is_booked')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_teacher_schedules');
    }
};
