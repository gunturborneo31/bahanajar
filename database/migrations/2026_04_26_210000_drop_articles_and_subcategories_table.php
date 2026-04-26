<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Drop articles table first to avoid foreign key constraint
        Schema::dropIfExists('articles');
        // Then drop subcategories table
        Schema::dropIfExists('subcategories');
    }

    public function down()
    {
        // Tidak perlu membuat ulang tabel di down
    }
};
