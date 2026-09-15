@extends('layouts.app')

@section('title', 'SkySoft Systems | Enterprise POS, Online UPS & IT Infrastructure Nairobi, Kenya')

@section('content')
<!-- Hero Section with Bright Datacenter Server Racks & Interactive Tech Console -->
<section class="relative overflow-hidden text-white pt-16 pb-20 lg:pt-24 lg:pb-28 min-h-[720px] flex items-center bg-cyber-950" x-data="heroConsole()">
    <!-- Server Datacenter Background (Bright, Vivid, Prominent) -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/images/hero-datacenter.jpg') }}" 
             alt="SkySoft Enterprise Server Datacenter Infrastructure" 
             class="w-full h-full object-cover object-center filter brightness-[1.3] contrast-[1.18] saturate-[1.4]">
        <div class="absolute inset-0 bg-gradient-to-r from-cyber-950/90 via-cyber-950/50 to-cyber-950/30"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-cyber-950 via-transparent to-cyber-950/40"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Hero Content -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left drop-shadow-[0_4px_12px_rgba(0,0,0,0.8)]">
                
                <!-- Live Tag Badge -->
                <div class="inline-flex items-center space-x-2.5 px-4 py-2 rounded-full bg-cyber-900/90 border border-emerald-500/50 text-emerald-300 text-xs font-bold uppercase tracking-wider backdrop-blur-md shadow-xl">
                    <span class="flex h-2.5 w-2.5 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-80"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-400"></span>
                    </span>
                    <span>Certified IT &amp; Power Infrastructure &bull; Nairobi, Kenya</span>
                </div>
                
                <!-- Main Heading -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-[1.12]">
                    Engineered for <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-cyan-300">Zero Downtime</span> &amp; High-Velocity Business
                </h1>
                
                <!-- Subtitle -->
                <p class="text-base sm:text-lg text-slate-200 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-medium">
                    Turnkey enterprise technology for retail supermarkets, hospitals, educational campuses, and corporate headquarters. Featuring certified <strong>Dual-Screen Touch POS</strong>, <strong>Automated KRA eTIMS &amp; M-Pesa</strong>, <strong>0ms Pure Sine Wave Online UPS</strong>, and <strong>Enterprise Cybersecurity</strong>.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                    <a href="{{ route('products.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-400 hover:from-emerald-400 hover:to-cyan-300 text-slate-950 font-black text-base transition-all duration-300 shadow-xl shadow-emerald-500/30 hover:shadow-emerald-500/50 transform hover:-translate-y-0.5 group">
                        <span>Explore Hardware Catalog</span>
                        <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="#turnkey-configurator" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 rounded-xl bg-cyber-900/90 hover:bg-cyber-850 border border-white/20 text-white font-bold text-base backdrop-blur-md transition-all duration-300 shadow-lg hover:border-emerald-500/50">
                        <span>Interactive Solution Finder</span>
                    </a>
                </div>

                <!-- Trust Metrics / Stats -->
                <div class="grid grid-cols-3 gap-4 sm:gap-6 pt-6 border-t border-white/10 max-w-lg mx-auto lg:mx-0">
                    <div class="p-3.5 rounded-2xl bg-cyber-900/80 border border-white/10 backdrop-blur-md">
                        <div class="text-2xl sm:text-3xl font-black text-white">99.99%</div>
                        <div class="text-[10px] sm:text-[11px] text-slate-300 uppercase tracking-wider font-bold mt-1">Uptime SLA</div>
                    </div>
                    <div class="p-3.5 rounded-2xl bg-cyber-900/80 border border-white/10 backdrop-blur-md">
                        <div class="text-2xl sm:text-3xl font-black text-emerald-400">250+</div>
                        <div class="text-[10px] sm:text-[11px] text-slate-300 uppercase tracking-wider font-bold mt-1">Deployments</div>
                    </div>
                    <div class="p-3.5 rounded-2xl bg-cyber-900/80 border border-white/10 backdrop-blur-md">
                        <div class="text-2xl sm:text-3xl font-black text-teal-300">0ms</div>
                        <div class="text-[10px] sm:text-[11px] text-slate-300 uppercase tracking-wider font-bold mt-1">UPS Power Transfer</div>
                    </div>
                </div>
            </div>

            <!-- Right Hero Card: Interactive Hardware & Cloud Showcase -->
            <div class="lg:col-span-5 relative">
                <!-- Glowing Aura -->
                <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500/30 to-teal-500/20 rounded-3xl blur-2xl opacity-70"></div>
                
                <!-- Main Enterprise Glass Showcase Container -->
                <div class="relative bg-cyber-900/95 backdrop-blur-2xl border border-white/10 rounded-2xl p-5 sm:p-6 shadow-2xl space-y-4">
                    
                    <!-- Console Header & Tab Selector -->
                    <div class="flex flex-col space-y-3 border-b border-white/[0.08] pb-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="w-3 h-3 rounded-full bg-rose-500/80 inline-block"></span>
                                <span class="w-3 h-3 rounded-full bg-amber-500/80 inline-block"></span>
                                <span class="w-3 h-3 rounded-full bg-emerald-500 inline-block"></span>
                                <span class="text-[11px] font-mono text-slate-300 ml-2 font-bold">SkySoft NOC Console</span>
                            </div>
                            <span class="text-[10px] font-mono text-emerald-400 bg-emerald-500/10 px-2 py-0.5 rounded border border-emerald-500/30 flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> LIVE TELEMETRY
                            </span>
                        </div>

                        <!-- Tabs Navigation -->
                        <div class="grid grid-cols-3 gap-1.5 p-1 bg-cyber-950 rounded-xl border border-white/[0.06] text-[11px] font-bold">
                            <button type="button" @click="activeTab = 'pos'" :class="activeTab === 'pos' ? 'bg-emerald-600 text-white shadow' : 'text-slate-400 hover:text-slate-200'" class="py-1.5 px-2 rounded-lg transition text-center truncate">Touch POS</button>
                            <button type="button" @click="activeTab = 'ups'" :class="activeTab === 'ups' ? 'bg-emerald-600 text-white shadow' : 'text-slate-400 hover:text-slate-200'" class="py-1.5 px-2 rounded-lg transition text-center truncate">Online UPS</button>
                            <button type="button" @click="activeTab = 'firewall'" :class="activeTab === 'firewall' ? 'bg-emerald-600 text-white shadow' : 'text-slate-400 hover:text-slate-200'" class="py-1.5 px-2 rounded-lg transition text-center truncate">Cyber &amp; CCTV</button>
                        </div>
                    </div>

                    <!-- Tab 1: Touch POS + KRA eTIMS -->
                    <div x-show="activeTab === 'pos'" x-cloak class="space-y-3.5">
                        <div class="p-3.5 rounded-xl bg-cyber-850/80 border border-emerald-500/30 space-y-2.5">
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-white font-bold flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Dual-Screen 15.6" Capacitive Touch
                                </span>
                                <span class="text-emerald-400 font-mono font-bold bg-emerald-500/10 px-2 py-0.5 rounded text-[10px]">KRA eTIMS VSCU ACTIVE</span>
                            </div>
                            <div class="bg-cyber-950 p-2.5 rounded-lg font-mono text-[11px] text-slate-300 space-y-1 border border-white/[0.05]">
                                <div class="flex justify-between text-slate-400">
                                    <span>M-Pesa Express (STK Push):</span>
                                    <span class="text-emerald-400 font-bold">&check; CONFIRMED</span>
                                </div>
                                <div class="flex justify-between text-slate-400">
                                    <span>Receipt Fiscal Signature:</span>
                                    <span class="text-cyan-400 truncate ml-2">KRA-QR-98214-OK</span>
                                </div>
                                <div class="flex justify-between text-slate-400">
                                    <span>Thermal Auto-Cutter:</span>
                                    <span class="text-slate-200">80mm High Speed (250mm/s)</span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2 text-center text-xs">
                            <div class="p-2.5 rounded-xl bg-cyber-850/60 border border-white/[0.06]">
                                <span class="text-[10px] text-slate-400 block uppercase font-bold">Transaction Speed</span>
                                <span class="text-white font-mono font-bold text-sm text-emerald-400">&lt; 1.2 seconds</span>
                            </div>
                            <div class="p-2.5 rounded-xl bg-cyber-850/60 border border-white/[0.06]">
                                <span class="text-[10px] text-slate-400 block uppercase font-bold">Offline Resilience</span>
                                <span class="text-white font-mono font-bold text-sm text-teal-300">100% Cache Buffer</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tab 2: Online UPS Pure Sine Wave Power -->
                    <div x-show="activeTab === 'ups'" x-cloak class="space-y-3.5">
                        <div class="p-3.5 rounded-xl bg-cyber-850/80 border border-teal-500/30 space-y-2.5">
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-white font-bold flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-teal-400"></span> Online Double-Conversion Power
                                </span>
                                <span class="text-teal-300 font-mono font-bold bg-teal-500/10 px-2 py-0.5 rounded text-[10px]">0ms TRANSFER DELAY</span>
                            </div>
                            <div class="bg-cyber-950 p-2.5 rounded-lg font-mono text-[11px] text-slate-300 space-y-1 border border-white/[0.05]">
                                <div class="flex justify-between text-slate-400">
                                    <span>Pure Sine Wave Output:</span>
                                    <span class="text-teal-300 font-bold">230.4V &bull; 50.0Hz</span>
                                </div>
                                <div class="flex justify-between text-slate-400">
                                    <span>Surge &amp; Spike Protection:</span>
                                    <span class="text-emerald-400">Zero Surge Leakage</span>
                                </div>
                                <div class="flex justify-between text-slate-400">
                                    <span>Supported Capacities:</span>
                                    <span class="text-slate-200">1KVA, 2KVA, 3KVA, 6KVA, 10KVA</span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2 text-center text-xs">
                            <div class="p-2.5 rounded-xl bg-cyber-850/60 border border-white/[0.06]">
                                <span class="text-[10px] text-slate-400 block uppercase font-bold">Power Factor</span>
                                <span class="text-white font-mono font-bold text-sm text-emerald-400">0.9 to 1.0 Unity</span>
                            </div>
                            <div class="p-2.5 rounded-xl bg-cyber-850/60 border border-white/[0.06]">
                                <span class="text-[10px] text-slate-400 block uppercase font-bold">Harmonic Distortion</span>
                                <span class="text-white font-mono font-bold text-sm text-cyan-300">THD &lt; 2% Linear</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tab 3: Cyber UTM Firewall & Biometrics -->
                    <div x-show="activeTab === 'firewall'" x-cloak class="space-y-3.5">
                        <div class="p-3.5 rounded-xl bg-cyber-850/80 border border-cyan-500/30 space-y-2.5">
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-white font-bold flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-cyan-400"></span> UTM Firewall &amp; Multi-WAN
                                </span>
                                <span class="text-cyan-300 font-mono font-bold bg-cyan-500/10 px-2 py-0.5 rounded text-[10px]">ZERO-TRUST ACTIVE</span>
                            </div>
                            <div class="bg-cyber-950 p-2.5 rounded-lg font-mono text-[11px] text-slate-300 space-y-1 border border-white/[0.05]">
                                <div class="flex justify-between text-slate-400">
                                    <span>WAN1 Primary (Fiber):</span>
                                    <span class="text-emerald-400 font-bold">ONLINE (1 Gbps)</span>
                                </div>
                                <div class="flex justify-between text-slate-400">
                                    <span>WAN2 Standby (4G/5G):</span>
                                    <span class="text-teal-300">STANDBY (Auto-Failover)</span>
                                </div>
                                <div class="flex justify-between text-slate-400">
                                    <span>Biometric AI Face Scan:</span>
                                    <span class="text-slate-200">0.2s Recognition &bull; Anti-Spoof</span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2 text-center text-xs">
                            <div class="p-2.5 rounded-xl bg-cyber-850/60 border border-white/[0.06]">
                                <span class="text-[10px] text-slate-400 block uppercase font-bold">VPN Site-to-Site</span>
                                <span class="text-white font-mono font-bold text-sm text-emerald-400">IPsec 256-bit AES</span>
                            </div>
                            <div class="p-2.5 rounded-xl bg-cyber-850/60 border border-white/[0.06]">
                                <span class="text-[10px] text-slate-400 block uppercase font-bold">Intrusion Shield</span>
                                <span class="text-white font-mono font-bold text-sm text-cyan-300">Deep Packet (DPI)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom CTA inside console -->
                    <div class="pt-2">
                        <a href="{{ route('contact') }}" class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-emerald-500 via-teal-400 to-cyan-400 hover:from-emerald-400 hover:to-cyan-300 text-slate-950 font-extrabold text-sm text-center flex items-center justify-center space-x-2 shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/35 transition duration-300">
                            <span>Request On-Site Hardware Demo</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Infinite Brand & Certified Hardware Partners Marquee -->
