@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6"
    x-data="panduanData()"
>

    {{-- Top Filter Bar --}}
    <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-3 items-center">
            {{-- Search --}}
            <div class="relative flex-1">
                <svg class="absolute left-3.5 top-3 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input x-model="search" type="text" placeholder="Cari panduan..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
            </div>
            {{-- Kategori dropdown --}}
            <select x-model="selectedKategori" class="px-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 min-w-[140px]">
                <option value="">Semua Kategori</option>
                <template x-for="k in Object.keys(hierarchy)" :key="k">
                    <option :value="k" x-text="k"></option>
                </template>
            </select>
            {{-- Grid/List Toggle --}}
            <div class="flex gap-1 ml-auto">
                <button @click="viewMode = 'grid'" :class="viewMode==='grid' ? 'bg-[#DC2626] text-white ring-2 ring-[#DC2626] shadow-md' : 'bg-[#F3F4F6] text-[#374151]'" class="p-2 rounded-lg transition-all" title="Tampilan Grid">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><rect x="4" y="4" width="7" height="7" rx="2" fill="currentColor"/><rect x="13" y="4" width="7" height="7" rx="2" fill="currentColor"/><rect x="4" y="13" width="7" height="7" rx="2" fill="currentColor"/><rect x="13" y="13" width="7" height="7" rx="2" fill="currentColor"/></svg>
                </button>
                <button @click="viewMode = 'list'" :class="viewMode==='list' ? 'bg-[#DC2626] text-white ring-2 ring-[#DC2626] shadow-md' : 'bg-[#F3F4F6] text-[#374151]'" class="p-2 rounded-lg transition-all" title="Tampilan List">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><rect x="4" y="6" width="16" height="2" rx="1" fill="currentColor"/><rect x="4" y="11" width="16" height="2" rx="1" fill="currentColor"/><rect x="4" y="16" width="16" height="2" rx="1" fill="currentColor"/></svg>
                </button>
            </div>
        </div>
    </div>

    <div class="flex gap-6">
        {{-- Sidebar kiri: Daftar Kategori & Sub Kategori --}}
        <aside class="hidden lg:block w-60 flex-shrink-0">
            <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 sticky top-24">
                <h3 class="font-['Poppins'] font-bold text-sm text-[#111827] dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#DC2626]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/></svg>
                    <span>Panduan</span>
                </h3>
                <ul class="space-y-1">
                    <template x-for="kategori in Object.keys(hierarchy)" :key="kategori">
                        <li>
                            <button @click="selectedKategori = kategori; selectedSubkategori = ''; selectedArticle = null"
                                class="w-full flex  items-start px-3 py-2 rounded-xl text-xs font-medium transition-all duration-150 hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]/20 hover:text-[#DC2626] focus:outline-none"
                                :class="selectedKategori === kategori ? 'bg-[#FEF2F2] dark:bg-[#7F1D1D]/20 text-[#DC2626]' : 'text-[#374151] dark:text-[#D1D5DB] bg-transparent'">
                                <span x-text="kategori" class="block text-left w-full"></span>
                                <span class="block text-xs bg-[#F3F4F6] dark:bg-[#374151] text-[#6B7280] px-2 py-0.5 rounded-full  mt-0.5 w-fit text-left" x-text="Object.values(hierarchy[kategori] || {}).reduce((sum, arr) => sum + arr.length, 0) "></span>
                            </button>
                            <template x-if="selectedKategori === kategori">
                                <ul class="ml-2 mt-1 space-y-1">
                                    <template x-for="sub in Object.keys(hierarchy[kategori] || {})" :key="sub">
                                        <li class="flex items-start">-
                                            <button @click="selectedSubkategori = sub; selectedArticle = null"
                                                class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-xs font-normal transition-all duration-150 hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]/10 hover:text-[#DC2626] focus:outline-none"
                                                :class="selectedSubkategori === sub ? 'bg-[#FEF2F2] dark:bg-[#7F1D1D]/10 text-[#DC2626]' : 'text-[#374151] dark:text-[#D1D5DB] bg-transparent'">
                                                <span x-text="sub" class="block text-left w-full"></span>
                                                <span class="text-xs bg-[#F3F4F6] dark:bg-[#374151] text-[#6B7280] px-2 py-0.5 rounded-full" x-text="hierarchy[selectedKategori][sub].length"></span>
                                            </button>
                                        </li>
                                    </template>
                                </ul>
                            </template>
                        </li>
                    </template>
                </ul>
            </div>
        </aside>

        {{-- Konten kanan: Daftar artikel panduan --}}
        <main class="flex-1 min-w-0">
            <!-- Breadcrumbs -->
            <nav class="flex text-sm text-[#6B7280] mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    
                    <template x-if="selectedSubkategori">
                        <li>
                            <button @click="selectedArticle = null" class="text-[#DC2626] hover:underline focus:outline-none" x-text="selectedSubkategori"></button>
                        </li>
                    </template>
                    <template x-if="selectedArticle">
                        <li>
                            <span class="mx-2">/</span>
                            <span class="font-semibold text-[#111827] dark:text-white" x-text="selectedArticle.title.replace(/\s*tentang.*$/i, '').trim()"></span>
                        </li>
                    </template>
                </ol>
            </nav>

            <!-- Fullscreen Article View -->
            <template x-if="selectedArticle">
                <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-md p-8 border border-[#E5E7EB] dark:border-[#374151] transition-all relative mb-16">
                    <button @click="selectedArticle = null" class="absolute left-6 top-6 flex items-center gap-1 text-[#DC2626] hover:underline text-sm font-semibold">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        Kembali
                    </button>
                    <h3 class="font-bold text-2xl mb-4 mt-8 text-[#111827] dark:text-white leading-tight" x-text="selectedArticle.title"></h3>
                    <div class="prose prose-sm sm:prose lg:prose-lg dark:prose-invert max-w-none text-[#374151] dark:text-[#D1D5DB] overflow-x-auto" x-html="selectedArticle.content"></div>
                </div>
            </template>

            <!-- Article List (hide if fullscreen) -->
            <template x-if="!selectedArticle">
                <div>
                    <div class="mb-4">
                        <h2 class="text-lg font-bold text-[#111827] dark:text-white">Daftar Panduan</h2>
                    </div>
                    <template x-if="selectedKategori && selectedSubkategori && (hierarchy[selectedKategori][selectedSubkategori]?.length > 0)">
                        <div>
                            <template x-if="viewMode==='grid'">
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                    <template x-for="article in hierarchy[selectedKategori][selectedSubkategori]" :key="article.id">
                                        <div>
                                            <button @click="selectedArticle = article"
                                                class="w-full flex items-start text-left px-4 py-3 rounded-xl shadow-sm mb-2 bg-white dark:bg-[#1F2937] hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]/20 text-sm font-semibold border border-[#E5E7EB] dark:border-[#374151] transition-all duration-150"
                                                :class="'text-[#374151] dark:text-[#D1D5DB]'">
                                                <span x-text="article.title" class="block text-left w-full"></span>
                                            </button>
                                        </div>
                                    </template>
                                </div>
                            </template>
                            <template x-if="viewMode==='list'">
                                <ul>
                                    <template x-for="article in hierarchy[selectedKategori][selectedSubkategori]" :key="article.id">
                                        <li class="bg-white dark:bg-[#1F2937] rounded-xl shadow-sm mb-4 p-0 transition-all">
                                            <button @click="selectedArticle = article"
                                                class="w-full flex items-start text-left px-4 py-3 bg-transparent hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]/20 text-sm font-semibold rounded-xl transition-all duration-150"
                                                :class="'text-[#374151] dark:text-[#D1D5DB]'">
                                                <span x-text="article.title" class="block text-left w-full"></span>
                                            </button>
                                        </li>
                                    </template>
                                </ul>
                            </template>
                        </div>
                    </template>
                    <template x-if="!selectedKategori || !selectedSubkategori || (hierarchy[selectedKategori]?.[selectedSubkategori]?.length === 0)">
                        <div class="text-center py-20 text-[#9CA3AF]">Tidak ada panduan ditemukan.</div>
                    </template>
                </div>
            </template>
        </main>
    </div>
</div>
@push('scripts')
<script>
    window.panduanData = function() {
        return {
            selectedArticle: null,
            selectedKategori: '',
            selectedSubkategori: '',
            search: '',
            viewMode: 'grid',
            hierarchy: @json($hierarchy)
        };
    }
</script>
@endpush
@endsection



