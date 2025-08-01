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
        Schema::table('notifikasi', function (Blueprint $table) {
            $table->unsignedBigInteger('formulir_id')->nullable()->after('feedback_id');
            $table->foreign('formulir_id')->references('id')->on('formulir')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifikasi', function (Blueprint $table) {
            $table->dropForeign(['formulir_id']);
            $table->dropColumn('formulir_id');
        });
    }
};
