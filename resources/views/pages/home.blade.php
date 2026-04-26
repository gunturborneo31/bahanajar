@extends('layouts.app')

@section('title', 'BahanAjar - Platform Pembelajaran Pengadaan Barang Modern')
@section('description', 'Pelajari Pengadaan Barang dan Jasa Pemerintah secara modern, interaktif, dan komprehensif.')

@section('content')
    <div class="relative w-full h-screen overflow-hidden bg-surface">

        {{-- ========== PROCUREMENT MOTIF BACKGROUND ========== --}}
        <div class="absolute inset-0 pointer-events-none overflow-hidden">

            {{-- Gradient base for cream/light background --}}
            <div class="absolute inset-0 bg-gradient-to-br from-surface via-surface-container-low to-surface-container">
            </div>

            {{-- Animated gradient orbs with procurement colors --}}
            <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full bg-primary/10 blur-3xl animate-pulse"></div>
            <div class="absolute top-1/2 -right-20 w-80 h-80 rounded-full bg-primary-container/8 blur-3xl animate-pulse"
                style="animation-delay:1.5s"></div>
            <div class="absolute -bottom-32 left-1/3 w-72 h-72 rounded-full bg-tertiary/5 blur-3xl animate-pulse"
                style="animation-delay:3s"></div>

            {{-- SVG Procurement Pattern Overlay --}}
            <svg class="absolute inset-0 w-full h-full opacity-[0.08]" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="procurement-grid" x="0" y="0" width="120" height="120" patternUnits="userSpaceOnUse">
                        {{-- Document/File icon --}}
                        <g transform="translate(8,8)" fill="none" stroke="#af101a" stroke-width="1.2">
                            <rect x="0" y="0" width="28" height="36" rx="3" />
                            <path d="M6 12h16M6 18h16M6 24h10" />
                            <path d="M18 0v8h10" />
                        </g>
                        {{-- Stamp/Seal --}}
                        <g transform="translate(70,10)" fill="none" stroke="#af101a" stroke-width="1.2">
                            <circle cx="16" cy="16" r="14" />
                            <circle cx="16" cy="16" r="10" />
                            <path d="M16 6v20M6 16h20" />
                        </g>
                        {{-- Contract clipboard --}}
                        <g transform="translate(5,75)" fill="none" stroke="#af101a" stroke-width="1.2">
                            <rect x="2" y="6" width="30" height="36" rx="2" />
                            <rect x="10" y="2" width="14" height="8" rx="2" />
                            <path d="M8 16h18M8 22h18M8 28h12" />
                            <path d="M20 32l3 3 6-6" />
                        </g>
                        {{-- Handshake / deal --}}
                        <g transform="translate(72,72)" fill="none" stroke="#af101a" stroke-width="1.2">
                            <path d="M4 20c0 0 4-8 12-8s12 8 12 8" />
                            <path d="M10 12l4-8 4 8" />
                            <circle cx="16" cy="20" r="4" />
                            <path d="M4 20h6M26 20h-6" />
                        </g>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#procurement-grid)" />
            </svg>

            {{-- Additional large scattered procurement icons --}}
            {{-- Large document - top right --}}
            <svg class="absolute top-8 right-16 w-32 h-32 text-primary opacity-[0.06]" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            {{-- Clipboard - bottom left --}}
            <svg class="absolute bottom-16 left-8 w-28 h-28 text-primary opacity-[0.05]" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
            </svg>
            {{-- Shield/badge - top left --}}
            <svg class="absolute top-20 left-20 w-24 h-24 text-primary opacity-[0.05]" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            {{-- Building (government) - center right --}}
            <svg class="absolute top-1/2 right-8 -translate-y-1/2 w-36 h-36 text-primary opacity-[0.04]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            {{-- Chart/analytics - bottom right --}}
            <svg class="absolute bottom-8 right-24 w-28 h-28 text-primary opacity-[0.05]" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            {{-- Scale of justice - top center --}}
            <svg class="absolute top-4 left-1/2 -translate-x-1/2 w-20 h-20 text-primary opacity-[0.04]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
            </svg>
            {{-- Box/tender package - center left --}}
            <svg class="absolute top-1/2 left-8 -translate-y-1/2 w-24 h-24 text-primary opacity-[0.04]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            {{-- Magnify/search (procurement inspection) --}}
            <svg class="absolute bottom-20 left-1/3 w-20 h-20 text-primary opacity-[0.04]" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>

            {{-- Diagonal grid lines --}}
            <svg class="absolute inset-0 w-full h-full opacity-[0.02]" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="lines" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <line x1="0" y1="60" x2="60" y2="0" stroke="#af101a" stroke-width="0.5" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#lines)" />
            </svg>

            {{-- Noise texture overlay --}}
            <div class="absolute inset-0 opacity-[0.02]"
                style="background-image:url('data:image/svg+xml,%3Csvg viewBox=\'0 0 200 200\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'noise\'%3E%3CfeTurbulence type=\'fractalNoise\' baseFrequency=\'0.9\' numOctaves=\'4\' stitchTiles=\'stitch\'/%3E%3C/filter%3E%3Crect width=\'100%25\' height=\'100%25\' filter=\'url(%23noise)\'/%3E%3C/svg%3E')">
            </div>
        </div>


        {{-- ========== MAIN CONTENT (NO TOP HEADER) ========== --}}
        <div class="relative z-10 h-full flex flex-col">

            {{-- HERO SECTION - FULL HEIGHT --}}
            <section class="flex-1 flex items-center justify-center px-8 mb-12 relative overflow-hidden">
                <div class="bg-blackmax-w-7xl w-full grid grid-cols-1 lg:grid-cols-1 gap-8 lg:gap-12 items-center">

                    {{-- Left: Text Content --}}
                    {{-- Responsive grid: kolom kiri lebih lebar jika slider 3:4 --}}
                    @php
                        $sliders = \App\Models\Slider::where('is_active', 1)->latest()->take(5)->get();
                        // Cek rasio slide pertama (jika ada)
                        $firstRatio = '3-4';
                        if ($sliders->count()) {
                            $imagePath = storage_path('app/public/' . $sliders[0]->image);
                            if (file_exists($imagePath)) {
                                [$w, $h] = getimagesize($imagePath);
                                if ($w == $h)
                                    $firstRatio = '1-1';
                            }
                        }
                    @endphp
                    <div
                        class="bg-blackmax-w-7xl w-full grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12 items-center @if($firstRatio == '3-4') lg:[grid-template-columns:1.3fr_0.7fr] @endif">
                        <div class="lg:col-span-3 col-span-1 space-y-6">
                            {{-- Heading --}}
                            <h1
                                class="text-5xl lg:text-6xl font-extrabold text-on-surface leading-[1.1] tracking-tight font-['Plus_Jakarta_Sans']">
                                STAMPLE
                                <span class="text-primary italic">PBJ</span>
                            </h1>

                            {{-- Description --}}
                            <p class="text-sm text-on-surface-variant max-w-lg leading-relaxed font-medium">
                                "Sistem terpadu manajemen pembelajaran Pengadaan Barang dan Jasa"<br><br>
                                Akses ribuan materi eksklusif tentang pengadaan barang dan jasa pemerintah dari para pakar
                                industri dan tingkatkan kompetensi Anda dengan metode belajar yang interaktif dan fleksibel.
                            </p>

                            {{-- Fitur Unggulan --}}
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-4">
                                <div
                                    class="bg-white/60 backdrop-blur-md p-3 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-white/20">
                                    <div
                                        class="w-8 h-8 bg-primary-fixed rounded-xl flex items-center justify-center text-primary mb-2">
                                        <span class="material-symbols-outlined text-xl">verified</span>
                                    </div>
                                    <h3 class="text-base font-bold text-on-surface mb-1 font-['Plus_Jakarta_Sans']">
                                        Tersertifikasi</h3>
                                    <p class="text-xs text-on-surface-variant">Diakui Nasional oleh Lembaga Pemerintah</p>
                                </div>
                                <div
                                    class="bg-white/60 backdrop-blur-md p-3 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-white/20">
                                    <div
                                        class="w-8 h-8 bg-tertiary-fixed rounded-xl flex items-center justify-center text-tertiary mb-2">
                                        <span class="material-symbols-outlined text-xl">school</span>
                                    </div>
                                    <h3 class="text-base font-bold text-on-surface mb-1 font-['Plus_Jakarta_Sans']">50+
                                        Materi</h3>
                                    <p class="text-xs text-on-surface-variant">Kursus lengkap dari dasar hingga mahir</p>
                                </div>
                                <div
                                    class="bg-white/60 backdrop-blur-md p-3 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-white/20">
                                    <div
                                        class="w-8 h-8 bg-secondary-fixed rounded-xl flex items-center justify-center text-secondary mb-2">
                                        <span class="material-symbols-outlined text-xl">people</span>
                                    </div>
                                    <h3 class="text-base font-bold text-on-surface mb-1 font-['Plus_Jakarta_Sans']">10K+
                                        Pengguna</h3>
                                    <p class="text-xs text-on-surface-variant">Komunitas profesional pengadaan</p>
                                </div>
                                <div
                                    class="bg-white/60 backdrop-blur-md p-3 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-white/20">
                                    <div
                                        class="w-8 h-8 bg-tertiary-fixed rounded-xl flex items-center justify-center text-tertiary-container mb-2">
                                        <span class="material-symbols-outlined text-xl">access_time</span>
                                    </div>
                                    <h3 class="text-base font-bold text-on-surface mb-1 font-['Plus_Jakarta_Sans']">24/7
                                        Akses</h3>
                                    <p class="text-xs text-on-surface-variant">Belajar kapan saja, di mana saja</p>
                                </div>
                            </div>
                        </div>

                        {{-- Right: Slider Gambar --}}
                        <div class="mt-8 lg:mt-0 flex lg:col-span-2 col-span-1 justify-center lg:justify-center">
                            <div
                                class="@if($firstRatio == '3-4') w-[240px] md:w-[300px] lg:w-[300px] @else w-[330px] md:w-[390px] lg:w-[390px] @endif rounded-2xl overflow-hidden shadow-2xl bg-white/80 flex items-center justify-center relative">
                                @php
                                    $sliders = \App\Models\Slider::where('is_active', 1)->latest()->take(5)->get();
                                @endphp
                                @if($sliders->count())
                                    <div class="glide w-full h-full relative">
                                        <div class="glide__track" data-glide-el="track">
                                            <ul class="glide__slides">
                                                @foreach($sliders as $slider)
                                                    @php
                                                        // Cek rasio gambar (3:4 atau square)
                                                        $imagePath = storage_path('app/public/' . $slider->image);
                                                        $ratioClass = 'aspect-[3/4]';
                                                        if (file_exists($imagePath)) {
                                                            [$w, $h] = getimagesize($imagePath);
                                                            if ($w == $h) {
                                                                $ratioClass = 'aspect-square';
                                                            }
                                                        }
                                                    @endphp
                                                    <li class="glide__slide flex items-center justify-center">
                                                        @if($slider->url)
                                                            <a href="{{ $slider->url }}" target="_blank" class="block w-full h-full">
                                                                <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider"
                                                                    class="object-cover w-full h-full rounded-2xl {{ $ratioClass }} mx-auto" />
                                                            </a>
                                                        @else
                                                            <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider"
                                                                class="object-cover w-full h-full rounded-2xl {{ $ratioClass }} mx-auto" />
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div data-glide-el="controls">
                                            <button
                                                class="absolute left-2 top-1/2 -translate-y-1/2 z-20 bg-white/80     border border-primary/20 rounded-full shadow-md hover:bg-primary hover:text-white transition flex items-center justify-center w-7 h-7  p-0"
                                                style="box-shadow:0 2px 8px 0 #0001;"
                                                data-glide-dir="<" aria-label="Sebelumnya">
                                                <span class="material-symbols-outlined text-[18px] font-bold flex items-center justify-center leading-none">arrow_back_ios_new</span>
                                            </button>
                                            <button
                                                class="absolute right-2 top-1/2 -translate-y-1/2 z-20 bg-white/80    border border-primary/20 rounded-full shadow-md hover:bg-primary hover:text-white transition flex items-center justify-center w-7 h-7  p-0"
                                                style="box-shadow:0 2px 8px 0 #0001;"
                                                data-glide-dir=">" aria-label="Selanjutnya">
                                                <span class="material-symbols-outlined text-[18px] font-bold flex items-center justify-center leading-none">arrow_forward_ios</span>
                                            </button>
                                        </div>
                                        <div class="glide__bullets absolute left-0 right-0 bottom-2 flex justify-center items-center gap-2 z-40"
                                            data-glide-el="controls[nav]"></div>
                                    </div>
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">Belum ada slider
                                    </div>
                                @endif
                            </div>
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

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
@endpush

@push('scripts')
@endpush