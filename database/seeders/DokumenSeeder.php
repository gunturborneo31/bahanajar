<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DokumenSeeder extends Seeder
{
    public function run()
    {
        $kategori = [
            'Dokumen Umum',
            'Dokumen Teknis',
            'Dokumen Administrasi',
        ];
        $now = Carbon::now();
        // Hapus data dummy dokumen lama agar tidak bentrok unique
        DB::table('articles')->where('inaproc_jenis', 'Dokumen')->delete();
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $catIdx = ($i-1)%3;
            $cat = $kategori[$catIdx];
            $data[] = [
                'title' => 'Contoh Dokumen ' . $i,
                'content' => '<p>Isi dokumen pengadaan ke-' . $i . '.</p>',
                'inaproc_jenis' => 'Dokumen',
                'inaproc_kategori' => $cat,
                'section_id' => $catIdx+1,
                'group_type' => 'Dokumen',
                'zendesk_id' => 1000 + $i,
                'url' => 'https://dummy.url/dokumen-' . $i,
                'created_at' => $now->copy()->subDays(12-$i),
                'updated_at' => $now->copy()->subDays(12-$i),
            ];
        }
        DB::table('articles')->insert($data);
    }
}

