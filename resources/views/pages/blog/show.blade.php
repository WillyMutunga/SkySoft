@extends('layouts.app')

@section('title', $post->title . ' | SkySoft Systems Kenya')
@section('meta_description', $post->excerpt ?? Str::limit(strip_tags($post->content), 150))

@section('content')
<!-- Article Breadcrumbs -->
<div class="bg-slate-100 border-b border-slate-200 py-3 text-xs text-slate-500">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center space-x-2">
        <a href="{{ route('home') }}" class="hover:text-emerald-600">Home</a>
        <span>&rsaquo;</span>
        <a href="{{ route('blog.index') }}" class="hover:text-emerald-600">Tech Insights</a>
        <span>&rsaquo;</span>
        <span class="text-slate-800 font-semibold truncate">{{ $post->title }}</span>
    </div>
</div>

<!-- Main Article Container -->
<article class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Post Header -->
        <div class="space-y-4">
            <div class="flex items-center gap-2">
                <span class="text-xs uppercase font-extrabold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-md border border-emerald-200">
                    {{ $post->category }}
                </span>
                <span class="text-xs text-slate-400">&bull;</span>
                <span class="text-xs text-slate-500">{{ $post->read_time }}</span>
                <span class="text-xs text-slate-400">&bull;</span>
                <span class="text-xs text-slate-500">{{ $post->published_at ? $post->published_at->format('F d, Y') : $post->created_at->format('F d, Y') }}</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                {{ $post->title }}
            </h1>

            <div class="flex items-center space-x-3 pt-2">
                <div class="w-10 h-10 rounded-full bg-emerald-600 text-white font-bold flex items-center justify-center text-sm shadow-md">
                    {{ substr($post->author, 0, 1) }}
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-900">{{ $post->author }}</p>
                    <p class="text-[11px] text-slate-500">SkySoft Systems Engineering & Systems Team</p>
                </div>
            </div>
        </div>

        <!-- Featured Image -->
        @if($post->image_url)
        <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 max-h-[450px]">
            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
        </div>
        @endif

        <!-- Article Rich Content -->
        <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed space-y-6 pt-4 text-base">
            {!! nl2br($post->content) !!}
        </div>

        <!-- Call to Action Card -->
        <div class="bg-gradient-to-br from-secondary-900 to-slate-950 text-white p-8 rounded-3xl shadow-xl mt-12 space-y-4">
            <h3 class="text-2xl font-bold">Need assistance implementing this technology in your business?</h3>
            <p class="text-sm text-slate-300">Our certified engineering team in Nairobi is ready to conduct a site survey or demo our smart Point of Sale and Online UPS solutions.</p>
            <div class="flex flex-col sm:flex-row gap-3 pt-2">
                <a href="{{ route('contact') }}" class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition text-center">
                    Request Free Consultation
                </a>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companySettings['company_whatsapp'] ?? '254712345678') }}?text={{ urlencode('Hello SkySoft Systems, I was reading your article: ' . $post->title . ' and have a question.') }}" target="_blank" class="px-6 py-3 rounded-xl bg-[#25D366] text-white font-bold text-xs shadow-md transition text-center">
                    Chat with an Engineer on WhatsApp
                </a>
            </div>
        </div>

        <!-- Related Posts Section -->
        @if($relatedPosts->count() > 0)
        <div class="pt-16 border-t border-slate-200 space-y-6">
            <h3 class="text-2xl font-bold text-slate-900">Related Insights & Guides</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPosts as $rel)
                <a href="{{ route('blog.show', $rel->slug) }}" class="bg-slate-50 p-5 rounded-2xl border border-slate-200 hover:shadow-lg transition block space-y-2 group">
                    <span class="text-[10px] uppercase font-bold text-emerald-700">{{ $rel->category }}</span>
                    <h4 class="font-bold text-sm text-slate-900 group-hover:text-emerald-600 transition line-clamp-2">{{ $rel->title }}</h4>
                    <p class="text-[11px] text-slate-500 line-clamp-2">{{ $rel->excerpt }}</p>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</article>
@endsection
