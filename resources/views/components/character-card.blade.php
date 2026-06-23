@php
    $firstSeries = $character->series->first();
    $seriesSlug = $firstSeries?->slug ?? 'unknown';
    $seriesName = $firstSeries?->name ?? '';
    
    $firstLetter = Str::upper(Str::substr($character->name, 0, 1));
    $hasImage = !empty($character->image);
@endphp

<a href="{{ route('characters.show', ['character' => $character->slug]) }}" 
   class="break-inside-avoid block group relative rounded-2xl overflow-hidden border border-white/10 bg-slate-900/50 backdrop-blur-sm shadow-lg hover:shadow-[0_0_25px_rgba(34,211,238,0.2)] hover:border-cyan-500/40 transform hover:-translate-y-1 transition-all duration-300 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900" 
   title="{{ $character->name }} ({{ $seriesName }})" 
   aria-label="{{ $character->name }} ({{ $seriesName }})" 
   itemscope itemtype="https://schema.org/Person">

    <meta itemprop="url" content="{{ route('characters.show', ['character' => $character->slug]) }}">

    <div class="aspect-square overflow-hidden relative z-10 {{ !$hasImage ? 'flex justify-center items-center p-6' : '' }}">
        @if($hasImage)
            <picture class="w-full h-full block group-hover:scale-110 transition-transform duration-700 ease-out transform-gpu">
                <source srcset="{{ $character->image['webp'] }}" type="image/webp">
                <img itemprop="image" src="{{ $character->image['jpg'] }}" alt="{{ $character->name }} ({{ $seriesName }})" loading="lazy" decoding="async" width="400" height="400" class="w-full h-full object-cover" />
            </picture>
        @else
            <div class="w-20 h-20 bg-cyan-500/10 border border-cyan-500/30 rounded-2xl flex items-center justify-center text-cyan-400 font-black text-4xl uppercase shadow-[inset_0_0_20px_rgba(34,211,238,0.1)] group-hover:shadow-[inset_0_0_30px_rgba(34,211,238,0.3)] group-hover:bg-cyan-500/20 transition-all duration-500" aria-hidden="true">
                {{ $firstLetter }}
            </div>
        @endif
    </div>

    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent pointer-events-none z-20"></div>

    <div class="absolute inset-x-0 bottom-0 p-5 pointer-events-none z-30 flex flex-col justify-end">
        <h3 class="text-white font-black text-base sm:text-lg leading-tight line-clamp-1 group-hover:text-cyan-400 transition-colors duration-300 drop-shadow-md" itemprop="name">
            {{ $character->name }}
        </h3>
        
        @if($seriesName)
            <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mt-1.5 line-clamp-1 group-hover:text-cyan-300 transition-colors duration-300" itemprop="memberOf">
                {{ $seriesName }}
            </p>
        @endif
    </div>

    <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 -translate-y-2 group-hover:translate-y-0 z-30 pointer-events-none">
        <span class="flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-cyan-400 bg-slate-900/80 backdrop-blur-md px-2.5 py-1.5 rounded-full border border-cyan-500/40 shadow-[0_0_15px_rgba(34,211,238,0.3)]">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
            </svg>
            Profile
        </span>
    </div>
</a>