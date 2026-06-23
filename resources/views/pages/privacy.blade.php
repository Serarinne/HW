<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Privacy Policy | {{ env('APP_NAME') }}</title>
    <meta name="description" content="Read {{ env('APP_NAME') }}'s Privacy Policy to learn how we collect, use, and protect your information to ensure a safe HSR Data Bank experience." />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="{{ route('privacy') }}" />

    <meta property="og:title" content="Privacy Policy | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Read {{ env('APP_NAME') }}'s Privacy Policy to learn how we collect, use, and protect your information." />
    <meta property="og:url" content="{{ route('privacy') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "PolicyPage",
      "name": "Privacy Policy",
      "url": "{{ route('privacy') }}",
      "description": "The official privacy policy for {{ env('APP_NAME') }}, outlining data collection and protection practices.",
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
                        <span class="text-cyan-400 font-bold">Privacy Policy</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black tracking-tight text-white leading-tight mb-6">
                        Privacy <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-500 drop-shadow-lg">Policy</span>
                    </h1>
                    <p class="mt-5 text-base sm:text-xl font-medium text-slate-400 leading-relaxed max-w-2xl mx-auto">
                        Learn how we collect, use, and protect your information when you access the {{ env('APP_NAME') }} Data Bank.
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
                            {{ env('APP_NAME') }} respects your privacy and is committed to protecting any personal information you may share with us as a Trailblazer on our platform. This Privacy Policy explains what information we collect, how we use it, and the choices you have regarding your data.
                        </p>
                        <p class="text-white font-bold border-l-2 border-cyan-500/50 bg-cyan-500/10 px-5 py-3 rounded-r-2xl">
                            By using {{ env('APP_NAME') }}, you agree to the practices described in this policy.
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
                            Information We Collect
                        </h2>
                        <div class="space-y-4 text-slate-400 font-medium leading-relaxed relative z-10">
                            <p>We may collect information you voluntarily provide, such as your name, email address, and message when you contact us. We may also collect limited technical data automatically, including browser type, device information, IP address, and pages visited.</p>
                            <p>If you create an account or interact with favorites and downloads, we may store related activity to improve your personalized experience.</p>
                        </div>
                    </div>

                    <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-3xl p-8 sm:p-10 shadow-lg relative overflow-hidden transition-all duration-500 group/panel hover:shadow-[0_0_30px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/panel:opacity-100 transition-opacity duration-500"></div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white mb-6 flex items-center gap-4 relative z-10">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                            How We Use Information
                        </h2>
                        <div class="space-y-4 text-slate-400 font-medium leading-relaxed relative z-10">
                            <p>We use collected information to operate and maintain the website, respond to inquiries, personalize content, improve performance, and monitor usage trends within our community.</p>
                            <p>We may also use your information to send important updates related to the service, security notices, or policy changes.</p>
                        </div>
                    </div>

                    <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-3xl p-8 sm:p-10 shadow-lg relative overflow-hidden transition-all duration-500 group/panel hover:shadow-[0_0_30px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/panel:opacity-100 transition-opacity duration-500"></div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white mb-6 flex items-center gap-4 relative z-10">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                            Cookies and Analytics
                        </h2>
                        <div class="space-y-4 text-slate-400 font-medium leading-relaxed relative z-10">
                            <p>{{ env('APP_NAME') }} may use cookies and similar technologies to remember preferences, support core functionality, and analyze traffic. These tools help us understand how Trailblazers use the site so we can improve the experience.</p>
                            <p>You can disable cookies through your browser settings, but some parts of the website may not function properly.</p>
                        </div>
                    </div>

                    <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-3xl p-8 sm:p-10 shadow-lg relative overflow-hidden transition-all duration-500 group/panel hover:shadow-[0_0_30px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/panel:opacity-100 transition-opacity duration-500"></div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white mb-6 flex items-center gap-4 relative z-10">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                            Data Sharing
                        </h2>
                        <div class="space-y-4 text-slate-400 font-medium leading-relaxed relative z-10">
                            <p>We do not sell your personal information. We may share limited data with trusted service providers who help us operate the website, as long as they agree to keep that information secure and confidential.</p>
                            <p>We may also disclose information if required by law or to protect our rights, users, or the integrity of our service.</p>
                        </div>
                    </div>

                    <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-3xl p-8 sm:p-10 shadow-lg relative overflow-hidden transition-all duration-500 group/panel hover:shadow-[0_0_30px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/panel:opacity-100 transition-opacity duration-500"></div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white mb-6 flex items-center gap-4 relative z-10">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                            Data Security
                        </h2>
                        <div class="space-y-4 text-slate-400 font-medium leading-relaxed relative z-10">
                            <p>We take reasonable technical and organizational measures to help protect your information from unauthorized access, alteration, disclosure, or destruction.</p>
                            <p>However, no method of transmission over the internet or electronic storage is completely secure, so we cannot guarantee absolute security.</p>
                        </div>
                    </div>

                    <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-3xl p-8 sm:p-10 shadow-lg relative overflow-hidden transition-all duration-500 group/panel hover:shadow-[0_0_30px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/panel:opacity-100 transition-opacity duration-500"></div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white mb-6 flex items-center gap-4 relative z-10">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                            Your Choices
                        </h2>
                        <div class="space-y-4 text-slate-400 font-medium leading-relaxed relative z-10">
                            <p>You may contact us to request access, correction, or deletion of personal information where applicable. You can also control cookies through your browser settings and adjust how you interact with the site.</p>
                            <p>If you no longer wish to receive communications from us, you may opt out by following the instructions in the message or contacting us directly.</p>
                        </div>
                    </div>

                    <div class="bg-slate-950/50 backdrop-blur-sm border border-white/10 hover:border-cyan-500/30 rounded-3xl p-8 sm:p-10 shadow-lg relative overflow-hidden transition-all duration-500 group/panel hover:shadow-[0_0_30px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover/panel:opacity-100 transition-opacity duration-500"></div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white mb-6 flex items-center gap-4 relative z-10">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-cyan-400 to-cyan-500 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)]"></span>
                            Third-Party Links
                        </h2>
                        <div class="space-y-4 text-slate-400 font-medium leading-relaxed relative z-10">
                            <p>{{ env('APP_NAME') }} may contain links to third-party websites or services. We are not responsible for the privacy practices or content of those external sites, and we encourage you to review their policies before providing any information.</p>
                        </div>
                    </div>

                </div>

                <div class="mt-12 bg-gradient-to-br from-cyan-900/30 via-slate-900/60 to-cyan-900/20 backdrop-blur-xl border border-cyan-500/20 rounded-3xl p-10 sm:p-14 shadow-2xl relative overflow-hidden text-center group">
                    <div class="absolute inset-0 bg-cyan-500/5 blur-[40px] rounded-[2.5rem] pointer-events-none opacity-50 group-hover:opacity-100 transition-opacity duration-700"></div>
                    
                    <div class="relative z-10">
                        <h2 class="text-3xl sm:text-4xl font-black text-white mb-4 drop-shadow-md">Contact Us</h2>
                        <p class="text-slate-300 font-medium leading-relaxed mb-8 max-w-2xl mx-auto sm:text-lg">
                            If you have any questions about this Privacy Policy or how your information is handled, please reach out through our Contact page.
                        </p>
                        <a href="{{ route('contact') }}" class="group/btn inline-flex items-center justify-center gap-3 bg-gradient-to-r from-cyan-500 to-cyan-600 hover:from-cyan-400 hover:to-cyan-500 text-white font-black text-sm uppercase tracking-widest py-4 px-10 rounded-full transition-all duration-300 shadow-[0_0_20px_rgba(34,211,238,0.3)] hover:shadow-[0_0_30px_rgba(34,211,238,0.5)] hover:-translate-y-1 outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                            Go to Contact
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