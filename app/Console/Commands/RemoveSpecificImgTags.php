<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RemoveSpecificImgTags extends Command
{
    protected $signature = 'articles:remove-img';
    protected $description = 'Menghapus tag img tertentu dari field content di tabel articles';

    public function handle()
    {
        $targetSrc = "https://bantuan.inaproc.id/hc/theming_assets/01HZH6CQA2HZ34N7CZF659MN94";
        $pattern = "/<img[^>]*src=[\"']" . preg_quote($targetSrc, '/') . "[\"'][^>]*>/i";

        $articles = DB::table('articles')
            ->where('content', 'LIKE', "%$targetSrc%")
            ->get();

        <?php
        namespace App\Console\Commands;

        use Illuminate\Console\Command;
        use Illuminate\Support\Facades\DB;

        class RemoveSpecificImgTags extends Command
        {
            protected $signature = 'articles:remove-img';
            protected $description = 'Menghapus tag img tertentu dari field content di tabel articles';

            public function handle()
            {
                $targetSrc = 'https://bantuan.inaproc.id/hc/theming_assets/01HZH6CQ4EGFSSGZJYEAVBK3SB';
                // Regex: hapus <img ... src="..." ...> (atribut lain boleh urut apapun)
                $pattern = '/<img[^>]*src=["\']' . preg_quote($targetSrc, '/') . '["\'][^>]*>/i';

                $articles = DB::table('articles')
                    ->where('content', 'LIKE', '%' . $targetSrc . '%')
                    ->get();

                $count = 0;
                foreach ($articles as $article) {
                    $newContent = preg_replace($pattern, '', $article->content);
                    if ($newContent !== $article->content) {
                        DB::table('articles')
                            ->where('id', $article->id)
                            ->update(['content' => $newContent]);
                        $count++;
                    }
                }

                $this->info("Berhasil memperbarui $count artikel.");
            }
        }