<section class="py-8 bg-cyber-950 border-y border-white/[0.08] overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 mb-4 text-center">
        <p class="text-[11px] font-extrabold uppercase tracking-widest text-slate-400">
            Certified Integration Partners &bull; Hardware Compatibility
        </p>
    </div>
    <div class="relative w-full overflow-hidden">
        <div class="animate-marquee flex items-center space-x-12 sm:space-x-16 text-slate-300 font-extrabold text-sm sm:text-base whitespace-nowrap">
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> Safaricom M-Pesa Integration</span>
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> KRA eTIMS VSCU Certified</span>
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> APC by Schneider Electric</span>
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> LightWave Pure Sine Wave</span>
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> Mercer Online UPS Units</span>
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> Hikvision &amp; Dahua Security</span>
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> MikroTik &amp; Ubiquiti UniFi</span>
            
            <!-- Duplicated for seamless loop -->
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> Safaricom M-Pesa Integration</span>
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> KRA eTIMS VSCU Certified</span>
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> APC by Schneider Electric</span>
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> LightWave Pure Sine Wave</span>
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> Mercer Online UPS Units</span>
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> Hikvision &amp; Dahua Security</span>
            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2.5"></span> MikroTik &amp; Ubiquiti UniFi</span>
        </div>
    </div>
