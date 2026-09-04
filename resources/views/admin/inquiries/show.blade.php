@extends('layouts.admin')

@section('title', 'Inquiry Details')
@section('header_title', 'Customer Inquiry & RFP Review')

@section('content')
<div class="max-w-4xl space-y-8">
    
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to Inquiries List</a>
        
        <!-- Status Indicator -->
        <div class="flex items-center space-x-2">
            <span class="text-xs text-slate-500 font-bold">Current Status:</span>
            @if($inquiry->status === 'pending')
            <span class="bg-amber-100 text-amber-800 font-bold px-3 py-1 rounded-full text-xs">Pending Review</span>
            @elseif($inquiry->status === 'contacted')
            <span class="bg-blue-100 text-blue-800 font-bold px-3 py-1 rounded-full text-xs">Contacted Client</span>
            @else
            <span class="bg-emerald-100 text-emerald-800 font-bold px-3 py-1 rounded-full text-xs">Closed / Completed</span>
            @endif
        </div>
    </div>

    <!-- Inquiry Message Card -->
    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-6">
        
        <!-- Sender Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-slate-100 gap-4">
            <div>
                <h2 class="text-2xl font-extrabold text-slate-900">{{ $inquiry->name }}</h2>
                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-slate-500 mt-1">
                    <span>Email: <a href="mailto:{{ $inquiry->email }}" class="text-emerald-600 font-semibold hover:underline">{{ $inquiry->email }}</a></span>
                    @if($inquiry->phone)
                    <span>Phone: <a href="tel:{{ $inquiry->phone }}" class="text-emerald-600 font-semibold hover:underline">{{ $inquiry->phone }}</a></span>
                    @endif
                    @if($inquiry->company)
                    <span>Company: <strong class="text-slate-700">{{ $inquiry->company }}</strong></span>
                    @endif
                </div>
            </div>

            <!-- Quick Action: WhatsApp & Call -->
            @if($inquiry->phone)
            <div class="flex items-center space-x-2">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry->phone) }}?text={{ urlencode('Hello ' . $inquiry->name . ', thank you for contacting SkySoft Systems regarding your inquiry.') }}" target="_blank" class="px-4 py-2 rounded-xl bg-[#25D366] text-white font-bold text-xs shadow-sm hover:opacity-90 flex items-center">
                    <span>WhatsApp Client</span>
                </a>
                <a href="mailto:{{ $inquiry->email }}?subject={{ urlencode('Re: ' . ($inquiry->subject ?? 'SkySoft Systems Inquiry')) }}" class="px-4 py-2 rounded-xl bg-slate-800 text-white font-bold text-xs hover:bg-slate-700 flex items-center">
                    <span>Email Reply</span>
                </a>
            </div>
            @endif
        </div>

        <!-- Subject & Associated Product -->
        <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100 space-y-2 text-xs">
            <div>
                <span class="font-bold text-slate-500 uppercase tracking-wider text-[10px]">Subject:</span>
                <p class="text-sm font-bold text-slate-900">{{ $inquiry->subject ?? 'General Inquiry' }}</p>
            </div>
            @if($inquiry->product)
            <div>
                <span class="font-bold text-slate-500 uppercase tracking-wider text-[10px]">Related Catalog Product:</span>
                <p class="text-slate-800 font-semibold flex items-center mt-0.5">
                    <span>{{ $inquiry->product->name }}</span>
                    <a href="{{ route('products.show', $inquiry->product->slug) }}" target="_blank" class="text-emerald-600 ml-2 hover:underline text-[11px]">&rarr; View Product Page</a>
                </p>
            </div>
            @endif
        </div>

        <!-- Message Body -->
        <div class="space-y-2">
            <span class="font-bold text-slate-700 uppercase tracking-wider text-xs">Customer Message:</span>
            <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 text-slate-800 text-sm leading-relaxed whitespace-pre-line font-sans">
                {{ $inquiry->message }}
            </div>
        </div>

        <div class="text-xs text-slate-400">
            Received on {{ $inquiry->created_at->format('F d, Y \a\t h:i A') }} ({{ $inquiry->created_at->diffForHumans() }})
        </div>

    </div>

    <!-- Update Status & Admin Notes Form -->
    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-6">
        <h3 class="text-lg font-bold text-slate-900">Update Inquiry Status & Notes</h3>
        
        <form action="{{ route('admin.inquiries.updateStatus', $inquiry->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Status</label>
                <select name="status" class="w-full sm:w-64 px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 bg-white">
                    <option value="pending" {{ $inquiry->status === 'pending' ? 'selected' : '' }}>Pending (Needs Action)</option>
                    <option value="contacted" {{ $inquiry->status === 'contacted' ? 'selected' : '' }}>Contacted (Quote Sent / Discussion in Progress)</option>
                    <option value="closed" {{ $inquiry->status === 'closed' ? 'selected' : '' }}>Closed (Completed / Sale Closed)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Internal Admin Notes (Private)</label>
                <textarea name="admin_notes" rows="3" placeholder="e.g. Sent official quotation via email on Sept 4th. Customer requested site visit next Tuesday..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">{{ old('admin_notes', $inquiry->admin_notes) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition">Update Status</button>
            </div>
        </form>
    </div>

</div>
@endsection
