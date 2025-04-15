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
        Schema::table('classroom', function (Blueprint $table) {
            $table->string('subject_id');
            $table->foreign('subject_id')->references('subject_id')->on('subject')->index('classroom_subject_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classroom', function (Blueprint $table) {
            $table->dropForeign('classroom_subject_id');

            $table->dropColumn('subject_id');
        });
    }
};
