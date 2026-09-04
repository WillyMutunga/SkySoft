@extends('layouts.app')

@section('title', 'About Us | SkySoft Systems Kenya - Enterprise Technology & Networking')

@section('content')
<!-- Page Header -->
<section class="bg-secondary-950 text-white py-16 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="text-xs uppercase font-bold tracking-widest text-emerald-400 bg-emerald-950/80 px-3 py-1.5 rounded-full border border-emerald-800/40">About SkySoft Systems</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">Pioneering Tech Infrastructure in East Africa</h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-base">
            Empowering businesses, retail giants, schools, and health facilities with high-availability systems, clean power, and intelligent software.
        </p>
    </div>
</section>

<!-- Company Story -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span class="text-xs uppercase font-bold tracking-widest text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-full">Who We Are</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    Your Trusted Long-Term Digital Transformation Partner
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    Headquartered in Nairobi, Kenya, <strong>SkySoft Systems</strong> was founded with a singular objective: to eliminate technological friction and power vulnerability for businesses across the region.
                </p>
                <p class="text-slate-600 text-base leading-relaxed">
                    Whether deploying heavy-duty touch POS systems for supermarket chains, installing mission-critical Online UPS power banks for hospital operating rooms, or configuring enterprise multi-WAN firewall backbones for corporate headquarters, we deliver end-to-end reliability.
                </p>
                <div class="grid grid-cols-2 gap-4 pt-4">
                    <div class="border-l-2 border-emerald-500 pl-4 space-y-1">
                        <h4 class="font-bold text-slate-900 text-sm">Nairobi Operations</h4>
                        <p class="text-xs text-slate-500">Centralized engineering center providing swift regional field support.</p>
                    </div>
                    <div class="border-l-2 border-emerald-500 pl-4 space-y-1">
                        <h4 class="font-bold text-slate-900 text-sm">Authorized Partnerships</h4>
                        <p class="text-xs text-slate-500">Top-tier hardware certifications from international power & networking manufacturers.</p>
                    </div>
                </div>
            </div>

            <!-- Image / Stats Showcase -->
            <div class="relative">
                <div class="rounded-3xl overflow-hidden shadow-2xl border border-slate-100">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="SkySoft Systems Engineering Team" class="w-full h-auto object-cover">
                </div>
                <div class="absolute -bottom-6 -right-6 bg-slate-900 text-white p-6 rounded-2xl shadow-xl border border-slate-800 hidden sm:block">
                    <span class="text-2xl font-extrabold text-emerald-400">100% Kenyan</span>
                    <p class="text-xs text-slate-300 mt-1">Dedicated to African Enterprise Growth</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision, Mission & Values -->
<section class="py-20 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900">Our Vision</h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    To be the most trusted and technically proficient IT and power solutions engineering firm in East and Central Africa, setting the benchmark for zero-downtime operations.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900">Our Mission</h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    To engineer, supply, and support tailored software, robust power systems, and high-performance networks that unlock seamless commercial scalability for our clients.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                <div class="w-12 h-12 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900">Core Values</h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    <strong>Integrity, Reliability, Security, Speed, and Customer Centricity.</strong> We don't just sell technology—we stand behind every installation with lifetime warranty support.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-white border-t border-slate-200 text-center">
    <div class="max-w-4xl mx-auto px-4 space-y-6">
        <h2 class="text-3xl font-extrabold text-slate-900">Experience the SkySoft Difference</h2>
        <p class="text-slate-600 text-base">Let's discuss how we can streamline your IT operations and power resilience.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('contact') }}" class="px-8 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition">Contact Our Team</a>
            <a href="{{ route('products.index') }}" class="px-8 py-3.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-sm transition">Browse Catalog</a>
        </div>
    </div>
</section>
@endsection
