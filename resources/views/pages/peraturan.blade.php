@extends('layouts.app')

@section('content')
<script>
    window.articles = @json($articles);
</script>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6"
    x-data="{
        selectedArticle: null,
        search: '',
        sort: 'terbaru',
        articles: window.articles
    }"
>


    {{-- Top Filter Bar --}}
    <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            {{-- Search --}}
            <div class="relative flex-1">
                <svg class="absolute left-3.5 top-3 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input x-model="search" type="text" placeholder="Cari peraturan..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
            </div>
            {{-- Section dropdown --}}
            <select x-model="openSection" class="px-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 min-w-[160px]">
                <template x-for="section in sections" :key="section.id">
                    <option :value="section.id" x-text="section.name"></option>
                </template>
            </select>
            {{-- Sort --}}
            <select x-model="sort" class="px-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 min-w-[140px]">
                <option value="terbaru">Terbaru</option>
                <option value="terpopuler">Terpopuler</option>
                <option value="a-z">A-Z</option>
            </select>
        </div>
    </div>

    <div class="flex gap-6">
        {{-- Sidebar kiri: Daftar Artikel Peraturan --}}
        <aside class="hidden lg:block w-60 flex-shrink-0">
            <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 sticky top-24">
                <h3 class="font-['Poppins'] font-bold text-sm text-[#111827] dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#DC2626]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/></svg>
                    <span>Peraturan</span>
                </h3>
                <div class="space-y-1">
                    <template x-if="articles.length === 0">
                        <div class="text-xs text-[#9CA3AF] italic">Tidak ada artikel.</div>
                    </template>
                    <template x-for="article in articles" :key="article.id">
                        <button @click="selectedArticle = article"
                            class="block w-full text-left px-2 py-1 rounded hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]/20 text-xs"
                            :class="selectedArticle && selectedArticle.id === article.id ? 'bg-[#FEF2F2] dark:bg-[#7F1D1D]/20 text-[#DC2626]' : 'text-[#374151] dark:text-[#D1D5DB]'">
                            <span x-text="article.title"></span>
                        </button>
                    </template>
                </div>
            </div>
        </aside>

        {{-- Konten kanan: Daftar artikel peraturan --}}
        <main class="flex-1 min-w-0">
            <div class="flex flex-col sm:flex-row items-center justify-between mb-4 gap-2"></div>
            <template x-if="selectedArticle">
                <div>
                    <h2 class="font-semibold text-lg mb-3" x-text="selectedArticle.title"></h2>
                    <div x-html="selectedArticle.content"></div>
                </div>
            </template>
            <template x-if="!selectedArticle">
                <div class="text-center py-20 text-[#9CA3AF]">Pilih artikel dari menu kiri untuk melihat isi.</div>
            </template>
        </main>
    </div>
</div>
@endsection
