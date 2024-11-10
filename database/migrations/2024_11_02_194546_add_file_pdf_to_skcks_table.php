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
        Schema::table('skcks', function (Blueprint $table) {
            $table->string('file_pdf')->nullable()->after('email'); // menambahkan kolom file_pdf
        });
    }

    public function down()
    {
        Schema::table('skcks', function (Blueprint $table) {
            $table->dropColumn('file_pdf'); // menghapus kolom file_pdf jika di-rollback
        });
    }

};
