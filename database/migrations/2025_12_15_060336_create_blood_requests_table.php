<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('rumah_sakit_id')
            //     ->constrained()
            //     ->cascadeOnDelete();

            $table->date('tanggal_permintaan');

            $table->enum('status', [
                'diajukan',
                'diproses',
                'disetujui',
                'ditolak',
                'selesai',
            ])->default('diajukan');

            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blood_requests');
    }
};