</section>

<!-- Interactive Turnkey Business Solution Configurator -->
<section id="turnkey-configurator" class="py-20 bg-cyber-900 text-white relative overflow-hidden" x-data="solutionFinder()">
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-12">
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <span class="text-xs uppercase font-extrabold tracking-widest text-emerald-400 bg-emerald-950/80 px-3.5 py-1.5 rounded-full border border-emerald-500/30">Interactive Solution Finder</span>
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-white">
                Select Your Industry for a Complete Turnkey Hardware &amp; Software Package
            </h2>
            <p class="text-slate-300 text-sm sm:text-base">
                Choose your business sector below to instantly see the recommended equipment setup, power backup capacity, and instant WhatsApp inquiry package.
            </p>
        </div>

        <!-- Industry Selector Pills -->
        <div class="flex flex-wrap items-center justify-center gap-2.5">
            <template x-for="item in industries" :key="item.id">
                <button type="button" 
                        @click="selected = item.id" 
                        :class="selected === item.id ? 'bg-gradient-to-r from-emerald-500 to-teal-400 text-slate-950 font-black shadow-lg shadow-emerald-500/25 scale-105' : 'bg-cyber-850 text-slate-300 hover:bg-cyber-800 hover:text-white border border-white/[0.08] font-bold'" 
                        class="px-5 py-2.5 rounded-xl text-xs sm:text-sm transition-all duration-200">
                    <span x-text="item.name"></span>
                </button>
            </template>
        </div>

        <!-- Dynamic Bundle Preview Card -->
        <div class="max-w-5xl mx-auto bg-cyber-850/90 border border-white/[0.1] rounded-3xl p-6 sm:p-10 shadow-2xl backdrop-blur-xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <!-- Left Details -->
                <div class="lg:col-span-7 space-y-5">
                    <div class="flex items-center space-x-3">
                        <span class="w-3 h-3 rounded-full bg-emerald-400"></span>
                        <h3 class="text-2xl font-black text-white" x-text="currentBundle().title"></h3>
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed font-medium" x-text="currentBundle().description"></p>
                    
                    <!-- Included Hardware Components -->
                    <div class="space-y-2.5 pt-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Recommended Hardware &amp; System Bundle:</span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                            <template x-for="spec in currentBundle().specs" :key="spec">
                                <div class="flex items-center space-x-2 p-2 rounded-xl bg-cyber-950/70 border border-white/[0.05]">
                                    <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    <span class="text-slate-200 font-medium" x-text="spec"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Right Action & WhatsApp Dispatch -->
                <div class="lg:col-span-5 p-6 rounded-2xl bg-cyber-950/90 border border-emerald-500/30 space-y-5 text-center flex flex-col justify-between">
                    <div class="space-y-2">
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Recommended Power Sizing</span>
                        <div class="text-2xl font-black text-emerald-400" x-text="currentBundle().ups"></div>
                        <p class="text-xs text-slate-400">0ms transfer delay &bull; Pure Sine Wave clean current</p>
                    </div>

                    <div class="p-3.5 rounded-xl bg-cyber-900 border border-white/[0.06] text-xs text-slate-300 space-y-1">
                        <div class="flex justify-between font-bold">
                            <span>Deployment Time:</span>
                            <span class="text-white">24 - 48 Hours</span>
                        </div>
                        <div class="flex justify-between font-bold">
                            <span>Warranty &amp; SLA:</span>
                            <span class="text-emerald-400">1 - 2 Years Certified</span>
                        </div>
                    </div>

                    <a :href="currentBundle().whatsappUrl" target="_blank" class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-[#25D366] to-[#128C7E] hover:from-[#20bd5a] hover:to-[#0f7569] text-white font-extrabold text-sm flex items-center justify-center space-x-2 shadow-xl shadow-emerald-900/30 transition transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.53 1.771.815 2.796.815 3.182 0 5.768-2.587 5.768-5.767 0-3.18-2.586-5.767-5.768-5.767zm9.969 5.768c0 5.509-4.482 9.99-9.969 9.99-1.748 0-3.38-.456-4.806-1.254l-5.225 1.369 1.393-5.093c-.899-1.498-1.362-3.21-1.362-5.012 0-5.509 4.482-9.99 9.969-9.99 5.487 0 9.969 4.481 9.969 9.99z"/></svg>
                        <span>Inquire This Bundle on WhatsApp</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Interactive Online UPS Battery Runtime Calculator -->
<section class="py-20 bg-cyber-950 text-white border-t border-white/[0.08]" x-data="upsCalculator()">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <div class="text-center space-y-3">
            <span class="text-xs uppercase font-extrabold tracking-widest text-teal-300 bg-teal-950/80 px-3.5 py-1.5 rounded-full border border-teal-500/30">Power Sizing Tool</span>
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-white">
                Online UPS Battery Runtime &amp; Capacity Calculator
            </h2>
            <p class="text-slate-300 text-sm max-w-2xl mx-auto">
                Estimate how long our Pure Sine Wave Double-Conversion UPS units will power your servers, diagnostic tools, and POS checkout lanes during outages.
            </p>
        </div>

        <div class="bg-cyber-900 border border-white/[0.1] rounded-3xl p-6 sm:p-10 shadow-2xl space-y-8">
            <!-- Load Slider -->
            <div class="space-y-4">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-2">
                    <label class="text-sm font-bold uppercase tracking-wider text-slate-300">Estimated Total Equipment Load (Watts):</label>
                    <span class="text-2xl font-mono font-black text-emerald-400 bg-cyber-950 px-4 py-1.5 rounded-xl border border-emerald-500/30 inline-block" x-text="wattage + ' Watts'"></span>
                </div>
                
                <input type="range" min="200" max="4000" step="100" x-model="wattage" class="w-full h-3 bg-cyber-950 rounded-lg appearance-none cursor-pointer accent-emerald-500">
                
                <div class="flex justify-between text-[11px] text-slate-400 font-mono">
                    <span>200W (1 POS + Router)</span>
                    <span>1000W (Server + 3 POS)</span>
                    <span>2500W (Medical Lab)</span>
                    <span>4000W (Enterprise DC)</span>
                </div>
            </div>

            <!-- Capacity Runtime Table / Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-4 border-t border-white/[0.08]">
                <div class="p-4 rounded-2xl bg-cyber-850/80 border border-white/[0.06] text-center space-y-2">
                    <span class="text-xs font-bold text-slate-400 uppercase">1 KVA Online UPS</span>
                    <div class="text-2xl font-mono font-black text-white" x-text="calcRuntime(1000) + ' min'"></div>
                    <span class="text-[10px] text-emerald-400 block font-bold">Pure Sine Wave 230V</span>
                </div>

                <div class="p-4 rounded-2xl bg-cyber-850/80 border border-emerald-500/40 text-center space-y-2 shadow-lg shadow-emerald-950/50">
                    <span class="text-xs font-bold text-emerald-300 uppercase">2 KVA Online UPS</span>
                    <div class="text-2xl font-mono font-black text-emerald-400" x-text="calcRuntime(2000) + ' min'"></div>
                    <span class="text-[10px] text-emerald-400 block font-bold">Recommended for POS</span>
                </div>

                <div class="p-4 rounded-2xl bg-cyber-850/80 border border-white/[0.06] text-center space-y-2">
                    <span class="text-xs font-bold text-slate-400 uppercase">3 KVA Online UPS</span>
                    <div class="text-2xl font-mono font-black text-white" x-text="calcRuntime(3000) + ' min'"></div>
                    <span class="text-[10px] text-teal-300 block font-bold">Enterprise Rackmount</span>
                </div>

                <div class="p-4 rounded-2xl bg-cyber-850/80 border border-cyan-500/40 text-center space-y-2">
                    <span class="text-xs font-bold text-cyan-300 uppercase">6 - 10 KVA Online</span>
                    <div class="text-2xl font-mono font-black text-cyan-400" x-text="calcRuntime(6000) + ' min'"></div>
                    <span class="text-[10px] text-cyan-300 block font-bold">Heavy Medical / Server</span>
                </div>
            </div>

            <!-- Action Prompt -->
            <div class="text-center pt-2">
                <a href="{{ route('products.index', ['category' => 'Power Backup & UPS']) }}" class="inline-flex items-center text-xs font-bold text-emerald-400 hover:text-emerald-300 space-x-1.5">
                    <span>Explore All Certified Mercer &amp; LightWave UPS Units</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

    </div>
</section>

<!-- Core Services Section -->
<section class="py-20 bg-cyber-900 text-white border-t border-white/[0.08]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs uppercase font-extrabold tracking-widest text-emerald-400 bg-emerald-950/80 px-3.5 py-1.5 rounded-full border border-emerald-500/30">End-to-End Technology</span>
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-white">Full-Stack Enterprise IT &amp; Engineering</h2>
            <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                We design, install, test, and support robust technology environments tailored to Kenyan commercial enterprises, retail chains, and institutions.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Service 1 -->
            <div class="bg-cyber-850/90 border border-white/[0.08] hover:border-emerald-500/50 rounded-3xl p-8 hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center group-hover:scale-110 group-hover:bg-emerald-500 group-hover:text-slate-950 transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white group-hover:text-emerald-400 transition">Custom Software &amp; ERP Portals</h3>
                    <p class="text-sm text-slate-300 leading-relaxed font-medium">
                        Tailored enterprise ERPs, school fee portals, workflow automations, and custom applications built with robust modern frameworks.
                    </p>
                    <ul class="text-xs text-slate-400 space-y-2 pt-2">
                        <li class="flex items-center"><span class="text-emerald-400 mr-2 font-bold">&check;</span> School Management &amp; Fee Portals</li>
                        <li class="flex items-center"><span class="text-emerald-400 mr-2 font-bold">&check;</span> M-Pesa &amp; Bank API Integrations</li>
                        <li class="flex items-center"><span class="text-emerald-400 mr-2 font-bold">&check;</span> Real-Time Multi-Branch Sync</li>
                    </ul>
                </div>
                <div class="pt-6 mt-6 border-t border-white/[0.08]">
                    <a href="{{ route('services') }}" class="text-sm font-bold text-emerald-400 hover:text-emerald-300 inline-flex items-center group-hover:translate-x-1 transition">
                        <span>Explore Software Solutions</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="bg-cyber-850/90 border border-white/[0.08] hover:border-teal-500/50 rounded-3xl p-8 hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-teal-500/20 text-teal-400 flex items-center justify-center group-hover:scale-110 group-hover:bg-teal-500 group-hover:text-slate-950 transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white group-hover:text-teal-300 transition">Network Cabling &amp; Optical Fiber</h3>
                    <p class="text-sm text-slate-300 leading-relaxed font-medium">
                        High-speed Cat6/Cat6A structured data cabling, fiber splicing, server rack builds, and enterprise roaming WiFi access points.
                    </p>
                    <ul class="text-xs text-slate-400 space-y-2 pt-2">
                        <li class="flex items-center"><span class="text-teal-400 mr-2 font-bold">&check;</span> Voice &amp; Data Structured Cabling</li>
                        <li class="flex items-center"><span class="text-teal-400 mr-2 font-bold">&check;</span> Managed L2/L3 Switches &amp; Routers</li>
                        <li class="flex items-center"><span class="text-teal-400 mr-2 font-bold">&check;</span> High-Density Campus WiFi Coverage</li>
                    </ul>
                </div>
                <div class="pt-6 mt-6 border-t border-white/[0.08]">
                    <a href="{{ route('services') }}" class="text-sm font-bold text-teal-300 hover:text-teal-200 inline-flex items-center group-hover:translate-x-1 transition">
                        <span>Explore Networking</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="bg-cyber-850/90 border border-white/[0.08] hover:border-cyan-500/50 rounded-3xl p-8 hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center group-hover:scale-110 group-hover:bg-cyan-500 group-hover:text-slate-950 transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white group-hover:text-cyan-300 transition">UTM Cybersecurity &amp; CCTV AI</h3>
                    <p class="text-sm text-slate-300 leading-relaxed font-medium">
                        Next-generation enterprise firewalls, site-to-site branch VPN tunnels, multi-WAN failovers, and AI biometric attendance access control.
                    </p>
                    <ul class="text-xs text-slate-400 space-y-2 pt-2">
                        <li class="flex items-center"><span class="text-cyan-400 mr-2 font-bold">&check;</span> Zero-Trust Firewall Gateways</li>
                        <li class="flex items-center"><span class="text-cyan-400 mr-2 font-bold">&check;</span> Multi-WAN Automated ISP Failover</li>
                        <li class="flex items-center"><span class="text-cyan-400 mr-2 font-bold">&check;</span> AI Facial Recognition &amp; Time Logs</li>
                    </ul>
                </div>
                <div class="pt-6 mt-6 border-t border-white/[0.08]">
                    <a href="{{ route('services') }}" class="text-sm font-bold text-cyan-300 hover:text-cyan-200 inline-flex items-center group-hover:translate-x-1 transition">
                        <span>Explore Security Solutions</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Featured Products Spotlight -->
<section class="py-20 bg-cyber-950 text-white border-t border-white/[0.08]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-xs uppercase font-extrabold tracking-widest text-emerald-400 bg-emerald-950/80 px-3.5 py-1.5 rounded-full border border-emerald-500/30">Kenya Tested &amp; Proven</span>
                <h2 class="text-3xl sm:text-4xl font-black text-white tracking-tight mt-3">Featured Hardware &amp; Systems</h2>
                <p class="text-slate-400 text-sm mt-1 max-w-xl">
                    High-performance POS machines, Online UPS power supplies, and accessories configured for Kenyan power and telecom networks.
                </p>
            </div>
            <a href="{{ route('products.index') }}" class="inline-flex items-center text-emerald-400 hover:text-emerald-300 font-extrabold text-sm group">
                <span>View Full Catalog</span>
                <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredProducts as $product)
            <div class="bg-cyber-900 rounded-2xl border border-white/[0.08] hover:border-emerald-500/50 overflow-hidden shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Product Image -->
                    <div class="relative h-48 bg-cyber-950 overflow-hidden">
                        <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1556742049-0a67e5572293?auto=format&fit=crop&w=800&q=80' }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @if($product->badge)
                        <span class="absolute top-3 left-3 bg-emerald-600 text-slate-950 text-[10px] uppercase tracking-wider font-black px-2.5 py-1 rounded-md shadow-md">
                            {{ $product->badge }}
                        </span>
                        @endif
                        <span class="absolute top-3 right-3 bg-cyber-950/90 text-slate-300 text-[11px] font-bold px-2 py-0.5 rounded border border-white/[0.1] backdrop-blur-sm">
                            {{ $product->category }}
                        </span>
                    </div>

                    <!-- Product Body -->
                    <div class="p-5 space-y-2.5">
                        <h3 class="font-bold text-sm sm:text-base text-white group-hover:text-emerald-400 transition line-clamp-2">
                            <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                        </h3>
                        <p class="text-xs text-slate-400 line-clamp-2 leading-relaxed">
                            {{ $product->short_description }}
                        </p>
                        
                        <div class="pt-2 flex items-center justify-between">
                            <span class="text-lg font-black text-emerald-400 font-mono">{{ $product->formatted_price }}</span>
                            <span class="text-[10px] text-teal-300 bg-teal-950/80 px-2 py-0.5 rounded border border-teal-500/30 font-bold">&check; In Stock Nairobi</span>
                        </div>
                    </div>
                </div>

                <!-- Product Footer Action -->
                <div class="p-5 pt-0">
                    <a href="{{ route('products.show', $product->slug) }}" class="w-full py-2.5 px-4 rounded-xl bg-cyber-850 hover:bg-emerald-600 text-slate-200 hover:text-slate-950 font-bold text-xs transition-all duration-200 flex items-center justify-center border border-white/[0.08]">
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
<section class="py-20 bg-cyber-900 text-white border-t border-white/[0.08]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-xs uppercase font-extrabold tracking-widest text-emerald-400 bg-emerald-950/80 px-3.5 py-1.5 rounded-full border border-emerald-500/30">Client Case Studies</span>
            <h2 class="text-3xl font-black text-white tracking-tight">Trusted Across Key Kenyan Industries</h2>
            <p class="text-slate-400 text-sm">See how SkySoft Systems enables uninterrupted operations and automated KRA compliance.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-cyber-850/90 p-8 rounded-3xl border border-white/[0.08] shadow-xl space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex text-amber-400 text-sm">
                        <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed italic">
                        "SkySoft deployed 4 smart touch POS counters in our Westlands supermarket with automated M-Pesa STK Push and KRA eTIMS. Cash reconciliation time dropped from 2 hours every evening to literally zero."
                    </p>
                </div>
                <div class="pt-4 border-t border-white/[0.08]">
                    <h4 class="font-bold text-white text-sm">David Kariuki</h4>
                    <p class="text-[11px] text-emerald-400">Director, Apex Supermarket Westlands</p>
                </div>
            </div>

            <div class="bg-cyber-850/90 p-8 rounded-3xl border border-white/[0.08] shadow-xl space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex text-amber-400 text-sm">
                        <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed italic">
                        "Our hospital laboratory suffered recurring equipment failures due to erratic power surges. SkySoft installed a 10KVA Online Pure Sine Wave UPS with zero transfer delay. Our diagnostics equipment has run 100% uninterrupted."
                    </p>
                </div>
                <div class="pt-4 border-t border-white/[0.08]">
                    <h4 class="font-bold text-white text-sm">Dr. Beatrice Omondi</h4>
                    <p class="text-[11px] text-emerald-400">Chief Medical Administrator, Nairobi</p>
                </div>
            </div>

            <div class="bg-cyber-850/90 p-8 rounded-3xl border border-white/[0.08] shadow-xl space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex text-amber-400 text-sm">
                        <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed italic">
                        "Their School ERP automated our termly fee collection through an integrated M-Pesa Paybill. Parents receive immediate SMS confirmation receipts and report cards are generated with 1 click."
                    </p>
                </div>
                <div class="pt-4 border-t border-white/[0.08]">
                    <h4 class="font-bold text-white text-sm">Sister Mary Immaculate</h4>
                    <p class="text-[11px] text-emerald-400">Principal, St. Ann's Academy</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Frequently Asked Questions (Accordion) -->
