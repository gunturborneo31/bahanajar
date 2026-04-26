<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokumenPengadaanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data dari tabel articles dengan type = 'dokumen'
        $dokumens = DB::table('articles')
            ->select([
                'id',
                'title as judul',
                'inaproc_kategori as kategori',
                'content as isi',
                'created_at',
                'updated_at',
            ])
            ->get();
        return view('pages.dokumen', compact('dokumens'));
    }

    public function show($id)
    {
        $dokumen = DB::table('dokumens')->where('id', $id)->first();
        if (!$dokumen) abort(404);
        return view('pages.dokumen-detail', compact('dokumen'));
    }
}
