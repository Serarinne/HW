<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>{{ $character->seo_title ?? $character->name . ' (' . $character->series->first()->name . ') HSR Wallpapers HD & 4K' }} - {{ env('APP_NAME') }}</title>
    <meta name="description" content="{{ $character->seo_description ?? 'Download the best ' . $character->name . ' wallpapers from ' . $character->series->first()->name . '. Personalize your device with HD and 4K Honkai: Star Rail backgrounds featuring this character.' }}" />
    
    @if(!empty($character->seo_keywords))
    <meta name="keywords" content="{{ $character->seo_keywords }}" />
    @endif

    @if($wallpapers->isEmpty())
    <meta name="robots" content="noindex, follow" />
    @else
    <meta name="robots" content="index, follow, max-image-preview:large" />
    @endif
    
    <link rel="canonical" href="{{ url()->current() }}" />

    <meta property="og:title" content="{{ $character->name }} HSR Wallpapers | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="{{ $character->seo_description ?? 'Explore our stunning collection of ' . $character->name . ' wallpapers from ' . $character->series->first()->name . ' in HD and 4K resolution.' }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    @if(!empty($character->image))
    <meta property="og:image" content="{{ $character->image['jpg'] ?? $character->image['webp'] }}" />
    @endif

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{{ route('home') }}"
        },
        {
          "@@type": "ListItem",
          "position": 2,
          "name": "Characters",
          "item": "{{ route('characters.index') }}"
        },
        {
          "@@type": "ListItem",
          "position": 3,
          "name": "{{ $character->name }}"
        }
      ]
    }
    </script>

    <x-assets />
    
  </head>
  
  <body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white antialiased overflow-x-hidden [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-600">
    <x-navbar />

    <main class="flex-grow relative w-full text-slate-300 pt-8 pb-32">
        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="mb-8 flex flex-wrap items-center gap-2 text-xs font-bold text-slate-300 uppercase tracking-widest backdrop-blur-md bg-slate-900/80 w-fit px-5 py-2.5 rounded-full border border-white/10 shadow-sm">
                <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">Home</a>
                <span class="text-slate-600">&bull;</span>
                <a href="{{ route('characters.index') }}" class="hover:text-cyan-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">Characters</a>
                <span class="text-slate-600">&bull;</span>
                <span class="text-cyan-400 truncate max-w-[120px] sm:max-w-[200px]">{{ $character->name }}</span>
            </div>

            <section class="mb-12 sm:mb-16" x-data="{ descriptionOpen: false }">
                <div class="flex flex-col md:flex-row gap-8 lg:gap-12 items-center md:items-start bg-slate-900/50 backdrop-blur-md border border-white/10 p-6 sm:p-10 rounded-3xl shadow-2xl relative overflow-hidden group">
                    
                    <div class="absolute -right-24 -top-24 w-64 h-64 bg-cyan-500/10 rounded-full blur-[80px] pointer-events-none group-hover:bg-cyan-500/20 transition-all duration-700"></div>

                    @php
                        $firstLetter = strtoupper(substr($character->name, 0, 1));
                        $hasImage = !empty($character->image);
                    @endphp

                    <div class="flex-shrink-0 relative z-10">
                        <div class="relative w-40 h-40 sm:w-48 sm:h-48 md:w-56 md:h-56 lg:w-64 lg:h-64 rounded-full overflow-hidden bg-slate-950 border-4 border-slate-900 shadow-[0_0_30px_rgba(168,85,247,0.2)] group-hover:shadow-[0_0_40px_rgba(34,211,238,0.3)] transition-all duration-500 ring-2 ring-white/10 group-hover:ring-cyan-500/50 {{ !$hasImage ? 'flex justify-center items-center' : '' }}">
                            @if($hasImage)
                                <picture class="absolute inset-0 w-full h-full block group-hover:scale-110 transition-transform duration-700 ease-out">
                                    <source srcset="{{ $character->image['webp'] }}" type="image/webp" >
                                    <img src="{{ $character->image['jpg'] }}" alt="{{ $character->name }} from {{ $character->series->first()->name }} HSR Wallpapers" loading="eager" width="400" height="400" class="absolute inset-0 w-full h-full object-cover bg-slate-800" />
                                </picture>
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            @else
                                <div class="z-10 w-full h-full bg-gradient-to-br from-slate-800 to-slate-900 rounded-full flex items-center justify-center text-slate-400 font-black text-6xl uppercase shadow-lg border border-white/5">
                                    {{ $firstLetter }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex-grow w-full text-center md:text-left relative z-10 flex flex-col justify-center">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white mb-4 tracking-tight drop-shadow-md">
                            {{ $character->name }}
                        </h1>

                        @if(!empty($character->description))
                            <div class="text-slate-400 text-sm lg:text-base max-w-3xl relative font-medium leading-relaxed bg-slate-950/50 p-5 rounded-2xl border border-white/5 shadow-inner">
                                <div id="character-description" :class="descriptionOpen ? '' : 'line-clamp-3 lg:line-clamp-4'" class="transition-all duration-300">
                                    {!! nl2br(e($character->description)) !!}
                                </div>
                                
                                <div class="flex justify-center md:justify-start mt-4">
                                    <button @click="descriptionOpen = !descriptionOpen" 
                                            :aria-expanded="descriptionOpen.toString()"
                                            aria-controls="character-description"
                                            class="inline-flex items-center gap-2 text-cyan-400 hover:text-cyan-300 font-bold text-xs uppercase tracking-widest transition-all duration-300 px-4 py-2 rounded-xl hover:bg-cyan-500/10 border border-transparent hover:border-cyan-500/30 outline-none cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                                        <span x-show="!descriptionOpen">Read More</span>
                                        <span x-show="descriptionOpen" x-cloak>Read Less</span>
                                        <svg class="w-4 h-4 transform transition-transform duration-300" :class="descriptionOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>

            <div class="w-full mb-12 empty:hidden flex justify-center items-center">
                <x-ads />
            </div>

            <section>
                <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-8 gap-4 border-b border-white/10 pb-4">
                    <div class="space-y-2">
                        <p class="text-xs font-bold uppercase tracking-widest text-cyan-400 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-cyan-500 animate-pulse shadow-[0_0_8px_rgba(168,85,247,0.8)]"></span> 
                            HSR Gallery
                        </p>
                        <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-400">{{ $character->name }}</span> Wallpapers
                        </h2>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-2 flex items-center gap-2">
                            Found <span class="text-cyan-400 bg-cyan-500/10 px-2 py-1 rounded-md">{{ $wallpapers->total() }}</span> images
                        </p>
                    </div>
                </div>

                @if($wallpapers->count() > 0)
                    <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-4 sm:gap-6 space-y-4 sm:space-y-6">
                        @foreach($wallpapers as $wallpaper)
                            <div class="break-inside-avoid">
                                <x-wallpaper-card :wallpaper="$wallpaper" />
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-20 px-4 text-center bg-slate-900/50 border border-dashed border-slate-700/50 rounded-3xl backdrop-blur-sm w-full max-w-3xl mx-auto">
                        <div class="w-20 h-20 mb-6 rounded-full bg-slate-800/80 flex items-center justify-center ring-1 ring-white/5">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3">No Wallpapers Found</h3>
                        <p class="text-base text-slate-400 max-w-md mx-auto leading-relaxed">No HSR wallpapers available for this character yet.</p>
                    </div>
                @endif

                @if($wallpapers->hasPages())
                  <div class="mt-12">
                      {{ $wallpapers->withQueryString()->links('components.pagination') }}
                  </div>
                @endif
            </section>

        </div>
    </main>

    <x-footer />
  </body>
</html>