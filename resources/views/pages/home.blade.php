@extends('layouts.app')

@section('title', 'SkySoft Systems | Enterprise POS, Online UPS & IT Infrastructure Nairobi, Kenya')

@section('content')
<!-- Hero Section with Bright Datacenter Server Racks -->
<section class="relative overflow-hidden bg-slate-950 text-white pt-24 pb-20 lg:pt-32 lg:pb-28 min-h-[640px] flex items-center">
    <!-- Server Datacenter Background with Brightness & Contrast Boost -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/images/hero-datacenter.jpg') }}" 
             alt="SkySoft Enterprise Server Datacenter Infrastructure" 
             class="w-full h-full object-cover object-center filter brightness-[1.25] contrast-[1.12] saturate-[1.3] transform scale-105 transition duration-1000">
        <!-- High-tech dark glassmorphism gradient overlay to ensure perfect text contrast while highlighting glowing rack LEDs -->
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/92 via-slate-950/75 to-slate-950/50 backdrop-blur-[1px]"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-slate-950/70"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_50%,rgba(16,185,129,0.18),transparent_60%)]"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Hero Content -->
            <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
                <div class="inline-flex items-center space-x-2.5 px-4 py-2 rounded-full bg-slate-900/80 border border-emerald-500/40 text-emerald-300 text-xs font-semibold uppercase tracking-wider backdrop-blur-md shadow-lg shadow-emerald-500/10">
                    <span class="flex h-2.5 w-2.5 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-400"></span>
                    </span>
                    <span>Enterprise IT & POS Infrastructure &bull; Nairobi, Kenya</span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-[1.15]">
                    Smart IT Systems Engineered for <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-cyan-300">Unstoppable Growth</span>
                </h1>
                
                <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-normal">
                    Empowering Kenyan retail supermarkets, healthcare facilities, schools, and enterprises with certified <strong>Touch POS Terminals</strong>, <strong>KRA eTIMS & M-Pesa Automations</strong>, <strong>0ms Online UPS Units</strong>, and <strong>Enterprise Cyber Security</strong>.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                    <a href="{{ route('products.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 text-slate-950 font-bold text-base transition-all duration-300 shadow-lg shadow-emerald-500/25 hover:shadow-emerald-500/40 transform hover:-translate-y-0.5">
                        <span>Explore Hardware Catalog</span>
                        <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ route('contact') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 rounded-xl bg-slate-900/80 hover:bg-slate-800/90 border border-slate-700/80 text-white font-semibold text-base backdrop-blur-md transition-all duration-300 shadow-sm hover:border-slate-600">
                        <span>Book Site Assessment</span>
                    </a>
                </div>

                <!-- Trust Metrics / Stats -->
                <div class="grid grid-cols-3 gap-6 pt-6 border-t border-slate-800/80 max-w-lg mx-auto lg:mx-0">
                    <div class="p-3 rounded-xl bg-slate-900/40 border border-white/[0.04]">
                        <div class="text-2xl sm:text-3xl font-extrabold text-white">99.99%</div>
                        <div class="text-[11px] text-slate-400 uppercase tracking-wider font-semibold mt-1">Uptime SLA</div>
                    </div>
                    <div class="p-3 rounded-xl bg-slate-900/40 border border-white/[0.04]">
                        <div class="text-2xl sm:text-3xl font-extrabold text-emerald-400">250+</div>
                        <div class="text-[11px] text-slate-400 uppercase tracking-wider font-semibold mt-1">Deployments</div>
                    </div>
                    <div class="p-3 rounded-xl bg-slate-900/40 border border-white/[0.04]">
                        <div class="text-2xl sm:text-3xl font-extrabold text-teal-300">0ms</div>
                        <div class="text-[11px] text-slate-400 uppercase tracking-wider font-semibold mt-1">Power Transfer</div>
                    </div>
                </div>
            </div>

            <!-- Right Hero Card / Interactive Hardware & Cloud Showcase -->
            <div class="lg:col-span-5 relative">
                <!-- Glowing Aura -->
                <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500/30 to-teal-500/20 rounded-3xl blur-2xl opacity-70"></div>
                
                <!-- Main Enterprise Glass Showcase Container -->
                <div class="relative bg-slate-900/90 backdrop-blur-xl border border-white/10 rounded-2xl p-5 sm:p-6 shadow-2xl space-y-5">
                    
                    <!-- Console Top Bar -->
                    <div class="flex items-center justify-between border-b border-white/[0.08] pb-3">
                        <div class="flex items-center space-x-2">
                            <span class="w-3 h-3 rounded-full bg-rose-500/80 inline-block shadow-sm shadow-rose-500/50"></span>
                            <span class="w-3 h-3 rounded-full bg-amber-500/80 inline-block shadow-sm shadow-amber-500/50"></span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500 inline-block shadow-sm shadow-emerald-500/50"></span>
                            <span class="text-[11px] font-mono text-slate-400 ml-2">SkySoft Enterprise OS v4.2</span>
                        </div>
                        <span class="text-[10px] font-mono text-emerald-400 bg-emerald-500/10 px-2 py-0.5 rounded border border-emerald-500/30 flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> LIVE SYSTEM
                        </span>
                    </div>

                    <!-- Hardware & Solution Modules -->
                    <div class="space-y-3.5">
                        
                        <!-- Module 1: Smart Touch POS & eTIMS + M-Pesa -->
                        <div class="p-3.5 rounded-xl bg-slate-800/70 border border-white/[0.06] hover:border-emerald-500/40 transition-all duration-300 group">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start space-x-3">
                                    <div class="w-9 h-9 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-500 group-hover:text-slate-950 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <h4 class="text-white font-bold text-sm">Dual-Screen Touch POS</h4>
                                            <span class="text-[9px] bg-emerald-500/20 text-emerald-300 font-bold px-1.5 py-0.5 rounded border border-emerald-500/30">eTIMS VSCU</span>
                                        </div>
                                        <p class="text-xs text-slate-300 mt-0.5">Automated M-Pesa STK Push &bull; Real-time KRA QR Code</p>
                                    </div>
                                </div>
                                <span class="text-emerald-400 font-mono text-xs font-bold">READY</span>
                            </div>
                        </div>

                        <!-- Module 2: Online UPS Pure Sine Wave Power -->
                        <div class="p-3.5 rounded-xl bg-slate-800/70 border border-white/[0.06] hover:border-teal-500/40 transition-all duration-300 group">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start space-x-3">
                                    <div class="w-9 h-9 rounded-lg bg-teal-500/20 text-teal-400 flex items-center justify-center flex-shrink-0 group-hover:bg-teal-500 group-hover:text-slate-950 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <h4 class="text-white font-bold text-sm">Online Double-Conversion UPS</h4>
                                            <span class="text-[9px] bg-teal-500/20 text-teal-300 font-bold px-1.5 py-0.5 rounded border border-teal-500/30">0ms DELAY</span>
                                        </div>
                                        <p class="text-xs text-slate-300 mt-0.5">LightWave & Mercer Pure Sine Wave &bull; 230V Clean Power</p>
                                    </div>
                                </div>
                                <span class="text-teal-400 font-mono text-xs font-bold">ACTIVE</span>
                            </div>
                        </div>

                        <!-- Module 3: Cyber Firewall & Biometric Security -->
                        <div class="p-3.5 rounded-xl bg-slate-800/70 border border-white/[0.06] hover:border-cyan-500/40 transition-all duration-300 group">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start space-x-3">
                                    <div class="w-9 h-9 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center flex-shrink-0 group-hover:bg-cyan-500 group-hover:text-slate-950 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <h4 class="text-white font-bold text-sm">UTM Firewall & Biometric Access</h4>
                                            <span class="text-[9px] bg-cyan-500/20 text-cyan-300 font-bold px-1.5 py-0.5 rounded border border-cyan-500/30">SECURE</span>
                                        </div>
                                        <p class="text-xs text-slate-300 mt-0.5">Multi-WAN Failover &bull; AI Face & Time-Attendance Logs</p>
                                    </div>
                                </div>
                                <span class="text-cyan-400 font-mono text-xs font-bold">LOCKED</span>
                            </div>
                        </div>

                    </div>

                    <!-- Bottom CTA inside console -->
                    <div class="pt-2">
                        <a href="{{ route('contact') }}" class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 hover:from-emerald-400 hover:to-cyan-400 text-slate-950 font-extrabold text-sm text-center flex items-center justify-center space-x-2 shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/35 transition duration-300">
                            <span>Request Enterprise Hardware Demo</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Brand & Integration Partners -->
