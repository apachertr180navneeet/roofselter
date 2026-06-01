@extends('frontend.layout.app')
@section('meta_title', (get_setting('faq_section_tagline') ?: 'FAQ') . ' | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', 'Frequently asked questions about our roofing services.')
@section('content')
<section class="relative py-20 md:py-28 bg-navy-800 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 50% 50%, rgba(249,115,22,.3) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white">{{ get_setting('faq_section_tagline') ?: 'FAQ' }}</h1>
        <div class="flex items-center justify-center gap-2 mt-4 text-sm">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-brand-400 transition-colors">Home</a>
            <span class="text-gray-500">/</span>
            <span class="text-brand-400">{{ get_setting('faq_section_tagline') ?: 'FAQ' }}</span>
        </div>
    </div>
</section>

<section class="section-padding bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($faqs->count() > 0)
        <div class="space-y-3" x-data="{ active: 0 }">
            @foreach($faqs as $index => $faq)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden animate-on-scroll">
                <button @click="active = (active === {{ $index }} ? null : {{ $index }})" class="w-full flex items-center justify-between p-5 text-left font-semibold text-navy-800 hover:text-brand-500 transition-colors">
                    <span>{{ $faq->question }}</span>
                    <svg class="w-5 h-5 shrink-0 ml-4 transition-transform duration-300" :class="{ 'rotate-180': active === {{ $index }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="active === {{ $index }}" x-collapse class="px-5 pb-5 text-gray-500 text-sm leading-relaxed">
                    <p>{{ $faq->answer }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <h4 class="text-xl font-bold text-navy-800">No FAQs available at the moment.</h4>
            <p class="text-gray-500 mt-2">Please check back later or <a href="{{ route('home.contact-us') }}" class="text-brand-500 hover:underline">contact us</a> for any questions.</p>
        </div>
        @endif
    </div>
</section>
@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush
