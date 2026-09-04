@extends('layouts.app')

@section('title', 'Hardware & Software Products Catalog | SkySoft Systems Kenya')

@section('content')
<!-- Page Header -->
<section class="bg-secondary-950 text-white py-16 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="text-xs uppercase font-bold tracking-widest text-emerald-400 bg-emerald-950/80 px-3 py-1.5 rounded-full border border-emerald-800/40">Hardware & Bundles</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">Products & Technology Solutions</h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-base">
            Browse our commercial Point of Sale terminals, Online UPS backups, firewalls, and enterprise software suites.
        </p>
    </div>
</section>

<!-- Filter & Product Grid -->
<section class="py-16 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Search & Category Bar -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm mb-10 space-y-4">
            <form action="{{ route('products.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4">
                
                <!-- Search Input -->
                <div class="md:col-span-6 relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products, POS, UPS, Firewalls..." class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                    <svg class="w-5 h-5 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <!-- Category Select -->
                <div class="md:col-span-4">
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm bg-white">
                        <option value="all">All Categories</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="md:col-span-2">
                    <button type="submit" class="w-full py-3 px-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm rounded-xl transition shadow-md">
                        Filter
                    </button>
                </div>
            </form>

            <!-- Quick Pill Category Badges -->
            <div class="flex flex-wrap items-center gap-2 pt-2 border-t border-slate-100 text-xs">
                <span class="font-bold text-slate-500 mr-1">Quick Select:</span>
                <a href="{{ route('products.index') }}" class="px-3 py-1 rounded-lg border {{ !request('category') || request('category') === 'all' ? 'bg-emerald-600 text-white border-emerald-600' : 'bg-slate-100 text-slate-700 border-slate-200 hover:bg-slate-200' }}">All</a>
                @foreach($categories as $cat)
                <a href="{{ route('products.index', ['category' => $cat]) }}" class="px-3 py-1 rounded-lg border {{ request('category') === $cat ? 'bg-emerald-600 text-white border-emerald-600' : 'bg-slate-100 text-slate-700 border-slate-200 hover:bg-slate-200' }}">{{ $cat }}</a>
                @endforeach
            </div>
        </div>

        <!-- Products Grid -->
        @if($products->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Product Image -->
                    <div class="relative h-56 bg-slate-100 overflow-hidden">
                        <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1556742049-0a67e5572293?auto=format&fit=crop&w=800&q=80' }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @if($product->badge)
                        <span class="absolute top-3 left-3 bg-emerald-600 text-white text-[11px] uppercase tracking-wider font-extrabold px-2.5 py-1 rounded-md shadow-md">
                            {{ $product->badge }}
                        </span>
                        @endif
                        <span class="absolute top-3 right-3 bg-slate-900/80 text-white text-xs font-semibold px-2.5 py-1 rounded-md backdrop-blur-sm">
                            {{ $product->category }}
                        </span>
                    </div>

                    <!-- Product Content -->
                    <div class="p-6 space-y-3">
                        <h3 class="font-bold text-lg text-slate-900 group-hover:text-emerald-600 transition line-clamp-2">
                            <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                        </h3>
                        <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                            {{ $product->short_description }}
                        </p>

                        <!-- Key Feature Highlights -->
                        @if(!empty($product->features) && count($product->features) > 0)
                        <div class="pt-2 space-y-1.5 border-t border-slate-100">
                            @foreach(array_slice($product->features, 0, 2) as $feat)
                            <div class="text-[11px] text-slate-500 flex items-center">
                                <span class="text-emerald-500 mr-1.5 font-bold">&check;</span>
                                <span class="truncate">{{ $feat }}</span>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        
                        <div class="pt-2">
                            <span class="text-xl font-extrabold text-slate-900">{{ $product->formatted_price }}</span>
                        </div>
                    </div>
                </div>

                <!-- Product Action Footer -->
                <div class="p-6 pt-0 flex gap-2">
                    <a href="{{ route('products.show', $product->slug) }}" class="w-full py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs transition flex items-center justify-center shadow-sm">
                        <span>View Details & Quote</span>
                        <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $products->appends(request()->query())->links() }}
        </div>

        @else
        <!-- No Products Found -->
        <div class="bg-white p-12 text-center rounded-2xl border border-slate-200 max-w-md mx-auto space-y-4">
            <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900">No products found</h3>
            <p class="text-xs text-slate-500">Try adjusting your category filter or search keywords.</p>
            <a href="{{ route('products.index') }}" class="inline-block px-6 py-2.5 rounded-xl bg-emerald-600 text-white font-semibold text-xs">Reset Filters</a>
        </div>
        @endif

    </div>
</section>
@endsection
