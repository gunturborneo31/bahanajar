<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('faq_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faq_category_id')->index();
            $table->string('source_type')->nullable(); // article, etc
            $table->unsignedBigInteger('source_id')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
            $table->foreign('faq_category_id')->references('id')->on('faq_categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faq_articles');
    }
};