<section class="py-10 bg-slate-900 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-xs font-bold uppercase tracking-widest text-slate-400 mb-6">
            Authorized Integration & Certified Hardware Partners
        </p>
        <div class="flex flex-wrap items-center justify-center gap-8 sm:gap-14 text-slate-400 font-bold text-sm sm:text-base">
            <span class="flex items-center hover:text-emerald-400 transition cursor-default">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 mr-2"></span> Safaricom M-Pesa
            </span>
            <span class="flex items-center hover:text-emerald-400 transition cursor-default">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 mr-2"></span> KRA eTIMS
            </span>
            <span class="flex items-center hover:text-emerald-400 transition cursor-default">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 mr-2"></span> APC by Schneider
            </span>
            <span class="flex items-center hover:text-emerald-400 transition cursor-default">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 mr-2"></span> LightWave
            </span>
            <span class="flex items-center hover:text-emerald-400 transition cursor-default">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 mr-2"></span> Mercer UPS
            </span>
            <span class="flex items-center hover:text-emerald-400 transition cursor-default">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 mr-2"></span> Hikvision & Dahua
            </span>
            <span class="flex items-center hover:text-emerald-400 transition cursor-default">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 mr-2"></span> MikroTik
            </span>
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
                        Tailored enterprise ERPs, client portals, workflow automation, and custom web applications built with cutting-edge frameworks.
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

