<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id')->constrained(table: 'peserta', indexName: 'id');
            $table->foreignId('course_id')->constrained(table: 'courses', indexName: 'fk_course_id');
            $table->string('nama_file');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
