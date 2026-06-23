<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth bg-slate-950">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>{{ $post->seo_title ?? $post->title }} | HSR News & Guides - {{ env('APP_NAME') }}</title>
    <meta name="description" content="{{ $post->seo_description ?? $post->excerpt ?? Str::limit(strip_tags($post->body), 150) }}" />
    
    @if(!empty($post->seo_keywords))
    <meta name="keywords" content="{{ $post->seo_keywords }}" />
    @endif

    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <meta property="og:title" content="{{ $post->seo_title ?? $post->title }}" />
    <meta property="og:description" content="{{ $post->seo_description ?? $post->excerpt ?? Str::limit(strip_tags($post->body), 150) }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    @if($post->featured_image)
    <meta property="og:image" content="{{ env('STORAGE_URL').'/' . $post->featured_image . '.webp' }}" />
    <meta property="og:image:alt" content="{{ $post->title }}" />
    @endif
    <meta property="article:published_time" content="{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->toIso8601String() }}" />
    <meta property="article:modified_time" content="{{ $post->updated_at->toIso8601String() }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $post->seo_title ?? $post->title }}" />
    <meta name="twitter:description" content="{{ $post->seo_description ?? $post->excerpt ?? Str::limit(strip_tags($post->body), 150) }}" />
    @if($post->featured_image)
    <meta name="twitter:image" content="{{ env('STORAGE_URL').'/' . $post->featured_image . '.webp' }}" />
    @endif

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "BlogPosting",
      "mainEntityOfPage": {
        "@@type": "WebPage",
        "@@id": "{{ url()->current() }}"
      },
      "headline": "{{ $post->title }}",
      "description": "{{ $post->seo_description ?? $post->excerpt ?? Str::limit(strip_tags($post->body), 150) }}",
      @if($post->featured_image)
      "image": [
        "{{ env('STORAGE_URL').'/' . $post->featured_image . '.webp' }}"
      ],
      @endif
      "datePublished": "{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->toIso8601String() }}",
      "dateModified": "{{ $post->updated_at->toIso8601String() }}",
      "author": {
        "@@type": "Organization",
        "name": "{{ env('APP_NAME') }} Data Bank",
        "url": "{{ url('/') }}"
      },
      "publisher": {
        "@@type": "Organization",
        "name": "{{ env('APP_NAME') }}",
        "logo": {
          "@@type": "ImageObject",
          "url": "{{ env('STORAGE_URL') }}/assets/logo.png" 
        }
      }
    }
    </script>
    
    <x-assets />
  </head>
  <body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-white antialiased overflow-x-hidden [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-600">
    <x-navbar />

    <main class="flex-grow pt-8 pb-32 relative text-slate-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col items-center">
            
            <!-- Breadcrumbs -->
            <div class="mb-8 flex flex-wrap justify-center items-center gap-2 text-xs font-bold text-slate-400 uppercase tracking-widest backdrop-blur-md bg-slate-900/80 w-fit px-5 py-2.5 rounded-full border border-white/10 shadow-sm">
                <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">Home</a>
                <span class="text-slate-600">&bull;</span>
                <a href="{{ route('posts.index') }}" class="hover:text-cyan-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900 rounded-sm">Logs</a>
                <span class="text-slate-600">&bull;</span>
                <span class="text-cyan-400 truncate max-w-[150px] sm:max-w-xs">{{ $post->title }}</span>
            </div>

            <!-- Article Container -->
            <article class="w-full bg-slate-900/50 backdrop-blur-xl border border-white/10 rounded-3xl overflow-hidden p-6 sm:p-12 lg:p-16 shadow-2xl relative group flex flex-col items-center">
                
                <div class="absolute inset-0 bg-gradient-to-tr from-cyan-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                
                <header class="w-full mb-10 text-center relative z-10">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight drop-shadow-md mb-8 mx-auto max-w-3xl">
                        {{ $post->title }}
                    </h1>

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-4 mb-10 max-w-2xl mx-auto">
                        <div class="bg-slate-950/50 backdrop-blur-md border border-white/10 p-4 rounded-2xl flex flex-col items-center justify-center text-center shadow-inner hover:bg-slate-800/80 transition-colors">
                            <span class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-1">Author</span>
                            <span class="text-sm font-black text-cyan-400">{{ env('APP_NAME') }}</span>
                        </div>
                        <div class="bg-slate-950/50 backdrop-blur-md border border-white/10 p-4 rounded-2xl flex flex-col items-center justify-center text-center shadow-inner hover:bg-slate-800/80 transition-colors">
                            <span class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-1">Published</span>
                            <span class="text-sm font-black text-white">{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('d M Y') }}</span>
                        </div>
                        <div class="col-span-2 sm:col-span-1 bg-slate-950/50 backdrop-blur-md border border-white/10 p-4 rounded-2xl flex flex-col items-center justify-center text-center shadow-inner hover:bg-slate-800/80 transition-colors">
                            <span class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-1">Views</span>
                            <span class="text-sm font-black text-white">{{ number_format($post->views_count) }}</span>
                        </div>
                    </div>
                </header>

                @if($post->featured_image)
                    <div class="w-full mb-12 flex justify-center relative z-10">
                        <img src="{{ env('STORAGE_URL').'/' . $post->featured_image . '.webp' }}" 
                             alt="{{ $post->title }}" 
                             width="800" height="450"
                             class="w-full h-auto max-h-[60vh] object-cover rounded-3xl drop-shadow-[0_15px_35px_rgba(0,0,0,0.6)] bg-slate-950 border border-white/5 transition-transform duration-700 hover:scale-[1.02] [mask-image:linear-gradient(to_bottom,black_70%,transparent_100%)] -webkit-mask-image:linear-gradient(to_bottom,black_70%,transparent_100%)" 
                             fetchpriority="high" />
                    </div>
                @endif

                <div class="w-full mb-8 empty:hidden flex justify-center items-center min-h-[90px] relative z-10">
                    <x-ads />
                </div>

                <!-- Article Content -->
                <div class="w-full prose prose-invert prose-slate prose-lg max-w-none relative z-10 px-0 sm:px-4 
                            prose-headings:text-slate-100 prose-headings:font-black prose-headings:mt-10 prose-headings:mb-4
                            prose-p:text-slate-300 prose-p:leading-relaxed prose-p:mb-6
                            prose-a:text-cyan-500 hover:prose-a:text-cyan-400 prose-a:no-underline hover:prose-a:underline prose-a:transition-colors
                            prose-strong:text-slate-100 prose-strong:font-bold
                            prose-ul:text-slate-300 prose-ol:text-slate-300
                            prose-img:rounded-3xl prose-img:shadow-2xl prose-img:mx-auto prose-img:border prose-img:border-white/10">
                    {!! $post->body !!}
                </div>

                <hr class="w-full border-white/10 my-12 relative z-10">

                <!-- Social Share -->
                <div class="w-full bg-slate-950/60 backdrop-blur-md border border-white/10 p-6 rounded-3xl shadow-inner mt-4 max-w-lg mx-auto relative z-10">
                    <h3 class="text-xs font-bold text-slate-400 mb-4 uppercase tracking-widest text-center">Share this log</h3>
                    <div class="flex gap-3">
                        <a class="inline-flex flex-auto justify-center items-center p-4 rounded-xl text-white bg-slate-900 hover:bg-[#1877F2] transition-colors border border-white/5 shadow-sm group focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#1877F2] focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950" target="_blank" rel="noopener" href="https://facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" aria-label="Share on Facebook">
                            <svg fill="currentColor" viewBox="0 0 512 512" class="w-5 h-5 transition-transform group-hover:scale-110" aria-hidden="true"><path d="M379 22v75h-44c-36 0-42 17-42 41v54h84l-12 85h-72v217h-88V277h-72v-85h72v-62c0-72 45-112 109-112 31 0 58 3 65 4z"></path></svg>
                        </a>
                        <a class="inline-flex flex-auto justify-center items-center p-4 rounded-xl text-white bg-slate-900 hover:bg-[#1DA1F2] transition-colors border border-white/5 shadow-sm group focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#1DA1F2] focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950" target="_blank" rel="noopener" href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" aria-label="Share on Twitter">
                            <svg fill="currentColor" viewBox="0 0 512 512" class="w-5 h-5 transition-transform group-hover:scale-110" aria-hidden="true"><path d="m459 152 1 13c0 139-106 299-299 299-59 0-115-17-161-47a217 217 0 0 0 156-44c-47-1-85-31-98-72l19 1c10 0 19-1 28-3-48-10-84-52-84-103v-2c14 8 30 13 47 14A105 105 0 0 1 36 67c51 64 129 106 216 110-2-8-2-16-2-24a105 105 0 0 1 181-72c24-4 47-13 67-25-8 24-25 45-46 58 21-3 41-8 60-17-14 21-32 40-53 55z"></path></svg>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Back Button -->
            <div class="mt-12 flex justify-center relative z-10">
                <a href="{{ route('posts.index') }}" class="group flex items-center justify-center gap-3 bg-slate-900/60 border border-white/10 text-white hover:bg-slate-800 hover:border-cyan-500/30 font-bold py-4 px-8 rounded-full transition-all duration-300 backdrop-blur-md outline-none shadow-lg focus-visible:ring-2 focus-visible:ring-cyan-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                    <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    <span>Back to Astral Express Logs</span>
                </a>
            </div>

        </div>
    </main>

    <x-footer />
  </body>
</html>