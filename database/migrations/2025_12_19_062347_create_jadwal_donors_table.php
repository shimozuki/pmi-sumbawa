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
        Schema::create('jadwal_donors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event');
            $table->text('deskripsi')->nullable();
            $table->string('lokasi');
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->integer('kuota')->nullable();
            $table->enum('status', ['aktif', 'tutup'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_donors');
    }
};
