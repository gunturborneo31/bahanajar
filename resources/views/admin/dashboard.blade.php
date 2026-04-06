@extends('layouts.app')
@section('title', 'Admin Dashboard - BahanAjar')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="font-['Poppins'] font-bold text-2xl md:text-3xl text-[#111827] dark:text-white">Dashboard Admin</h1>
            <p class="text-[#6B7280] text-sm mt-1">Selamat datang kembali, Admin!</p>
        </div>
        <a href="{{ route('admin.edit-material') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-[#DC2626] to-[#B91C1C] text-white text-sm font-semibold rounded-xl shadow-md hover:scale-105 hover:shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Materi
        </a>
    </div>

    {{-- Stats Cards 4x --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        @foreach([
            ['label' => 'Total Materi', 'value' => '50', 'change' => '+5 bulan ini', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'color' => 'from-[#DC2626] to-[#B91C1C]', 'bg' => 'from-[#FEF2F2] to-white dark:from-[#7F1D1D]/20 dark:to-[#1F2937]'],
            ['label' => 'Total Views', 'value' => '10.2K', 'change' => '+12% minggu ini', 'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z', 'color' => 'from-blue-500 to-blue-600', 'bg' => 'from-blue-50 to-white dark:from-blue-900/20 dark:to-[#1F2937]'],
            ['label' => 'Total Unduhan', 'value' => '5.4K', 'change' => '+8% minggu ini', 'icon' => 'M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4', 'color' => 'from-green-500 to-green-600', 'bg' => 'from-green-50 to-white dark:from-green-900/20 dark:to-[#1F2937]'],
            ['label' => 'Pengunjung Hari Ini', 'value' => '243', 'change' => '+18% vs kemarin', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'color' => 'from-purple-500 to-purple-600', 'bg' => 'from-purple-50 to-white dark:from-purple-900/20 dark:to-[#1F2937]'],
        ] as $stat)
        <div class="bg-gradient-to-br {{ $stat['bg'] }} rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-5 hover:-translate-y-0.5 hover:shadow-md transition-all">
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br {{ $stat['color'] }} flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/></svg>
                </div>
                <span class="text-xs text-green-600 dark:text-green-400 font-semibold bg-green-50 dark:bg-green-900/20 px-2 py-0.5 rounded-full">↑</span>
            </div>
            <div class="font-['Poppins'] font-black text-3xl text-[#111827] dark:text-white">{{ $stat['value'] }}</div>
            <div class="text-sm text-[#6B7280] dark:text-[#9CA3AF] mt-0.5">{{ $stat['label'] }}</div>
            <div class="text-xs text-green-600 dark:text-green-400 mt-1">{{ $stat['change'] }}</div>
        </div>
        @endforeach
    </div>

    {{-- Charts Row --}}
    <div class="grid md:grid-cols-3 gap-6 mb-8">

        {{-- Line Chart --}}
        <div class="md:col-span-2 bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="font-['Poppins'] font-bold text-base text-[#111827] dark:text-white">Tren Views</h3>
                    <p class="text-xs text-[#9CA3AF] mt-0.5">30 hari terakhir</p>
                </div>
                <select class="text-xs border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] rounded-xl px-3 py-2 text-[#6B7280] dark:text-[#9CA3AF] focus:outline-none">
                    <option>30 Hari</option>
                    <option>7 Hari</option>
                    <option>90 Hari</option>
                </select>
            </div>
            {{-- SVG Chart Mockup --}}
            <div class="relative h-40">
                <svg viewBox="0 0 600 160" class="w-full h-full" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="chartGrad" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#DC2626" stop-opacity="0.2"/>
                            <stop offset="100%" stop-color="#DC2626" stop-opacity="0"/>
                        </linearGradient>
                    </defs>
                    {{-- Grid lines --}}
                    @foreach([0, 40, 80, 120, 160] as $y)
                    <line x1="0" y1="{{ $y }}" x2="600" y2="{{ $y }}" stroke="#E5E7EB" stroke-width="0.5" class="dark:stroke-[#374151]"/>
                    @endforeach
                    {{-- Area fill --}}
                    <path d="M0 140 L60 110 L120 125 L180 80 L240 95 L300 60 L360 70 L420 45 L480 55 L540 30 L600 40 L600 160 L0 160 Z" fill="url(#chartGrad)"/>
                    {{-- Line --}}
                    <path d="M0 140 L60 110 L120 125 L180 80 L240 95 L300 60 L360 70 L420 45 L480 55 L540 30 L600 40" fill="none" stroke="#DC2626" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    {{-- Dots --}}
                    @foreach([[0,140],[60,110],[120,125],[180,80],[240,95],[300,60],[360,70],[420,45],[480,55],[540,30],[600,40]] as $point)
                    <circle cx="{{ $point[0] }}" cy="{{ $point[1] }}" r="4" fill="#DC2626" stroke="white" stroke-width="2"/>
                    @endforeach
                </svg>
            </div>
        </div>

        {{-- Pie Chart (Kategori) --}}
        <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-6">
            <h3 class="font-['Poppins'] font-bold text-base text-[#111827] dark:text-white mb-4">Distribusi Kategori</h3>
            <div class="flex items-center justify-center mb-4">
                <svg viewBox="0 0 100 100" class="w-32 h-32 -rotate-90">
                    {{-- Pie segments --}}
                    <circle cx="50" cy="50" r="40" fill="none" stroke="#DC2626" stroke-width="20" stroke-dasharray="75.4 175.9" stroke-dashoffset="0"/>
                    <circle cx="50" cy="50" r="40" fill="none" stroke="#3B82F6" stroke-width="20" stroke-dasharray="50.3 175.9" stroke-dashoffset="-75.4"/>
                    <circle cx="50" cy="50" r="40" fill="none" stroke="#10B981" stroke-width="20" stroke-dasharray="37.7 175.9" stroke-dashoffset="-125.7"/>
                    <circle cx="50" cy="50" r="40" fill="none" stroke="#F59E0B" stroke-width="20" stroke-dasharray="37.7 175.9" stroke-dashoffset="-163.4"/>
                </svg>
            </div>
            <div class="space-y-2">
                @foreach([['label'=>'Pengadaan Barang','pct'=>'30%','color'=>'bg-[#DC2626]'],['label'=>'Tender & Lelang','pct'=>'20%','color'=>'bg-blue-500'],['label'=>'Regulasi','pct'=>'15%','color'=>'bg-green-500'],['label'=>'Digital','pct'=>'15%','color'=>'bg-yellow-500']] as $item)
                <div class="flex items-center gap-2 text-xs">
                    <span class="w-2.5 h-2.5 rounded-full {{ $item['color'] }} flex-shrink-0"></span>
                    <span class="flex-1 text-[#6B7280] dark:text-[#9CA3AF] truncate">{{ $item['label'] }}</span>
                    <span class="font-semibold text-[#111827] dark:text-white">{{ $item['pct'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Tables Row --}}
    <div class="grid lg:grid-cols-2 gap-6">

        {{-- Materials Table --}}
        <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] overflow-hidden">
            <div class="flex items-center justify-between p-5 border-b border-[#E5E7EB] dark:border-[#374151]">
                <h3 class="font-['Poppins'] font-bold text-base text-[#111827] dark:text-white">Daftar Materi</h3>
                <a href="{{ route('admin.edit-material') }}" class="text-xs text-[#DC2626] font-semibold hover:underline">+ Tambah</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-xs">
                    <thead class="bg-[#F9FAFB] dark:bg-[#111827]">
                        <tr>
                            <th class="text-left px-4 py-3 text-[#6B7280] font-semibold">Judul</th>
                            <th class="text-left px-4 py-3 text-[#6B7280] font-semibold hidden sm:table-cell">Tipe</th>
                            <th class="text-left px-4 py-3 text-[#6B7280] font-semibold hidden sm:table-cell">Views</th>
                            <th class="text-right px-4 py-3 text-[#6B7280] font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#F3F4F6] dark:divide-[#374151]">
                        @foreach(['Pengantar Pengadaan','Perencanaan Pengadaan','Metode Pemilihan','Dokumen Pengadaan','Evaluasi Penawaran','Kontrak Pengadaan'] as $i => $mat)
                        <tr class="hover:bg-[#F9FAFB] dark:hover:bg-[#111827] transition-colors">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#DC2626] to-[#B91C1C] flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                    </div>
                                    <span class="text-[#111827] dark:text-white font-medium truncate max-w-[120px]">{{ $mat }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 hidden sm:table-cell">
                                <span class="px-2 py-1 rounded-lg text-[10px] font-bold {{ $i % 2 === 0 ? 'bg-[#FEF2F2] text-[#DC2626]' : 'bg-blue-50 text-blue-600' }}">
                                    {{ $i % 2 === 0 ? 'VIDEO' : 'ARTIKEL' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-[#6B7280] hidden sm:table-cell">{{ rand(400, 2000) }}</td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <button class="p-1.5 rounded-lg hover:bg-[#F3F4F6] dark:hover:bg-[#374151] text-[#6B7280] hover:text-[#DC2626] transition-all">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>
                                    <button class="p-1.5 rounded-lg hover:bg-[#FEF2F2] dark:hover:bg-red-900/20 text-[#6B7280] hover:text-[#DC2626] transition-all">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Visitors Log --}}
        <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] overflow-hidden">
            <div class="flex items-center justify-between p-5 border-b border-[#E5E7EB] dark:border-[#374151]">
                <h3 class="font-['Poppins'] font-bold text-base text-[#111827] dark:text-white">Log Pengunjung</h3>
                <span class="text-xs text-[#9CA3AF]">Real-time</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-xs">
                    <thead class="bg-[#F9FAFB] dark:bg-[#111827]">
                        <tr>
                            <th class="text-left px-4 py-3 text-[#6B7280] font-semibold">IP / Device</th>
                            <th class="text-left px-4 py-3 text-[#6B7280] font-semibold hidden sm:table-cell">Halaman</th>
                            <th class="text-left px-4 py-3 text-[#6B7280] font-semibold">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#F3F4F6] dark:divide-[#374151]">
                        @foreach([
                            ['ip' => '192.168.1.x', 'device' => 'Mobile', 'page' => '/materi', 'time' => '2 menit lalu', 'dev_icon' => 'mobile'],
                            ['ip' => '10.0.0.x', 'device' => 'Desktop', 'page' => '/materi/pengantar', 'time' => '5 menit lalu', 'dev_icon' => 'desktop'],
                            ['ip' => '172.16.x.x', 'device' => 'Tablet', 'page' => '/', 'time' => '8 menit lalu', 'dev_icon' => 'tablet'],
                            ['ip' => '203.0.x.x', 'device' => 'Mobile', 'page' => '/kontak', 'time' => '12 menit lalu', 'dev_icon' => 'mobile'],
                            ['ip' => '198.51.x.x', 'device' => 'Desktop', 'page' => '/tentang', 'time' => '18 menit lalu', 'dev_icon' => 'desktop'],
                            ['ip' => '100.64.x.x', 'device' => 'Mobile', 'page' => '/materi', 'time' => '22 menit lalu', 'dev_icon' => 'mobile'],
                        ] as $visitor)
                        <tr class="hover:bg-[#F9FAFB] dark:hover:bg-[#111827] transition-colors">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-lg {{ $visitor['dev_icon'] === 'mobile' ? 'bg-green-50 dark:bg-green-900/20 text-green-600' : ($visitor['dev_icon'] === 'desktop' ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-600' : 'bg-purple-50 dark:bg-purple-900/20 text-purple-600') }} flex items-center justify-center flex-shrink-0">
                                        @if($visitor['dev_icon'] === 'mobile')
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                        @else
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="text-[#111827] dark:text-white font-medium">{{ $visitor['ip'] }}</div>
                                        <div class="text-[#9CA3AF]">{{ $visitor['device'] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-[#6B7280] hidden sm:table-cell font-mono">{{ $visitor['page'] }}</td>
                            <td class="px-4 py-3 text-[#9CA3AF]">{{ $visitor['time'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
