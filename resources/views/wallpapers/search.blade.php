<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>{{ !empty($query) ? 'HD & 4K ' . ucwords($query) . ' Honkai: Star Rail Wallpapers' : 'Search Honkai: Star Rail Wallpapers' }} - {{ env('APP_NAME') }}</title>
    <meta name="description" content="{{ !empty($query) ? 'Download high-quality ' . $query . ' Honkai: Star Rail wallpapers, character backgrounds, and fanart in HD and 4K.' : 'Search thousands of high-quality Honkai: Star Rail character and faction wallpapers on '.env('APP_NAME').' for desktop and mobile.' }}" />
    
    @if(!empty($query))
    <meta name="robots" content="noindex, follow, max-image-preview:large" />
    @else
    <meta name="robots" content="index, follow, max-image-preview:large" />
    @endif
    
    <link rel="canonical" href="{{ !empty($query) ? route('wallpapers.search', ['q' => $query]) : route('wallpapers.search') }}" />

    <meta property="og:title" content="{{ !empty($query) ? ucwords($query) . ' Honkai: Star Rail Wallpapers' : 'Search Honkai: Star Rail Wallpapers' }} | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="{{ !empty($query) ? 'Explore the best ' . $query . ' Honkai: Star Rail wallpapers in HD and 4K resolution.' : 'Search our massive collection of Honkai: Star Rail character wallpapers.' }}" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{{ url('/') }}"
        },
        {
          "@@type": "ListItem",
          "position": 2,
          "name": "Search",
          "item": "{{ route('wallpapers.search') }}"
        }
        @if(!empty($query))
        ,{
          "@@type": "ListItem",
          "position": 3,
          "name": "{{ ucwords($query) }}"
        }
        @endif
      ]
    }
    </script>

    <x-assets />
  </head>
  
  <body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white antialiased overflow-x-hidden [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-600">
    <x-navbar />

    <main class="flex-grow pt-8 pb-32 relative text-slate-300">
        <section class="relative z-10 border-b border-white/5 bg-slate-950/30 backdrop-blur-sm">
            <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 text-center relative">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight mb-8">
                    Find Your Perfect <br class="hidden sm:block"/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-500 drop-shadow-lg">Honkai: Star Rail</span> Wallpaper
                </h1>

                <form action="{{ route('wallpapers.search') }}" method="GET" class="max-w-4xl mx-auto group" role="search">
                    <div class="flex items-center rounded-full border border-white/10 bg-slate-900/60 backdrop-blur-xl overflow-hidden shadow-2xl transition-all duration-300 focus-within:border-cyan-500/50 focus-within:shadow-[0_0_30px_rgba(34,211,238,0.2)] focus-within:bg-slate-900/80">
                        <div class="pl-6 text-slate-400 group-focus-within:text-cyan-400 transition-colors" aria-hidden="true">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-5.2-5.2M10.8 18a7.2 7.2 0 1 1 0-14.4 7.2 7.2 0 0 1 0 14.4z"></path>
                            </svg>
                        </div>
                        <input type="text" name="q" value="{{ request('q') }}" aria-label="Search by character, path, or keyword" placeholder="Search by character (e.g. Acheron), path, or keywords..." class="w-full bg-transparent px-5 py-5 text-base sm:text-lg text-white font-medium placeholder:text-slate-400 outline-none" autocomplete="off" />
                        <button type="submit" class="m-2 rounded-full bg-gradient-to-r from-cyan-500 to-cyan-500 hover:from-cyan-400 hover:to-cyan-400 text-white font-black px-6 sm:px-10 py-3.5 shadow-[0_0_15px_rgba(34,211,238,0.2)] hover:shadow-[0_0_25px_rgba(34,211,238,0.4)] transition-all outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            Search
                        </button>
                    </div>
                </form>

                @if(empty($query))
                    <div class="mt-8 flex flex-wrap justify-center items-center gap-3">
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest mr-1">Trending:</span>
                        <a href="{{ route('wallpapers.search', ['q' => 'acheron']) }}" class="text-xs font-bold px-4 py-2 rounded-xl bg-slate-900/50 border border-white/5 text-slate-300 hover:text-cyan-300 hover:border-cyan-500/30 hover:bg-cyan-500/10 hover:shadow-[0_0_15px_rgba(34,211,238,0.15)] transition-all backdrop-blur-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">Acheron</a>
                        <a href="{{ route('wallpapers.search', ['q' => 'firefly']) }}" class="text-xs font-bold px-4 py-2 rounded-xl bg-slate-900/50 border border-white/5 text-slate-300 hover:text-cyan-300 hover:border-cyan-500/30 hover:bg-cyan-500/10 hover:shadow-[0_0_15px_rgba(34,211,238,0.15)] transition-all backdrop-blur-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">Firefly</a>
                        <a href="{{ route('wallpapers.search', ['q' => 'kafka']) }}" class="text-xs font-bold px-4 py-2 rounded-xl bg-slate-900/50 border border-white/5 text-slate-300 hover:text-cyan-300 hover:border-cyan-500/30 hover:bg-cyan-500/10 hover:shadow-[0_0_15px_rgba(34,211,238,0.15)] transition-all backdrop-blur-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">Kafka</a>
                    </div>
                @endif
            </div>
        </section>

        <div class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 mt-10 mb-2 empty:hidden flex justify-center items-center relative z-10 min-h-[90px]">
            <x-ads />
        </div>

        <section class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 py-8 relative z-10">
            @if(empty($query))
                <div class="flex flex-col items-center justify-center py-24 px-4 text-center bg-slate-900/50 border border-dashed border-slate-700/50 rounded-3xl backdrop-blur-md shadow-inner max-w-4xl mx-auto mt-4 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity blur-3xl pointer-events-none"></div>
                    <div class="w-24 h-24 mb-6 rounded-full bg-slate-800/80 flex items-center justify-center shadow-inner border border-white/5 relative z-10 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-12 h-12 text-slate-400 group-hover:text-cyan-400 transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-black text-white mb-3 relative z-10">Ready to board the Astral Express?</h2>
                    <p class="text-slate-400 max-w-md relative z-10 font-medium leading-relaxed">Type your favorite HSR character, faction, or keyword in the search bar above to discover stunning wallpapers.</p>
                </div>
            @else
                <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-8 border-b border-white/10 pb-4 gap-4">
                    <div class="space-y-2">
                        <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
                            Results for <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-500 drop-shadow-sm">"{{ $query }}"</span>
                        </h2>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-2 flex items-center gap-2">
                            @if(isset($wallpapers) && $wallpapers->total() > 0)
                                Found <span class="text-cyan-400 bg-cyan-500/10 px-2 py-1 rounded-md">{{ $wallpapers->total() }}</span> records in the Data Bank
                            @else
                                No records found in the Data Bank
                            @endif
                        </p>
                    </div>
                </div>

                @if(isset($wallpapers) && $wallpapers->count() > 0)
                    <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-4 sm:gap-6 space-y-4 sm:space-y-6">
                        @foreach($wallpapers as $wallpaper)
                            <div class="break-inside-avoid">
                                <x-wallpaper-card :wallpaper="$wallpaper" />
                            </div>
                        @endforeach
                    </div>

                    @if($wallpapers->hasPages())
                      <div class="mt-12">
                          {{-- Menyisipkan withQueryString() agar ?q=.. tidak hilang saat next page --}}
                          {{ $wallpapers->withQueryString()->links('components.pagination') }}
                      </div>
                    @endif
                @else
                    <div class="flex flex-col items-center justify-center py-20 px-4 text-center bg-slate-900/50 border border-dashed border-slate-700/50 rounded-3xl backdrop-blur-sm max-w-3xl mx-auto mt-4">
                        <div class="w-20 h-20 mb-6 rounded-full bg-slate-800/80 flex items-center justify-center ring-1 ring-white/5">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-10-4l4.586-4.586a2 2 0 012.828 0L16 6"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-black text-white mb-3">No Records Found</h2>
                        <p class="text-base text-slate-400 max-w-md mx-auto leading-relaxed">
                            We couldn't find any HSR wallpapers matching <span class="text-white font-bold">"{{ $query }}"</span>.<br>
                            Try checking for typos or using different character names.
                        </p>
                    </div>
                @endif
            @endif
        </section>
        
    </main>

    <x-footer />
  </body>
</html>