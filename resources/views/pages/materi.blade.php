@extends('layouts.app')
@section('title', 'Panduan - BahanAjar Pengadaan Barang')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6" x-data="{
    viewMode: 'grid',
    sidebarOpen: false,
    openCat: 'pengadaan',
    search: '{{ request('q', '') }}',
    modalOpen: false,
    modalMaterial: null,
    materials: [
        { id:1, title:'Pengantar Pengadaan Barang & Jasa', category:'Dasar Pengadaan', type:'video', desc:'Memahami konsep dasar pengadaan barang dan jasa pemerintah sesuai Perpres 16/2018', views:1240, downloads:342, thumb:'', badges:['video','populer'], status:'dibuka' },
        { id:2, title:'Perencanaan Pengadaan yang Efektif', category:'Perencanaan', type:'text', desc:'Langkah-langkah menyusun rencana pengadaan tahunan yang terstruktur dan akuntabel', views:980, downloads:215, thumb:'', badges:['artikel'], status:'dibuka' },
        { id:3, title:'Metode Pemilihan Penyedia', category:'Tender & Lelang', type:'video', desc:'Perbedaan tender, seleksi, penunjukan langsung, pengadaan langsung, dan e-purchasing', views:1560, downloads:410, thumb:'', badges:['video','baru'], status:'dibuka' },
        { id:4, title:'Dokumen Pengadaan & Spesifikasi Teknis', category:'Tender & Lelang', type:'file', desc:'Cara membuat dokumen pengadaan yang lengkap dan spesifikasi teknis yang terukur', views:720, downloads:189, thumb:'', badges:['pdf'], status:'dibuka' },
        { id:5, title:'Evaluasi Penawaran & Kualifikasi', category:'Evaluasi', type:'video', desc:'Teknik evaluasi penawaran yang adil dan transparan sesuai ketentuan yang berlaku', views:890, downloads:267, thumb:'', badges:['video'], status:'dibuka' },
        { id:6, title:'Kontrak Pengadaan & Pelaksanaan', category:'Kontrak', type:'drive', desc:'Pemahaman jenis kontrak, klausul penting, dan manajemen pelaksanaan kontrak', views:1100, downloads:305, thumb:'', badges:['drive','terlengkap'], status:'dibuka' },
        { id:7, title:'Pengawasan & Pengendalian Pengadaan', category:'Evaluasi', type:'text', desc:'Mekanisme monitoring, evaluasi, dan pengendalian proses pengadaan barang dan jasa', views:640, downloads:143, thumb:'', badges:['artikel'], status:'dibuka' },
        { id:8, title:'E-Procurement & SIRUP', category:'Digital', type:'video', desc:'Penggunaan sistem e-procurement pemerintah: LPSE, SiRUP, dan aplikasi LKPP lainnya', views:2100, downloads:578, thumb:'', badges:['video','populer'], status:'dibuka' },
        { id:9, title:'Pengadaan Darurat & Khusus', category:'Dasar Pengadaan', type:'file', desc:'Ketentuan pengadaan pada kondisi darurat, keadaan kahar, dan kebutuhan khusus', views:430, downloads:98, thumb:'', badges:['pdf'], status:'dibuka' },
    ]
}">

    {{-- Top Filter Bar --}}
    <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">

            {{-- Search --}}
            <div class="relative flex-1">
                <svg class="absolute left-3.5 top-3 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input x-model="search" type="text" placeholder="Cari panduan pengadaan..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
            </div>

            {{-- Category dropdown --}}
            <select class="px-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 min-w-[160px]">
                <option>Semua Kategori</option>
                <option>Dasar Pengadaan</option>
                <option>Perencanaan</option>
                <option>Tender & Lelang</option>
                <option>Evaluasi</option>
                <option>Kontrak</option>
                <option>Digital</option>
            </select>

            {{-- Sort --}}
            <select class="px-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 min-w-[140px]">
                <option>Terbaru</option>
                <option>Terpopuler</option>
                <option>A-Z</option>
            </select>

            {{-- View toggle --}}
            <div class="flex gap-1 bg-[#F3F4F6] dark:bg-[#374151] p-1 rounded-xl">
                <button @click="viewMode='grid'" :class="viewMode==='grid' ? 'bg-white dark:bg-[#1F2937] shadow-sm text-[#DC2626]' : 'text-[#9CA3AF]'" class="p-2 rounded-lg transition-all">
                    <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                </button>
                <button @click="viewMode='list'" :class="viewMode==='list' ? 'bg-white dark:bg-[#1F2937] shadow-sm text-[#DC2626]' : 'text-[#9CA3AF]'" class="p-2 rounded-lg transition-all">
                    <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>

    <div class="flex gap-6">

        {{-- Left Sidebar - Category Tree --}}
        <aside class="hidden lg:block w-60 flex-shrink-0">
            <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 sticky top-24">
                <h3 class="font-['Poppins'] font-bold text-sm text-[#111827] dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#DC2626]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/></svg>
                    Kategori
                </h3>

                @php $categories = [
                    ['key'=>'pengadaan','label'=>'Pengadaan Barang','count'=>15,'children'=>[
                        ['label'=>'Tender Barang','count'=>6],['label'=>'Pengadaan Langsung','count'=>5],['label'=>'E-Purchasing','count'=>4],
                    ]],
                    ['key'=>'jasa','label'=>'Pengadaan Jasa','count'=>12,'children'=>[
                        ['label'=>'Jasa Konsultansi','count'=>5],['label'=>'Jasa Konstruksi','count'=>4],['label'=>'Jasa Lainnya','count'=>3],
                    ]],
                    ['key'=>'regulasi','label'=>'Regulasi & Hukum','count'=>8,'children'=>[
                        ['label'=>'Perpres 16/2018','count'=>3],['label'=>'Perpres 12/2021','count'=>3],['label'=>'PMK Terkait','count'=>2],
                    ]],
                    ['key'=>'digital','label'=>'Digital Procurement','count'=>10,'children'=>[
                        ['label'=>'LPSE','count'=>4],['label'=>'SiRUP','count'=>3],['label'=>'SPSE','count'=>3],
                    ]],
                ]; @endphp

                <div class="space-y-1" x-data="{ openCat: 'pengadaan' }">
                    @foreach($categories as $cat)
                    <div>
                        <button @click="openCat = openCat === '{{ $cat['key'] }}' ? null : '{{ $cat['key'] }}'"
                            class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-sm font-medium transition-all hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]/20 hover:text-[#DC2626]"
                            :class="openCat === '{{ $cat['key'] }}' ? 'bg-[#FEF2F2] dark:bg-[#7F1D1D]/20 text-[#DC2626]' : 'text-[#374151] dark:text-[#D1D5DB]'">
                            <div class="flex items-center gap-2">
                                <svg class="w-3 h-3 transition-transform duration-200" :class="openCat === '{{ $cat['key'] }}' ? 'rotate-90' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                                <span>{{ $cat['label'] }}</span>
                            </div>
                            <span class="text-xs bg-[#F3F4F6] dark:bg-[#374151] text-[#6B7280] px-2 py-0.5 rounded-full">{{ $cat['count'] }}</span>
                        </button>

                        <div x-show="openCat === '{{ $cat['key'] }}'" x-collapse class="pl-4 mt-1 space-y-0.5">
                            @foreach($cat['children'] as $child)
                            <button class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs text-[#6B7280] dark:text-[#9CA3AF] hover:text-[#DC2626] hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]/10 transition-all">
                                <span>{{ $child['label'] }}</span>
                                <span class="text-[10px] text-[#9CA3AF]">{{ $child['count'] }}</span>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 min-w-0">

            {{-- Results header --}}
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm text-[#6B7280]"><span class="font-semibold text-[#111827] dark:text-white">9</span> panduan ditemukan</p>
                <button class="lg:hidden flex items-center gap-2 text-sm text-[#DC2626] font-medium" @click="sidebarOpen = !sidebarOpen">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filter
                </button>
            </div>

            {{-- Grid View --}}
            <div x-show="viewMode === 'grid'" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
                <template x-for="mat in materials.filter(m => !search || m.title.toLowerCase().includes(search.toLowerCase()))" :key="mat.id">
                    <div class="group bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all duration-300 cursor-pointer"
                         @click="modalMaterial = mat; modalOpen = true">

                        {{-- Thumbnail --}}
                        <div class="h-40 bg-gradient-to-br from-[#FEF2F2] to-[#FECACA] dark:from-[#7F1D1D]/30 dark:to-[#991B1B]/20 relative overflow-hidden flex items-center justify-center">
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#DC2626] to-[#B91C1C] flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path x-show="mat.type==='video'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    <path x-show="mat.type==='text'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    <path x-show="mat.type==='file'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    <path x-show="mat.type==='drive'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                                </svg>
                            </div>
                            {{-- Badges --}}
                            <div class="absolute top-3 left-3 flex gap-1.5 flex-wrap">
                                <template x-for="badge in mat.badges">
                                    <span class="px-2 py-0.5 text-[10px] font-bold rounded-full uppercase"
                                        :class="{
                                            'bg-[#DC2626] text-white': badge==='video',
                                            'bg-blue-500 text-white': badge==='artikel',
                                            'bg-orange-500 text-white': badge==='pdf',
                                            'bg-green-500 text-white': badge==='drive',
                                            'bg-yellow-500 text-white': badge==='populer',
                                            'bg-purple-500 text-white': badge==='baru',
                                            'bg-gray-700 text-white': badge==='terlengkap',
                                        }"
                                        x-text="badge">
                                    </span>
                                </template>
                            </div>
                        </div>

                        {{-- Card body --}}
                        <div class="p-4">
                            <p class="text-[10px] font-semibold text-[#DC2626] uppercase tracking-widest mb-1.5" x-text="mat.category"></p>
                            <h3 class="font-['Poppins'] font-bold text-sm text-[#111827] dark:text-white leading-snug mb-2 line-clamp-2" x-text="mat.title"></h3>
                            <p class="text-xs text-[#6B7280] dark:text-[#9CA3AF] leading-relaxed mb-4 line-clamp-2" x-text="mat.desc"></p>

                            {{-- Stats --}}
                            <div class="flex items-center gap-3 text-xs text-[#9CA3AF] mb-4">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    <span x-text="mat.views.toLocaleString()"></span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    <span x-text="mat.downloads"></span>
                                </span>
                            </div>

                            {{-- Actions --}}
                            <div class="flex gap-2">
                                <button @click.stop="modalMaterial = mat; modalOpen = true" class="flex-1 py-2 px-3 bg-gradient-to-r from-[#DC2626] to-[#B91C1C] text-white text-xs font-semibold rounded-xl hover:scale-105 hover:shadow-md transition-all">
                                    Preview
                                </button>
                                <button @click.stop class="py-2 px-3 bg-[#F3F4F6] dark:bg-[#374151] text-[#374151] dark:text-white text-xs font-semibold rounded-xl hover:scale-105 transition-all">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- List View --}}
            <div x-show="viewMode === 'list'" class="space-y-3">
                <template x-for="mat in materials.filter(m => !search || m.title.toLowerCase().includes(search.toLowerCase()))" :key="mat.id">
                    <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 flex gap-4 hover:-translate-y-0.5 hover:shadow-md transition-all cursor-pointer" @click="modalMaterial = mat; modalOpen = true">
                        <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-[#DC2626] to-[#B91C1C] flex items-center justify-center flex-shrink-0">
                            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-sm text-[#111827] dark:text-white mb-1 truncate" x-text="mat.title"></h3>
                            <p class="text-xs text-[#6B7280] line-clamp-1 mb-2" x-text="mat.desc"></p>
                            <div class="flex items-center gap-3 text-xs text-[#9CA3AF]">
                                <span x-text="mat.category"></span>
                                <span>•</span>
                                <span x-text="mat.views + ' views'"></span>
                                <span>•</span>
                                <span x-text="mat.downloads + ' unduhan'"></span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 flex-shrink-0">
                            <button class="py-2 px-4 bg-gradient-to-r from-[#DC2626] to-[#B91C1C] text-white text-xs font-semibold rounded-xl hover:scale-105 transition-all">Preview</button>
                            <button class="py-2 px-3 bg-[#F3F4F6] dark:bg-[#374151] text-[#374151] dark:text-white text-xs rounded-xl hover:scale-105 transition-all">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            </button>
                        </div>
                    </div>
                </template>
            </div>

            {{-- Empty state --}}
            <div x-show="materials.filter(m => !search || m.title.toLowerCase().includes(search.toLowerCase())).length === 0" class="text-center py-20">
                <div class="w-20 h-20 mx-auto mb-4 bg-[#FEF2F2] dark:bg-[#7F1D1D]/20 rounded-3xl flex items-center justify-center">
                    <svg class="w-10 h-10 text-[#FECACA]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="font-['Poppins'] font-bold text-xl text-[#111827] dark:text-white mb-2">Belum ada materi</p>
                <p class="text-[#6B7280] text-sm">Coba ubah filter atau kata kunci pencarian Anda</p>
            </div>
        </main>
    </div>

    {{-- ===== PREVIEW MODAL ===== --}}
    <div x-show="modalOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-end sm:items-center justify-center p-0 sm:p-4" @click.self="modalOpen = false">

        <div x-show="modalOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="translate-y-full sm:translate-y-0 sm:scale-95" x-transition:enter-end="translate-y-0 sm:scale-100"
            class="bg-white dark:bg-[#1F2937] w-full sm:max-w-2xl sm:rounded-3xl rounded-t-3xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

            {{-- Modal Header --}}
            <div class="flex items-center justify-between p-5 border-b border-[#E5E7EB] dark:border-[#374151]">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#DC2626] to-[#B91C1C] flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-['Poppins'] font-bold text-base text-[#111827] dark:text-white" x-text="modalMaterial?.title"></h3>
                        <p class="text-xs text-[#6B7280]" x-text="modalMaterial?.category"></p>
                    </div>
                </div>
                <button @click="modalOpen = false" class="w-9 h-9 rounded-xl bg-[#F3F4F6] dark:bg-[#374151] flex items-center justify-center hover:bg-[#E5E7EB] dark:hover:bg-[#4B5563] transition-colors">
                    <svg class="w-5 h-5 text-[#6B7280]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Modal Video Embed --}}
            <div class="aspect-video bg-[#000] relative overflow-hidden">
                <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-[#1a0404] to-[#0F0F0F]">
                    <div class="text-center">
                        <div class="w-20 h-20 rounded-full bg-[#DC2626]/20 border-2 border-[#DC2626]/40 flex items-center justify-center mx-auto mb-3 cursor-pointer hover:scale-110 transition-transform">
                            <svg class="w-10 h-10 text-[#DC2626]" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                        <p class="text-white/60 text-sm">Klik untuk memuat konten</p>
                    </div>
                </div>
            </div>

            {{-- Modal Content --}}
            <div class="p-5 overflow-y-auto flex-1">
                <p class="text-sm text-[#6B7280] dark:text-[#9CA3AF] leading-relaxed mb-5" x-text="modalMaterial?.desc"></p>

                <div class="flex items-center justify-between gap-3 text-sm text-[#9CA3AF] mb-5">
                    <span class="flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg><span x-text="(modalMaterial?.views || 0).toLocaleString() + ' views'"></span></span>
                    <span class="flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg><span x-text="(modalMaterial?.downloads || 0) + ' unduhan'"></span></span>
                </div>

                {{-- Action buttons --}}
                <div class="grid grid-cols-2 gap-3">
                    <button class="py-3 bg-gradient-to-r from-[#DC2626] to-[#B91C1C] text-white text-sm font-semibold rounded-xl hover:scale-[1.02] hover:shadow-lg transition-all flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Download
                    </button>
                    <button class="py-3 bg-[#F3F4F6] dark:bg-[#374151] text-[#374151] dark:text-white text-sm font-semibold rounded-xl hover:scale-[1.02] transition-all flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                        Bagikan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
