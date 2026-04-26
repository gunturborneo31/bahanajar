<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Schema;

class DokumenController extends Controller
{
    public function index()
    {
        // Ambil semua artikel dengan inaproc_jenis = 'Dokumen'
        $articles = DB::table('articles')
            ->where('inaproc_jenis', 'Dokumen')
            ->select('*', DB::raw('COALESCE(inaproc_kategori, inaproc_category, scraped_jenis) as inaproc_kategori'))
            ->get();
        return view('pages.dokumen', compact('articles'));
    }

    public function scrapeInaprocSections(Request $request): JsonResponse
    {
        // HTML Inaproc - PASTE SEMUA LI KAMU (title <a> bisa beda)
        $html_sections = '
        <ul>
            <li title="Dokumen Pengadaan">
                <a href="https://bantuan.inaproc.id/hc/id-id/categories/9999999999999-Dokumen-Pengadaan">Dokumen Pengadaan</a>
            </li>
            <!-- Tambah li lain jika perlu -->
        </ul>';

        $results = ['sections_found' => 0, 'articles_updated' => 0, 'debug' => []];

        // 1. AUTO CREATE kolom scraped_section_id & scraped_jenis
        if (!Schema::hasColumn('articles', 'scraped_section_id')) {
            Schema::table('articles', function ($table) {
                $table->bigInteger('scraped_section_id')->nullable()->after('section_id');
                $table->string('scraped_jenis', 255)->nullable()->after('scraped_section_id');
            });
            $results['debug'][] = '✅ Kolom baru dibuat';
        }

        // 2. PARSE PATTERN li title + a href (GENERIC)
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($html_sections, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $xpath = new \DOMXPath($dom);

        // XPATH GENERIK: semua li punya title DAN child a
        $section_items = $xpath->query('//li[@title][a]');
        $results['sections_found'] = $section_items->length;

        foreach ($section_items as $li) {
            $jenis = trim($li->getAttribute('title'));
            $a = $li->getElementsByTagName('a')->item(0);
            $href = $a ? $a->getAttribute('href') : '';

            $section_id = null;
            if (preg_match('#/(?:categories|sections)/(\d+)#', $href, $matches)) {
                $section_id = (int)$matches[1];
            }

            if ($section_id) {
                $affected = DB::table('articles')
                    ->whereNull('scraped_section_id')
                    ->where(function($q) use ($section_id, $href) {
                        $q->where('url', 'LIKE', "%{$section_id}%")
                          ->orWhere('zendesk_id', 'LIKE', "%{$section_id}%")
                          ->orWhereRaw('CAST(zendesk_id AS UNSIGNED) = ?', [$section_id])
                          ->orWhere('section_id', $section_id);
                    })
                    ->update([
                        'scraped_section_id' => $section_id,
                        'scraped_jenis' => $jenis
                    ]);

                $results['debug'][] = [
                    'li_title' => $jenis,
                    'a_href' => $href,
                    'extracted_id' => $section_id,
                    'articles_matched' => $affected
                ];

                $results['articles_updated'] += $affected;
            }
        }

        return response()->json($results);
    }

    public function updateInaproc3Jenis(Request $request): JsonResponse
    {
        $results = ['total_updated' => 0, 'debug' => []];

        Schema::table('articles', function ($table) {
            if (!Schema::hasColumn('articles', 'inaproc_jenis')) {
                $table->string('inaproc_jenis', 255)->nullable()->after('zendesk_id');
            }
            if (!Schema::hasColumn('articles', 'inaproc_section_id')) {
                $table->bigInteger('inaproc_section_id')->unsigned()->nullable()->after('inaproc_jenis');
            }
            if (!Schema::hasColumn('articles', 'inaproc_category')) {
                $table->string('inaproc_category', 100)->nullable()->after('inaproc_section_id');
            }
        });

        $results['debug'][] = '✅ 3 kolom dibuat/verified: inaproc_jenis, inaproc_section_id, inaproc_category';

        $sections = [
            ['Dokumen Pengadaan', 9999999999999, 'categories']
        ];

        foreach ($sections as $section) {
            [$jenis, $section_id, $category] = $section;
            $affected = DB::table('articles')
                ->whereNull('inaproc_jenis')
                ->where(function($q) use ($section_id) {
                    $q->where('url', 'LIKE', "%{$section_id}%")
                      ->orWhere('zendesk_id', 'LIKE', "%{$section_id}%");
                })
                ->update([
                    'inaproc_jenis' => $jenis,
                    'inaproc_section_id' => $section_id,
                    'inaproc_category' => $category
                ]);
            $results['debug'][] = "📊 {$jenis}: {$affected} articles";
            $results['total_updated'] += $affected;
        }

        return response()->json([
            'status' => 'success',
            'results' => $results,
            'message' => '✅ 3 kolom + 3 jenis diupdate! Total: ' . $results['total_updated'],
            'cek' => 'phpMyAdmin → SELECT inaproc_jenis, COUNT(*) FROM articles GROUP BY inaproc_jenis'
        ]);
    }

    public function show($id)
    {
        $article = DB::table('articles')->where('id', $id)->first();
        return view('pages.dokumen-detail', compact('article'));
    }
}
