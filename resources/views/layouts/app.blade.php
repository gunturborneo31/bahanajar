<!DOCTYPE html>
<html lang="id" class="scroll-smooth" x-data="{ darkMode: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    {{-- Styles --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
{{-- ini hanya sebuah komen --}}
<body class="bg-[#F9FAFB] dark:bg-[#111827] text-[#111827] dark:text-[#F3F4F6] font-['Plus_Jakarta_Sans'] antialiased transition-colors duration-300">

    {{-- Navbar dihapus sesuai permintaan --}}

    {{-- Main Content --}}
    <main class="@unless(request()->routeIs('home')) pb-20 md:pb-0 @endunless">
        @yield('content')

    </main>

        {{-- Floating Bottom Navbar (tampil di semua halaman) --}}
        @include('components.bottom-navbar')

    {{-- Mobile Bottom Nav dihapus sesuai permintaan --}}

    @stack('scripts')
</body>
</html>
