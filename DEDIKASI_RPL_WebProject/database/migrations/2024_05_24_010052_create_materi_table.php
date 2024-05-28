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
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('id_materi')->nullable();
            $table->string('judul_materi')->nullable();
            $table->string('pelatihan')->nullable();
            $table->string('deskripsi_materi')->nullable();
            $table->string('link_terkait')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
