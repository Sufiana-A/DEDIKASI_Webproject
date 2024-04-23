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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('id_tugas')->nullable();
            $table->string('judul_tugas')->nullable();
            $table->string('deskripsi_tugas')->nullable();
            $table->string('link_terkait')->nullable();
            $table->date('tugas_dibuka')->nullable();
            $table->date('batas_pengumpulan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
}; 
