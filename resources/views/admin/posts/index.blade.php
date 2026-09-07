@extends('layouts.admin')

@section('title', 'Blog & Tech Insights Management')
@section('header_title', 'Tech Insights & Articles Management')

@section('content')
<div class="space-y-6">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
        <div>
            <h2 class="text-lg font-bold text-slate-900">Articles & Technical Case Studies</h2>
            <p class="text-xs text-slate-500">Publish and manage SEO guides, tutorials, and corporate insights.</p>
        </div>

        <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Write New Article</span>
        </a>
    </div>

    <!-- Posts Table -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        @if($posts->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-200">
                    <tr>
                        <th class="py-4 px-6">Article</th>
                        <th class="py-4 px-6">Category</th>
                        <th class="py-4 px-6">Author & Time</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Published Date</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($posts as $post)
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-3">
                                <img src="{{ $post->image_url ?? 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=120&q=80' }}" class="w-12 h-12 rounded-xl object-cover border border-slate-100 flex-shrink-0">
                                <div>
                                    <h4 class="font-bold text-slate-900 text-sm line-clamp-1">{{ $post->title }}</h4>
                                    <span class="text-[11px] text-slate-400 font-mono">/blog/{{ $post->slug }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                {{ $post->category }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-slate-600 font-medium">
                            <p class="font-bold text-slate-800">{{ $post->author }}</p>
                            <p class="text-[10px] text-slate-400">{{ $post->read_time }}</p>
                        </td>
                        <td class="py-4 px-6">
                            @if($post->is_published)
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800">
                                Published
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-slate-100 text-slate-600">
                                Draft
                            </span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-slate-500 font-medium">
                            {{ $post->published_at ? $post->published_at->format('M d, Y H:i') : 'Draft' }}
                        </td>
                        <td class="py-4 px-6 text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="p-2 rounded-lg bg-slate-100 text-slate-600 hover:text-emerald-600 transition" title="View Public Post">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="p-2 rounded-lg bg-slate-100 text-slate-600 hover:text-blue-600 transition" title="Edit Article">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg bg-slate-100 text-slate-400 hover:text-rose-600 transition" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-slate-100">
            {{ $posts->links() }}
        </div>
        @else
        <div class="p-12 text-center space-y-4">
            <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            </div>
            <h3 class="text-base font-bold text-slate-800">No articles created yet</h3>
            <p class="text-xs text-slate-500">Publish your first engineering guide or eTIMS tutorial.</p>
            <a href="{{ route('admin.posts.create') }}" class="inline-block px-5 py-2.5 rounded-xl bg-emerald-600 text-white font-bold text-xs">Write Article</a>
        </div>
        @endif
    </div>

</div>
@endsection
