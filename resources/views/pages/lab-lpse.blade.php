
@extends('layouts.app')

@section('title', 'LAB LPSE')

@section('content')

@if(session('success'))
    <div class="bg-secondary text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-4 border border-secondary-fixed mb-4">
        <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
            <span class="material-symbols-outlined text-[20px]" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
        </div>
        <div>
            <div class="font-bold">{{ session('success') }}</div>
        </div>
        <button class="ml-4 opacity-50 hover:opacity-100"><span class="material-symbols-outlined text-[18px]" data-icon="close">close</span></button>
    </div>
@endif
@if(session('error'))
    <div class="bg-red-600/90 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-4 border border-red-300 mb-4">
        <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
            <span class="material-symbols-outlined text-[20px]" data-icon="error" style="font-variation-settings: 'FILL' 1;">error</span>
        </div>
        <div>
            <div class="font-bold">{{ session('error') }}</div>
        </div>
        <button class="ml-4 opacity-50 hover:opacity-100"><span class="material-symbols-outlined text-[18px]" data-icon="close">close</span></button>
    </div>
@endif


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Hero Section -->
    <section class="mb-12 mt-12">
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#dc2626] to-[#b91c1c] p-10 md:p-16 text-white shadow-xl flex flex-col md:flex-row items-center gap-8 font-['Inter','Plus_Jakarta_Sans',sans-serif]">
            <div class="flex-1 z-10">
                <h1 class="font-extrabold text-3xl md:text-4xl lg:text-5xl mb-4 leading-tight tracking-tight">LAB LPSE</h1>
                <p class="text-lg md:text-xl opacity-90 max-w-2xl font-normal mb-6">Tingkatkan kompetensi Anda dalam sistem pengadaan nasional. Daftar, pelajari, dan raih sertifikasi resmi melalui program unggulan kami.</p>
                <div class="flex flex-wrap gap-4">
                    <button class="bg-white text-[#b91c1c] font-bold px-6 py-3 rounded-full shadow-md hover:scale-105 transition-transform">Daftar Sekarang</button>
                    <button class="bg-white/20 border border-white/30 px-6 py-3 rounded-full font-semibold hover:bg-white/30 transition-all">Jadwal Ujian</button>
                </div>
            </div>
            <div class="hidden md:block absolute right-0 top-0 h-full w-1/3 opacity-20 pointer-events-none">
                <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBUcmIA9ACBFYfis27ZRhu6iJgaK9CW4DWgQeR_rn0wBsDttNE_-ZfFwtWjjRLeQJwwmbfKSh4Q0VA2UEnni4idMW_vptJITN4yDPUdr03eynbnS8H5bwpv_-cdpNEhNCMYajHCNWZiX1ua_UfT_Cf_u-RkV4DLDKe-OSgtB1Nh10s7p8FWrQrs1UBkZrqIwNvhiRXYwTzE5etG8niTVcRrbSRzM5SvzaN_iqEfy_wr72K-ERSDzekeu-ixuOjWyjmotqERZfE2G-Y" alt="Hero" />
            </div>
        </div>
    </section>

    <!-- Row 1: Calendar & Upcoming -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
        <!-- Left: Calendar (FullCalendar) -->
        <div class="lg:col-span-8">
            <div class="rounded-2xl p-0 md:p-8 shadow-md bg-white/90 backdrop-blur-lg transition-all duration-300 hover:shadow-xl">
                <div class="flex justify-between items-center px-2 md:px-4 pt-2 md:pt-0 mb-4">
                    <h2 class="font-h3 text-primary tracking-tight">Kalender Pelatihan</h2>
                </div>
                <div id="calendar" class="rounded-2xl overflow-hidden bg-gradient-to-br from-[#f8fafc] via-[#e0e7ff] to-[#f0fdf4] shadow-inner animate-fadeIn"></div>
            </div>
        </div>
        <!-- Right: Upcoming Trainings & Stats -->
        <div class="lg:col-span-4 flex flex-col gap-6">
            <div class="rounded-2xl p-6 bg-white shadow-md h-full">
                <h2 class="font-h3 text-primary mb-6">Jadwal Terdekat</h2>
                <div class="space-y-4">
                    <div class="group p-4 rounded-xl bg-red-50/60 hover:bg-red-100/80 transition-all cursor-pointer shadow-sm">
                        <div class="flex justify-between items-start mb-2">
                            <span class="bg-[#dc2626]/10 text-[#dc2626] px-2 py-1 rounded text-[10px] font-bold uppercase">PBJP DASAR</span>
                            <span class="text-caption text-on-surface-variant">10 - 12 Mei</span>
                        </div>
                        <h4 class="font-label-sm text-[#b91c1c] group-hover:text-primary transition-colors">Bimbingan Teknis PBJP Tingkat Dasar</h4>
                        <div class="flex items-center gap-2 mt-3 text-caption text-slate-500">
                            <span class="material-symbols-outlined text-[16px]" data-icon="location_on">location_on</span>
                            <span>Hotel Borobudur, Jakarta</span>
                        </div>
                    </div>
                    <div class="group p-4 rounded-xl bg-green-50/60 hover:bg-green-100/80 transition-all cursor-pointer shadow-sm">
                        <div class="flex justify-between items-start mb-2">
                            <span class="bg-[#16a34a]/10 text-[#16a34a] px-2 py-1 rounded text-[10px] font-bold uppercase">SERTIFIKASI</span>
                            <span class="text-caption text-on-surface-variant">17 Mei</span>
                        </div>
                        <h4 class="font-label-sm text-[#15803d] group-hover:text-primary transition-colors">Ujian Sertifikasi Ahli Pengadaan</h4>
                        <div class="flex items-center gap-2 mt-3 text-caption text-slate-500">
                            <span class="material-symbols-outlined text-[16px]" data-icon="videocam">videocam</span>
                            <span>Online via Zoom</span>
                        </div>
                    </div>
                    <div class="group p-4 rounded-xl bg-yellow-50/60 hover:bg-yellow-100/80 transition-all cursor-pointer shadow-sm">
                        <div class="flex justify-between items-start mb-2">
                            <span class="bg-yellow-400/10 text-yellow-700 px-2 py-1 rounded text-[10px] font-bold uppercase">KONTRAK</span>
                            <span class="text-caption text-on-surface-variant">22 - 24 Mei</span>
                        </div>
                        <h4 class="font-label-sm text-yellow-700 group-hover:text-primary transition-colors">Workshop Manajemen Kontrak Konstruksi</h4>
                        <div class="flex items-center gap-2 mt-3 text-caption text-slate-500">
                            <span class="material-symbols-outlined text-[16px]" data-icon="location_on">location_on</span>
                            <span>Gedung LKPP Lt. 2, Jakarta</span>
                        </div>
                    </div>
                </div>
                <button class="w-full mt-6 py-3 border border-primary text-primary font-label-sm rounded-lg hover:bg-primary hover:text-white transition-all">Lihat Semua Jadwal</button>
            </div>
            <!-- Stats/Quick Info -->
         
        </div>
    </div>
        @push('head')
            <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.11/main.min.css" rel="stylesheet" />
            <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.11/main.min.css" rel="stylesheet" />
            <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.11/main.min.css" rel="stylesheet" />
            <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/list@6.1.11/main.min.css" rel="stylesheet" />
            <style>
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(16px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                .animate-fadeIn { animation: fadeIn 0.7s cubic-bezier(.4,0,.2,1) both; }
                #calendar .fc {
                    border-radius: 1rem;
                    font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
                    background: transparent;
                }
                #calendar .fc-toolbar-title {
                    font-size: 1.35rem;
                    font-weight: 800;
                    color: #2563eb;
                    letter-spacing: -0.5px;
                }
                #calendar .fc-daygrid-day.fc-day-today {
                    background: linear-gradient(90deg,#e0e7ff 60%,#f0fdf4 100%);
                    border-radius: 1rem;
                    box-shadow: 0 2px 8px 0 rgba(37,99,235,0.07);
                }
                #calendar .fc-event {
                    border-radius: 0.9rem;
                    background: linear-gradient(90deg,#2563eb,#16a34a 80%);
                    color: #fff;
                    border: none;
                    font-size: 1em;
                    font-weight: 600;
                    box-shadow: 0 2px 12px 0 rgba(37,99,235,0.10);
                    transition: transform .18s cubic-bezier(.4,0,.2,1), box-shadow .18s;
                }
                #calendar .fc-event:hover {
                    transform: scale(1.04);
                    box-shadow: 0 4px 20px 0 rgba(37,99,235,0.18);
                    filter: brightness(1.08);
                }
                #calendar .fc-daygrid-event-dot {
                    background: #2563eb;
                }
                #calendar .fc-daygrid-day-number {
                    font-weight: 600;
                    color: #2563eb;
                }
                #calendar .fc-col-header-cell {
                    background: #f8fafc;
                    color: #64748b;
                    font-weight: 700;
                    font-size: 1em;
                    border: none;
                }
                #calendar .fc-scrollgrid-section-header td {
                    border: none;
                }
            </style>
        @endpush

        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.11/index.global.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.11/index.global.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.11/index.global.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.11/index.global.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/list@6.1.11/index.global.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');
                    if (calendarEl) {
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGridMonth',
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,listWeek'
                            },
                            height: 540,
                            selectable: true,
                            editable: false,
                            events: [
                                {
                                    title: 'Pelatihan PBJP Dasar',
                                    start: '2024-05-10',
                                    end: '2024-05-13',
                                    color: '#2563eb',
                                },
                                {
                                    title: 'Sertifikasi Ahli Pengadaan',
                                    start: '2024-05-17',
                                    color: '#16a34a',
                                },
                                {
                                    title: 'Workshop Manajemen Kontrak',
                                    start: '2024-05-22',
                                    end: '2024-05-25',
                                    color: '#b91c1c',
                                }
                            ],
                            eventClick: function(info) {
                                // Tampilkan modal detail pelatihan
                                let modal = document.querySelector('.z-[100]');
                                if (modal) modal.style.display = 'flex';
                            }
                        });
                        calendar.render();
                    }
                });
            </script>
        @endpush
    </div>  
    <!-- Header Filters -->
    <section class="glass-card rounded-2xl p-6 flex flex-col mx-2 md:mx-8 md:flex-row flex-wrap items-end gap-4 md:gap-6 mb-10 shadow-md">
        <div class="flex-1 min-w-[200px] mb-4 md:mb-0">
            <label class="block font-label-sm text-on-surface-variant mb-2">Jenis Pelatihan</label>
            <select class="w-full bg-slate-50 border border-outline-variant rounded-xl focus:ring-primary focus:border-primary text-body-md py-2 px-3">
                <option>Semua Jenis</option>
                <option>PBJP Dasar</option>
                <option>Sertifikasi Ahli</option>
                <option>Manajemen Kontrak</option>
            </select>
        </div>
        <div class="flex-1 min-w-[200px] mb-4 md:mb-0">
            <label class="block font-label-sm text-on-surface-variant mb-2">Bulan Pelaksanaan</label>
            <input class="w-full bg-slate-50 border border-outline-variant rounded-xl focus:ring-primary focus:border-primary text-body-md py-2 px-3" type="month" value="2024-05" />
        </div>
        <div class="flex-1 min-w-[200px] mb-4 md:mb-0">
            <label class="block font-label-sm text-on-surface-variant mb-2">Metode</label>
            <div class="flex gap-2">
                <button class="flex-1 py-2 px-4 rounded-full bg-primary text-white font-label-sm transition-all active:scale-95">Online</button>
                <button class="flex-1 py-2 px-4 rounded-full bg-slate-100 text-on-surface-variant font-label-sm hover:bg-slate-200 transition-all">Offline</button>
            </div>
        </div>
        <div class="flex items-end">
            <button class="bg-primary text-white py-2.5 px-6 rounded-full hover:bg-primary-accent transition-all flex items-center gap-2 font-bold shadow">
                <span class="material-symbols-outlined" data-icon="search">search</span>
                <span class="font-label-sm">Terapkan Filter</span>
            </button>
        </div>
    </section>
    <!-- Row 2: Data Table -->
    <section class="rounded-2xl overflow-hidden bg-white shadow-lg mt-10 mx-2 md:mx-8">
        <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <h2 class="font-h3 text-[#b91c1c]">Daftar Pelatihan Lengkap</h2>
            <div class="flex flex-wrap gap-2 w-full md:w-auto">
                <div class="relative flex-1 md:w-64">
                    <input id="search" name="search"
                        class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-primary focus:border-primary text-body-md"
                        placeholder="Cari pelatihan..." type="text" value="{{ request('search') }}" aria-label="Cari pelatihan" />
                    <span class="material-symbols-outlined absolute left-3 top-2.5 text-slate-400 text-[20px]"
                        data-icon="search">search</span>
                </div>
                <div class="flex gap-2">
                    <button class="p-2 border border-slate-200 rounded-lg hover:bg-slate-100"><span
                            class="material-symbols-outlined text-[20px]"
                            data-icon="description">description</span></button>
                    <button class="p-2 border border-slate-200 rounded-lg hover:bg-slate-100"><span
                            class="material-symbols-outlined text-[20px]"
                            data-icon="picture_as_pdf">picture_as_pdf</span></button>
                    <button class="p-2 border border-slate-200 rounded-lg hover:bg-slate-100"><span
                            class="material-symbols-outlined text-[20px]" data-icon="print">print</span></button>
                </div>
                <form method="GET" class="ml-2">
                    <button type="submit" name="reset" value="1" class="px-4 py-2 rounded-lg border border-slate-200 text-caption text-slate-500 hover:bg-slate-100">Reset Filter</button>
                </form>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left rounded-xl overflow-hidden bg-white">
                <thead class="bg-slate-50 font-label-sm text-slate-500 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4">No <span class="material-symbols-outlined text-[12px]"
                                data-icon="unfold_more">unfold_more</span></th>
                        <th class="px-6 py-4">Nama Pelatihan</th>
                        <th class="px-6 py-4">Jenis</th>
                        <th class="px-6 py-4">Sisa Kuota</th>
                        <th class="px-6 py-4">Waktu</th>
                        <th class="px-6 py-4">Lokasi</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/30">
                    {{-- Contoh data, ganti dengan @forelse jika sudah dinamis --}}
                    @forelse($pelatihans ?? [] as $i => $pelatihan)
                    <tr class="hover:bg-primary-container/5 transition-colors group cursor-pointer">
                        <td class="px-6 py-4 text-caption text-slate-500">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-label-sm text-blue-900">{{ $pelatihan->nama }}</td>
                        <td class="px-6 py-4"><span class="bg-surface-container-high text-on-surface-variant px-2 py-1 rounded text-[10px] font-bold">{{ $pelatihan->jenis }}</span></td>
                        <td class="px-6 py-4 w-40">
                            <div class="flex flex-col gap-1">
                                <div class="flex justify-between text-[10px] font-bold"><span>{{ ribuan($pelatihan->kuota_tersisa) }}/{{ ribuan($pelatihan->kuota_total) }}</span><span>{{ $pelatihan->kuota_total ? round($pelatihan->kuota_tersisa/$pelatihan->kuota_total*100) : 0 }}%</span></div>
                                <div class="w-full bg-slate-200 h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-secondary h-full" style="width: {{ $pelatihan->kuota_total ? ($pelatihan->kuota_tersisa/$pelatihan->kuota_total*100) : 0 }}%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-caption">{{ formatTanggal($pelatihan->tanggal_mulai, 'd M Y') }} - {{ formatTanggal($pelatihan->tanggal_selesai, 'd M Y') }}</td>
                        <td class="px-6 py-4 text-caption">{{ $pelatihan->lokasi }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full {{ $pelatihan->status == 'BUKA' ? 'bg-emerald-100 text-secondary' : ($pelatihan->status == 'TERBATAS' ? 'bg-orange-100 text-orange-700' : 'bg-slate-100 text-slate-500') }} text-[11px] font-bold">
                                @if($pelatihan->status == 'BUKA')<span class="w-1.5 h-1.5 rounded-full bg-secondary animate-pulse"></span>@endif
                                {{ strtoupper($pelatihan->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="bg-primary/10 text-primary hover:bg-primary hover:text-white px-4 py-1.5 rounded-lg text-caption font-bold transition-all">Detail</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-8 text-slate-400">
                            Tidak ada data yang ditemukan.
                            @if(request()->hasAny(['search','jenis','bulan','metode']))
                            <form method="GET" class="inline-block ml-2">
                                <button type="submit" name="reset" value="1" class="px-4 py-2 rounded-lg border border-outline-variant text-caption text-slate-500 hover:bg-slate-100">Reset Filter</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- Pagination --}}
            <div class="mt-4 flex justify-between items-center">
                <span class="text-caption text-on-surface-variant">
                    Menampilkan {{ ($pelatihans?->firstItem() ?? 0) }} - {{ ($pelatihans?->lastItem() ?? 0) }} dari {{ ($pelatihans?->total() ?? 0) }} entri
                </span>
                <div>
                    {{ $pelatihans?->withQueryString()->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
        <div class="p-6 bg-slate-50/50 flex justify-between items-center border-t border-outline-variant/30">
            <span class="text-caption text-on-surface-variant">Menampilkan 1 - 3 dari 12 entri</span>
            <div class="flex gap-1">
                <button
                    class="p-2 rounded hover:bg-white border border-outline-variant/30 text-caption disabled:opacity-50">Prev</button>
                <button
                    class="w-8 h-8 flex items-center justify-center rounded bg-primary text-white text-caption">1</button>
                <button
                    class="w-8 h-8 flex items-center justify-center rounded hover:bg-white border border-outline-variant/30 text-caption">2</button>
                <button
                    class="w-8 h-8 flex items-center justify-center rounded hover:bg-white border border-outline-variant/30 text-caption">3</button>
                <button class="p-2 rounded hover:bg-white border border-outline-variant/30 text-caption">Next</button>
            </div>
        </div>
    </section>
    <!-- Modal Backdrop -->
    <div class="fixed inset-0 bg-on-surface/40 backdrop-blur-sm z-[100] flex items-center justify-center p-4" style="display:none;">
        <!-- Modal Content -->
        <div class="bg-white rounded-2xl w-full max-w-2xl overflow-hidden shadow-2xl flex flex-col">
            <div class="p-6 border-b border-outline-variant/30 flex justify-between items-center bg-surface-container-low">
                <div>
                    <span class="text-caption font-bold text-primary uppercase tracking-widest">Detail Pelatihan</span>
                    <h3 class="font-h3 text-blue-900 mt-1">Bimbingan Teknis PBJP Tingkat Dasar</h3>
                </div>
                <button class="p-2 hover:bg-white rounded-full transition-colors modal-close" type="button">
                    <span class="material-symbols-outlined" data-icon="close">close</span>
                </button>
            </div>
            <div class="p-8 overflow-y-auto max-h-[716px] space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined" data-icon="calendar_month">calendar_month</span>
                            </div>
                            <div>
                                <div class="text-[10px] text-on-surface-variant font-bold uppercase">Tanggal</div>
                                <div class="text-body-md font-semibold">10 - 12 Mei 2024</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined" data-icon="location_on">location_on</span>
                            </div>
                            <div>
                                <div class="text-[10px] text-on-surface-variant font-bold uppercase">Lokasi</div>
                                <div class="text-body-md font-semibold">Hotel Borobudur, Jakarta</div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined" data-icon="group">group</span>
                            </div>
                            <div>
                                <div class="text-[10px] text-on-surface-variant font-bold uppercase">Sisa Kuota</div>
                                <div class="text-body-md font-semibold">12 Orang</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined" data-icon="payments">payments</span>
                            </div>
                            <div>
                                <div class="text-[10px] text-on-surface-variant font-bold uppercase">Biaya</div>
                                <div class="text-body-md font-semibold">Gratis (Subsidi LKPP)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="font-label-sm mb-2">Deskripsi Pelatihan</h4>
                    <p class="text-body-md text-on-surface-variant">Pelatihan ini dirancang untuk memberikan pemahaman menyeluruh mengenai siklus pengadaan barang/jasa pemerintah sesuai dengan Perpres terbaru. Materi mencakup perencanaan, persiapan, pelaksanaan, hingga pengawasan pengadaan.</p>
                </div>
                <div class="pt-6 border-t border-outline-variant/30">
                    <h4 class="font-h3 mb-6 text-blue-900">Formulir Pendaftaran</h4>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="col-span-full">
                                <label class="block font-label-sm mb-2">Status Peserta</label>
                                <div class="flex gap-4">
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input checked class="text-primary focus:ring-primary border-outline-variant" name="status" type="radio" value="Penyedia" />
                                        <span class="text-body-md">Penyedia</span>
                                    </label>
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input class="text-primary focus:ring-primary border-outline-variant" name="status" type="radio" value="Non Penyedia" />
                                        <span class="text-body-md">Non Penyedia (ASN/Lembaga)</span>
                                    </label>
                                </div>
                            </div>
                            <!-- Conditional Fields (Simulated as Visible) -->
                            <div class="space-y-4 col-span-full border-l-4 border-primary/20 pl-4 py-2 bg-slate-50/50 rounded-r-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block font-label-sm mb-2">Nama Perusahaan</label>
                                        <input class="w-full bg-white border-outline-variant rounded-lg focus:ring-primary focus:border-primary text-body-md" placeholder="PT. Nama Perusahaan" type="text" />
                                    </div>
                                    <div>
                                        <label class="block font-label-sm mb-2">NPWP</label>
                                        <input class="w-full bg-white border-outline-variant rounded-lg focus:ring-primary focus:border-primary text-body-md" placeholder="00.000.000.0-000.000" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end gap-3 pt-4">
                            <button class="px-6 py-2.5 font-label-sm text-on-surface-variant hover:bg-slate-100 rounded-lg transition-colors btn-batal" type="button">Batal</button>
                            <button class="bg-primary text-white px-8 py-2.5 rounded-lg font-label-sm hover:bg-primary-container transition-all flex items-center gap-2" type="submit">
                                <div class="w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin hidden"></div>
                                <span>Daftar Sekarang</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Success Toast Mockup -->
    <div class="fixed bottom-10 right-10 z-[200] transform translate-y-0 opacity-100" style="display:none;">
        <div class="bg-secondary text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-4 border border-secondary-fixed">
            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
            </div>
            <div>
                <div class="font-bold">Data Terdaftar!</div>
                <div class="text-[12px] opacity-80">Email konfirmasi telah dikirim ke alamat Anda.</div>
            </div>
            <button class="ml-4 opacity-50 hover:opacity-100"><span class="material-symbols-outlined text-[18px]" data-icon="close">close</span></button>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Semua tombol close (icon X, modal-close, btn-batal)
        document.querySelectorAll('.modal-close, [data-icon="close"], .btn-batal').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                let parent = btn.closest("[class*='z-[100]']")
                    || btn.closest("[class*='z-[200]']")
                    || btn.closest('.fixed')
                    || btn.closest('.modal')
                    || btn.closest('.glass-card')
                    || btn.closest('.alert')
                    || btn.closest('.rounded-2xl')
                    || btn.closest('.rounded-xl');
                if (parent) parent.style.display = 'none';
            });
        });
        // Popup/modal show (klik card jadwal terdekat atau tombol detail)
        document.querySelectorAll('.cursor-pointer, .bg-primary\\/10').forEach(function (card) {
            card.addEventListener('click', function (e) {
                let modal = document.querySelector('.z-[100]');
                if (modal) modal.style.display = 'flex';
            });
        });
        // Form submit: tampilkan toast sukses
        let form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                let toast = document.querySelector('.z-[200]');
                if (toast) toast.style.display = 'flex';
                // Tutup modal
                let modal = document.querySelector('.z-[100]');
                if (modal) modal.style.display = 'none';
            });
        }
    });
    </script>
   
</div>