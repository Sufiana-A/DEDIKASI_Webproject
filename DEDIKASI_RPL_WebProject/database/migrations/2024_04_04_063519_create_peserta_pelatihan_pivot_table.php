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
        Schema::create('peserta_pelatihan_pivot', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nim')->constrained()->onDelete('cascade');
            $table->foreignId('id_pelatihan')->constrained()->onDelete('cascade');
            $table->string('nik');
            $table->string('ktm');
            $table->string('ktp');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_pelatihan_pivot');
    }
};
