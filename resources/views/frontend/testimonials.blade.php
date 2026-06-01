@extends('frontend.layout.app')
@section('meta_title', 'Testimonials | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', 'Hear from our satisfied customers about our roofing services.')
@section('content')
<section class="relative py-20 md:py-28 bg-navy-800 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 50% 50%, rgba(249,115,22,.3) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white">Testimonials</h1>
        <div class="flex items-center justify-center gap-2 mt-4 text-sm">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-brand-400 transition-colors">Home</a>
            <span class="text-gray-500">/</span>
            <span class="text-brand-400">Testimonials</span>
        </div>
    </div>
</section>

<section class="section-padding bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// Testimonials //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">What Our Clients Say</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($testimonials as $testimonial)
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:border-brand-200 transition-all duration-300 animate-on-scroll">
                <div class="flex gap-1 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= ($testimonial->rating ?? 5) ? 'text-accent-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-500 text-sm leading-relaxed italic mb-5">"{{ $testimonial->message }}"</p>
                <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                    <div class="w-11 h-11 rounded-full bg-brand-100 flex items-center justify-center text-brand-600 font-bold text-sm shrink-0">
                        {{ substr($testimonial->name, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-bold text-navy-800 text-sm">{{ $testimonial->name }}</h4>
                        <p class="text-gray-400 text-xs">{{ $testimonial->designation }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <h4 class="text-xl font-bold text-navy-800">No testimonials available yet.</h4>
                <p class="text-gray-500 mt-2">Check back soon.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
