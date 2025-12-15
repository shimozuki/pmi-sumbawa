<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mobile_units', function (Blueprint $table) {
            $table->id();

            $table->string('kode_unit')->unique();
            $table->string('nama_unit');
            $table->string('jenis_kendaraan')->nullable();
            $table->string('nomor_polisi')->nullable();
            $table->unsignedInteger('kapasitas')->default(0);

            $table->enum('status', [
                'aktif',
                'maintenance',
                'nonaktif',
            ])->default('aktif');

            $table->string('lokasi_terakhir')->nullable();
            $table->text('keterangan')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mobile_units');
    }
};
