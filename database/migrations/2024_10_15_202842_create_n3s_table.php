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
        Schema::create('n3s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengantin_pria');
            $table->string('nama_pengantin_wanita');
            $table->date('tanggal_persetujuan');
            $table->enum('status_persetujuan', ['disetujui', 'belum disetujui']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('n3s');
    }
};
