<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use App\Models\Section;

class UpdateInaprocFields extends Command
{
    protected $signature = 'inaproc:update-fields';
    protected $description = 'Parse content and update inaproc_jenis, inaproc_section_id, inaproc_category for all articles';

    public function handle()
    {
        $this->info('Proses update dimulai...');
        $count = 0;
        Article::chunk(100, function ($articles) use (&$count) {
            foreach ($articles as $article) {
                $parsed = $this->parseInaprocFromContent($article->content);
                $article->inaproc_category = null;
                $article->inaproc_jenis = $parsed['inaproc_jenis'];
                $article->inaproc_section_id = $parsed['inaproc_section_id'];
                // Ambil sub_jenis dari <li title> ke-4 jika ada, jika tidak ada tetap update scraped_section_id
                $sub_jenis = '';
                preg_match_all('/<li title="([^"]+)">\s*<a href="([^"]+)">.*?<\/a>\s*<\/li>/is', $article->content, $matches, PREG_SET_ORDER);
                if (isset($matches[3][1])) {
                    $sub_jenis = $matches[3][1];
                } elseif (isset($matches[3])) {
                    // Jika <li> kurang dari 4, ambil yang terakhir
                    $sub_jenis = end($matches)[1] ?? '';
                }
                $article->scraped_section_id = $sub_jenis;
                $article->save();
                $count++;

                // Tambahkan semua sub-section (li ke-4 dst) ke tabel sections jika belum ada
                $subs = $this->parseAllSectionsFromContent($article->content);
                foreach ($subs as $sub) {
                    if (!$sub['zendesk_id']) continue;
                    $section = Section::firstOrCreate(
                        ['zendesk_id' => $sub['zendesk_id']],
                        [
                            'name' => $sub['name'],
                            'url' => $sub['url'],
                            'category_id' => null,
                            'group_type' => null,
                        ]
                    );
                    $this->info('Section ditambahkan/ditemukan: ' . $section->name . ' (' . $section->zendesk_id . ')');
                }
            }
        });
        $this->info("Selesai. Total artikel diproses: $count");
    }

    // Ambil semua <li title> ke-4 dst
    public function parseAllSectionsFromContent($content)
    {
        $result = [];
        if (!$content) return $result;
        preg_match_all('/<li title="([^"]+)">\s*<a href="([^"]+)">.*?<\/a>\s*<\/li>/is', $content, $matches, PREG_SET_ORDER);
        foreach ($matches as $i => $m) {
            if ($i < 3) continue; // Lewati 3 pertama
            // Ambil zendesk_id dari url jika ada
            $zendesk_id = null;
            if (preg_match('/\/(categories|sections)\/(\d+)-/', $m[2], $idMatch)) {
                $zendesk_id = $idMatch[2];
            }
            $result[] = [
                'name' => $m[1],
                'url' => $m[2],
                'zendesk_id' => $zendesk_id,
            ];
        }
        return $result;
    }

    public function parseInaprocFromContent($content)
    {
        $result = [
            'inaproc_category' => null,
            'inaproc_jenis' => null,
            'inaproc_section_id' => null,
        ];
        if (!$content) return $result;

        // Ambil semua <li title="..."><a href="..."></a></li>
        preg_match_all('/<li title="([^"]+)">\s*<a href="([^"]+)">.*?<\/a>\s*<\/li>/is', $content, $matches, PREG_SET_ORDER);

        if (count($matches) >= 4) {
            // Hanya gunakan inaproc_jenis (misal title ke-3)
            $result['inaproc_jenis'] = $matches[2][1] ?? null;    // title ke-3
            // Ambil section id dari href ke-4
            if (isset($matches[3][2]) && preg_match('/\/sections\/(\d+)-/', $matches[3][2], $idMatch)) {
                $result['inaproc_section_id'] = $idMatch[1];
            }
        }
        return $result;
    }
}
