@extends('layouts.app')
@section('title', 'Edit Materi - Admin BahanAjar')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.dashboard') }}" class="w-10 h-10 rounded-xl bg-white dark:bg-[#1F2937] border border-[#E5E7EB] dark:border-[#374151] flex items-center justify-center hover:scale-105 transition-all shadow-sm">
            <svg class="w-5 h-5 text-[#374151] dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <div>
            <h1 class="font-['Poppins'] font-bold text-2xl text-[#111827] dark:text-white">Tambah / Edit Materi</h1>
            <p class="text-[#6B7280] text-sm mt-0.5">Isi form di bawah untuk menambah atau mengubah materi</p>
        </div>
    </div>

    <form class="space-y-6" x-data="{ type: 'video', uploading: false, saving: false }">

        <div class="grid md:grid-cols-2 gap-6">

            {{-- Title --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Judul Materi <span class="text-[#DC2626]">*</span></label>
                <input type="text" placeholder="Masukkan judul materi yang deskriptif..." required
                    class="w-full px-4 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-white dark:bg-[#111827] text-[#111827] dark:text-white text-sm placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
            </div>

            {{-- Category --}}
            <div>
                <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Kategori <span class="text-[#DC2626]">*</span></label>
                <select required class="w-full px-4 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-white dark:bg-[#111827] text-[#111827] dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
                    <option value="">Pilih kategori...</option>
                    <optgroup label="Pengadaan Barang">
                        <option>Tender Barang</option>
                        <option>Pengadaan Langsung</option>
                        <option>E-Purchasing</option>
                    </optgroup>
                    <optgroup label="Pengadaan Jasa">
                        <option>Jasa Konsultansi</option>
                        <option>Jasa Konstruksi</option>
                        <option>Jasa Lainnya</option>
                    </optgroup>
                    <optgroup label="Regulasi & Hukum">
                        <option>Perpres 16/2018</option>
                        <option>Perpres 12/2021</option>
                        <option>PMK Terkait</option>
                    </optgroup>
                    <optgroup label="Digital Procurement">
                        <option>LPSE</option>
                        <option>SiRUP</option>
                        <option>SPSE</option>
                    </optgroup>
                </select>
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Status</label>
                <select class="w-full px-4 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-white dark:bg-[#111827] text-[#111827] dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
                    <option value="dibuka">Dibuka (Publik)</option>
                    <option value="draft">Draft</option>
                    <option value="arsip">Diarsipkan</option>
                </select>
            </div>

            {{-- Type Radio --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-3">Tipe Konten <span class="text-[#DC2626]">*</span></label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @foreach([
                        ['value' => 'video', 'label' => 'Video', 'desc' => 'YouTube/Vimeo', 'icon' => 'M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['value' => 'text', 'label' => 'Teks', 'desc' => 'Artikel/HTML', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                        ['value' => 'drive', 'label' => 'Google Drive', 'desc' => 'Docs/Slides', 'icon' => 'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z'],
                        ['value' => 'file', 'label' => 'File', 'desc' => 'PDF/Doc/PPT', 'icon' => 'M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z'],
                    ] as $typeOpt)
                    <label class="relative cursor-pointer">
                        <input type="radio" name="type" value="{{ $typeOpt['value'] }}" x-model="type" class="sr-only">
                        <div class="p-4 rounded-2xl border-2 transition-all text-center hover:border-[#DC2626]/50"
                             :class="type === '{{ $typeOpt['value'] }}' ? 'border-[#DC2626] bg-[#FEF2F2] dark:bg-[#7F1D1D]/20' : 'border-[#E5E7EB] dark:border-[#374151] bg-white dark:bg-[#1F2937]'">
                            <svg class="w-7 h-7 mx-auto mb-2 transition-colors"
                                 :class="type === '{{ $typeOpt['value'] }}' ? 'text-[#DC2626]' : 'text-[#9CA3AF]'"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $typeOpt['icon'] }}"/></svg>
                            <div class="font-semibold text-sm" :class="type === '{{ $typeOpt['value'] }}' ? 'text-[#DC2626]' : 'text-[#111827] dark:text-white'">{{ $typeOpt['label'] }}</div>
                            <div class="text-[10px] text-[#9CA3AF]">{{ $typeOpt['desc'] }}</div>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Content URL / Video URL --}}
            <div class="md:col-span-2" x-show="type !== 'text'">
                <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">
                    <span x-show="type==='video'">URL Video (YouTube/Vimeo)</span>
                    <span x-show="type==='drive'">URL Google Drive</span>
                    <span x-show="type==='file'">URL atau Upload File</span>
                </label>
                <div class="flex gap-3">
                    <div class="relative flex-1">
                        <svg class="absolute left-3.5 top-3.5 w-4 h-4 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                        <input type="url" placeholder="https://..." class="w-full pl-10 pr-4 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-white dark:bg-[#111827] text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
                    </div>
                    <button type="button" x-show="type==='file'" class="px-4 py-3 bg-[#F3F4F6] dark:bg-[#374151] text-[#374151] dark:text-white text-sm font-semibold rounded-xl hover:scale-105 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        Upload
                    </button>
                </div>
            </div>

            {{-- Rich Text Editor (for text type) --}}
            <div class="md:col-span-2" x-show="type === 'text'">
                <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Konten Teks</label>
                <div class="border border-[#E5E7EB] dark:border-[#374151] rounded-xl overflow-hidden bg-white dark:bg-[#111827]">
                    {{-- Toolbar mock --}}
                    <div class="flex items-center gap-1 p-2.5 border-b border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#1F2937] flex-wrap">
                        @foreach(['B', 'I', 'U', '|', 'H1', 'H2', '|', '≡', '·≡', '|', '⊞', '🔗', '🖼'] as $tool)
                        @if($tool === '|')
                        <div class="w-px h-5 bg-[#E5E7EB] dark:bg-[#374151] mx-1"></div>
                        @else
                        <button type="button" class="w-8 h-8 rounded-lg text-xs font-bold text-[#6B7280] hover:bg-white dark:hover:bg-[#374151] hover:text-[#111827] dark:hover:text-white transition-all">{{ $tool }}</button>
                        @endif
                        @endforeach
                    </div>
                    <textarea rows="8" placeholder="Tulis konten materi di sini..." class="w-full px-4 py-3 bg-transparent text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none resize-none"></textarea>
                </div>
            </div>

            {{-- Thumbnail Upload --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Thumbnail</label>
                <div class="border-2 border-dashed border-[#E5E7EB] dark:border-[#374151] rounded-2xl p-8 text-center hover:border-[#DC2626]/50 transition-all cursor-pointer group bg-white dark:bg-[#111827]"
                     x-data="{ dragging: false }" @dragover.prevent="dragging=true" @dragleave="dragging=false" @drop.prevent="dragging=false"
                     :class="dragging ? 'border-[#DC2626] bg-[#FEF2F2] dark:bg-[#7F1D1D]/10' : ''">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-2xl bg-[#F3F4F6] dark:bg-[#374151] flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <p class="text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-1">Drag & drop atau klik untuk upload</p>
                    <p class="text-xs text-[#9CA3AF]">PNG, JPG, WebP — Maks 2MB — Rekomendasi 1280×720px</p>
                    <input type="file" accept="image/*" class="hidden">
                </div>
            </div>

            {{-- Description --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Deskripsi Singkat</label>
                <textarea rows="3" placeholder="Ringkasan singkat tentang materi ini (maks. 200 karakter)..." maxlength="200"
                    class="w-full px-4 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-white dark:bg-[#111827] text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all resize-none"></textarea>
            </div>
        </div>

        {{-- Submit buttons --}}
        <div class="flex flex-col sm:flex-row gap-3 pt-2">
            <button type="submit"
                :disabled="saving"
                @click.prevent="saving=true; setTimeout(()=>saving=false,2000)"
                class="flex-1 sm:flex-none sm:min-w-[160px] py-3.5 bg-gradient-to-r from-[#DC2626] to-[#B91C1C] text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all flex items-center justify-center gap-2 disabled:opacity-70">
                <span x-show="!saving">
                    <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Materi
                </span>
                <span x-show="saving" class="flex items-center gap-2">
                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                    Menyimpan...
                </span>
            </button>
            <button type="button" class="flex-1 sm:flex-none sm:min-w-[120px] py-3.5 bg-[#F3F4F6] dark:bg-[#374151] text-[#374151] dark:text-white font-semibold rounded-xl hover:scale-[1.02] transition-all">
                Simpan Draft
            </button>
            <button type="button" class="py-3.5 px-5 border border-[#E5E7EB] dark:border-[#374151] text-[#6B7280] font-semibold rounded-xl hover:bg-[#F9FAFB] dark:hover:bg-[#374151] transition-all">
                Batalkan
            </button>
        </div>
    </form>
</div>
@endsection
