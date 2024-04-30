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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            // $table->foreign('peserta_id')->references('id')->on('peserta');
            $table->foreignId('peserta_id')->constrained(table: 'peserta', indexName: 'id');
            $table->foreignId('pelatihan_id')->constrained(table: 'pelatihans', indexName: 'id_pelatihan');
            // $table->foreign('pelatihan_id')->references('id_pelatihan')->on('pelatihans');
            $table->string('judul_sertifikat');
            $table->string('nama_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
