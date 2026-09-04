@extends('layouts.admin')

@section('title', 'Company & Website Settings')
@section('header_title', 'Company Profile & General Settings')

@section('content')
<div class="max-w-4xl bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-6">
    
    <div class="border-b border-slate-100 pb-4">
        <h2 class="text-xl font-bold text-slate-900">General Company Information</h2>
        <p class="text-xs text-slate-500">Update phone numbers, WhatsApp lines, email addresses, and Nairobi office location.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Contact Information Group -->
        <div>
            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4 text-emerald-600">Contact & Support Channels</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Phone Number (Calling) *</label>
                    <input type="text" name="company_phone" value="{{ old('company_phone', $settings['company_phone'] ?? '+254 712 345 678') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">WhatsApp Number (International format, no +) *</label>
                    <input type="text" name="company_whatsapp" value="{{ old('company_whatsapp', $settings['company_whatsapp'] ?? '254712345678') }}" placeholder="254712345678" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">General Inquiries Email *</label>
                    <input type="email" name="company_email" value="{{ old('company_email', $settings['company_email'] ?? 'info@skysoftsystems.co.ke') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Sales & RFP Email</label>
                    <input type="email" name="sales_email" value="{{ old('sales_email', $settings['sales_email'] ?? 'sales@skysoftsystems.co.ke') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>
        </div>

        <!-- Location & Office Group -->
        <div class="pt-4 border-t border-slate-100">
            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4 text-emerald-600">Physical Location & Working Hours</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Physical Office Address *</label>
                    <input type="text" name="office_address" value="{{ old('office_address', $settings['office_address'] ?? 'Nairobi, Kenya') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Working Hours</label>
                    <input type="text" name="working_hours" value="{{ old('working_hours', $settings['working_hours'] ?? 'Mon - Sat: 8:00 AM - 6:00 PM') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>
        </div>

        <!-- Social Media Links -->
        <div class="pt-4 border-t border-slate-100">
            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4 text-emerald-600">Social Media & Online Presence</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Facebook URL</label>
                    <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" placeholder="https://facebook.com/..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}" placeholder="https://linkedin.com/..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Twitter / X URL</label>
                    <input type="url" name="twitter_url" value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}" placeholder="https://x.com/..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>
        </div>

        <div class="pt-6 flex justify-end">
            <button type="submit" class="px-8 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold shadow-md transition">
                Save & Apply Settings
            </button>
        </div>
    </form>

</div>
@endsection
