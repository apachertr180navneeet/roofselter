@extends('frontend.layouts.app')

@section('title', 'Roofora — Roofing & Construction Services HTML Template')

@section('content')
<div class="padding-rl float-left w-100">
    <div class="home-outer-wrapper float-left w-100 position-relative main-box">
        <section class="float-left w-100 position-relative banner-con br-50 main-box">
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
                            <h1 class="text-size-120">Roofing <br> Solutions for <br> Every Home.</h1>
                            <p class="text-white">Fast leak fixes, small repairs, and honest re-roofs. You'll deal with me <br> personally, from inspection to the final sweep.</p>
                            <a href="{{ route('home.contact-us') }}" class="font-weight-bold secondary_btn d-inline-block">
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
                    <figure class=""><img src="{{ asset('assets/images/about-img.jpg') }}" alt="about image" class="img-fluid br-40"></figure>
                    <figure class="position-absolute z-1 about-vector"><img src="{{ asset('assets/images/about-vector.png') }}" alt="about vector" class="img-fluid"></figure>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">
                <div class="about-content-con d-flex justify-content-between">
                    <div class="heading-title-con mb-0">
                        <span class="special-text d-block">About</span>
                        <h2 class="text-size-60">Proven Roofing <br> Experience You Can <br> See in Every Detail</h2>
                        <p>I'm Jake Morales, a Melbourne roofer with 18+ years on ladders, not behind <br> a desk. Unlike the big companies, I handle your inspection, your quote, <br> and the repair—start to finish.</p>
                        <p class="last-text">In Texas, the state doesn't issue roofing licenses, but I maintain all <br> necessary city registrations & follow building codes to the letter.</p>
                        <a href="{{ route('home.services') }}" class="text-decoration-none secondary_btn d-inline-block mt-auto">See My Insurance & References <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span></a>
                        <div class="users-details-con">
                            <div class="user-detrail-box pl-0">
                                <span class="d-inline-block counter">500</span><span class="d-inline-block alphabet">+</span>
                                <p class="mb-0 text-black">Jobs Done</p>
                            </div>
                            <div class="user-detrail-box">
                                <span class="d-inline-block counter">95</span><span class="d-inline-block alphabet">+</span>
                                <p class="mb-0 text-black">Roofing Awards</p>
                            </div>
                            <div class="user-detrail-box border-right-0">
                                <span class="d-inline-block counter">100</span><span class="d-inline-block alphabet">%</span>
                                <p class="mb-0 text-black">Client Satisfaction</p>
                            </div>
                        </div>
                    </div>
                    <div class="about-right-side-con d-flex flex-column justify-content-between position-relative align-items-end">
                        <figure class="about-logo"><img src="{{ asset('assets/images/about-logo.png') }}" alt="about logo" class="img-fluid"></figure>
                        <div class="about-bottom-img-con br-40">
                            <figure><img src="{{ asset('assets/images/about-icon.png') }}" alt="about icon" class="img-fluid"></figure>
                            <div class=""><span class="oswald-font d-inline-block text-white counter">18</span><span class="d-inline-block text-accent alphabet">+</span></div>
                            <p>Years Experience <br> on Ladders</p>
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
                <div class="custom-card">
                    <img src="{{ asset('assets/images/services-img1.jpg') }}" alt="services image" class="img-fluid">
                    <div class="overlay">
                        <figure><img src="{{ asset('assets/images/service-icon1.png') }}" alt="service icon" class="img-fluid"></figure>
                        <h3>Residential Roofing</h3>
                        <p class="mb-0">Keep your roof in top condition with our expert repair and maintenance services.</p>
                    </div>
                    <a href="{{ route('home.services') }}" class="text-decoration-none secondary_btn d-inline-block mt-auto">Book Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span></a>
                </div>
                <div class="custom-card">
                    <img src="{{ asset('assets/images/services-img2.jpg') }}" alt="services image" class="img-fluid">
                    <div class="overlay">
                        <figure><img src="{{ asset('assets/images/service-icon2.png') }}" alt="service icon" class="img-fluid"></figure>
                        <h3>Roof Repairs & Maintenance</h3>
                        <p class="mb-0">Keep your roof in top condition with our expert repair and maintenance services.</p>
                    </div>
                    <a href="{{ route('home.services') }}" class="text-decoration-none secondary_btn d-inline-block mt-auto">Book Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span></a>
                </div>
                <div class="custom-card">
                    <img src="{{ asset('assets/images/services-img3.jpg') }}" alt="services image" class="img-fluid">
                    <div class="overlay">
                        <figure><img src="{{ asset('assets/images/service-icon3.png') }}" alt="service icon" class="img-fluid"></figure>
                        <h3>Commercial Roofing</h3>
                        <p class="mb-0">Keep your roof in top condition with our expert repair and maintenance services.</p>
                    </div>
                    <a href="{{ route('home.services') }}" class="text-decoration-none secondary_btn d-inline-block mt-auto">Book Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span></a>
                </div>
                <div class="custom-card">
                    <img src="{{ asset('assets/images/services-img4.jpg') }}" alt="services image" class="img-fluid">
                    <div class="overlay">
                        <figure><img src="{{ asset('assets/images/service-icon4.png') }}" alt="service icon" class="img-fluid"></figure>
                        <h3>Roof Replacement</h3>
                        <p class="mb-0">Keep your roof in top condition with our expert repair and maintenance services.</p>
                    </div>
                    <a href="{{ route('home.services') }}" class="text-decoration-none secondary_btn d-inline-block mt-auto">Book Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span></a>
                </div>
            </div>
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
                <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">
                    <div class="gallery-box">
                        <a href="{{ asset('assets/images/gallery-img1.jpg') }}" class="gallery-link">
                            <figure class="mb-0"><img src="{{ asset('assets/images/gallery-img1.jpg') }}" alt="gallery" class="img-fluid"></figure>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.05s">
                    <div class="gallery-box">
                        <a href="{{ asset('assets/images/gallery-img2.jpg') }}" class="gallery-link">
                            <figure class="mb-0"><img src="{{ asset('assets/images/gallery-img2.jpg') }}" alt="gallery" class="img-fluid"></figure>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">
                    <div class="gallery-box">
                        <a href="{{ asset('assets/images/gallery-img3.jpg') }}" class="gallery-link">
                            <figure class="mb-0"><img src="{{ asset('assets/images/gallery-img3.jpg') }}" alt="gallery" class="img-fluid"></figure>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">
                    <div class="gallery-box">
                        <a href="{{ asset('assets/images/gallery-img4.jpg') }}" class="gallery-link">
                            <figure class="mb-0"><img src="{{ asset('assets/images/gallery-img4.jpg') }}" alt="gallery" class="img-fluid"></figure>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.05s">
                    <div class="gallery-box">
                        <a href="{{ asset('assets/images/gallery-img5.jpg') }}" class="gallery-link">
                            <figure class="mb-0"><img src="{{ asset('assets/images/gallery-img5.jpg') }}" alt="gallery" class="img-fluid"></figure>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">
                    <div class="gallery-box">
                        <a href="{{ asset('assets/images/gallery-img6.jpg') }}" class="gallery-link">
                            <figure class="mb-0"><img src="{{ asset('assets/images/gallery-img6.jpg') }}" alt="gallery" class="img-fluid"></figure>
                        </a>
                    </div>
                </div>
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
            <div class="col-lg-5 col-md-5">
                <div class="portfolio-box left-img wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                    <figure class=""><img src="{{ asset('assets/images/portfolio-img1.jpg') }}" alt="portfolio" class="img-fluid"></figure>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-inline">
                            <span class="d-inline-block key-tags mr-2">Residential</span>
                            <span class="d-inline-block key-tags">Roof</span>
                            <h3 class="text-size-34">Full Roof Replacement</h3>
                        </div>
                        <a href="#" class=""><img src="{{ asset('assets/images/up-right-lg-arrow.png') }}" alt="arrow" class="border-radius-0 mb-0"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="portfolio-box pt-0 right-img">
                    <figure class=""><img src="{{ asset('assets/images/portfolio-img2.jpg') }}" alt="portfolio" class="img-fluid"></figure>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-inline">
                            <span class="d-inline-block key-tags mr-2">Leak Fix</span>
                            <span class="d-inline-block key-tags">Emergency</span>
                            <h3 class="text-size-34">Storm Damage Roof Repair</h3>
                        </div>
                        <a href="#" class=""><img src="{{ asset('assets/images/up-right-lg-arrow.png') }}" alt="arrow" class="border-radius-0 mb-0"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="portfolio-box left-img">
                    <figure class=""><img src="{{ asset('assets/images/portfolio-img3.jpg') }}" alt="portfolio" class="img-fluid"></figure>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-inline">
                            <span class="d-inline-block key-tags mr-2">Masonry</span>
                            <span class="d-inline-block key-tags">Flashing</span>
                            <h3 class="text-size-34">Brick Chimney Re-flash</h3>
                        </div>
                        <a href="#" class=""><img src="{{ asset('assets/images/up-right-lg-arrow.png') }}" alt="arrow" class="border-radius-0 mb-0"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="portfolio-box pt-0 right-img">
                    <figure class=""><img src="{{ asset('assets/images/portfolio-img4.jpg') }}" alt="portfolio" class="img-fluid"></figure>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-inline">
                            <span class="d-inline-block key-tags mr-2">Premium</span>
                            <span class="d-inline-block key-tags">Materials</span>
                            <h3 class="text-size-34">Shingle Roof Replacement</h3>
                        </div>
                        <a href="#" class=""><img src="{{ asset('assets/images/up-right-lg-arrow.png') }}" alt="arrow" class="border-radius-0 mb-0"></a>
                    </div>
                </div>
            </div>
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
                        <div class="carousel-item">
                            <div class="client-review-box">
                                <figure class="rating-stars">
                                    <img src="{{ asset('assets/images/rating-stars.png') }}" alt="rating-stars">
                                </figure>
                                <p class="review-text">"Outstanding roofing service from start to finish. The team was punctual, highly skilled, and ensured everything was done safely and professionally. My roof looks brand new and the quality of work exceeded expectations."</p>
                            </div>
                        </div>
                        <div class="carousel-item active">
                            <div class="client-review-box">
                                <figure class="rating-stars">
                                    <img src="{{ asset('assets/images/rating-stars.png') }}" alt="rating-stars">
                                </figure>
                                <p class="review-text">"Jake was honest, professional, and hands-on from the first inspection to the final repair. He clearly explained the issue, provided a fair quote, and completed the work exactly as promised. It's rare to find a roofer who actually does the work himself, and that made all the difference."</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="client-review-box">
                                <figure class="rating-stars">
                                    <img src="{{ asset('assets/images/rating-stars.png') }}" alt="rating-stars">
                                </figure>
                                <p class="review-text">"Highly impressed with their construction expertise. They handled everything from roof repairs to structural improvements with precision. The project was completed on time and within budget, with excellent communication throughout."</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="client-review-box">
                                <figure class="rating-stars">
                                    <img src="{{ asset('assets/images/rating-stars.png') }}" alt="rating-stars">
                                </figure>
                                <p class="review-text">"Reliable and professional roofing contractors. They quickly identified the issue, fixed leaks, and reinforced the structure. I feel confident knowing my home is now protected with durable, high-quality workmanship."</p>
                            </div>
                        </div>
                    </div>
                    <ul class="carousel-indicators">
                        <li data-target="#home1_testimonial_slider" data-slide-to="0">
                            <figure class="mb-0">
                                <img src="{{ asset('assets/images/client-img1.jpg') }}" alt="client" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">Jennifer Troyer</p>
                                <span class="d-block">Satisfied Customer</span>
                            </div>
                        </li>
                        <li data-target="#home1_testimonial_slider" data-slide-to="1" class="active">
                            <figure class="mb-0">
                                <img src="{{ asset('assets/images/client-img2.jpg') }}" alt="client" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">Mark Reynolds</p>
                                <span class="d-block">Homeowner</span>
                            </div>
                        </li>
                        <li data-target="#home1_testimonial_slider" data-slide-to="2">
                            <figure class="mb-0">
                                <img src="{{ asset('assets/images/client-img3.jpg') }}" alt="client" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">Lucy Smith</p>
                                <span class="d-block">Satisfied Customer</span>
                            </div>
                        </li>
                        <li data-target="#home1_testimonial_slider" data-slide-to="3">
                            <figure class="mb-0">
                                <img src="{{ asset('assets/images/client-img4.jpg') }}" alt="client" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">John Smith</p>
                                <span class="d-block">Satisfied Client</span>
                            </div>
                        </li>
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
                                    <div class="accordion-card">
                                        <div class="card-header" id="headingOne">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                <h3 class="text-size-26"><span class="d-inline-block sora-font text-light-blue font-weight-600">01</span>Do you handle roof inspections and repairs yourself?</h3>
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#faq_accordion1" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">Yes, our experienced team handles all roof inspections and repairs directly. We carefully assess your roof condition, identify any issues, and provide reliable solutions without outsourcing the work.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-card">
                                        <div class="card-header" id="headingTwo">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <h3 class="text-size-26"><span class="d-inline-block sora-font text-light-blue font-weight-600">02</span>How much does a roof repair typically cost?</h3>
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="show collapse" aria-labelledby="headingTwo" data-parent="#faq_accordion1" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">Most standard roof repairs start at an affordable rate depending on the issue. After a full inspection, we provide a clear and upfront estimate so you know exactly what to expect—no hidden costs.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-card">
                                        <div class="card-header" id="headingThree">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <h3 class="text-size-26"><span class="d-inline-block sora-font text-light-blue font-weight-600">03</span>Do you offer emergency or same-day roofing services?</h3>
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faq_accordion1" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">Yes, we provide emergency and same-day services for urgent roofing problems such as leaks, storm damage, or structural concerns to prevent further damage to your property.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-card mb-0">
                                        <div class="card-header" id="headingFour">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                <h3 class="text-size-26"><span class="d-inline-block sora-font text-light-blue font-weight-600">04</span>Are you fully licensed and properly insured?</h3>
                                            </a>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faq_accordion1" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">Absolutely. We are fully licensed and insured, ensuring all roofing and construction work is completed safely, professionally, and according to industry standards.</p>
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
                <div class="col-lg-6 col-md-8">
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
                    <figure><img src="{{ asset('assets/images/book-now-vector.png') }}" alt="book now house" class="book-now-img1"></figure>
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
