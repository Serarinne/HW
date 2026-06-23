<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | {{ env('APP_NAME') }}</title>
    <meta name="robots" content="noindex, nofollow" />
    
    <x-assets />
    
</head>
<body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white antialiased overflow-x-hidden [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-600">
    
    <x-navbar />

    <main class="flex-grow flex flex-col items-center justify-center relative text-slate-300 py-16 px-4">
        <div class="w-full max-w-[90rem] mx-auto mb-12 empty:hidden flex justify-center items-center relative z-10 min-h-[90px]">
            <x-ads />
        </div>

        <div class="w-full max-w-4xl text-center relative z-10 flex flex-col items-center">
            
            <h1 class="text-[8rem] sm:text-[12rem] md:text-[15rem] leading-none font-extrabold bg-gradient-to-b from-cyan-400 via-cyan-500 to-slate-950 text-transparent bg-clip-text drop-shadow-xl mb-4 tracking-tighter">
                @yield('code')
            </h1>
            
            <h2 class="text-3xl sm:text-4xl font-black text-white mb-6 drop-shadow-md">@yield('title')</h2>
            
            <p class="text-slate-400 mb-12 max-w-2xl text-lg font-medium leading-relaxed">
                @yield('message')
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto">
                <a href="{{ route('home') }}" class="group/btn inline-flex items-center justify-center gap-3 bg-gradient-to-r from-cyan-500 to-cyan-500 hover:from-cyan-400 hover:to-cyan-400 text-white font-black text-sm uppercase tracking-widest py-4 px-10 rounded-full transition-all duration-300 shadow-[0_0_20px_rgba(34,211,238,0.25)] hover:shadow-[0_0_30px_rgba(34,211,238,0.4)] hover:-translate-y-1 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                    <svg class="w-5 h-5 transition-transform group-hover/btn:-translate-y-0.5 group-hover/btn:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Return to Astral Express
                </a>
            </div>
        </div>

        <div class="w-full max-w-[90rem] mx-auto mt-16 empty:hidden flex justify-center items-center relative z-10 min-h-[90px]">
            <x-ads />
        </div>

    </main>

    <x-footer />

</body>
</html>