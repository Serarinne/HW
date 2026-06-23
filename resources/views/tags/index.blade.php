<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>{{ !empty($query) ? 'Search Tags: ' . $query : 'Browse Honkai: Star Rail Wallpaper Tags' }} - {{ env('APP_NAME') }}</title>
    <meta name="description" content="{{ !empty($query) ? 'Search results for ' . $query . ' wallpaper categories on '.env('APP_NAME') : 'Explore thousands of Honkai: Star Rail tags to find the perfect Path, Faction, and character background wallpapers.' }}" />
    
    @if(!empty($query))
    <meta name="robots" content="noindex, follow" />
    @else
    <meta name="robots" content="index, follow, max-image-preview:large" />
    @endif
    
    <link rel="canonical" href="{{ !empty($query) ? route('tags.index', ['q' => $query]) : route('tags.index') }}" />

    <meta property="og:title" content="Browse Honkai: Star Rail Wallpaper Tags | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Explore thousands of Honkai: Star Rail tags to find the perfect Path, Faction, and character background wallpapers." />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "CollectionPage",
      "name": "{{ env('APP_NAME') }} HSR Wallpaper Tags",
      "description": "Directory of Honkai: Star Rail wallpaper categories and tags.",
      "url": "{{ route('tags.index') }}"
    }
    </script>

    <x-assets />
  </head>
  
  <body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white antialiased overflow-x-hidden [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-600">
    <x-navbar />

    <main class="flex-grow relative w-full text-slate-300">
        <section class="relative z-10 border-b border-white/5 bg-slate-950/50 backdrop-blur-md min-h-[350px] flex flex-col justify-center">
            <div class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 text-center flex flex-col items-center justify-center">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight mb-6">
                    Explore HSR <br class="hidden sm:block"/>
                    & <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-400 drop-shadow-lg">Aesthetic Tags</span>
                </h1>
                <p class="text-base sm:text-lg text-slate-400 font-medium leading-relaxed max-w-2xl mx-auto mb-10">
                    Discover <span class="text-white font-bold">{{ number_format($tags->total()) }}</span> tags to find exactly the Honkai: Star Rail characters, Paths, Factions, and aesthetics you're looking for.
                </p>

                <form action="{{ route('tags.index') }}" method="GET" class="w-full max-w-2xl mx-auto group" role="search">
                    <div class="flex items-center rounded-full bg-slate-900/80 backdrop-blur-xl overflow-hidden shadow-xl transition-all duration-300 ring-1 ring-white/10 focus-within:ring-2 focus-within:ring-cyan-500/50 focus-within:shadow-[0_0_30px_rgba(168,85,247,0.15)]">
                        <div class="pl-6 text-slate-400 group-focus-within:text-cyan-400 transition-colors" aria-hidden="true">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-5.2-5.2M10.8 18a7.2 7.2 0 1 1 0-14.4 7.2 7.2 0 0 1 0 14.4z"></path>
                            </svg>
                        </div>
                        <input type="text" name="q" value="{{ $query }}" aria-label="Search tags by name or description" placeholder="Search tags (e.g. Nihility, Stellaron Hunters)..." class="w-full bg-transparent px-4 py-4 sm:py-5 text-base sm:text-lg text-white font-medium placeholder:text-slate-400 outline-none" autocomplete="off" />
                        <button type="submit" class="m-1.5 sm:m-2 rounded-full bg-gradient-to-r from-cyan-500 to-cyan-500 hover:from-cyan-400 hover:to-cyan-400 text-white font-bold px-6 sm:px-8 py-2.5 sm:py-3 shadow-[0_0_15px_rgba(34,211,238,0.2)] hover:shadow-[0_0_25px_rgba(34,211,238,0.4)] transition-all outline-none whitespace-nowrap focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <div class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 mt-8 empty:hidden flex justify-center items-center">
            <x-ads />
        </div>

        <section class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 relative z-10">
            <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-8 gap-4 border-b border-white/10 pb-4">
                <div class="space-y-2">
                    <p class="text-xs font-bold uppercase tracking-widest text-cyan-400 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-cyan-500 animate-pulse shadow-[0_0_8px_rgba(168,85,247,0.8)]"></span> 
                        Data Bank Tags
                    </p>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">
                        @if($query)
                            Results for <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-400">"{{ $query }}"</span>
                        @else
                            All <span class="text-slate-400 font-medium">Tags</span>
                        @endif
                    </h2>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 sm:gap-6 mb-12">
                @forelse($tags as $tag)
                    @php
                        $firstLetter = strtoupper(substr($tag->name, 0, 1));
                        $hasImage = !empty($tag->image);
                    @endphp

                    <a href="{{ route('tags.show', ['slug' => $tag->slug]) }}"
                       class="group relative rounded-2xl overflow-hidden bg-slate-900 aspect-square shadow-lg ring-1 ring-white/10 hover:ring-cyan-500/50 hover:shadow-[0_0_25px_rgba(168,85,247,0.2)] transform hover:-translate-y-1.5 transition-all duration-300 block focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                        
                        <div class="w-full h-full relative {{ !$hasImage ? 'flex justify-center items-center p-6' : '' }}">
                            @if($hasImage)
                                <picture class="w-full h-full block">
                                    <source srcset="{{ $tag->image['webp'] }}" type="image/webp" >
                                    <img src="{{ $tag->image['jpg'] }}" 
                                         alt="{{ $tag->name }} HSR Wallpaper Category" 
                                         loading="lazy" width="400" height="400" 
                                         class="w-full h-full object-cover bg-slate-800 group-hover:scale-110 transition-transform duration-700 ease-out" />
                                </picture>
                            @else
                                <div class="w-24 h-24 bg-slate-800 rounded-full flex items-center justify-center text-slate-400 font-black text-4xl uppercase ring-1 ring-white/5 group-hover:bg-cyan-500/20 group-hover:text-cyan-400 group-hover:ring-cyan-500/50 transition-all duration-300">
                                    {{ $firstLetter }}
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                            
                            <div class="absolute inset-x-0 bottom-0 p-4 translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                <h3 class="text-white font-bold text-sm sm:text-base line-clamp-1 drop-shadow-md group-hover:text-cyan-400 transition-colors flex items-center gap-1.5">
                                    <span class="text-cyan-500 opacity-80 group-hover:opacity-100 transition-opacity">#</span>{{ $tag->name }}
                                </h3>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full flex flex-col items-center justify-center py-20 px-4 text-center bg-slate-900/50 border border-dashed border-slate-700/50 rounded-3xl backdrop-blur-sm w-full max-w-3xl mx-auto">
                        <div class="w-20 h-20 mb-6 rounded-full bg-slate-800/80 flex items-center justify-center ring-1 ring-white/5">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white mb-3">No Tags Found</h2>
                        <p class="text-base text-slate-400 max-w-md mx-auto leading-relaxed">
                            {{ $query ? 'We couldn\'t find any tags matching "' . $query . '".' : 'There are no tags available in the Data Bank yet. Please check back later!' }}
                        </p>
                        @if($query)
                            <a href="{{ route('tags.index') }}" class="mt-8 px-8 py-3 bg-slate-800 hover:bg-slate-700 text-white font-semibold rounded-full transition-colors ring-1 ring-white/10 hover:ring-white/20 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                                Clear search
                            </a>
                        @endif
                    </div>
                @endforelse
            </div>

            @if($tags->hasPages())
              <div class="mt-12">
                  {{ $tags->withQueryString()->links('components.pagination') }}
              </div>
            @endif

        </section>
    </main>

    <x-footer />
  </body>
</html>