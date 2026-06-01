@extends('frontend.layout.app')
@section('meta_title', $blog->meta_title ?: ($blog->title . ' | ' . (get_setting('website_name') ?: 'RoofShelter')))
@section('meta_description', $blog->meta_description ?: $blog->short_description)
@section('meta_keywords', $blog->meta_keywords)
@section('content')
<section class="relative py-20 md:py-28 bg-navy-800 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 50% 50%, rgba(249,115,22,.3) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl md:text-4xl font-extrabold text-white">{{ $blog->title }}</h1>
        <div class="flex items-center justify-center gap-2 mt-4 text-sm flex-wrap">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-brand-400 transition-colors">Home</a>
            <span class="text-gray-500">/</span>
            <a href="{{ route('home.blog') }}" class="text-gray-300 hover:text-brand-400 transition-colors">Projects</a>
            <span class="text-gray-500">/</span>
            <span class="text-brand-400">{{ Str::limit($blog->title, 40) }}</span>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 animate-on-scroll" data-animate="animate-fade-in-left">
                <div class="rounded-2xl overflow-hidden mb-6">
                    <img src="{{ $blog->image ? asset('img/'.$blog->image) : asset('assets/img/placeholder-image-3.jpg') }}" alt="{{ $blog->title }}" class="w-full h-72 md:h-96 object-cover">
                </div>
                <div class="flex flex-wrap gap-4 mb-6 text-sm">
                    <span class="text-gray-400"><svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>{{ $blog->created_at->format('d M Y') }}</span>
                    @if($blog->category)<span class="text-brand-500 font-semibold">{{ $blog->category->category_name }}</span>@endif
                </div>
                @if($blog->location)<p class="text-gray-600"><strong>Location:</strong> {{ $blog->location }}</p>@endif
                @if($blog->service_type)<p class="text-gray-600"><strong>Service Type:</strong> {{ $blog->service_type }}</p>@endif
                @if($blog->completion_date)<p class="text-gray-600"><strong>Completed:</strong> {{ $blog->completion_date }}</p>@endif
                <div class="text-gray-500 leading-relaxed mt-4">{!! $blog->description ?? $blog->short_description !!}</div>

                @if($blog->galleryImages->count() > 0)
                <div class="mt-10">
                    <h3 class="text-xl font-bold text-navy-800 mb-4">Project Gallery</h3>
                    <div class="grid sm:grid-cols-3 gap-3">
                        @foreach($blog->galleryImages as $img)
                        <a href="{{ asset('img/'.$img->image) }}" class="block rounded-xl overflow-hidden group/img">
                            <img src="{{ asset('img/'.$img->image) }}" alt="{{ $img->label ?? 'Gallery Image' }}" class="w-full h-40 object-cover group-hover/img:scale-105 transition-transform duration-300">
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            <div class="animate-on-scroll" data-animate="animate-fade-in-right">
                @if($recentPosts->count() > 0)
                <div class="bg-gray-50 rounded-2xl p-6 sticky top-28">
                    <h3 class="text-lg font-bold text-navy-800 mb-4">Recent Projects</h3>
                    <ul class="space-y-4">
                        @foreach($recentPosts as $recent)
                        <li class="pb-4 border-b border-gray-200 last:border-0 last:pb-0">
                            @if($recent->slug)
                            <a href="{{ route('home.blog-details', $recent->slug) }}" class="font-semibold text-navy-800 hover:text-brand-500 transition-colors text-sm">{{ $recent->title }}</a>
                            @else
                            <span class="font-semibold text-navy-800 text-sm">{{ $recent->title }}</span>
                            @endif
                            <p class="text-xs text-gray-400 mt-1">{{ $recent->created_at->format('M d, Y') }}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
