<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dosen', function (Blueprint $table) {
            // Menambahkan kolom jabatan_fungsional yang boleh kosong (nullable)
            $table->string('jabatan_fungsional')->nullable()->after('nama'); 
        });
    }

    public function down(): void
    {
        Schema::table('dosen', function (Blueprint $table) {
            // Perintah rollback untuk menghapus kolom jika migrasi dibatalkan
            $table->dropColumn('jabatan_fungsional');
        });
    }
};