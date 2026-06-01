@extends('frontend.layout.app')
@section('meta_title', 'Our Projects | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', 'Browse our completed roofing projects and portfolio.')
@section('content')
<section class="relative py-20 md:py-28 bg-navy-800 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 50% 30%, rgba(249,115,22,.3) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white">Our Projects</h1>
        <div class="flex items-center justify-center gap-2 mt-4 text-sm">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-brand-400 transition-colors">Home</a>
            <span class="text-gray-500">/</span>
            <span class="text-brand-400">Projects</span>
        </div>
    </div>
</section>

<section class="section-padding bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($blogs as $blog)
            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 animate-on-scroll">
                <div class="aspect-[16/11] overflow-hidden">
                    <img src="{{ $blog->image ? asset('img/'.$blog->image) : asset('assets/img/placeholder-image-3.jpg') }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5">
                    <span class="text-xs font-semibold text-brand-500 uppercase">{{ $blog->created_at->format('d M Y') }}</span>
                    @if($blog->slug)
                    <h3 class="text-lg font-bold text-navy-800 mt-2 mb-2"><a href="{{ route('home.blog-details', $blog->slug) }}" class="hover:text-brand-500 transition-colors">{{ $blog->title }}</a></h3>
                    @else
                    <h3 class="text-lg font-bold text-navy-800 mt-2 mb-2">{{ $blog->title }}</h3>
                    @endif
                    <p class="text-gray-500 text-sm">{{ \Illuminate\Support\Str::limit($blog->short_description, 100) }}</p>
                    @if($blog->slug)
                    <a href="{{ route('home.blog-details', $blog->slug) }}" class="inline-flex items-center text-sm font-semibold text-brand-500 hover:text-brand-600 transition-colors gap-1 mt-3 group/link">
                        Read More
                        <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <h4 class="text-xl font-bold text-navy-800">No projects available yet.</h4>
                <p class="text-gray-500 mt-2">Please check back later.</p>
            </div>
            @endforelse
        </div>
        @if(method_exists($blogs, 'links'))
        <div class="mt-10">
            {{ $blogs->links() }}
        </div>
        @endif
    </div>
</section>
@endsection
