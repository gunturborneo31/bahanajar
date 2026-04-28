<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\FaqArticle;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        // Level 1: FAQ Penyedia
        $faqPenyedia = FaqCategory::create([
            'name' => 'FAQ Penyedia',
            'parent_id' => null,
            'urutan' => 1,
        ]);

        // Level 2: Pengelolaan Pesanan
        $pengelolaanPesanan = FaqCategory::create([
            'name' => 'Pengelolaan Pesanan',
            'parent_id' => $faqPenyedia->id,
            'urutan' => 1,
        ]);

        // Level 3: Fitur Chat
        $fiturChat = FaqCategory::create([
            'name' => 'Fitur Chat',
            'parent_id' => $pengelolaanPesanan->id,
            'urutan' => 1,
        ]);

        // Level 4: Artikel FAQ Limitasi Fitur Chat
        FaqArticle::create([
            'faq_category_id' => $fiturChat->id,
            'title' => 'FAQ Limitasi Fitur Chat',
            'content' => 'Jawaban dan penjelasan tentang limitasi fitur chat di aplikasi.',
            'urutan' => 1,
        ]);
    }
}
