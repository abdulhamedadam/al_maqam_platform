<?php

use App\Models\TeacherDetail;
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
        Schema::create('teacher_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('status')->default(TeacherDetail::DEFAULT_STATUS);
            $table->json('admission_terms')->nullable();
            $table->string('education')->nullable();
            $table->enum('azhar', ['yazhar', 'nazhar'])->nullable();
            $table->enum('quran_license', ['ylicense', 'nlicense'])->nullable();
            $table->enum('other_license', ['yotherlicense', 'notherlicense'])->nullable();
            $table->string('other_license_details')->nullable();
            $table->enum('teaching_online', ['yteachingonline', 'nteachingonline'])->nullable();
            $table->json('communication_platforms')->nullable();
            $table->enum('teaching_kids', ['yteachingkids', 'nteachingkids'])->nullable();
            $table->json('teaching_subjects')->nullable();
            $table->json('working_hours')->nullable();
            $table->string('other_working_hours')->nullable();
            $table->json('work_shifts')->nullable();
            $table->enum('fri_sat_work', ['yfri-sat', 'nfri-sat'])->nullable();
            $table->string('audio_recording')->nullable();
            $table->string('cv_summary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_details');
    }
};
