<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Terms of Service | {{ env('APP_NAME') }}</title>
    <meta name="description" content="Read {{ env('APP_NAME') }}'s Terms of Service to understand the rules, conditions, and guidelines for using our Honkai: Star Rail wallpaper platform." />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="{{ route('tos') }}" />

    <meta property="og:title" content="Terms of Service | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Read {{ env('APP_NAME') }}'s Terms of Service to understand the rules and conditions for using our HSR wallpaper platform." />
    <meta property="og:url" content="{{ route('tos') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "PolicyPage",
      "name": "Terms of Service",
      "url": "{{ route('tos') }}",
      "description": "The official Terms of Service for {{ env('APP_NAME') }}, outlining user guidelines and platform usage rules for the Honkai: Star Rail wallpaper database.",
      "publisher": {
        "@@type": "Organization",
        "name": "{{ env('APP_NAME') }}",
        "url": "{{ url('/') }}"
      }
    }
    </script>

    <x-assets />
    
  </head>
  <body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white antialiased overflow-x-hidden [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-600">
    <x-navbar />

    <main class="flex-grow pt-8 pb-32 relative text-slate-300">
        <div class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 mb-8 empty:hidden flex justify-center items-center relative z-10 min-h-[90px]">
            <x-ads />
        </div>

        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <section class="border-b border-white/5 mb-12 sm:mb-16">
                <div class="text-center py-20 sm:py-28 relative">
                    <div class="mb-8 flex items-center justify-center gap-2 text-xs font-bold text-slate-400 uppercase tracking-widest backdrop-blur-md bg-slate-900/80 w-fit mx-auto px-5 py-2.5 rounded-full border border-white/10 shadow-sm">
                        <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">Home</a>
                        <span class="text-slate-600">&bull;</span>
                        <span class="text-cyan-400 font-bold">Terms of Service</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black tracking-tight text-white leading-tight mb-6">
                        Terms of <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-500 drop-shadow-lg">Service</span>
                    </h1>
                    <p class="mt-5 text-base sm:text-xl font-medium text-slate-400 leading-relaxed max-w-2xl mx-auto">
                        Please read these terms carefully before accessing the {{ env('APP_NAME') }} Data Bank.
                    </p>
                </div>
            </section>

            <section class="max-w-4xl mx-auto space-y-6 sm:space-y-8">
                
                <div class="bg-slate-900/50 backdrop-blur-xl border border-white/10 rounded-3xl p-8 sm:p-12 shadow-2xl relative overflow-hidden group">
                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-cyan-500/10 rounded-full blur-[80px] pointer-events-none transition-all duration-700"></div>
                    
                    <p class="text-xs font-bold uppercase tracking-widest text-cyan-500 mb-6 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse shadow-[0_0_8px_rgba(34,211,238,0.8)]"></span>
                        Last updated: June 13, 2026
                    </p>
                    <div class="space-y-5 text-slate-300 font-medium leading-relaxed sm:text-lg relative z-10">
                        <p>
                            By accessing or using {{ env('APP_NAME') }}, you agree to be bound by these Terms of Service and all applicable laws and regulations. If you do not agree with any part of these terms, you should not use the website.
                        </p>
                        <p class="text-white font-bold border-l-2 border-cyan-500/50 bg-cyan-500/10 px-5 py-3 rounded-r-2xl">
                            These terms apply to all Trailblazers, visitors, and others who access or use the service.
                        </p>
                    </div>
                </div>

                <div class="w-full py-4 empty:hidden flex justify-center items-center relative z-10 min-h-[90px]">
                    <x-ads />
                </div>

                <div class="grid grid-cols-1 gap-6">
                    
                    <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-3xl p-8 sm:p-10 shadow-lg relative overflow-hidden transition-all duration-500 group/panel hover:shadow-[0_0_30px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/panel:opacity-100 transition-opacity duration-500"></div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white mb-6 flex items-center gap-4 relative z-10">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                            Use of the Website
                        </h2>
                        <div class="space-y-4 text-slate-400 font-medium leading-relaxed relative z-10">
                            <p>{{ env('APP_NAME') }} provides Honkai: Star Rail wallpapers and related content for personal, non-commercial use unless otherwise stated. You agree not to misuse the website, attempt unauthorized access, or interfere with its functionality.</p>
                            <p>You are responsible for ensuring that your use of the site complies with all applicable local, national, and international laws.</p>
                        </div>
                    </div>

                    <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-3xl p-8 sm:p-10 shadow-lg relative overflow-hidden transition-all duration-500 group/panel hover:shadow-[0_0_30px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/panel:opacity-100 transition-opacity duration-500"></div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white mb-6 flex items-center gap-4 relative z-10">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                            Intellectual Property & Disclaimer
                        </h2>
                        <div class="space-y-4 text-slate-400 font-medium leading-relaxed relative z-10">
                            <p>The website design, branding, and original code on {{ env('APP_NAME') }} are protected by intellectual property laws. You may not reproduce, distribute, or modify our site structure without permission.</p>
                            <p class="text-slate-200 font-semibold border-l-2 border-cyan-500 pl-4 py-1">Honkai: Star Rail, its characters, game assets, and official artwork are the property and copyright of HoYoverse (COGNOSPHERE PTE. LTD.). {{ env('APP_NAME') }} is an unofficial, fan-created platform and is not endorsed by, affiliated with, or sponsored by HoYoverse.</p>
                            <p>Third-party fan artwork remains the property of their respective creators. We respect creators and expect our users to do the same.</p>
                        </div>
                    </div>

                    <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-3xl p-8 sm:p-10 shadow-lg relative overflow-hidden transition-all duration-500 group/panel hover:shadow-[0_0_30px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/panel:opacity-100 transition-opacity duration-500"></div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white mb-6 flex items-center gap-4 relative z-10">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                            User Conduct
                        </h2>
                        <div class="space-y-4 text-slate-400 font-medium leading-relaxed relative z-10">
                            <p>As a Trailblazer on our platform, you agree not to upload malicious code, spam, or content that violates laws or the rights of others. Any attempt to exploit, scrape excessively, or damage the service may result in access restrictions.</p>
                            <p>We reserve the right to remove content or suspend access if we believe these terms have been violated.</p>
                        </div>
                    </div>

                    <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-3xl p-8 sm:p-10 shadow-lg relative overflow-hidden transition-all duration-500 group/panel hover:shadow-[0_0_30px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/panel:opacity-100 transition-opacity duration-500"></div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white mb-6 flex items-center gap-4 relative z-10">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                            Downloading Content
                        </h2>
                        <div class="space-y-4 text-slate-400 font-medium leading-relaxed relative z-10">
                            <p>HSR Wallpapers available on {{ env('APP_NAME') }} are provided for personal use. While we do our best to present accurate information, file sizes, resolutions, and availability may change without notice.</p>
                            <p>Downloads are provided as-is, and you use them at your own discretion and risk.</p>
                        </div>
                    </div>

                    <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-3xl p-8 sm:p-10 shadow-lg relative overflow-hidden transition-all duration-500 group/panel hover:shadow-[0_0_30px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/panel:opacity-100 transition-opacity duration-500"></div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white mb-6 flex items-center gap-4 relative z-10">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                            Limitation of Liability
                        </h2>
                        <div class="space-y-4 text-slate-400 font-medium leading-relaxed relative z-10">
                            <p>{{ env('APP_NAME') }} is provided on an "as is" and "as available" basis. We do not guarantee that the service will always be uninterrupted, secure, or error-free.</p>
                            <p>To the fullest extent permitted by law, {{ env('APP_NAME') }} shall not be liable for any damages resulting from your use of or inability to use the website.</p>
                        </div>
                    </div>

                    <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-3xl p-8 sm:p-10 shadow-lg relative overflow-hidden transition-all duration-500 group/panel hover:shadow-[0_0_30px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/panel:opacity-100 transition-opacity duration-500"></div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white mb-6 flex items-center gap-4 relative z-10">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                            Changes to These Terms
                        </h2>
                        <div class="space-y-4 text-slate-400 font-medium leading-relaxed relative z-10">
                            <p>We may update these Terms of Service from time to time. Any changes will be effective immediately upon posting on this page. Continued use of {{ env('APP_NAME') }} after changes means you accept the revised terms.</p>
                        </div>
                    </div>

                </div>

                <div class="mt-12 bg-gradient-to-br from-cyan-900/30 via-slate-900/60 to-cyan-900/20 backdrop-blur-xl border border-cyan-500/20 rounded-3xl p-10 sm:p-14 shadow-2xl relative overflow-hidden text-center group">
                    <div class="absolute inset-0 bg-cyan-500/5 blur-[40px] rounded-3xl pointer-events-none opacity-50 group-hover:opacity-100 transition-opacity duration-700"></div>
                    
                    <div class="relative z-10">
                        <h2 class="text-3xl sm:text-4xl font-black text-white mb-4 drop-shadow-md">Questions About These Terms?</h2>
                        <p class="text-slate-300 font-medium leading-relaxed mb-8 max-w-2xl mx-auto sm:text-lg">
                            If you have any questions about these Terms of Service, please contact us through the Contact page.
                        </p>
                        <a href="{{ route('contact') }}" class="group/btn inline-flex items-center justify-center gap-3 bg-gradient-to-r from-cyan-500 to-cyan-600 hover:from-cyan-400 hover:to-cyan-500 text-white font-black text-sm uppercase tracking-widest py-4 px-10 rounded-full transition-all duration-300 shadow-[0_0_20px_rgba(34,211,238,0.3)] hover:shadow-[0_0_30px_rgba(34,211,238,0.5)] hover:-translate-y-1 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            Contact Us
                            <svg class="w-5 h-5 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
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