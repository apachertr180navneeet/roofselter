@extends('frontend.layout.app')
@section('meta_title', 'Our Services | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', 'Professional roofing services including repairs, installations, and maintenance.')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="page-header__inner">
            <h2>Our Services</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-chevron-right"></span></li>
                <li>Services</li>
            </ul>
        </div>
    </div>
</section>

<section class="features-one">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style2">
            <div class="section-title__tagline title-animation"><h4>// What We Offer //</h4></div>
            <h2 class="section-title__title title-animation">Comprehensive Roofing Solutions</h2>
        </div>
        <div class="row">
            @forelse($services as $service)
            <div class="col-xl-6 col-lg-6 wow fadeInLeft" data-wow-delay="{{ $loop->index % 2 * 100 }}ms" data-wow-duration="1500ms">
                <div class="features-one__single">
                    <div class="icon-box">
                        <span class="icon-roof"></span>
                    </div>
                    <div class="features-one__single-inner">
                        <h2><a href="{{ route('home.service-detail', $service->slug) }}">{{ $service->title }}</a></h2>
                        <p>{{ $service->short_description }}</p>
                        <div class="btn-box">
                            <a href="{{ route('home.service-detail', $service->slug) }}">Read More <span class="icon-right-arrow1"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <h4>No services available at the moment.</h4>
                <p>Please check back later.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<section class="cta-one">
    <div class="container">
        <div class="cta-one__inner">
            <div class="cta-one__content text-center">
                <h2>Need a Custom Solution?</h2>
                <p>Contact us today for a free consultation and quote.</p>
                <div class="cta-one__btn mt-4">
                    <a href="{{ route('home.contact-us') }}" class="thm-btn">Contact Us <span class="icon-next1"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection