<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blood_in_records', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pendonor_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('mobile_unit_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->date('tanggal_donor');

            $table->string('golongan_darah');
            $table->string('rhesus')->default('+');

            $table->unsignedInteger('jumlah_kantong');

            $table->enum('status', [
                'pending',
                'valid',
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
        Schema::dropIfExists('blood_in_records');
    }
};
