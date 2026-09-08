@extends('layouts.admin')

@section('title', 'Edit Category - ' . $category->name)

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Top Navigation -->
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.categories.index') }}" class="p-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:text-slate-900 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <h1 class="text-2xl font-black text-slate-900 tracking-tight">Edit Category</h1>
                <p class="text-xs text-slate-500">Currently contains <strong class="text-slate-800">{{ $category->products_count }}</strong> linked products.</p>
            </div>
        </div>
    </div>

    <!-- Category Edit Form -->
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Category Name <span class="text-rose-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm font-semibold">
            <span class="text-[11px] text-slate-400 mt-1 block">Renaming this category will automatically update all linked products.</span>
            @error('name')<p class="text-xs text-rose-500 mt-1 font-semibold">{{ $message }}</p>@enderror
        </div>

        <!-- Slug -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">URL Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm font-mono">
            @error('slug')<p class="text-xs text-rose-500 mt-1 font-semibold">{{ $message }}</p>@enderror
        </div>

        <!-- Description -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Description</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm">{{ old('description', $category->description) }}</textarea>
            @error('description')<p class="text-xs text-rose-500 mt-1 font-semibold">{{ $message }}</p>@enderror
        </div>

        <!-- Sort Order & Status -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Display Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $category->sort_order) }}" min="0" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm font-semibold">
                <span class="text-[11px] text-slate-400 mt-1 block">Lower numbers appear first in catalog.</span>
            </div>

            <div class="flex items-center pt-6">
                <label class="relative flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                    <span class="ml-3 text-sm font-bold text-slate-800">Category Active (Show in Catalog)</span>
                </label>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-end space-x-3 pt-6 border-t border-slate-100">
            <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-sm transition">Cancel</a>
            <button type="submit" class="px-8 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-black text-sm shadow-md transition transform hover:-translate-y-0.5">
                Update Category
            </button>
        </div>
    </form>
</div>
@endsection
