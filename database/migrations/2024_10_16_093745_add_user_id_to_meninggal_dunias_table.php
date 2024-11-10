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
        Schema::table('meninggal_dunias', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // Menambahkan kolom user_id setelah kolom id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Membuat relasi ke tabel users
        });
    }

    public function down()
    {
        Schema::table('meninggal_dunias', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }

};
