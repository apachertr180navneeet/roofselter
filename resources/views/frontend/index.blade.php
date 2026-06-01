@extends('frontend.layout.app')
@section('meta_title', (get_setting('website_name') ?: 'rooftopper') . ' | ' . (get_setting('site_motto') ?: 'Home'))
@section('meta_description', get_setting('site_motto', 'Professional Roofing Services in Sydney'))
@section('content')

{{-- Hero Section with Slider --}}
<section class="relative min-h-screen flex items-center bg-navy-900 overflow-hidden" id="hero-slider">
    {{-- Slider Background Images --}}
    <div class="absolute inset-0">
        @forelse($sliders as $index => $slider)
        <div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" data-slider-bg="{{ $index }}" style="background-image: url('{{ $slider->banner ? asset('img/'.$slider->banner) : '' }}');"></div>
        @empty
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900 via-navy-800 to-navy-900"></div>
        @endforelse
    </div>
    <div class="absolute inset-0 bg-navy-900/60"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-navy-900/80 via-navy-900/40 to-transparent"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div id="slider-content" class="relative min-h-[280px] md:min-h-[320px]">
                    @forelse($sliders as $index => $slider)
                    <div class="slider-slide {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}">
                        <span class="inline-block px-4 py-1.5 bg-brand-500/20 text-brand-400 text-sm font-bold rounded-full mb-6">#1 Trusted Roofing Sydney</span>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-white leading-tight mb-6">
                            {{ $slider->title }}
                        </h1>
                        <p class="text-lg sm:text-xl text-gray-300 max-w-xl mb-8">
                            {{ $slider->short_desc }}
                        </p>
                    </div>
                    @empty
                    <div class="slider-slide active">
                        <span class="inline-block px-4 py-1.5 bg-brand-500/20 text-brand-400 text-sm font-bold rounded-full mb-6">#1 Trusted Roofing Sydney</span>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-white leading-tight mb-6">
                            Expert Roofing <br><span class="text-brand-400">Services</span> You Can Trust
                        </h1>
                        <p class="text-lg sm:text-xl text-gray-300 max-w-xl mb-8">
                            Sydney's premier roofing specialists delivering quality craftsmanship, durability, and peace of mind for your home or business.
                        </p>
                    </div>
                    @endforelse
                </div>

                {{-- Slider Dots --}}
                @if($sliders->count() > 1)
                <div class="flex gap-2 mt-6" id="slider-dots">
                    @foreach($sliders as $index => $slider)
                    <button class="w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-brand-500 w-8' : 'bg-white/40 hover:bg-white/60' }}" data-dot="{{ $index }}" onclick="goToSlide({{ $index }})"></button>
                    @endforeach
                </div>
                @endif

                <div class="flex flex-wrap gap-4 mt-8">
                    <a href="{{ route('home.contact-us') }}" class="px-8 py-3.5 bg-brand-500 hover:bg-brand-600 text-white font-bold rounded-full transition-all duration-300 hover:shadow-xl hover:shadow-brand-500/25 text-center">Get Free Quote</a>
                    <a href="{{ route('home.services') }}" class="px-8 py-3.5 border-2 border-white/20 hover:border-white/40 text-white font-semibold rounded-full transition-all duration-300 text-center">Our Services</a>
                </div>
                <div class="flex items-center gap-8 mt-10 pt-8 border-t border-white/10">
                    <div><span class="text-3xl font-extrabold text-brand-400">{{ get_setting('counter_projects', '450') }}+</span><p class="text-gray-400 text-sm mt-1">Projects Done</p></div>
                    <div><span class="text-3xl font-extrabold text-brand-400">{{ get_setting('counter_clients', '370') }}+</span><p class="text-gray-400 text-sm mt-1">Happy Clients</p></div>
                    <div><span class="text-3xl font-extrabold text-brand-400">{{ get_setting('counter_years', '10') }}+</span><p class="text-gray-400 text-sm mt-1">Years Exp.</p></div>
                </div>
            </div>
            <div class="hidden lg:block animate-on-scroll" data-animate="animate-fade-in-right">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-500 to-transparent opacity-20 rounded-3xl blur-3xl"></div>
                    <div class="relative bg-gradient-to-br from-brand-500/10 to-navy-700/30 rounded-3xl p-8 border border-white/10 backdrop-blur-sm">
                        <h3 class="text-2xl font-bold text-white mb-6">Request A Free Estimate</h3>
                        <form id="contactForm" action="{{ route('contact.store') }}" method="POST" novalidate>
                            @csrf
                            <div style="position:absolute;left:-9999px;"><input type="text" name="website" tabindex="-1" autocomplete="off"></div>
                            <input type="hidden" name="_form_token" value="{{ encrypt(time()) }}">
                            <div class="space-y-4">
                                <div>
                                    <input type="text" id="username" name="username" placeholder="Your Name" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-brand-500 focus:bg-white/15 transition-all">
                                    <span class="text-red-400 text-xs error-text username_error"></span>
                                </div>
                                <div>
                                    <input type="email" id="email" name="email" placeholder="Your Email (optional)" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-brand-500 focus:bg-white/15 transition-all">
                                    <span class="text-red-400 text-xs error-text email_error"></span>
                                </div>
                                <div>
                                    <input type="text" id="phone" name="phone" placeholder="Phone Number" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-brand-500 focus:bg-white/15 transition-all">
                                    <span class="text-red-400 text-xs error-text phone_error"></span>
                                </div>
                                <div>
                                    <input type="text" name="date" placeholder="Preferred Date" id="datepicker" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-brand-500 focus:bg-white/15 transition-all">
                                    <span class="text-red-400 text-xs error-text date_error"></span>
                                </div>
                                <div>
                                    <textarea id="message" name="message" placeholder="Tell us about your project..." rows="3" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-brand-500 focus:bg-white/15 transition-all"></textarea>
                                    <span class="text-red-400 text-xs error-text message_error"></span>
                                </div>
                                <button type="submit" id="contactSubmit" class="w-full px-6 py-3.5 bg-brand-500 hover:bg-brand-600 text-white font-bold rounded-xl transition-all duration-300 hover:shadow-lg hover:shadow-brand-500/25">
                                    Send Request
                                </button>
                            </div>
                        </form>
                        <div id="form-response" class="mt-3 text-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Services Section --}}
