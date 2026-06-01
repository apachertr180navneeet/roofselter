@extends('frontend.layout.app')
@section('meta_title', 'Pricing | ' . get_setting('website_name'))
@section('meta_description', 'Explore our competitive roofing service packages and pricing.')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="page-header__inner">
            <h2>Pricing</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-chevron-right"></span></li>
                <li>Pricing</li>
            </ul>
        </div>
    </div>
</section>

<section class="pricing-one">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style2">
            <div class="section-title__tagline title-animation"><h4>// Our Pricing //</h4></div>
            <h2 class="section-title__title title-animation">Transparent & Competitive Pricing</h2>
            <p class="mt-3">We offer high-quality roofing services at fair, competitive rates. Contact us for a free, no-obligation quote tailored to your needs.</p>
        </div>
        <div class="row">
            @foreach($services as $service)
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp">
                <div class="pricing-one__single text-center">
                    <div class="pricing-one__single-top">
                        <div class="pricing-one__single-shape"></div>
                        <div class="pricing-one__single-icon">
                            <span class="icon-roof"></span>
                        </div>
                        <h2 class="pricing-one__single-title">{{ $service->title }}</h2>
                        <p class="pricing-one__single-desc">{{ $service->short_description }}</p>
                    </div>
                    <div class="pricing-one__single-list">
                        <ul>
                            @if($service->features->count())
                                @foreach($service->features->take(5) as $feature)
                                <li><span class="icon-check"></span> {{ $feature->title }}</li>
                                @endforeach
                            @else
                                <li><span class="icon-check"></span> Professional service</li>
                                <li><span class="icon-check"></span> Quality guaranteed</li>
                                <li><span class="icon-check"></span> Licensed & insured</li>
                            @endif
                        </ul>
                    </div>
                    <div class="pricing-one__single-btn">
                        <a href="{{ route('home.service-detail', $service->slug) }}" class="thm-btn">View Details <span class="icon-next1"></span></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="cta-one">
    <div class="container">
        <div class="cta-one__inner">
            <div class="cta-one__content text-center">
                <h2>Need a Custom Quote?</h2>
                <p>Every roof is unique. Get a tailored solution for your specific requirements.</p>
                <div class="cta-one__btn mt-4">
                    <a href="{{ route('home.contact-us') }}" class="thm-btn">Get Free Quote <span class="icon-next1"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>

@if($testimonials->count())
<section class="testimonial-one">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style2">
            <div class="section-title__tagline title-animation"><h4>// Testimonials //</h4></div>
            <h2 class="section-title__title title-animation">What Our Clients Say</h2>
        </div>
        <div class="testimonial-one__carousel owl-carousel owl-theme">
            @foreach($testimonials as $testimonial)
            <div class="testimonial-one__single">
                <div class="testimonial-one__single-content">
                    <p>{{ $testimonial->description }}</p>
                </div>
                <div class="testimonial-one__single-bottom">
                    <div class="testimonial-one__single-bottom-img">
                        <img src="{{ $testimonial->image ? asset('img/'.$testimonial->image) : asset('webtheme/assets/images/resources/testimonial-1-1.jpg') }}" alt="{{ $testimonial->name }}">
                    </div>
                    <div class="testimonial-one__single-bottom-text">
                        <h3>{{ $testimonial->name }}</h3>
                        <p>{{ $testimonial->designation }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection