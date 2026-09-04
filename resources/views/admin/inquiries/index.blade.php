@extends('layouts.admin')

@section('title', 'Customer Inquiries & Quotes')
@section('header_title', 'Customer Inquiries & Quote Requests')

@section('content')
<div class="space-y-6">
    
    <!-- Filter Bar & Export -->
    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
        <form action="{{ route('admin.inquiries.index') }}" method="GET" class="flex-1 flex flex-col sm:flex-row gap-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, email, company, message..." class="px-3.5 py-2 rounded-xl border border-slate-300 text-xs w-full sm:w-72 focus:ring-2 focus:ring-emerald-500">
            
            <select name="status" class="px-3 py-2 rounded-xl border border-slate-300 text-xs bg-white">
                <option value="">All Statuses</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="contacted" {{ request('status') === 'contacted' ? 'selected' : '' }}>Contacted</option>
                <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
            
            <button type="submit" class="px-4 py-2 bg-slate-800 text-white font-semibold text-xs rounded-xl hover:bg-slate-700 transition">Filter</button>
            @if(request('search') || request('status'))
            <a href="{{ route('admin.inquiries.index') }}" class="px-3 py-2 bg-slate-100 text-slate-600 font-semibold text-xs rounded-xl hover:bg-slate-200 transition flex items-center justify-center">Reset</a>
            @endif
        </form>

        <a href="{{ route('admin.inquiries.export') }}" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold shadow-md transition flex-shrink-0">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <span>Export to CSV / Excel</span>
        </a>
    </div>

    <!-- Inquiries Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider">
                        <th class="py-4 px-6">Client Details</th>
                        <th class="py-4 px-6">Subject / Product</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Date Received</th>
                        <th class="py-4 px-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($inquiries as $inquiry)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6">
                            <h4 class="font-bold text-slate-900 text-sm">{{ $inquiry->name }}</h4>
                            <p class="text-slate-500 text-[11px]">{{ $inquiry->email }}</p>
                            @if($inquiry->phone)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry->phone) }}" target="_blank" class="text-emerald-600 font-medium text-[11px] hover:underline">{{ $inquiry->phone }}</a>
                            @endif
                            @if($inquiry->company)
                            <span class="text-[10px] text-slate-400 block">&bull; {{ $inquiry->company }}</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 max-w-xs">
                            <p class="font-semibold text-slate-800">{{ $inquiry->subject ?? 'General Inquiry' }}</p>
                            @if($inquiry->product)
                            <span class="bg-slate-100 text-slate-700 text-[10px] font-semibold px-2 py-0.5 rounded inline-block mt-1">Item: {{ $inquiry->product->name }}</span>
                            @endif
                            <p class="text-slate-500 text-[11px] truncate mt-1">{{ $inquiry->message }}</p>
                        </td>
                        <td class="py-4 px-6">
                            @if($inquiry->status === 'pending')
                            <span class="bg-amber-100 text-amber-800 font-bold px-2.5 py-1 rounded-full text-[10px]">Pending</span>
                            @elseif($inquiry->status === 'contacted')
                            <span class="bg-blue-100 text-blue-800 font-bold px-2.5 py-1 rounded-full text-[10px]">Contacted</span>
                            @else
                            <span class="bg-emerald-100 text-emerald-800 font-bold px-2.5 py-1 rounded-full text-[10px]">Closed</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-slate-500">
                            {{ $inquiry->created_at->format('M d, Y') }}
                            <span class="text-[10px] text-slate-400 block">{{ $inquiry->created_at->diffForHumans() }}</span>
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 font-bold text-xs hover:bg-emerald-100 transition">Review & Reply</a>
                            <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this inquiry?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-500 hover:text-rose-700 text-xs">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center text-slate-400">No inquiries found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $inquiries->appends(request()->query())->links() }}
        </div>
    </div>

</div>
@endsection
