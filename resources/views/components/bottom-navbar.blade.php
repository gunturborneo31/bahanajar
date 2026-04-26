



<nav class="fixed bottom-10 left-1/2 -translate-x-1/2 z-50 flex items-center p-2 bg-[#af101a] w-fit rounded-2xl border border-white/20 shadow-[0_20px_50px_rgba(184,0,53,0.18)] transition-all duration-500 gap-1">
    @php
        $menus = [
            [
                'route' => 'home',
                'icon' => 'home',
                'label' => 'Home',
            ],
            [
                'route' => 'peraturan',
                'icon' => 'gavel',
                'label' => 'Peraturan PBJ',
            ],
            [
                'route' => 'materi',
                'icon' => 'info',
                'label' => 'Informasi',
            ],
            [
                'route' => 'dokumen',
                'icon' => 'description',
                'label' => 'Dokumen Pengadaan',
            ],
            [
                'route' => 'lab-lpse',
                'icon' => 'science',
                'label' => 'Lab LPSE',
            ],
            [
                'route' => 'kontak',
                'icon' => 'apps',
                'label' => 'Aplikasi PBJ',
            ],
        ];
    @endphp
    @foreach ($menus as $menu)
        @php $active = request()->routeIs($menu['route']); @endphp
        <a href="{{ route($menu['route']) }}"
           class="flex items-center justify-center {{ $active ? 'bg-white text-rose-600 shadow-lg shadow-white/20' : 'text-white/80 hover:bg-white/10' }} px-4 py-2 rounded-xl transition-all active:scale-95 duration-300 group overflow-hidden"
        >
            <span class="material-symbols-outlined text-[1.6rem] align-middle {{ $active ? 'text-rose-600' : 'group-hover:text-white transition-colors' }}" style="font-variation-settings: 'FILL' {{ $active && $menu['icon'] === 'description' ? 1 : 0 }};">
                {{ $menu['icon'] }}
            </span>
            <span class="font-manrope text-[11px] font-bold uppercase tracking-wider
                {{ $active ? 'ml-2 max-w-xs opacity-100 text-rose-600' : 'ml-0 max-w-0 opacity-0 group-hover:ml-2 group-hover:max-w-xs group-hover:opacity-100 text-white/90' }}
                transition-all duration-300 whitespace-nowrap">
                {{ $menu['label'] }}
            </span>
        </a>
    @endforeach
</nav>
