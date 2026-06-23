<a href="{{ route('wallpapers.show', $wallpaper->slug) }}" 
   class="break-inside-avoid block group relative rounded-2xl overflow-hidden border border-white/10 bg-slate-900/50 backdrop-blur-sm shadow-lg hover:shadow-[0_0_25px_rgba(34,211,238,0.2)] hover:border-cyan-500/40 transform hover:-translate-y-1 transition-all duration-300 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900" 
   title="Download {{ $wallpaper->seo_title }}" 
   aria-label="{{ $wallpaper->seo_title }}" 
   itemscope itemtype="https://schema.org/ImageObject">
   
    <meta itemprop="url" content="{{ route('wallpapers.show', $wallpaper->slug) }}">
    <meta itemprop="name" content="{{ $wallpaper->seo_title }}">
    @if($wallpaper->is_video)
        <meta itemprop="encodingFormat" content="video/mp4">
    @endif
    
    <div class="relative z-10 overflow-hidden bg-slate-900/50">
        <picture class="w-full h-auto block group-hover:scale-110 transition-transform duration-700 ease-out transform-gpu">
            <source srcset="{{ $wallpaper->thumbnail['webp'] }}" type="image/webp">
            <img itemprop="thumbnailUrl" src="{{ $wallpaper->thumbnail['jpg'] }}" alt="{{ $wallpaper->seo_title }}" loading="lazy" decoding="async" width="300" height="{{ $wallpaper->width > 0 ? round(($wallpaper->height / $wallpaper->width) * 300) : 300 }}" class="w-full h-auto object-cover" alt="{{ $wallpaper->seo_title }}">
        </picture>
    </div>

    @if($wallpaper->is_video)
        <div class="absolute top-4 left-4 pointer-events-none z-30">
            <div class="relative group-hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-cyan-400/30 blur-md rounded-full animate-pulse"></div>
                <div class="relative bg-slate-900/80 backdrop-blur-md border border-cyan-500/40 text-cyan-400 text-xs font-black uppercase tracking-widest px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-[0_0_15px_rgba(34,211,238,0.2)]">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                    <span>Live</span>
                </div>
            </div>
        </div>
    @endif

    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none z-20"></div>
    
    <div class="absolute inset-x-0 bottom-0 p-5 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-2 group-hover:translate-y-0 pointer-events-none z-30 flex flex-col justify-end">
        <div class="flex items-center justify-between w-full">
            <span class="flex items-center gap-1.5 text-xs font-bold uppercase tracking-widest text-slate-300 drop-shadow-md">
                <svg class="w-3.5 h-3.5 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                {{ Number::abbreviate($wallpaper->views_count ?? 0) }} Views
            </span>
            
            <span class="flex items-center gap-1.5 text-xs font-black uppercase tracking-widest text-cyan-400 drop-shadow-[0_0_8px_rgba(34,211,238,0.8)]">
                Access Data
                <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </span>
        </div>
    </div>
</a>