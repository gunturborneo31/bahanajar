<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use DOMDocument;
use DOMXPath;

class ProcessArticleLists extends Command
{
    protected $signature = 'articles:process-lists {--section-id= : Hanya proses section tertentu}';
    protected $description = 'Proses content articles yang punya 3 li title pattern';

    public function handle()
    {
        $sectionId = $this->option('section-id');
        
        $query = DB::table('articles')
                ->whereNotNull('content')
                ->where('content', 'LIKE', '%<li title="%');
        
        if ($sectionId) {
            $query->where('section_id', $sectionId);
        }

        $articles = $query->get(); // atau ->cursor() kalau data super banyak

        $this->info("Ditemukan " . $articles->count() . " articles untuk diproses");

        $totalProcessed = 0;
        foreach ($articles as $article) {
            $count = $this->processSingleContent($article);
            $totalProcessed += $count;
            $this->line("Article {$article->zendesk_id}: {$count} items");
        }

        $this->info("✅ Selesai! Total {$totalProcessed} sub-items dibuat.");
    }


   private function processSingleContent($article)
{
    // Skip kalau sudah ada sub items
    $existingSubs = DB::table('articles')
                     ->where('zendesk_id', 'like', $article->zendesk_id . '_sub_%')
                     ->count();
    
    if ($existingSubs > 0) {
        $this->warn("Skip {$article->zendesk_id} - sudah ada {$existingSubs} sub items");
        return 0;
    }

    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML('<?xml encoding="UTF-8">' . $article->content, 
                  LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    $xpath = new DOMXPath($dom);
    $liElements = $xpath->query('//li[@title]');

    $items = [];
    foreach ($liElements as $index => $li) {
        $titleAttr = $li->getAttribute('title');
        
        $aElements = $xpath->query('.//a', $li);
        if ($aElements->length === 0) continue;
        
        $a = $aElements->item(0);
        $href = $a->getAttribute('href');
        $linkText = trim($a->textContent ?: $titleAttr);

        $items[] = [
            'section_id' => (int) $article->section_id,
            'scraped_section_id' => $article->scraped_section_id,
            'scraped_jenis' => 'sub-list-item',
            'group_type' => 'subcategory',
            'zendesk_id' => $article->zendesk_id . '_sub_' . $index,
            'inaproc_jenis' => $titleAttr,
            'inaproc_section_id' => null,
            'inaproc_category' => $titleAttr,
            'title' => $linkText,
            'content' => null,
            'url' => $href,
            // ❌ HAPUS created_at & updated_at
        ];
    }

    if (!empty($items)) {
        DB::table('articles')->insertOrIgnore($items);
        return count($items);
    }

    return 0;
}

}