<section class="py-20 bg-cyber-950 text-white border-t border-white/[0.08]" x-data="{ activeFaq: null }">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <div class="text-center space-y-3">
            <span class="text-xs uppercase font-extrabold tracking-widest text-emerald-400 bg-emerald-950/80 px-3.5 py-1.5 rounded-full border border-emerald-500/30">Clear Answers</span>
            <h2 class="text-3xl font-black text-white tracking-tight">Frequently Asked Questions</h2>
            <p class="text-slate-400 text-sm">Hardware warranties, KRA eTIMS compliance, delivery, and support SLAs.</p>
        </div>

        <div class="space-y-3.5">
            
            <div class="bg-cyber-900 rounded-2xl border border-white/[0.08] overflow-hidden">
                <button @click="activeFaq = activeFaq === 1 ? null : 1" class="w-full p-6 text-left font-bold text-sm text-white flex justify-between items-center hover:bg-cyber-850 transition">
                    <span>Are your POS systems fully compliant with KRA eTIMS?</span>
                    <span class="text-emerald-400 font-black text-lg" x-text="activeFaq === 1 ? '−' : '+'"></span>
                </button>
                <div x-show="activeFaq === 1" x-cloak class="px-6 pb-6 text-xs text-slate-300 leading-relaxed border-t border-white/[0.06] pt-3">
                    Yes. All SkySoft Point of Sale software and bundled machines are certified for electronic tax invoice transmission directly to Kenya Revenue Authority (KRA) via automated eTIMS fiscal API. Every printed receipt contains an authentic KRA QR code.
                </div>
            </div>

            <div class="bg-cyber-900 rounded-2xl border border-white/[0.08] overflow-hidden">
                <button @click="activeFaq = activeFaq === 2 ? null : 2" class="w-full p-6 text-left font-bold text-sm text-white flex justify-between items-center hover:bg-cyber-850 transition">
                    <span>What is the difference between an Offline UPS and an Online Pure Sine Wave UPS?</span>
                    <span class="text-emerald-400 font-black text-lg" x-text="activeFaq === 2 ? '−' : '+'"></span>
                </button>
                <div x-show="activeFaq === 2" x-cloak class="px-6 pb-6 text-xs text-slate-300 leading-relaxed border-t border-white/[0.06] pt-3">
                    Standard offline UPS units experience a 4-10 millisecond delay when power fails, which can reboot sensitive servers or corrupt diagnostic equipment. Our <strong>Online Double-Conversion Pure Sine Wave UPS</strong> has 0ms transfer time and constantly filters voltage spikes, delivering clean power 24/7.
                </div>
            </div>

            <div class="bg-cyber-900 rounded-2xl border border-white/[0.08] overflow-hidden">
                <button @click="activeFaq = activeFaq === 3 ? null : 3" class="w-full p-6 text-left font-bold text-sm text-white flex justify-between items-center hover:bg-cyber-850 transition">
                    <span>Do you deliver and install systems outside Nairobi?</span>
                    <span class="text-emerald-400 font-black text-lg" x-text="activeFaq === 3 ? '−' : '+'"></span>
                </button>
                <div x-show="activeFaq === 3" x-cloak class="px-6 pb-6 text-xs text-slate-300 leading-relaxed border-t border-white/[0.06] pt-3">
                    Yes! We provide on-site delivery, cabling, and technician setup across all 47 counties in Kenya including Mombasa, Kisumu, Nakuru, Eldoret, Thika, Machakos, Meru, and Nyeri.
                </div>
            </div>

            <div class="bg-cyber-900 rounded-2xl border border-white/[0.08] overflow-hidden">
                <button @click="activeFaq = activeFaq === 4 ? null : 4" class="w-full p-6 text-left font-bold text-sm text-white flex justify-between items-center hover:bg-cyber-850 transition">
                    <span>What warranty and after-sales support do you offer?</span>
                    <span class="text-emerald-400 font-black text-lg" x-text="activeFaq === 4 ? '−' : '+'"></span>
                </button>
                <div x-show="activeFaq === 4" x-cloak class="px-6 pb-6 text-xs text-slate-300 leading-relaxed border-t border-white/[0.06] pt-3">
                    All hardware components (POS terminals, barcode scanners, UPS units, managed switches) come with 1 to 2 years replacement warranty. We also provide dedicated remote support via AnyDesk/TeamViewer and dispatch physical field technicians in Nairobi within 2 hours.
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Alpine JS Controllers for Interactive Components -->
<script>
function heroConsole() {
    return {
        activeTab: 'pos'
    }
}

