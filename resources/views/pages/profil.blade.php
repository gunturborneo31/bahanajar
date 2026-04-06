@extends('layouts.app')
@section('title', 'Profil - BahanAjar Pengadaan Barang')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 py-8 md:py-16">

    {{-- Profile Hero Card --}}
    <div class="bg-white dark:bg-[#1F2937] rounded-3xl shadow-xl border border-[#E5E7EB] dark:border-[#374151] overflow-hidden mb-8">

        {{-- Cover banner --}}
        <div class="h-32 md:h-44 bg-gradient-to-r from-[#DC2626] via-[#B91C1C] to-[#991B1B] relative overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                    <defs><pattern id="dots" x="0" y="0" width="30" height="30" patternUnits="userSpaceOnUse"><circle cx="2" cy="2" r="1.5" fill="white"/></pattern></defs>
                    <rect width="100%" height="100%" fill="url(#dots)"/>
                </svg>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
        </div>

        {{-- Avatar + info --}}
        <div class="px-6 md:px-10 pb-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between -mt-16 mb-6">
                <div class="w-28 h-28 md:w-36 md:h-36 rounded-full border-4 border-white dark:border-[#1F2937] shadow-xl overflow-hidden bg-gradient-to-br from-[#DC2626] to-[#B91C1C] flex items-center justify-center flex-shrink-0">
                    <svg class="w-16 h-16 md:w-20 md:h-20 text-white/80" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <div class="mt-4 sm:mt-0 sm:mb-2 flex gap-2">
                    <span class="px-3 py-1.5 bg-[#FEF2F2] dark:bg-[#7F1D1D]/20 text-[#DC2626] text-xs font-semibold rounded-xl">Pengelola Platform</span>
                    <span class="px-3 py-1.5 bg-[#F3F4F6] dark:bg-[#374151] text-[#6B7280] dark:text-[#9CA3AF] text-xs font-semibold rounded-xl">Aktif</span>
                </div>
            </div>

            <h1 class="font-['Poppins'] font-bold text-2xl md:text-3xl text-[#111827] dark:text-white mb-1">Pengelola BahanAjar</h1>
            <p class="text-[#6B7280] dark:text-[#9CA3AF] text-sm mb-4">Praktisi Pengadaan Barang & Jasa | Trainer Bersertifikat LKPP</p>

            <p class="text-[#6B7280] dark:text-[#9CA3AF] leading-relaxed text-sm max-w-xl">
                Berpengalaman lebih dari 10 tahun dalam bidang pengadaan barang dan jasa pemerintah. Aktif sebagai narasumber dan trainer di berbagai instansi pemerintah dan swasta. Berkomitmen untuk menyebarkan pengetahuan pengadaan yang benar dan transparan.
            </p>
        </div>
    </div>

    {{-- Social Grid 4x2 --}}
    <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-md border border-[#E5E7EB] dark:border-[#374151] p-6 md:p-8 mb-8">
        <h2 class="font-['Poppins'] font-bold text-lg text-[#111827] dark:text-white mb-5">Hubungi & Ikuti</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            @foreach([
                ['href' => 'https://wa.me/', 'label' => 'WhatsApp', 'handle' => '+62 812-xxxx-xxxx', 'bg' => 'bg-green-50 dark:bg-green-900/20', 'border' => 'border-green-200 dark:border-green-700/40', 'text' => 'text-green-600 dark:text-green-400', 'icon' => 'M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z'],
                ['href' => 'https://instagram.com/', 'label' => 'Instagram', 'handle' => '@bahanajar.id', 'bg' => 'bg-purple-50 dark:bg-purple-900/20', 'border' => 'border-purple-200 dark:border-purple-700/40', 'text' => 'text-purple-600 dark:text-purple-400', 'icon' => 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z'],
                ['href' => 'https://youtube.com/', 'label' => 'YouTube', 'handle' => 'BahanAjar Channel', 'bg' => 'bg-red-50 dark:bg-red-900/20', 'border' => 'border-red-200 dark:border-red-700/40', 'text' => 'text-[#DC2626] dark:text-red-400', 'icon' => 'M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z'],
                ['href' => 'mailto:info@bahanajar.id', 'label' => 'Email', 'handle' => 'info@bahanajar.id', 'bg' => 'bg-blue-50 dark:bg-blue-900/20', 'border' => 'border-blue-200 dark:border-blue-700/40', 'text' => 'text-blue-600 dark:text-blue-400', 'icon' => 'M0 4a2 2 0 012-2h20a2 2 0 012 2v.217l-12 6.5L0 4.217V4zm0 2.383V16a2 2 0 002 2h20a2 2 0 002-2V6.383l-12 6.5-12-6.5z'],
                ['href' => '#', 'label' => 'Facebook', 'handle' => 'BahanAjar ID', 'bg' => 'bg-blue-50 dark:bg-blue-900/20', 'border' => 'border-blue-200 dark:border-blue-700/40', 'text' => 'text-blue-700 dark:text-blue-300', 'icon' => 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z'],
                ['href' => '#', 'label' => 'TikTok', 'handle' => '@bahanajar', 'bg' => 'bg-gray-50 dark:bg-gray-800/40', 'border' => 'border-gray-200 dark:border-gray-600/40', 'text' => 'text-gray-800 dark:text-gray-200', 'icon' => 'M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z'],
                ['href' => '#', 'label' => 'LinkedIn', 'handle' => 'BahanAjar', 'bg' => 'bg-blue-50 dark:bg-blue-900/20', 'border' => 'border-blue-200 dark:border-blue-700/40', 'text' => 'text-blue-700 dark:text-blue-400', 'icon' => 'M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z'],
                ['href' => 'https://maps.google.com/', 'label' => 'Lokasi', 'handle' => 'Jakarta, Indonesia', 'bg' => 'bg-red-50 dark:bg-red-900/20', 'border' => 'border-red-200 dark:border-red-700/40', 'text' => 'text-[#DC2626] dark:text-red-400', 'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z'],
            ] as $social)
            <a href="{{ $social['href'] }}" target="_blank"
               class="group flex flex-col items-center gap-2 p-4 rounded-2xl {{ $social['bg'] }} border {{ $social['border'] }} hover:-translate-y-1 hover:shadow-md transition-all text-center">
                <svg class="w-7 h-7 {{ $social['text'] }}" fill="currentColor" viewBox="0 0 24 24">
                    <path d="{{ $social['icon'] }}"/>
                </svg>
                <div>
                    <div class="font-semibold text-xs text-[#111827] dark:text-white">{{ $social['label'] }}</div>
                    <div class="text-[10px] text-[#6B7280] dark:text-[#9CA3AF] truncate max-w-[80px]">{{ $social['handle'] }}</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- Stats row --}}
    <div class="grid grid-cols-3 gap-4">
        @foreach([
            ['num' => '10+', 'label' => 'Tahun Pengalaman'],
            ['num' => '50+', 'label' => 'Materi Dibuat'],
            ['num' => '1K+', 'label' => 'Peserta Diajar'],
        ] as $stat)
        <div class="bg-white dark:bg-[#1F2937] rounded-2xl p-5 text-center border border-[#E5E7EB] dark:border-[#374151] shadow-sm">
            <div class="font-['Poppins'] font-bold text-2xl text-[#DC2626]">{{ $stat['num'] }}</div>
            <div class="text-[#6B7280] text-xs mt-1">{{ $stat['label'] }}</div>
        </div>
        @endforeach
    </div>
</div>
@endsection
