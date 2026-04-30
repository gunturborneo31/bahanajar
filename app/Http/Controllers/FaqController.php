<?php
namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// npm build again
class FaqController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data FAQ dari tabel articles
        $articles = \App\Models\Article::select(['id', 'inaproc_category', 'inaproc_jenis', 'inaproc_kategori', 'title', 'content'])
            ->whereNotNull('inaproc_category')
            ->orderBy('inaproc_category')
            ->orderBy('inaproc_jenis')
            ->orderBy('inaproc_kategori')
            ->orderBy('title')
            ->get();

        // Susun struktur: kategori > sub1 > sub2 > artikel
        $hierarchy = [];
        foreach ($articles as $article) {
            // Ambil bagian setelah 'FAQ ' jika ada, contoh: 'FAQ PENYEDIA' -> 'PENYEDIA'
            $kategori = $article->inaproc_category ? trim(preg_replace('/^FAQ\s+/i', '', $article->inaproc_category)) : 'Lainnya';
            $sub1 = $article->inaproc_jenis ?: 'Lainnya';
            $sub2 = $article->inaproc_kategori ?: 'Lainnya';
            if (!isset($hierarchy[$kategori])) {
                $hierarchy[$kategori] = [];
            }
            if (!isset($hierarchy[$kategori][$sub1])) {
                $hierarchy[$kategori][$sub1] = [];
            }
            if (!isset($hierarchy[$kategori][$sub1][$sub2])) {
                $hierarchy[$kategori][$sub1][$sub2] = [];
            }
            $hierarchy[$kategori][$sub1][$sub2][] = [
                'id' => $article->id,
                'title' => $article->title,
                'content' => $article->content,
            ];
        }

        return view('pages.faq', [
            'hierarchy' => $hierarchy,
        ]);
    }
}
