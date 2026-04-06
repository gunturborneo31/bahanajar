@extends('layouts.app')
@section('title', 'Kontak - BahanAjar Pengadaan Barang')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-16">

    <div class="text-center mb-12">
        <span class="inline-block px-4 py-1.5 bg-[#FEF2F2] dark:bg-[#7F1D1D]/20 text-[#DC2626] text-xs font-semibold rounded-full mb-4 tracking-widest uppercase">Kontak Kami</span>
        <h1 class="font-['Poppins'] font-bold text-3xl md:text-5xl text-[#111827] dark:text-white mb-4">Ada Pertanyaan?<br><span class="text-[#DC2626]">Hubungi Kami</span></h1>
        <p class="text-[#6B7280] max-w-md mx-auto">Kami siap membantu Anda. Kirimkan pesan dan kami akan segera merespons.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8 lg:gap-12">

        {{-- Left: Contact Form --}}
        <div class="bg-white dark:bg-[#1F2937] rounded-3xl shadow-xl border border-[#E5E7EB] dark:border-[#374151] p-6 md:p-8">
            <h2 class="font-['Poppins'] font-bold text-xl text-[#111827] dark:text-white mb-6">Kirim Pesan</h2>

            <form class="space-y-5" x-data="{ loading: false }" @submit.prevent="loading = true; setTimeout(() => loading = false, 2000)">
                <div>
                    <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Nama Lengkap</label>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-3.5 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <input type="text" placeholder="Masukkan nama Anda" required
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-[#111827] dark:text-white text-sm placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Alamat Email</label>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-3.5 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <input type="email" placeholder="email@domain.com" required
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-[#111827] dark:text-white text-sm placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Subjek</label>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-3.5 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                        <input type="text" placeholder="Topik pertanyaan"
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-[#111827] dark:text-white text-sm placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Pesan</label>
                    <textarea rows="5" placeholder="Tuliskan pesan Anda di sini..." required
                        class="w-full px-4 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-[#111827] dark:text-white text-sm placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all resize-none"></textarea>
                </div>

                <button type="submit"
                    :disabled="loading"
                    class="w-full py-3.5 bg-gradient-to-r from-[#DC2626] to-[#B91C1C] text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                    <span x-show="!loading">
                        <svg class="w-5 h-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        Kirim Pesan
                    </span>
                    <span x-show="loading" class="flex items-center gap-2">
                        <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        Mengirim...
                    </span>
                </button>
            </form>
        </div>

        {{-- Right: Contact Info + Map --}}
        <div class="flex flex-col gap-5">

            {{-- Contact list --}}
            <div class="bg-white dark:bg-[#1F2937] rounded-2xl shadow-md border border-[#E5E7EB] dark:border-[#374151] p-6">
                <h2 class="font-['Poppins'] font-bold text-lg text-[#111827] dark:text-white mb-5">Informasi Kontak</h2>
                <div class="space-y-4">
                    @foreach([
                        ['icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'label' => 'Email', 'value' => 'info@bahanajar.id', 'color' => 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400'],
                        ['icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', 'label' => 'Telepon', 'value' => '+62 812-xxxx-xxxx', 'color' => 'bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400'],
                        ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Alamat', 'value' => 'Jakarta, Indonesia', 'color' => 'bg-red-50 dark:bg-red-900/20 text-[#DC2626] dark:text-red-400'],
                        ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Jam Operasional', 'value' => 'Senin - Jumat, 08:00 - 17:00', 'color' => 'bg-yellow-50 dark:bg-yellow-900/20 text-yellow-600 dark:text-yellow-400'],
                    ] as $contact)
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl {{ $contact['color'] }} flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $contact['icon'] }}"/></svg>
                        </div>
                        <div>
                            <div class="text-xs text-[#9CA3AF] font-medium">{{ $contact['label'] }}</div>
                            <div class="text-sm text-[#111827] dark:text-white font-medium">{{ $contact['value'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Google Maps Embed --}}
            <div class="flex-1 rounded-2xl overflow-hidden shadow-md border border-[#E5E7EB] dark:border-[#374151] min-h-48">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613507864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1234567890"
                    class="w-full h-full min-h-48 md:min-h-64"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection
