@extends('layouts.app')
@section('title', 'Detail Materi - BahanAjar')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-sm text-[#6B7280] mb-6">
        <a href="{{ route('home') }}" class="hover:text-[#DC2626] transition-colors">Beranda</a>
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <a href="{{ route('materi') }}" class="hover:text-[#DC2626] transition-colors">Materi</a>
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="text-[#111827] dark:text-white font-medium truncate">{{ $slug ?? 'Detail Materi' }}</span>
    </nav>

    <div class="grid lg:grid-cols-3 gap-8">

        {{-- Main Content --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Title & meta --}}
            <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-6">
                <div class="flex items-start justify-between gap-4 mb-4">
                    <div>
                        <span class="inline-block px-3 py-1 bg-[#FEF2F2] dark:bg-[#7F1D1D]/20 text-[#DC2626] text-xs font-semibold rounded-full mb-3">Tender & Lelang</span>
                        <h1 class="font-['Poppins'] font-bold text-xl md:text-2xl text-[#111827] dark:text-white leading-tight">
                            Metode Pemilihan Penyedia dalam Pengadaan Barang & Jasa Pemerintah
                        </h1>
                    </div>
                    <div class="flex gap-2 flex-shrink-0">
                        <span class="px-2.5 py-1 bg-[#DC2626] text-white text-xs font-bold rounded-lg">VIDEO</span>
                        <span class="px-2.5 py-1 bg-yellow-500 text-white text-xs font-bold rounded-lg">POPULER</span>
                    </div>
                </div>
                <p class="text-[#6B7280] dark:text-[#9CA3AF] text-sm leading-relaxed">
                    Pelajari seluruh metode pemilihan penyedia yang diatur dalam Perpres 16/2018 jo. Perpres 12/2021, meliputi tender, seleksi, penunjukan langsung, pengadaan langsung, dan e-purchasing. Dilengkapi dengan contoh kasus nyata dan simulasi praktis.
                </p>
            </div>

            {{-- Video/Content Embed --}}
            <div class="bg-black rounded-2xl overflow-hidden shadow-xl border border-[#374151] aspect-video relative group">
                {{-- YouTube embed placeholder --}}
                <div class="absolute inset-0 bg-gradient-to-br from-[#1a0404] to-[#0F0F0F] flex items-center justify-center cursor-pointer" x-data="{ playing: false }" @click="playing = true">
                    <div x-show="!playing" class="text-center">
                        <div class="w-24 h-24 rounded-full bg-white/10 border-2 border-white/20 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-12 h-12 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                        <p class="text-white/80 text-lg font-semibold mb-1">Tonton Materi</p>
                        <p class="text-white/40 text-sm">Klik untuk memutar video</p>
                    </div>
                    <div x-show="playing" class="w-full h-full">
                        <iframe class="w-full h-full" src="about:blank" title="YouTube video player" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            {{-- Controls bar --}}
            <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 flex items-center gap-3">
                <button class="flex-1 py-2.5 bg-gradient-to-r from-[#DC2626] to-[#B91C1C] text-white text-sm font-semibold rounded-xl hover:scale-[1.02] hover:shadow-md transition-all flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    Putar
                </button>
                <button class="py-2.5 px-4 bg-[#F3F4F6] dark:bg-[#374151] text-sm font-semibold rounded-xl hover:scale-[1.02] transition-all flex items-center gap-2 text-[#374151] dark:text-white">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    <span class="hidden sm:inline">Berikutnya</span>
                </button>
                <button class="py-2.5 px-4 bg-[#F3F4F6] dark:bg-[#374151] text-sm font-semibold rounded-xl hover:scale-[1.02] transition-all flex items-center gap-2 text-[#374151] dark:text-white">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    <span class="hidden sm:inline">Unduh</span>
                </button>
                <button class="py-2.5 px-4 bg-[#F3F4F6] dark:bg-[#374151] text-sm font-semibold rounded-xl hover:scale-[1.02] transition-all flex items-center gap-2 text-[#374151] dark:text-white">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                    <span class="hidden sm:inline">Bagikan</span>
                </button>
            </div>

            {{-- Rich content --}}
            <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-6 prose prose-sm dark:prose-invert max-w-none">
                <h2 class="font-['Poppins'] font-bold text-lg text-[#111827] dark:text-white mb-4">Deskripsi Materi</h2>
                <div class="space-y-4 text-[#6B7280] dark:text-[#9CA3AF] text-sm leading-relaxed">
                    <p>Materi ini membahas secara komprehensif tentang metode-metode pemilihan penyedia barang dan jasa dalam konteks pengadaan pemerintah Indonesia, sesuai dengan regulasi yang berlaku.</p>
                    <h3 class="font-semibold text-[#111827] dark:text-white text-base">Topik yang Dibahas</h3>
                    <ul class="space-y-2">
                        @foreach(['Pengertian dan ruang lingkup masing-masing metode pemilihan', 'Kriteria dan ketentuan penggunaan setiap metode', 'Prosedur dan tahapan pelaksanaan tender/seleksi', 'Penunjukan langsung: kapan dan bagaimana pelaksanaannya', 'E-purchasing melalui e-katalog: keunggulan dan keterbatasan', 'Studi kasus dan praktik terbaik di berbagai instansi'] as $item)
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#DC2626] flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <aside class="space-y-6">

            {{-- Stats card --}}
            <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-5">
                <h3 class="font-['Poppins'] font-bold text-sm text-[#111827] dark:text-white mb-4">Statistik</h3>
                <div class="space-y-3" x-data="{ views: 0, downloads: 0 }" x-init="setTimeout(() => { let v=0, d=0; const t=setInterval(() => { v+=52; d+=17; if(v>=1560){v=1560; d=410; clearInterval(t);} views=v; downloads=d; }, 30); }, 500)">
                    <div class="flex items-center justify-between p-3 bg-[#F9FAFB] dark:bg-[#111827] rounded-xl">
                        <div class="flex items-center gap-2.5 text-sm text-[#6B7280]">
                            <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            Total Views
                        </div>
                        <span class="font-['Poppins'] font-bold text-[#111827] dark:text-white" x-text="views.toLocaleString()"></span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-[#F9FAFB] dark:bg-[#111827] rounded-xl">
                        <div class="flex items-center gap-2.5 text-sm text-[#6B7280]">
                            <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            Diunduh
                        </div>
                        <span class="font-['Poppins'] font-bold text-[#111827] dark:text-white" x-text="downloads"></span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-[#F9FAFB] dark:bg-[#111827] rounded-xl">
                        <div class="flex items-center gap-2.5 text-sm text-[#6B7280]">
                            <svg class="w-4 h-4 text-[#DC2626]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Diterbitkan
                        </div>
                        <span class="font-semibold text-sm text-[#111827] dark:text-white">Jan 2024</span>
                    </div>
                </div>
            </div>

            {{-- Related materials --}}
            <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-5">
                <h3 class="font-['Poppins'] font-bold text-sm text-[#111827] dark:text-white mb-4">Materi Terkait</h3>
                <div class="space-y-3">
                    @foreach(['Dokumen Pengadaan & Spesifikasi Teknis', 'Evaluasi Penawaran & Kualifikasi', 'Kontrak Pengadaan & Pelaksanaan', 'E-Procurement & SIRUP'] as $i => $related)
                    <a href="{{ route('materi.detail', 'related-'.$i) }}" class="flex gap-3 group hover:bg-[#F9FAFB] dark:hover:bg-[#111827] p-2 rounded-xl transition-all">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FEF2F2] to-[#FECACA] dark:from-[#7F1D1D]/30 dark:to-[#991B1B]/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-[#DC2626]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-semibold text-[#111827] dark:text-white group-hover:text-[#DC2626] transition-colors line-clamp-2 leading-snug">{{ $related }}</p>
                            <p class="text-[10px] text-[#9CA3AF] mt-1">Tender & Lelang</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
