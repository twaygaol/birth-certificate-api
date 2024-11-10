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
        Schema::create('n4s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->enum('hubungan', ['ayah', 'ibu', 'wali']);
            $table->string('status_kewarganegaraan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('n4s');
    }
};
