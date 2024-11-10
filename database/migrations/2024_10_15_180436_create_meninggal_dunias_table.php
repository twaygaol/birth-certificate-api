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
        Schema::create('meninggal_dunias', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->date('tempat_tgl_lahir');
            $table->string('bangsa_agama');
            $table->string('tempat_tinggal_akhir');
            $table->date('hari_tanggal');
            $table->time('pukul');
            $table->string('sebab_meninggal');
            $table->string('tempat_meninggal');
            $table->string('dikebumikan');
            $table->string('nama_pelapor');
            $table->string('hubungan_pelapor');
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
        Schema::dropIfExists('meninggal_dunias');
    }
};
