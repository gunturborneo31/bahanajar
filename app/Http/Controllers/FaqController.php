<?php
namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FaqController extends Controller
{
    public function index(Request $request)
    {
        // Ambil root kategori (jenis FAQ)
        $roots = \App\Models\FaqCategory::with(['children.children.articles'])->whereNull('parent_id')->orderBy('urutan')->get();

        $hierarchy = [];
        foreach ($roots as $root) {
            $jenis = $root->name;
            $hierarchy[$jenis] = [];
            foreach ($root->children as $kategori) {
                $kategoriName = $kategori->name;
                $hierarchy[$jenis][$kategoriName] = [];
                foreach ($kategori->children as $subkategori) {
                    $subkategoriName = $subkategori->name;
                    $hierarchy[$jenis][$kategoriName][$subkategoriName] = [];
                    foreach ($subkategori->articles as $article) {
                        $hierarchy[$jenis][$kategoriName][$subkategoriName][] = [
                            'id' => $article->id,
                            'title' => $article->title ?? '-',
                            'content' => $article->content ?? '',
                        ];
                    }
                }
            }
        }

        return view('pages.faq', [
            'hierarchy' => $hierarchy,
        ]);
    }
}
