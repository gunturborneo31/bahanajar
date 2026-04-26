<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateInaprocKategoriArtisan extends Command
{
    protected $signature = 'article:update-inaproc-kategori';
    protected $description = 'Mengisi kolom inaproc_kategori pada tabel articles berdasarkan breadcrumbs ke-4 di field content.';

    public function handle()
    {
        $articles = DB::table('articles')->whereNotNull('content')->get();
        $count = 0;

        foreach ($articles as $article) {
            // Menggunakan regex sederhana untuk mencari teks di breadcrumb ke-4
            // Asumsi breadcrumb dalam tag li atau span di dalam kontainer berkelas breadcrumb
            if (preg_match_all('/<li[^>]*>(.*?)<\/li>/is', $article->content, $matches) || 
                preg_match_all('/<span[^>]*class="[^"]*breadcrumb[^"]*"[^>]*>(.*?)<\/span>/is', $article->content, $matches)) {
                
                if (isset($matches[1][3])) { // Index 3 adalah elemen ke-4
                    $kategori = trim(strip_tags($matches[1][3]));
                    DB::table('articles')->where('id', $article->id)->update(['inaproc_kategori' => $kategori]);
                    $count++;
                }
            }
        }

        $this->info("Berhasil memperbarui $count artikel.");
    }
}
