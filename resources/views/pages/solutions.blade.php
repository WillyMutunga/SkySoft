@extends('layouts.app')

@section('title', 'Industry Solutions | SkySoft Systems Kenya')

@section('content')
<!-- Page Header -->
<section class="bg-secondary-950 text-white py-16 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="text-xs uppercase font-bold tracking-widest text-emerald-400 bg-emerald-950/80 px-3 py-1.5 rounded-full border border-emerald-800/40">Customized Industry Architecture</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">Tailored Business Solutions</h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-base">
            Turnkey software, hardware, and power backup packages optimized for specific industry operational challenges in Kenya.
        </p>
    </div>
</section>

<!-- Solutions Grid -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Solution 1: Supermarket & Retail -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-7 space-y-6">
                <span class="text-xs uppercase font-bold tracking-widest text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-full">Retail & Supermarkets</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">High-Traffic Supermarket & Wholesale POS</h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Fast, error-free checkout lanes integrated directly with Kenya Revenue Authority (KRA) eTIMS fiscal electronic invoicing and instant Safaricom M-Pesa STK push.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs sm:text-sm text-slate-700">
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Offline Cache & Multi-Counter Sync</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Automated Stock Expiry Tracking</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Barcode Scale & Weighing Scale Sync</span></div>
                    <div class="flex items-center space-x-2"><span class="text-emerald-500 font-bold">&check;</span><span>Loss Prevention & Cashier Auditing</span></div>
                </div>
                <div class="pt-2">
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm transition">
                        <span>Get Supermarket Package Quote</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5">
                <img src="https://images.unsplash.com/photo-1578916171728-46686eac8d58?auto=format&fit=crop&w=800&q=80" alt="Supermarket POS Solution" class="rounded-2xl shadow-lg border border-slate-100 object-cover w-full h-72">
            </div>
        </div>

        <!-- Solution 2: Hospitality & Restaurants -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-5 order-2 lg:order-1">
                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80" alt="Restaurant POS Solution" class="rounded-2xl shadow-lg border border-slate-100 object-cover w-full h-72">
            </div>
            <div class="lg:col-span-7 space-y-6 order-1 lg:order-2">
                <span class="text-xs uppercase font-bold tracking-widest text-teal-600 bg-teal-50 px-3 py-1.5 rounded-full">Hospitality & Dining</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Restaurant, Bar & Hotel Management</h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Seamless table management, wireless waiter handheld ordering, kitchen display systems (KDS), and automated recipe ingredient stock deduction.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs sm:text-sm text-slate-700">
                    <div class="flex items-center space-x-2"><span class="text-teal-500 font-bold">&check;</span><span>Kitchen Order Tickets (KOT) Routing</span></div>
                    <div class="flex items-center space-x-2"><span class="text-teal-500 font-bold">&check;</span><span>Split Billing & M-Pesa Multi-Pay</span></div>
                    <div class="flex items-center space-x-2"><span class="text-teal-500 font-bold">&check;</span><span>Room Reservation & Check-In Portal</span></div>
                    <div class="flex items-center space-x-2"><span class="text-teal-500 font-bold">&check;</span><span>Ingredient Recipe Yield Tracking</span></div>
                </div>
                <div class="pt-2">
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 rounded-xl bg-teal-600 hover:bg-teal-700 text-white font-semibold text-sm transition">
                        <span>Explore Restaurant Setup</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Solution 3: Schools & Education -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-7 space-y-6">
                <span class="text-xs uppercase font-bold tracking-widest text-blue-600 bg-blue-50 px-3 py-1.5 rounded-full">Education & Academic</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">School ERP, Fees & CBC Academic Management</h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Designed specifically for Kenyan primary, secondary, and tertiary institutions to handle admissions, fee reconciliation, and CBC curriculum report cards.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs sm:text-sm text-slate-700">
                    <div class="flex items-center space-x-2"><span class="text-blue-500 font-bold">&check;</span><span>M-Pesa Paybill Auto Fee Matching</span></div>
                    <div class="flex items-center space-x-2"><span class="text-blue-500 font-bold">&check;</span><span>1-Click CBC Report Cards with QR Code</span></div>
                    <div class="flex items-center space-x-2"><span class="text-blue-500 font-bold">&check;</span><span>Bulk Parent SMS & Fee Reminders</span></div>
                    <div class="flex items-center space-x-2"><span class="text-blue-500 font-bold">&check;</span><span>Library, Transport & Hostel Modules</span></div>
                </div>
                <div class="pt-2">
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm transition">
                        <span>Schedule School ERP Demo</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80" alt="School Management Solution" class="rounded-2xl shadow-lg border border-slate-100 object-cover w-full h-72">
            </div>
        </div>

    </div>
</section>
@endsection
