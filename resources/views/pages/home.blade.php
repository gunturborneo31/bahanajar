@extends('layouts.app')

@section('title', 'BahanAjar - Platform Pembelajaran Pengadaan Barang Modern')
@section('description', 'Pelajari Pengadaan Barang dan Jasa Pemerintah secara modern, interaktif, dan komprehensif.')

@section('content')
<div class="relative w-full h-screen overflow-hidden bg-surface">
    
    {{-- ========== PROCUREMENT MOTIF BACKGROUND ========== --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        
        {{-- Gradient base for cream/light background --}}
        <div class="absolute inset-0 bg-gradient-to-br from-surface via-surface-container-low to-surface-container"></div>

        {{-- Animated gradient orbs with procurement colors --}}
        <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full bg-primary/10 blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 -right-20 w-80 h-80 rounded-full bg-primary-container/8 blur-3xl animate-pulse" style="animation-delay:1.5s"></div>
        <div class="absolute -bottom-32 left-1/3 w-72 h-72 rounded-full bg-tertiary/5 blur-3xl animate-pulse" style="animation-delay:3s"></div>

        {{-- SVG Procurement Pattern Overlay --}}
        <svg class="absolute inset-0 w-full h-full opacity-[0.08]" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="procurement-grid" x="0" y="0" width="120" height="120" patternUnits="userSpaceOnUse">
                    {{-- Document/File icon --}}
                    <g transform="translate(8,8)" fill="none" stroke="#af101a" stroke-width="1.2">
                        <rect x="0" y="0" width="28" height="36" rx="3"/>
                        <path d="M6 12h16M6 18h16M6 24h10"/>
                        <path d="M18 0v8h10"/>
                    </g>
                    {{-- Stamp/Seal --}}
                    <g transform="translate(70,10)" fill="none" stroke="#af101a" stroke-width="1.2">
                        <circle cx="16" cy="16" r="14"/>
                        <circle cx="16" cy="16" r="10"/>
                        <path d="M16 6v20M6 16h20"/>
                    </g>
                    {{-- Contract clipboard --}}
                    <g transform="translate(5,75)" fill="none" stroke="#af101a" stroke-width="1.2">
                        <rect x="2" y="6" width="30" height="36" rx="2"/>
                        <rect x="10" y="2" width="14" height="8" rx="2"/>
                        <path d="M8 16h18M8 22h18M8 28h12"/>
                        <path d="M20 32l3 3 6-6"/>
                    </g>
                    {{-- Handshake / deal --}}
                    <g transform="translate(72,72)" fill="none" stroke="#af101a" stroke-width="1.2">
                        <path d="M4 20c0 0 4-8 12-8s12 8 12 8"/>
                        <path d="M10 12l4-8 4 8"/>
                        <circle cx="16" cy="20" r="4"/>
                        <path d="M4 20h6M26 20h-6"/>
                    </g>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#procurement-grid)"/>
        </svg>

        {{-- Additional large scattered procurement icons --}}
        {{-- Large document - top right --}}
        <svg class="absolute top-8 right-16 w-32 h-32 text-primary opacity-[0.06]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        {{-- Clipboard - bottom left --}}
        <svg class="absolute bottom-16 left-8 w-28 h-28 text-primary opacity-[0.05]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
        </svg>
        {{-- Shield/badge - top left --}}
        <svg class="absolute top-20 left-20 w-24 h-24 text-primary opacity-[0.05]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
        </svg>
        {{-- Building (government) - center right --}}
        <svg class="absolute top-1/2 right-8 -translate-y-1/2 w-36 h-36 text-primary opacity-[0.04]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
        </svg>
        {{-- Chart/analytics - bottom right --}}
        <svg class="absolute bottom-8 right-24 w-28 h-28 text-primary opacity-[0.05]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
        </svg>
        {{-- Scale of justice - top center --}}
        <svg class="absolute top-4 left-1/2 -translate-x-1/2 w-20 h-20 text-primary opacity-[0.04]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
        </svg>
        {{-- Box/tender package - center left --}}
        <svg class="absolute top-1/2 left-8 -translate-y-1/2 w-24 h-24 text-primary opacity-[0.04]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
        </svg>
        {{-- Magnify/search (procurement inspection) --}}
        <svg class="absolute bottom-20 left-1/3 w-20 h-20 text-primary opacity-[0.04]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>

        {{-- Diagonal grid lines --}}
        <svg class="absolute inset-0 w-full h-full opacity-[0.02]" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="lines" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                    <line x1="0" y1="60" x2="60" y2="0" stroke="#af101a" stroke-width="0.5"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#lines)"/>
        </svg>

        {{-- Noise texture overlay --}}
        <div class="absolute inset-0 opacity-[0.02]" style="background-image:url('data:image/svg+xml,%3Csvg viewBox=\'0 0 200 200\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'noise\'%3E%3CfeTurbulence type=\'fractalNoise\' baseFrequency=\'0.9\' numOctaves=\'4\' stitchTiles=\'stitch\'/%3E%3C/filter%3E%3Crect width=\'100%25\' height=\'100%25\' filter=\'url(%23noise)\'/%3E%3C/svg%3E')"></div>
    </div>


    {{-- ========== MAIN CONTENT (NO TOP HEADER) ========== --}}
    <div class="relative z-10 h-full flex flex-col">
        
        {{-- HERO SECTION - FULL HEIGHT --}}
        <section class="flex-1 flex items-center justify-center px-8 relative overflow-hidden">
            <div class="max-w-7xl w-full grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                
                {{-- Left: Text Content --}}
                <div class="space-y-6">
                    {{-- Badge --}}
                    <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-primary-fixed text-on-primary-fixed-variant text-sm font-bold tracking-wide uppercase">
                        Solusi Pembelajaran Pengadaan
                    </div>

                    {{-- Heading --}}
                    <h1 class="text-5xl lg:text-6xl font-extrabold text-on-surface leading-[1.1] tracking-tight font-['Plus_Jakarta_Sans']">
                        SIKAP 
                        <span class="text-primary italic">BERJASA</span>
                    </h1>

                    {{-- Description --}}
                    <p class="text-lg text-on-surface-variant max-w-lg leading-relaxed font-medium">
                        "Sistem Informasi Peningkatan Kapasitas Sumber Daya Manusia Pengadaan Barang dan Jasa"<br><br>
                        Akses ribuan materi eksklusif tentang pengadaan barang dan jasa pemerintah dari para pakar industri dan tingkatkan kompetensi Anda dengan metode belajar yang interaktif dan fleksibel.
                    </p>

                    {{-- CTA Buttons --}}
                    <div class="flex items-center gap-4 pt-4">
                        <a href="{{ route('materi') }}" class="bg-primary text-white px-8 py-4 rounded-xl font-bold text-lg shadow-xl shadow-primary/20 hover:scale-[1.02] transition-transform active:scale-95 font-['Plus_Jakarta_Sans']">
                            Mulai Belajar
                        </a>
                    </div>
                </div>

                {{-- Right: Visual Element / Stats Cards --}}
                <div class="hidden lg:grid grid-cols-2 gap-4">
                    {{-- Feature Card 1 --}}
                    <div class="bg-white/60 backdrop-blur-md p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow border border-white/20">
                        <div class="w-12 h-12 bg-primary-fixed rounded-2xl flex items-center justify-center text-primary mb-4">
                            <span class="material-symbols-outlined">verified</span>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface mb-2 font-['Plus_Jakarta_Sans']">Tersertifikasi</h3>
                        <p class="text-sm text-on-surface-variant">Diakui secara Nasional oleh Lembaga Pemerintah</p>
                    </div>

                    {{-- Feature Card 2 --}}
                    <div class="bg-white/60 backdrop-blur-md p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow border border-white/20">
                        <div class="w-12 h-12 bg-tertiary-fixed rounded-2xl flex items-center justify-center text-tertiary mb-4">
                            <span class="material-symbols-outlined">school</span>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface mb-2 font-['Plus_Jakarta_Sans']">50+ Materi</h3>
                        <p class="text-sm text-on-surface-variant">Kursus lengkap dari dasar hingga mahir</p>
                    </div>

                    {{-- Feature Card 3 --}}
                    <div class="bg-white/60 backdrop-blur-md p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow border border-white/20">
                        <div class="w-12 h-12 bg-secondary-fixed rounded-2xl flex items-center justify-center text-secondary mb-4">
                            <span class="material-symbols-outlined">people</span>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface mb-2 font-['Plus_Jakarta_Sans']">10K+ Pengguna</h3>
                        <p class="text-sm text-on-surface-variant">Komunitas profesional pengadaan</p>
                    </div>

                    {{-- Feature Card 4 --}}
                    <div class="bg-white/60 backdrop-blur-md p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow border border-white/20">
                        <div class="w-12 h-12 bg-tertiary-fixed rounded-2xl flex items-center justify-center text-tertiary-container mb-4">
                            <span class="material-symbols-outlined">access_time</span>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface mb-2 font-['Plus_Jakarta_Sans']">24/7 Akses</h3>
                        <p class="text-sm text-on-surface-variant">Belajar kapan saja, di mana saja</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Bottom Quick Links (Static within viewport) --}}
        <section class="w-full bg-surface-container-low py-6 px-8 flex-shrink-0 border-t border-surface-variant/30">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach([
                        ['href' => route('peraturan'), 'label' => 'Peraturan PBJ', 'icon' => 'gavel', 'desc' => 'Peraturan - Peraturan'],
                        ['href' => route('materi'), 'label' => 'Informasi', 'icon' => 'info', 'desc' => 'Panduan & FAQ'],
                        ['href' => route('materi'), 'label' => 'Dokumen Pengadaan', 'icon' => 'menu_book', 'desc' => 'Dokumen - Dokumen'],
                        ['href' => route('kontak'), 'label' => 'Aplikasi PBJ', 'icon' => 'app_registration', 'desc' => 'portal'],
                    ] as $item)
                    <a href="{{ $item['href'] }}" class="group bg-white/50 backdrop-blur-sm p-4 rounded-2xl shadow-md hover:shadow-lg hover:-translate-y-1 transition-all border border-white/20 hover:border-primary/30">
                        <div class="w-10 h-10 bg-primary-fixed rounded-xl flex items-center justify-center text-primary mb-3 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-xl">{{ $item['icon'] }}</span>
                        </div>
                        <h3 class="text-sm font-bold text-on-surface mb-1 font-['Plus_Jakarta_Sans']">{{ $item['label'] }}</h3>
                        <p class="text-xs text-on-surface-variant">{{ $item['desc'] }}</p>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('head')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap');

    :root {
        --primary: #af101a;
        --primary-fixed: #ffdad6;
        --primary-container: #d32f2f;
        --tertiary: #005f7b;
        --tertiary-fixed: #bee9ff;
        --tertiary-container: #00799c;
        --secondary: #9f3f39;
        --secondary-fixed: #ffdad6;
        --surface: #fff8f7;
        --surface-container-low: #fff0ef;
        --surface-container: #ffe9e7;
        --surface-variant: #f9dcd9;
        --on-surface: #271816;
        --on-surface-variant: #5b403d;
        --on-primary: #ffffff;
        --on-primary-fixed-variant: #410003;
    }

    body {
        font-family: 'Manrope', sans-serif;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
</style>
@endpush