<!-- Client Testimonials & Trust -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-xs uppercase font-bold tracking-widest text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-full">Client Success Stories</span>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Trusted by Industry Leaders in Kenya</h2>
            <p class="text-slate-600 text-sm">See how SkySoft Systems enables uninterrupted daily operations across multiple sectors.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                <div class="flex text-amber-400">
                    <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic">
                    "SkySoft Systems deployed 4 smart touch POS counters in our Westlands supermarket with automated M-Pesa STK Push and KRA eTIMS. Cash reconciliation time dropped from 2 hours every evening to literally zero."
                </p>
                <div class="pt-4 border-t border-slate-200">
                    <h4 class="font-bold text-slate-900 text-sm">David Kariuki</h4>
                    <p class="text-[11px] text-slate-500">Director, Apex Supermarket Westlands</p>
                </div>
            </div>

            <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                <div class="flex text-amber-400">
                    <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic">
                    "Our hospital laboratory suffered recurring equipment failures due to erratic power surges. SkySoft installed a 10KVA Online Pure Sine Wave UPS with zero transfer delay. Our diagnostics equipment has run 100% uninterrupted."
                </p>
                <div class="pt-4 border-t border-slate-200">
                    <h4 class="font-bold text-slate-900 text-sm">Dr. Beatrice Omondi</h4>
                    <p class="text-[11px] text-slate-500">Chief Medical Administrator, Nairobi</p>
                </div>
            </div>

            <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                <div class="flex text-amber-400">
                    <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic">
                    "Their School ERP automated our termly fee collection through an integrated M-Pesa Paybill. Parents receive immediate SMS confirmation receipts and report cards are generated with 1 click."
                </p>
                <div class="pt-4 border-t border-slate-200">
                    <h4 class="font-bold text-slate-900 text-sm">Sister Mary Immaculate</h4>
                    <p class="text-[11px] text-slate-500">Principal, St. Ann's Academy</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Frequently Asked Questions (Accordion) -->
