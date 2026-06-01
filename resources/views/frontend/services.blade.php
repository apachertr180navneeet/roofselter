@extends('frontend.layout.app')
@section('meta_title', 'Our Services | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', 'Professional roofing services including repairs, installations, and maintenance.')
@section('content')
<section class="relative py-20 md:py-28 bg-navy-800 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 70% 30%, rgba(249,115,22,.3) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white">Our Services</h1>
        <div class="flex items-center justify-center gap-2 mt-4 text-sm">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-brand-400 transition-colors">Home</a>
            <span class="text-gray-500">/</span>
            <span class="text-brand-400">Services</span>
        </div>
    </div>
</section>

<section class="section-padding bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// What We Offer //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">Comprehensive Roofing Solutions</h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $service)
            <div class="group bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-brand-200 animate-on-scroll">
                <div class="w-14 h-14 bg-brand-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-brand-500 transition-colors duration-300">
                    <svg class="w-7 h-7 text-brand-500 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <h3 class="text-xl font-bold text-navy-800 mb-2"><a href="{{ route('home.service-detail', $service->slug) }}" class="hover:text-brand-500 transition-colors">{{ $service->title }}</a></h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $service->short_description }}</p>
                <a href="{{ route('home.service-detail', $service->slug) }}" class="inline-flex items-center text-sm font-semibold text-brand-500 hover:text-brand-600 transition-colors gap-1 group/link">
                    Read More
                    <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <h4 class="text-xl font-bold text-navy-800">No services available at the moment.</h4>
                <p class="text-gray-500 mt-2">Please check back later.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<section class="section-padding bg-navy-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Need a Custom Solution?</h2>
        <p class="text-gray-300 max-w-xl mx-auto mb-8">Contact us today for a free consultation and quote tailored to your specific needs.</p>
        <a href="{{ route('home.contact-us') }}" class="inline-block px-8 py-3.5 bg-brand-500 hover:bg-brand-600 text-white font-bold rounded-full transition-all duration-300 hover:shadow-xl hover:shadow-brand-500/25">Contact Us</a>
    </div>
</section>
@endsection
