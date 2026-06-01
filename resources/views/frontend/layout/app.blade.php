<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('meta_title', (get_setting('website_name') ?: 'RoofShelter') . ' | ' . (get_setting('site_motto') ?: 'Home'))</title>
    <meta name="description" content="@yield('meta_description', get_setting('site_motto', 'Professional Roofing Services'))">
    <meta name="keywords" content="@yield('meta_keywords', 'roofing, roof repair, roof installation, Sydney roofing')">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset(get_setting('site_logo') ? 'img/'.get_setting('site_logo') : 'webtheme/assets/images/resources/RoofShelter-Logo1.jpg') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset(get_setting('site_logo') ? 'img/'.get_setting('site_logo') : 'webtheme/assets/images/resources/RoofShelter-Logo1.jpg') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset(get_setting('site_logo') ? 'img/'.get_setting('site_logo') : 'webtheme/assets/images/resources/RoofShelter-Logo1.jpg') }}" />
    <meta property="og:title" content="@yield('meta_title', get_setting('website_name') . ' | ' . get_setting('site_motto'))">
    <meta property="og:description" content="@yield('meta_description', get_setting('site_motto', 'Professional Roofing Services'))">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "{{ get_setting('website_name', 'Sydney Crown Roofing and Gutters') }}",
        "image": "{{ asset(get_setting('site_logo') ? 'img/'.get_setting('site_logo') : 'webtheme/assets/images/resources/RoofShelter-Logo1.jpg') }}",
        "description": "{{ get_setting('site_motto', 'Professional Roofing Services') }}",
        "telephone": "{{ get_setting('contact_phone', '+61 451873035') }}",
        "email": "{{ get_setting('contact_email', 'sydneycrownroofingandgutters@gmail.com') }}",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ get_setting('contact_address', '79 Governors Way, Macquarie Links NSW 2565') }}",
            "addressLocality": "Sydney",
            "addressRegion": "NSW",
            "addressCountry": "AU"
        },
        "url": "{{ url('/') }}",
        "priceRange": "$$",
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
            "opens": "09:00",
            "closes": "18:00"
        },
        "sameAs": [
            @if(get_setting('social_facebook'))"{{ get_setting('social_facebook') }}",@endif
            @if(get_setting('social_instagram'))"{{ get_setting('social_instagram') }}",@endif
            @if(get_setting('social_twitter'))"{{ get_setting('social_twitter') }}",@endif
            @if(get_setting('social_linkedin'))"{{ get_setting('social_linkedin') }}"@endif
        ]
    }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('style')
</head>
<body class="bg-white">
    @include('frontend.layout.header')
    <main>
        @yield('content')
    </main>
    @include('frontend.layout.footer')
    <a href="https://wa.me/61451873035" target="_blank" rel="noopener noreferrer" class="fixed bottom-6 right-6 z-50 w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 animate-pulse-glow" aria-label="WhatsApp">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    </a>
    <a href="tel:{{ get_setting('contact_phone', '+61451873035') }}" class="fixed bottom-6 left-6 z-50 w-14 h-14 bg-brand-500 hover:bg-brand-600 text-white rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110" aria-label="Call us">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
    </a>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const anim = el.dataset.animate || 'animate-fade-in-up';
                    el.classList.add(anim);
                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
        const hamburger = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (hamburger && mobileMenu) {
            hamburger.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                document.body.classList.toggle('overflow-hidden');
            });
        }
        const header = document.querySelector('header');
        if (header) {
            window.addEventListener('scroll', () => {
                header.classList.toggle('shadow-lg', window.scrollY > 50);
            });
        }
    });
    </script>
    @stack('script')
</body>
</html>
