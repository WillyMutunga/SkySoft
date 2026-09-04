@extends('layouts.app')

@section('title', 'Our Services | SkySoft Systems Kenya - Enterprise IT, Networking & Security')

@section('content')
<!-- Page Header -->
<section class="bg-secondary-950 text-white py-16 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="text-xs uppercase font-bold tracking-widest text-emerald-400 bg-emerald-950/80 px-3 py-1.5 rounded-full border border-emerald-800/40">Comprehensive IT Engineering</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">Enterprise Technology Services</h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-base">
            Turnkey systems engineering, software development, power continuity, and structured cabling for organizations in Kenya.
        </p>
    </div>
</section>

<!-- Detailed Services Listing -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Service 1: Custom Software -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-7 space-y-6">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Custom Software & Enterprise Cloud ERP</h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    Off-the-shelf software rarely aligns with unique African business workflows. We develop tailored digital platforms, inventory control suites, school management portals, and automated billing software.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-slate-700">
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>M-Pesa STK & Paybill Integration</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>KRA eTIMS Fiscalization Module</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Multi-Branch Central Reporting</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Automated SMS & Email Alerts</span></div>
                </div>
                <div class="pt-2">
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm transition">
                        <span>Request Custom Software Scope</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80" alt="Software Development" class="rounded-2xl shadow-lg border border-slate-100 object-cover w-full h-72">
            </div>
        </div>

        <!-- Service 2: Structured Cabling -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-5 order-2 lg:order-1">
                <img src="https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=800&q=80" alt="Networking and Server Racks" class="rounded-2xl shadow-lg border border-slate-100 object-cover w-full h-72">
            </div>
            <div class="lg:col-span-7 space-y-6 order-1 lg:order-2">
                <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Structured Network Cabling & Enterprise WiFi</h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    We plan and install resilient physical network backbones using Cat6/Cat6A and single/multimode fiber optics. Perfect for multi-story office buildings, warehouses, schools, and commercial properties.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-slate-700">
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Server Rack Dressing & Patch Panels</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Seamless Roaming Mesh WiFi</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Fiber Splicing & OTDR Testing</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>VoIP IP-PBX Telephony Setups</span></div>
                </div>
                <div class="pt-2">
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 rounded-xl bg-teal-600 hover:bg-teal-700 text-white font-semibold text-sm transition">
                        <span>Book Site Network Survey</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Service 3: Power Backup & UPS -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-7 space-y-6">
                <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Online UPS & Industrial Power Protection</h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    Keep your servers, POS counters, medical equipment, and security cameras operational throughout blackouts and power fluctuations. We supply, install, and service online pure sine wave UPS systems with extended battery banks.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-slate-700">
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Zero Transfer Time (0ms Delay)</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>LightWave, Mercer, APC Authorized</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Extended Battery Bank Configurations</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Automatic Power Surge Suppressors</span></div>
                </div>
                <div class="pt-2">
                    <a href="{{ route('products.index', ['category' => 'Power Backup & UPS']) }}" class="inline-flex items-center px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm transition">
                        <span>View UPS Systems & Pricing</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5">
                <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=800&q=80" alt="UPS Power Systems" class="rounded-2xl shadow-lg border border-slate-100 object-cover w-full h-72">
            </div>
        </div>

        <!-- Service 4: CCTV & Biometrics -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-5 order-2 lg:order-1">
                <img src="https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=800&q=80" alt="CCTV Security Cameras" class="rounded-2xl shadow-lg border border-slate-100 object-cover w-full h-72">
            </div>
            <div class="lg:col-span-7 space-y-6 order-1 lg:order-2">
                <div class="w-12 h-12 rounded-xl bg-rose-100 text-rose-600 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">AI CCTV Surveillance & Biometric Access Control</h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    Protect commercial property and track employee clock-ins with high-definition IP cameras, facial recognition scanners, and automated payroll attendance integration.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-slate-700">
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Color Night Vision 4K Cameras</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Mobile Phone Remote Live Streaming</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Contactless Facial Biometrics</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Automatic Magnetic Door Locks</span></div>
                </div>
                <div class="pt-2">
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 rounded-xl bg-rose-600 hover:bg-rose-700 text-white font-semibold text-sm transition">
                        <span>Get Security Quote</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
