<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PelatihanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pelatihans')->insert([
            [
                'nama' => 'Pelatihan Kompetensi PPK Tipe C',
                'jenis' => 'KOMPETENSI',
                'kuota_tersisa' => 15,
                'kuota_total' => 30,
                'tanggal_mulai' => '2024-06-10',
                'tanggal_selesai' => '2024-06-15',
                'lokasi' => 'Jakarta',
                'status' => 'BUKA',
                'metode' => 'Offline',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Pemanfaatan E-Katalog Versi 6.0',
                'jenis' => 'WORKSHOP',
                'kuota_tersisa' => 2,
                'kuota_total' => 50,
                'tanggal_mulai' => '2024-06-20',
                'tanggal_selesai' => '2024-06-20',
                'lokasi' => 'Online',
                'status' => 'TERBATAS',
                'metode' => 'Online',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Sertifikasi Ahli Pengadaan Dasar',
                'jenis' => 'SERTIFIKASI',
                'kuota_tersisa' => 0,
                'kuota_total' => 100,
                'tanggal_mulai' => '2024-06-05',
                'tanggal_selesai' => '2024-06-05',
                'lokasi' => 'Semarang',
                'status' => 'TUTUP',
                'metode' => 'Offline',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
