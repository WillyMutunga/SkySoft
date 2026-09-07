@extends('layouts.app')

@section('title', 'Tech Insights & Business Guides Kenya | SkySoft Systems')
@section('meta_description', 'Expert articles and engineering insights on KRA eTIMS integration, Smart Point of Sale, Online UPS power backups, and cybersecurity firewalls in Kenya.')

@section('content')
<!-- Header -->
<section class="bg-secondary-950 text-white py-16 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="text-xs uppercase font-bold tracking-widest text-emerald-400 bg-emerald-950/80 px-3 py-1.5 rounded-full border border-emerald-800/40">Knowledge Hub & Industry Guides</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">Tech Insights & Case Studies</h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-base">
            Stay informed with the latest practical guides on KRA fiscalization, retail automation, power continuity, and enterprise infrastructure in East Africa.
        </p>
    </div>
</section>

<!-- Blog Listing & Filter -->
<section class="py-16 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Search & Filter Bar -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm mb-10 space-y-4">
            <form action="{{ route('blog.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4">
                
                <!-- Search Input -->
                <div class="md:col-span-7 relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search articles, eTIMS guides, UPS sizing..." class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                    <svg class="w-5 h-5 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <!-- Category Select -->
                <div class="md:col-span-3">
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm bg-white">
                        <option value="all">All Topics</option>
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
        </div>

        <!-- Articles Grid -->
        @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <article class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Post Image -->
                    <a href="{{ route('blog.show', $post->slug) }}" class="block relative h-52 bg-slate-100 overflow-hidden">
                        <img src="{{ $post->image_url ?? 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80' }}" 
                             alt="{{ $post->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 bg-emerald-600 text-white text-[10px] uppercase tracking-wider font-extrabold px-2.5 py-1 rounded-md shadow-md">
                            {{ $post->category }}
                        </span>
                        <span class="absolute bottom-3 right-3 bg-slate-900/80 text-white text-[10px] font-semibold px-2 py-0.5 rounded backdrop-blur-sm">
                            {{ $post->read_time }}
                        </span>
                    </a>

                    <!-- Post Body -->
                    <div class="p-6 space-y-3">
                        <div class="flex items-center text-xs text-slate-400 space-x-2">
                            <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                            <span>&bull;</span>
                            <span class="text-slate-600 font-medium">{{ $post->author }}</span>
                        </div>

                        <h2 class="font-bold text-lg text-slate-900 group-hover:text-emerald-600 transition line-clamp-2">
                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                        </h2>

                        <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                            {{ $post->excerpt }}
                        </p>
                    </div>
                </div>

                <!-- Read More Footer -->
                <div class="p-6 pt-0">
                    <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center text-xs font-bold text-emerald-600 hover:text-emerald-700 transition">
                        <span>Read Full Guide</span>
                        <svg class="w-3.5 h-3.5 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $posts->appends(request()->query())->links() }}
        </div>

        @else
        <!-- No Articles Found -->
        <div class="bg-white p-12 text-center rounded-3xl border border-slate-200 max-w-md mx-auto space-y-4">
            <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900">No articles found</h3>
            <p class="text-xs text-slate-500">Try adjusting your search terms or category filter.</p>
            <a href="{{ route('blog.index') }}" class="inline-block px-6 py-2.5 rounded-xl bg-emerald-600 text-white font-semibold text-xs">View All Guides</a>
        </div>
        @endif

    </div>
</section>
@endsection
