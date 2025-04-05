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
        Schema::create('tbl_zoom_meetings', function (Blueprint $table) {
            $table->id();
            $table->integer('appointment_id');
            $table->string('topic');
            $table->string('meeting_id');
            $table->string('join_url');
            $table->string('password');
            $table->dateTime('start_time');
            $table->integer('duration')->default(60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_zoom_meetings');
    }
};
