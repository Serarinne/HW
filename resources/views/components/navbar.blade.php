@php
    $navLinks = [
        ['name' => 'Home', 'route' => 'home', 'pattern' => 'home'],
        ['name' => 'Characters', 'route' => 'characters.index', 'pattern' => 'characters.*'],
        ['name' => 'Artists', 'route' => 'artists.index', 'pattern' => 'artists.*'],
        ['name' => 'Tags', 'route' => 'tags.index', 'pattern' => 'tags.*'],
        ['name' => 'Posts', 'route' => 'posts.index', 'pattern' => 'posts.*'],
    ];
@endphp

<nav class="sticky top-0 z-50 bg-slate-950/70 backdrop-blur-2xl border-b border-white/5 shadow-sm transition-all duration-300" x-data="{ open: false, userDropdownOpen: false }" aria-label="Main Navigation">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        
        <a href="{{ route('home') }}" class="flex items-center group outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950 rounded-sm" aria-label="{{ env('APP_NAME') }} Home">
            <img src="{{ env('STORAGE_URL') }}/assets/logo.png" alt="{{ env('APP_NAME') }} Logo" width="120" height="36" class="h-9 w-auto object-contain group-hover:drop-shadow-[0_0_15px_rgba(34,211,238,0.6)] transition-all duration-500">
        </a>

        <ul class="hidden lg:flex items-center gap-2 text-xs uppercase tracking-widest font-bold">
            @foreach($navLinks as $link)
                @php $isActive = request()->routeIs($link['pattern']); @endphp
                <li>
                    <a href="{{ route($link['route']) }}"
                       class="relative px-4 py-2.5 rounded-xl transition-all duration-300 flex items-center outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950 {{ $isActive ? 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/30 shadow-[0_0_15px_rgba(34,211,238,0.15)]' : 'text-slate-400 hover:text-cyan-300 hover:bg-white/5 border border-transparent' }}"
                       @if($isActive) aria-current="page" @endif>
                        <span>{{ $link['name'] }}</span>
                        @if($isActive)
                            <span class="absolute inset-0 rounded-xl shadow-[inset_0_0_10px_rgba(34,211,238,0.2)] pointer-events-none"></span>
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="hidden lg:flex relative items-center gap-4">
            @auth
                <button @click="userDropdownOpen = !userDropdownOpen" @keydown.escape="userDropdownOpen = false" class="group flex items-center gap-2.5 text-xs uppercase tracking-widest font-bold text-slate-300 hover:text-cyan-400 transition-all duration-300 px-4 py-2.5 rounded-xl bg-slate-900/50 border border-white/5 hover:border-cyan-500/40 hover:shadow-[0_0_20px_rgba(34,211,238,0.15)] outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950" :class="{ 'border-cyan-500/40 shadow-[0_0_20px_rgba(34,211,238,0.15)] text-cyan-400 bg-slate-900/80' : userDropdownOpen }" :aria-expanded="userDropdownOpen.toString()" aria-label="User menu" aria-haspopup="true">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Trailblazer</span>
                    <svg class="w-3.5 h-3.5 transition-transform duration-300" :class="{ '-rotate-180': userDropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div x-show="userDropdownOpen" @click.outside="userDropdownOpen = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95 translate-y-2" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95 translate-y-2" x-cloak class="absolute right-0 top-[calc(100%+0.5rem)] w-56 bg-slate-900/90 backdrop-blur-xl border border-white/10 rounded-[1.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.4)] overflow-hidden p-2" role="menu">
                    
                    <div class="flex flex-col gap-1" role="none">
                        <a href="{{ route('favorites.index') }}" role="menuitem" class="flex items-center gap-3 px-4 py-3 text-xs font-bold text-slate-300 hover:text-cyan-400 hover:bg-cyan-500/10 rounded-xl transition-all duration-200 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            Favorites
                        </a>
                        <a href="{{ route('settings.edit') }}" role="menuitem" class="flex items-center gap-3 px-4 py-3 text-xs font-bold text-slate-300 hover:text-cyan-400 hover:bg-cyan-500/10 rounded-xl transition-all duration-200 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            System Settings
                        </a>
                        
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.index') }}" role="menuitem" class="flex items-center gap-3 px-4 py-3 text-xs font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-500 hover:bg-cyan-500/10 rounded-xl transition-all duration-200 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                                <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                                Admin Terminal
                            </a>
                        @endif
                        
                        <div class="border-t border-white/5 my-1"></div>
                        
                        <form action="{{ route('logout') }}" method="POST" role="none">
                            @csrf
                            <button type="submit" role="menuitem" class="flex w-full items-center gap-3 px-4 py-3 text-xs font-bold text-rose-500 hover:text-rose-400 hover:bg-rose-500/10 rounded-xl transition-all duration-200 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-rose-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Disconnect
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="group flex items-center justify-center gap-2.5 px-6 py-2.5 text-xs uppercase tracking-widest font-black bg-gradient-to-r from-cyan-500 to-cyan-600 hover:from-cyan-400 hover:to-cyan-500 text-white rounded-xl transition-all duration-300 shadow-[0_0_20px_rgba(34,211,238,0.25)] hover:shadow-[0_0_30px_rgba(34,211,238,0.4)] hover:-translate-y-0.5 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                    Board Express
                </a>
            @endguest
        </div>

        <button @click="open = !open" class="lg:hidden text-slate-400 hover:text-cyan-400 p-2.5 bg-slate-900/50 border border-white/5 hover:border-cyan-500/30 rounded-xl transition-all duration-300 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950" :aria-expanded="open.toString()" aria-controls="mobile-menu" aria-label="Toggle mobile menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                <path x-show="open" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 6l12 12M18 6L6 18"></path>
            </svg>
        </button>
    </div>

    <div id="mobile-menu"
         x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         x-cloak 
         class="lg:hidden border-t border-white/5 bg-slate-950/95 backdrop-blur-2xl max-h-[85vh] overflow-y-auto shadow-2xl"
         style="scrollbar-width: thin; scrollbar-color: #06b6d4 #0f172a;"
         x-init="$watch('open', value => {
             if(value) {
                 $nextTick(() => {
                     const activeLink = document.querySelector('.mobile-menu-active');
                     if (activeLink) activeLink.scrollIntoView({ block: 'center', behavior: 'smooth' });
                 });
             }
         })">
        <div class="px-4 py-6 flex flex-col gap-2 text-sm font-bold uppercase tracking-widest">
            
            @foreach($navLinks as $link)
                @php $isActive = request()->routeIs($link['pattern']); @endphp
                <a href="{{ route($link['route']) }}" id="mobile-{{ Str::slug($link['name']) }}" class="px-4 py-3.5 rounded-xl transition-all flex items-center gap-3 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950 {{ $isActive ? 'text-cyan-400 bg-cyan-500/10 border-l-4 border-cyan-400 shadow-[inset_10px_0_20px_rgba(34,211,238,0.05)] mobile-menu-active' : 'text-slate-400 hover:text-cyan-300 hover:bg-white/5' }}" @if($isActive) aria-current="page" @endif>
                    <span>{{ $link['name'] }}</span>
                    @if($isActive)
                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 ml-auto shadow-[0_0_8px_rgba(34,211,238,0.8)]"></span>
                    @endif
                </a>
            @endforeach

            @auth
                <div class="border-t border-white/5 my-3 pt-3"></div>
                <a href="{{ route('favorites.index') }}" class="text-slate-400 hover:text-cyan-400 hover:bg-white/5 px-4 py-3.5 rounded-xl transition-colors flex items-center gap-3 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    Favorites
                </a>
                <a href="{{ route('settings.edit') }}" class="text-slate-400 hover:text-cyan-400 hover:bg-white/5 px-4 py-3.5 rounded-xl transition-colors flex items-center gap-3 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    System Settings
                </a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.index') }}" class="text-cyan-400 hover:text-cyan-300 hover:bg-cyan-500/10 px-4 py-3.5 rounded-xl transition-colors flex items-center gap-3 font-black outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                        Admin Terminal
                    </a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="pt-2 mt-2">
                    @csrf
                    <button type="submit" class="w-full text-center rounded-xl bg-rose-500/10 hover:bg-rose-500/20 text-rose-500 hover:text-rose-400 border border-rose-500/20 font-black py-3.5 flex items-center justify-center gap-3 transition-colors outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-rose-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Disconnect
                    </button>
                </form>
            @endauth

            @guest
                <div class="border-t border-white/5 my-3 pt-3"></div>
                <a href="{{ route('login') }}" class="w-full text-center rounded-xl bg-gradient-to-r from-cyan-500 to-cyan-600 hover:from-cyan-400 hover:to-cyan-500 text-white font-black py-3.5 flex items-center justify-center gap-3 transition-colors shadow-[0_0_20px_rgba(34,211,238,0.25)] outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                    Board Express
                </a>
            @endguest
        </div>
    </div>
</nav>