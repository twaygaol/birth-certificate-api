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
            $table->string('file1')->nullable(); // Menambahkan kolom file1
            $table->string('file2')->nullable(); // Menambahkan kolom file2
        });
    }

    public function down()
    {
        Schema::table('birth_certificates', function (Blueprint $table) {
            $table->dropColumn(['file1', 'file2']); // Menghapus kolom file1 dan file2
        });
    }

};
