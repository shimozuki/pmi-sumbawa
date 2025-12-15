<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blood_request_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('blood_request_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('golongan_darah');
            $table->string('rhesus')->default('+');

            $table->unsignedInteger('jumlah_diminta');
            $table->unsignedInteger('jumlah_disetujui')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blood_request_items');
    }
};
