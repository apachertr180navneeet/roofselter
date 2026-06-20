@extends('frontend.layouts.app')

@section('title', get_setting('cms_home_meta_title', 'Home') . ' | ' . get_setting('website_name', 'RoofShelter'))

@section('content')
<div class="padding-rl float-left w-100">
    <div class="home-outer-wrapper float-left w-100 position-relative main-box">
        @php $slide = $sliders->first(); @endphp
        <section class="float-left w-100 position-relative banner-con br-50 main-box" style="background-image: url('{{ $slide && $slide->banner ? asset('img/'.$slide->banner) : asset('assets/images/banner-bg-img.jpg') }}');">
            <div class="banner-white-box bg-fff position-absolute var1">
                <img src="{{ asset('assets/images/baner-white-icon1.png') }}" alt="white icon" class="img-fluid">
                <p class="mb-0">Clean Jobsite Promise</p>
            </div>
            <div class="banner-white-box bg-fff position-absolute var2">
                <img src="{{ asset('assets/images/baner-white-icon2.png') }}" alt="white icon" class="img-fluid">
                <p class="mb-0">Same-Week Service</p>
            </div>
            <div class="banner-white-box bg-fff position-absolute var3">
                <img src="{{ asset('assets/images/baner-white-icon3.png') }}" alt="white icon" class="img-fluid">
                <p class="mb-0">Fully <br> Insured</p>
            </div>
            <div class="wrapper1605">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="banner-content-con">
                            <div class="d-flex align-items-center rating-con">
                                <figure><img src="{{ asset('assets/images/google-icon.png') }}" alt="google icon" class="google-icon"></figure>
                                <span class="d-inline-block rating-text text-white font-weight-600 oswald-font">4.9</span>
                                <div class=""><span class="d-block text-size-14 text-white">4.9/5 Reviews</span>
                                    <img src="{{ asset('assets/images/stars.png') }}" alt="stars" class="img-fluid">
                                </div>
                            </div>
                            <h1 class="text-size-120">{{ $slide ? $slide->title : "Roofing <br> Solutions for <br> Every Home." }}</h1>
                            <p class="text-white">{{ $slide ? $slide->short_desc : 'Fast leak fixes, small repairs, and honest re-roofs. You\'ll deal with me personally, from inspection to the final sweep.' }}</p>
                            <a href="javascript:;" data-toggle="modal" data-target="#contactModal" class="font-weight-bold secondary_btn d-inline-block">
                                Get a Quote <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                            </a>
                            <a href="{{ route('home.contact-us') }}" class="font-weight-bold elementary_btn d-inline-block">
                                Call Me Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute scrol-outer">
                <span class="d-block text-white text-size-14 font-weight-bold">Scroll Down</span>
                <a href="#about" class="scroll-down-arrow">
                    <figure><img src="{{ asset('assets/images/arrow-down.png') }}" alt="arrow icon" class="img-fluid"></figure>
                </a>
            </div>
        </section>
    </div>
</div>

