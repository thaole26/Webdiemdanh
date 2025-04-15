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
        Schema::table("attendance", function (Blueprint $table) {
            $table->foreignId('study_session_id')->references('study_session_id')->on('study_session')->index('attendance_study_session_id');
            $table->foreignId('user_id')->references('user_id')->on('users')->index('attendance_user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendance', function (Blueprint $table) {
            $table->dropForeign('attendance_study_session_id');
            $table->dropForeign('attendance_user_id');
            
            $table->dropColumn(['study_session_id', 'user_id']);
        });
    }
};