<section class="py-20 bg-slate-50 border-t border-slate-200" x-data="{ activeFaq: null }">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <div class="text-center space-y-3">
            <span class="text-xs uppercase font-bold tracking-widest text-emerald-600 bg-emerald-100/80 px-3 py-1.5 rounded-full">Got Questions?</span>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Frequently Asked Questions</h2>
            <p class="text-slate-600 text-sm">Clear answers regarding hardware warranties, eTIMS compliance, and delivery.</p>
        </div>

        <div class="space-y-4">
            
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                <button @click="activeFaq = activeFaq === 1 ? null : 1" class="w-full p-6 text-left font-bold text-sm text-slate-900 flex justify-between items-center hover:bg-slate-50">
                    <span>Are your POS systems fully compliant with KRA eTIMS?</span>
                    <span class="text-emerald-600 font-extrabold text-lg" x-text="activeFaq === 1 ? '−' : '+'"></span>
                </button>
                <div x-show="activeFaq === 1" x-cloak class="px-6 pb-6 text-xs text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    Yes. All SkySoft Point of Sale software and bundled machines are certified for electronic tax invoice transmission directly to Kenya Revenue Authority (KRA) via automated eTIMS fiscal API. Every printed receipt contains an authentic KRA QR code.
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                <button @click="activeFaq = activeFaq === 2 ? null : 2" class="w-full p-6 text-left font-bold text-sm text-slate-900 flex justify-between items-center hover:bg-slate-50">
                    <span>What is the difference between an Offline UPS and an Online Pure Sine Wave UPS?</span>
                    <span class="text-emerald-600 font-extrabold text-lg" x-text="activeFaq === 2 ? '−' : '+'"></span>
                </button>
                <div x-show="activeFaq === 2" x-cloak class="px-6 pb-6 text-xs text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    Standard offline UPS units experience a 4-10 millisecond delay when power fails, which can reboot sensitive servers or corrupted diagnostic equipment. Our <strong>Online Double-Conversion Pure Sine Wave UPS</strong> has 0ms transfer time and constantly filters voltage spikes, delivering clean power 24/7.
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                <button @click="activeFaq = activeFaq === 3 ? null : 3" class="w-full p-6 text-left font-bold text-sm text-slate-900 flex justify-between items-center hover:bg-slate-50">
                    <span>Do you deliver and install systems outside Nairobi?</span>
                    <span class="text-emerald-600 font-extrabold text-lg" x-text="activeFaq === 3 ? '−' : '+'"></span>
                </button>
                <div x-show="activeFaq === 3" x-cloak class="px-6 pb-6 text-xs text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    Yes! We provide on-site delivery, cabling, and technician setup across all 47 counties in Kenya including Mombasa, Kisumu, Nakuru, Eldoret, Thika, Machakos, Meru, and Nyeri.
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                <button @click="activeFaq = activeFaq === 4 ? null : 4" class="w-full p-6 text-left font-bold text-sm text-slate-900 flex justify-between items-center hover:bg-slate-50">
                    <span>What warranty and after-sales support do you offer?</span>
                    <span class="text-emerald-600 font-extrabold text-lg" x-text="activeFaq === 4 ? '−' : '+'"></span>
                </button>
                <div x-show="activeFaq === 4" x-cloak class="px-6 pb-6 text-xs text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    All hardware components (POS terminals, barcode scanners, UPS units, managed switches) come with 1 to 2 years replacement warranty. We also provide dedicated remote support via AnyDesk/TeamViewer and dispatch physical field technicians in Nairobi within 2 hours.
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
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companySettings['company_whatsapp'] ?? '254712345678') }}" target="_blank" class="px-8 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-semibold text-sm transition">
                Chat with Specialist on WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
