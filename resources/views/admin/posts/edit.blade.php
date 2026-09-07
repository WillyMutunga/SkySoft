@extends('layouts.admin')

@section('title', 'Edit Article - ' . $post->title)
@section('header_title', 'Edit Tech Insight / Guide')

@section('content')
<div class="max-w-4xl bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-6">
    
    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Edit Article</h2>
            <p class="text-xs text-slate-500">Update article content, category, reading time, or featured image.</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="text-xs text-emerald-600 hover:underline">View Live &rarr;</a>
            <span class="text-slate-300">|</span>
            <a href="{{ route('admin.posts.index') }}" class="text-xs text-slate-500 hover:text-slate-800 transition">&larr; Back</a>
        </div>
    </div>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Article Title *</label>
            <input type="text" name="title" required value="{{ old('title', $post->title) }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <!-- Category -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Category *</label>
                <select name="category" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 bg-white">
                    @php
                        $cats = ['Point of Sale & eTIMS', 'Power Backup & UPS', 'Cybersecurity & Networking', 'School ERP & Software', 'Security & Surveillance', 'Enterprise IT'];
                    @endphp
                    @foreach($cats as $c)
                    <option value="{{ $c }}" {{ old('category', $post->category) === $c ? 'selected' : '' }}>{{ $c }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Author -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Author Name</label>
                <input type="text" name="author" value="{{ old('author', $post->author) }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
            </div>

            <!-- Read Time -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Est. Read Time</label>
                <input type="text" name="read_time" value="{{ old('read_time', $post->read_time) }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
            </div>
        </div>

        <!-- Excerpt -->
        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Short Excerpt (SEO Summary) *</label>
            <textarea name="excerpt" rows="2" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500">{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>

        <!-- Hybrid Image Option -->
        <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200 space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider text-emerald-600">Featured Article Image</h3>
                @if($post->image_url)
                <span class="text-[11px] text-slate-500">Current Image Attached</span>
                @endif
            </div>

            @if($post->image_url)
            <div class="flex items-center space-x-4 pb-2">
                <img src="{{ $post->image_url }}" class="w-20 h-20 rounded-xl object-cover border border-slate-200 shadow-sm">
                <p class="text-xs text-slate-500 font-mono break-all">{{ $post->image_url }}</p>
            </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Replace via File Upload</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-600 file:text-white hover:file:bg-emerald-700 cursor-pointer">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Or Replace Image URL</label>
                    <input type="url" name="image_url" value="{{ old('image_url', $post->image_url) }}" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>
        </div>

        <!-- Full Content -->
        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Article Full Content (Supports HTML / Text) *</label>
            <textarea name="content" rows="14" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 font-sans">{{ old('content', $post->content) }}</textarea>
        </div>

        <!-- Publish Toggle -->
        <div class="flex items-center">
            <label class="flex items-center text-sm font-semibold text-slate-800 cursor-pointer">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }} class="w-5 h-5 rounded text-emerald-600 focus:ring-emerald-500 border-slate-300 mr-2.5">
                <span>Article is Published & Live</span>
            </label>
        </div>

        <div class="pt-6 flex justify-end">
            <button type="submit" class="px-8 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition">
                Update Article
            </button>
        </div>
    </form>

</div>
@endsection
