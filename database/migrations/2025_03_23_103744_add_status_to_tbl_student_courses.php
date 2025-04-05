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
        Schema::table('tbl_student_courses', function (Blueprint $table) {
            $table->enum('status', ['scheduled', 'in_progress', 'ended', 'missed', 'canceled'])->default('scheduled')->after('end_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_student_courses', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
