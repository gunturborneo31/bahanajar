<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqMappingSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan tabel mapping
        DB::table('faq_articles')->truncate();
        DB::table('faq_categories')->truncate();

        // 1. FAQ Penyedia (category_id = 8)
        $faqPenyedia = DB::table('faq_categories')->insertGetId([
            'name' => 'FAQ Penyedia',
            'parent_id' => null,
            'urutan' => 1,
            'source_type' => 'category',
            'source_id' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Pengelolaan Pesanan (section dari articles yang terkait FAQ Penyedia)
        // Ambil section unik dari articles yang category_id=8 dan inaproc_section_id tidak null
        $sections = DB::table('articles')
            ->where('inaproc_category', 'FAQ Penyedia Pertanyaan yang Sering Ditanyakan Penyedia')
            ->whereNotNull('inaproc_section_id')
            ->select('inaproc_section_id', 'inaproc_jenis')
            ->distinct()
            ->get();
        foreach ($sections as $section) {
            $pengelolaanPesanan = DB::table('faq_categories')->insertGetId([
                'name' => $section->inaproc_jenis,
                'parent_id' => $faqPenyedia,
                'urutan' => 1,
                'source_type' => 'section',
                'source_id' => $section->inaproc_section_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 3. Fitur Chat (sub section dari section di atas)
            $subsections = DB::table('articles')
                ->where('inaproc_section_id', $section->inaproc_section_id)
                ->whereNotNull('inaproc_kategori')
                ->select('inaproc_kategori')
                ->distinct()
                ->get();
            foreach ($subsections as $subsection) {
                $fiturChat = DB::table('faq_categories')->insertGetId([
                    'name' => $subsection->inaproc_kategori,
                    'parent_id' => $pengelolaanPesanan,
                    'urutan' => 1,
                    'source_type' => 'subsection',
                    'source_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // 4. Artikel (FAQ Limitasi Fitur Chat, dst)
                $articles = DB::table('articles')
                    ->where('inaproc_section_id', $section->inaproc_section_id)
                    ->where('inaproc_kategori', $subsection->inaproc_kategori)
                    ->get();
                foreach ($articles as $article) {
                    DB::table('faq_articles')->insert([
                        'faq_category_id' => $fiturChat,
                        'source_type' => 'article',
                        'source_id' => $article->id,
                        'urutan' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
