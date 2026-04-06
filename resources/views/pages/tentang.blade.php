@extends('layouts.app')
@section('title', 'Tentang - BahanAjar Pengadaan Barang')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-16">

    {{-- Page Header --}}
    <div class="text-center mb-12">
        <span class="inline-block px-4 py-1.5 bg-[#FEF2F2] dark:bg-[#7F1D1D]/20 text-[#DC2626] text-xs font-semibold rounded-full mb-4 tracking-widest uppercase">Tentang Kami</span>
        <h1 class="font-['Poppins'] font-bold text-3xl md:text-5xl text-[#111827] dark:text-white mb-4">Platform Pembelajaran<br><span class="text-[#DC2626]">Terpercaya</span></h1>
        <p class="text-[#6B7280] max-w-xl mx-auto">Membangun kompetensi pengadaan barang dan jasa melalui pendekatan modern dan berbasis teknologi.</p>
    </div>

    {{-- 2-col grid: text + stats --}}
    <div class="grid md:grid-cols-2 gap-8 lg:gap-16 items-center mb-16">

        {{-- Left: Visi Misi --}}
        <div class="space-y-8">
            <div class="bg-white dark:bg-[#1F2937] rounded-2xl p-6 shadow-md border border-[#E5E7EB] dark:border-[#374151] hover:-translate-y-1 transition-transform">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#DC2626] to-[#B91C1C] flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h2 class="font-['Poppins'] font-bold text-xl text-[#111827] dark:text-white">Visi</h2>
                </div>
                <p class="text-[#6B7280] dark:text-[#9CA3AF] leading-relaxed">Menjadi platform pembelajaran pengadaan barang dan jasa pemerintah yang paling komprehensif, mudah diakses, dan dipercaya oleh seluruh praktisi di Indonesia.</p>
            </div>

            <div class="bg-white dark:bg-[#1F2937] rounded-2xl p-6 shadow-md border border-[#E5E7EB] dark:border-[#374151] hover:-translate-y-1 transition-transform">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#B91C1C] to-[#991B1B] flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h2 class="font-['Poppins'] font-bold text-xl text-[#111827] dark:text-white">Misi</h2>
                </div>
                <ul class="space-y-3 text-[#6B7280] dark:text-[#9CA3AF]">
                    @foreach(['Menyediakan materi pengadaan yang up-to-date sesuai regulasi terbaru', 'Memfasilitasi pembelajaran mandiri yang fleksibel dan interaktif', 'Membangun komunitas praktisi pengadaan yang solid dan kolaboratif', 'Mendorong transparansi dan akuntabilitas dalam proses pengadaan'] as $misi)
                    <li class="flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-[#DC2626] flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-sm leading-relaxed">{{ $misi }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-gradient-to-r from-[#DC2626] to-[#B91C1C] rounded-2xl p-6 text-white shadow-lg hover:-translate-y-1 transition-transform">
                <h3 class="font-['Poppins'] font-bold text-lg mb-2">Nilai-Nilai Kami</h3>
                <div class="grid grid-cols-2 gap-3 mt-4">
                    @foreach(['Integritas', 'Akuntabilitas', 'Transparansi', 'Profesional'] as $nilai)
                    <div class="flex items-center gap-2 bg-white/10 rounded-xl px-3 py-2 text-sm font-medium backdrop-blur-sm">
                        <span class="w-2 h-2 rounded-full bg-white/70"></span>{{ $nilai }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Right: Hero image + stats --}}
        <div class="space-y-6">
            {{-- Illustration placeholder --}}
            <div class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-[#FEF2F2] to-[#FEE2E2] dark:from-[#7F1D1D]/20 dark:to-[#991B1B]/10 h-64 md:h-80 flex items-center justify-center border border-[#FECACA] dark:border-[#7F1D1D]/30 shadow-xl">
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto mb-4 bg-gradient-to-br from-[#DC2626] to-[#B91C1C] rounded-3xl flex items-center justify-center shadow-lg shadow-red-500/30">
                        <svg class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <p class="text-[#DC2626] font-semibold text-lg font-['Poppins']">BahanAjar Indonesia</p>
                    <p class="text-[#6B7280] text-sm mt-1">Platform Terpadu Pengadaan</p>
                </div>
                {{-- decorative circles --}}
                <div class="absolute -top-8 -right-8 w-32 h-32 rounded-full border-2 border-[#DC2626]/10"></div>
                <div class="absolute -bottom-4 -left-4 w-24 h-24 rounded-full bg-[#DC2626]/5"></div>
            </div>

            {{-- Stats counters --}}
            <div class="grid grid-cols-2 gap-4">
                @foreach([
                    ['num' => '50+', 'label' => 'Total Materi', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'color' => 'text-[#DC2626] bg-[#FEF2F2] dark:bg-[#7F1D1D]/20'],
                    ['num' => '10K+', 'label' => 'Total Views', 'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z', 'color' => 'text-blue-600 bg-blue-50 dark:bg-blue-900/20'],
                    ['num' => '5K+', 'label' => 'Unduhan', 'icon' => 'M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4', 'color' => 'text-green-600 bg-green-50 dark:bg-green-900/20'],
                    ['num' => '2024', 'label' => 'Est. Tahun', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'color' => 'text-purple-600 bg-purple-50 dark:bg-purple-900/20'],
                ] as $stat)
                <div class="bg-white dark:bg-[#1F2937] rounded-2xl p-5 border border-[#E5E7EB] dark:border-[#374151] shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                    <div class="w-10 h-10 rounded-xl {{ $stat['color'] }} flex items-center justify-center mb-3">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/></svg>
                    </div>
                    <div class="font-['Poppins'] font-bold text-2xl text-[#111827] dark:text-white">{{ $stat['num'] }}</div>
                    <div class="text-[#6B7280] text-sm mt-0.5">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
