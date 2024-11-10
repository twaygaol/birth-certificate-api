<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('birth_certificates', function (Blueprint $table) {
            $table->string('akun')->nullable(); // Kolom baru untuk akun
            $table->string('email')->nullable(); // Kolom baru untuk email
        });
    }

    public function down()
    {
        Schema::table('birth_certificates', function (Blueprint $table) {
            $table->dropColumn(['akun', 'email']); // Hapus kolom akun dan email jika rollback
        });
    }

};
