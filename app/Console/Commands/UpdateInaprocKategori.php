<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use Illuminate\Support\Facades\Log;

class UpdateInaprocKategori extends Command
{
    protected $signature = 'article:update-inaproc-kategori';
    protected $description = 'Update inaproc_kategori pada tabel articles berdasarkan breadcrumbs di content';

    public function handle()
    {
        $articles = Article::where('inaproc_jenis', 'Peraturan')->whereNotNull('content')->get();
        $updated = 0;
        foreach ($articles as $article) {
            $kategori = $this->extractKategori($article->content);
            if ($kategori) {
                // Batasi maksimal 191 karakter (default varchar)
                $article->inaproc_kategori = mb_substr($kategori, 0, 191);
                $article->save();
                $updated++;
            }
        }
        $this->info("Berhasil update $updated artikel.");
        Log::info('Update inaproc_kategori selesai', ['updated' => $updated]);
    }

    private function extractKategori($content)
    {
        // Ambil breadcrumbs ke-4 dari HTML
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($content);
        $xpath = new \DOMXPath($dom);
        $liNodes = $xpath->query('//ol[contains(@class, "breadcrumbs")]/li');
        if ($liNodes->length >= 4) {
            $li = $liNodes->item(3); // index ke-3 = li ke-4
            $title = $li->getAttribute('title');
            return $title;
        }
        return null;
    }
}
