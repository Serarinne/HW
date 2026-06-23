<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <link rel="canonical" href="{{ route('settings.edit') }}" />
    
    <title>Content Preferences | {{ env('APP_NAME') }}</title>
    <x-assets />
    
  </head>
  <body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white antialiased overflow-x-hidden [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-600">
    <x-navbar />

    <main class="flex-grow pt-8 pb-32 relative text-slate-300">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="mb-8 flex flex-wrap items-center gap-2 text-xs font-bold text-slate-400 uppercase tracking-widest backdrop-blur-md bg-slate-900/80 w-fit px-5 py-2.5 rounded-full border border-white/10 shadow-sm">
                <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">
                    Home
                </a>
                <span class="text-slate-600">&bull;</span>
                <span class="text-cyan-400">Content Preferences</span>
            </div>

            @if(session('success'))
                <div x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => show = false, 4000)"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="mb-8 p-5 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center justify-between shadow-[0_0_20px_rgba(16,185,129,0.15)] backdrop-blur-md">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-emerald-500/20 flex items-center justify-center flex-shrink-0 border border-emerald-500/30">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold tracking-wide">{{ session('success') }}</span>
                    </div>
                    <button @click="show = false" type="button" aria-label="Close message" class="text-emerald-400 hover:text-emerald-200 transition-colors p-2 rounded-xl hover:bg-emerald-500/20 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            @endif

            @if(session('warning'))
                <div x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => show = false, 10000)"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="mb-8 p-5 rounded-2xl bg-amber-500/10 border border-amber-500/20 text-amber-400 flex items-center justify-between shadow-[0_0_20px_rgba(245,158,11,0.15)] backdrop-blur-md">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-amber-500/20 flex items-center justify-center flex-shrink-0 border border-amber-500/30">
                            <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold tracking-wide">{{ session('warning') }}</span>
                    </div>
                    <button @click="show = false" type="button" aria-label="Close message" class="text-amber-400 hover:text-amber-200 transition-colors p-2 rounded-xl hover:bg-amber-500/20 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-8 p-6 rounded-2xl bg-rose-500/10 border border-rose-500/20 text-rose-400 shadow-[0_0_20px_rgba(244,63,94,0.15)] backdrop-blur-md">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-rose-500/20 flex items-center justify-center flex-shrink-0 border border-rose-500/30">
                            <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-base font-black text-white">Input error occurred:</span>
                    </div>
                    <ul class="list-disc list-inside text-sm font-medium space-y-1.5 text-rose-300/80 pl-2 ml-10">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-slate-900/50 border border-white/10 rounded-3xl overflow-hidden shadow-2xl backdrop-blur-xl group relative">
                
                <div class="absolute -top-24 -right-24 w-80 h-80 bg-cyan-500/10 rounded-full blur-[80px] pointer-events-none transition-all duration-700"></div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-cyan-500/10 rounded-full blur-[80px] pointer-events-none transition-all duration-700"></div>

                <div class="p-8 sm:p-12 border-b border-white/10 relative z-10">
                    <div class="flex flex-col md:flex-row md:items-center gap-6">
                        <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-cyan-500/20 to-cyan-500/5 flex items-center justify-center flex-shrink-0 shadow-[0_0_30px_rgba(34,211,238,0.15)] border border-cyan-500/20">
                            <svg class="w-10 h-10 text-cyan-400 drop-shadow-[0_0_10px_rgba(34,211,238,0.8)]" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight drop-shadow-md mb-3">
                                Content <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-500">Preferences</span>
                            </h1>
                            <p class="text-sm font-medium text-slate-400 leading-relaxed max-w-2xl">
                                Customize your HSR wallpaper browsing experience by selecting which content ratings you'd like to see. Your preferences will apply to all Data Bank sessions.
                            </p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('settings.update') }}" method="POST" class="p-8 sm:p-12 relative z-10">
                    @csrf
                    @method('PUT')

                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-cyan-400 mb-6 flex items-center gap-2.5">
                            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse shadow-[0_0_8px_rgba(34,211,238,0.8)]"></span>
                            Select the rating criteria for images allowed
                        </p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6">
                            @php
                                $availableRatings = [
                                    'general' => [
                                        'title' => 'General',
                                        'desc' => 'All ages. Safe for work and public environments.',
                                        'icon' => 'M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z'
                                    ],
                                    'sensitive' => [
                                        'title' => 'Sensitive',
                                        'desc' => 'Light content. May contain mildly provocative material.',
                                        'icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z'
                                    ],
                                    'questionable' => [
                                        'title' => 'Questionable',
                                        'desc' => 'Suggestive content. Leans towards ecchi or minimal clothing.',
                                        'icon' => 'M9.17 16l3.33-3.33 1.41 1.41L9.17 16zM21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-7a7 7 0 00-7 7 7 7 0 007 7 7 7 0 007-7 7 7 0 00-7-7zm0 10a1 1 0 110-2 1 1 0 010 2z'
                                    ],
                                    'explicit' => [
                                        'title' => 'Explicit',
                                        'desc' => 'Explicit adult content (NSFW). No safe content restrictions.',
                                        'icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z'
                                    ]
                                ];
                            @endphp

                            @foreach($availableRatings as $value => $info)
                                <label class="relative flex flex-col p-6 rounded-2xl border border-white/10 bg-slate-950/50 backdrop-blur-sm hover:bg-slate-900/80 cursor-pointer transition-all duration-300 select-none group focus-within:ring-2 focus-within:ring-cyan-400 focus-within:ring-offset-2 focus-within:ring-offset-slate-900 hover:shadow-[0_0_20px_rgba(34,211,238,0.15)] hover:border-cyan-500/40 hover:-translate-y-1">
                                    <div class="flex items-start gap-4 flex-grow">
                                        <div class="flex items-center mt-1 flex-shrink-0">
                                            <input
                                                type="checkbox"
                                                name="allowed_ratings[]"
                                                value="{{ $value }}"
                                                @if(in_array($value, old('allowed_ratings', auth()->user()->allowed_ratings ?? []))) checked @endif
                                                class="w-5 h-5 rounded text-cyan-500 bg-slate-950 border-white/10 focus:ring-cyan-500/50 focus:ring-offset-slate-900 accent-cyan-500 transition-all cursor-pointer shadow-inner focus-visible:outline-none"
                                            />
                                        </div>
                                        <div class="flex-grow">
                                            <div class="flex items-center gap-3 mb-2">
                                                <svg class="w-5 h-5 text-cyan-400 flex-shrink-0 group-hover:drop-shadow-[0_0_8px_rgba(34,211,238,0.8)] transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $info['icon'] }}"></path>
                                                </svg>
                                                <span class="font-black text-white text-lg tracking-tight">
                                                    {{ $info['title'] }}
                                                </span>
                                            </div>
                                            <span class="text-sm font-medium text-slate-400 leading-relaxed block">
                                                {{ $info['desc'] }}
                                            </span>
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="w-full mt-8 empty:hidden flex justify-center items-center relative z-10 min-h-[90px]">
                        <x-ads />
                    </div>

                    <div class="mt-8 pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-end gap-4">
                        <a href="{{ route('home') }}" class="w-full sm:w-auto text-sm font-bold uppercase tracking-widest text-slate-400 hover:text-white transition-colors px-6 py-4 rounded-full border border-transparent hover:border-white/10 hover:bg-slate-800/50 text-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            Cancel
                        </a>
                        <button type="submit" class="w-full sm:w-auto bg-gradient-to-r from-cyan-500 to-cyan-600 hover:from-cyan-400 hover:to-cyan-500 text-white font-black text-sm uppercase tracking-widest py-4 px-8 rounded-full transition-all duration-300 shadow-[0_0_20px_rgba(34,211,238,0.25)] hover:shadow-[0_0_30px_rgba(34,211,238,0.4)] hover:-translate-y-1 flex items-center justify-center gap-3 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Save Preferences
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </main>

    <x-footer />
  </body>
</html>