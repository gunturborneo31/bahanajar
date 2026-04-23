<!DOCTYPE html>
<html lang="id" class="scroll-smooth" x-data="{ darkMode: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#DC2626">
    <title>@yield('title', 'BahanAjar - Platform Pembelajaran Pengadaan Barang')</title>
    <meta name="description" content="@yield('description', 'Platform pembelajaran modern untuk Pengadaan Barang dan Jasa Pemerintah')">
    {{-- PWA Manifest --}}
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/icons/icon-192.png">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@600;700;800;900&display=swap" rel="stylesheet">
    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
{{-- ini hanya sebuah komen --}}
<body class="bg-[#F9FAFB] dark:bg-[#111827] text-[#111827] dark:text-[#F3F4F6] font-['Inter'] antialiased transition-colors duration-300">

    {{-- Navbar (only on non-home pages) --}}
    @unless(request()->routeIs('home'))
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-[#1F2937]/80 backdrop-blur-md border-b border-[#E5E7EB] dark:border-[#374151] transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#DC2626] to-[#B91C1C] flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <span class="font-['Poppins'] font-bold text-[#DC2626] text-lg">SIKAP BERJASA</span>
                </a>
                {{-- Desktop Nav --}}
                <div class="hidden md:flex items-center gap-1">
                    @foreach([['route' => 'home', 'label' => 'Home'], ['route' => 'peraturan', 'label' => 'Peraturan PBJ'], ['route' => 'materi', 'label' => 'Informasi'], ['route' => 'materi', 'label' => 'Dokumen'], ['route' => 'kontak', 'label' => 'Aplikasi PBJ']] as $item)
                    <a href="{{ route($item['route']) }}"
                       class="px-4 py-2 rounded-lg text-sm font-medium transition-all hover:bg-[#FEF2F2] hover:text-[#DC2626] dark:hover:bg-[#7F1D1D]/20 {{ request()->routeIs($item['route']) ? 'bg-[#FEF2F2] text-[#DC2626] dark:bg-[#7F1D1D]/20' : 'text-[#6B7280] dark:text-[#9CA3AF]' }}">
                        {{ $item['label'] }}
                    </a>
                    @endforeach
                </div>
                {{-- Right side --}}
                <div class="flex items-center gap-3">
                    {{-- Dark mode toggle --}}
                    <button @click="darkMode = !darkMode" class="w-9 h-9 rounded-lg bg-[#F3F4F6] dark:bg-[#374151] flex items-center justify-center hover:scale-105 transition-all" title="Toggle dark mode">
                        <svg x-show="!darkMode" class="w-4 h-4 text-[#6B7280]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                        <svg x-show="darkMode" class="w-4 h-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </button>
                    <a href="{{ route('login') }}" class="hidden md:inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#DC2626] to-[#B91C1C] text-white text-sm font-semibold rounded-xl shadow-md hover:scale-105 hover:shadow-lg transition-all">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                        Masuk
                    </a>
                    {{-- Mobile hamburger --}}
                    <button x-data="{ open: false }" @click="open = !open" class="md:hidden w-9 h-9 rounded-lg bg-[#F3F4F6] dark:bg-[#374151] flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#374151] dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="h-16"></div>
    @endunless

    {{-- Main Content --}}
    <main class="@unless(request()->routeIs('home')) pb-20 md:pb-0 @endunless">
        @yield('content')
    </main>

    {{-- Mobile Bottom Nav (except home) --}}
    @unless(request()->routeIs('home'))
    <nav class="md:hidden fixed bottom-0 left-0 right-0 z-50 bg-white/90 dark:bg-[#1F2937]/90 backdrop-blur-md border-t border-[#E5E7EB] dark:border-[#374151] safe-area-bottom">
        <div class="flex items-center justify-around h-16 px-2">
            @foreach([
                ['route' => 'home', 'label' => 'Beranda', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                ['route' => 'materi', 'label' => 'Materi', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                ['route' => 'profil', 'label' => 'Profil', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                ['route' => 'kontak', 'label' => 'Kontak', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                ['route' => 'admin.dashboard', 'label' => 'Admin', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z']
            ] as $item)
            <a href="{{ route($item['route']) }}" class="flex flex-col items-center gap-1 py-1 px-3 rounded-xl transition-all {{ request()->routeIs($item['route']) ? 'text-[#DC2626]' : 'text-[#9CA3AF] dark:text-[#6B7280]' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/></svg>
                <span class="text-[10px] font-medium">{{ $item['label'] }}</span>
                @if(request()->routeIs($item['route']))
                <div class="w-1 h-1 rounded-full bg-[#DC2626]"></div>
                @endif
            </a>
            @endforeach
        </div>
    </nav>
    @endunless

    @stack('scripts')
</body>
</html>
