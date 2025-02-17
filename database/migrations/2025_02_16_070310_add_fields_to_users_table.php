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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->date('birthday')->nullable()->after('phone');
            $table->enum('gender', ['m', 'f'])->nullable()->after('birthday');
            $table->string('country')->nullable()->after('gender');
            $table->string('state')->nullable()->after('country');
            $table->string('role')->default('student')->after('state');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'birthday', 'gender', 'country', 'state', 'role']);
        });
    }
};
