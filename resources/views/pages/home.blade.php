@extends('layouts.app')

@section('title', 'BahanAjar - Platform Pembelajaran Pengadaan Barang Modern')
@section('description', 'Pelajari Pengadaan Barang dan Jasa Pemerintah secara modern, interaktif, dan komprehensif.')

@section('content')
<div class="relative w-full h-screen overflow-hidden bg-[#0F0F0F]" x-data="{ search: '', showNav: false }">

    {{-- ========== PROCUREMENT MOTIF BACKGROUND ========== --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">

        {{-- Gradient base --}}
        <div class="absolute inset-0 bg-gradient-to-br from-[#1a0404] via-[#0F0F0F] to-[#0d0d1a]"></div>

        {{-- Animated gradient orbs --}}
        <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full bg-[#DC2626]/20 blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 -right-20 w-80 h-80 rounded-full bg-[#B91C1C]/15 blur-3xl animate-pulse" style="animation-delay:1.5s"></div>
        <div class="absolute -bottom-32 left-1/3 w-72 h-72 rounded-full bg-[#991B1B]/10 blur-3xl animate-pulse" style="animation-delay:3s"></div>

        {{-- SVG Procurement Pattern Overlay --}}
        <svg class="absolute inset-0 w-full h-full opacity-[0.04]" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="procurement-grid" x="0" y="0" width="120" height="120" patternUnits="userSpaceOnUse">
                    {{-- Document/File icon --}}
                    <g transform="translate(8,8)" fill="none" stroke="#DC2626" stroke-width="1.2">
                        <rect x="0" y="0" width="28" height="36" rx="3"/>
                        <path d="M6 12h16M6 18h16M6 24h10"/>
                        <path d="M18 0v8h10"/>
                    </g>
                    {{-- Stamp/Seal --}}
                    <g transform="translate(70,10)" fill="none" stroke="#DC2626" stroke-width="1.2">
                        <circle cx="16" cy="16" r="14"/>
                        <circle cx="16" cy="16" r="10"/>
                        <path d="M16 6v20M6 16h20"/>
                    </g>
                    {{-- Contract clipboard --}}
                    <g transform="translate(5,75)" fill="none" stroke="#DC2626" stroke-width="1.2">
                        <rect x="2" y="6" width="30" height="36" rx="2"/>
                        <rect x="10" y="2" width="14" height="8" rx="2"/>
                        <path d="M8 16h18M8 22h18M8 28h12"/>
                        <path d="M20 32l3 3 6-6"/>
                    </g>
                    {{-- Handshake / deal --}}
                    <g transform="translate(72,72)" fill="none" stroke="#DC2626" stroke-width="1.2">
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
        <svg class="absolute top-8 right-16 w-32 h-32 text-[#DC2626] opacity-[0.06]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        {{-- Clipboard - bottom left --}}
        <svg class="absolute bottom-16 left-8 w-28 h-28 text-[#DC2626] opacity-[0.05]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
        </svg>
        {{-- Shield/badge - top left --}}
        <svg class="absolute top-20 left-20 w-24 h-24 text-[#DC2626] opacity-[0.05]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
        </svg>
        {{-- Building (government) - center right --}}
        <svg class="absolute top-1/2 right-8 -translate-y-1/2 w-36 h-36 text-[#DC2626] opacity-[0.04]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
        </svg>
        {{-- Chart/analytics - bottom right --}}
        <svg class="absolute bottom-8 right-24 w-28 h-28 text-[#DC2626] opacity-[0.05]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
        </svg>
        {{-- Scale of justice - top center --}}
        <svg class="absolute top-4 left-1/2 -translate-x-1/2 w-20 h-20 text-[#DC2626] opacity-[0.04]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
        </svg>
        {{-- Box/tender package - center left --}}
        <svg class="absolute top-1/2 left-8 -translate-y-1/2 w-24 h-24 text-[#DC2626] opacity-[0.04]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
        </svg>
        {{-- Magnify/search (procurement inspection) --}}
        <svg class="absolute bottom-20 left-1/3 w-20 h-20 text-[#DC2626] opacity-[0.04]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>

        {{-- Diagonal grid lines --}}
        <svg class="absolute inset-0 w-full h-full opacity-[0.02]" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="lines" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                    <line x1="0" y1="60" x2="60" y2="0" stroke="#DC2626" stroke-width="0.5"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#lines)"/>
        </svg>

        {{-- Noise texture overlay --}}
        <div class="absolute inset-0 opacity-[0.03]" style="background-image:url('data:image/svg+xml,%3Csvg viewBox=\'0 0 200 200\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'noise\'%3E%3CfeTurbulence type=\'fractalNoise\' baseFrequency=\'0.9\' numOctaves=\'4\' stitchTiles=\'stitch\'/%3E%3C/filter%3E%3Crect width=\'100%25\' height=\'100%25\' filter=\'url(%23noise)\'/%3E%3C/svg%3E')"></div>
    </div>

    {{-- ========== MAIN CONTENT ========== --}}
    <div class="relative z-10 h-full flex flex-col">

        {{-- Top bar: Logo + Dark mode (minimal, no full menu) --}}
        <div class="flex items-center justify-between px-6 md:px-12 pt-6 pb-2 flex-shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#DC2626] to-[#B91C1C] flex items-center justify-center shadow-lg shadow-red-900/30">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div>
                    <div class="font-['Poppins'] font-bold text-white text-lg leading-tight">BahanAjar</div>
                    <div class="text-[#9CA3AF] text-[10px] font-medium tracking-widest uppercase">Pengadaan Barang</div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                {{-- Dark mode toggle --}}
                <button @click="darkMode = !darkMode" class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 hover:bg-white/10 flex items-center justify-center transition-all backdrop-blur-sm" title="Toggle dark mode">
                    <svg x-show="!darkMode" class="w-4 h-4 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                    <svg x-show="darkMode" class="w-4 h-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </button>
                {{-- Admin link --}}
                <a href="{{ route('login') }}" class="text-[#9CA3AF] hover:text-white text-xs font-medium transition-colors px-3 py-2 rounded-lg hover:bg-white/5">
                    Masuk
                </a>
            </div>
        </div>

        {{-- ========== HERO SECTION - CENTER ========== --}}
        <div class="flex-1 flex flex-col items-center justify-center px-4 md:px-8 -mt-4">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 bg-[#DC2626]/10 border border-[#DC2626]/20 text-[#EF4444] text-xs font-semibold px-4 py-2 rounded-full mb-6 backdrop-blur-sm animate-[fadeIn_0.6s_ease]">
                <span class="w-2 h-2 rounded-full bg-[#EF4444] animate-pulse"></span>
                Platform Pembelajaran Terpercaya
            </div>

            {{-- H1 --}}
            <h1 class="font-['Poppins'] font-black text-3xl md:text-5xl lg:text-6xl text-white text-center leading-tight max-w-3xl mx-auto mb-4 animate-[fadeUp_0.7s_ease]">
                Belajar
                <span class="relative">
                    <span class="bg-gradient-to-r from-[#EF4444] via-[#DC2626] to-[#B91C1C] bg-clip-text text-transparent">Pengadaan Barang</span>
                    <svg class="absolute -bottom-2 left-0 w-full" height="6" viewBox="0 0 300 6" preserveAspectRatio="none">
                        <path d="M0 5 Q75 0 150 5 Q225 10 300 5" stroke="#DC2626" stroke-width="2" fill="none" opacity="0.7"/>
                    </svg>
                </span>
                Modern
            </h1>

            {{-- Subtitle --}}
            <p class="text-[#9CA3AF] text-sm md:text-base text-center max-w-lg mx-auto mb-8 leading-relaxed animate-[fadeUp_0.8s_ease]">
                Pelajari seluruh aspek pengadaan barang dan jasa pemerintah — dari perencanaan, tender, hingga evaluasi kontrak — dengan materi interaktif terkurasi.
            </p>

            {{-- Search Bar --}}
            <div class="w-full max-w-xl mx-auto mb-8 animate-[fadeUp_0.9s_ease]">
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#DC2626] to-[#B91C1C] rounded-2xl blur opacity-20 group-hover:opacity-30 transition-opacity"></div>
                    <div class="relative flex items-center bg-white/5 border border-white/10 rounded-2xl backdrop-blur-md overflow-hidden focus-within:border-[#DC2626]/50 transition-all">
                        <svg class="w-5 h-5 text-[#6B7280] ml-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input
                            x-model="search"
                            type="text"
                            placeholder="Cari materi pengadaan..."
                            class="flex-1 bg-transparent text-white placeholder-[#6B7280] px-4 py-4 text-sm outline-none"
                            @keydown.enter="window.location='/materi?q=' + search"
                        >
                        <button
                            @click="window.location='/materi?q=' + search"
                            class="m-2 px-5 py-2.5 bg-gradient-to-r from-[#DC2626] to-[#B91C1C] text-white text-sm font-semibold rounded-xl hover:scale-105 hover:shadow-lg hover:shadow-red-900/30 transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <span class="hidden sm:inline">Cari</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- CTA Grid 2x2 --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 w-full max-w-2xl mx-auto animate-[fadeUp_1s_ease]">
                @foreach([
                    ['href' => route('tentang'), 'label' => 'Tentang', 'desc' => 'Visi & Misi', 'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'from-blue-500/10 to-blue-600/5 border-blue-500/20 text-blue-400'],
                    ['href' => route('profil'), 'label' => 'Profil', 'desc' => 'Pengelola', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'color' => 'from-purple-500/10 to-purple-600/5 border-purple-500/20 text-purple-400'],
                    ['href' => route('materi'), 'label' => 'Materi', 'desc' => '50+ Konten', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'color' => 'from-[#DC2626]/20 to-[#DC2626]/5 border-[#DC2626]/30 text-[#EF4444]'],
                    ['href' => route('kontak'), 'label' => 'Kontak', 'desc' => 'Hubungi Kami', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'color' => 'from-green-500/10 to-green-600/5 border-green-500/20 text-green-400'],
                ] as $cta)
                <a href="{{ $cta['href'] }}"
                   class="group relative flex items-center gap-3 p-4 rounded-2xl bg-gradient-to-br {{ $cta['color'] }} border backdrop-blur-sm hover:scale-[1.03] hover:-translate-y-0.5 transition-all duration-200 cursor-pointer overflow-hidden">
                    <div class="absolute inset-0 bg-white/0 group-hover:bg-white/5 transition-colors rounded-2xl"></div>
                    <svg class="w-8 h-8 flex-shrink-0 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $cta['icon'] }}"/></svg>
                    <div class="min-w-0">
                        <div class="text-white font-semibold text-sm leading-tight">{{ $cta['label'] }}</div>
                        <div class="text-[#6B7280] text-xs mt-0.5 truncate">{{ $cta['desc'] }}</div>
                    </div>
                    <svg class="w-4 h-4 text-white/30 ml-auto group-hover:translate-x-0.5 transition-transform flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                @endforeach
            </div>
        </div>

        {{-- Bottom stats strip --}}
        <div class="flex items-center justify-center gap-6 md:gap-12 px-6 py-4 flex-shrink-0">
            @foreach([
                ['num' => '50+', 'label' => 'Materi'],
                ['num' => '10K+', 'label' => 'Pengguna'],
                ['num' => '100%', 'label' => 'Gratis'],
                ['num' => '24/7', 'label' => 'Akses'],
            ] as $stat)
            <div class="text-center">
                <div class="font-['Poppins'] font-bold text-white text-lg md:text-2xl">{{ $stat['num'] }}</div>
                <div class="text-[#6B7280] text-[10px] md:text-xs font-medium uppercase tracking-wider">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('head')
<style>
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endpush
