<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DokumenPengadaanSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        $kategori = [
            'Dokumen Umum',
            'Kontrak',
            'Evaluasi',
        ];
        $data = [
            // Dokumen Umum
            [
                'title' => 'Template RKS Pengadaan Barang',
                'kategori' => $kategori[0],
                'desc' => 'Contoh dokumen Rencana Kerja dan Syarat (RKS) untuk tender pengadaan barang.',
            ],
            [
                'title' => 'Format Dokumen Kualifikasi Penyedia',
                'kategori' => $kategori[0],
                'desc' => 'Format standar dokumen kualifikasi untuk seleksi penyedia barang/jasa.',
            ],
            [
                'title' => 'Contoh Dokumen HPS',
                'kategori' => $kategori[0],
                'desc' => 'Template dokumen Harga Perkiraan Sendiri (HPS) pengadaan.',
            ],
            [
                'title' => 'Berita Acara Penjelasan',
                'kategori' => $kategori[0],
                'desc' => 'Contoh berita acara penjelasan dokumen pengadaan.',
            ],
            // Kontrak
            [
                'title' => 'Draft Kontrak Pengadaan Barang',
                'kategori' => $kategori[1],
                'desc' => 'Draft kontrak pengadaan barang sesuai Perpres 16/2018.',
            ],
            [
                'title' => 'Addendum Kontrak',
                'kategori' => $kategori[1],
                'desc' => 'Contoh addendum kontrak pengadaan barang/jasa.',
            ],
            [
                'title' => 'Surat Penunjukan Pemenang',
                'kategori' => $kategori[1],
                'desc' => 'Format surat penunjukan pemenang tender pengadaan.',
            ],
            [
                'title' => 'Berita Acara Serah Terima',
                'kategori' => $kategori[1],
                'desc' => 'Contoh berita acara serah terima hasil pengadaan.',
            ],
            // Evaluasi
            [
                'title' => 'Format Evaluasi Penawaran',
                'kategori' => $kategori[2],
                'desc' => 'Format berita acara evaluasi penawaran pengadaan.',
            ],
            [
                'title' => 'Dokumen Sanggahan',
                'kategori' => $kategori[2],
                'desc' => 'Contoh dokumen sanggahan hasil evaluasi tender.',
            ],
            [
                'title' => 'Berita Acara Klarifikasi',
                'kategori' => $kategori[2],
                'desc' => 'Format berita acara klarifikasi penawaran.',
            ],
            [
                'title' => 'Laporan Evaluasi Akhir',
                'kategori' => $kategori[2],
                'desc' => 'Contoh laporan evaluasi akhir pengadaan barang/jasa.',
            ],
        ];

        foreach ($data as $item) {
            DB::table('articles')->insert([
                'title' => $item['title'],
                'inaproc_kategori' => $item['kategori'],
                'content' => '<p>'.$item['desc'].'</p>',
                'type' => 'dokumen',
                'status' => 'published',
                'created_at' => $now,
                'updated_at' => $now,
                'slug' => Str::slug($item['title']) . '-' . Str::random(4),
            ]);
        }
    }
}
