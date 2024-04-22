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
            $table->unsignedBigInteger('peserta_id');
            $table->unsignedBigInteger('pelatihan_id');
            $table->dateTime('enroll_at')->nullable();                                                                                               
            $table->string('nik');                                                                                           
            $table->string('ktm');                                                                                                 
            $table->string('ktp');                                                                                                
            $table->string('status');
            $table->foreign('peserta_id')->references('id')->on('peserta')->onDelete('cascade');
            $table->foreign('pelatihan_id')->references('id')->on('pelatihan')->onDelete('cascade');
        
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
