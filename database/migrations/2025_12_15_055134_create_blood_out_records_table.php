<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blood_out_records', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('rumah_sakit_id')
            //     ->nullable()
            //     ->constrained()
            //     ->nullOnDelete();

            $table->date('tanggal_keluar');

            $table->string('golongan_darah');
            $table->string('rhesus')->default('+');

            $table->unsignedInteger('jumlah_kantong');

            $table->enum('tujuan', [
                'rumah_sakit',
                'pasien',
                'pemusnahan',
            ]);

            $table->enum('status', [
                'pending',
                'disetujui',
                'ditolak',
            ])->default('pending');

            $table->foreignId('petugas_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blood_out_records');
    }
};
