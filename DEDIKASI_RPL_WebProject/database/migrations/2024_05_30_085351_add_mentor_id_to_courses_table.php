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
        Schema::table('courses', function (Blueprint $table) {
            if (!Schema::hasColumn('courses', 'mentor_id')) {
                $table->unsignedBigInteger('mentor_id');   
                $table->foreign('mentor_id')->references('id')->on('mentor')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            if (Schema::hasColumn('courses', 'mentor_id')) {
                $table->dropForeign(['mentor_id']);
                $table->dropColumn('mentor_id');
            }
        });
    }
};