@if($services->count() > 0)
<section class="section-padding bg-gray-50" id="services">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// Our Services //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">Comprehensive Roofing Solutions</h2>
            <p class="text-gray-500 mt-3">From repairs to full installations, we handle every roofing need with expertise and care.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $service)
            <div class="group bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-brand-200 animate-on-scroll">
                <div class="w-14 h-14 bg-brand-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-brand-500 transition-colors duration-300">
                    <svg class="w-7 h-7 text-brand-500 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <h3 class="text-xl font-bold text-navy-800 mb-2"><a href="{{ route('home.service-detail', $service->slug) }}" class="hover:text-brand-500 transition-colors">{{ $service->title }}</a></h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $service->short_description }}</p>
                <a href="{{ route('home.service-detail', $service->slug) }}" class="inline-flex items-center text-sm font-semibold text-brand-500 hover:text-brand-600 transition-colors gap-1 group/link">
                    Learn More
                    <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- About Section --}}
@if(get_setting('about_title') || get_setting('about_description'))
<section class="section-padding bg-white" id="about">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="animate-on-scroll" data-animate="animate-fade-in-left">
                <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// {{ get_setting('about_section_tagline', 'About Us') }} //</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3 mb-6">{{ get_setting('about_title', 'Welcome to RoofShelter') }}</h2>
                <p class="text-gray-500 leading-relaxed text-lg">{{ get_setting('about_description') }}</p>
                <div class="flex gap-4 mt-8">
                    <a href="{{ route('home.about') }}" class="px-6 py-3 bg-brand-500 hover:bg-brand-600 text-white font-semibold rounded-full transition-all duration-300">Learn More</a>
                    <a href="{{ route('home.contact-us') }}" class="px-6 py-3 border-2 border-gray-200 hover:border-brand-500 text-navy-800 font-semibold rounded-full transition-all duration-300">Contact Us</a>
                </div>
            </div>
            <div class="relative animate-on-scroll" data-animate="animate-fade-in-right">
                <div class="aspect-[4/3] rounded-2xl bg-gradient-to-br from-brand-100 to-navy-100 flex items-center justify-center">
                    <div class="text-center p-8">
                        <svg class="w-20 h-20 mx-auto text-brand-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <p class="text-navy-600 font-semibold">Over {{ get_setting('counter_years', '10') }}+ Years of Excellence</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- Why Choose Us --}}
