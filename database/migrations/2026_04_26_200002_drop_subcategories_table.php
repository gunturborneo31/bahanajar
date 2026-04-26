<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('subcategories');
    }

    public function down(): void
    {
        // Tidak perlu membuat ulang tabel di down
    }
};
