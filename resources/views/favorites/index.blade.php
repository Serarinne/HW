<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>My Favorites - {{ env('APP_NAME') }}</title>
    <meta name="description" content="View and manage your saved Honkai: Star Rail wallpapers on {{ env('APP_NAME') }}." />
    <meta name="robots" content="noindex, nofollow" />
    <link rel="canonical" href="{{ route('favorites.index') }}" />

    <x-assets />
    
  </head>
  <body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white antialiased overflow-x-hidden [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-600">
    <x-navbar />

    <main class="flex-grow pt-8 pb-32 relative text-slate-300">
        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <!-- Breadcrumb -->
            <div class="mb-8 flex flex-wrap items-center gap-2 text-xs font-bold text-slate-300 uppercase tracking-widest backdrop-blur-md bg-slate-900/80 w-fit px-5 py-2.5 rounded-full border border-white/10 shadow-sm">
                <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">Home</a>
                <span class="text-slate-500">&bull;</span>
                <span class="text-cyan-400 truncate max-w-[120px] sm:max-w-[200px]">My Favorites</span>
            </div>

            <!-- Header Section -->
            <div class="bg-slate-900/50 border border-white/10 rounded-3xl p-8 sm:p-12 backdrop-blur-md relative overflow-hidden shadow-2xl mb-12 group">
                <div class="absolute -top-24 -right-24 w-80 h-80 bg-cyan-500/10 rounded-full blur-[80px] pointer-events-none group-hover:bg-cyan-500/20 transition-all duration-700"></div>
                <div class="absolute -bottom-24 -left-24 w-60 h-60 bg-cyan-500/10 rounded-full blur-[80px] pointer-events-none group-hover:bg-cyan-500/20 transition-all duration-700"></div>
                
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 relative z-10">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6 sm:gap-8">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl bg-gradient-to-br from-cyan-500/20 to-cyan-500/5 flex items-center justify-center flex-shrink-0 shadow-[0_0_30px_rgba(236,72,153,0.15)] border border-cyan-500/20 group-hover:border-cyan-500/40 transition-colors">
                            <svg class="w-10 h-10 sm:w-12 sm:h-12 text-cyan-400 drop-shadow-[0_0_10px_rgba(236,72,153,0.8)]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight drop-shadow-md mb-3">
                                My <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-500">Favorites</span>
                            </h1>
                            <p class="text-xs font-bold uppercase tracking-widest text-slate-400 flex items-center gap-2.5">
                                <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse shadow-[0_0_8px_rgba(236,72,153,0.8)]"></span>
                                @if($wallpapers->total() > 0)
                                    <span class="text-slate-400">You have saved</span> <span class="text-cyan-400 text-sm">{{ $wallpapers->total() }}</span> <span class="text-slate-400">HSR wallpapers</span>
                                @else
                                    <span class="text-slate-400">No favorite wallpapers yet</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    @if($wallpapers->total() > 0)
                        <a href="{{ route('home') }}" class="group/btn inline-flex items-center justify-center gap-3 px-6 sm:px-8 py-4 bg-gradient-to-r from-cyan-500 to-cyan-600 hover:from-cyan-400 hover:to-cyan-500 text-white font-black text-xs uppercase tracking-widest rounded-full transition-all duration-300 shadow-[0_0_20px_rgba(236,72,153,0.25)] hover:shadow-[0_0_30px_rgba(236,72,153,0.4)] hover:-translate-y-1 outline-none text-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            Browse More Wallpapers
                            <svg class="w-4 h-4 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Content Section -->
            @if($wallpapers->count() > 0)
                
                <div class="w-full mb-8 empty:hidden flex justify-center items-center relative z-10 min-h-[90px]">
                    <x-ads />
                </div>

                <section>
                    <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-8 gap-4 border-b border-white/10 pb-5 relative z-10">
                        <div class="space-y-1.5">
                            <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
                                Saved <span class="text-slate-400 font-medium">Collection</span>
                            </h2>
                        </div>
                    </div>
                    
                    <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-5 space-y-5 relative z-10">
                        @foreach($wallpapers as $wallpaper)
                            <div class="break-inside-avoid">
                                <x-wallpaper-card :wallpaper="$wallpaper" />
                            </div>
                        @endforeach
                    </div>

                    @if($wallpapers->hasPages())
                        <div class="mt-12 bg-slate-900/50 border border-white/10 rounded-2xl p-4 backdrop-blur-sm relative z-10 shadow-lg flex justify-center sm:justify-start">
                            {{ $wallpapers->links('components.pagination') }}
                        </div>
                    @endif
                </section>
            @else
                <!-- Empty State -->
                <div class="flex flex-col items-center justify-center py-24 px-4 text-center bg-slate-900/50 border border-dashed border-slate-700 rounded-3xl backdrop-blur-md shadow-inner max-w-4xl mx-auto relative z-10">
                    <div class="relative mb-10 group">
                        <div class="absolute inset-0 bg-cyan-500/20 rounded-full animate-ping opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="absolute inset-0 bg-cyan-500/10 rounded-full animate-pulse opacity-40"></div>
                        <div class="w-24 h-24 sm:w-32 sm:h-32 rounded-full bg-slate-900/80 border border-white/10 flex items-center justify-center shadow-inner relative z-10 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-12 h-12 sm:w-16 sm:h-16 text-slate-400 group-hover:text-cyan-400 transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <h2 class="text-3xl sm:text-4xl font-black text-white mb-4">Your Data Bank is empty</h2>
                    <p class="text-slate-400 max-w-md text-sm sm:text-base mb-10 leading-relaxed font-medium">
                        Start building your HSR favorites by exploring our gallery and clicking the 
                        <span class="text-cyan-400 font-bold">❤️ favorite button</span> 
                        on wallpapers you love!
                    </p>
                    <a href="{{ route('home') }}" class="group/btn inline-flex items-center gap-3 bg-gradient-to-r from-cyan-500 to-cyan-600 hover:from-cyan-400 hover:to-cyan-500 text-white font-black uppercase tracking-widest text-sm py-4 px-10 rounded-full transition-all duration-300 shadow-[0_0_20px_rgba(34,211,238,0.25)] hover:shadow-[0_0_30px_rgba(34,211,238,0.4)] hover:-translate-y-1 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                        Explore HSR Wallpapers
                        <svg class="w-5 h-5 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            @endif
            
        </div>
    </main>

    <x-footer />
  </body>
</html>