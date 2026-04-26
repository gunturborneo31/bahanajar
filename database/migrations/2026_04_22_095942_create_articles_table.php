<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
// Migration dinonaktifkan karena tabel sudah ada di database.
// Jika ingin membuat ulang tabel, aktifkan kembali kode di bawah ini.
// public function up(): void
// {
//     Schema::create('articles', function (Blueprint $table) {
//         $table->id();
//         $table->timestamps();
//     });
// }
