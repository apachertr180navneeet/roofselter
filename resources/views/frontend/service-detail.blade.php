@extends('frontend.layouts.app')

@section('title', ($service->meta_title ? $service->meta_title : $service->title) . ' | Roofora — Roofing & Construction Services')

@section('content')
<div class="padding-rl float-left w-100">
    <div class="home-outer-wrapper float-left w-100 position-relative main-box">
        <section class="float-left w-100 position-relative sub-banner-con br-50 main-box">
            <div class="main-container">
                <div class="sub-banner-inner-con position-relative z-1">
                    <h1 class="text-white text-size-90">{{ $service->title }}</h1>
                    <p class="text-white">{{ $service->short_description }}</p>
                    <div class="breadcrumb-con d-inline-block">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('home.services') }}">Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $service->title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<section class="float-left w-100 position-relative single-service-outer-con padding-top padding-bottom main-box">
    <div class="main-container">
        <div class="single-service-inner-con position-relative wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">
            <figure class="single-vector position-absolute"><img src="{{ asset('assets/images/single-service-vector.png') }}" alt="vector" class="img-fluid mb-0"></figure>
            @if($service->image)
            <figure class="single-main-img"><img src="{{ asset('img/'.$service->image) }}" alt="{{ $service->title }}" class="img-fluid br-40"></figure>
            @endif
            <h2 class="text-size-60">{{ $service->title }}</h2>
            @if($service->description)
            <p>{!! nl2br(e($service->description)) !!}</p>
            @endif
            @if($service->subtitle)
            <p class="mb-xl-4 mb-3">{!! nl2br(e($service->subtitle)) !!}</p>
            @endif
            @if($service->subtitle2)
            <p class="mb-xl-4 mb-3">{!! nl2br(e($service->subtitle2)) !!}</p>
            @endif

            @if($service->features && $service->features->count() > 0)
            <h3 class="text-size-30">{{ $service->features_headings ?? 'Features' }}</h3>
            @if($service->features_short_description)
            <p>{{ $service->features_short_description }}</p>
            @endif
            <div class="row">
                @foreach($service->features->chunk(ceil($service->features->count()/3)) as $chunk)
                <div class="col-lg-4 col-md-6">
                    <div class="about-listing-con">
                        <ul class="list-unstyled p-0">
                            @foreach($chunk as $feature)
                            <li><i class="fa-solid fa-check"></i>{{ $feature->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @if($service->benefits && $service->benefits->count() > 0)
            <h3 class="text-size-30">{{ $service->benefits_headings ?? 'What Our Service Covers' }}</h3>
            @if($service->benefits_short_description)
            <p>{{ $service->benefits_short_description }}</p>
            @endif
            <div class="row">
                @foreach($service->benefits->chunk(ceil($service->benefits->count()/3)) as $chunk)
                <div class="col-lg-4 col-md-6">
                    <div class="about-listing-con">
                        <ul class="list-unstyled p-0">
                            @foreach($chunk as $benefit)
                            <li><i class="fa-solid fa-check"></i>{{ $benefit->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @if($service->essentials && $service->essentials->count() > 0)
            <h3 class="text-size-30">{{ $service->essentials_headings ?? 'Essentials' }}</h3>
            @if($service->essentials_short_description)
            <p>{{ $service->essentials_short_description }}</p>
            @endif
            <div class="row">
                @foreach($service->essentials->chunk(ceil($service->essentials->count()/3)) as $chunk)
                <div class="col-lg-4 col-md-6">
                    <div class="about-listing-con">
                        <ul class="list-unstyled p-0">
                            @foreach($chunk as $essential)
                            <li><i class="fa-solid fa-check"></i>{{ $essential->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @if($service->subtitle)
            <p class="text-size-22 font-weight-600 mb-xl-4 mb-3">{{ $service->subtitle }}</p>
            @endif
            <a href="{{ route('home.contact-us') }}" class="font-weight-bold secondary_btn d-inline-block">
                Book Service Now <span><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
            </a>
        </div>

        @if($service->features && $service->features->count() > 0)
        <div class="row only-images-outer">
            @foreach($service->features->take(3) as $feature)
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="only-img w-100">
                    @if($feature->icon)
                    <figure><img src="{{ asset('img/'.$feature->icon) }}" alt="{{ $feature->title }}"></figure>
                    @else
                    <figure><img src="{{ asset('assets/images/single-srvice-img1.jpg') }}" alt="service"></figure>
                    @endif
                    <p class="text-center mt-2">{{ $feature->title }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<div class="padding-rl float-left w-100">
    <section class="float-left w-100 padding-top why-choose-con padding-bottom position-relative main-box br-50 bg-sky">
        <div class="main-container">
            <div class="heading-title-con text-center">
                <span class="special-text d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Trust</span>
                <h2 class="text-size-60 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">Why Choose Us?</h2>
                <p>Delivering reliable service and unmatched quality every time.</p>
            </div>
            <div class="d-flex align-items-center justify-content-between choose-outer">
                <div class="choose-box text-center">
                    <figure><img src="{{ asset('assets/images/circle-check.png') }}" alt="circle check" class="img-fluid"></figure>
                    <h3 class="text-size-22">Hands-On Expertise</h3>
                    <p class="mb-0">Every inspection and repair is personally handled.</p>
                </div>
                <div class="choose-box text-center">
                    <figure><img src="{{ asset('assets/images/circle-check.png') }}" alt="circle check" class="img-fluid"></figure>
                    <h3 class="text-size-22">Transparent Process</h3>
                    <p class="mb-0">Clear estimates, no hidden fees, & updates</p>
                </div>
                <div class="choose-box text-center">
                    <figure><img src="{{ asset('assets/images/circle-check.png') }}" alt="circle check" class="img-fluid"></figure>
                    <h3 class="text-size-22">Quality Materials</h3>
                    <p class="mb-0">Only trusted materials to ensure longevity and reliability.</p>
                </div>
                <div class="choose-box text-center">
                    <figure><img src="{{ asset('assets/images/circle-check.png') }}" alt="circle check" class="img-fluid"></figure>
                    <h3 class="text-size-22">Safety First</h3>
                    <p class="mb-0">Fully insured and compliant with all local regulations.</p>
                </div>
                <div class="choose-box text-center">
                    <figure><img src="{{ asset('assets/images/circle-check.png') }}" alt="circle check" class="img-fluid"></figure>
                    <h3 class="text-size-22">Customer Focused</h3>
                    <p class="mb-0">Your satisfaction and home protection are our top priorities.</p>
                </div>
            </div>
        </div>
    </section>
</div>

@if($service->faqs && $service->faqs->count() > 0)
<div class="padding-rl float-left w-100">
    <section class="float-left w-100 faq-con position-relative padding-top padding-bottom main-box faq-con2">
        <div class="main-container wow fadeInDown" data-wow-duration="2s" data-wow-delay="0.3s">
            <div class="heading-title-con text-center">
                <span class="special-text d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">FAQs</span>
                <h2 class="text-size-60 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">Common Roofing <br> Questions & Answers</h2>
                <p>Direct answers from an experienced, hands-on roofing professional.</p>
            </div>
            <div class="faq wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.05s">
                <div class="accordian-section-inner position-relative">
                    <div class="accordian-inner">
                        <div id="single_faq_accordion">
                            <div class="row">
                                @foreach($service->faqs->chunk(ceil($service->faqs->count()/2)) as $chunkIndex => $chunk)
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mx-auto">
                                    @foreach($chunk as $faqIndex => $faq)
                                    @php
                                        $globalIndex = $chunkIndex * $chunk->count() + $faqIndex;
                                        $collapseId = 'singleCollapse' . $globalIndex;
                                        $headingId = 'singleHeading' . $globalIndex;
                                    @endphp
                                    <div class="accordion-card @if($loop->last) mb-0 @endif">
                                        <div class="card-header" id="{{ $headingId }}">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#{{ $collapseId }}" aria-expanded="false" aria-controls="{{ $collapseId }}">
                                                <h3 class="text-size-26">{{ $faq->question }}</h3>
                                            </a>
                                        </div>
                                        <div id="{{ $collapseId }}" class="collapse" aria-labelledby="{{ $headingId }}" data-parent="#single_faq_accordion" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">{{ $faq->answer }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endif

@if($relatedServices && $relatedServices->count() > 0)
<div class="padding-rl float-left w-100">
    <section class="float-left w-100 padding-top partners-con padding-bottom position-relative main-box br-50 bg-sky">
        <div class="main-container">
            <div class="heading-title-con text-center">
                <span class="special-text d-block">Related Services</span>
                <h2 class="text-size-60">More Services</h2>
                <p>Explore our other professional roofing services.</p>
            </div>
            <div class="row">
                @foreach($relatedServices as $related)
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="main-service-box w-100 position-relative">
                        <div class="position-relative">
                            <figure><img src="{{ asset($related->image ? 'img/'.$related->image : 'assets/images/main-services-img1.jpg') }}" alt="{{ $related->title }}" class="img-fluid"></figure>
                        </div>
                        <div class="inner-service">
                            <h3 class="text-size-26 font-weight-700">{{ $related->title }}</h3>
                            @if($related->short_description)
                            <p>{{ Str::limit($related->short_description, 80) }}</p>
                            @endif
                            <a href="{{ route('home.service-detail', $related->slug) }}" class="d-inline-block read-more-link">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endif

<div class="padding-rl float-left w-100">
    <section class="float-left w-100 position-relative book-now-con main-box br-50 bg-lemon">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="heading-title-con mb-0">
                    <span class="special-text d-block">Book Now</span>
                    <h2 class="text-size-120 text-blue">Start Your Roofing.</h2>
                    <p class="text-blue">Fast, reliable roofing service you can trust—personally handled from start to finish.</p>
                    <a href="{{ route('home.contact-us') }}" class="font-weight-bold secondary_btn d-inline-block">
                        Get a Quote <span><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                    </a>
                    <a href="{{ route('home.contact-us') }}" class="font-weight-bold elementary_btn d-inline-block">
                        Call Me Now <span><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                    </a>
                </div>
            </div>
            <div class="book-now-img">
                <figure><img src="{{ asset('assets/images/book-now-vector.png') }}" alt="book now house"></figure>
                <figure><img src="{{ asset('assets/images/mustard-elipse.png') }}" alt="elipse shape" class="img-fluid position-absolute elipse"></figure>
            </div>
        </div>
    </section>
</div>

<div class="padding-rl float-left overflow-hidden w-100">
    <section class="float-left w-100 newsletter-con position-relative main-box br-50 bg-blue">
        <div class="main-container">
            <div class="d-flex justify-content-between">
                <div class="newsletter-img-con">
                    <figure><img src="{{ asset('assets/images/footer-vector.png') }}" alt=""></figure>
                </div>
                <div class="newsletter-content-con">
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
@endsection