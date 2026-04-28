<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PanduanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua artikel dengan inaproc_category = 'Panduan Pengguna'
        $articles = Article::where('inaproc_category', 'Panduan Pengguna')
            ->select(['id', 'inaproc_jenis', 'inaproc_kategori', 'title', 'content', 'created_at'])
            ->orderBy('inaproc_jenis')
            ->orderBy('inaproc_kategori')
            ->orderBy('title')
            ->get();

        // Susun struktur: kategori > sub kategori > artikel
        $hierarchy = [];
        foreach ($articles as $article) {
            $kategori = $article->inaproc_jenis ?: 'Lainnya';
            $subkategori = $article->inaproc_kategori ?: 'Lainnya';
            if (!isset($hierarchy[$kategori])) {
                $hierarchy[$kategori] = [];
            }
            if (!isset($hierarchy[$kategori][$subkategori])) {
                $hierarchy[$kategori][$subkategori] = [];
            }
            $hierarchy[$kategori][$subkategori][] = $article;
        }

        return view('pages.panduan', [
            'hierarchy' => $hierarchy,
        ]);
    }
}
