@extends('layouts.admin')

@section('title', 'Products Management')
@section('header_title', 'Products & Hardware Catalog')

@section('content')
<div class="space-y-6">
    
    <!-- Filter & Action Bar -->
    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
        <form action="{{ route('admin.products.index') }}" method="GET" class="flex-1 flex flex-col sm:flex-row gap-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, category..." class="px-3.5 py-2 rounded-xl border border-slate-300 text-xs w-full sm:w-64 focus:ring-2 focus:ring-emerald-500">
            
            <select name="category" class="px-3 py-2 rounded-xl border border-slate-300 text-xs bg-white">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
            
            <button type="submit" class="px-4 py-2 bg-slate-800 text-white font-semibold text-xs rounded-xl hover:bg-slate-700 transition">Filter</button>
            @if(request('search') || request('category'))
            <a href="{{ route('admin.products.index') }}" class="px-3 py-2 bg-slate-100 text-slate-600 font-semibold text-xs rounded-xl hover:bg-slate-200 transition flex items-center justify-center">Reset</a>
            @endif
        </form>

        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold shadow-md transition flex-shrink-0">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Add New Product</span>
        </a>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider">
                        <th class="py-4 px-6">Product</th>
                        <th class="py-4 px-6">Category</th>
                        <th class="py-4 px-6">Price</th>
                        <th class="py-4 px-6">Featured</th>
                        <th class="py-4 px-6">Stock</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($products as $product)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6 flex items-center space-x-3">
                            <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1556742049-0a67e5572293?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $product->name }}" class="w-12 h-12 rounded-xl object-cover border border-slate-200 flex-shrink-0">
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm max-w-xs truncate">{{ $product->name }}</h4>
                                @if($product->badge)
                                <span class="bg-emerald-100 text-emerald-800 text-[10px] font-extrabold px-2 py-0.5 rounded">{{ $product->badge }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="py-4 px-6 font-medium text-slate-600">{{ $product->category }}</td>
                        <td class="py-4 px-6 font-extrabold text-slate-900">{{ $product->formatted_price }}</td>
                        <td class="py-4 px-6">
                            @if($product->is_featured)
                            <span class="bg-emerald-100 text-emerald-700 font-bold px-2 py-0.5 rounded text-[10px]">Yes</span>
                            @else
                            <span class="text-slate-400">No</span>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            @if($product->in_stock)
                            <span class="text-emerald-600 font-semibold">&check; In Stock</span>
                            @else
                            <span class="text-rose-500 font-semibold">&cross; Out of Stock</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="{{ route('products.show', $product->slug) }}" target="_blank" class="text-slate-500 hover:text-slate-900 font-medium">View</a>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-emerald-600 hover:text-emerald-800 font-bold">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-500 hover:text-rose-700 font-semibold">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-slate-400">No products found. Click "Add New Product" to create one.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>

</div>
@endsection
