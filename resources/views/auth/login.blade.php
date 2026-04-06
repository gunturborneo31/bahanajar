@extends('layouts.app')
@section('title', 'Masuk - BahanAjar')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12 bg-[#F9FAFB] dark:bg-[#111827] relative overflow-hidden">

    {{-- Background pattern --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-[#DC2626]/5 blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 rounded-full bg-[#B91C1C]/5 blur-3xl"></div>
    </div>

    <div class="w-full max-w-sm relative z-10">

        {{-- Logo --}}
        <div class="text-center mb-8">
            <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-[#DC2626] to-[#B91C1C] flex items-center justify-center shadow-xl shadow-red-500/20">
                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <h1 class="font-['Poppins'] font-bold text-2xl text-[#111827] dark:text-white">Selamat Datang</h1>
            <p class="text-[#6B7280] text-sm mt-1">Masuk ke akun BahanAjar Anda</p>
        </div>

        {{-- Card --}}
        <div class="bg-white/80 dark:bg-[#1F2937]/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/50 dark:border-[#374151]/50 p-8">

            <form class="space-y-5" x-data="{ showPass: false, loading: false }" @submit.prevent="loading=true; setTimeout(()=>loading=false,2000)">

                <div>
                    <label class="block text-sm font-semibold text-[#374151] dark:text-[#D1D5DB] mb-2">Email</label>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-3.5 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <input type="email" placeholder="email@domain.com" required
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="text-sm font-semibold text-[#374151] dark:text-[#D1D5DB]">Password</label>
                        <a href="#" class="text-xs text-[#DC2626] hover:underline">Lupa password?</a>
                    </div>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-3.5 w-4.5 h-4.5 text-[#9CA3AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <input :type="showPass ? 'text' : 'password'" placeholder="••••••••" required
                            class="w-full pl-10 pr-12 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-[#F9FAFB] dark:bg-[#111827] text-sm text-[#111827] dark:text-white placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30 focus:border-[#DC2626] transition-all">
                        <button type="button" @click="showPass = !showPass" class="absolute right-3.5 top-3.5 text-[#9CA3AF] hover:text-[#374151] dark:hover:text-white transition-colors">
                            <svg x-show="!showPass" class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <svg x-show="showPass" class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                        </button>
                    </div>
                </div>

                <button type="submit" :disabled="loading"
                    class="w-full py-3.5 bg-gradient-to-r from-[#DC2626] to-[#B91C1C] text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all flex items-center justify-center gap-2 disabled:opacity-70">
                    <span x-show="!loading" class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                        Masuk
                    </span>
                    <span x-show="loading" class="flex items-center gap-2">
                        <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                        Memproses...
                    </span>
                </button>
            </form>

            {{-- Divider --}}
            <div class="flex items-center gap-3 my-5">
                <div class="flex-1 h-px bg-[#E5E7EB] dark:bg-[#374151]"></div>
                <span class="text-xs text-[#9CA3AF] font-medium">atau masuk dengan</span>
                <div class="flex-1 h-px bg-[#E5E7EB] dark:bg-[#374151]"></div>
            </div>

            {{-- Social logins --}}
            <div class="grid grid-cols-2 gap-3">
                <button class="flex items-center justify-center gap-2.5 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-white dark:bg-[#111827] hover:scale-[1.02] hover:shadow-md transition-all text-sm font-medium text-[#374151] dark:text-white">
                    <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                    Google
                </button>
                <button class="flex items-center justify-center gap-2.5 py-3 rounded-xl border border-[#E5E7EB] dark:border-[#374151] bg-white dark:bg-[#111827] hover:scale-[1.02] hover:shadow-md transition-all text-sm font-medium text-[#374151] dark:text-white">
                    <svg class="w-5 h-5" fill="#1877F2" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    Facebook
                </button>
            </div>

            <p class="text-center text-sm text-[#6B7280] dark:text-[#9CA3AF] mt-6">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-[#DC2626] font-semibold hover:underline">Daftar sekarang</a>
            </p>
        </div>

        <p class="text-center text-xs text-[#9CA3AF] mt-6">
            <a href="{{ route('home') }}" class="hover:text-[#DC2626] transition-colors">← Kembali ke Beranda</a>
        </p>
    </div>
</div>
@endsection
