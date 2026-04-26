<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('ALTER TABLE articles MODIFY inaproc_kategori TEXT');
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
                        $table->string('inaproc_kategori', 255)->change();
        });
    }
};
