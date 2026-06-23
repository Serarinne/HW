<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>About Us | Honkai: Star Rail Wallpapers - {{ env('APP_NAME') }}</title>
    <meta name="description" content="Learn about {{ env('APP_NAME') }} - your ultimate destination for high-quality Honkai: Star Rail wallpapers in HD and 4K resolution. Discover our Data Bank mission." />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="{{ route('about') }}" />

    <meta property="og:title" content="About {{ env('APP_NAME') }} | HSR Wallpapers" />
    <meta property="og:description" content="Learn about {{ env('APP_NAME') }} - your ultimate destination for high-quality Honkai: Star Rail wallpapers in HD and 4K resolution. Discover our Data Bank mission." />
    <meta property="og:url" content="{{ route('about') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <script type="application/ld+json">
    [
      {
        "@@context": "https://schema.org",
        "@@type": "AboutPage",
        "mainEntityOfPage": {
          "@@type": "WebPage",
          "@@id": "{{ route('about') }}"
        },
        "name": "About {{ env('APP_NAME') }}",
        "description": "Information about the {{ env('APP_NAME') }} platform, its mission, and its values regarding high-quality Honkai: Star Rail wallpapers."
      },
      {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "{{ env('APP_NAME') }}",
        "url": "{{ url('/') }}",
        "logo": "{{ env('STORAGE_URL') }}/assets/logo.png",
        "description": "A premier destination for high-quality Honkai: Star Rail wallpapers in HD and 4K."
      }
    ]
    </script>

    <x-assets />
    
  </head>
  <body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white antialiased overflow-x-hidden [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-600">
    <x-navbar />

    <main class="flex-grow pt-8 pb-32 relative text-slate-300">
        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <section class="border-b border-white/5 mb-12 sm:mb-16">
                <div class="text-center py-20 sm:py-28 relative">
                    
                    <div class="mb-8 flex flex-wrap items-center justify-center gap-2 text-xs font-bold text-slate-400 uppercase tracking-widest backdrop-blur-md bg-slate-900/80 w-fit mx-auto px-5 py-2.5 rounded-full border border-white/10 shadow-sm">
                        <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">Home</a>
                        <span class="text-slate-600">&bull;</span>
                        <span class="text-cyan-400">About Us</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black tracking-tight text-white leading-tight mb-6">
                        About <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-500 drop-shadow-lg">{{ env('APP_NAME') }}</span>
                    </h1>
                    <p class="mt-5 text-base sm:text-xl font-medium text-slate-400 leading-relaxed max-w-2xl mx-auto">
                        Your ultimate Data Bank for stunning Honkai: Star Rail wallpapers.
                    </p>
                </div>
            </section>

            <section class="max-w-6xl mx-auto space-y-12">
                
                <div class="bg-slate-900/50 backdrop-blur-xl border border-white/10 rounded-3xl p-8 sm:p-14 shadow-2xl relative overflow-hidden group">
                    <div class="absolute -top-24 -right-24 w-80 h-80 bg-cyan-500/10 rounded-full blur-[80px] pointer-events-none transition-all duration-700"></div>
                    
                    <h2 class="text-3xl sm:text-4xl font-black text-white mb-8 flex items-center gap-4 relative z-10">
                        <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                        Our Log
                    </h2>
                    <div class="space-y-6 text-slate-300 font-medium leading-relaxed sm:text-lg relative z-10">
                        <p>
                            {{ env('APP_NAME') }} was born from a simple passion: the love for Honkai: Star Rail and the breathtaking artwork that brings the Astral Express journey to life. We recognized that Trailblazers deserved a dedicated Data Bank where they could discover, download, and enjoy high-quality wallpapers that perfectly capture the essence of their favorite Pathstriders and factions.
                        </p>
                        <p>
                            Today, {{ env('APP_NAME') }} has grown into a community of thousands of HSR enthusiasts who trust us for their wallpaper needs. From HD to 4K resolution, we curate the finest collection to help you personalize your desktop and mobile devices with stunning visuals from across the cosmos.
                        </p>
                        <p class="text-slate-200 font-bold border-l-2 border-cyan-500/50 pl-4 py-1">
                            Our mission continues to be clear: provide free, accessible, and exceptional Honkai: Star Rail wallpaper content for every Trailblazer exploring the universe.
                        </p>
                    </div>
                </div>

                <div class="w-full empty:hidden flex justify-center items-center relative z-10 min-h-[90px] py-4">
                    <x-ads />
                </div>

                <div class="bg-slate-900/50 backdrop-blur-xl border border-white/10 rounded-3xl p-8 sm:p-14 shadow-2xl relative overflow-hidden group">
                    <h2 class="text-3xl sm:text-4xl font-black text-white mb-10 flex items-center gap-4 relative z-10">
                        <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                        What We Do
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
                        <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-2xl p-8 transition-all duration-300 hover:shadow-[0_0_20px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                            <div class="w-14 h-14 bg-cyan-500/10 rounded-2xl flex items-center justify-center mb-6 border border-cyan-500/20 shadow-inner">
                                <svg class="w-7 h-7 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">HD & 4K Wallpapers</h3>
                            <p class="text-slate-400 text-sm leading-relaxed font-medium">Thousands of high-resolution HSR wallpapers optimized for desktop and mobile devices.</p>
                        </div>

                        <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-2xl p-8 transition-all duration-300 hover:shadow-[0_0_20px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                            <div class="w-14 h-14 bg-cyan-500/10 rounded-2xl flex items-center justify-center mb-6 border border-cyan-500/20 shadow-inner">
                                <svg class="w-7 h-7 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">Data Bank Search</h3>
                            <p class="text-slate-400 text-sm leading-relaxed font-medium">Search by character, Path, Faction, or tag to find exactly what you want.</p>
                        </div>

                        <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-2xl p-8 transition-all duration-300 hover:shadow-[0_0_20px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                            <div class="w-14 h-14 bg-cyan-500/10 rounded-2xl flex items-center justify-center mb-6 border border-cyan-500/20 shadow-inner">
                                <svg class="w-7 h-7 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110-4m-6 8h3m0 2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">Curated Collections</h3>
                            <p class="text-slate-400 text-sm leading-relaxed font-medium">Weekly curated playlists featuring popular and trending character setups.</p>
                        </div>

                        <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-2xl p-8 transition-all duration-300 hover:shadow-[0_0_20px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                            <div class="w-14 h-14 bg-cyan-500/10 rounded-2xl flex items-center justify-center mb-6 border border-cyan-500/20 shadow-inner">
                                <svg class="w-7 h-7 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.182a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">Trailblazer Favorites</h3>
                            <p class="text-slate-400 text-sm leading-relaxed font-medium">Discover wallpapers loved by thousands of Trailblazers through our favorites system.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-900/50 backdrop-blur-xl border border-white/10 rounded-3xl p-8 sm:p-14 shadow-2xl relative overflow-hidden group">
                    <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-cyan-500/10 rounded-full blur-[80px] pointer-events-none transition-all duration-700"></div>
                    
                    <h2 class="text-3xl sm:text-4xl font-black text-white mb-10 flex items-center gap-4 relative z-10">
                        <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                        Our Values
                    </h2>
                    
                    <div class="space-y-8 relative z-10">
                        <div class="flex flex-col sm:flex-row gap-5 sm:gap-6 group/item">
                            <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-slate-950 text-cyan-400 font-black text-xl flex items-center justify-center border border-white/10 shadow-[0_0_15px_rgba(34,211,238,0.1)] group-hover/item:border-cyan-500/50 group-hover/item:shadow-[0_0_20px_rgba(34,211,238,0.3)] transition-all duration-300">
                                1
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2 group-hover/item:text-cyan-400 transition-colors">Quality First</h3>
                                <p class="text-slate-400 font-medium leading-relaxed">We only feature high-quality artwork that meets our strict standards for resolution and visual appeal.</p>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-5 sm:gap-6 group/item">
                            <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-slate-950 text-cyan-400 font-black text-xl flex items-center justify-center border border-white/10 shadow-[0_0_15px_rgba(34,211,238,0.1)] group-hover/item:border-cyan-500/50 group-hover/item:shadow-[0_0_20px_rgba(34,211,238,0.3)] transition-all duration-300">
                                2
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2 group-hover/item:text-cyan-400 transition-colors">Free Access</h3>
                                <p class="text-slate-400 font-medium leading-relaxed">Every wallpaper is completely free to download. We believe great HSR art should be accessible to everyone.</p>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-5 sm:gap-6 group/item">
                            <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-slate-950 text-cyan-400 font-black text-xl flex items-center justify-center border border-white/10 shadow-[0_0_15px_rgba(34,211,238,0.1)] group-hover/item:border-cyan-500/50 group-hover/item:shadow-[0_0_20px_rgba(34,211,238,0.3)] transition-all duration-300">
                                3
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2 group-hover/item:text-cyan-400 transition-colors">Artist Respect</h3>
                                <p class="text-slate-400 font-medium leading-relaxed">We credit artists and respect copyright. Our community thrives on mutual respect and appreciation.</p>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-5 sm:gap-6 group/item">
                            <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-slate-950 text-cyan-400 font-black text-xl flex items-center justify-center border border-white/10 shadow-[0_0_15px_rgba(34,211,238,0.1)] group-hover/item:border-cyan-500/50 group-hover/item:shadow-[0_0_20px_rgba(34,211,238,0.3)] transition-all duration-300">
                                4
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2 group-hover/item:text-cyan-400 transition-colors">Continuous Improvement</h3>
                                <p class="text-slate-400 font-medium leading-relaxed">We constantly update our collection and improve our platform based on Trailblazer feedback.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center bg-gradient-to-br from-cyan-900/40 via-slate-900/60 to-cyan-900/30 backdrop-blur-xl border border-cyan-500/20 rounded-3xl p-10 sm:p-16 shadow-2xl relative overflow-hidden group">
                    <div class="absolute inset-0 bg-cyan-500/10 blur-[60px] rounded-3xl pointer-events-none opacity-50 group-hover:opacity-100 transition-opacity duration-700"></div>
                    
                    <div class="relative z-10">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-400 mb-3">Join Us Now</p>
                        <h2 class="text-3xl sm:text-5xl font-black text-white mb-6 drop-shadow-md">Board the Astral Express</h2>
                        <p class="text-slate-300 font-medium leading-relaxed mb-10 max-w-2xl mx-auto sm:text-lg">
                            Whether you're looking for your next favorite character wallpaper or want to contribute to our collection, {{ env('APP_NAME') }} is here for you. Start exploring thousands of stunning Honkai: Star Rail wallpapers today!
                        </p>
                        
                        <a href="{{ route('home') }}" class="group/btn inline-flex items-center justify-center gap-3 bg-gradient-to-r from-cyan-500 to-cyan-500 hover:from-cyan-400 hover:to-cyan-400 text-white font-black text-sm uppercase tracking-widest py-4 px-10 rounded-full transition-all duration-300 shadow-[0_0_20px_rgba(34,211,238,0.3)] hover:shadow-[0_0_30px_rgba(34,211,238,0.5)] hover:-translate-y-1 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            <svg class="w-5 h-5 transition-transform group-hover/btn:-translate-y-0.5 group-hover/btn:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Start Exploring
                        </a>
                    </div>
                </div>

            </section>
        </div>
    </main>

    <x-footer />
  </body>
</html>