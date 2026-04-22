<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use App\Models\Section;
use App\Console\Commands\UpdateInaprocFields;

class UpdateSubCategoriesPeraturan extends Command
{
    protected $signature = 'inaproc:update-subcategories-peraturan';
    protected $description = 'Update sub_categories (li title ke-4 dst) ke tabel sections untuk artikel inaproc_jenis = Peraturan';

    public function handle()
    {
        $this->info('Proses update sub_categories untuk Peraturan dimulai...');
        $count = 0;
        $articles = Article::where('inaproc_jenis', 'Peraturan')->get();
        $parser = new UpdateInaprocFields();
        foreach ($articles as $article) {
            $subs = $parser->parseAllSectionsFromContent($article->content);
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
                $count++;
            }
        }
        $this->info("Selesai. Total sub_categories diproses: $count");
    }
}
