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
        Schema::create('tbl_evaluation_questions', function (Blueprint $table) {
            $table->id();
            $table->json('question');
            $table->enum('type', ['course_specific', 'general']);
            $table->bigInteger('course_id')->nullable();
            $table->enum('answer_type', ['text', 'rating_5', 'rating_10'])->default('text');
            $table->boolean('is_required')->default(false);
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_evaluation_questions');
    }
};
