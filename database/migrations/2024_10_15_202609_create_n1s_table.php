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
        Schema::create('n1s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_calon_pengantin_pria');
            $table->string('nama_calon_pengantin_wanita');
            $table->date('tanggal_pernikahan');
            $table->enum('status_persetujuan', ['disetujui', 'belum disetujui']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('n1s');
    }
};
