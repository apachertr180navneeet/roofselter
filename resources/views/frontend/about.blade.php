@extends('frontend.layouts.app')

@section('title', 'About Us | Roofora — Roofing & Construction Services')

@section('content')
<div class="padding-rl float-left w-100">
    <div class="home-outer-wrapper float-left w-100 position-relative main-box">
        <section class="float-left w-100 position-relative sub-banner-con br-50 main-box">
            <div class="main-container">
                <div class="sub-banner-inner-con position-relative z-1">
                    <h1 class="text-white text-size-90">About Us</h1>
                    <p class="text-white">More than labor, we provide project assurance. Roofora is a B2B general
                        <br>
                        contractor for high-velocity commercial and industrial projects.</p>
                    <div class="breadcrumb-con d-inline-block">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="spacer"></div>

@php $about = $abouts->first(); @endphp

<section class="float-left w-100 position-relative about-con padding-top padding-bottom main-box about-con2"
    id="about">
    <div class="main-container">
        <div class="row">
            <div class="col-lg-5 col-md-12 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">
                <div class="about-content-con position-relative p-0">
                    <div class="heading-title-con">
                        <span class="special-text d-block">About</span>
                        <h2 class="text-size-60">{{ $about->title ?? 'Built for High-Velocity Projects' }}</h2>
                        <p>{{ $about->description ?? 'We operate with the speed, structure, and accountability required for demanding commercial and industrial environments.' }}</p>
                    </div>
                    <figure><img src="{{ asset($about && $about->image ? 'img/'.$about->image : 'assets/images/about-img3.jpg') }}" alt="about image" class="img-fluid br-40"></figure>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">
                <div class="about-img-con position-relative about2-img-con">
                    <div class="position-relative">
                        <figure><img src="{{ asset($about && $about->image2 ? 'img/'.$about->image2 : 'assets/images/about-img4.jpg') }}" alt="about image" class="img-fluid br-40"></figure>
                        <figure class="about2-logo"><img src="{{ asset('assets/images/about-logo2.png') }}" alt="about image" class="img-fluid"></figure>
                    </div>
                    <p class="mb-0">{{ $about->description2 ?? 'From preconstruction through closeout, we focus on efficiency, safety, and consistent performance.' }}</p>
                    <div class="users-details-con">
                        <div class="user-detrail-box pl-0">
                            <span class="d-inline-block counter">{{ $about->counter1_number ?? '500' }}</span><span class="d-inline-block alphabet">+</span>
                            <p class="mb-0 text-black">{{ $about->counter1_label ?? 'Jobs Done' }}</p>
                        </div>
                        <div class="user-detrail-box">
                            <span class="d-inline-block counter">{{ $about->counter2_number ?? '95' }}</span><span class="d-inline-block alphabet">+</span>
                            <p class="mb-0 text-black">{{ $about->counter2_label ?? 'Roofing Awards' }}</p>
                        </div>
                        <div class="user-detrail-box">
                            <span class="d-inline-block counter">{{ $about->counter3_number ?? '100' }}</span><span class="d-inline-block alphabet">%</span>
                            <p class="mb-0 text-black">{{ $about->counter3_label ?? 'Client Satisfaction' }}</p>
                        </div>
                        <div class="user-detrail-box border-right-0">
                            <span class="d-inline-block counter">{{ $about->counter4_number ?? '240' }}</span><span class="d-inline-block alphabet">+</span>
                            <p class="mb-0 text-black">{{ $about->counter4_label ?? 'Site Installers' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="padding-rl float-left w-100">
    <section class="float-left w-100 cta-con position-relative main-box br-50 text-center">
        <figure><img src="{{ asset('assets/images/cta-vector.png') }}" alt="house vector" class="position-absolute cta-vector">
        </figure>
        <div class="main-container">
            <div class="heading-title-con mb-0 position-relative">
                <span class="special-text text-white d-block wow fadeInLeft" data-wow-duration="2s"
                    data-wow-delay="0.05s">Quote Request</span>
                <h2 class="text-size-60 text-white wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">
                    Planning a
                    Re-Roof?</h2>
                <p class="text-white wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Small re-roofs
                    (garages/porches) start at <span class="text-accent d-inline-block">$385/sq</span>
                    (Materials +
                    Labor).</p>
                <a href="{{ route('home.contact-us') }}" class="secondary_btn d-inline-block wow fadeInUp" data-wow-duration="2s"
                    data-wow-delay="0.05s">
                    Request Full Quote <span class=""><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon"
                            class="img-fluid d-inline-block"></span>
                </a>
            </div>
        </div>
    </section>
</div>
<div class="spacer"></div>

<div class="padding-rl float-left w-100">
    <section
        class="float-left w-100 our-team-con padding-top padding-bottom position-relative main-box bg-sky br-50">
        <div class="main-container">
            <div class="heading-title-con text-center">
                <span class="special-text d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Our
                    Team</span>
                <h2 class="text-size-60 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">Meet The
                    Experts Team <br>
                    Behind Us</h2>
                <p>Every project starts with the right people clear roles, shared standards, and no surprises.</p>
            </div>
            <div class="row all_row">
                @forelse($team_members as $key => $member)
                @php $delays = ['0.05s', '0.5s', '0.6s', '0.7s']; @endphp
                <div class="col-lg-3 col-md-6 all_column wow fadeInUp" data-wow-duration="2s" data-wow-delay="{{ $delays[$key % 4] }}">
                    <div class="team-box text-center position-relative all_boxes">
                        <figure><img src="{{ asset($member->image ? 'img/'.$member->image : 'assets/images/team-person'.(($key % 4) + 1).'.jpg') }}" alt="{{ $member->name }}" class="img-fluid"></figure>
                        <h3 class="text-size-22">{{ $member->name }}</h3>
                        <span class="designation text-color d-block">{{ $member->designation }}</span>
                        <ul class="list-unstyled p-0 mb-0">
                            @if($member->facebook_url)<li class="d-inline-block"><a href="{{ $member->facebook_url }}" class="ml-0" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a></li>@endif
                            @if($member->instagram_url)<li class="d-inline-block"><a href="{{ $member->instagram_url }}" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a></li>@endif
                            @if($member->linkedin_url)<li class="d-inline-block"><a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin"></i></a></li>@endif
                            @if($member->twitter_url)<li class="d-inline-block"><a href="{{ $member->twitter_url }}" target="_blank" rel="noopener"><i class="fa-brands fa-twitter"></i></a></li>@endif
                        </ul>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>No team members available at the moment.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
<div class="spacer"></div>

<div class="padding-rl float-left w-100">
    <section
        class="testimonials-con w-100 float-left padding-top padding-bottom position-relative main-box text-center br-50">
        <figure>
            <img src="{{ asset('assets/images/left-quote.png') }}" alt="quote" class="position-absolute left-quote">
        </figure>
        <figure>
            <img src="{{ asset('assets/images/right-quote.png') }}" alt="quote" class="position-absolute right-quote">
        </figure>
        <div class="main-container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
            <div class="heading-title-con text-center"><span class="special-text d-block wow fadeInLeft"
                    data-wow-duration="2s" data-wow-delay="0.05s">Client Reviews</span>
                <h2 class="text-size-60 wow fadeInRight mb-0" data-wow-duration="2s" data-wow-delay="0.05s">
                    Real Feedback From <br>
                    Real Clients
                </h2>
            </div>
            <div class="client-review-slider-inner-con wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div id="about_testimonial_slider" class="carousel slide" data-ride="carousel">
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
                        <li data-target="#about_testimonial_slider" data-slide-to="{{ $key }}" class="{{ $key === 1 ? 'active' : '' }}">
                            <figure class="mb-0">
                                <img src="{{ asset($testimonial->image ? 'img/'.$testimonial->image : 'assets/images/client-img'.(($key % 4) + 1).'.jpg') }}" alt="{{ $testimonial->name }}" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">{{ $testimonial->name }}</p>
                                <span class="d-block">{{ $testimonial->designation ?? 'Satisfied Customer' }}</span>
                            </div>
                        </li>
                        @empty
                        <li data-target="#about_testimonial_slider" data-slide-to="0" class="active">
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
                        <a class="carousel-control-prev" href="#about_testimonial_slider" role="button" data-slide="prev">
                            <i class="prev-arrow fa-solid fa-arrow-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#about_testimonial_slider" role="button" data-slide="next">
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
                        <div id="about_faq_accordion">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mx-auto">
                                    @forelse($faqs as $key => $faq)
                                    @php $isSecond = ($key === 1); @endphp
                                    <div class="accordion-card @if($loop->last) mb-0 @endif">
                                        <div class="card-header" id="aboutHeading{{ $key }}">
                                            <a href="#" class="btn btn-link {{ $isSecond ? '' : 'collapsed' }}" data-toggle="collapse" data-target="#aboutCollapse{{ $key }}" aria-expanded="{{ $isSecond ? 'true' : 'false' }}" aria-controls="aboutCollapse{{ $key }}">
                                                <h3 class="text-size-26"><span class="d-inline-block sora-font text-light-blue font-weight-600">{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</span>{{ $faq->question }}</h3>
                                            </a>
                                        </div>
                                        <div id="aboutCollapse{{ $key }}" class="collapse {{ $isSecond ? 'show' : '' }}" aria-labelledby="aboutHeading{{ $key }}" data-parent="#about_faq_accordion" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">{{ $faq->answer }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="accordion-card mb-0">
                                        <div class="card-header" id="aboutHeadingEmpty">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#aboutCollapseEmpty">
                                                <h3 class="text-size-26">No FAQs available</h3>
                                            </a>
                                        </div>
                                        <div id="aboutCollapseEmpty" class="collapse" data-parent="#about_faq_accordion">
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
