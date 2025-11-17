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
        Schema::create('profil_desa', function (Blueprint $table) {
            $table->id();
            $table->longText('visi_misi')->nullable();  // Bisa menampung teks panjang
            $table->longText('sejarah')->nullable();    // Sejarah desa
            $table->string('bagan_slug')->unique();           // Slug untuk URL
            $table->string('image_bagan')->nullable();    // Foto bagan organisasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_desa');
    }
};
