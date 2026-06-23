@php
    $footerLinks = [
        ['name' => 'About Us', 'route' => 'about'],
        ['name' => 'Contact', 'route' => 'contact'],
        ['name' => 'Privacy Policy', 'route' => 'privacy'],
        ['name' => 'Terms of Service', 'route' => 'tos'],
    ];
@endphp

<footer class="relative border-t border-white/10 bg-slate-900/50 backdrop-blur-xl overflow-hidden mt-auto" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-4xl h-[150px] bg-cyan-500/5 blur-[80px] pointer-events-none rounded-full" aria-hidden="true"></div>
    
    <div class="relative z-10 max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 py-12 flex flex-col md:flex-row md:justify-between md:items-center gap-10">
        
        <div class="flex flex-col items-center md:items-start text-center md:text-left space-y-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">
                <img src="{{ env('STORAGE_URL') }}/assets/logo.png" alt="{{ env('APP_NAME') }} Logo" width="120" height="32" loading="lazy" decoding="async" class="h-8 w-auto grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 group-hover:drop-shadow-[0_0_15px_rgba(34,211,238,0.5)] transition-all duration-500">
                <span class="text-xl font-black tracking-tight text-white group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-cyan-400 group-hover:to-cyan-500 transition-all duration-500">
                    {{ env('APP_NAME') }}
                </span>
            </a>
            
            <div class="space-y-1.5 max-w-md">
                <p class="text-xs font-medium text-slate-400 tracking-wide">
                    &copy; {{ date('Y') }} <span class="text-white font-bold">{{ env('APP_NAME') }}</span>. All rights reserved.
                </p>
                <p class="text-[11px] font-medium text-slate-300 tracking-wide leading-relaxed">
                    Honkai: Star Rail and all related characters and assets are the property and copyright of HoYoverse. This is an unofficial fan site.
                </p>
            </div>
        </div>

        <nav aria-label="Footer Navigation">
            <ul class="flex flex-wrap justify-center md:justify-end gap-x-8 gap-y-4">
                @foreach($footerLinks as $link)
                    <li>
                        <a href="{{ route($link['route']) }}" 
                           class="text-xs font-bold uppercase tracking-widest text-slate-400 hover:text-cyan-400 hover:drop-shadow-[0_0_8px_rgba(34,211,238,0.5)] transition-all duration-300 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">
                            {{ $link['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        
    </div>
</footer>