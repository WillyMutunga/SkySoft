@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header_title', 'System Overview & Analytics')

@section('content')
<div class="space-y-8">
    
    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Products</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-1">{{ $stats['total_products'] }}</h3>
                <span class="text-[11px] text-emerald-600 font-semibold mt-1 block">&bull; Active In Catalog</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Featured Items</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-1">{{ $stats['featured_products'] }}</h3>
                <span class="text-[11px] text-slate-400 mt-1 block">Homepage Showcases</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center font-bold">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Inquiries</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-1">{{ $stats['total_inquiries'] }}</h3>
                <span class="text-[11px] text-slate-400 mt-1 block">Lifetime Submissions</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Pending Quotes</p>
                <h3 class="text-3xl font-extrabold text-amber-600 mt-1">{{ $stats['pending_inquiries'] }}</h3>
                <span class="text-[11px] text-amber-600 font-semibold mt-1 block">Requires Response</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center font-bold">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

    </div>

    <!-- Dual Table Overview (Recent Inquiries & Recent Products) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Recent Inquiries -->
        <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-200 flex justify-between items-center">
                <h3 class="font-bold text-base text-slate-900">Recent Customer Inquiries</h3>
                <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-700">View All &rarr;</a>
            </div>
            
            <div class="divide-y divide-slate-100 text-xs">
                @forelse($recentInquiries as $inquiry)
                <div class="p-5 flex items-start justify-between hover:bg-slate-50 transition">
                    <div class="space-y-1 max-w-sm">
                        <div class="flex items-center space-x-2">
                            <span class="font-bold text-slate-900">{{ $inquiry->name }}</span>
                            <span class="text-[10px] text-slate-400">&bull; {{ $inquiry->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-slate-600 font-medium truncate">{{ $inquiry->subject ?? 'General Inquiry' }}</p>
                        <p class="text-slate-400 text-[11px] truncate">{{ $inquiry->message }}</p>
                    </div>
                    <div class="text-right flex flex-col items-end space-y-2">
                        @if($inquiry->status === 'pending')
                        <span class="bg-amber-100 text-amber-700 font-bold px-2 py-0.5 rounded text-[10px]">Pending</span>
                        @elseif($inquiry->status === 'contacted')
                        <span class="bg-blue-100 text-blue-700 font-bold px-2 py-0.5 rounded text-[10px]">Contacted</span>
                        @else
                        <span class="bg-emerald-100 text-emerald-700 font-bold px-2 py-0.5 rounded text-[10px]">Closed</span>
                        @endif
                        <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="text-emerald-600 hover:text-emerald-700 font-bold">Details &rarr;</a>
                    </div>
                </div>
                @empty
                <div class="p-8 text-center text-slate-400">No customer inquiries yet.</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Products -->
        <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-200 flex justify-between items-center">
                <h3 class="font-bold text-base text-slate-900">Latest Products</h3>
                <a href="{{ route('admin.products.index') }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-700">View Catalog &rarr;</a>
            </div>

            <div class="divide-y divide-slate-100 text-xs">
                @forelse($recentProducts as $product)
                <div class="p-4 flex items-center justify-between hover:bg-slate-50 transition">
                    <div class="flex items-center space-x-3">
                        <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1556742049-0a67e5572293?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $product->name }}" class="w-10 h-10 rounded-lg object-cover border border-slate-200">
                        <div class="max-w-[180px]">
                            <p class="font-bold text-slate-900 truncate">{{ $product->name }}</p>
                            <p class="text-[10px] text-slate-400 truncate">{{ $product->category }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="font-extrabold text-slate-900 block">{{ $product->formatted_price }}</span>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-emerald-600 hover:underline text-[11px]">Edit</a>
                    </div>
                </div>
                @empty
                <div class="p-8 text-center text-slate-400">No products added.</div>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
