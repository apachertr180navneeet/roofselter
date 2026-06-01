@extends('frontend.layout.app')
@section('meta_title', 'Contact Us | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', 'Get in touch with us for roofing services. Free quotes available.')
@section('content')
<section class="relative py-20 md:py-28 bg-navy-800 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(249,115,22,.3) 0%, transparent 50%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white">Contact Us</h1>
        <div class="flex items-center justify-center gap-2 mt-4 text-sm">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-brand-400 transition-colors">Home</a>
            <span class="text-gray-500">/</span>
            <span class="text-brand-400">Contact Us</span>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10">
            <div class="space-y-6 animate-on-scroll" data-animate="animate-fade-in-left">
                <h2 class="text-3xl font-extrabold text-navy-800">Contact Information</h2>
                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-brand-50 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-navy-800">Phone</h3>
                        <a href="tel:{{ get_setting('contact_phone', '+61 451873035') }}" class="text-gray-500 hover:text-brand-500 transition-colors">{{ get_setting('contact_phone', '+61 451873035') }}</a>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-brand-50 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-navy-800">Email</h3>
                        <a href="mailto:{{ get_setting('contact_email', 'sydneycrownroofingandgutters@gmail.com') }}" class="text-gray-500 hover:text-brand-500 transition-colors">{{ get_setting('contact_email', 'sydneycrownroofingandgutters@gmail.com') }}</a>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-brand-50 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-navy-800">Address</h3>
                        <p class="text-gray-500">{{ get_setting('contact_address', '79 Governors Way, Macquarie Links NSW 2565, Australia') }}</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-brand-50 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-navy-800">Working Hours</h3>
                        <p class="text-gray-500">{{ get_setting('contact_hours', 'Mon - Sat: 9:00 AM - 6:00 PM') }}</p>
                    </div>
                </div>
                <div class="pt-4">
                    <h3 class="font-bold text-navy-800 mb-3">Follow Us</h3>
                    <div class="flex gap-3">
                        @if(get_setting('social_facebook'))<a href="{{ get_setting('social_facebook') }}" target="_blank" class="w-10 h-10 bg-gray-100 hover:bg-brand-500 hover:text-white rounded-full flex items-center justify-center text-gray-500 transition-all"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>@endif
                        @if(get_setting('social_instagram'))<a href="{{ get_setting('social_instagram') }}" target="_blank" class="w-10 h-10 bg-gray-100 hover:bg-brand-500 hover:text-white rounded-full flex items-center justify-center text-gray-500 transition-all"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a>@endif
                        @if(get_setting('social_twitter'))<a href="{{ get_setting('social_twitter') }}" target="_blank" class="w-10 h-10 bg-gray-100 hover:bg-brand-500 hover:text-white rounded-full flex items-center justify-center text-gray-500 transition-all"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>@endif
                        @if(get_setting('social_linkedin'))<a href="{{ get_setting('social_linkedin') }}" target="_blank" class="w-10 h-10 bg-gray-100 hover:bg-brand-500 hover:text-white rounded-full flex items-center justify-center text-gray-500 transition-all"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>@endif
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
