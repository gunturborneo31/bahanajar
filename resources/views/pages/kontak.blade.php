@extends('layouts.app')
@section('title', 'Aplikasi PBJ - BahanAjar Pengadaan Barang')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-16">
    <div class="text-center mb-12">
        <span class="inline-block px-4 py-1.5 bg-[#FEF2F2] dark:bg-[#7F1D1D]/20 text-[#DC2626] text-xs font-semibold rounded-full mb-4 tracking-widest uppercase">Aplikasi PBJ</span>
        <h1 class="font-['Poppins'] font-bold text-3xl md:text-5xl text-[#111827] dark:text-white mb-4">Aplikasi Pengadaan Barang dan Jasa</h1>
        <p class="text-[#6B7280] max-w-md mx-auto">Berikut adalah daftar aplikasi PBJ yang dapat Anda akses.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        {{-- Contoh data aplikasi, ganti/extend sesuai kebutuhan --}}
        @php
        $apps = [
            [
                'name' => 'LPSE',
                'logo' => 'https://biropbj.kaltimprov.go.id/sportal/img/icon/lpse.png',
                'url' => 'https://lpse.lkpp.go.id/',
            ],
            [
                'name' => 'SIRUP',
                'logo' => 'https://biropbj.kaltimprov.go.id/sportal/img/icon/sirup.png',
                'url' => 'https://sirup.lkpp.go.id/sirup/',
            ],
            [
                'name' => 'e-Katalog',
                'logo' => 'https://biropbj.kaltimprov.go.id/sportal/img/icon/ekatalog.png',
                'url' => 'https://e-katalog.lkpp.go.id/',
            ],
            [
                'name' => 'SiKAP',
                'logo' => 'https://biropbj.kaltimprov.go.id/sportal/img/icon/sikap.png',
                'url' => 'https://sikap.lkpp.go.id/',
            ],
            [
                'name' => 'Sipesut',
                'logo' => 'https://biropbj.kaltimprov.go.id/sportal/img/icon/sipesut.png',
                'url' => 'https://sirup.lkpp.go.id/sirup/daerah',
            ],
        ];
        @endphp
        @foreach($apps as $app)
        <a href="{{ $app['url'] }}" target="_blank" rel="noopener" class="group block bg-white dark:bg-[#1F2937] rounded-2xl shadow-md border border-[#E5E7EB] dark:border-[#374151] p-6 text-center hover:shadow-xl hover:scale-[1.03] transition-all">
            <div class="flex justify-center mb-4">
                <img src="{{ $app['logo'] }}" alt="Logo {{ $app['name'] }}" class="h-16 w-16 object-contain rounded-xl shadow-sm bg-[#F9FAFB] dark:bg-[#374151]">
            </div>
            <div class="font-semibold text-lg text-[#111827] dark:text-white group-hover:text-[#DC2626]">{{ $app['name'] }}</div>
        </a>
        @endforeach
    </div>
</div>
@endsection
