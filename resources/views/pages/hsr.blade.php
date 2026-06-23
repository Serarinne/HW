<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Privacy Policy HSR | {{ env('APP_NAME') }}</title>
    <meta name="description" content="Read the Privacy Policy for {{ env('APP_NAME') }}. Understand what information we collect, how we use it, and your rights related to your data." />
    <meta name="robots" content="noindex, nofollow" />
    <link rel="canonical" href="{{ route('privacy-hsr') }}" />

    <meta property="og:title" content="Privacy Policy HSR | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Understand what information we collect, how we use it, and your rights related to your data." />
    <meta property="og:url" content="{{ route('privacy-hsr') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "PolicyPage",
      "name": "Privacy Policy HSR",
      "url": "{{ route('privacy-hsr') }}",
      "description": "The official privacy policy for {{ env('APP_NAME') }}, outlining data collection and protection practices.",
      "publisher": {
        "@@type": "Organization",
        "name": "{{ env('APP_NAME') }}",
        "url": "{{ url('/') }}"
      }
    }
    </script>

    <x-assets />
    
    <style>
      .no-scrollbar::-webkit-scrollbar { display: none; }
      .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
      .break-inside-avoid { break-inside: avoid; }
      .card-hover {
        transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease;
      }
      .card-hover:hover {
        transform: translateY(-4px);
        border-color: rgba(34, 211, 238, 0.28);
        box-shadow: 0 14px 30px rgba(0,0,0,0.25);
      }
      [x-cloak] { display: none !important; }
    </style>
  </head>
  <body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white">
    <x-navbar />

    <main class="flex-grow py-6 sm:py-10">
      <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <section class="border-b border-white/10">
          <div class="text-center py-20 sm:py-24">
            <div class="mb-6 flex items-center gap-2 text-xs font-semibold text-slate-400 uppercase tracking-widest justify-center">
              <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950 rounded-sm">Home</a>
              <span>&bull;</span>
              <span class="text-white font-medium">Privacy Policy HSR</span>
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-tight">
              Privacy Policy HSR
            </h1>
            <p class="mt-5 text-base sm:text-lg text-slate-400 leading-8 max-w-2xl mx-auto">
              Learn how we collect, use, and protect your information when you use our Application.
            </p>
          </div>
        </section>

        <section class="mt-10 sm:mt-12">
          <div class="space-y-8">
            <div class="bg-slate-900 border border-white/10 rounded-3xl p-8 sm:p-10">
              <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-4">Last updated: June 14, 2026</p>
              <p class="text-slate-300 leading-relaxed">
                This privacy policy applies to the <strong>HSR Wallpapers 4K</strong> (serarinne.hsrwallpaper4k) app (hereby referred to as "Application") for mobile devices that was created by <strong>Serarinne</strong> (hereby referred to as "Service Provider") as a Free service. This service is intended for use "AS IS".
              </p>
            </div>

            <div class="grid grid-cols-1 gap-6">
              
              <div class="bg-slate-900 border border-white/10 rounded-3xl p-8 sm:p-10">
                <h2 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                  <span class="w-1 h-6 bg-cyan-500 rounded-full"></span>
                  Information Collection and Use
                </h2>
                <p class="text-slate-300 leading-relaxed mb-4">
                  The Application collects information when you download and use it. This information may include information such as:
                </p>
                <ul class="list-disc pl-6 space-y-2 text-slate-300 mb-4">
                  <li>Your device's Internet Protocol address (e.g. IP address)</li>
                  <li>The pages of the Application that you visit, the time and date of your visit, the time spent on those pages</li>
                  <li>The time spent on the Application</li>
                  <li>The operating system you use on your mobile device</li>
                </ul>
                <p class="text-slate-300 leading-relaxed mb-4">
                  The Application does not gather precise information about the location of your mobile device.
                </p>
                <p class="text-slate-300 leading-relaxed mb-4">
                  The Service Provider may use the information you provided to contact you from time to time to provide you with important information, required notices and marketing promotions.
                </p>
                <p class="text-slate-300 leading-relaxed">
                  For a better experience, while using the Application, the Service Provider may require you to provide us with certain personally identifiable information. The information that the Service Provider request will be retained by them and used as described in this privacy policy.
                </p>
              </div>

              <div class="bg-slate-900 border border-white/10 rounded-3xl p-8 sm:p-10">
                <h2 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                  <span class="w-1 h-6 bg-cyan-500 rounded-full"></span>
                  Third Party Access
                </h2>
                <p class="text-slate-300 leading-relaxed mb-4">
                  Only aggregated, anonymized data is periodically transmitted to external services to aid the Service Provider in improving the Application and their service. The Service Provider may share your information with third parties in the ways that are described in this privacy statement.
                </p>
                <p class="text-slate-300 leading-relaxed mb-4">
                  Please note that the Application utilizes third-party services that have their own Privacy Policy about handling data. Below are the links to the Privacy Policy of the third-party service providers used by the Application:
                </p>
                <ul class="list-disc pl-6 space-y-2 text-slate-300 mb-6">
                  <li><a href="https://www.google.com/policies/privacy/" target="_blank" rel="noopener noreferrer" class="text-cyan-400 hover:text-cyan-400 hover:underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">Google Play Services</a></li>
                  <li><a href="https://support.google.com/admob/answer/6128543?hl=en" target="_blank" rel="noopener noreferrer" class="text-cyan-400 hover:text-cyan-400 hover:underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">AdMob</a></li>
                  <li><a href="https://onesignal.com/privacy_policy" target="_blank" rel="noopener noreferrer" class="text-cyan-400 hover:text-cyan-400 hover:underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">One Signal</a></li>
                  <li><a href="https://www.applovin.com/privacy/" target="_blank" rel="noopener noreferrer" class="text-cyan-400 hover:text-cyan-400 hover:underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">AppLovin</a></li>
                  <li><a href="https://www.startapp.com/privacy/" target="_blank" rel="noopener noreferrer" class="text-cyan-400 hover:text-cyan-400 hover:underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">StartApp</a></li>
                </ul>
                <p class="text-slate-300 leading-relaxed mb-4">
                  The Service Provider may disclose User Provided and Automatically Collected Information:
                </p>
                <ul class="list-disc pl-6 space-y-2 text-slate-300">
                  <li>as required by law, such as to comply with a subpoena, or similar legal process;</li>
                  <li>when they believe in good faith that disclosure is necessary to protect their rights, protect your safety or the safety of others, investigate fraud, or respond to a government request;</li>
                  <li>with their trusted services providers who work on their behalf, do not have an independent use of the information we disclose to them, and have agreed to adhere to the rules set forth in this privacy statement.</li>
                </ul>
              </div>

              <div class="bg-slate-900 border border-white/10 rounded-3xl p-8 sm:p-10">
                <h2 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                  <span class="w-1 h-6 bg-cyan-500 rounded-full"></span>
                  Opt-Out Rights
                </h2>
                <p class="text-slate-300 leading-relaxed">
                  You can stop all collection of information by the Application easily by uninstalling it. You may use the standard uninstall processes as may be available as part of your mobile device or via the mobile application marketplace or network.
                </p>
              </div>

              <div class="bg-slate-900 border border-white/10 rounded-3xl p-8 sm:p-10">
                <h2 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                  <span class="w-1 h-6 bg-cyan-500 rounded-full"></span>
                  Data Retention Policy
                </h2>
                <p class="text-slate-300 leading-relaxed">
                  The Service Provider will retain User Provided data for as long as you use the Application and for a reasonable time thereafter. If you'd like them to delete User Provided Data that you have provided via the Application, please contact them at <a href="mailto:serarinne@gmail.com" class="text-cyan-400 hover:text-cyan-400 hover:underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">serarinne@gmail.com</a> and they will respond in a reasonable time.
                </p>
              </div>

              <div class="bg-slate-900 border border-white/10 rounded-3xl p-8 sm:p-10">
                <h2 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                  <span class="w-1 h-6 bg-cyan-500 rounded-full"></span>
                  Children
                </h2>
                <p class="text-slate-300 leading-relaxed mb-4">
                  The Service Provider does not use the Application to knowingly solicit data from or market to children under the age of 13.
                </p>
                <p class="text-slate-300 leading-relaxed">
                  The Application does not address anyone under the age of 13. The Service Provider does not knowingly collect personally identifiable information from children under 13 years of age. In the case the Service Provider discover that a child under 13 has provided personal information, the Service Provider will immediately delete this from their servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact the Service Provider so that they will be able to take the necessary actions.
                </p>
              </div>

              <div class="bg-slate-900 border border-white/10 rounded-3xl p-8 sm:p-10">
                <h2 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                  <span class="w-1 h-6 bg-cyan-500 rounded-full"></span>
                  Security
                </h2>
                <p class="text-slate-300 leading-relaxed">
                  The Service Provider is concerned about safeguarding the confidentiality of your information. The Service Provider provides physical, electronic, and procedural safeguards to protect information the Service Provider processes and maintains.
                </p>
              </div>

              <div class="bg-slate-900 border border-white/10 rounded-3xl p-8 sm:p-10">
                <h2 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                  <span class="w-1 h-6 bg-cyan-500 rounded-full"></span>
                  Changes
                </h2>
                <p class="text-slate-300 leading-relaxed mb-4">
                  This Privacy Policy may be updated from time to time for any reason. The Service Provider will notify you of any changes to the Privacy Policy by updating this page with the new Privacy Policy. You are advised to consult this Privacy Policy regularly for any changes, as continued use is deemed approval of all changes.
                </p>
                <p class="text-slate-400 italic mt-4 text-xs font-bold uppercase tracking-widest">
                  This privacy policy is effective as of 2025-05-09
                </p>
              </div>

              <div class="bg-slate-900 border border-white/10 rounded-3xl p-8 sm:p-10">
                <h2 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                  <span class="w-1 h-6 bg-cyan-500 rounded-full"></span>
                  Your Consent
                </h2>
                <p class="text-slate-300 leading-relaxed">
                  By using the Application, you are consenting to the processing of your information as set forth in this Privacy Policy now and as amended by us.
                </p>
              </div>

              <div class="bg-gradient-to-br from-cyan-500/10 to-cyan-600/5 border border-cyan-500/20 rounded-3xl p-8 sm:p-10 text-center">
                <h2 class="text-2xl font-bold text-white mb-4">Contact Us</h2>
                <p class="text-slate-300 leading-relaxed mb-6 max-w-2xl mx-auto">
                  If you have any questions regarding privacy while using the Application, or have questions about the practices, please contact the Service Provider via email.
                </p>
                <a href="mailto:serarinne@gmail.com" class="inline-flex items-center gap-3 bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-extrabold py-4 px-8 rounded-2xl text-lg transition-all shadow-[0_8px_25px_rgba(34,211,238,0.2)] hover:shadow-[0_12px_30px_rgba(34,211,238,0.35)] hover:-translate-y-0.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                  <span>Email Us</span>
                </a>
              </div>
              
            </div>
          </div>
        </section>
      </div>
    </main>

    <x-footer />
  </body>
</html>