<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>{{ env('APP_NAME') }} | Honkai: Star Rail Wallpapers HD & 4K</title>
    <meta name="description" content="Download thousands of high-quality Honkai: Star Rail wallpapers, character backgrounds, and game fanart in HD and 4K for desktop and mobile." />
    <meta name="robots" content="index, follow, max-image-preview:large" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <meta property="og:title" content="{{ env('APP_NAME') }} | Honkai: Star Rail Wallpapers HD & 4K" />
    <meta property="og:description" content="Download thousands of high-quality Honkai: Star Rail wallpapers, character backgrounds, and game fanart in HD and 4K for desktop and mobile." />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebSite",
      "name": "{{ env('APP_NAME') }}",
      "url": "{{ url('/') }}",
      "potentialAction": {
        "@@type": "SearchAction",
        "target": {
          "@@type": "EntryPoint",
          "urlTemplate": "{{ route('wallpapers.search') }}?q={search_term_string}"
        },
        "query-input": "required name=search_term_string"
      }
    }
    </script>

    <x-assets />
  </head>
  
  <body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-indigo-500 selection:text-white antialiased overflow-x-hidden [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-600">
    <x-navbar />

    <main class="flex-grow relative w-full text-slate-300">
        <!-- Hero Section -->
        <section class="relative z-10 border-b border-white/5 bg-slate-950/50 backdrop-blur-md min-h-[400px] flex flex-col justify-center">
            <div class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28 text-center flex flex-col items-center justify-center">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight mb-6">
                    Discover Stunning <br class="hidden sm:block"/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-fuchsia-400 drop-shadow-lg">Honkai: Star Rail</span> Wallpapers
                </h1>
                <p class="text-base sm:text-lg text-slate-400 font-medium leading-relaxed max-w-2xl mx-auto mb-10">
                    Welcome to {{ env('APP_NAME') }}. Search thousands of high-quality HD and 4K character wallpapers, faction backgrounds, and fanart for desktop and mobile.
                </p>

                <!-- Search Form -->
                <form action="{{ route('wallpapers.search') }}" method="GET" class="w-full max-w-2xl mx-auto group" role="search">
                    <div class="flex items-center rounded-full bg-slate-900/80 backdrop-blur-xl overflow-hidden shadow-xl transition-all duration-300 ring-1 ring-white/10 focus-within:ring-2 focus-within:ring-indigo-500/50 focus-within:shadow-[0_0_30px_rgba(99,102,241,0.15)]">
                        <div class="pl-6 text-slate-400 group-focus-within:text-indigo-400 transition-colors" aria-hidden="true">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-5.2-5.2M10.8 18a7.2 7.2 0 1 1 0-14.4 7.2 7.2 0 0 1 0 14.4z"></path>
                            </svg>
                        </div>
                        <input type="text" name="q" required aria-label="Search character, path, or artist" placeholder="Search Kafka, Jingliu, or other characters..." class="w-full bg-transparent px-4 py-4 sm:py-5 text-base sm:text-lg text-white font-medium placeholder:text-slate-400 outline-none" value="{{ request('q') }}" autocomplete="off" />
                        <button type="submit" class="m-1.5 sm:m-2 rounded-full bg-gradient-to-r from-indigo-500 to-fuchsia-500 hover:from-indigo-400 hover:to-fuchsia-400 text-white font-bold px-6 sm:px-8 py-2.5 sm:py-3 shadow-[0_0_15px_rgba(99,102,241,0.2)] hover:shadow-[0_0_25px_rgba(99,102,241,0.4)] transition-all outline-none whitespace-nowrap focus-visible:ring-2 focus-visible:ring-indigo-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Popular Wallpapers Section -->
        @if($popularWallpapers->isNotEmpty())
            <section class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 relative z-10">
                <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-8 gap-4 border-b border-white/10 pb-4">
                    <div class="space-y-2">
                        <p class="text-xs font-bold uppercase tracking-widest text-amber-500 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path></svg>
                            Curated this week
                        </p>
                        <h2 class="text-2xl sm:text-3xl font-black text-white">
                            Trending <span class="text-slate-400 font-medium">Trailblazers</span>
                        </h2>
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 sm:gap-6">
                    @foreach($popularWallpapers as $wallpaper)
                        <a href="{{ route('wallpapers.show', ['slug' => $wallpaper->slug]) }}" class="group relative rounded-2xl overflow-hidden bg-slate-900 aspect-[2/3] shadow-lg ring-1 ring-white/10 hover:ring-indigo-500/50 hover:shadow-[0_0_25px_rgba(99,102,241,0.2)] transform hover:-translate-y-1.5 transition-all duration-300 block focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                            <picture class="w-full h-full block">
                                <source srcset="{{ $wallpaper->thumbnail['webp'] }}" type="image/webp" >
                                <img src="{{ $wallpaper->thumbnail['jpg'] }}" 
                                     alt="Preview of {{ $wallpaper->seo_title }} HSR Wallpaper" 
                                     @if($loop->index < 4) fetchpriority="high" @else loading="lazy" @endif
                                     width="400" height="600" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out bg-slate-800" />
                            </picture>
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                            
                            <div class="absolute inset-x-0 bottom-0 p-4 translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                <h3 class="text-sm font-bold text-white truncate drop-shadow-md">
                                    {{ \Illuminate\Support\Str::limit($wallpaper->seo_title ?? $wallpaper->slug, 28) }}
                                </h3>
                                <p class="text-xs font-bold text-indigo-400 mt-1.5 flex items-center gap-1.5 uppercase tracking-wider">
                                    <svg class="w-3.5 h-3.5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                                    {{ number_format($wallpaper->favorites_count) }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

        <div class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 my-4 empty:hidden flex justify-center items-center">
            <x-ads />
        </div>

        <!-- Latest Wallpapers Section -->
        <section id="latest" class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 relative z-10">
            <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-8 gap-4 border-b border-white/10 pb-4">
                <div class="space-y-2">
                    <p class="text-xs font-bold uppercase tracking-widest text-indigo-400 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-indigo-500 animate-pulse shadow-[0_0_8px_rgba(99,102,241,0.8)]"></span> 
                        Astral Express Updates
                    </p>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">
                        Newest <span class="text-slate-400 font-medium">Arrivals</span>
                    </h2>
                </div>
            </div>

            @if($wallpapers->count() > 0)
                <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-4 sm:gap-6 space-y-4 sm:space-y-6">
                    @foreach($wallpapers as $wallpaper)
                        <div class="break-inside-avoid">
                            <!-- Ensure the component x-wallpaper-card also has relevant HSR alt text inside -->
                            <x-wallpaper-card :wallpaper="$wallpaper" />
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col-span-full flex flex-col items-center justify-center py-20 px-4 text-center bg-slate-900/50 border border-dashed border-slate-700/50 rounded-3xl backdrop-blur-sm w-full max-w-3xl mx-auto">
                    <div class="w-20 h-20 mb-6 rounded-full bg-slate-800/80 flex items-center justify-center ring-1 ring-white/5">
                        <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white mb-3">No Data Found in the Data Bank</h2>
                    <p class="text-base text-slate-400 max-w-md mx-auto leading-relaxed">
                        {{ request('q') ? 'We couldn\'t find any records matching "' . request('q') . '" in the Herta Space Station.' : 'No new wallpapers are currently available on the Astral Express. Please check back later!' }}
                    </p>
                    @if(request('q'))
                        <a href="{{ route('wallpapers.index') }}" class="mt-8 px-8 py-3 bg-slate-800 hover:bg-slate-700 text-white font-semibold rounded-full transition-colors ring-1 ring-white/10 hover:ring-white/20 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            Clear search
                        </a>
                    @endif
                </div>
            @endif

            @if($wallpapers->hasPages())
              <div class="mt-12">
                  {{ $wallpapers->withQueryString()->links('components.pagination') }}
              </div>
            @endif
        </section>
    </main>

    <x-footer />
  </body>
</html>