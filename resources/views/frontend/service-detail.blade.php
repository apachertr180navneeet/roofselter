@extends('frontend.layout.app')
@section('meta_title', $service->meta_title ?: ($service->title . ' | ' . (get_setting('website_name') ?: 'RoofShelter')))
@section('meta_description', $service->meta_description ?: $service->short_description)
@section('meta_keywords', $service->meta_keywords)
@section('content')
<section class="relative py-20 md:py-28 bg-navy-800 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 70%, rgba(249,115,22,.3) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white">{{ $service->title }}</h1>
        <div class="flex items-center justify-center gap-2 mt-4 text-sm flex-wrap">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-brand-400 transition-colors">Home</a>
            <span class="text-gray-500">/</span>
            <a href="{{ route('home.services') }}" class="text-gray-300 hover:text-brand-400 transition-colors">Services</a>
            <span class="text-gray-500">/</span>
            <span class="text-brand-400">{{ $service->title }}</span>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 animate-on-scroll" data-animate="animate-fade-in-left">
                @if($service->image)
                <div class="rounded-2xl overflow-hidden mb-8">
                    <img src="{{ asset('img/'.$service->image) }}" alt="{{ $service->title }}" class="w-full h-80 object-cover">
                </div>
                @endif
                <h2 class="text-2xl font-bold text-navy-800 mb-4">{{ $service->subtitle ?? $service->title }}</h2>
                <div class="text-gray-500 leading-relaxed">{!! $service->description !!}</div>

                @if($service->subtitle2)
                    <h3 class="text-xl font-bold text-navy-800 mt-8 mb-4">{{ $service->subtitle2 }}</h3>
                @endif

                @if($service->features->count() > 0)
                <div class="mt-8">
                    <h3 class="text-xl font-bold text-navy-800 mb-4">{{ $service->features_headings ?? 'Key Features' }}</h3>
                    <div class="grid sm:grid-cols-2 gap-3">
                        @foreach($service->features as $feature)
                        <div class="flex gap-3 p-3 bg-gray-50 rounded-xl">
                            <svg class="w-5 h-5 mt-0.5 shrink-0 text-brand-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <div>
                                <span class="font-semibold text-navy-800">{{ $feature->title }}</span>
                                @if($feature->description)<p class="text-gray-500 text-sm">{{ $feature->description }}</p>@endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($service->benefits->count() > 0)
                <div class="mt-8">
                    <h3 class="text-xl font-bold text-navy-800 mb-4">{{ $service->benefits_headings ?? 'Benefits' }}</h3>
                    <div class="grid sm:grid-cols-2 gap-3">
                        @foreach($service->benefits as $benefit)
                        <div class="flex gap-3 p-3 bg-green-50 rounded-xl">
                            <svg class="w-5 h-5 mt-0.5 shrink-0 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <div>
                                <span class="font-semibold text-navy-800">{{ $benefit->title }}</span>
                                @if($benefit->description)<p class="text-gray-500 text-sm">{{ $benefit->description }}</p>@endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($service->essentials->count() > 0)
                <div class="mt-8">
                    <h3 class="text-xl font-bold text-navy-800 mb-4">{{ $service->essentials_headings ?? 'Essentials' }}</h3>
                    <div class="grid sm:grid-cols-2 gap-3">
                        @foreach($service->essentials as $essential)
                        <div class="flex gap-3 p-3 bg-navy-50 rounded-xl">
                            <svg class="w-5 h-5 mt-0.5 shrink-0 text-navy-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <div>
                                <span class="font-semibold text-navy-800">{{ $essential->title }}</span>
                                @if($essential->description)<p class="text-gray-500 text-sm">{{ $essential->description }}</p>@endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($service->faqs->count() > 0)
                <div class="mt-8" x-data="{ active: 0 }">
                    <h3 class="text-xl font-bold text-navy-800 mb-4">FAQ</h3>
                    <div class="space-y-3">
                        @foreach($service->faqs as $index => $faq)
                        <div class="bg-gray-50 rounded-xl overflow-hidden">
                            <button @click="active = (active === {{ $index }} ? null : {{ $index }})" class="w-full flex items-center justify-between p-4 text-left font-semibold text-navy-800 hover:text-brand-500 transition-colors">
                                <span>{{ $faq->question }}</span>
                                <svg class="w-5 h-5 shrink-0 ml-4 transition-transform duration-300" :class="{ 'rotate-180': active === {{ $index }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="active === {{ $index }}" x-collapse class="px-4 pb-4 text-gray-500 text-sm">{{ $faq->answer }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="mt-8">
                    <a href="{{ route('home.contact-us') }}" class="inline-block px-8 py-3.5 bg-brand-500 hover:bg-brand-600 text-white font-bold rounded-full transition-all duration-300">Get a Quote</a>
                </div>
            </div>
            <div class="animate-on-scroll" data-animate="animate-fade-in-right">
                @if($relatedServices->count() > 0)
                <div class="bg-gray-50 rounded-2xl p-6 sticky top-28">
                    <h3 class="text-lg font-bold text-navy-800 mb-4">Related Services</h3>
                    <ul class="space-y-2">
                        @foreach($relatedServices as $related)
                        <li>
                            <a href="{{ route('home.service-detail', $related->slug) }}" class="flex items-center gap-2 p-3 bg-white rounded-xl hover:bg-brand-50 hover:text-brand-600 transition-colors text-navy-700 font-medium text-sm">
                                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                {{ $related->title }}
                            </a>
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
@push('script')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush
