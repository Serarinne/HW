<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Active Honkai: Star Rail Redeem Codes - Free Stellar Jade | {{ env('APP_NAME') }}</title>
    <meta name="description" content="Get the latest active Honkai: Star Rail promo codes. Redeem for free Stellar Jade, Credits, and exclusive in-game rewards." />
    
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="{{ route('redeems.index') }}" />

    <meta property="og:title" content="Active HSR Redeem Codes - Free Stellar Jade | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Get the latest active Honkai: Star Rail promo codes. Redeem for free Stellar Jade, Credits, and exclusive in-game rewards." />
    <meta property="og:url" content="{{ route('redeems.index') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <x-assets />
    
  </head>
  
  <body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white antialiased overflow-x-hidden [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-600">
    <x-navbar />

    <main class="flex-grow relative w-full text-slate-300">
        <section class="relative z-10 border-b border-white/5 bg-slate-950/50 backdrop-blur-md min-h-[300px] flex flex-col justify-center">
            <div class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 text-center flex flex-col items-center justify-center">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight mb-6">
                    Active HSR <br class="hidden sm:block"/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-400 drop-shadow-lg">Redeem Codes</span>
                </h1>
                <p class="text-base sm:text-lg text-slate-400 font-medium leading-relaxed max-w-2xl mx-auto">
                    Grab your free Stellar Jade and Credits! Here is the updated list of working promo codes for Honkai: Star Rail.
                </p>
            </div>
        </section>

        <section class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 relative z-10">

            @if(isset($codes) && $codes->count() > 0)
                <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-8 gap-4 border-b border-white/10 pb-4">
                    <div class="space-y-2">
                        <p class="text-xs font-bold uppercase tracking-widest text-cyan-400 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-cyan-500 animate-pulse shadow-[0_0_8px_rgba(168,85,247,0.8)]"></span> 
                            Updated Regularly
                        </p>
                        <h2 class="text-2xl sm:text-3xl font-black text-white">
                            Working <span class="text-slate-400 font-medium">Codes</span>
                        </h2>
                    </div>
                    <span class="text-xs font-black uppercase tracking-widest text-cyan-400 bg-cyan-500/10 px-4 py-2 rounded-xl border border-cyan-500/20 shadow-inner hidden sm:flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
                        {{ $codes->total() }} Available
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-12">
                    @foreach($codes as $code)
                        <article class="group relative bg-slate-900 rounded-2xl overflow-hidden shadow-lg ring-1 ring-white/10 hover:ring-cyan-500/50 hover:shadow-[0_0_25px_rgba(168,85,247,0.2)] transform hover:-translate-y-1.5 transition-all duration-300 flex flex-col" x-data="{ copied: false, codeText: '{{ addslashes($code->code) }}' }">
                            
                            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-24 bg-cyan-500/10 blur-[40px] pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                            <div class="block aspect-[21/9] overflow-hidden relative bg-slate-950 flex items-center justify-center border-b border-white/5 shadow-inner w-full">
                                <span class="text-3xl sm:text-4xl font-mono font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-400 tracking-widest break-all px-4 text-center group-hover:scale-105 transition-transform duration-500 drop-shadow-md">
                                    {{ $code->code }}
                                </span>
                                
                                <div class="absolute top-4 left-4">
                                    @if($code->expired_at)
                                        <span class="bg-rose-500/10 backdrop-blur-md border border-rose-500/30 text-rose-400 text-xs font-black uppercase tracking-wider px-3 py-1.5 rounded-lg shadow-sm flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Exp: {{ \Carbon\Carbon::parse($code->expired_at)->format('d M Y') }}
                                        </span>
                                    @else
                                        <span class="bg-emerald-500/10 backdrop-blur-md border border-emerald-500/30 text-emerald-400 text-xs font-black uppercase tracking-wider px-3 py-1.5 rounded-lg shadow-sm flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            No Expiry
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="p-6 flex flex-col flex-grow relative z-10">
                                <div class="flex items-center text-xs text-amber-500/90 mb-3 space-x-4">
                                    <span class="flex items-center gap-1.5 font-black uppercase tracking-widest bg-amber-500/10 px-2.5 py-1 rounded border border-amber-500/20 shadow-inner">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"></path></svg>
                                        Rewards Included
                                    </span>
                                </div>

                                <div class="block mb-6">
                                    <h2 class="text-lg font-bold text-white leading-snug group-hover:text-cyan-400 transition-colors">
                                        {{ $code->reward_description }}
                                    </h2>
                                </div>

                                <div class="mt-auto pt-6 border-t border-white/5">
                                    <button @click="copyToClipboardSecure(codeText).then(() => { copied = true; setTimeout(() => copied = false, 2000) })"
                                            aria-label="Copy promo code {{ $code->code }}"
                                            class="w-full flex items-center justify-between bg-slate-950 border border-white/5 hover:border-cyan-500/50 rounded-xl p-1.5 shadow-inner transition-all duration-300 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 cursor-pointer group/btn overflow-hidden relative">
                                        
                                        <div class="absolute inset-0 bg-cyan-500/5 opacity-0 group-hover/btn:opacity-100 transition-opacity"></div>
                                        
                                        <span class="px-4 font-mono text-cyan-400 font-bold tracking-widest truncate relative z-10">
                                            {{ $code->code }}
                                        </span>
                                        <span :class="copied ? 'bg-emerald-500/20 text-emerald-400 border-emerald-500/30' : 'bg-slate-900 group-hover/btn:bg-gradient-to-r group-hover/btn:from-cyan-500 group-hover/btn:to-cyan-500 group-hover/btn:text-white border-white/5 group-hover/btn:border-transparent text-slate-300'" class="px-5 py-2.5 rounded-[0.6rem] font-bold text-xs uppercase tracking-wider transition-all duration-300 flex items-center justify-center min-w-[110px] shrink-0 border relative z-10 shadow-sm">
                                            <span x-show="!copied" class="flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                                Copy
                                            </span>
                                            <span x-show="copied" x-cloak class="flex items-center gap-1.5">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                                Copied
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if($codes->hasPages())
                  <div class="mt-12">
                      {{ $codes->links('components.pagination') }}
                  </div>
                @endif

            @else
                <div class="flex flex-col items-center justify-center py-20 px-4 text-center bg-slate-900/50 border border-dashed border-slate-700/50 rounded-3xl backdrop-blur-sm w-full max-w-3xl mx-auto">
                    <div class="w-20 h-20 mb-6 rounded-full bg-slate-800/80 flex items-center justify-center ring-1 ring-white/5">
                        <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white mb-3">No Active Codes</h2>
                    <p class="text-base text-slate-400 max-w-md mx-auto leading-relaxed">
                        There are currently no active promo codes available. Please check back later for new Honkai: Star Rail code drops!
                    </p>
                </div>
            @endif

            <div class="w-full my-12 empty:hidden flex justify-center items-center">
                <x-ads />
            </div>

            <div class="mt-16 bg-slate-900/50 backdrop-blur-md border border-white/5 rounded-[2.5rem] p-8 md:p-14 relative overflow-hidden shadow-xl group">
                
                <div class="absolute -top-32 -right-32 w-96 h-96 bg-cyan-500/10 rounded-full blur-[100px] pointer-events-none group-hover:bg-cyan-500/20 transition-all duration-700"></div>
                
                <div class="text-center mb-14 relative z-10">
                    <p class="text-xs font-bold uppercase tracking-widest text-cyan-400 mb-3">Tutorial</p>
                    <h2 class="text-3xl md:text-4xl font-black text-white mb-4">How to Redeem Codes in HSR</h2>
                    <p class="text-slate-400 font-medium">Follow these simple steps to claim your Stellar Jade in-game.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 relative z-10">
                    
                    <div class="flex flex-col items-center text-center group/step">
                        <div class="w-16 h-16 rounded-[1.25rem] bg-slate-950 text-cyan-400 font-black text-2xl flex items-center justify-center ring-1 ring-white/10 shadow-lg group-hover/step:ring-cyan-500/50 group-hover/step:shadow-[0_0_25px_rgba(34,211,238,0.2)] transition-all duration-300 group-hover/step:-translate-y-1.5">
                            1
                        </div>
                        <div class="mt-6">
                            <h3 class="font-bold text-white text-lg mb-3">Open the Phone Menu</h3>
                            <p class="text-sm text-slate-400 leading-relaxed">Launch Honkai: Star Rail and log into your account. Press <span class="text-cyan-400 font-semibold">ESC (or tap the phone icon)</span> to open the Phone Menu.</p>
                        </div>
                    </div>
                    
                    <div class="flex flex-col items-center text-center group/step relative">
                        <div class="hidden md:block absolute top-8 -left-[calc(50%-2rem)] w-[calc(100%-4rem)] h-[2px] bg-gradient-to-r from-cyan-500/0 via-cyan-500/20 to-cyan-500/0 -z-10"></div>
                        
                        <div class="w-16 h-16 rounded-[1.25rem] bg-slate-950 text-cyan-400 font-black text-2xl flex items-center justify-center ring-1 ring-white/10 shadow-lg group-hover/step:ring-cyan-500/50 group-hover/step:shadow-[0_0_25px_rgba(34,211,238,0.2)] transition-all duration-300 group-hover/step:-translate-y-1.5">
                            2
                        </div>
                        <div class="mt-6">
                            <h3 class="font-bold text-white text-lg mb-3">Go to Redemption Code</h3>
                            <p class="text-sm text-slate-400 leading-relaxed">Click or tap the <span class="text-cyan-400 font-semibold">... (three dots)</span> button next to your Trailblazer profile name, then select <span class="text-cyan-400 font-semibold">Redemption Code</span>.</p>
                        </div>
                    </div>
                    
                    <div class="flex flex-col items-center text-center group/step relative">
                        <div class="hidden md:block absolute top-8 -left-[calc(50%-2rem)] w-[calc(100%-4rem)] h-[2px] bg-gradient-to-r from-cyan-500/0 via-cyan-500/20 to-cyan-500/0 -z-10"></div>

                        <div class="w-16 h-16 rounded-[1.25rem] bg-slate-950 text-cyan-400 font-black text-2xl flex items-center justify-center ring-1 ring-white/10 shadow-lg group-hover/step:ring-cyan-500/50 group-hover/step:shadow-[0_0_25px_rgba(34,211,238,0.2)] transition-all duration-300 group-hover/step:-translate-y-1.5">
                            3
                        </div>
                        <div class="mt-6">
                            <h3 class="font-bold text-white text-lg mb-3">Enter Code & Claim</h3>
                            <p class="text-sm text-slate-400 leading-relaxed">Paste your code and click <span class="text-cyan-400 font-semibold">Confirm</span>. Finally, check your in-game <span class="text-cyan-400 font-semibold">Mailbox</span> to collect your rewards!</p>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </main>

    <x-footer />

    <script>
        function copyToClipboardSecure(text) {
            if (navigator.clipboard && window.isSecureContext) {
                return navigator.clipboard.writeText(text);
            } else {
                return new Promise((resolve, reject) => {
                    let textArea = document.createElement("textarea");
                    textArea.value = text;
                    textArea.style.position = "fixed";
                    textArea.style.left = "-999999px";
                    textArea.style.top = "-999999px";
                    document.body.appendChild(textArea);
                    textArea.focus();
                    textArea.select();
                    try {
                        let successful = document.execCommand('copy');
                        if(successful) {
                            resolve();
                        } else {
                            reject(new Error("Copy failed"));
                        }
                    } catch (err) {
                        reject(err);
                    } finally {
                        textArea.remove();
                    }
                });
            }
        }
    </script>
  </body>
</html>