@extends('layouts.app')

@section('title', 'SkySoft Systems | Enterprise POS, Networking & Cloud IT Solutions Nairobi')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden hero-pattern text-white py-20 lg:py-28">
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/90 to-emerald-950/40 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Hero Content -->
            <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-semibold uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                    <span>Next-Gen Business Technology Kenya</span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-tight">
                    Smart IT Systems Engineered for <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-200">Unstoppable Growth</span>
                </h1>
                
                <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                    Transform your retail, school, or corporate enterprise with robust <strong>Smart Cloud POS systems</strong>, <strong>Online UPS power protection</strong>, <strong>cybersecurity firewalls</strong>, and tailored software solutions.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                    <a href="{{ route('products.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 rounded-xl bg-emerald-500 text-slate-950 font-bold text-base hover:bg-emerald-400 transition shadow-lg shadow-emerald-500/25 hover:shadow-emerald-500/40 transform hover:-translate-y-0.5">
                        <span>Explore Products</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ route('contact') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-slate-700 text-white font-semibold text-base transition">
                        <span>Book Free Consultation</span>
                    </a>
                </div>

                <!-- Trust Metrics / Stats -->
                <div class="grid grid-cols-3 gap-6 pt-6 border-t border-slate-800/80 max-w-lg mx-auto lg:mx-0">
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-white">99.9%</div>
                        <div class="text-xs text-slate-400 uppercase font-medium mt-1">Uptime Reliability</div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-emerald-400">250+</div>
                        <div class="text-xs text-slate-400 uppercase font-medium mt-1">Active Deployments</div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-teal-300">24/7</div>
                        <div class="text-xs text-slate-400 uppercase font-medium mt-1">Kenya Support</div>
                    </div>
                </div>
            </div>

            <!-- Right Hero Card / Showcase -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <!-- Glow Behind Card -->
                    <div class="absolute -inset-1.5 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-3xl blur-xl opacity-30 animate-tilt"></div>
                    
                    <div class="relative bg-slate-900 border border-slate-700/80 rounded-2xl p-6 sm:p-8 shadow-2xl space-y-6">
                        <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 rounded-full bg-rose-500"></div>
                                <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                                <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                            </div>
                            <span class="text-xs font-mono text-emerald-400 bg-emerald-950/60 px-2.5 py-1 rounded border border-emerald-800/40">KRA eTIMS & M-Pesa Ready</span>
                        </div>

                        <div class="space-y-4">
                            <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/50 flex items-start space-x-4">
                                <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-bold text-sm">Smart POS Systems</h4>
                                    <p class="text-xs text-slate-400 mt-1">Instant barcode scanning, automated M-Pesa push, multi-branch cloud inventory.</p>
                                </div>
                            </div>

                            <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/50 flex items-start space-x-4">
                                <div class="w-10 h-10 rounded-lg bg-blue-500/20 text-blue-400 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-bold text-sm">Online UPS Power Protection</h4>
                                    <p class="text-xs text-slate-400 mt-1">LightWave, Mercer & APC pure sine wave backup for non-stop uptime.</p>
                                </div>
                            </div>

                            <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/50 flex items-start space-x-4">
                                <div class="w-10 h-10 rounded-lg bg-indigo-500/20 text-indigo-400 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-bold text-sm">Enterprise Cyber Firewalls</h4>
                                    <p class="text-xs text-slate-400 mt-1">Intrusion prevention, load balancing, and secure multi-branch VPN tunnels.</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-2">
                            <a href="{{ route('contact') }}" class="block w-full py-3 px-4 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-bold text-sm text-center shadow-md transition">
                                Get Instant Pricing Quote &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Core Services Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs uppercase font-bold tracking-widest text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-full">End-to-End Technology</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Our Core Services & Solutions</h2>
            <p class="text-slate-600 text-base leading-relaxed">
                We design, install, and support full-stack technology environments tailored to Kenyan businesses, educational institutions, and healthcare providers.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Service 1 -->
            <div class="bg-slate-50 border border-slate-200/80 rounded-2xl p-8 hover:shadow-xl hover:border-emerald-500/40 hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Custom Software & Web Apps</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Tailored enterprise ERPs, client portals, automated workflow automation, and custom web applications built with cutting-edge frameworks.
                    </p>
                    <ul class="text-xs text-slate-500 space-y-2 pt-2">
                        <li class="flex items-center"><span class="text-emerald-500 mr-2 font-bold">&check;</span> School Management & ERP Portals</li>
                        <li class="flex items-center"><span class="text-emerald-500 mr-2 font-bold">&check;</span> M-Pesa & Bank API Integrations</li>
                        <li class="flex items-center"><span class="text-emerald-500 mr-2 font-bold">&check;</span> Cloud Hosted & Mobile Responsive</li>
                    </ul>
                </div>
                <div class="pt-6 mt-6 border-t border-slate-200">
                    <a href="{{ route('services') }}" class="text-sm font-semibold text-emerald-600 hover:text-emerald-700 inline-flex items-center group-hover:translate-x-1 transition">
                        <span>Learn more</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="bg-slate-50 border border-slate-200/80 rounded-2xl p-8 hover:shadow-xl hover:border-emerald-500/40 hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-700 flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Network Cabling & Fiber LAN</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        High-speed structured Cat6/Cat6A cabling, optical fiber splicing, server rack builds, and enterprise WiFi access point deployments.
                    </p>
                    <ul class="text-xs text-slate-500 space-y-2 pt-2">
                        <li class="flex items-center"><span class="text-emerald-500 mr-2 font-bold">&check;</span> Structured Voice & Data Cabling</li>
                        <li class="flex items-center"><span class="text-emerald-500 mr-2 font-bold">&check;</span> Managed L2/L3 Switches & Routers</li>
                        <li class="flex items-center"><span class="text-emerald-500 mr-2 font-bold">&check;</span> Enterprise Roaming WiFi Solutions</li>
                    </ul>
                </div>
                <div class="pt-6 mt-6 border-t border-slate-200">
                    <a href="{{ route('services') }}" class="text-sm font-semibold text-emerald-600 hover:text-emerald-700 inline-flex items-center group-hover:translate-x-1 transition">
                        <span>Learn more</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="bg-slate-50 border border-slate-200/80 rounded-2xl p-8 hover:shadow-xl hover:border-emerald-500/40 hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-indigo-100 text-indigo-700 flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Cybersecurity & UTM Gateways</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Protect corporate confidential data with advanced next-generation firewalls, multi-WAN load balancing, and site-to-site branch VPNs.
                    </p>
                    <ul class="text-xs text-slate-500 space-y-2 pt-2">
                        <li class="flex items-center"><span class="text-emerald-500 mr-2 font-bold">&check;</span> Zero-Trust Network Architecture</li>
                        <li class="flex items-center"><span class="text-emerald-500 mr-2 font-bold">&check;</span> Multi-WAN Automatic Failover</li>
                        <li class="flex items-center"><span class="text-emerald-500 mr-2 font-bold">&check;</span> Content Filtering & User Access Logs</li>
                    </ul>
                </div>
                <div class="pt-6 mt-6 border-t border-slate-200">
                    <a href="{{ route('services') }}" class="text-sm font-semibold text-emerald-600 hover:text-emerald-700 inline-flex items-center group-hover:translate-x-1 transition">
                        <span>Learn more</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Featured Products Spotlight -->
