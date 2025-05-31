<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('tbl_student_courses')
            ->where('status', 'canceled')
            ->update(['status' => 'cancelled']);

        Schema::table('tbl_student_courses', function (Blueprint $table) {
            $table->enum('status', ['scheduled', 'in_progress', 'ended', 'missed', 'cancelled'])
                    ->default('scheduled')
                    ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('tbl_student_courses')
        ->where('status', 'cancelled')
        ->update(['status' => 'canceled']);

        Schema::table('tbl_student_courses', function (Blueprint $table) {
            $table->enum('status', ['scheduled', 'in_progress', 'ended', 'missed', 'canceled'])
                ->default('scheduled')
                ->change();
        });
    }
};
