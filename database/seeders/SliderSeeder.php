<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        // Contoh file gambar dummy (pastikan file ini ada di public/storage)
        $images = [
            'slider1.jpg',
            'slider2.jpg',
            'slider3.jpg',
            'slider4.jpg',
            'slider5.jpg',
        ];
        foreach ($images as $i => $img) {
            DB::table('sliders')->insert([
                'image' => $img,
                'url' => $i % 2 === 0 ? 'https://example.com/slider'.($i+1) : null,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
