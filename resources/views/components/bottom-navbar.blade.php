<nav
    class="fixed bottom-10 left-1/2 -translate-x-1/2 z-50 flex items-center p-2 bg-[#af101a] w-fit rounded-2xl border border-white/20 shadow-[0_20px_50px_rgba(184,0,53,0.18)] transition-all duration-500 gap-1">
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
                'route' => 'panduan',
                'icon' => 'info',
                'label' => 'Informasi',
                'dropdown' => [
                    ['route' => 'panduan', 'label' => 'Panduan'],
                    ['route' => 'faq', 'label' => 'FAQ'],
                ],
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
        @if(isset($menu['dropdown']))
       
</div>
            <div class="relative group overflow-visible" x-data="{open: false}" @mouseleave="open=false">
                <a href="{{ route($menu['route']) }}" @mouseenter="open=true" @click.prevent="open=!open"
                    class="flex items-center justify-center {{ $active ? 'bg-white text-rose-600 shadow-lg shadow-white/20' : 'text-white/80 hover:bg-white/10' }} px-4 py-2 rounded-xl transition-all active:scale-95 duration-300 group overflow-hidden cursor-pointer"
                    :aria-expanded="open ? 'true' : 'false'" aria-haspopup="true" :class="{'ring-2 ring-white/60': open}">
                    <span
                        class="material-symbols-outlined text-[1.6rem] align-middle {{ $active ? 'text-rose-600' : 'group-hover:text-white transition-colors' }}">
                        {{ $menu['icon'] }}
                    </span>
                    <span class="font-manrope text-[11px] font-bold uppercase tracking-wider
                                {{ $active ? 'ml-2 max-w-xs opacity-100 text-rose-600' : 'ml-0 max-w-0 opacity-0 group-hover:ml-2 group-hover:max-w-xs group-hover:opacity-100 text-white/90' }}
                                transition-all duration-300 whitespace-nowrap">
                        {{ $menu['label'] }}
                    </span>
                    <span class="material-symbols-outlined text-xs ml-1 align-middle transition-transform duration-200"
                        :class="{'rotate-180': open}">expand_less</span>
                </a>

                <div x-show="open" x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 -translate-y-full" x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-full"
                    class="absolute left-1/2 -translate-x-1/2 bottom-full top-auto mb-3 z-[1050] min-w-[170px] pointer-events-auto"
                    @mouseenter="open=true" @mouseleave="open=false" style="display: block; bottom: 100%;">
                    <div class="bg-[#af101a] rounded-xl shadow-lg py-2 px-3 flex flex-col gap-1 border border-white/30">
                        @foreach($menu['dropdown'] as $drop)
                            <a href="{{ route($drop['route']) }}"
                                class="flex items-center gap-2 text-sm text-white hover:bg-white/20 py-2 px-3 rounded-lg transition-all">
                                <span class="material-symbols-outlined text-base">
                                    @if($drop['route'] === 'panduan')
                                        menu_book
                                    @elseif($drop['route'] === 'faq')
                                        help
                                    @else
                                        chevron_right
                                    @endif
                                </span>
                                {{ $drop['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <a href="{{ route($menu['route']) }}"
                class="flex items-center justify-center {{ $active ? 'bg-white text-rose-600 shadow-lg shadow-white/20' : 'text-white/80 hover:bg-white/10' }} px-4 py-2 rounded-xl transition-all active:scale-95 duration-300 group overflow-hidden">
                <span
                    class="material-symbols-outlined text-[1.6rem] align-middle {{ $active ? 'text-rose-600' : 'group-hover:text-white transition-colors' }}">
                    {{ $menu['icon'] }}
                </span>
                <span class="font-manrope text-[11px] font-bold uppercase tracking-wider
                            {{ $active ? 'ml-2 max-w-xs opacity-100 text-rose-600' : 'ml-0 max-w-0 opacity-0 group-hover:ml-2 group-hover:max-w-xs group-hover:opacity-100 text-white/90' }}
                            transition-all duration-300 whitespace-nowrap">
                    {{ $menu['label'] }}
                </span>
            </a>
        @endif
    @endforeach
</nav>