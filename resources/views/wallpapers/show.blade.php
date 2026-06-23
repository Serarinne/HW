<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>{{ $wallpaper->seo_title ?? 'Honkai: Star Rail Wallpaper #' . $wallpaper->id . ' HD & 4K' }} | {{ env('APP_NAME') }}</title>
    <meta name="description" content="{{ $wallpaper->seo_description ?? 'Download ' . ($wallpaper->width ?? '') . 'x' . ($wallpaper->height ?? '') . ' high-quality Honkai: Star Rail character wallpaper. Perfect background for desktop and mobile devices.' }}" />
    
    @if(!empty($wallpaper->seo_keywords))
    <meta name="keywords" content="{{ $wallpaper->seo_keywords }}" />
    @endif

    <meta name="robots" content="index, follow, max-image-preview:large" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <link rel="preconnect" href="https://unpkg.com" crossorigin />

    @if($wallpaper->is_video && !empty($wallpaper->preview['mp4']))
        <link rel="preload" as="video" href="{{ $wallpaper->preview['mp4'] }}" type="video/mp4" fetchpriority="high" />
    @elseif(!$wallpaper->is_video && !empty($wallpaper->preview['webp']))
        <link rel="preload" as="image" href="{{ $wallpaper->preview['webp'] }}" type="image/webp" fetchpriority="high" />
    @elseif(!$wallpaper->is_video && !empty($wallpaper->preview['jpg']))
        <link rel="preload" as="image" href="{{ $wallpaper->preview['jpg'] }}" type="image/jpeg" fetchpriority="high" />
    @endif

    <meta property="og:title" content="{{ $wallpaper->seo_title ?? 'Wallpaper #' . $wallpaper->id }} | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="{{ $wallpaper->seo_description ?? 'Download this stunning HD & 4K Honkai: Star Rail wallpaper.' }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    @if(!$wallpaper->is_video && !empty($wallpaper->preview['jpg']))
    <meta property="og:image" content="{{ $wallpaper->preview['jpg'] }}" />
    <meta property="og:image:width" content="{{ $wallpaper->width }}" />
    <meta property="og:image:height" content="{{ $wallpaper->height }}" />
    @endif

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $wallpaper->seo_title ?? 'Wallpaper #' . $wallpaper->id }}" />
    <meta name="twitter:description" content="{{ $wallpaper->seo_description ?? 'Download this stunning HD & 4K Honkai: Star Rail wallpaper.' }}" />
    @if(!$wallpaper->is_video && !empty($wallpaper->preview['jpg']))
    <meta name="twitter:image" content="{{ $wallpaper->preview['jpg'] }}" />
    @endif

    @php
        $primaryCharacter = $wallpaper->characters ? $wallpaper->characters->first() : null;
        $primaryArtist = $wallpaper->artists ? $wallpaper->artists->first() : null;
    @endphp

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
        }
        @if($primaryCharacter)
        ,{
        "@@type": "ListItem",
        "position": 2,
        "name": "{{ $primaryCharacter->name }}",
        "item": "{{ route('characters.show', ['character' => $primaryCharacter->slug]) }}"
        },
        {
        "@@type": "ListItem",
        "position": 3,
        "name": "{{ $wallpaper->seo_title ?? 'Wallpaper #' . $wallpaper->id }}"
        }
        @else
        ,{
        "@@type": "ListItem",
        "position": 2,
        "name": "{{ $wallpaper->seo_title ?? 'Wallpaper #' . $wallpaper->id }}"
        }
        @endif
    ]
    }
    </script>

    @if($wallpaper->is_video)
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org", "@@type": "VideoObject",
            "name": "{{ $wallpaper->seo_title }}", "description": "{{ $wallpaper->seo_description }}",
            "thumbnailUrl": "{{ $wallpaper->thumbnail['jpg'] }}", "contentUrl": "{{ $wallpaper->original }}",
            "uploadDate": "{{ $wallpaper->created_at->toIso8601String() }}", "keywords": "{{ $wallpaper->seo_keywords }}",
            "width": {{ $wallpaper->width }}, "height": {{ $wallpaper->height }},
            @if($wallpaper->artists->isNotEmpty())
            "author": [ @foreach ($wallpaper->artists as $artist) { "@@type": "Person", "name": "{{ $artist->name }}" }{{ !$loop->last ? ',' : '' }} @endforeach ],
            @endif
            "potentialAction": { "@type": "ViewAction", "target": "{{ route('wallpapers.show', $wallpaper->slug) }}" }
        }
        </script>
    @else
        <script type="application/ld+json">
        {
        "@@context": "https://schema.org",
        "@@type": "ImageObject",
        "@@id": "{{ route('wallpapers.show', $wallpaper->slug) }}#image",
        "name": "{{ $wallpaper->seo_title }}",
        "description": "{{ $wallpaper->seo_description }}",
        "url": "{{ route('wallpapers.show', $wallpaper->slug) }}",
        "contentUrl": "{{ $wallpaper->original }}",
        "thumbnailUrl": "{{ $wallpaper->thumbnail['jpg'] }}",
        "encodingFormat": "{{ $wallpaper->file_type }}",
        "width": {{ $wallpaper->width }},
        "height": {{ $wallpaper->height }},
        "keywords": "{{ $wallpaper->seo_keywords }}",
        "creditText": "{{ $wallpaper->artists->first()->name ?? env('APP_NAME') }}",
        "creator": {
            "@@type": "Person",
            "name": "{{ $wallpaper->artists->first()->name ?? env('APP_NAME') }}"
        },
        "datePublished": "{{ $wallpaper->created_at->toIso8601String() }}",
        "dateModified": "{{ $wallpaper->updated_at->toIso8601String() }}"
        @if(!empty($wallpaper->source)),
        "acquireLicensePage": "{{ $wallpaper->source }}"
        @endif
        }
        </script>
    @endif

    <x-assets />
  </head>
  
  <body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white antialiased overflow-x-hidden [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-600">
    <x-navbar />

    <main class="flex-grow pt-8 pb-32 relative text-slate-300">
        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <!-- Breadcrumbs -->
            <div class="mb-8 flex items-center gap-2 text-xs font-bold text-slate-300 uppercase tracking-widest backdrop-blur-md bg-slate-900/80 w-fit px-5 py-2.5 rounded-full border border-white/10 shadow-sm">
                <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">Home</a>
                <span class="text-slate-500">&bull;</span>
                <span class="text-cyan-400 truncate max-w-[200px] sm:max-w-md">{{ $wallpaper->seo_title ?? 'Wallpaper Detail' }}</span>
            </div>

            <div class="flex flex-col lg:grid lg:grid-cols-12 gap-x-10 gap-y-8 lg:gap-y-12">
                
                <!-- Mobile Title -->
                <div class="order-1 lg:hidden">
                    <h1 class="text-3xl sm:text-4xl font-black text-white leading-tight tracking-tight drop-shadow-md">
                        {{ $wallpaper->seo_title ?? 'Wallpaper #' . $wallpaper->id }}
                    </h1>
                </div>

                <!-- Media Preview -->
                <div class="order-2 lg:col-span-8 lg:row-span-1">
                    <div class="w-full bg-slate-900/50 backdrop-blur-xl border border-white/10 rounded-3xl overflow-hidden flex items-center justify-center p-3 sm:p-5 shadow-2xl relative group">
                        <div class="absolute inset-0 bg-gradient-to-tr from-cyan-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                        
                        @if($wallpaper->is_video)
                            <video 
                                width="{{ $wallpaper->width }}" 
                                height="{{ $wallpaper->height }}" 
                                poster="{{ $wallpaper->preview['jpg'] ?? '' }}" 
                                class="w-full h-auto rounded-2xl drop-shadow-[0_20px_50px_rgba(0,0,0,0.5)] bg-slate-950 relative z-10 border border-white/5 outline-none" 
                                autoplay loop muted playsinline controls> 
                                <source src="{{ $wallpaper->preview['mp4'] }}" type="video/mp4">
                            </video>
                        @else
                            <picture class="relative z-10 w-full flex justify-center">
                                <source srcset="{{ $wallpaper->preview['webp'] }}" type="image/webp">
                                <img 
                                    src="{{ $wallpaper->preview['jpg'] }}" 
                                    alt="{{ $wallpaper->image_alt ?? 'Honkai: Star Rail Wallpaper #' . $wallpaper->id . ' ' . $wallpaper->width . 'x' . $wallpaper->height }}" 
                                    width="{{ $wallpaper->width }}" 
                                    height="{{ $wallpaper->height }}" 
                                    class="w-full h-auto rounded-2xl drop-shadow-[0_20px_50px_rgba(0,0,0,0.5)] bg-slate-950 border border-white/5 group-hover:scale-[1.01] transition-transform duration-500" 
                                    fetchpriority="high" decoding="sync" />
                            </picture>
                        @endif
                    </div>

                    <div class="w-full mt-8 empty:hidden flex justify-center items-center relative z-10 min-h-[90px]">
                        <x-ads />
                    </div>
                </div>

                <!-- Details & Actions Sidebar -->
                <div class="order-3 lg:col-span-4 lg:row-span-2 relative">
                    <div class="sticky top-28 space-y-8">
                        
                        <!-- Desktop Title -->
                        <h1 class="hidden lg:block text-3xl xl:text-5xl font-black text-white leading-tight tracking-tight drop-shadow-md">
                            {{ $wallpaper->seo_title ?? 'Wallpaper #' . $wallpaper->id }}
                        </h1>

                        <!-- Action Buttons -->
                        <div class="flex flex-col gap-4"
                            x-data="{
                                isFavorited: {{ (auth()->check() && auth()->user()->favorites()->where('wallpaper_id', $wallpaper->id)->exists()) ? 'true' : 'false' }},
                                count: {{ $wallpaper->favorites_count ?? 0 }},
                                isLoading: false,
                                toggleFavorite() {
                                  if (!{{ auth()->check() ? 'true' : 'false' }}) {
                                    window.location.href = '{{ route('login') }}';
                                    return;
                                  }
                                  if (this.isLoading) return;
                                  this.isLoading = true;

                                  fetch('{{ route('wallpapers.favorite', $wallpaper->id) }}', {
                                    method: 'POST',
                                    headers: {
                                      'Content-Type': 'application/json',
                                      'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                      'X-Requested-With': 'XMLHttpRequest'
                                    }
                                  })
                                  .then(response => {
                                    if (!response.ok) throw new Error('Network error');
                                    return response.json();
                                  })
                                  .then(data => {
                                    this.isFavorited = data.is_favorited;
                                    this.count = data.favorites_count;
                                    if (window.showNotification) {
                                      window.showNotification(data.message, 'success');
                                    }
                                  })
                                  .catch(error => {
                                    console.error(error);
                                    if (window.showNotification) {
                                      window.showNotification('Failed to change favorite status.', 'error');
                                    }
                                  })
                                  .finally(() => {
                                    this.isLoading = false;
                                  });
                                }
                            }">
                            
                            <a href="{{ $wallpaper->original }}" download class="w-full flex items-center justify-center gap-3 bg-gradient-to-r from-cyan-500 to-cyan-500 hover:from-cyan-400 hover:to-cyan-400 text-white font-black py-4 px-6 rounded-full text-lg transition-all shadow-[0_0_20px_rgba(34,211,238,0.25)] hover:shadow-[0_0_30px_rgba(34,211,238,0.4)] hover:-translate-y-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                <span>Download Original</span>
                            </a>

                            <button @click="toggleFavorite()"
                                    type="button"
                                    :aria-pressed="isFavorited.toString()"
                                    :class="isFavorited ? 'bg-pink-500/10 border-pink-500/50 text-pink-400 shadow-[0_0_15px_rgba(236,72,153,0.15)] hover:bg-pink-500/20' : 'bg-slate-900/60 border-white/10 text-white hover:bg-slate-800 hover:border-pink-500/30'"
                                    class="w-full flex items-center justify-center gap-2 font-bold py-4 px-6 rounded-full transition-all duration-300 border backdrop-blur-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-pink-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                                <svg class="w-5 h-5 transition-transform duration-300"
                                    :class="isFavorited ? 'scale-110 fill-pink-400 text-pink-400 drop-shadow-[0_0_8px_rgba(236,72,153,0.8)]' : 'text-pink-500 fill-none'"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.5l1.318-1.182a4.5 4.5 0 116.364 6.364L12 21.5l-7.682-7.682a4.5 4.5 0 010-6.364z"></path>
                                </svg>
                                <span x-text="isFavorited ? 'Favorited' : 'Add to Favorites'"></span>
                                <span class="text-sm ml-1 opacity-70">(<span x-text="count"></span>)</span>
                            </button>
                        </div>

                        <!-- Stats Grid -->
                        <div class="grid grid-cols-2 gap-3 sm:gap-4">
                            <div class="bg-slate-900/50 backdrop-blur-md border border-white/10 p-4 rounded-2xl flex flex-col items-center justify-center text-center shadow-inner hover:bg-slate-800/80 transition-colors">
                                <span class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-1">Resolution</span>
                                <span class="text-sm font-black text-white font-mono">{{ $wallpaper->width }} &times; {{ $wallpaper->height }}</span>
                            </div>
                            <div class="bg-slate-900/50 backdrop-blur-md border border-white/10 p-4 rounded-2xl flex flex-col items-center justify-center text-center shadow-inner hover:bg-slate-800/80 transition-colors">
                                <span class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-1">File Size</span>
                                <span class="text-sm font-black text-white font-mono">{{ number_format($wallpaper->file_size / 1048576, 2) }} MB</span>
                            </div>
                            <div class="bg-slate-900/50 backdrop-blur-md border border-white/10 p-4 rounded-2xl flex flex-col items-center justify-center text-center shadow-inner hover:bg-slate-800/80 transition-colors">
                                <span class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-1">Views</span>
                                <span class="text-sm font-black text-white font-mono">{{ number_format($wallpaper->views_count ?? 0) }}</span>
                            </div>
                            <div class="bg-slate-900/50 backdrop-blur-md border border-white/10 p-4 rounded-2xl flex flex-col items-center justify-center text-center shadow-inner hover:bg-slate-800/80 transition-colors">
                                <span class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-1">Rating</span>
                                <span class="text-sm font-black text-cyan-400 capitalize">{{ $wallpaper->rating ?? 'General' }}</span>
                            </div>
                        </div>

                        <!-- Share Buttons -->
                        <div class="bg-slate-900/50 backdrop-blur-md border border-white/10 p-5 rounded-2xl shadow-inner">
                            <p class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-3 text-center">Share this wallpaper</p>
                            <div class="flex gap-3">
                                <a class="inline-flex flex-auto justify-center items-center p-3.5 rounded-xl text-white bg-slate-950 hover:bg-[#1877F2] transition-colors border border-white/5 shadow-sm group focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900" target="_blank" rel="noopener" href="https://facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" aria-label="Share on Facebook">
                                    <svg fill="currentColor" viewBox="0 0 512 512" class="w-5 h-5 transition-transform group-hover:scale-110"><path d="M379 22v75h-44c-36 0-42 17-42 41v54h84l-12 85h-72v217h-88V277h-72v-85h72v-62c0-72 45-112 109-112 31 0 58 3 65 4z"></path></svg>
                                </a>
                                <a class="inline-flex flex-auto justify-center items-center p-3.5 rounded-xl text-white bg-slate-950 hover:bg-[#1DA1F2] transition-colors border border-white/5 shadow-sm group focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900" target="_blank" rel="noopener" href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($wallpaper->seo_title ?? 'Check out this wallpaper!') }}" aria-label="Share on Twitter">
                                    <svg fill="currentColor" viewBox="0 0 512 512" class="w-5 h-5 transition-transform group-hover:scale-110"><path d="m459 152 1 13c0 139-106 299-299 299-59 0-115-17-161-47a217 217 0 0 0 156-44c-47-1-85-31-98-72l19 1c10 0 19-1 28-3-48-10-84-52-84-103v-2c14 8 30 13 47 14A105 105 0 0 1 36 67c51 64 129 106 216 110-2-8-2-16-2-24a105 105 0 0 1 181-72c24-4 47-13 67-25-8 24-25 45-46 58 21-3 41-8 60-17-14 21-32 40-53 55z"></path></svg>
                                </a>
                                <a class="inline-flex flex-auto justify-center items-center p-3.5 rounded-xl text-white bg-slate-950 hover:bg-[#E60023] transition-colors border border-white/5 shadow-sm group focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900" target="_blank" rel="noopener" href="https://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}&media={{ urlencode($wallpaper->preview['jpg'] ?? '') }}&description={{ urlencode($wallpaper->seo_title ?? '') }}" aria-label="Share on Pinterest">
                                    <svg fill="currentColor" viewBox="0 0 512 512" class="w-5 h-5 transition-transform group-hover:scale-110"><path d="M268 6C165 6 64 75 64 186c0 70 40 110 64 110 9 0 15-28 15-35 0-10-24-30-24-68 0-81 62-138 141-138 68 0 118 39 118 110 0 53-21 153-90 153-25 0-46-18-46-44 0-38 26-74 26-113 0-67-94-55-94 25 0 17 2 36 10 51-14 60-42 148-42 209 0 19 3 38 4 57 4 3 2 3 7 1 51-69 49-82 72-173 12 24 44 36 69 36 106 0 154-103 154-196C448 71 362 6 268 6z"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attributes Data (Characters, Artists, Tags) -->
                <div class="order-4 lg:col-span-8 lg:row-span-1 space-y-8 mt-4 lg:mt-0">
                    <!-- Image Description -->
                    @if(!empty($wallpaper->image_description))
                        <div class="bg-slate-900/50 backdrop-blur-sm border border-white/10 rounded-3xl p-6 sm:p-8 shadow-lg">
                            <h2 class="text-xs font-black uppercase tracking-widest text-white mb-4 flex items-center gap-3">
                                <span class="w-1.5 h-5 bg-cyan-400 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.8)]"></span> Description
                            </h2>
                            <div class="text-sm sm:text-base text-slate-100 leading-relaxed font-medium">
                                {!! nl2br(e($wallpaper->image_description)) !!}
                            </div>
                        </div>
                    @endif
                    
                    @if($wallpaper->characters && $wallpaper->characters->isNotEmpty())
                        <div class="bg-slate-900/50 backdrop-blur-sm border border-white/10 rounded-3xl p-6 sm:p-8 shadow-lg">
                            <h2 class="text-xs font-black uppercase tracking-widest text-white mb-6 flex items-center gap-3">
                                <span class="w-1.5 h-5 bg-cyan-400 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.8)]"></span> Characters
                            </h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                                @foreach($wallpaper->characters as $character)
                                    <a href="{{ route('characters.show', [
                                    'character' => $character->slug
                                    ]) }}" class="flex items-center gap-4 p-3 bg-slate-950/50 border border-white/5 rounded-2xl hover:bg-slate-800 hover:border-cyan-500/40 hover:shadow-[0_0_15px_rgba(34,211,238,0.15)] transition-all group focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                                        <img src="{{ $character->image['webp'] ?? '' }}" alt="{{ $character->name }} Avatar" width="48" height="48" loading="lazy" class="w-12 h-12 rounded-full object-cover border border-slate-700 shadow-inner group-hover:border-cyan-500/50 transition-colors">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-bold text-white truncate group-hover:text-cyan-400 transition-colors">{{ $character->name }}</p>
                                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400 truncate mt-0.5">{{ $character->series->first()->name ?? 'Honkai: Star Rail' }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($wallpaper->artists && $wallpaper->artists->isNotEmpty())
                        <div class="bg-slate-900/50 backdrop-blur-sm border border-white/10 rounded-3xl p-6 sm:p-8 shadow-lg">
                            <h2 class="text-xs font-black uppercase tracking-widest text-white mb-6 flex items-center gap-3">
                                <span class="w-1.5 h-5 bg-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.8)]"></span> Artists
                            </h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                                @foreach($wallpaper->artists as $artist)
                                    <a href="{{ route('artists.show', ['slug' => $artist->slug]) }}" class="flex items-center gap-4 p-3 bg-slate-950/50 border border-white/5 rounded-2xl hover:bg-slate-800 hover:border-cyan-500/40 hover:shadow-[0_0_15px_rgba(34,211,238,0.15)] transition-all group focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                                        <img src="{{ $artist->image['webp'] ?? '' }}" alt="{{ $artist->name }} Profile" width="48" height="48" loading="lazy" class="w-12 h-12 rounded-full object-cover border border-slate-700 shadow-inner group-hover:border-cyan-500/50 transition-colors">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-bold text-white truncate group-hover:text-cyan-400 transition-colors">{{ $artist->name }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($wallpaper->tags && $wallpaper->tags->isNotEmpty())
                        <div class="bg-slate-900/50 backdrop-blur-sm border border-white/10 rounded-3xl p-6 sm:p-8 shadow-lg">
                            <h2 class="text-xs font-black uppercase tracking-widest text-white mb-6 flex items-center gap-3">
                                <span class="w-1.5 h-5 bg-cyan-400 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.8)]"></span> Tags
                            </h2>
                            <div class="flex flex-wrap gap-2.5">
                                @foreach($wallpaper->tags as $tag)
                                    <a href="{{ route('tags.show', ['slug' => $tag->slug]) }}" class="bg-slate-950/50 hover:bg-cyan-500/10 text-slate-300 hover:text-cyan-400 text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-xl border border-white/5 hover:border-cyan-500/40 hover:shadow-[0_0_15px_rgba(34,211,238,0.15)] transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                                        #{{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </main>

    <x-footer />
  </body>
</html>