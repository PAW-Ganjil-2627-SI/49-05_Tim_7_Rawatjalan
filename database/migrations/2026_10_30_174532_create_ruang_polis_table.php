<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ruang_polis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_poli');
            $table->string('lokasi_gedung');
            $table->text('alat_medis');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ruang_polis');
    }
};
