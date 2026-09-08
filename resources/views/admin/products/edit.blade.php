@extends('layouts.admin')

@section('title', 'Edit Product: ' . $product->name)
@section('header_title', 'Edit Product Details')

@section('content')
<div class="max-w-4xl bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-6">
    
    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Editing: {{ $product->name }}</h2>
            <p class="text-xs text-slate-500">Update pricing, description, or specs</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="text-xs font-semibold text-slate-500 hover:text-slate-800">&larr; Back to Catalog</a>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Product Name *</label>
                <input type="text" name="name" required value="{{ old('name', $product->name) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
            </div>

            <div>
                <div class="flex items-center justify-between mb-1">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Category *</label>
                    <a href="{{ route('admin.categories.index') }}" target="_blank" class="text-[11px] font-bold text-emerald-600 hover:text-emerald-700 flex items-center">
                        <span>+ Manage Categories</span>
                    </a>
                </div>
                <select name="category" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 bg-white">
                    @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ old('category', $product->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Pricing Type *</label>
                <select name="price_type" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 bg-white">
                    <option value="fixed" {{ old('price_type', $product->price_type) === 'fixed' ? 'selected' : '' }}>Fixed Price</option>
                    <option value="starting_at" {{ old('price_type', $product->price_type) === 'starting_at' ? 'selected' : '' }}>Starting From</option>
                    <option value="custom_quote" {{ old('price_type', $product->price_type) === 'custom_quote' ? 'selected' : '' }}>Custom Quote</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Price (KES)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Badge Tag</label>
                <input type="text" name="badge" value="{{ old('badge', $product->badge) }}" placeholder="e.g. Best Seller, Popular" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
            </div>
        </div>

        <input type="hidden" name="currency" value="KES">

        <!-- Hybrid Image Upload Section -->
        <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200 space-y-4">
            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider text-emerald-600">Product Image (Choose File OR Enter URL)</h3>
            
            <div class="flex items-center space-x-4 mb-2">
                @if($product->image_url)
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-16 h-16 rounded-xl object-cover border border-slate-200">
                <span class="text-xs text-slate-500">Current Image Preview</span>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Replace with Photo from Computer / Phone</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-600 file:text-white hover:file:bg-emerald-700 cursor-pointer">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">OR Image URL</label>
                    <input type="url" name="image_url" value="{{ old('image_url', $product->image_url) }}" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Short Description *</label>
            <textarea name="short_description" rows="2" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">{{ old('short_description', $product->short_description) }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Full Detailed Description *</label>
            <textarea name="description" rows="5" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">{{ old('description', $product->description) }}</textarea>
        </div>

        @php
            $featuresStr = is_array($product->features) ? implode("\n", $product->features) : '';
            $specsStr = '';
            if (is_array($product->specs)) {
                foreach ($product->specs as $k => $v) {
                    $specsStr .= "{$k}: {$v}\n";
                }
            }
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Features (1 per line)</label>
                <textarea name="features" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-emerald-500">{{ old('features', $featuresStr) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Specifications (Format: Key: Value)</label>
                <textarea name="specs" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-emerald-500">{{ old('specs', $specsStr) }}</textarea>
            </div>
        </div>

        <div class="flex items-center space-x-6 pt-2 border-t border-slate-100 text-sm">
            <label class="flex items-center space-x-2 text-slate-700 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 rounded">
                <span>Featured on Homepage</span>
            </label>

            <label class="flex items-center space-x-2 text-slate-700 cursor-pointer">
                <input type="checkbox" name="in_stock" value="1" {{ old('in_stock', $product->in_stock) ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 rounded">
                <span>Currently In Stock</span>
            </label>
        </div>

        <div class="pt-4 flex justify-end space-x-3">
            <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 text-xs font-semibold hover:bg-slate-50">Cancel</a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold shadow-md transition">Update Product</button>
        </div>
    </form>

</div>
@endsection
