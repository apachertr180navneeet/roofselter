@extends('frontend.layout.app')
@section('meta_title', (get_setting('about_section_tagline') ?: 'About Us') . ' | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', get_setting('about_section_title') ?: 'Learn about our company, mission, and team.')
@section('content')
<section class="relative py-20 md:py-28 bg-navy-800 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(249,115,22,.3) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white">{{ get_setting('about_section_tagline') ?: 'About Us' }}</h1>
        <div class="flex items-center justify-center gap-2 mt-4 text-sm">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-brand-400 transition-colors">Home</a>
            <span class="text-gray-500">/</span>
            <span class="text-brand-400">{{ get_setting('about_section_tagline') ?: 'About Us' }}</span>
        </div>
    </div>
</section>

@if(get_setting('about_title') || get_setting('about_description'))
<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center animate-on-scroll">
            <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// {{ get_setting('about_section_tagline', 'About Us') }} //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3 mb-6">{{ get_setting('about_title', 'Welcome to RoofShelter') }}</h2>
            <p class="text-gray-500 leading-relaxed text-lg">{{ get_setting('about_description') }}</p>
        </div>
    </div>
</section>
@endif

@if($team_members->count() > 0)
<section class="section-padding bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// {{ get_setting('team_section_tagline', 'Our Team') }} //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">{{ get_setting('team_section_title', 'Meet Our Expert Team') }}</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($team_members as $team)
            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 animate-on-scroll">
                <div class="aspect-[3/4] overflow-hidden">
                    <img src="{{ $team->image ? asset('img/'.$team->image) : asset('assets/img/placeholder-image-3.jpg') }}" alt="{{ $team->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5 text-center">
                    <h3 class="font-bold text-navy-800">{{ $team->name }}</h3>
                    <p class="text-brand-500 text-sm font-semibold mt-1">{{ $team->designation }}</p>
                    @if($team->facebook_url || $team->instagram_url || $team->linkedin_url || $team->twitter_url)
                    <div class="flex justify-center gap-2 mt-3">
                        @if($team->facebook_url)<a href="{{ $team->facebook_url }}" target="_blank" class="w-8 h-8 bg-gray-100 hover:bg-brand-500 hover:text-white rounded-full flex items-center justify-center text-gray-500 transition-all"><svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>@endif
                        @if($team->instagram_url)<a href="{{ $team->instagram_url }}" target="_blank" class="w-8 h-8 bg-gray-100 hover:bg-brand-500 hover:text-white rounded-full flex items-center justify-center text-gray-500 transition-all"><svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a>@endif
                        @if($team->linkedin_url)<a href="{{ $team->linkedin_url }}" target="_blank" class="w-8 h-8 bg-gray-100 hover:bg-brand-500 hover:text-white rounded-full flex items-center justify-center text-gray-500 transition-all"><svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>@endif
                        @if($team->twitter_url)<a href="{{ $team->twitter_url }}" target="_blank" class="w-8 h-8 bg-gray-100 hover:bg-brand-500 hover:text-white rounded-full flex items-center justify-center text-gray-500 transition-all"><svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>@endif
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
