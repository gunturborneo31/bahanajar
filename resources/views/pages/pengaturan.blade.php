@extends('layouts.app')
@section('title', 'Pengaturan Kategori & Artikel')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6" x-data="{
    openCat: 'umum',
    viewMode: 'grid',
    categories: [
        { key: 'umum', label: 'Umum', articles: [
            'Panduan Pengadaan', 'SOP Pengadaan', 'Formulir Permohonan', 'Daftar Vendor',
        ] },
        { key: 'kontrak', label: 'Kontrak', articles: [
            'Draft Kontrak Barang', 'Addendum Kontrak', 'Surat Penunjukan', 'Berita Acara Serah Terima',
        ] },
        { key: 'evaluasi', label: 'Evaluasi', articles: [
            'Format Evaluasi', 'Dokumen Sanggahan', 'Berita Acara Klarifikasi', 'Laporan Evaluasi Akhir',
        ] },
    ],
}">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Sidebar Kategori -->
        <aside class="w-full md:w-64 flex-shrink-0">
            <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4">
                <h3 class="font-bold text-sm text-[#111827] dark:text-white mb-4">Kategori</h3>
                <ul class="space-y-1">
                    <template x-for="cat in categories" :key="cat.key">
                        <li class="flex items-center justify-between px-3 py-2 rounded-xl text-sm font-medium text-[#374151] dark:text-[#D1D5DB] bg-transparent">
                            <span x-text="cat.label"></span>
                            <span class="text-xs bg-[#F3F4F6] dark:bg-[#374151] text-[#6B7280] px-2 py-0.5 rounded-full" x-text="cat.articles.length"></span>
                        </li>
                    </template>
                </ul>
            </div>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 min-w-0">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-[#111827] dark:text-white">Daftar Artikel</h2>
            </div>
            <div class="text-[#9CA3AF] text-sm py-10 text-center">Pilih menu kategori di kiri untuk pengaturan. Tidak ada daftar artikel yang ditampilkan.</div>
        </main>
    </div>
</div>
@endsection
