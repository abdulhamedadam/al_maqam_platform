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
        Schema::create('tbl_teacher_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id');
            $table->decimal('hourly_rate', 10, 2)->default(20);
            $table->integer('total_hours')->default(0);
            $table->decimal('total_earnings', 15, 2)->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_teacher_accounts');
    }
};
