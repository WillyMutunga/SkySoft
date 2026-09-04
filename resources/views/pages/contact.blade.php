@extends('layouts.app')

@section('title', 'Contact Us | SkySoft Systems Nairobi, Kenya')

@section('content')
<!-- Page Header -->
<section class="bg-secondary-950 text-white py-16 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="text-xs uppercase font-bold tracking-widest text-emerald-400 bg-emerald-950/80 px-3 py-1.5 rounded-full border border-emerald-800/40">Get In Touch</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">Let's Discuss Your Project</h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-base">
            Reach out to our technology specialists in Nairobi for pricing inquiries, site assessments, and rapid support.
        </p>
    </div>
</section>

<!-- Contact Content Grid -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left Contact Information -->
            <div class="lg:col-span-5 space-y-8">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Direct Contacts</h2>
                    <p class="text-slate-600 text-sm mt-2">Our technical desk is open Monday to Saturday, with 24/7 on-call emergency standby for mission-critical client servers.</p>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start space-x-4 bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Headquarters & Workshop</h4>
                            <p class="text-xs text-slate-600 mt-1">Nairobi, Kenya</p>
                            <span class="text-[11px] text-emerald-600 font-semibold block mt-1">On-site client visits across Kenya & East Africa</span>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                        <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Phone & WhatsApp</h4>
                            <p class="text-xs text-slate-600 mt-1">Direct Line: +254 712 345 678</p>
                            <a href="https://wa.me/254712345678" target="_blank" class="text-[11px] text-emerald-600 font-bold hover:underline block mt-1">Start WhatsApp Chat &rarr;</a>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                        <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Email Addresses</h4>
                            <p class="text-xs text-slate-600 mt-1">General: <a href="mailto:info@skysoftsystems.co.ke" class="hover:underline text-emerald-600">info@skysoftsystems.co.ke</a></p>
                            <p class="text-xs text-slate-600">Sales: <a href="mailto:sales@skysoftsystems.co.ke" class="hover:underline text-emerald-600">sales@skysoftsystems.co.ke</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Interactive Contact Form -->
            <div class="lg:col-span-7">
                <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-xl space-y-6">
                    <div>
                        <h3 class="text-2xl font-bold text-slate-900">Send an Inquiry or RFP</h3>
                        <p class="text-xs text-slate-500 mt-1">Fill out the form below and an engineer will respond with a tailored proposal.</p>
                    </div>

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Your Full Name *</label>
                                <input type="text" name="name" required value="{{ old('name') }}" placeholder="e.g. Willy Mutunga" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Email Address *</label>
                                <input type="email" name="email" required value="{{ old('email') }}" placeholder="willy@company.co.ke" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Phone Number (WhatsApp) *</label>
                                <input type="text" name="phone" required value="{{ old('phone') }}" placeholder="+254 7..." class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Company / Organization</label>
                                <input type="text" name="company" value="{{ old('company') }}" placeholder="e.g. Skyline Retailers Ltd" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Inquiry Subject</label>
                                <input type="text" name="subject" value="{{ old('subject') }}" placeholder="e.g. POS Installation for 2 Branches" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Interested Product (Optional)</label>
                                <select name="product_id" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 bg-white">
                                    <option value="">-- Select Specific Product --</option>
                                    @foreach($products as $prod)
                                    <option value="{{ $prod->id }}" {{ old('product_id') == $prod->id ? 'selected' : '' }}>{{ $prod->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Message / Project Requirements *</label>
                            <textarea name="message" rows="4" required placeholder="Describe your technical needs, branch locations, number of users, or desired timeline..." class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">{{ old('message') }}</textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full py-3.5 px-6 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition flex items-center justify-center">
                                <span>Send Inquiry Message</span>
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
