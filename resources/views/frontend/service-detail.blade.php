@extends('frontend.layouts.app')

@section('title', 'Single Service | Roofora — Roofing & Construction Services')

@section('content')
<div class="padding-rl float-left w-100">
    <div class="home-outer-wrapper float-left w-100 position-relative main-box">
        <section class="float-left w-100 position-relative sub-banner-con br-50 main-box">
            <div class="main-container">
                <div class="sub-banner-inner-con position-relative z-1">
                    <h1 class="text-white text-size-90">Single Service</h1>
                    <p class="text-white">Protect your home with expert residential roofing solutions. From minor <br> repairs to full roof replacements, we handle every job personally...</p>
                    <div class="breadcrumb-con d-inline-block">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('home.services') }}">Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Resedential Roofing</li>
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
            <figure class="single-main-img"><img src="{{ asset('assets/images/single-service-img.jpg') }}" alt="single-service-img" class="img-fluid br-40"></figure>
            <h2 class="text-size-60">Reliable, Expert Residential Roofing</h2>
            <p>Every home is unique, and your roof deserves expert care. Our team provides inspections, repairs, and replacements with quality craftsmanship, durable materials, and no surprises—ensuring your home stays safe and protected for years.</p>
            <p class="mb-xl-4 mb-3">Not sure what your roof needs? Call <a href="tel:+568925896325" class="d-inline-block text-accent font-weight-700"> (+5689 2589 6325)</a> —we'll match you with the right service.</p>
            <h3 class="text-size-30">Shingle Roof Replacement:</h3>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="about-listing-con">
                        <ul class="list-unstyled p-0">
                            <li><i class="fa-solid fa-check"></i>Missing, cracked, or curling shingles</li>
                            <li><i class="fa-solid fa-check"></i>Water stains or leaks inside your home</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="about-listing-con">
                        <ul class="list-unstyled p-0">
                            <li><i class="fa-solid fa-check"></i>Sagging or uneven roof surfaces</li>
                            <li><i class="fa-solid fa-check"></i>Granules from shingles collecting in gutters</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="about-listing-con">
                        <ul class="list-unstyled p-0">
                            <li><i class="fa-solid fa-check"></i>Increased energy bills due to poor insulation</li>
                            <li><i class="fa-solid fa-check"></i>Roof flashing or vent damage</li>
                        </ul>
                    </div>
                </div>
            </div>
            <h3 class="text-size-30">What Our Residential Roofing Covers:</h3>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="about-listing-con">
                        <ul class="list-unstyled p-0">
                            <li><i class="fa-solid fa-check"></i>Comprehensive roof inspections</li>
                            <li><i class="fa-solid fa-check"></i>Minor repairs, shingle replacements</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="about-listing-con">
                        <ul class="list-unstyled p-0">
                            <li><i class="fa-solid fa-check"></i>Full roof replacement using quality</li>
                            <li><i class="fa-solid fa-check"></i>Storm or hail damage repair</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="about-listing-con">
                        <ul class="list-unstyled p-0">
                            <li><i class="fa-solid fa-check"></i>Preventive maintenance to extend roof life</li>
                            <li><i class="fa-solid fa-check"></i>Detailed recommendations and estimates</li>
                        </ul>
                    </div>
                </div>
            </div>
            <p class="text-size-22 font-weight-600 mb-xl-4 mb-3">Schedule Your Residential Roofing Service Today.</p>
            <a href="{{ route('home.contact-us') }}" class="font-weight-bold secondary_btn d-inline-block">
                Book Service Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
            </a>
        </div>
        <div class="row only-images-outer">
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="only-img w-100">
                    <figure><img src="{{ asset('assets/images/single-srvice-img1.jpg') }}" alt="single service"></figure>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="only-img w-100">
                    <figure><img src="{{ asset('assets/images/single-srvice-img2.jpg') }}" alt="single service"></figure>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="only-img w-100">
                    <figure><img src="{{ asset('assets/images/single-srvice-img3.jpg') }}" alt="single service"></figure>
                </div>
            </div>
        </div>
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
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mx-auto">
                                    <div class="accordion-card">
                                        <div class="card-header" id="singleHeadingOne">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#singleCollapseOne" aria-expanded="false" aria-controls="singleCollapseOne">
                                                <h3 class="text-size-26">How do I know if my roof needs repair?</h3>
                                            </a>
                                        </div>
                                        <div id="singleCollapseOne" class="collapse" aria-labelledby="singleHeadingOne" data-parent="#single_faq_accordion" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">Signs like leaks, missing shingles, or visible damage indicate your roof may need repair.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-card">
                                        <div class="card-header" id="singleHeadingTwo">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#singleCollapseTwo" aria-expanded="false" aria-controls="singleCollapseTwo">
                                                <h3 class="text-size-26">Do you offer roof inspections before starting?</h3>
                                            </a>
                                        </div>
                                        <div id="singleCollapseTwo" class="collapse" aria-labelledby="singleHeadingTwo" data-parent="#single_faq_accordion" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">Yes, we provide thorough roof inspections to assess the condition before starting any work.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-card">
                                        <div class="card-header" id="singleHeadingThree">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#singleCollapseThree" aria-expanded="false" aria-controls="singleCollapseThree">
                                                <h3 class="text-size-26">Is your residential roofing work insured?</h3>
                                            </a>
                                        </div>
                                        <div id="singleCollapseThree" class="collapse" aria-labelledby="singleHeadingThree" data-parent="#single_faq_accordion" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">Yes, all our residential roofing services are fully licensed and insured for your safety.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-card mb-0">
                                        <div class="card-header" id="singleHeadingFour">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#singleCollapseFour" aria-expanded="false" aria-controls="singleCollapseFour">
                                                <h3 class="text-size-26">Will roofing work disrupt my daily routine?</h3>
                                            </a>
                                        </div>
                                        <div id="singleCollapseFour" class="collapse" aria-labelledby="singleHeadingFour" data-parent="#single_faq_accordion" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">We work efficiently to minimize disruption and keep your daily routine as smooth as possible.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mx-auto">
                                    <div class="accordion-card">
                                        <div class="card-header" id="singleHeading1">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#singleCollapse1" aria-expanded="false" aria-controls="singleCollapse1">
                                                <h3 class="text-size-26">How long does a roofing project take?</h3>
                                            </a>
                                        </div>
                                        <div id="singleCollapse1" class="collapse" aria-labelledby="singleHeading1" data-parent="#single_faq_accordion" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">Most roofing projects are completed within a few days, depending on size and complexity.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-card">
                                        <div class="card-header" id="singleHeading2">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#singleCollapse2" aria-expanded="false" aria-controls="singleCollapse2">
                                                <h3 class="text-size-26">What roofing materials do you work with?</h3>
                                            </a>
                                        </div>
                                        <div id="singleCollapse2" class="collapse" aria-labelledby="singleHeading2" data-parent="#single_faq_accordion" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">We work with shingles, metal, tiles, and other high-quality roofing materials.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-card">
                                        <div class="card-header" id="singleHeading3">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#singleCollapse3" aria-expanded="false" aria-controls="singleCollapse3">
                                                <h3 class="text-size-26">Can you help with storm or hail damage claims?</h3>
                                            </a>
                                        </div>
                                        <div id="singleCollapse3" class="collapse" aria-labelledby="singleHeading3" data-parent="#single_faq_accordion" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">Yes, we assist with inspections and documentation for storm and hail damage claims.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-card mb-0">
                                        <div class="card-header" id="singleHeading4">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#singleCollapse4" aria-expanded="false" aria-controls="singleCollapse4">
                                                <h3 class="text-size-26">How often should I schedule roof maintenance?</h3>
                                            </a>
                                        </div>
                                        <div id="singleCollapse4" class="collapse" aria-labelledby="singleHeading4" data-parent="#single_faq_accordion" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">It's recommended to schedule roof maintenance at least once a year or after major storms.</p>
                                            </div>
                                        </div>
                                    </div>
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
                <div class="col-lg-6 col-md-6">
                    <div class="heading-title-con mb-0">
                        <span class="special-text d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Book Now</span>
                        <h2 class="text-size-120 text-blue wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">Start Your Roofing.</h2>
                        <p class="text-blue wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Fast, reliable roofing service you can trust—personally handled <br> from start to finish.</p>
                        <a href="{{ route('home.contact-us') }}" class="font-weight-bold secondary_btn d-inline-block wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.05s">
                            Get a Quote <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                        </a>
                        <a href="{{ route('home.contact-us') }}" class="font-weight-bold elementary_btn d-inline-block wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.05s">
                            Call Me Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
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
@endsection