@php $about = $abouts->first(); @endphp
<section class="float-left w-100 position-relative about-con padding-top padding-bottom main-box overflow-hidden" id="about">
    <div class="main-container">
        <div class="row">
            <div class="col-lg-4 col-md-12 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">
                <div class="about-img-con position-relative">
                    <div class="navy-box position-absolute bg-blue br-20 text-center">
                        <figure><img src="{{ asset('assets/images/quote.png') }}" alt="quote icon" class="img-fluid"></figure>
                        <p class="text-white">"If I wouldn't put it on my own home, I won't put it on yours."</p>
                        <span class="position-relative text-white font-weight-bold">Jake Morales</span>
                    </div>
                    <figure class=""><img src="{{ asset($about && $about->image ? 'img/'.$about->image : 'assets/images/about-img.jpg') }}" alt="about image" class="img-fluid br-40"></figure>
                    <figure class="position-absolute z-1 about-vector"><img src="{{ asset('assets/images/about-vector.png') }}" alt="about vector" class="img-fluid"></figure>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">
                <div class="about-content-con d-flex justify-content-between">
                    <div class="heading-title-con mb-0">
                        <span class="special-text d-block">About</span>
                        <h2 class="text-size-60">{{ $about ? $about->title : 'Proven Roofing <br> Experience You Can <br> See in Every Detail' }}</h2>
                        <p>{{ $about ? $about->description : "I'm Jake Morales, a Melbourne roofer with 18+ years on ladders, not behind a desk." }}</p>
                        @if($about && $about->description2)<p class="last-text">{{ $about->description2 }}</p>@endif
                        <a href="{{ route('home.services') }}" class="text-decoration-none secondary_btn d-inline-block mt-auto">See My Insurance & References <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span></a>
                        <div class="users-details-con">
                            <div class="user-detrail-box pl-0">
                                <span class="d-inline-block counter">{{ $about && $about->counter1_number ? $about->counter1_number : '500' }}</span><span class="d-inline-block alphabet">+</span>
                                <p class="mb-0 text-black">{{ $about && $about->counter1_label ? $about->counter1_label : 'Jobs Done' }}</p>
                            </div>
                            <div class="user-detrail-box">
                                <span class="d-inline-block counter">{{ $about && $about->counter2_number ? $about->counter2_number : '95' }}</span><span class="d-inline-block alphabet">+</span>
                                <p class="mb-0 text-black">{{ $about && $about->counter2_label ? $about->counter2_label : 'Roofing Awards' }}</p>
                            </div>
                            <div class="user-detrail-box border-right-0">
                                <span class="d-inline-block counter">{{ $about && $about->counter3_number ? $about->counter3_number : '100' }}</span><span class="d-inline-block alphabet">%</span>
                                <p class="mb-0 text-black">{{ $about && $about->counter3_label ? $about->counter3_label : 'Client Satisfaction' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="about-right-side-con d-flex flex-column justify-content-between position-relative align-items-end">
                        <figure class="about-logo"><img src="{{ asset($about && $about->image2 ? 'img/'.$about->image2 : 'assets/images/about-logo.png') }}" alt="about logo" class="img-fluid"></figure>
                        <div class="about-bottom-img-con br-40">
                            <figure><img src="{{ asset('assets/images/about-icon.png') }}" alt="about icon" class="img-fluid"></figure>
                            <div class=""><span class="oswald-font d-inline-block text-white counter">{{ $about && $about->counter4_number ? $about->counter4_number : '18' }}</span><span class="d-inline-block text-accent alphabet">+</span></div>
                            <p>{{ $about && $about->counter4_label ? $about->counter4_label : 'Years Experience on Ladders' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="padding-rl float-left w-100">
    <section class="float-left w-100 position-relative services-con padding-top padding-bottom main-box br-50">
        <div class="main-container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 wow fadeInLeft mb-0" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="heading-title-con">
                        <span class="d-block text-white">Services</span>
                        <h2 class="text-size-60 text-white">Roofing Services <br> You Can Trust</h2>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 wow fadeInRight text-black" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="heading-title-con">
                        <p class="mb-0 sora-font text-white">At Morales Roofing, we handle every project personally from start to finish. <br> With over 18 years of hands-on experience, I inspect, quote, and repair your <br> roof myself—no middlemen, no confusion.</p>
                    </div>
                </div>
            </div>
            <div class="cards-wrapper wow fadeInUp mb-0" data-wow-duration="2s" data-wow-delay="0.2s">
                @forelse($services as $index => $service)
                <div class="custom-card @if($index >= 4) service-extra @endif">
                    <img src="{{ asset($service->image ? 'img/'.$service->image : 'assets/images/services-img1.jpg') }}" alt="{{ $service->title }}" class="img-fluid">
                    <div class="overlay">
                        <h3>{{ $service->title }}</h3>
                        <p class="mb-0">{{ $service->short_description ?: 'Keep your roof in top condition with our expert services.' }}</p>
                    </div>
                    <a href="{{ route('home.service-detail', $service->slug) }}" class="text-decoration-none secondary_btn d-inline-block mt-auto">Book Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span></a>
                </div>
                @empty
                <div class="custom-card">
                    <img src="{{ asset('assets/images/services-img1.jpg') }}" alt="services image" class="img-fluid">
                    <div class="overlay">
                        <h3>Residential Roofing</h3>
                        <p class="mb-0">Keep your roof in top condition with our expert repair and maintenance services.</p>
                    </div>
                    <a href="{{ route('home.services') }}" class="text-decoration-none secondary_btn d-inline-block mt-auto">Book Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span></a>
                </div>
                @endforelse
            </div>
            @if($services->count() > 4)
            <div class="text-center mt-4">
                <button id="showMoreServices" class="secondary_btn text-decoration-none d-inline-block border-0" style="cursor:pointer;">Show More <span><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span></button>
            </div>
            @else
            <div class="text-center mt-4">
                <a href="{{ route('home.services') }}" class="secondary_btn text-decoration-none d-inline-block">View All Services <span><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span></a>
            </div>
            @endif
        </div>
    </section>
</div>

<div class="spacer"></div>

<div class="padding-rl float-left w-100">
    <section class="float-left w-100 position-relative gallery-con padding-top padding-bottom main-box br-50">
        <div class="main-container">
            <div class="heading-title-con text-center">
                <span class="special-text d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Gallery</span>
                <h2 class="text-size-60 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">Our Recent Work</h2>
                <p class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Take a look at some of our completed roofing projects.</p>
            </div>
            <div class="row">
                @forelse($galleryImages as $key => $gallery)
                <div class="col-lg-4 col-md-6 wow {{ $key % 3 == 0 ? 'fadeInLeft' : ($key % 3 == 1 ? 'fadeInUp' : 'fadeInRight') }}" data-wow-duration="2s" data-wow-delay="0.05s">
                    <div class="gallery-box">
                        <a href="{{ asset('img/'.$gallery->image) }}" class="gallery-link">
                            <figure class="mb-0"><img src="{{ asset('img/'.$gallery->image) }}" alt="{{ $gallery->caption ?: 'gallery' }}" class="img-fluid"></figure>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-box">
                        <a href="{{ asset('assets/images/gallery-img1.jpg') }}" class="gallery-link">
                            <figure class="mb-0"><img src="{{ asset('assets/images/gallery-img1.jpg') }}" alt="gallery" class="img-fluid"></figure>
                        </a>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>
</div>

<div class="spacer"></div>

<div class="padding-rl float-left w-100">
    <section class="float-left w-100 cta-con position-relative main-box br-50 text-center">
        <figure><img src="{{ asset('assets/images/cta-vector.png') }}" alt="house vector" class="position-absolute cta-vector"></figure>
        <div class="main-container">
            <div class="heading-title-con mb-0 position-relative">
                <span class="special-text text-white d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Quote Request</span>
                <h2 class="text-size-60 text-white wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">Planning a Re-Roof?</h2>
                <p class="text-white wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Small re-roofs (garages/porches) start at <span class="text-accent d-inline-block">$385/sq</span> (Materials + Labor).</p>
                <a href="{{ route('home.contact-us') }}" class="secondary_btn d-inline-block wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.05s">
                    Request Full Quote <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                </a>
            </div>
        </div>
    </section>
</div>

<section class="float-left w-100 position-relative portfolio-con padding-top overflow-hidden padding-bottom main-box">
    <div class="main-container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12">
                <div class="heading-title-con">
                    <span class="d-block wow fadeInLeft special-text" data-wow-duration="2s" data-wow-delay="0.2s">Recent projects</span>
                    <h2 class="text-size-60 wow fadeInLeft mb-0" data-wow-duration="2s" data-wow-delay="0.2s">Expert Roofing Projects <br> Completed in Dallas</h2>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="heading-title-con wow fadeInRight text-black" data-wow-duration="2s" data-wow-delay="0.2s">
                    <p class="mb-0 sora-font">From minor repairs to full roof replacements, every <br> project we take on in Dallas is handled personally from <br> start to finish our work combines quality materials.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($projects as $key => $project)
            @php
                $leftCol = in_array($key % 4, [0, 2]) ? true : false;
                $colClass = in_array($key % 4, [0, 3]) ? 'col-lg-5 col-md-5' : 'col-lg-7 col-md-7';
                $anim = $leftCol ? 'fadeInLeft' : 'fadeInRight';
                $ptClass = in_array($key % 4, [1, 3]) ? 'pt-0' : '';
            @endphp
            <div class="{{ $colClass }} wow {{ $anim }}" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="portfolio-box {{ $ptClass }} {{ $leftCol ? 'left-img' : 'right-img' }}">
                    <figure><img src="{{ asset($project->image ? 'img/'.$project->image : 'assets/images/portfolio-img1.jpg') }}" alt="{{ $project->title }}" class="img-fluid"></figure>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-inline">
                            @if($project->service_type)<span class="d-inline-block key-tags mr-2">{{ $project->service_type }}</span>@endif
                            @if($project->location)<span class="d-inline-block key-tags">{{ $project->location }}</span>@endif
                            <h3 class="text-size-34">{{ $project->title }}</h3>
                        </div>
                        <a href="{{ $project->slug ? route('home.blog-details', $project->slug) : '#' }}"><img src="{{ asset('assets/images/up-right-lg-arrow.png') }}" alt="arrow" class="border-radius-0 mb-0"></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-5 col-md-5">
                <div class="portfolio-box left-img">
                    <figure><img src="{{ asset('assets/images/portfolio-img1.jpg') }}" alt="portfolio" class="img-fluid"></figure>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-inline">
                            <span class="d-inline-block key-tags mr-2">Residential</span>
                            <h3 class="text-size-34">Our Projects</h3>
                        </div>
                        <a href="#"><img src="{{ asset('assets/images/up-right-lg-arrow.png') }}" alt="arrow" class="border-radius-0 mb-0"></a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<div class="padding-rl float-left w-100">
    <section class="testimonials-con w-100 float-left padding-top padding-bottom position-relative main-box text-center br-50">
        <figure>
            <img src="{{ asset('assets/images/left-quote.png') }}" alt="quote" class="position-absolute left-quote">
        </figure>
        <figure>
            <img src="{{ asset('assets/images/right-quote.png') }}" alt="quote" class="position-absolute right-quote">
        </figure>
        <div class="main-container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
            <div class="heading-title-con text-center">
                <span class="special-text d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Client Reviews</span>
                <h2 class="text-size-60 wow fadeInRight mb-0" data-wow-duration="2s" data-wow-delay="0.05s">Real Feedback From <br> Real Clients</h2>
            </div>
            <div class="client-review-slider-inner-con wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div id="home1_testimonial_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @forelse($testimonials as $key => $testimonial)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <div class="client-review-box">
                                <figure class="rating-stars">
                                    <img src="{{ asset('assets/images/rating-stars.png') }}" alt="rating-stars">
                                </figure>
                                <p class="review-text">{!! $testimonial->message !!}</p>
                            </div>
                        </div>
                        @empty
                        <div class="carousel-item active">
                            <div class="client-review-box">
                                <figure class="rating-stars">
                                    <img src="{{ asset('assets/images/rating-stars.png') }}" alt="rating-stars">
                                </figure>
                                <p class="review-text">"Outstanding roofing service from start to finish."</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <ul class="carousel-indicators">
                        @forelse($testimonials as $key => $testimonial)
                        <li data-target="#home1_testimonial_slider" data-slide-to="{{ $key }}" class="{{ $key === 1 ? 'active' : '' }}">
                            <figure class="mb-0">
                                <img src="{{ asset($testimonial->image ? 'img/'.$testimonial->image : 'assets/images/client-img'.(($key % 4) + 1).'.jpg') }}" alt="{{ $testimonial->name }}" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">{{ $testimonial->name }}</p>
                                <span class="d-block">{{ $testimonial->designation ?? 'Satisfied Customer' }}</span>
                            </div>
                        </li>
                        @empty
                        <li data-target="#home1_testimonial_slider" data-slide-to="0" class="active">
                            <figure class="mb-0">
                                <img src="{{ asset('assets/images/client-img1.jpg') }}" alt="client" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">Client</p>
                                <span class="d-block">Satisfied Customer</span>
                            </div>
                        </li>
                        @endforelse
                    </ul>
                    <div class="pagination-outer">
                        <a class="carousel-control-prev" href="#home1_testimonial_slider" role="button" data-slide="prev">
                            <i class="prev-arrow fa-solid fa-arrow-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#home1_testimonial_slider" role="button" data-slide="next">
                            <i class="next-arrow fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="spacer"></div>

<div class="padding-rl float-left w-100">
    <section class="float-left w-100 faq-con position-relative padding-top padding-bottom main-box bg-sky br-50">
        <div class="container wow fadeInDown" data-wow-duration="2s" data-wow-delay="0.3s">
            <div class="heading-title-con text-center">
                <span class="special-text d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">FAQs</span>
                <h2 class="text-size-60 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">Common Roofing <br> Questions & Answers</h2>
                <p>Direct answers from an experienced, hands-on roofing professional.</p>
            </div>
            <div class="faq wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.05s">
                <div class="accordian-section-inner position-relative">
                    <div class="accordian-inner">
                        <div id="faq_accordion1">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mx-auto">
                                    @forelse($faqs as $key => $faq)
                                    @php $isSecond = ($key === 1); @endphp
                                    <div class="accordion-card @if($loop->last) mb-0 @endif">
                                        <div class="card-header" id="headingFaq{{ $key }}">
                                            <a href="#" class="btn btn-link {{ $isSecond ? '' : 'collapsed' }}" data-toggle="collapse" data-target="#collapseFaq{{ $key }}" aria-expanded="{{ $isSecond ? 'true' : 'false' }}" aria-controls="collapseFaq{{ $key }}">
                                                <h3 class="text-size-26"><span class="d-inline-block sora-font text-light-blue font-weight-600">{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</span>{{ $faq->question }}</h3>
                                            </a>
                                        </div>
                                        <div id="collapseFaq{{ $key }}" class="collapse {{ $isSecond ? 'show' : '' }}" aria-labelledby="headingFaq{{ $key }}" data-parent="#faq_accordion1" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">{{ $faq->answer }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="accordion-card mb-0">
                                        <div class="card-header" id="headingFaqEmpty">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFaqEmpty">
                                                <h3 class="text-size-26">No FAQs available</h3>
                                            </a>
                                        </div>
                                        <div id="collapseFaqEmpty" class="collapse" data-parent="#faq_accordion1">
                                            <div class="card-body">
                                                <p class="text-left mb-0">Check back later for frequently asked questions.</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="spacer"></div>

<div class="container-fluid p-0">
    <div class="padding-rl float-left w-100">
        <section class="float-left w-100 position-relative book-now-con main-box br-50 bg-lemon">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="heading-title-con mb-0">
                        <span class="special-text d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Book Now</span>
                        <h2 class="text-size-120 text-blue wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">Start Your Roofing.</h2>
                        <p class="text-blue wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Fast, reliable roofing service you can trust—personally handled <br> from start to finish.</p>
                        <a href="javascript:;" data-toggle="modal" data-target="#contactModal" class="font-weight-bold secondary_btn d-inline-block wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.05s">
                            Get a Quote <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                        </a>
                        <a href="{{ route('home.contact-us') }}" class="font-weight-bold elementary_btn d-inline-block wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.05s">
                            Call Me Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                        </a>
                    </div>
                </div>
                <div class="book-now-img">
                    <figure><img src="{{ asset('assets/images/book-now-vector.png') }}" alt="book now house" class="book-now-img1"></figure>
                    <figure><img src="{{ asset('assets/images/mustard-elipse.png') }}" alt="elipse shape" class="img-fluid position-absolute elipse"></figure>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="spacer"></div>

<div class="padding-rl float-left w-100">
    <section class="float-left w-100 position-relative padding-top padding-bottom main-box">
        <div class="container">
            <div class="heading-title-con text-center wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.1s">
                <span class="special-text d-block">Contact Us</span>
                <h2 class="text-size-60">Get In Touch With Us</h2>
                <p>Have a question or need a quote? Fill out the form and we'll get back to you promptly.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
                    <div class="home-contact-box">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="username" placeholder="Kevin Doe" required form="homeQuoteForm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="kevindoe@gmail.com" form="homeQuoteForm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" placeholder="(214) 555 013258" required form="homeQuoteForm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>What do you need?</label>
                                    <select class="form-control" name="service_required" form="homeQuoteForm">
                                        <option value="">Select a service</option>
                                        <option value="Delivery Quote">Delivery Quote</option>
                                        <option value="Roofing">Roofing</option>
                                        <option value="Repair">Repair</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Project Details</label>
                                    <textarea class="form-control" name="message" placeholder="Tell us the jobsite city, roof squares..." rows="4" form="homeQuoteForm"></textarea>
                                </div>
                            </div>
                        </div>
                        <form id="homeQuoteForm" action="{{ route('contact.store') }}" method="POST" class="d-none">@csrf</form>
                        <button type="submit" class="home-contact-btn" form="homeQuoteForm">
                            Submit Request
                        </button>
                        <div id="home_form_result"></div>
                        <p class="home-contact-footer-text">By submitting, you agree to be contacted about inventory and pricing.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="spacer"></div>

<div class="padding-rl float-left overflow-hidden w-100">
    <section class="float-left w-100 newsletter-con position-relative main-box br-50 bg-blue">
        <div class="main-container">
            <div class="d-flex justify-content-between">
                <div class="newsletter-img-con wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">
                    <figure><img src="{{ asset('assets/images/footer-vector.png') }}" alt=""></figure>
                </div>
                <div class="newsletter-content-con wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">
                    <h2 class="text-white text-size-60">Subscribe to Our <br> Newsletter</h2>
                    <form action="javascript:;">
                        <div class="form-group position-relative mb-0">
                            <input type="text" class="form_style" placeholder="Enter Your Email Address" name="email">
                            <button><i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="contactModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Request a Quote</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="modalQuoteForm" action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="username" placeholder="Kevin Doe" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="kevindoe@gmail.com">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="phone" placeholder="(214) 555 013258" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>What do you need?</label>
                        <select class="form-control" name="service_required">
                            <option value="">Select a service</option>
                            <option value="Delivery Quote">Delivery Quote</option>
                            <option value="Roofing">Roofing</option>
                            <option value="Repair">Repair</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Project Details</label>
                        <textarea class="form-control" name="message" placeholder="Tell us the jobsite city, roof squares..." rows="4"></textarea>
                    </div>
                    <button type="submit" class="submit-btn-modal">Submit Request</button>
                </form>
                <div id="modal_form_result"></div>
                <p class="modal-footer-text">By submitting, you agree to be contacted about inventory and pricing.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .service-extra { display: none; }
    .service-extra.show { display: block; }

    .home-contact-box {
        background: var(--secondary--color);
        border-radius: 30px;
        padding: 40px;
        box-shadow: 0 5px 40px rgba(0,0,0,0.06);
        border: 1px solid #eee;
    }
    .home-contact-box .form-group label {
        font-size: 14px;
        font-weight: 600;
        color: var(--primary--color);
        margin-bottom: 6px;
    }
    .home-contact-box .form-control {
        border-radius: 30px;
        height: 54px;
        padding: 0 24px;
        border: 1px solid #e0e0e0;
        font-size: 14px;
        transition: all 0.3s;
        margin-bottom: 6px;
    }
    .home-contact-box .form-control:focus {
        border-color: var(--accent--color);
        box-shadow: 0 0 0 3px rgba(244,121,32,0.1);
    }
    .home-contact-box textarea.form-control {
        height: 110px;
        padding: 16px 24px;
        border-radius: 16px;
        resize: none;
    }
    .home-contact-box select.form-control {
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%23666' d='M6 8L0 0h12z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 20px center;
        padding-right: 40px;
    }
    .home-contact-btn {
        background: var(--primary--color);
        color: var(--secondary--color);
        border-radius: 30px;
        height: 54px;
        font-size: 16px;
        width: 100%;
        border: none;
        font-weight: 600;
        transition: all 0.3s;
        cursor: pointer;
        margin-top: 5px;
    }
    .home-contact-btn:hover {
        background: var(--accent--color);
        color: var(--secondary--color);
    }
    .home-contact-footer-text {
        font-size: 12px;
        color: #aaa;
        margin: 15px 0 0;
        text-align: center;
    }
    .home-contact-box .alert {
        border-radius: 12px;
        margin-top: 12px;
        padding: 12px 18px;
        font-size: 14px;
    }
    @media (max-width: 768px) {
        .home-contact-box {
            padding: 25px 20px;
        }
    }

    #contactModal .modal-content {
        border-radius: 24px;
        border: none;
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        overflow: hidden;
    }
    #contactModal .modal-header {
        background: var(--primary--color);
        color: var(--secondary--color);
        border-bottom: 3px solid var(--accent--color);
        padding: 20px 30px;
        align-items: center;
    }
    #contactModal .modal-header .modal-title {
        font-size: 22px;
        font-weight: 700;
    }
    #contactModal .modal-header .close {
        color: var(--secondary--color);
        font-size: 32px;
        font-weight: 300;
        opacity: 0.7;
        text-shadow: none;
        position: relative;
        top: -2px;
    }
    #contactModal .modal-header .close:hover {
        opacity: 1;
    }
    #contactModal .modal-body {
        padding: 30px;
    }
    #contactModal .form-group label {
        font-size: 14px;
        font-weight: 600;
        color: var(--primary--color);
        margin-bottom: 6px;
    }
    #contactModal .form-control {
        border-radius: 30px;
        height: 54px;
        padding: 0 24px;
        border: 1px solid #e0e0e0;
        font-size: 14px;
        transition: all 0.3s;
    }
    #contactModal .form-control:focus {
        border-color: var(--accent--color);
        box-shadow: 0 0 0 3px rgba(244,121,32,0.12);
    }
    #contactModal textarea.form-control {
        height: 110px;
        padding: 16px 24px;
        border-radius: 16px;
        resize: none;
    }
    #contactModal select.form-control {
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%23666' d='M6 8L0 0h12z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 20px center;
        padding-right: 40px;
    }
    #contactModal .submit-btn-modal {
        background: var(--primary--color);
        color: var(--secondary--color);
        border-radius: 30px;
        height: 54px;
        font-size: 16px;
        width: 100%;
        border: none;
        font-weight: 600;
        transition: all 0.3s;
        cursor: pointer;
    }
    #contactModal .submit-btn-modal:hover {
        background: var(--accent--color);
        color: var(--secondary--color);
    }
    #contactModal .modal-footer-text {
        font-size: 12px;
        color: #aaa;
        margin: 15px 0 0;
        text-align: center;
    }
    #contactModal .alert {
        border-radius: 12px;
        margin-top: 12px;
        padding: 12px 18px;
        font-size: 14px;
    }
    @media (max-width: 576px) {
        #contactModal .modal-body {
            padding: 20px;
        }
        #contactModal .modal-header {
            padding: 15px 20px;
        }
        #contactModal .modal-header .modal-title {
            font-size: 18px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    $(function() {
        var $btn = $('#showMoreServices');
        if ($btn.length) {
            $btn.on('click', function() {
                $('.service-extra').toggleClass('show');
                var expanded = $('.service-extra.show').length > 0;
                $btn.html(expanded ? 'Show Less <span><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block" style="transform:rotate(180deg)"></span>' : 'Show More <span><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>');
            });
        }

        function handleFormSubmit(formId, resultId) {
            $(formId).on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var url = form.attr('action');
                var data = form.serialize();
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            $(resultId).html('<span class="form-success alert alert-success d-block">' + response.message + '</span>');
                            form[0].reset();
                        }
                        $(resultId).show();
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON;
                        var msg = '';
                        if (errors && errors.errors) {
                            $.each(errors.errors, function(key, val) {
                                msg += val[0] + '<br>';
                            });
                        } else if (errors && errors.message) {
                            msg = errors.message;
                        } else {
                            msg = 'Something went wrong. Please try again.';
                        }
                        $(resultId).html('<span class="form-error alert alert-danger d-block">' + msg + '</span>');
                        $(resultId).show();
                    }
                });
            });
        }
        handleFormSubmit('#homeQuoteForm', '#home_form_result');
        handleFormSubmit('#modalQuoteForm', '#modal_form_result');
    });
</script>
@endpush
