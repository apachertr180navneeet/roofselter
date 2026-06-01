@extends('frontend.layout.app')
@section('meta_title', 'Pricing | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', 'Explore our competitive roofing service packages and pricing.')
@section('content')
<section class="relative py-20 md:py-28 bg-navy-800 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 50% 30%, rgba(249,115,22,.3) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white">Pricing</h1>
        <div class="flex items-center justify-center gap-2 mt-4 text-sm">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-brand-400 transition-colors">Home</a>
            <span class="text-gray-500">/</span>
            <span class="text-brand-400">Pricing</span>
        </div>
    </div>
</section>

<section class="section-padding bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// Our Pricing //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">Transparent & Competitive Pricing</h2>
            <p class="text-gray-500 mt-3">We offer high-quality roofing services at fair, competitive rates. Contact us for a free, no-obligation quote tailored to your needs.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $service)
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:border-brand-200 transition-all duration-300 animate-on-scroll">
                <div class="w-14 h-14 bg-brand-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <h3 class="text-xl font-bold text-navy-800 mb-2">{{ $service->title }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $service->short_description }}</p>
                <ul class="space-y-2 mb-6">
                    @if($service->features->count())
                        @foreach($service->features->take(5) as $feature)
                        <li class="flex gap-2 text-sm text-gray-600">
                            <svg class="w-4 h-4 mt-0.5 shrink-0 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            {{ $feature->title }}
                        </li>
                        @endforeach
                    @else
                        <li class="flex gap-2 text-sm text-gray-600"><svg class="w-4 h-4 mt-0.5 shrink-0 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Professional service</li>
                        <li class="flex gap-2 text-sm text-gray-600"><svg class="w-4 h-4 mt-0.5 shrink-0 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Quality guaranteed</li>
                        <li class="flex gap-2 text-sm text-gray-600"><svg class="w-4 h-4 mt-0.5 shrink-0 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Licensed & insured</li>
                    @endif
                </ul>
                <a href="{{ route('home.service-detail', $service->slug) }}" class="block w-full text-center px-5 py-3 bg-brand-500 hover:bg-brand-600 text-white font-semibold rounded-xl transition-all duration-300">View Details</a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-padding bg-navy-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Need a Custom Quote?</h2>
        <p class="text-gray-300 max-w-xl mx-auto mb-8">Every roof is unique. Get a tailored solution for your specific requirements.</p>
        <a href="{{ route('home.contact-us') }}" class="inline-block px-8 py-3.5 bg-brand-500 hover:bg-brand-600 text-white font-bold rounded-full transition-all duration-300">Get Free Quote</a>
    </div>
</section>

@if($testimonials->count())
<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// Testimonials //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">What Our Clients Say</h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials as $testimonial)
            <div class="bg-gray-50 rounded-2xl p-6 animate-on-scroll">
                <div class="flex gap-1 mb-3">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= ($testimonial->rating ?? 5) ? 'text-accent-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-500 text-sm italic mb-4">{{ $testimonial->message ?? $testimonial->description }}</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-brand-100 flex items-center justify-center text-brand-600 font-bold text-sm">{{ substr($testimonial->name, 0, 1) }}</div>
                    <div>
                        <h4 class="font-bold text-navy-800 text-sm">{{ $testimonial->name }}</h4>
                        <p class="text-gray-400 text-xs">{{ $testimonial->designation }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
