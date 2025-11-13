<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();

            // Foreign key ke users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('name', 100);
            $table->string('slug')->unique();

            // Phone dan address bisa nullable
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();

            // Path foto profil
            $table->string('image_path')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