@if($why_choose_us->count() > 0)
<section class="section-padding bg-navy-800 relative overflow-hidden" id="why-choose-us">
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 80% 20%, rgba(249,115,22,.4) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-400 font-bold text-sm uppercase tracking-widest">// Why Choose Us //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-3">What Sets Us Apart</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($why_choose_us as $item)
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 hover:bg-white/10 transition-all duration-300 animate-on-scroll text-center">
                @if($item->icon)
                <div class="w-14 h-14 bg-brand-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl text-brand-400">{!! $item->icon !!}</span>
                </div>
                @endif
                <h3 class="text-lg font-bold text-white mb-2">{{ $item->title }}</h3>
                @if($item->description)
                <p class="text-gray-300 text-sm">{{ $item->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Projects / Portfolio --}}
@if($projects->count() > 0)
<section class="section-padding bg-gray-50" id="projects">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// Our Projects //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">Recent Work</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects->take(6) as $project)
            <div class="group relative rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-xl transition-all duration-300 animate-on-scroll">
                <div class="aspect-[4/3] overflow-hidden">
                    <img src="{{ asset('img/'.$project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-navy-900/80 via-navy-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-5">
                    <div>
                        <p class="text-brand-400 text-xs font-semibold uppercase">{{ $project->category->category_name ?? 'Project' }}</p>
                        <h3 class="text-white font-bold text-lg">{{ $project->title }}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-10 animate-on-scroll">
            <a href="{{ route('home.projects') }}" class="px-8 py-3.5 bg-brand-500 hover:bg-brand-600 text-white font-bold rounded-full transition-all duration-300 inline-block">View All Projects</a>
        </div>
    </div>
</section>
@endif

{{-- Before & After --}}
@if($before_after_images->count() > 0)
<section class="section-padding bg-white" id="before-after">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// Before & After //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">See Our Transformation Results</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($before_after_images as $b4)
            <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-sm animate-on-scroll">
                <div class="grid grid-cols-2">
                    <div class="relative">
                        <img src="{{ asset('img/'.$b4->before_image) }}" class="w-full h-52 object-cover" alt="Before">
                        <span class="absolute bottom-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">Before</span>
                    </div>
                    <div class="relative">
                        <img src="{{ asset('img/'.$b4->after_image) }}" class="w-full h-52 object-cover" alt="After">
                        <span class="absolute bottom-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">After</span>
                    </div>
                </div>
                @if($b4->title || $b4->description)
                <div class="p-4 text-center">
                    @if($b4->title)<h4 class="font-bold text-navy-800">{{ $b4->title }}</h4>@endif
                    @if($b4->description)<p class="text-gray-500 text-sm mt-1">{{ $b4->description }}</p>@endif
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Testimonials --}}
@if($testimonials->count() > 0)
<section class="section-padding bg-navy-800 relative overflow-hidden" id="testimonial">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 70%, rgba(249,115,22,.3) 0%, transparent 50%), radial-gradient(circle at 70% 30%, rgba(251,191,36,.2) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-400 font-bold text-sm uppercase tracking-widest">// Testimonials //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-3">What Our Clients Say</h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials as $test)
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 animate-on-scroll">
                <div class="flex gap-1 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $test->rating ? 'text-accent-400' : 'text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-300 text-sm leading-relaxed mb-5 italic">"{{ $test->message }}"</p>
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full bg-brand-500/20 flex items-center justify-center text-brand-400 font-bold text-sm">
                        {{ substr($test->name, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-bold text-white text-sm">{{ $test->name }}</h4>
                        <p class="text-gray-400 text-xs">{{ $test->designation }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Team --}}
@if($team_members->count() > 0)
<section class="section-padding bg-gray-50" id="team">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// Our Team //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">Meet Our Experts</h2>
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
                    @if($team->instagram_url || $team->linkedin_url || $team->twitter_url || $team->facebook_url)
                    <div class="flex justify-center gap-2 mt-3">
                        @if($team->facebook_url)<a href="{{ $team->facebook_url }}" target="_blank" class="w-8 h-8 bg-gray-100 hover:bg-brand-500 hover:text-white rounded-full flex items-center justify-center text-gray-500 transition-all text-xs"><svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>@endif
                        @if($team->instagram_url)<a href="{{ $team->instagram_url }}" target="_blank" class="w-8 h-8 bg-gray-100 hover:bg-brand-500 hover:text-white rounded-full flex items-center justify-center text-gray-500 transition-all text-xs"><svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a>@endif
                        @if($team->linkedin_url)<a href="{{ $team->linkedin_url }}" target="_blank" class="w-8 h-8 bg-gray-100 hover:bg-brand-500 hover:text-white rounded-full flex items-center justify-center text-gray-500 transition-all text-xs"><svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>@endif
                        @if($team->twitter_url)<a href="{{ $team->twitter_url }}" target="_blank" class="w-8 h-8 bg-gray-100 hover:bg-brand-500 hover:text-white rounded-full flex items-center justify-center text-gray-500 transition-all text-xs"><svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>@endif
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Certifications --}}
@if(isset($certifications) && $certifications->count() > 0)
<section class="section-padding bg-white" id="certifications">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// Certifications //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">Our Certifications & Licenses</h2>
        </div>
        <div class="flex flex-wrap justify-center gap-6">
            @foreach($certifications as $cert)
            <div class="bg-gray-50 rounded-xl p-5 text-center w-36 animate-on-scroll">
                <img src="{{ asset('img/'.$cert->image) }}" alt="{{ $cert->title }}" class="h-14 mx-auto mb-2 object-contain">
                @if($cert->title)<p class="text-xs font-bold text-navy-800">{{ $cert->title }}</p>@endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- FAQ Section --}}
