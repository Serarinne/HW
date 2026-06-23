<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Honkai: Star Rail Blog - News, Guides & Tier Lists | {{ env('APP_NAME') }}</title>
    <meta name="description" content="Read the latest articles on {{ env('APP_NAME') }}. Discover top Honkai: Star Rail character guides, tier lists, lore discussions, and Astral Express updates." />
    
    <meta name="robots" content="index, follow, max-image-preview:large" />
    <link rel="canonical" href="{{ route('posts.index') }}" />

    <meta property="og:title" content="Honkai: Star Rail Blog & Articles | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Discover top Honkai: Star Rail character guides, tier lists, lore discussions, and Astral Express updates." />
    <meta property="og:url" content="{{ route('posts.index') }}" />
    <meta property="og:type" content="blog" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Blog",
      "name": "{{ env('APP_NAME') }} HSR Blog & Articles",
      "description": "Latest news, guides, and tier lists for Honkai: Star Rail.",
      "url": "{{ route('posts.index') }}"
    }
    </script>

    <x-assets />
  </head>
  
  <body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white antialiased overflow-x-hidden [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-600">
    <x-navbar />

    <main class="flex-grow relative w-full text-slate-300">
        <section class="relative z-10 border-b border-white/5 bg-slate-950/50 backdrop-blur-md min-h-[300px] flex flex-col justify-center">
            <div class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 text-center flex flex-col items-center justify-center">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight mb-6">
                    {{ env('APP_NAME') }} <br class="hidden sm:block"/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-400 drop-shadow-lg">Astral Express Log</span>
                </h1>
                <p class="text-base sm:text-lg text-slate-400 font-medium leading-relaxed max-w-2xl mx-auto">
                    Discover the latest Honkai: Star Rail updates, character build recommendations, meta tier lists, and deep lore discussions.
                </p>
            </div>
        </section>

        <section class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 relative z-10">

            @if(isset($posts) && $posts->count() > 0)
                <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-8 gap-4 border-b border-white/10 pb-4">
                    <div class="space-y-2">
                        <p class="text-xs font-bold uppercase tracking-widest text-cyan-400 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-cyan-500 animate-pulse shadow-[0_0_8px_rgba(168,85,247,0.8)]"></span> 
                            Latest Logs
                        </p>
                        <h2 class="text-2xl sm:text-3xl font-black text-white">
                            All <span class="text-slate-400 font-medium">Articles</span>
                        </h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-12">
                    @foreach($posts as $post)
                        <article class="group relative bg-slate-900 rounded-2xl overflow-hidden shadow-lg ring-1 ring-white/10 hover:ring-cyan-500/50 hover:shadow-[0_0_25px_rgba(168,85,247,0.2)] transform hover:-translate-y-1.5 transition-all duration-300 flex flex-col">
                            <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="block aspect-video overflow-hidden relative w-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-t-2xl">
                                <img src="{{ $post->featured_image }}" 
                                     alt="{{ $post->title }} - {{ env('APP_NAME') }} HSR Article" 
                                     loading="lazy" width="800" height="450" 
                                     class="w-full h-full object-cover bg-slate-800 group-hover:scale-105 transition-transform duration-700 ease-out" />
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-80"></div>
                                
                                <div class="absolute top-4 left-4">
                                    <span class="bg-slate-900/80 backdrop-blur-md border border-white/10 text-cyan-400 text-xs font-black uppercase tracking-widest px-3 py-1.5 rounded-lg shadow-sm flex items-center gap-1.5">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('d M Y') }}
                                    </span>
                                </div>
                            </a>

                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex items-center text-xs font-bold uppercase tracking-widest text-slate-400 mb-4 space-x-4">
                                    <span class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        {{ number_format($post->views_count) }} Views
                                    </span>
                                </div>

                                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="block mb-3 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">
                                    <h2 class="text-xl font-bold text-white group-hover:text-cyan-400 transition-colors duration-300 leading-tight">
                                        {{ $post->title }}
                                    </h2>
                                </a>

                                <p class="text-slate-400 text-sm mb-8 line-clamp-3 leading-relaxed flex-grow">
                                    {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 120) }}
                                </p>

                                <div class="mt-auto pt-5 border-t border-white/5">
                                    <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="inline-flex items-center text-sm font-black uppercase tracking-widest text-cyan-400 group-hover:text-cyan-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">
                                        Read Log
                                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if($posts->hasPages())
                  <div class="mt-12">
                      {{ $posts->links('components.pagination') }}
                  </div>
                @endif

            @else
                <div class="col-span-full flex flex-col items-center justify-center py-20 px-4 text-center bg-slate-900/50 border border-dashed border-slate-700/50 rounded-3xl backdrop-blur-sm w-full max-w-3xl mx-auto">
                    <div class="w-20 h-20 mb-6 rounded-full bg-slate-800/80 flex items-center justify-center ring-1 ring-white/5">
                        <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 7H20a2 2 0 002-2v12a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white mb-3">No Logs Yet</h2>
                    <p class="text-base text-slate-400 max-w-md mx-auto leading-relaxed">
                        There are no Astral Express logs or updates published yet. Please check back later!
                    </p>
                </div>
            @endif

        </section>

        <div class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 mb-12 empty:hidden flex justify-center items-center">
            <x-ads />
        </div>
    </main>

    <x-footer />
  </body>
</html>