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
        Schema::create('pict_services', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); // Foreign key yang mengacu ke tabel services
            $table->string('image_path'); // Lokasi path gambar
            $table->timestamps(); // Kolom created_at dan updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pict_services');
    }
};
