<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
    Schema::create('riwayat', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->string('jenis_layanan');
        $table->string('nomor_permohonan')->unique();
        $table->date('tanggal_permohonan');
        $table->enum('status', ['proses','selesai','ditolak'])->default('proses');
        $table->text('keterangan')->nullable();
        $table->string('file_dokumen')->nullable();   // path file di storage
        $table->date('tanggal_selesai')->nullable();
        $table->timestamps();
    });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat');
    }
};