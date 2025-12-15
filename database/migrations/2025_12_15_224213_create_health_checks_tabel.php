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
        Schema::create('health_checks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendonor_id')->constrained();
            $table->foreignId('staff_id')->constrained('users');
            $table->string('tekanan_darah');
            $table->integer('denyut_nadi');
            $table->float('berat_badan');
            $table->integer('tinggi_badan');
            $table->float('suhu');
            $table->string('hb')->nullable();
            $table->text('keadaan_umum')->nullable();
            $table->text('riwayat_medis')->nullable();
            $table->enum('hasil', ['lolos', 'tidak_lolos']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_checks_tabel');
    }
};
