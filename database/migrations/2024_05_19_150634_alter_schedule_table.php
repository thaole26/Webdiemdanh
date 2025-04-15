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
        Schema::table('schedule', function (Blueprint $table) {
            $table->foreignId('user_id')->references('user_id')->on('users')->index('schedule_user_id');
            $table->foreignId('class_id')->references('class_id')->on('classroom')->index('schedule_class_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('schedule', function (Blueprint $table) {
            $table->dropForeign('schedule_user_id');
            $table->dropForeign('schedule_class_id');

            $table->dropColumn(['user_id','class_id']);
        });
    }
};
