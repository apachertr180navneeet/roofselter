@extends('frontend.layout.app')
@section('meta_title', 'Gallery | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', 'Browse our project gallery showcasing our roofing work.')
@section('content')
<section class="relative py-20 md:py-28 bg-navy-800 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 50% 50%, rgba(249,115,22,.3) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white">Gallery</h1>
        <div class="flex items-center justify-center gap-2 mt-4 text-sm">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-brand-400 transition-colors">Home</a>
            <span class="text-gray-500">/</span>
            <span class="text-brand-400">Gallery</span>
        </div>
    </div>
</section>

<section class="section-padding bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($projects->count() > 0 || $projectImages->count() > 0 || $galleryImages->count() > 0)
            @if($projects->count() > 0)
            <div class="text-center max-w-2xl mx-auto mb-10 animate-on-scroll">
                <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// Our Projects //</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">Project Gallery</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @foreach($projects as $project)
                <div class="group rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-xl transition-all duration-300 animate-on-scroll">
                    <div class="aspect-[4/3] overflow-hidden">
                        <img src="{{ $project->image ? asset('img/'.$project->image) : asset('webtheme/assets/images/portfolio/portfolio-1-1.jpg') }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-4">
                        @if($project->slug)
                        <h3 class="font-bold text-navy-800"><a href="{{ route('home.blog-details', $project->slug) }}" class="hover:text-brand-500 transition-colors">{{ $project->title }}</a></h3>
                        @else
                        <h3 class="font-bold text-navy-800">{{ $project->title }}</h3>
                        @endif
                        @if($project->location)<p class="text-gray-500 text-sm mt-1">{{ $project->location }}</p>@endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @if($projectImages->count() > 0)
            <div class="text-center max-w-2xl mx-auto mb-10 animate-on-scroll">
                <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// Extra Shots //</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">More Photos</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
                @foreach($projectImages as $image)
                <div class="group rounded-xl overflow-hidden bg-white shadow-sm hover:shadow-md transition-all duration-300 animate-on-scroll">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('img/'.$image->image) }}" alt="{{ $image->label ?? 'Gallery image' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    @if($image->label)
                    <div class="p-3 text-center">
                        <p class="text-sm text-navy-700 font-medium">{{ $image->label }}</p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            @endif

            @if($galleryImages->count() > 0)
            <div class="text-center max-w-2xl mx-auto mb-10 animate-on-scroll">
                <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// Gallery //</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">Photo Gallery</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($galleryImages as $image)
                <div class="group rounded-xl overflow-hidden bg-white shadow-sm hover:shadow-md transition-all duration-300 animate-on-scroll">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('img/'.$image->image) }}" alt="{{ $image->caption ?? 'Gallery image' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    @if($image->caption)
                    <div class="p-3 text-center">
                        <p class="text-sm text-navy-700 font-medium">{{ $image->caption }}</p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            @endif
        @else
        <div class="text-center py-12">
            <h4 class="text-xl font-bold text-navy-800">No gallery images available yet.</h4>
            <p class="text-gray-500 mt-2">Please check back later or <a href="{{ route('home.contact-us') }}" class="text-brand-500 hover:underline">contact us</a> for recent project photos.</p>
        </div>
        @endif
    </div>
</section>
@endsection