@if($faqs->count() > 0)
<section class="section-padding bg-gray-50" id="faq">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-500 font-bold text-sm uppercase tracking-widest">// {{ get_setting('faq_section_tagline', 'FAQ') }} //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-navy-800 mt-3">{{ get_setting('faq_section_title', 'Do You Have Any Questions?') }}</h2>
        </div>
        <div class="space-y-3" x-data="{ activeFaq: 0 }">
            @foreach($faqs as $index => $faq)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden animate-on-scroll">
                <button @click="activeFaq = (activeFaq === {{ $index }} ? null : {{ $index }})" class="w-full flex items-center justify-between p-5 text-left font-semibold text-navy-800 hover:text-brand-500 transition-colors">
                    <span>{{ $faq->question }}</span>
                    <svg class="w-5 h-5 shrink-0 ml-4 transition-transform duration-300" :class="{ 'rotate-180': activeFaq === {{ $index }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="activeFaq === {{ $index }}" x-collapse class="px-5 pb-5 text-gray-500 text-sm leading-relaxed">
                    <p>{{ $faq->answer }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Contact Section --}}
<section class="section-padding bg-navy-800 relative overflow-hidden" id="contact">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 20% 80%, rgba(249,115,22,.3) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(251,191,36,.2) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 animate-on-scroll">
            <span class="text-brand-400 font-bold text-sm uppercase tracking-widest">// Contact Us //</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-3">Get In Touch</h2>
            <p class="text-gray-300 mt-3">Ready to start your project? Contact us for a free consultation and quote.</p>
        </div>
        <div class="grid lg:grid-cols-2 gap-10">
            <div class="space-y-6 animate-on-scroll" data-animate="animate-fade-in-left">
                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-brand-500/20 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-white font-bold">Phone</h3>
                        <a href="tel:{{ get_setting('contact_phone', '+61 451873035') }}" class="text-gray-300 hover:text-brand-400 transition-colors">{{ get_setting('contact_phone', '+61 451873035') }}</a>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-brand-500/20 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-white font-bold">Email</h3>
                        <a href="mailto:{{ get_setting('contact_email', 'sydneycrownroofingandgutters@gmail.com') }}" class="text-gray-300 hover:text-brand-400 transition-colors">{{ get_setting('contact_email', 'sydneycrownroofingandgutters@gmail.com') }}</a>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-brand-500/20 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-white font-bold">Address</h3>
                        <p class="text-gray-300">{{ get_setting('contact_address', '79 Governors Way, Macquarie Links NSW 2565, Australia') }}</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-brand-500/20 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-white font-bold">Working Hours</h3>
                        <p class="text-gray-300">{{ get_setting('contact_hours', 'Mon - Sat: 9:00 AM - 6:00 PM') }}</p>
                    </div>
                </div>
            </div>
            <div class="animate-on-scroll" data-animate="animate-fade-in-right">
                @if(get_setting('google_maps_embed'))
                    <iframe src="{{ get_setting('google_maps_embed') }}" class="w-full h-80 rounded-2xl" allowfullscreen="" loading="lazy"></iframe>
                @else
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3308.536270820157!2d150.87039919999998!3d-33.97875679999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12eb7adb766a3b%3A0x6e412e9a45d63c16!2sSydney%20Crown%20Roofing%20and%20Gutters%20%7C%20Roof%20Repair%20Sydney!5e0!3m2!1sen!2sin!4v1778689752441!5m2!1sen!2sin" class="w-full h-80 rounded-2xl" allowfullscreen="" loading="lazy"></iframe>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
$(document).ready(function () {
    function clientValidate($form) {
        var ok = true;
        $form.find('span.error-text').text('');
        if ($.trim($('#username').val()) === '') {
            $form.find('span.username_error').text('Name is required.');
            ok = false;
        }
        if ($.trim($('#phone').val()) === '') {
            $form.find('span.phone_error').text('Phone is required.');
            ok = false;
        }
        return ok;
    }
    $(document).on('submit', '#contactForm', function(e) {
        e.preventDefault();
        var form = this;
        var $form = $(form);
        if (!clientValidate($form)) return;
        var $btn = $('#contactSubmit');
        var formData = new FormData(form);
        $.ajax({
            url: $form.attr('action'),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {
                $form.find('span.error-text').text('');
                $('#form-response').html('');
                $btn.prop('disabled', true).text('Please wait...');
            },
            success: function(response) {
                $btn.prop('disabled', false).text('Send Request');
                if (response.status === 'success') {
                    $('#form-response').html('<div id="success-msg" class="p-3 bg-green-500/20 text-green-400 rounded-lg text-center">'+ response.message +'</div>');
                    form.reset();
                    setTimeout(function(){
                        $('#success-msg').fadeOut('slow', function(){ $(this).remove(); });
                    }, 3000);
                } else {
                    $('#form-response').html('<div class="p-3 bg-red-500/20 text-red-400 rounded-lg text-center">Something went wrong. Try again.</div>');
                }
            },
            error: function(xhr) {
                $btn.prop('disabled', false).text('Send Request');
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, val) {
                        $form.find('span.' + key + '_error').text(val[0]);
                    });
                } else {
                    $('#form-response').html('<div class="p-3 bg-red-500/20 text-red-400 rounded-lg text-center">Server error. Please try later.</div>');
                }
            }
        });
    });
});

// Hero Slider
@if($sliders->count() > 1)
var currentSlide = 0;
var totalSlides = {{ $sliders->count() }};
var slideInterval = setInterval(nextSlide, 5000);

function goToSlide(index) {
    clearInterval(slideInterval);
    document.querySelectorAll('.slider-slide').forEach(function(el, i) {
        el.classList.toggle('active', i === index);
    });
    document.querySelectorAll('[data-slider-bg]').forEach(function(el, i) {
        el.classList.toggle('opacity-100', i === index);
        el.classList.toggle('opacity-0', i !== index);
    });
    document.querySelectorAll('[data-dot]').forEach(function(el, i) {
        el.className = 'w-3 h-3 rounded-full transition-all duration-300 ' + (i === index ? 'bg-brand-500 w-8' : 'bg-white/40 hover:bg-white/60');
    });
    currentSlide = index;
    slideInterval = setInterval(nextSlide, 5000);
}

function nextSlide() {
    goToSlide((currentSlide + 1) % totalSlides);
}
@endif
</script>
@endpush
