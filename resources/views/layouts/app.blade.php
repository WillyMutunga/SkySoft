<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SkySoft Systems | Smart Business Solutions & IT Infrastructure Kenya')</title>
    <meta name="description" content="@yield('meta_description', 'SkySoft Systems provides smart cloud POS systems, UPS power backup, enterprise cybersecurity, structured networking, and bespoke software solutions in Nairobi, Kenya.')">
    <link rel="icon" type="image/png" href="https://img.icons8.com/color/96/server.png">
    
    <!-- OpenGraph / Social Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'SkySoft Systems | Smart Business Solutions & IT Infrastructure Kenya')">
    <meta property="og:description" content="@yield('meta_description', 'SkySoft Systems provides smart cloud POS systems, UPS power backup, enterprise cybersecurity, structured networking, and bespoke software in Nairobi, Kenya.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="SkySoft Systems">

    <!-- JSON-LD Structured SEO Schema (LocalBusiness & Organization in Nairobi, Kenya) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ITService",
      "name": "SkySoft Systems",
      "image": "https://skysoftsystems.co.ke/assets/images/logo.jpg",
      "@id": "https://skysoftsystems.co.ke",
      "url": "https://skysoftsystems.co.ke",
      "telephone": "{{ $companySettings['company_phone'] ?? '+254712345678' }}",
      "priceRange": "KES",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Nairobi CBD",
        "addressLocality": "Nairobi",
        "addressRegion": "Nairobi County",
        "postalCode": "00100",
        "addressCountry": "KE"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": -1.286389,
        "longitude": 36.817223
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday"
        ],
        "opens": "08:00",
        "closes": "18:00"
      },
      "sameAs": [
        "{{ $companySettings['facebook_url'] ?? '#' }}",
        "{{ $companySettings['linkedin_url'] ?? '#' }}",
        "{{ $companySettings['twitter_url'] ?? '#' }}"
      ]
    }
    </script>
    
    <!-- Google Analytics 4 (GA4) -->
    @if(!empty($companySettings['google_analytics_id']))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $companySettings['google_analytics_id'] }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ $companySettings['google_analytics_id'] }}');
    </script>
    @endif

    <!-- Meta Pixel Code -->
    @if(!empty($companySettings['meta_pixel_id']))
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '{{ $companySettings['meta_pixel_id'] }}');
      fbq('track', 'PageView');
    </script>
    @endif

    <!-- Custom Head Tracking Scripts -->
    @if(!empty($companySettings['custom_head_scripts']))
    {!! $companySettings['custom_head_scripts'] !!}
    @endif
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        },
                        secondary: {
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .glassmorphism {
            background: rgba(255, 255, 255, 0.90);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .hero-pattern {
            background-color: #0f172a;
            background-image: radial-gradient(rgba(16, 185, 129, 0.15) 1px, transparent 1px), radial-gradient(rgba(59, 130, 246, 0.1) 1px, #0f172a 1px);
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
        }
    </style>
    @stack('styles')
</head>
<body class="font-sans antialiased text-slate-800 bg-slate-50 flex flex-col min-h-screen" x-data="{ mobileMenuOpen: false }">

    <!-- Top Notice / Contact Bar -->
    <div class="bg-secondary-950 text-slate-300 text-xs py-2 border-b border-slate-800 hidden sm:block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <span class="flex items-center text-emerald-400">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ $companySettings['office_address'] ?? 'Nairobi, Kenya' }} &bull; Fast Onsite & Remote Support
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <a href="mailto:{{ $companySettings['company_email'] ?? 'info@skysoftsystems.co.ke' }}" class="hover:text-emerald-400 transition">{{ $companySettings['company_email'] ?? 'info@skysoftsystems.co.ke' }}</a>
                </span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companySettings['company_whatsapp'] ?? '254712345678') }}" target="_blank" class="flex items-center text-emerald-400 hover:text-emerald-300 font-medium">
                    <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.53 1.771.815 2.796.815 3.182 0 5.768-2.587 5.768-5.767 0-3.18-2.586-5.767-5.768-5.767zm9.969 5.768c0 5.509-4.482 9.99-9.969 9.99-1.748 0-3.38-.456-4.806-1.254l-5.225 1.369 1.393-5.093c-.899-1.498-1.362-3.21-1.362-5.012 0-5.509 4.482-9.99 9.969-9.99 5.487 0 9.969 4.481 9.969 9.99z"/></svg>
                    WhatsApp: {{ $companySettings['company_phone'] ?? '+254 712 345 678' }}
                </a>
                <span class="text-slate-600">|</span>
                <a href="{{ route('admin.login') }}" class="text-slate-400 hover:text-white transition">Admin Portal</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header (Dark Luxury Glassmorphism) -->
    <header class="sticky top-0 z-50 bg-slate-950/85 backdrop-blur-xl border-b border-white/[0.08] transition-all duration-200 shadow-2xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-emerald-500 via-teal-400 to-cyan-400 flex items-center justify-center text-slate-950 shadow-lg shadow-emerald-500/25 group-hover:scale-105 transition-transform duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div>
                        <span class="text-2xl font-black tracking-tight text-white flex items-center">
                            SkySoft<span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300 ml-1">Systems</span>
                        </span>
                        <p class="text-[9px] uppercase font-bold tracking-widest text-slate-400 -mt-1">Enterprise IT & Power Solutions</p>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center space-x-1 font-medium text-slate-300 text-sm">
                    <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('home') ? 'text-emerald-400 bg-emerald-950/70 border border-emerald-800/60 font-bold' : 'hover:text-white hover:bg-white/[0.05]' }}">Home</a>
                    <a href="{{ route('about') }}" class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('about') ? 'text-emerald-400 bg-emerald-950/70 border border-emerald-800/60 font-bold' : 'hover:text-white hover:bg-white/[0.05]' }}">About Us</a>
                    <a href="{{ route('services') }}" class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('services') ? 'text-emerald-400 bg-emerald-950/70 border border-emerald-800/60 font-bold' : 'hover:text-white hover:bg-white/[0.05]' }}">Services</a>
                    <a href="{{ route('products.index') }}" class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('products.*') ? 'text-emerald-400 bg-emerald-950/70 border border-emerald-800/60 font-bold' : 'hover:text-white hover:bg-white/[0.05]' }}">Products</a>
                    <a href="{{ route('solutions') }}" class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('solutions') ? 'text-emerald-400 bg-emerald-950/70 border border-emerald-800/60 font-bold' : 'hover:text-white hover:bg-white/[0.05]' }}">Solutions</a>
                    <a href="{{ route('blog.index') }}" class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('blog.*') ? 'text-emerald-400 bg-emerald-950/70 border border-emerald-800/60 font-bold' : 'hover:text-white hover:bg-white/[0.05]' }}">Insights</a>
                    <a href="{{ route('contact') }}" class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('contact') ? 'text-emerald-400 bg-emerald-950/70 border border-emerald-800/60 font-bold' : 'hover:text-white hover:bg-white/[0.05]' }}">Contact</a>
                </nav>

                <!-- CTA Button -->
                <div class="hidden md:flex items-center space-x-3">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-400 hover:from-emerald-400 hover:to-teal-300 text-slate-950 font-extrabold text-xs transition shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/40 transform hover:-translate-y-0.5 group">
                        <span>Request a Quote</span>
                        <svg class="w-3.5 h-3.5 ml-1.5 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                <!-- Mobile Menu Hamburger Button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-white/[0.08] focus:outline-none" aria-label="Toggle Menu">
                        <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Navigation (Dark Glass) -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden border-t border-slate-800 bg-slate-950/95 backdrop-blur-2xl px-4 pt-4 pb-6 space-y-2 shadow-2xl" @click.away="mobileMenuOpen = false">
            <a href="{{ route('home') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('home') ? 'bg-emerald-950/80 text-emerald-400 border border-emerald-800/60' : 'text-slate-300 hover:bg-white/[0.04]' }}">Home</a>
            <a href="{{ route('about') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('about') ? 'bg-emerald-950/80 text-emerald-400 border border-emerald-800/60' : 'text-slate-300 hover:bg-white/[0.04]' }}">About Us</a>
            <a href="{{ route('services') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('services') ? 'bg-emerald-950/80 text-emerald-400 border border-emerald-800/60' : 'text-slate-300 hover:bg-white/[0.04]' }}">Services</a>
            <a href="{{ route('products.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('products.*') ? 'bg-emerald-950/80 text-emerald-400 border border-emerald-800/60' : 'text-slate-300 hover:bg-white/[0.04]' }}">Products</a>
            <a href="{{ route('solutions') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('solutions') ? 'bg-emerald-950/80 text-emerald-400 border border-emerald-800/60' : 'text-slate-300 hover:bg-white/[0.04]' }}">Solutions</a>
            <a href="{{ route('blog.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('blog.*') ? 'bg-emerald-950/80 text-emerald-400 border border-emerald-800/60' : 'text-slate-300 hover:bg-white/[0.04]' }}">Tech Insights</a>
            <a href="{{ route('contact') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('contact') ? 'bg-emerald-950/80 text-emerald-400 border border-emerald-800/60' : 'text-slate-300 hover:bg-white/[0.04]' }}">Contact</a>
            
            <div class="pt-4 border-t border-slate-800 flex flex-col space-y-2">
                <a href="{{ route('contact') }}" class="w-full text-center px-4 py-3 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-400 text-slate-950 font-bold text-xs shadow-md">Request Free Proposal</a>
                <a href="tel:{{ $companySettings['company_phone'] ?? '+254712345678' }}" class="w-full text-center px-4 py-2.5 rounded-xl border border-slate-800 text-slate-300 font-medium text-xs flex items-center justify-center">
                    <svg class="w-3.5 h-3.5 mr-2 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    Call: {{ $companySettings['company_phone'] ?? '+254 712 345 678' }}
                </a>
            </div>
        </div>
    </header>

    <!-- Global Flash Notification Messages -->
    @if(session('success'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-xl shadow-sm flex items-start justify-between" role="alert">
            <div class="flex items-center">
                <div class="flex-shrink-0 text-emerald-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-semibold text-emerald-800">{{ session('success') }}</p>
                </div>
            </div>
            <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-800">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>
    @endif

    @if(session('error') || $errors->any())
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="bg-rose-50 border-l-4 border-rose-500 p-4 rounded-r-xl shadow-sm flex items-start justify-between" role="alert">
            <div class="flex items-start">
                <div class="flex-shrink-0 text-rose-500 mt-0.5">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="ml-3 text-sm text-rose-800">
                    @if(session('error'))
                        <p class="font-semibold">{{ session('error') }}</p>
                    @endif
                    @if($errors->any())
                        <ul class="list-disc list-inside mt-1 space-y-0.5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <button onclick="this.parentElement.remove()" class="text-rose-600 hover:text-rose-800">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>
    @endif

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Floating WhatsApp Action Button -->
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companySettings['company_whatsapp'] ?? '254712345678') }}?text={{ urlencode('Hello SkySoft Systems, I would like to inquire about your IT & Power solutions.') }}" 
       target="_blank" 
       class="fixed bottom-6 right-6 z-50 bg-[#25D366] text-white p-3.5 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center group"
       title="Chat with us on WhatsApp">
        <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
    </a>

    <!-- Pre-Footer High-Impact CTA Banner (Present on all pages) -->
    <section class="bg-gradient-to-br from-slate-900 via-secondary-900 to-slate-950 text-white py-14 border-t border-slate-800 relative overflow-hidden">
        <div class="absolute -right-16 -bottom-16 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-16 -top-16 w-80 h-80 bg-teal-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="bg-slate-900/90 border border-slate-800 rounded-3xl p-8 sm:p-12 shadow-2xl flex flex-col lg:flex-row items-center justify-between gap-8 backdrop-blur-sm">
                <div class="space-y-3 max-w-2xl text-center lg:text-left">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-950/80 text-emerald-400 border border-emerald-800/60">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 mr-2 animate-pulse"></span>
                        East Africa Enterprise Technology Engineering
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                        Ready to Upgrade Your Business Systems & Power Resilience?
                    </h3>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Talk to our certified systems engineers in Nairobi for tailored POS hardware, KRA eTIMS software, online UPS power sizing, and enterprise networking.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-3.5 w-full sm:w-auto flex-shrink-0">
                    <a href="{{ route('contact') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-lg shadow-emerald-600/30 transition">
                        <span>Request Free Proposal</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companySettings['company_whatsapp'] ?? '254712345678') }}?text={{ urlencode('Hello SkySoft Systems, I would like to consult on an IT or Power solution.') }}" target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-semibold text-sm border border-slate-700 transition">
                        <svg class="w-4 h-4 mr-2 text-[#25D366] fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>WhatsApp Chat</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Footer -->
    <footer class="bg-secondary-950 text-slate-400 pt-16 pb-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-12 mb-14">
                
                <!-- Company Brand & Mission (Span 4) -->
                <div class="lg:col-span-4 space-y-5">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group inline-flex">
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-400 flex items-center justify-center text-white font-bold shadow-lg shadow-emerald-500/20">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <div>
                            <span class="text-2xl font-extrabold text-white tracking-tight">SkySoft<span class="text-emerald-400">Systems</span></span>
                            <p class="text-[10px] uppercase font-bold tracking-widest text-slate-500 -mt-0.5">Enterprise IT & Power Solutions</p>
                        </div>
                    </a>
                    <p class="text-sm leading-relaxed text-slate-400">
                        Leading provider of enterprise IT infrastructure, smart cloud Point-of-Sale (POS) systems, uninterrupted power supply (UPS), cybersecurity firewalls, and custom software across East Africa.
                    </p>
                    
                    <div class="flex items-center space-x-3 pt-1">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-950/80 text-emerald-400 border border-emerald-800/60">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 mr-2 animate-pulse"></span>
                            Trusted by 250+ Kenyan Businesses
                        </span>
                    </div>

                    <!-- Social Media Links -->
                    <div class="flex items-center space-x-3 pt-2">
                        <a href="{{ $companySettings['facebook_url'] ?? 'https://facebook.com' }}" target="_blank" class="w-9 h-9 rounded-xl bg-slate-900 hover:bg-emerald-600 border border-slate-800 hover:border-emerald-600 text-slate-400 hover:text-white flex items-center justify-center transition" aria-label="Facebook">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="{{ $companySettings['linkedin_url'] ?? 'https://linkedin.com' }}" target="_blank" class="w-9 h-9 rounded-xl bg-slate-900 hover:bg-emerald-600 border border-slate-800 hover:border-emerald-600 text-slate-400 hover:text-white flex items-center justify-center transition" aria-label="LinkedIn">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                        <a href="{{ $companySettings['twitter_url'] ?? 'https://twitter.com' }}" target="_blank" class="w-9 h-9 rounded-xl bg-slate-900 hover:bg-emerald-600 border border-slate-800 hover:border-emerald-600 text-slate-400 hover:text-white flex items-center justify-center transition" aria-label="Twitter">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companySettings['company_whatsapp'] ?? '254712345678') }}" target="_blank" class="w-9 h-9 rounded-xl bg-slate-900 hover:bg-[#25D366] border border-slate-800 hover:border-[#25D366] text-slate-400 hover:text-white flex items-center justify-center transition" aria-label="WhatsApp">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.53 1.771.815 2.796.815 3.182 0 5.768-2.587 5.768-5.767 0-3.18-2.586-5.767-5.768-5.767zm9.969 5.768c0 5.509-4.482 9.99-9.969 9.99-1.748 0-3.38-.456-4.806-1.254l-5.225 1.369 1.393-5.093c-.899-1.498-1.362-3.21-1.362-5.012 0-5.509 4.482-9.99 9.969-9.99 5.487 0 9.969 4.481 9.969 9.99z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Navigation (Span 2) -->
                <div class="lg:col-span-2">
                    <h4 class="text-white font-bold text-sm tracking-wider uppercase mb-5">Quick Links</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-emerald-400 transition flex items-center"><span class="text-emerald-500 mr-2">&rsaquo;</span>Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-emerald-400 transition flex items-center"><span class="text-emerald-500 mr-2">&rsaquo;</span>About Us</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-emerald-400 transition flex items-center"><span class="text-emerald-500 mr-2">&rsaquo;</span>Our Services</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-emerald-400 transition flex items-center"><span class="text-emerald-500 mr-2">&rsaquo;</span>Products Catalog</a></li>
                        <li><a href="{{ route('solutions') }}" class="hover:text-emerald-400 transition flex items-center"><span class="text-emerald-500 mr-2">&rsaquo;</span>Industry Solutions</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-emerald-400 transition flex items-center"><span class="text-emerald-500 mr-2">&rsaquo;</span>Contact Us</a></li>
                    </ul>
                </div>

                <!-- Core Products & Hardware (Span 3) -->
                <div class="lg:col-span-3">
                    <h4 class="text-white font-bold text-sm tracking-wider uppercase mb-5">Core Solutions</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('products.index', ['category' => 'Point of Sale (POS)']) }}" class="hover:text-emerald-400 transition flex items-center"><span class="text-emerald-500 mr-2">&bull;</span>Smart Touch POS Systems</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'Power Backup & UPS']) }}" class="hover:text-emerald-400 transition flex items-center"><span class="text-emerald-500 mr-2">&bull;</span>Online Pure Sine Wave UPS</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'Networking & Security']) }}" class="hover:text-emerald-400 transition flex items-center"><span class="text-emerald-500 mr-2">&bull;</span>Enterprise Network Firewalls</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'Enterprise Software']) }}" class="hover:text-emerald-400 transition flex items-center"><span class="text-emerald-500 mr-2">&bull;</span>School & Campus ERP Portal</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'Security & Surveillance']) }}" class="hover:text-emerald-400 transition flex items-center"><span class="text-emerald-500 mr-2">&bull;</span>AI CCTV & Biometrics</a></li>
                    </ul>
                </div>

                <!-- Contact & Office Info (Span 3) -->
                <div class="lg:col-span-3 space-y-4">
                    <h4 class="text-white font-bold text-sm tracking-wider uppercase mb-5">Contact & Support</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-emerald-400 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>{{ $companySettings['office_address'] ?? 'Nairobi, Kenya' }}</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-emerald-400 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <a href="tel:{{ $companySettings['company_phone'] ?? '+254712345678' }}" class="hover:text-emerald-400 transition font-semibold">{{ $companySettings['company_phone'] ?? '+254 712 345 678' }}</a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-emerald-400 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:{{ $companySettings['company_email'] ?? 'info@skysoftsystems.co.ke' }}" class="hover:text-emerald-400 transition truncate">{{ $companySettings['company_email'] ?? 'info@skysoftsystems.co.ke' }}</a>
                        </li>
                        <li class="flex items-center text-xs text-slate-500 pt-1">
                            <svg class="w-4 h-4 text-slate-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ $companySettings['working_hours'] ?? 'Mon - Sat: 8:00 AM - 6:00 PM' }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Copyright & Legal -->
            <div class="pt-8 border-t border-slate-800/80 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500 gap-4">
                <p>&copy; {{ date('Y') }} SkySoft Systems. All rights reserved. Registered Technology & Power Solutions Provider in Kenya.</p>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('admin.login') }}" class="hover:text-emerald-400 transition flex items-center">
                        <svg class="w-3.5 h-3.5 mr-1 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <span>Staff Login</span>
                    </a>
                    <a href="{{ route('contact') }}" class="hover:text-slate-400 transition">Contact & Support</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
