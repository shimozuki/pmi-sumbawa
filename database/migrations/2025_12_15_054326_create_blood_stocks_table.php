<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blood_stocks', function (Blueprint $table) {
            $table->id();

            $table->string('golongan_darah');
            $table->string('rhesus')->default('+');

            $table->unsignedInteger('jumlah_kantong')->default(0);

            $table->unsignedInteger('jumlah_terpakai')->default(0);
            $table->unsignedInteger('jumlah_rusak')->default(0);

            $table->date('tanggal_update')->nullable();

            $table->timestamps();

            $table->unique(['golongan_darah', 'rhesus']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blood_stocks');
    }
};