function solutionFinder() {
    return {
        selected: 'retail',
        industries: [
            { id: 'retail', name: 'Supermarkets & Retail' },
            { id: 'hospital', name: 'Hospitals & Medical Labs' },
            { id: 'restaurant', name: 'Restaurants & Lounges' },
            { id: 'school', name: 'Schools & Colleges' },
            { id: 'corporate', name: 'Corporate Enterprises' },
        ],
        bundles: {
            retail: {
                title: 'Complete Supermarket & Retail Checkout System',
                description: 'Full hardware counter package with high-speed barcode scanning, automated M-Pesa STK push, KRA eTIMS QR receipts, and backup power for non-stop billing.',
                specs: [
                    'Dual-Screen 15.6" Capacitive Touch POS',
                    '2D Omnidirectional High-Speed Barcode Scanner',
                    '80mm Thermal Receipt Printer (250mm/s auto-cutter)',
                    'Heavy Duty Electronic Cash Drawer RJ11',
                    'Cloud POS Software with KRA eTIMS VSCU',
                    '2KVA Pure Sine Wave Online UPS (0ms delay)'
                ],
                ups: '2KVA Online Pure Sine Wave',
                whatsappUrl: 'https://wa.me/{{ preg_replace("/[^0-9]/", "", $companySettings["company_whatsapp"] ?? "254712345678") }}?text=' + encodeURIComponent('Hello SkySoft Systems, I would like to inquire about the complete Supermarket & Retail POS Hardware Package with 2KVA UPS.')
            },
            hospital: {
                title: 'Hospital Laboratory & Diagnostics Power Package',
                description: 'Certified 0ms double-conversion clean power protection for sensitive laboratory analyzers, surgical tools, clinical ERP workstations, and pharmacy POS.',
                specs: [
                    '6KVA / 10KVA Pure Sine Wave Double Conversion UPS',
                    'Heavy-Duty Medical Voltage Surge Suppressor',
                    'Structured Cat6A Gigabit LAN for Laboratory',
                    'Hospital Management & Pharmacy Billing POS',
                    '24/7 Diagnostic Uptime Monitoring Protocol'
                ],
                ups: '6KVA to 10KVA Pure Sine Wave',
                whatsappUrl: 'https://wa.me/{{ preg_replace("/[^0-9]/", "", $companySettings["company_whatsapp"] ?? "254712345678") }}?text=' + encodeURIComponent('Hello SkySoft Systems, I would like to inquire about the Hospital Laboratory & Medical 0ms Online UPS Solution.')
            },
            restaurant: {
                title: 'Restaurant, Bar & Lounge Cloud POS Bundle',
                description: 'Split-bill management, Android wireless waiter tablets, kitchen display system (KDS) order routing, and real-time liquor stock audits.',
                specs: [
                    'All-in-One Touch POS Cashier Terminal',
                    'Android Mobile Waiter Ordering Tablets',
                    'Kitchen Display System (KDS) & Buzzer',
                    'Multi-Printer Order Splitting (Bar + Kitchen)',
                    '1KVA / 2KVA Pure Sine Wave Online UPS'
                ],
                ups: '1KVA to 2KVA Online UPS',
                whatsappUrl: 'https://wa.me/{{ preg_replace("/[^0-9]/", "", $companySettings["company_whatsapp"] ?? "254712345678") }}?text=' + encodeURIComponent('Hello SkySoft Systems, I would like to inquire about the Restaurant & Lounge Touch POS with Kitchen Display System.')
            },
            school: {
                title: 'School & College Campus ERP & Automated Fee Portal',
                description: 'Automate student registration, termly fee collection via integrated M-Pesa Paybill, automated SMS receipts, biometric staff clock-in, and report cards.',
                specs: [
                    'Comprehensive School ERP Portal & Student Database',
                    'Automated M-Pesa Paybill Reconciliation Engine',
                    'Instant Parent SMS Notification Gateway',
                    'Biometric Time-Attendance Clock-in Device',
                    'Campus High-Density Structured Cabling & WiFi'
                ],
                ups: '3KVA Server & Lab Online UPS',
                whatsappUrl: 'https://wa.me/{{ preg_replace("/[^0-9]/", "", $companySettings["company_whatsapp"] ?? "254712345678") }}?text=' + encodeURIComponent('Hello SkySoft Systems, I would like to inquire about the School & Campus ERP Fee Automation & Biometrics Package.')
            },
            corporate: {
                title: 'Corporate Office Cybersecurity, Fiber & Server Build',
                description: 'End-to-end office networking, server rack assembly, multi-WAN load balancing with 4G backup, and branch-to-branch secure IPsec VPN tunnels.',
                specs: [
                    'Next-Gen UTM Firewall with Zero-Trust Security',
                    'Dual-WAN Automated ISP Failover (Fiber + 4G/5G)',
                    'Cat6A Structured Cabling & 42U Server Rack Build',
                    'AI Facial Recognition Access Control Door Locks',
                    'Enterprise Roaming Cloud-Managed Access Points'
                ],
                ups: '6KVA Rackmount Online UPS',
                whatsappUrl: 'https://wa.me/{{ preg_replace("/[^0-9]/", "", $companySettings["company_whatsapp"] ?? "254712345678") }}?text=' + encodeURIComponent('Hello SkySoft Systems, I would like to inquire about the Corporate Office Cybersecurity, Structured LAN & Server Build Package.')
            }
        },
        currentBundle() {
            return this.bundles[this.selected] || this.bundles['retail'];
        }
    }
}

function upsCalculator() {
    return {
        wattage: 800,
        calcRuntime(va) {
            // Formula: Estimated battery reserve runtime based on VA capacity and load
            const batteryWattHours = va * 0.7 * 0.8;
            const runtimeMinutes = Math.round((batteryWattHours / (this.wattage || 1)) * 60);
            return Math.max(5, Math.min(runtimeMinutes, 240));
        }
    }
}
</script>
@endsection
