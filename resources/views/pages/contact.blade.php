<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Contact Us | HSR Support & Feedback - {{ env('APP_NAME') }}</title>
    <meta name="description" content="Reach out to the {{ env('APP_NAME') }} team for support, business inquiries, partnership opportunities, or feedback regarding our Honkai: Star Rail wallpaper collection." />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="{{ route('contact') }}" />

    <meta property="og:title" content="Contact {{ env('APP_NAME') }} | Support & Feedback" />
    <meta property="og:description" content="Reach out to the {{ env('APP_NAME') }} team for support, business inquiries, partnership opportunities, or feedback regarding our Honkai: Star Rail wallpaper collection." />
    <meta property="og:url" content="{{ route('contact') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <script type="application/ld+json">
    [
      {
        "@@context": "https://schema.org",
        "@@type": "ContactPage",
        "name": "Contact {{ env('APP_NAME') }}",
        "url": "{{ route('contact') }}",
        "description": "Contact page for {{ env('APP_NAME') }}, offering channels for support, business, and legal inquiries regarding our HSR wallpaper database."
      },
      {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "{{ env('APP_NAME') }}",
        "url": "{{ url('/') }}",
        "contactPoint": [
          {
            "@@type": "ContactPoint",
            "email": "support@hsrwallpaper.web.id",
            "contactType": "customer support",
            "areaServed": "Worldwide"
          },
          {
            "@@type": "ContactPoint",
            "email": "business@hsrwallpaper.web.id",
            "contactType": "sales",
            "areaServed": "Worldwide"
          }
        ]
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
                        <span class="text-cyan-400 font-bold">Contact</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black tracking-tight text-white leading-tight mb-6">
                        Contact <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-500 drop-shadow-lg">Us</span>
                    </h1>
                    <p class="mt-5 text-base sm:text-xl font-medium text-slate-400 leading-relaxed max-w-2xl mx-auto">
                        Reach out to the Astral Express crew through the email addresses below.
                    </p>
                </div>
            </section>

            <section class="max-w-4xl mx-auto space-y-8 sm:space-y-12">
                <div class="bg-slate-900/50 backdrop-blur-xl border border-white/10 rounded-3xl p-8 sm:p-14 shadow-2xl relative overflow-hidden group">
                    <div class="absolute -top-24 -right-24 w-80 h-80 bg-cyan-500/10 rounded-full blur-[80px] pointer-events-none transition-all duration-700"></div>
                    <div class="absolute -bottom-24 -left-24 w-60 h-60 bg-cyan-500/10 rounded-full blur-[80px] pointer-events-none transition-all duration-700"></div>
                    
                    <div class="text-center relative z-10 mb-10">
                        <h2 class="text-3xl sm:text-4xl font-black text-white mb-4">
                            Email <span class="text-slate-400 font-medium">Contacts</span>
                        </h2>
                        <p class="text-slate-400 font-medium leading-relaxed max-w-2xl mx-auto">
                            For general support, business inquiries, or HSR content-related questions, use one of the email addresses below.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 relative z-10 text-left">
                        
                        <a href="mailto:support@hsrwallpaper.web.id" class="group/card relative bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-2xl p-6 transition-all duration-300 hover:shadow-[0_0_20px_rgba(34,211,238,0.1)] hover:-translate-y-1 flex items-start gap-5 overflow-hidden focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity"></div>
                            <div class="w-12 h-12 bg-cyan-500/10 rounded-xl flex items-center justify-center flex-shrink-0 border border-cyan-500/20 shadow-inner group-hover/card:bg-cyan-500/20 transition-colors">
                                <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div class="relative z-10">
                                <p class="text-xs font-bold uppercase tracking-widest text-cyan-500 mb-1">Support</p>
                                <p class="text-white font-black sm:text-lg group-hover/card:text-cyan-400 transition-colors truncate">support@hsrwallpaper.web.id</p>
                            </div>
                        </a>

                        <a href="mailto:business@hsrwallpaper.web.id" class="group/card relative bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-2xl p-6 transition-all duration-300 hover:shadow-[0_0_20px_rgba(34,211,238,0.1)] hover:-translate-y-1 flex items-start gap-5 overflow-hidden focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity"></div>
                            <div class="w-12 h-12 bg-cyan-500/10 rounded-xl flex items-center justify-center flex-shrink-0 border border-cyan-500/20 shadow-inner group-hover/card:bg-cyan-500/20 transition-colors">
                                <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="relative z-10">
                                <p class="text-xs font-bold uppercase tracking-widest text-cyan-500 mb-1">Business</p>
                                <p class="text-white font-black sm:text-lg group-hover/card:text-cyan-400 transition-colors truncate">business@hsrwallpaper.web.id</p>
                            </div>
                        </a>

                        <a href="mailto:privacy@hsrwallpaper.web.id" class="group/card relative bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-2xl p-6 transition-all duration-300 hover:shadow-[0_0_20px_rgba(34,211,238,0.1)] hover:-translate-y-1 flex items-start gap-5 overflow-hidden focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity"></div>
                            <div class="w-12 h-12 bg-cyan-500/10 rounded-xl flex items-center justify-center flex-shrink-0 border border-cyan-500/20 shadow-inner group-hover/card:bg-cyan-500/20 transition-colors">
                                <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div class="relative z-10">
                                <p class="text-xs font-bold uppercase tracking-widest text-cyan-500 mb-1">Privacy</p>
                                <p class="text-white font-black sm:text-lg group-hover/card:text-cyan-400 transition-colors truncate">privacy@hsrwallpaper.web.id</p>
                            </div>
                        </a>

                        <a href="mailto:dmca@hsrwallpaper.web.id" class="group/card relative bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-2xl p-6 transition-all duration-300 hover:shadow-[0_0_20px_rgba(34,211,238,0.1)] hover:-translate-y-1 flex items-start gap-5 overflow-hidden focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity"></div>
                            <div class="w-12 h-12 bg-cyan-500/10 rounded-xl flex items-center justify-center flex-shrink-0 border border-cyan-500/20 shadow-inner group-hover/card:bg-cyan-500/20 transition-colors">
                                <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <div class="relative z-10">
                                <p class="text-xs font-bold uppercase tracking-widest text-cyan-500 mb-1">DMCA</p>
                                <p class="text-white font-black sm:text-lg group-hover/card:text-cyan-400 transition-colors truncate">dmca@hsrwallpaper.web.id</p>
                            </div>
                        </a>

                    </div>
                </div>

                <div class="text-center bg-gradient-to-br from-cyan-900/30 via-slate-900/60 to-cyan-900/20 backdrop-blur-xl border border-cyan-500/20 rounded-3xl p-10 sm:p-12 shadow-2xl relative overflow-hidden group">
                    <div class="absolute inset-0 bg-cyan-500/5 blur-[40px] rounded-[2.5rem] pointer-events-none opacity-50 group-hover:opacity-100 transition-opacity duration-700"></div>
                    
                    <div class="relative z-10">
                        <div class="w-16 h-16 mx-auto bg-cyan-500/10 rounded-2xl flex items-center justify-center mb-6 border border-cyan-500/20 shadow-inner">
                            <svg class="w-8 h-8 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white mb-4 drop-shadow-md">Before You Email</h2>
                        <p class="text-slate-300 font-medium leading-relaxed max-w-2xl mx-auto">
                            Please include relevant details such as HSR character name, wallpaper URL, or a clear description of your request so we can assist you faster.
                        </p>
                    </div>
                </div>

            </section>
        </div>

        <div class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 mt-12 empty:hidden flex justify-center items-center relative z-10 min-h-[90px]">
            <x-ads />
        </div>
    </main>

    <x-footer />
  </body>
</html>