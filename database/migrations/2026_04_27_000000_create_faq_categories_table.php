<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('faq_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->string('name');
            $table->string('source_type')->nullable(); // category, section, etc
            $table->unsignedBigInteger('source_id')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('faq_categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faq_categories');
    }
};
