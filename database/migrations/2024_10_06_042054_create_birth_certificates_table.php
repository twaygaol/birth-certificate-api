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
        Schema::create('birth_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_number')->unique(); // Nomor Akta Kelahiran

            // Informasi Bayi
            $table->string('baby_name'); // Nama Bayi
            $table->enum('gender', ['male', 'female']); // Jenis Kelamin
            $table->date('birth_date'); // Tanggal Lahir
            $table->time('birth_time'); // Jam Lahir
            $table->string('birth_place'); // Tempat Lahir
            $table->string('hospital_name')->nullable(); // Nama Rumah Sakit atau tempat lahir
            $table->enum('birth_order', ['1', '2', '3', '4', '5+']); // Anak ke berapa

            // Informasi Orang Tua
            $table->string('father_name'); // Nama Ayah
            $table->string('father_nik', 16); // NIK Ayah
            $table->string('father_birthplace'); // Tempat Lahir Ayah
            $table->date('father_birthdate'); // Tanggal Lahir Ayah
            $table->string('father_job'); // Pekerjaan Ayah

            $table->string('mother_name'); // Nama Ibu
            $table->string('mother_nik', 16); // NIK Ibu
            $table->string('mother_birthplace'); // Tempat Lahir Ibu
            $table->date('mother_birthdate'); // Tanggal Lahir Ibu
            $table->string('mother_job'); // Pekerjaan Ibu

            // Status Pernikahan
            $table->date('marriage_date')->nullable(); // Tanggal Pernikahan (opsional)
            $table->string('marriage_certificate_number')->nullable(); // Nomor Akta Pernikahan

            // Alamat Orang Tua
            $table->string('address'); // Alamat Orang Tua
            $table->string('village'); // Desa/Kelurahan
            $table->string('district'); // Kecamatan
            $table->string('city'); // Kota/Kabupaten
            $table->string('province'); // Provinsi
            $table->string('postal_code', 5); // Kode Pos
            $table->string('phone_number')->nullable(); // Nomor Telepon Orang Tua

            // Informasi Saksi
            $table->string('witness1_name'); // Nama Saksi 1
            $table->string('witness1_nik', 16); // NIK Saksi 1
            $table->string('witness2_name')->nullable(); // Nama Saksi 2
            $table->string('witness2_nik', 16)->nullable(); // NIK Saksi 2

            // Informasi Pendaftaran
            $table->date('registration_date'); // Tanggal Pendaftaran Akta
            $table->string('registrant_name'); // Nama Pendaftar (bisa orang tua atau perwakilan)
            $table->string('registrant_relation'); // Hubungan Pendaftar dengan Bayi (mis. Ayah, Ibu, Wakil)
            $table->string('registrant_nik', 16); // NIK Pendaftar

            // Status Akta Kelahiran
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status Akta
            $table->text('rejection_reason')->nullable(); // Alasan jika pendaftaran ditolak

            $table->timestamps(); // Waktu pembuatan dan update data
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('birth_certificates');
    }
};
