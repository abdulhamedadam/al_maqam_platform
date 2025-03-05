<?php

use App\Models\Course;
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
        Schema::create('course_money', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class)->constrained()->cascadeOnDelete();
            $table->unsignedInteger('num_of_minutes');
            $table->decimal('lecture_price');
            $table->unsignedInteger('num_of_lectures');
            $table->unsignedTinyInteger('lectures_in_week');
            $table->decimal('total_price');
            $table->boolean('for_group')->default(0);
            $table->unsignedInteger('max_in_group')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_money');
    }
};
