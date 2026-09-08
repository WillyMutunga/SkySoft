@extends('layouts.admin')

@section('title', 'Product Categories Management')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Product Categories</h1>
            <p class="text-sm text-slate-500 mt-1">Organize your hardware, software, and IT services catalog into customer-friendly categories.</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 hover:text-slate-900 font-bold text-sm shadow-sm transition">
                <span>&larr; Products Catalog</span>
            </a>
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-sm transition transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Add New Category</span>
            </a>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
        <form action="{{ route('admin.categories.index') }}" method="GET" class="flex items-center gap-3">
            <div class="flex-1 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search category by name or description..." class="w-full pl-10 pr-4 py-2 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <button type="submit" class="px-5 py-2 bg-slate-900 text-white rounded-xl text-sm font-semibold hover:bg-slate-800 transition">Search</button>
            @if(request()->filled('search'))
            <a href="{{ route('admin.categories.index') }}" class="px-3 py-2 text-slate-500 hover:text-slate-800 text-xs font-semibold">Reset</a>
            @endif
        </form>
    </div>

    <!-- Categories Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 border-b border-slate-200 text-xs uppercase font-bold text-slate-500 tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Category Name</th>
                        <th class="px-6 py-4">Slug (URL Key)</th>
                        <th class="px-6 py-4">Description</th>
                        <th class="px-6 py-4 text-center">Linked Products</th>
                        <th class="px-6 py-4 text-center">Sort Order</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($categories as $category)
                    <tr class="hover:bg-slate-50/80 transition">
                        <!-- Name -->
                        <td class="px-6 py-4">
                            <div class="font-bold text-slate-900 text-sm flex items-center gap-2">
                                <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs font-black">
                                    {{ strtoupper(substr($category->name, 0, 1)) }}
                                </span>
                                <span>{{ $category->name }}</span>
                            </div>
                        </td>

                        <!-- Slug -->
                        <td class="px-6 py-4 font-mono text-xs text-slate-500">
                            {{ $category->slug }}
                        </td>

                        <!-- Description -->
                        <td class="px-6 py-4 text-xs text-slate-500 max-w-xs truncate">
                            {{ $category->description ?? 'No description' }}
                        </td>

                        <!-- Linked Products Count -->
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.products.index', ['category' => $category->name]) }}" class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold {{ $category->products_count > 0 ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100' : 'bg-slate-100 text-slate-500 border border-slate-200' }}">
                                {{ $category->products_count }} {{ Str::plural('product', $category->products_count) }}
                            </a>
                        </td>

                        <!-- Sort Order -->
                        <td class="px-6 py-4 text-center font-mono text-xs font-bold text-slate-700">
                            {{ $category->sort_order }}
                        </td>

                        <!-- Status -->
                        <td class="px-6 py-4 text-center">
                            @if($category->is_active)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1 animate-pulse"></span> Active
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-slate-100 text-slate-500 border border-slate-200">
                                Inactive
                            </span>
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-emerald-50 text-slate-700 hover:text-emerald-700 text-xs font-bold transition">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                <span>Edit</span>
                            </a>

                            @if($category->products_count === 0)
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete category [{{ $category->name }}]?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 rounded-lg hover:bg-rose-50 transition" title="Delete Category">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                            @else
                            <button type="button" class="p-1.5 text-slate-300 cursor-not-allowed" title="Cannot delete category containing products">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-slate-400">
                            <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                            <p class="font-bold text-slate-600">No categories found</p>
                            <p class="text-xs text-slate-400 mt-1">Create your first product category using the button above.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($categories->hasPages())
        <div class="p-4 border-t border-slate-200">
            {{ $categories->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
