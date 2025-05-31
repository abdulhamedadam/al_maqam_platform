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
            $table->boolean('notified_30_min')->default(false);
            $table->boolean('notified_10_min')->default(false);
            $table->boolean('notified_start')->default(false);
            $table->boolean('notified_missed')->default(false);
            $table->boolean('notified_ended')->default(false);
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_student_courses', function (Blueprint $table) {
            $table->dropColumn('notified_30_min');
            $table->dropColumn('notified_10_min');
            $table->dropColumn('notified_start');
            $table->dropColumn('notified_missed');
            $table->dropColumn('notified_ended');
            $table->dropColumn('started_at');
            $table->dropColumn('ended_at');
        });
    }
};
