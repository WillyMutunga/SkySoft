@extends('layouts.admin')

@section('title', 'Create New Article')
@section('header_title', 'Write & Publish Tech Insight')

@section('content')
<div class="max-w-4xl bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-6">
    
    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900">New Article / Case Study</h2>
            <p class="text-xs text-slate-500">Create an informative post to educate clients and improve Google search rankings.</p>
        </div>
        <a href="{{ route('admin.posts.index') }}" class="text-xs text-slate-500 hover:text-slate-800 transition">&larr; Back to Articles</a>
    </div>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Article Title *</label>
            <input type="text" name="title" required value="{{ old('title') }}" placeholder="e.g. Complete Guide to KRA eTIMS Integration for Retail POS in Kenya" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <!-- Category -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Category *</label>
                <select name="category" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 bg-white">
                    <option value="Point of Sale & eTIMS">Point of Sale & eTIMS</option>
                    <option value="Power Backup & UPS">Power Backup & UPS</option>
                    <option value="Cybersecurity & Networking">Cybersecurity & Networking</option>
                    <option value="School ERP & Software">School ERP & Software</option>
                    <option value="Security & Surveillance">Security & Surveillance</option>
                    <option value="Enterprise IT">Enterprise IT</option>
                </select>
            </div>

            <!-- Author -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Author Name</label>
                <input type="text" name="author" value="{{ old('author', 'SkySoft Engineering') }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
            </div>

            <!-- Read Time -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Est. Read Time</label>
                <input type="text" name="read_time" value="{{ old('read_time', '5 min read') }}" placeholder="e.g. 6 min read" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
            </div>
        </div>

        <!-- Excerpt -->
        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Short Excerpt (SEO Summary) *</label>
            <textarea name="excerpt" rows="2" placeholder="Brief 1-2 sentence preview for search engines and article cards..." class="w-full px-4 py-3 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500">{{ old('excerpt') }}</textarea>
        </div>

        <!-- Hybrid Image Option (File Upload or URL) -->
        <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200 space-y-4">
            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider text-emerald-600">Featured Article Image</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Option A: Upload Image File</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-600 file:text-white hover:file:bg-emerald-700 cursor-pointer">
                    <p class="text-[10px] text-slate-400 mt-1">Upload .jpg, .png, or .webp (Max 5MB)</p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Option B: Direct Image URL</label>
                    <input type="url" name="image_url" value="{{ old('image_url') }}" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500">
                    <p class="text-[10px] text-slate-400 mt-1">Or paste a CDN image link</p>
                </div>
            </div>
        </div>

        <!-- Full Content -->
        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Article Full Content (Supports HTML / Text) *</label>
            <textarea name="content" rows="12" required placeholder="Write the full article body, headings, and detailed instructions here..." class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 font-sans">{{ old('content') }}</textarea>
        </div>

        <!-- Publish Toggle -->
        <div class="flex items-center">
            <label class="flex items-center text-sm font-semibold text-slate-800 cursor-pointer">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }} class="w-5 h-5 rounded text-emerald-600 focus:ring-emerald-500 border-slate-300 mr-2.5">
                <span>Publish immediately on live website</span>
            </label>
        </div>

        <div class="pt-6 flex justify-end">
            <button type="submit" class="px-8 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition">
                Publish Article
            </button>
        </div>
    </form>

</div>
@endsection
