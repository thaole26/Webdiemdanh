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
        Schema::create('schedule', function (Blueprint $table) {
            $table->string('schedule_id')->primary();
            $table->time('start_time', precision: 0);
            $table->time('end_time', precision: 0);
            $table->date('start_day');
            $table->date('end_day');
            $table->integer('number_of_sessions');
            $table->text('feedback')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule');
    }
};
