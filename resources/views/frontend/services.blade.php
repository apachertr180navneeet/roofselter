@extends('frontend.layouts.app')

@section('title', 'Services | Roofora — Roofing & Construction Services')

@section('content')
<div class="padding-rl float-left w-100">
    <div class="home-outer-wrapper float-left w-100 position-relative main-box">
        <section class="float-left w-100 position-relative sub-banner-con br-50 main-box">
            <div class="main-container">
                <div class="sub-banner-inner-con position-relative z-1">
                    <h1 class="text-white text-size-90">Services</h1>
                    <p class="text-white">More than labor we deliver reliable services. Roofora provides expert <br> solutions for fast-paced commercial and industrial projects.</p>
                    <div class="breadcrumb-con d-inline-block">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="spacer"></div>

<div class="padding-rl float-left w-100">
    <section class="float-left w-100 padding-top main-services-con padding-bottom position-relative main-box br-50 bg-sky">
        <div class="main-container">
            <div class="heading-title-con text-center">
                <span class="special-text d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Services</span>
                <h2 class="text-size-60 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">Roofing Services You <br> Can Trust</h2>
                <p class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Every service we offer starts with a clear plan transparent, reliable.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">
                    <div class="main-service-box w-100 position-relative">
                        <div class="position-relative">
                            <figure class="main-service-icon position-absolute"><img src="{{ asset('assets/images/main-service-icon1.png') }}" alt="services icon" class="img-fluid"></figure>
                            <figure><img src="{{ asset('assets/images/main-services-img1.jpg') }}" alt="services image" class="img-fluid"></figure>
                        </div>
                        <div class="inner-service">
                            <h3 class="text-size-26 font-weight-700">Resedential Roofing</h3>
                            <p>Protect your home with expert residential roofing solutions. From minor repairs to full roof replacements, we handle every job personally...</p>
                            <a href="{{ route('home.contact-us') }}" class="font-weight-bold primary_btn d-inline-block">
                                Book Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                            </a>
                            <a href="{{ route('home.services') }}" class="d-inline-block read-more-link">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.05s">
                    <div class="main-service-box w-100 position-relative">
                        <div class="position-relative">
                            <figure class="main-service-icon position-absolute"><img src="{{ asset('assets/images/main-service-icon2.png') }}" alt="services icon" class="img-fluid"></figure>
                            <figure><img src="{{ asset('assets/images/main-services-img2.jpg') }}" alt="services image" class="img-fluid"></figure>
                        </div>
                        <div class="inner-service">
                            <h3 class="text-size-26 font-weight-700">Repairs & Maintenance</h3>
                            <p>Protect your home with expert residential roofing solutions. From minor repairs to full roof replacements, we handle every job personally...</p>
                            <a href="{{ route('home.contact-us') }}" class="font-weight-bold primary_btn d-inline-block">
                                Book Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                            </a>
                            <a href="{{ route('home.services') }}" class="d-inline-block read-more-link">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">
                    <div class="main-service-box w-100 position-relative">
                        <div class="position-relative">
                            <figure class="main-service-icon position-absolute"><img src="{{ asset('assets/images/main-service-icon3.png') }}" alt="services icon" class="img-fluid"></figure>
                            <figure><img src="{{ asset('assets/images/main-services-img3.jpg') }}" alt="services image" class="img-fluid"></figure>
                        </div>
                        <div class="inner-service">
                            <h3 class="text-size-26 font-weight-700">Commercial Roofing</h3>
                            <p>Durable commercial roof replacement solutions designed for reliability, efficiency, and long-term performance on any project.</p>
                            <a href="{{ route('home.contact-us') }}" class="font-weight-bold primary_btn d-inline-block">
                                Book Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                            </a>
                            <a href="{{ route('home.services') }}" class="d-inline-block read-more-link">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">
                    <div class="main-service-box w-100 position-relative">
                        <div class="position-relative">
                            <figure class="main-service-icon position-absolute"><img src="{{ asset('assets/images/main-service-icon4.png') }}" alt="services icon" class="img-fluid"></figure>
                            <figure><img src="{{ asset('assets/images/main-services-img4.jpg') }}" alt="services image" class="img-fluid"></figure>
                        </div>
                        <div class="inner-service">
                            <h3 class="text-size-26 font-weight-700">Roof Replacement</h3>
                            <p>Expert roof replacement services using high-quality materials and skilled craftsmanship to ensure your commercial or residential roof.</p>
                            <a href="{{ route('home.contact-us') }}" class="font-weight-bold primary_btn d-inline-block">
                                Book Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                            </a>
                            <a href="{{ route('home.services') }}" class="d-inline-block read-more-link">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.05s">
                    <div class="main-service-box w-100 position-relative">
                        <div class="position-relative">
                            <figure class="main-service-icon position-absolute"><img src="{{ asset('assets/images/main-service-icon5.png') }}" alt="services icon" class="img-fluid"></figure>
                            <figure><img src="{{ asset('assets/images/main-services-img5.jpg') }}" alt="services image" class="img-fluid"></figure>
                        </div>
                        <div class="inner-service">
                            <h3 class="text-size-26 font-weight-700">Storm Damage Repair</h3>
                            <p>Rapid, expert repairs for roofs damaged by storms, hail, or leaks, quickly preventing further structural damage and fully restoring safety.</p>
                            <a href="{{ route('home.contact-us') }}" class="font-weight-bold primary_btn d-inline-block">
                                Book Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                            </a>
                            <a href="{{ route('home.services') }}" class="d-inline-block read-more-link">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">
                    <div class="main-service-box w-100 position-relative">
                        <div class="position-relative">
                            <figure class="main-service-icon position-absolute"><img src="{{ asset('assets/images/main-service-icon6.png') }}" alt="services icon" class="img-fluid"></figure>
                            <figure><img src="{{ asset('assets/images/main-services-img6.jpg') }}" alt="services image" class="img-fluid"></figure>
                        </div>
                        <div class="inner-service">
                            <h3 class="text-size-26 font-weight-700">Drainage Solutions</h3>
                            <p>Complete gutter installation and maintenance to ensure proper water flow and protect your roof, foundation, and landscaping.</p>
                            <a href="{{ route('home.contact-us') }}" class="font-weight-bold primary_btn d-inline-block">
                                Book Now <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                            </a>
                            <a href="{{ route('home.services') }}" class="d-inline-block read-more-link">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="float-left w-100 service-location-con position-relative padding-top padding-bottom main-box">
    <div class="main-container">
        <div class="heading-title-con text-center">
            <span class="special-text d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Service Locations</span>
            <h2 class="text-size-60 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">Service Regions Across <br> the Phoenix Area</h2>
            <p>Full mobilization available across the Phoenix Metropolitan Area.</p>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="location-wrapper">
                    <div class="location-box">
                        <figure class="icon-box">
                            <img src="{{ asset('assets/images/map-icon.png') }}" alt="marker" class="img-fluid">
                        </figure>
                        <span>Mesa</span>
                    </div>
                    <div class="location-box">
                        <figure class="icon-box">
                            <img src="{{ asset('assets/images/map-icon.png') }}" alt="marker" class="img-fluid">
                        </figure>
                        <span>Scottsdale</span>
                    </div>
                    <div class="location-box active">
                        <figure class="icon-box">
                            <img src="{{ asset('assets/images/map-icon.png') }}" alt="marker" class="img-fluid">
                        </figure>
                        <span>Phoenix</span>
                    </div>
                    <div class="location-box">
                        <figure class="icon-box">
                            <img src="{{ asset('assets/images/map-icon.png') }}" alt="marker" class="img-fluid">
                        </figure>
                        <span>Buckeye</span>
                    </div>
                    <div class="location-box">
                        <figure class="icon-box">
                            <img src="{{ asset('assets/images/map-icon.png') }}" alt="marker" class="img-fluid">
                        </figure>
                        <span>Peoria</span>
                    </div>
                    <div class="location-box">
                        <figure class="icon-box">
                            <img src="{{ asset('assets/images/map-icon.png') }}" alt="marker" class="img-fluid">
                        </figure>
                        <span>Glendale</span>
                    </div>
                    <div class="location-box">
                        <figure class="icon-box">
                            <img src="{{ asset('assets/images/map-icon.png') }}" alt="marker" class="img-fluid">
                        </figure>
                        <span>Goodyear</span>
                    </div>
                    <div class="location-box">
                        <figure class="icon-box">
                            <img src="{{ asset('assets/images/map-icon.png') }}" alt="marker" class="img-fluid">
                        </figure>
                        <span>Gilbert</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="map-container position-relative z-1">
                    <figure><img src="{{ asset('assets/images/location-icon.png') }}" alt="location-img" class="img-fluid"></figure>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3329.0347949550764!2d-112.074!3d33.4484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzPCsDI2JzU0LjIiTiAxMTLCsDA0JzI2LjQiVw!5e0!3m2!1sen!2s!4v1774432584918!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="padding-rl float-left w-100">
    <section class="float-left w-100 padding-top partners-con padding-bottom position-relative main-box br-50 bg-sky">
        <div class="main-container">
            <div class="heading-title-con text-center">
                <span class="special-text d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Partners</span>
                <h2 class="text-size-60 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">Authorized Manufacturer <br> Network</h2>
                <p>Authorized partnerships with trusted manufacturers.</p>
            </div>
            <div class="owl-carousel wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                @foreach (range(1,6) as $i)
                <div class="item">
                    <div class="partner-box text-center">
                        <figure><img src="{{ asset('assets/images/partners-icon'.$i.'.png') }}" alt="partner logo" class="text-center"></figure>
                    </div>
                </div>
                @endforeach
                @foreach (range(1,6) as $i)
                <div class="item">
                    <div class="partner-box text-center">
                        <figure><img src="{{ asset('assets/images/partners-icon'.$i.'.png') }}" alt="partner logo" class="text-center"></figure>
                    </div>
                </div>
                @endforeach
                @foreach (range(1,6) as $i)
                <div class="item">
                    <div class="partner-box text-center">
                        <figure><img src="{{ asset('assets/images/partners-icon'.$i.'.png') }}" alt="partner logo" class="text-center"></figure>
                    </div>
                </div>
                @endforeach
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
@endsection
