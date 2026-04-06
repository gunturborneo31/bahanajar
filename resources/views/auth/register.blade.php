@extends('layouts.app')
@section('title', 'Daftar - BahanAjar')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12 bg-[#F9FAFB] dark:bg-[#111827] relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-[#DC2626]/5 blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 rounded-full bg-[#B91C1C]/5 blur-3xl"></div>
    </div>

    <div class="w-full max-w-sm relative z-10">
        <div class="text-center mb-8">
            <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-[#DC2626] to-[#B91C1C] flex items-center justify-center shadow-xl shadow-red-500/20">
                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <h1 class="font-['Poppins'] font-bold text-2xl text-[#111827] dark:text-white">Buat Akun</h1>
            <p class="text-[#6B7280] text-sm mt-1">Bergabung dengan ribuan pelajar pengadaan</p>
        </div>

        <div class="bg-white/80 dark:bg-[#1F2937]/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/50 dark:border-[#374151]/50 p-8">
            <form class="space-y-4" x-data="{ showPass: false, loading: false }" @submit.prevent="loading=true; setTimeout(()=>loading=false,2000)">
                <div>
                    <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Nama Lengkap</label>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-3.5 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <input type="text" placeholder="Nama lengkap Anda" required
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Email</label>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-3.5 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <input type="email" placeholder="email@domain.com" required
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Password</label>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-3.5 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <input :type="showPass ? 'text' : 'password'" placeholder="Min. 8 karakter" required
                            class="w-full pl-10 pr-12 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
                        <button type="button" @click="showPass = !showPass" class="absolute right-3.5 top-3.5 text-[#9CA3AF] hover:text-[#374151] dark:hover:text-white transition-colors">
                            <svg x-show="!showPass" class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <svg x-show="showPass" class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <input type="checkbox" id="agree" required class="mt-0.5 w-4 h-4 rounded border-[#E5E7EB] text-[#DC2626] focus:ring-[#DC2626]">
                    <label for="agree" class="text-xs text-[#6B7280] dark:text-[#9CA3AF]">Saya setuju dengan <a href="#" class="text-[#DC2626] hover:underline">Syarat & Ketentuan</a> dan <a href="#" class="text-[#DC2626] hover:underline">Kebijakan Privasi</a></label>
                </div>
                <button type="submit" :disabled="loading"
                    class="w-full py-3.5 bg-gradient-to-r from-[#DC2626] to-[#B91C1C] text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all flex items-center justify-center gap-2 disabled:opacity-70">
                    <span x-show="!loading">Buat Akun</span>
                    <span x-show="loading" class="flex items-center gap-2">
                        <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                        Memproses...
                    </span>
                </button>
            </form>
            <p class="text-center text-sm text-[#6B7280] dark:text-[#9CA3AF] mt-6">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-[#DC2626] font-semibold hover:underline">Masuk</a>
            </p>
        </div>
        <p class="text-center text-xs text-[#9CA3AF] mt-6">
            <a href="{{ route('home') }}" class="hover:text-[#DC2626] transition-colors">← Kembali ke Beranda</a>
        </p>
    </div>
</div>
@endsection
