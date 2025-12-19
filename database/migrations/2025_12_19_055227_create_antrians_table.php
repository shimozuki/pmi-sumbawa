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
        Schema::create('antrians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('screening_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->date('tanggal');
            $table->unsignedInteger('nomor');

            $table->enum('status', [
                'menunggu',
                'dipanggil',
                'cek_kesehatan',
                'selesai',
                'batal',
            ])->default('menunggu');

            $table->timestamps();
            $table->unique(['tanggal', 'nomor']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrians');
    }
};
