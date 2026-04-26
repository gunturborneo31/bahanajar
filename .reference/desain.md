<!DOCTYPE html>

<html class="light" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "error-container": "#ffdad6",
                    "secondary": "#565e74",
                    "surface-container-highest": "#d3e4fe",
                    "surface-container-low": "#eff4ff",
                    "outline": "#906f70",
                    "on-surface": "#0b1c30",
                    "on-background": "#0b1c30",
                    "primary-fixed": "#ffdada",
                    "surface-tint": "#be0037",
                    "surface-variant": "#d3e4fe",
                    "on-secondary-fixed": "#131b2e",
                    "background": "#f8f9ff",
                    "error": "#ba1a1a",
                    "secondary-fixed-dim": "#bec6e0",
                    "on-primary-fixed-variant": "#920028",
                    "tertiary-container": "#717476",
                    "on-primary-container": "#fffaf9",
                    "on-secondary-container": "#5c647a",
                    "tertiary": "#585c5d",
                    "surface-container-high": "#dce9ff",
                    "on-primary-fixed": "#40000c",
                    "on-tertiary-container": "#f9fbfd",
                    "inverse-on-surface": "#eaf1ff",
                    "surface-container": "#e5eeff",
                    "primary-fixed-dim": "#ffb3b6",
                    "primary-container": "#e11d48",
                    "on-error-container": "#93000a",
                    "on-tertiary-fixed": "#191c1e",
                    "surface-dim": "#cbdbf5",
                    "on-tertiary-fixed-variant": "#444749",
                    "secondary-container": "#dae2fd",
                    "surface": "#f8f9ff",
                    "on-tertiary": "#ffffff",
                    "on-secondary": "#ffffff",
                    "surface-container-lowest": "#ffffff",
                    "outline-variant": "#e5bdbe",
                    "primary": "#b80035",
                    "inverse-primary": "#ffb3b6",
                    "on-primary": "#ffffff",
                    "surface-bright": "#f8f9ff",
                    "on-secondary-fixed-variant": "#3f465c",
                    "on-surface-variant": "#5c3f40",
                    "tertiary-fixed": "#e0e3e5",
                    "on-error": "#ffffff",
                    "secondary-fixed": "#dae2fd",
                    "tertiary-fixed-dim": "#c4c7c9",
                    "inverse-surface": "#213145"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "xs": "4px",
                    "margin": "32px",
                    "gutter": "24px",
                    "lg": "40px",
                    "xl": "64px",
                    "sm": "12px",
                    "base": "8px",
                    "md": "24px"
            },
            "fontFamily": {
                    "h1": ["Manrope"],
                    "h2": ["Manrope"],
                    "h3": ["Manrope"],
                    "label-bold": ["Manrope"],
                    "body-md": ["Manrope"],
                    "body-sm": ["Manrope"],
                    "body-lg": ["Manrope"],
                    "caption": ["Manrope"]
            },
            "fontSize": {
                    "h1": ["40px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                    "h2": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                    "h3": ["24px", {"lineHeight": "1.3", "fontWeight": "700"}],
                    "label-bold": ["14px", {"lineHeight": "1.2", "letterSpacing": "0.01em", "fontWeight": "600"}],
                    "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                    "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "caption": ["12px", {"lineHeight": "1.2", "fontWeight": "500"}]
            }
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-background text-on-surface">
<!-- TopAppBar -->
<header class="bg-white/80 dark:bg-slate-950/80 backdrop-blur-md sticky top-0 z-40 border-b border-slate-200 dark:border-slate-800 shadow-sm">
<div class="flex justify-between items-center w-full px-6 py-3">
<div class="flex items-center gap-8">
<span class="text-xl font-black tracking-tighter text-rose-600 dark:text-rose-500 font-manrope antialiased">ProcureSmart</span>
<nav class="hidden md:flex gap-6">
<a class="text-rose-600 dark:text-rose-500 font-bold border-b-2 border-rose-600 font-manrope antialiased transition-all" href="#">Dashboard</a>
<a class="text-slate-600 dark:text-slate-400 font-medium hover:text-rose-700 dark:hover:text-rose-400 transition-all font-manrope antialiased" href="#">Monitoring</a>
<a class="text-slate-600 dark:text-slate-400 font-medium hover:text-rose-700 dark:hover:text-rose-400 transition-all font-manrope antialiased" href="#">Report</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="hidden md:flex items-center bg-surface-container rounded-full px-4 py-2 border border-outline-variant">
<span class="material-symbols-outlined text-secondary mr-2" style="font-size: 20px;">search</span>
<input class="bg-transparent border-none focus:ring-0 text-body-sm w-48" placeholder="Cari dokumen..." type="text"/>
</div>
<button class="active:scale-95 transition-transform text-slate-600 dark:text-slate-400 hover:text-rose-700 transition-all">
<span class="material-symbols-outlined">notifications</span>
</button>
<button class="active:scale-95 transition-transform text-slate-600 dark:text-slate-400 hover:text-rose-700 transition-all">
<span class="material-symbols-outlined">history</span>
</button>
<button class="active:scale-95 transition-transform text-slate-600 dark:text-slate-400 hover:text-rose-700 transition-all">
<span class="material-symbols-outlined">account_circle</span>
</button>
</div>
</div>
</header>
<main class="max-w-[1280px] mx-auto px-6 py-xl pb-32">
<!-- Hero Section / Welcome -->
<section class="mb-xl grid grid-cols-1 md:grid-cols-12 gap-gutter items-center">
<div class="md:col-span-7">
<span class="bg-primary-fixed text-on-primary-fixed text-caption px-3 py-1 rounded-full font-label-bold mb-4 inline-block">Sistem Pengadaan Cerdas v4.0</span>
<h1 class="font-h1 text-h1 text-on-background mb-6">Efisiensi Pengadaan dalam Satu <span class="text-primary">Eksosistem</span>.</h1>
<p class="font-body-lg text-body-lg text-secondary mb-8 max-w-xl">Optimalkan setiap tahap pengadaan barang dan jasa dengan integrasi data real-time, transparansi penuh, dan regulasi yang terupdate secara otomatis.</p>
<div class="flex gap-4">
<button class="bg-primary text-on-primary px-8 py-3 rounded-lg font-label-bold shadow-lg shadow-primary/20 hover:bg-surface-tint active:scale-95 transition-all">
                        Mulai Pengadaan
                    </button>
<button class="border border-outline text-on-surface px-8 py-3 rounded-lg font-label-bold hover:bg-surface-container transition-all">
                        Pelajari Fitur
                    </button>
</div>
</div>
<div class="md:col-span-5 relative">
<div class="aspect-square rounded-[2rem] overflow-hidden shadow-2xl">
<img alt="Dashboard procurement" class="w-full h-full object-cover" data-alt="Modern high-tech dashboard displaying procurement analytics, bar charts, and data maps in a clean professional glassmorphism interface" src="https://lh3.googleusercontent.com/aida-public/AB6AXuByF7x37Kf7RKby3cfwuuTcrrxi9tqBN1UUtzx57lu9YlZWKQnCRGL4w981LMfSshJmxa0agAgyXpkXSMxxZlNyoqF199FFL3-KlFfzCbF1bq4WxuhFntY5O0WCHVnZxvoxLoEmnVh3a2GACGQ-_kH4E7tkMDazIfn8ibNoJ9b7-QqtAazz0VWKOsGFwC2aKffbPHcq11XA7e2zZFfEv-wftKxjQD-3AXIO3j4l3qu3dkEZweVDUnISjZCFVjcGq78qaBkTPixV2hL3"/>
</div>
<div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-xl border border-slate-100 flex items-center gap-4">
<div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</div>
<div>
<p class="font-label-bold text-on-surface">98.5% Akurasi</p>
<p class="text-caption text-secondary">Verifikasi Dokumen</p>
</div>
</div>
</div>
</section>
<!-- Bento Grid Stats & Actions -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-xl">
<div class="md:col-span-2 bg-white rounded-xl p-md shadow-sm border border-slate-100 flex flex-col justify-between">
<div>
<h3 class="font-h3 text-h3 mb-2">Ringkasan Anggaran</h3>
<p class="text-body-sm text-secondary mb-6">Total alokasi tahun anggaran 2024</p>
</div>
<div class="flex items-end justify-between">
<div>
<p class="text-caption font-label-bold text-secondary uppercase tracking-wider">Total Nilai Pagu</p>
<p class="font-h2 text-h2 text-on-background">Rp 12.4 T</p>
</div>
<div class="text-right">
<span class="text-green-600 font-label-bold">+12.4%</span>
<p class="text-caption text-secondary">vs tahun lalu</p>
</div>
</div>
</div>
<div class="bg-rose-600 rounded-xl p-md shadow-lg flex flex-col justify-between text-white">
<span class="material-symbols-outlined text-4xl">gavel</span>
<div>
<p class="font-label-bold">Update Regulasi</p>
<p class="text-body-sm text-white/80">Perpres No. 12 Tahun 2021</p>
</div>
</div>
<div class="bg-white rounded-xl p-md shadow-sm border border-slate-100 flex flex-col justify-between">
<div class="flex justify-between items-start">
<span class="material-symbols-outlined text-rose-600 bg-rose-50 p-2 rounded-lg">history</span>
<span class="bg-secondary-container text-on-secondary-container text-[10px] px-2 py-0.5 rounded font-bold uppercase">Live</span>
</div>
<div>
<p class="font-label-bold text-on-surface">Paket Aktif</p>
<p class="font-h3 text-h3">1,240</p>
</div>
</div>
</section>
<!-- Recent Procurement Table Section -->
<section class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
<div class="p-6 border-b border-slate-50 flex justify-between items-center">
<h3 class="font-h3 text-h3">Pengadaan Terbaru</h3>
<button class="text-primary font-label-bold hover:underline">Lihat Semua</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="bg-tertiary-fixed text-on-tertiary-fixed text-caption font-bold uppercase tracking-widest">
<th class="px-6 py-4">Kode Paket</th>
<th class="px-6 py-4">Nama Pekerjaan</th>
<th class="px-6 py-4">Metode</th>
<th class="px-6 py-4 text-right">Nilai Pagu</th>
<th class="px-6 py-4 text-center">Status</th>
</tr>
</thead>
<tbody class="text-body-sm">
<tr class="border-b border-slate-50 hover:bg-surface-container transition-colors">
<td class="px-6 py-4 font-label-bold text-primary">#PBJ-2024-001</td>
<td class="px-6 py-4 text-on-surface font-medium">Pembangunan Jembatan Strategis Nasional</td>
<td class="px-6 py-4 text-secondary">Tender Cepat</td>
<td class="px-6 py-4 text-right font-medium">Rp 4.500.000.000</td>
<td class="px-6 py-4 text-center">
<span class="bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-[10px] font-bold uppercase">Pengumuman</span>
</td>
</tr>
<tr class="border-b border-slate-50 hover:bg-surface-container transition-colors bg-background/30">
<td class="px-6 py-4 font-label-bold text-primary">#PBJ-2024-002</td>
<td class="px-6 py-4 text-on-surface font-medium">Pengadaan Laptop Core i7 Kantor Pusat</td>
<td class="px-6 py-4 text-secondary">E-Purchasing</td>
<td class="px-6 py-4 text-right font-medium">Rp 850.000.000</td>
<td class="px-6 py-4 text-center">
<span class="bg-green-50 text-green-700 px-3 py-1 rounded-full text-[10px] font-bold uppercase">Selesai</span>
</td>
</tr>
<tr class="border-b border-slate-50 hover:bg-surface-container transition-colors">
<td class="px-6 py-4 font-label-bold text-primary">#PBJ-2024-003</td>
<td class="px-6 py-4 text-on-surface font-medium">Jasa Konsultasi Audit IT Terpadu</td>
<td class="px-6 py-4 text-secondary">Seleksi Umum</td>
<td class="px-6 py-4 text-right font-medium">Rp 1.200.000.000</td>
<td class="px-6 py-4 text-center">
<span class="bg-amber-50 text-amber-700 px-3 py-1 rounded-full text-[10px] font-bold uppercase">Evaluasi</span>
</td>
</tr>
</tbody>
</table>
</div>
</section>
</main>
<!-- BottomNavBar -->
<nav class="fixed bottom-10 left-1/2 -translate-x-1/2 z-50 flex items-center p-2 bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl w-fit rounded-2xl border border-white/20 dark:border-slate-800/50 shadow-[0_20px_50px_rgba(0,0,0,0.15)] dark:shadow-[0_20px_50px_rgba(0,0,0,0.4)] transition-all duration-500 gap-1"><!-- Peraturan PBJ -->
<a class="flex items-center justify-center text-slate-500 dark:text-slate-400 px-4 py-2 hover:bg-slate-100/50 dark:hover:bg-slate-800/50 rounded-xl transition-all active:scale-95 duration-300 group overflow-hidden" href="#">
<span class="material-symbols-outlined group-hover:text-rose-600 transition-colors" data-icon="gavel">gavel</span>
<span class="font-manrope text-[11px] font-bold uppercase tracking-wider ml-0 max-w-0 opacity-0 group-hover:ml-2 group-hover:max-w-xs group-hover:opacity-100 transition-all duration-300 whitespace-nowrap">Peraturan PBJ</span>
</a>
<!-- Informasi -->
<a class="flex items-center justify-center text-slate-500 dark:text-slate-400 px-4 py-2 hover:bg-slate-100/50 dark:hover:bg-slate-800/50 rounded-xl transition-all active:scale-95 duration-300 group overflow-hidden" href="#">
<span class="material-symbols-outlined group-hover:text-rose-600 transition-colors" data-icon="info">info</span>
<span class="font-manrope text-[11px] font-bold uppercase tracking-wider ml-0 max-w-0 opacity-0 group-hover:ml-2 group-hover:max-w-xs group-hover:opacity-100 transition-all duration-300 whitespace-nowrap">Informasi</span>
</a>
<!-- Dokumen Pengadaan (Active) -->
<a class="flex items-center justify-center bg-rose-600 text-white rounded-xl px-4 py-2 shadow-lg shadow-rose-600/20 active:scale-95 transition-all duration-300 overflow-hidden" href="#">
<span class="material-symbols-outlined" data-icon="description" style="font-variation-settings: 'FILL' 1;">description</span>
<span class="font-manrope text-[11px] font-bold uppercase tracking-wider ml-2 max-w-xs opacity-100 transition-all duration-300 whitespace-nowrap">Dokumen Pengadaan</span>
</a>
<!-- Lab LPSE -->
<a class="flex items-center justify-center text-slate-500 dark:text-slate-400 px-4 py-2 hover:bg-slate-100/50 dark:hover:bg-slate-800/50 rounded-xl transition-all active:scale-95 duration-300 group overflow-hidden" href="#">
<span class="material-symbols-outlined group-hover:text-rose-600 transition-colors" data-icon="science">science</span>
<span class="font-manrope text-[11px] font-bold uppercase tracking-wider ml-0 max-w-0 opacity-0 group-hover:ml-2 group-hover:max-w-xs group-hover:opacity-100 transition-all duration-300 whitespace-nowrap">Lab LPSE</span>
</a>
<!-- Aplikasi PBJ -->
<a class="flex items-center justify-center text-slate-500 dark:text-slate-400 px-4 py-2 hover:bg-slate-100/50 dark:hover:bg-slate-800/50 rounded-xl transition-all active:scale-95 duration-300 group overflow-hidden" href="#">
<span class="material-symbols-outlined group-hover:text-rose-600 transition-colors" data-icon="apps">apps</span>
<span class="font-manrope text-[11px] font-bold uppercase tracking-wider ml-0 max-w-0 opacity-0 group-hover:ml-2 group-hover:max-w-xs group-hover:opacity-100 transition-all duration-300 whitespace-nowrap">Aplikasi PBJ</span>
</a></nav>
</body></html>