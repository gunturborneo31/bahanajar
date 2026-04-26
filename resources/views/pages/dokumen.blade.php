@extends('layouts.app')
@section('title', 'Dokumen Pengadaan - BahanAjar Pengadaan Barang')

@section('content')
<script>
	window.dokumens = @json($dokumens);
</script>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6"
	x-data="{
		selectedDokumen: null,
		search: '',
		dokumens: window.dokumens,
		kategori: '',
		kategoriList: (() => {
			const kategoriMap = {};
			window.dokumens.filter(d => d.kategori).forEach(d => {
				if (!kategoriMap[d.kategori]) kategoriMap[d.kategori] = 0;
				kategoriMap[d.kategori]++;
			});
			return Object.entries(kategoriMap).map(([k, count]) => ({ nama: k, count }));
		})(),
		get filteredDokumens() {
			return this.dokumens.filter(d =>
				(!this.search || d.judul.toLowerCase().includes(this.search.toLowerCase())) &&
				(!this.kategori || d.kategori === this.kategori)
			);
		},
		viewMode: 'grid',
	}"
>
	{{-- Top Filter Bar --}}
	<div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 mb-6">
		<div class="flex flex-col sm:flex-row gap-3 items-center">
			<div class="relative flex-1">
				<svg class="absolute left-3.5 top-3 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
				<input x-model="search" type="text" placeholder="Cari dokumen pengadaan..."
					class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
			</div>
			<select x-model="kategori" class="px-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 min-w-[140px]">
				<option value="">Semua Kategori</option>
				<template x-for="k in kategoriList" :key="k.nama">
					<option :value="k.nama" x-text="k.nama"></option>
				</template>
			</select>
			<div class="flex gap-1 ml-auto">
				<button @click="viewMode = 'grid'" :class="viewMode==='grid' ? 'bg-[#DC2626] text-white' : 'bg-[#F3F4F6] text-[#374151]'" class="p-2 rounded-lg transition-all" title="Tampilan Grid">
					<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><rect x="4" y="4" width="7" height="7" rx="2" fill="currentColor"/><rect x="13" y="4" width="7" height="7" rx="2" fill="currentColor"/><rect x="4" y="13" width="7" height="7" rx="2" fill="currentColor"/><rect x="13" y="13" width="7" height="7" rx="2" fill="currentColor"/></svg>
				</button>
				<button @click="viewMode = 'list'" :class="viewMode==='list' ? 'bg-[#DC2626] text-white' : 'bg-[#F3F4F6] text-[#374151]'" class="p-2 rounded-lg transition-all" title="Tampilan List">
					<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><rect x="4" y="6" width="16" height="2" rx="1" fill="currentColor"/><rect x="4" y="11" width="16" height="2" rx="1" fill="currentColor"/><rect x="4" y="16" width="16" height="2" rx="1" fill="currentColor"/></svg>
				</button>
			</div>
		</div>
	</div>

	<div class="flex gap-6">
		<aside class="hidden lg:block w-60 flex-shrink-0">
			<div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 sticky top-24">
				<h3 class="font-['Poppins'] font-bold text-sm text-[#111827] dark:text-white mb-4 flex items-center gap-2">
					<svg class="w-4 h-4 text-[#DC2626]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/></svg>
					<span>Dokumen Pengadaan</span>
				</h3>
				<ul class="space-y-1">
					<template x-for="cat in kategoriList" :key="cat.nama">
						<li>
							<button @click="kategori = cat.nama"
								class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium transition-all duration-150 hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]/20 hover:text-[#DC2626] focus:outline-none"
								:class="kategori === cat.nama ? 'bg-[#FEF2F2] dark:bg-[#7F1D1D]/20 text-[#DC2626]' : 'text-[#374151] dark:text-[#D1D5DB] bg-transparent'">
								<span x-text="cat.nama"></span>
								<span class="text-xs bg-[#F3F4F6] dark:bg-[#374151] text-[#6B7280] px-2 py-0.5 rounded-full" x-text="cat.count"></span>
							</button>
						</li>
					</template>
				</ul>
			</div>
		</aside>

		<main class="flex-1 min-w-0">
			<nav class="flex text-sm text-[#6B7280] mb-4" aria-label="Breadcrumb">
				<ol class="inline-flex items-center space-x-1 md:space-x-2">
					<li class="inline-flex items-center">
						<a href="/" class="text-[#DC2626] hover:underline">Home</a>
					</li>
					<li>
						<span class="mx-2">/</span>
						<a href="/dokumen" class="text-[#DC2626] hover:underline">Dokumen Pengadaan</a>
					</li>
					<template x-if="kategori">
						<li>
							<span class="mx-2">/</span>
							<button @click="selectedDokumen = null" class="text-[#DC2626] hover:underline focus:outline-none" x-text="kategori"></button>
						</li>
					</template>
					<template x-if="selectedDokumen">
						<li>
							<span class="mx-2">/</span>
							<span class="font-semibold text-[#111827] dark:text-white" x-text="selectedDokumen.judul.replace(/\s*tentang.*$/i, '').trim()"></span>
						</li>
					</template>
				</ol>
			</nav>

			<template x-if="selectedDokumen">
				<div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-md p-8 border border-[#E5E7EB] dark:border-[#374151] transition-all relative mb-16">
					<button @click="selectedDokumen = null" class="absolute left-6 top-6 flex items-center gap-1 text-[#DC2626] hover:underline text-sm font-semibold">
						<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
						Kembali
					</button>
					<h3 class="font-bold text-2xl mb-4 mt-8 text-[#111827] dark:text-white leading-tight" x-text="selectedDokumen.judul"></h3>
					<div class="prose prose-sm sm:prose lg:prose-lg dark:prose-invert max-w-none text-[#374151] dark:text-[#D1D5DB] overflow-x-auto" x-html="selectedDokumen.isi"></div>
				</div>
			</template>

			<template x-if="!selectedDokumen">
				<div>
					<div class="mb-4">
						<h2 class="text-lg font-bold text-[#111827] dark:text-white">Daftar Dokumen Pengadaan</h2>
					</div>
					<template x-if="filteredDokumens.length > 0">
						<div>
							<template x-if="viewMode==='grid'">
								<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
									<template x-for="dokumen in filteredDokumens" :key="dokumen.id">
										<div>
											<button @click="selectedDokumen = dokumen"
												class="w-full text-left px-4 py-3 rounded-xl shadow-sm mb-2 bg-white dark:bg-[#1F2937] hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]/20 text-sm font-semibold border border-[#E5E7EB] dark:border-[#374151] transition-all duration-150"
												:class="'text-[#374151] dark:text-[#D1D5DB]'">
												<span x-text="dokumen.judul"></span>
											</button>
										</div>
									</template>
								</div>
							</template>
							<template x-if="viewMode==='list'">
								<ul class="divide-y divide-[#E5E7EB] dark:divide-[#374151]">
									<template x-for="dokumen in filteredDokumens" :key="dokumen.id">
										<li>
											<button @click="selectedDokumen = dokumen"
												class="w-full text-left px-4 py-3 bg-transparent hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]/20 text-sm font-semibold transition-all duration-150"
												:class="'text-[#374151] dark:text-[#D1D5DB]'">
												<span x-text="dokumen.judul"></span>
											</button>
										</li>
									</template>
								</ul>
							</template>
						</div>
					</template>
					<template x-if="filteredDokumens.length === 0">
						<div class="text-center py-20 text-[#9CA3AF]">Tidak ada dokumen ditemukan.</div>
					</template>
				</div>
			</template>
		</main>
	</div>
</div>
@endsection
	{{-- Top Filter Bar --}}
	<div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 mb-6">
		<div class="flex flex-col sm:flex-row gap-3 items-center">
			{{-- Search --}}
			<div class="relative flex-1">
				<svg class="absolute left-3.5 top-3 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
				<input x-model="search" type="text" placeholder="Cari dokumen pengadaan..."
					class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
			</div>
			{{-- Kategori dropdown --}}
			<select x-model="kategori" class="px-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 min-w-[140px]">
				<option value="">Semua Kategori</option>
				<template x-for="k in kategoriList" :key="k.nama">
					<option :value="k.nama" x-text="k.nama"></option>
				</template>
			</select>
			{{-- Grid/List Toggle --}}
			<div class="flex gap-1 ml-auto">
				<button @click="viewMode = 'grid'" :class="viewMode==='grid' ? 'bg-[#DC2626] text-white' : 'bg-[#F3F4F6] text-[#374151]'" class="p-2 rounded-lg transition-all" title="Tampilan Grid">
					<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><rect x="4" y="4" width="7" height="7" rx="2" fill="currentColor"/><rect x="13" y="4" width="7" height="7" rx="2" fill="currentColor"/><rect x="4" y="13" width="7" height="7" rx="2" fill="currentColor"/><rect x="13" y="13" width="7" height="7" rx="2" fill="currentColor"/></svg>
				</button>
				<button @click="viewMode = 'list'" :class="viewMode==='list' ? 'bg-[#DC2626] text-white' : 'bg-[#F3F4F6] text-[#374151]'" class="p-2 rounded-lg transition-all" title="Tampilan List">
					<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><rect x="4" y="6" width="16" height="2" rx="1" fill="currentColor"/><rect x="4" y="11" width="16" height="2" rx="1" fill="currentColor"/><rect x="4" y="16" width="16" height="2" rx="1" fill="currentColor"/></svg>
				</button>
			</div>
		</div>
	</div>

	<div class="flex gap-6">
		{{-- Sidebar kiri: Daftar Kategori --}}
		<aside class="hidden lg:block w-60 flex-shrink-0">
			<div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 sticky top-24">
				<h3 class="font-['Poppins'] font-bold text-sm text-[#111827] dark:text-white mb-4 flex items-center gap-2">
					<svg class="w-4 h-4 text-[#DC2626]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/></svg>
					<span>Dokumen Pengadaan</span>
				</h3>
				<ul class="space-y-1">
					<template x-for="cat in kategoriList" :key="cat.nama">
						<li>
							<button @click="kategori = cat.nama"
								class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium transition-all duration-150 hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]/20 hover:text-[#DC2626] focus:outline-none"
								:class="kategori === cat.nama ? 'bg-[#FEF2F2] dark:bg-[#7F1D1D]/20 text-[#DC2626]' : 'text-[#374151] dark:text-[#D1D5DB] bg-transparent'">
								<span x-text="cat.nama"></span>
								<span class="text-xs bg-[#F3F4F6] dark:bg-[#374151] text-[#6B7280] px-2 py-0.5 rounded-full" x-text="cat.count"></span>
							</button>
						</li>
					</template>
				</ul>
			</div>
		</aside>

		{{-- Konten kanan: Daftar dokumen pengadaan --}}
		<main class="flex-1 min-w-0" x-data="{ viewMode: 'grid' }">
			<!-- Breadcrumbs -->
			<nav class="flex text-sm text-[#6B7280] mb-4" aria-label="Breadcrumb">
				<ol class="inline-flex items-center space-x-1 md:space-x-2">
					<li class="inline-flex items-center">
						<a href="/" class="text-[#DC2626] hover:underline">Home</a>
					</li>
					<li>
						<span class="mx-2">/</span>
						<a href="/dokumen" class="text-[#DC2626] hover:underline">Dokumen Pengadaan</a>
					</li>
					<template x-if="kategori">
						<li>
							<span class="mx-2">/</span>
							<button @click="selectedDokumen = null" class="text-[#DC2626] hover:underline focus:outline-none" x-text="kategori"></button>
						</li>
					</template>
					<template x-if="selectedDokumen">
						<li>
							<span class="mx-2">/</span>
							<span class="font-semibold text-[#111827] dark:text-white" x-text="selectedDokumen.judul.replace(/\s*tentang.*$/i, '').trim()"></span>
						</li>
					</template>
				</ol>
			</nav>

			<!-- Fullscreen Dokumen View -->
			<template x-if="selectedDokumen">
				<div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-md p-8 border border-[#E5E7EB] dark:border-[#374151] transition-all relative mb-16">
					<button @click="selectedDokumen = null" class="absolute left-6 top-6 flex items-center gap-1 text-[#DC2626] hover:underline text-sm font-semibold">
						<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
						Kembali
					</button>
					<h3 class="font-bold text-2xl mb-4 mt-8 text-[#111827] dark:text-white leading-tight" x-text="selectedDokumen.judul"></h3>
					<div class="prose prose-sm sm:prose lg:prose-lg dark:prose-invert max-w-none text-[#374151] dark:text-[#D1D5DB] overflow-x-auto" x-html="selectedDokumen.isi"></div>
				</div>
			</template>

			<!-- Dokumen List (hide if fullscreen) -->
			<template x-if="!selectedDokumen">
				<div>
					<div class="mb-4">
						<h2 class="text-lg font-bold text-[#111827] dark:text-white">Daftar Dokumen Pengadaan</h2>
					</div>
					<template x-if="filteredDokumens.length > 0">
						<div>
							<template x-if="viewMode==='grid'">
								<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
									<template x-for="dokumen in filteredDokumens" :key="dokumen.id">
										<div>
											<button @click="selectedDokumen = dokumen"
												class="w-full text-left px-4 py-3 rounded-xl shadow-sm mb-2 bg-white dark:bg-[#1F2937] hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]/20 text-sm font-semibold border border-[#E5E7EB] dark:border-[#374151] transition-all duration-150"
												:class="'text-[#374151] dark:text-[#D1D5DB]'">
												<span x-text="dokumen.judul"></span>
											</button>
										</div>
									</template>
								</div>
							</template>
							<template x-if="viewMode==='list'">
								<ul class="divide-y divide-[#E5E7EB] dark:divide-[#374151]">
									<template x-for="dokumen in filteredDokumens" :key="dokumen.id">
										<li>
											<button @click="selectedDokumen = dokumen"
												class="w-full text-left px-4 py-3 bg-transparent hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]/20 text-sm font-semibold transition-all duration-150"
												:class="'text-[#374151] dark:text-[#D1D5DB]'">
												<span x-text="dokumen.judul"></span>
											</button>
										</li>
									</template>
								</ul>
							</template>
						</div>
					</template>
					<template x-if="filteredDokumens.length === 0">
						<div class="text-center py-20 text-[#9CA3AF]">Tidak ada dokumen ditemukan.</div>
					</template>
				</div>
			</template>
		</main>
	</div>
</div>

	{{-- Top Filter Bar --}}
	<div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 mb-6">
		<div class="flex flex-col sm:flex-row gap-3">
			<div class="relative flex-1">
				<svg class="absolute left-3.5 top-3 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
				<input x-model="search" type="text" placeholder="Cari dokumen pengadaan..."
					class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
			</div>
			<select class="px-4 py-2.5 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 min-w-[160px]">
				<option>Semua Kategori</option>
				<option>Dokumen Umum</option>
				<option>Kontrak</option>
				<option>Evaluasi</option>
			</select>
		</div>
	</div>

	<div class="flex gap-6">
		{{-- Sidebar --}}
		<aside class="hidden lg:block w-60 flex-shrink-0">
			<div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] p-4 sticky top-24">
				<h3 class="font-['Poppins'] font-bold text-sm text-[#111827] dark:text-white mb-4 flex items-center gap-2">
					<svg class="w-4 h-4 text-[#DC2626]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/></svg>
					Kategori
				</h3>
				@php $categories = [
					['key'=>'dokumenumum','label'=>'Dokumen Umum','count'=>4,'children'=>[]],
					['key'=>'kontrak','label'=>'Kontrak','count'=>4,'children'=>[]],
					['key'=>'evaluasi','label'=>'Evaluasi','count'=>4,'children'=>[]],
				]; @endphp
				<div class="space-y-1" x-data="{ openCat: 'dokumenumum' }">
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
					</div>
					@endforeach
				</div>
			</div>
		</aside>
		{{-- Main Content --}}
		<main class="flex-1 min-w-0">
			<div class="flex items-center justify-between mb-4">
				<p class="text-sm text-[#6B7280]"><span class="font-semibold text-[#111827] dark:text-white">12</span> dokumen ditemukan</p>
			</div>
			<div x-show="viewMode === 'grid'" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
				<template x-for="mat in materials.filter(m => !search || m.title.toLowerCase().includes(search.toLowerCase()))" :key="mat.id">
					<div class="group bg-white dark:bg-[#1F2937] rounded-2xl shadow-sm border border-[#E5E7EB] dark:border-[#374151] overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all duration-300 cursor-pointer"
						 @click="modalMaterial = mat; modalOpen = true">
						<div class="h-40 bg-gradient-to-br from-[#FEF2F2] to-[#FECACA] dark:from-[#7F1D1D]/30 dark:to-[#991B1B]/20 relative overflow-hidden flex items-center justify-center">
							<div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#DC2626] to-[#B91C1C] flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
								<svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path x-show="mat.type==='file'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
								</svg>
							</div>
							<div class="absolute top-3 left-3 flex gap-1.5 flex-wrap">
								<template x-for="badge in mat.badges">
									<span class="px-2 py-0.5 text-[10px] font-bold rounded-full uppercase"
										:class="{
											'bg-orange-500 text-white': badge==='pdf',
											'bg-yellow-500 text-white': badge==='populer',
											'bg-purple-500 text-white': badge==='baru',
											'bg-gray-700 text-white': badge==='terlengkap',
										}"
										x-text="badge">
									</span>
								</template>
							</div>
						</div>
						<div class="p-4">
							<p class="text-[10px] font-semibold text-[#DC2626] uppercase tracking-widest mb-1.5" x-text="mat.category"></p>
							<h3 class="font-['Poppins'] font-bold text-sm text-[#111827] dark:text-white leading-snug mb-2 line-clamp-2" x-text="mat.title"></h3>
							<p class="text-xs text-[#6B7280] dark:text-[#9CA3AF] leading-relaxed mb-4 line-clamp-2" x-text="mat.desc"></p>
							<div class="flex items-center gap-3 text-xs text-[#9CA3AF] mb-4">
								<span class="flex items-center gap-1">
									<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
									<span x-text="mat.views.toLocaleString()"></span>
								</span>
								<span class="flex items-center gap-1">
									<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
									<span x-text="mat.downloads"></span>
								</span>

							<script>
							    window.dokumens = @json($dokumens);
							</script>
							<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6"
							    x-data="{
							        selectedDokumen: null,
							        search: '',
							        dokumens: window.dokumens,
							        kategori: '',
							        kategoriList: (() => {
							            const kategoriMap = {};
							            window.dokumens.filter(d => d.kategori).forEach(d => {
							                if (!kategoriMap[d.kategori]) kategoriMap[d.kategori] = 0;
							                kategoriMap[d.kategori]++;
							            });
							            return Object.entries(kategoriMap).map(([k, count]) => ({ nama: k, count }));
							        })(),
							        get filteredDokumens() {
							            return this.dokumens.filter(d =>
							                (!this.search || d.judul.toLowerCase().includes(this.search.toLowerCase())) &&
							                (!this.kategori || d.kategori === this.kategori)
							            );
							        },
							        viewMode: 'grid',
							    }"
							>
