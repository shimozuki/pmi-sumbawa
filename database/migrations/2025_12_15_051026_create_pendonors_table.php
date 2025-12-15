<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pendonors', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('nomor_identitas')->unique();
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);

            $table->text('alamat');
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();

            $table->string('telepon_hp')->nullable();
            $table->string('telepon_rumah')->nullable();
            $table->string('telepon_kantor')->nullable();
            $table->string('email')->nullable();

            $table->string('pekerjaan')->nullable();
            $table->string('nomor_kartu_donor')->nullable();
            $table->string('golongan_darah')->nullable();

            $table->date('tanggal_donor_terakhir')->nullable();
            $table->unsignedInteger('jumlah_donor')->default(0);
            $table->boolean('donor_rutin')->default(false);
            $table->boolean('siap_donor_kapan_saja')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendonors');
    }
};