<section class="py-20 bg-slate-100/70 border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="text-xs uppercase font-bold tracking-widest text-emerald-600 bg-emerald-100/80 px-3 py-1.5 rounded-full">Tested & Proven Hardware</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight mt-3">Featured Business Products</h2>
                <p class="text-slate-600 text-sm mt-2 max-w-xl">
                    Discover high-performance hardware and bundled systems configured with Kenya power and telecom compatibility.
                </p>
            </div>
            <a href="{{ route('products.index') }}" class="mt-4 md:mt-0 inline-flex items-center text-emerald-600 hover:text-emerald-700 font-bold text-sm">
                <span>View Full Catalog</span>
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredProducts as $product)
            <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Product Image -->
                    <div class="relative h-48 bg-slate-100 overflow-hidden">
                        <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1556742049-0a67e5572293?auto=format&fit=crop&w=800&q=80' }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @if($product->badge)
                        <span class="absolute top-3 left-3 bg-emerald-600 text-white text-[11px] uppercase tracking-wider font-extrabold px-2.5 py-1 rounded-md shadow-md">
                            {{ $product->badge }}
                        </span>
                        @endif
                        <span class="absolute top-3 right-3 bg-slate-900/80 text-white text-xs font-semibold px-2.5 py-1 rounded-md backdrop-blur-sm">
                            {{ $product->category }}
                        </span>
                    </div>

                    <!-- Product Body -->
                    <div class="p-5 space-y-3">
                        <h3 class="font-bold text-base text-slate-900 group-hover:text-emerald-600 transition line-clamp-2">
                            <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                        </h3>
                        <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed">
                            {{ $product->short_description }}
                        </p>
                        
                        <div class="pt-2">
                            <span class="text-lg font-extrabold text-slate-900">{{ $product->formatted_price }}</span>
                        </div>
                    </div>
                </div>

                <!-- Product Footer Action -->
                <div class="p-5 pt-0">
                    <a href="{{ route('products.show', $product->slug) }}" class="w-full py-2.5 px-4 rounded-xl bg-slate-100 hover:bg-emerald-600 hover:text-white text-slate-800 font-semibold text-xs transition flex items-center justify-center">
                        <span>View Specifications</span>
                        <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Why Choose SkySoft Systems -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <div class="space-y-6">
                <span class="text-xs uppercase font-bold tracking-widest text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-full">The SkySoft Advantage</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    Why Kenyan Enterprises Partner with SkySoft Systems
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    We combine international engineering standards with deep localized knowledge of Kenya's retail, commercial, and financial ecosystems.
                </p>

                <div class="space-y-4 pt-2">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold flex-shrink-0 mt-1">1</div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-base">Certified Kenya Power & Network Engineering</h4>
                            <p class="text-xs text-slate-600 mt-1">Our power backup and networking setups are built specifically to handle local power fluctuations and surge spikes.</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold flex-shrink-0 mt-1">2</div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-base">Direct M-Pesa & KRA eTIMS Compliance</h4>
                            <p class="text-xs text-slate-600 mt-1">Eliminate manual reconciliations with direct C2B/B2C automated STK pushes and instant fiscal receipt generation.</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold flex-shrink-0 mt-1">3</div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-base">Rapid Response Onsite Maintenance</h4>
                            <p class="text-xs text-slate-600 mt-1">Dedicated Nairobi-based technical support team ready for physical field interventions and 24/7 remote monitoring.</p>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <a href="{{ route('about') }}" class="inline-flex items-center px-6 py-3 rounded-xl bg-slate-900 text-white font-semibold text-sm hover:bg-slate-800 transition">
                        <span>Read Our Story</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>

            <!-- Visual Graphic / Grid -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-emerald-600 to-teal-700 text-white p-6 rounded-2xl space-y-2 shadow-lg">
                    <span class="text-3xl font-extrabold">250+</span>
                    <p class="text-xs uppercase font-bold text-emerald-200">Satisfied Clients</p>
                    <p class="text-xs text-emerald-100">Supermarkets, schools, corporate offices, and hospitals across Kenya.</p>
                </div>
                <div class="bg-slate-900 text-white p-6 rounded-2xl space-y-2 shadow-lg">
                    <span class="text-3xl font-extrabold text-teal-400">100%</span>
                    <p class="text-xs uppercase font-bold text-slate-400">Genuine Hardware</p>
                    <p class="text-xs text-slate-300">Direct authorized partner warranties for LightWave, Mercer, APC, and HP.</p>
                </div>
                <div class="bg-slate-100 p-6 rounded-2xl space-y-2 border border-slate-200">
                    <span class="text-3xl font-extrabold text-slate-900">2 Hr</span>
                    <p class="text-xs uppercase font-bold text-slate-600">Avg Support Response</p>
                    <p class="text-xs text-slate-500">Quick remote diagnostics and fast dispatch in Nairobi & environs.</p>
                </div>
                <div class="bg-emerald-50 p-6 rounded-2xl space-y-2 border border-emerald-200">
                    <span class="text-3xl font-extrabold text-emerald-700">10+</span>
                    <p class="text-xs uppercase font-bold text-emerald-800">Years Experience</p>
                    <p class="text-xs text-emerald-700">Experienced engineers with proven multi-site enterprise rollouts.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Call to Action Banner -->
<section class="py-16 bg-gradient-to-r from-emerald-900 via-slate-900 to-secondary-950 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-6">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
            Ready to Upgrade Your Company's Tech Infrastructure?
        </h2>
        <p class="text-slate-300 max-w-2xl mx-auto text-base">
            Contact our systems engineers today for a complimentary site assessment and customized quote.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-2">
            <a href="{{ route('contact') }}" class="px-8 py-3.5 rounded-xl bg-emerald-500 text-slate-950 font-bold text-sm hover:bg-emerald-400 transition shadow-lg shadow-emerald-500/30">
                Request a Custom Quote
            </a>
            <a href="https://wa.me/254712345678" target="_blank" class="px-8 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-semibold text-sm transition">
                Chat with Specialist on WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
