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
        Schema::create('kurang_mampus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->date('tempat_tgl_lahir');
            $table->string('pekerjaan');
            $table->string('tempat_sekolah');
            $table->string('nim');
            $table->string('tempat_tinggal');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->integer('tanggungan_anak');
            $table->integer('penghasilan_ayah');
            $table->integer('penghasilan_ibu');
            $table->date('tanggal_surat');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurang_mampus');
    }
};
