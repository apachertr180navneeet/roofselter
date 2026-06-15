@extends('frontend.layouts.app')

@section('title', get_setting('cms_testimonials_meta_title', 'Testimonials') . ' | ' . get_setting('website_name', 'RoofShelter'))

@section('content')
<div class="padding-rl float-left w-100">
    <div class="home-outer-wrapper float-left w-100 position-relative main-box">
        <section class="float-left w-100 position-relative sub-banner-con br-50 main-box">
            <div class="main-container">
                <div class="sub-banner-inner-con position-relative z-1">
                    <h1 class="text-white text-size-90">Testimonials</h1>
                    <p class="text-white">Find Clear Answers to Common Questions with Guidance <br> from Our Experts.</p>
                    <div class="breadcrumb-con d-inline-block">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="spacer"></div>

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
                <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @forelse($testimonials as $key => $testimonial)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
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
                                <p class="review-text">"Outstanding roofing service from start to finish. The team was punctual, highly skilled, and ensured everything was done safely and professionally. My roof looks brand new and the quality of work exceeded expectations."</p>
                            </div>
                        </div>
                        <div class="carousel-item">
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
                        @endforelse
                    </div>

                    <ul class="carousel-indicators">
                        @forelse($testimonials as $key => $testimonial)
                        <li data-target="#testimonial_slider" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
                            <figure class="mb-0">
                                <img src="{{ asset($testimonial->image ? 'img/'.$testimonial->image : 'assets/images/client-img'.($key + 1).'.jpg') }}" alt="{{ $testimonial->name }}" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">{{ $testimonial->name }}</p>
                                <span class="d-block">{{ $testimonial->designation ?? 'Satisfied Customer' }}</span>
                            </div>
                        </li>
                        @empty
                        <li data-target="#testimonial_slider" data-slide-to="0">
                            <figure class="mb-0">
                                <img src="{{ asset('assets/images/client-img1.jpg') }}" alt="client" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">Jennifer Troyer</p>
                                <span class="d-block">Satisfied Customer</span>
                            </div>
                        </li>
                        <li data-target="#testimonial_slider" data-slide-to="1" class="active">
                            <figure class="mb-0">
                                <img src="{{ asset('assets/images/client-img2.jpg') }}" alt="client" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">Mark Reynolds</p>
                                <span class="d-block">Homeowner</span>
                            </div>
                        </li>
                        <li data-target="#testimonial_slider" data-slide-to="2">
                            <figure class="mb-0">
                                <img src="{{ asset('assets/images/client-img3.jpg') }}" alt="client" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">Lucy Smith</p>
                                <span class="d-block">Satisfied Customer</span>
                            </div>
                        </li>
                        <li data-target="#testimonial_slider" data-slide-to="3">
                            <figure class="mb-0">
                                <img src="{{ asset('assets/images/client-img4.jpg') }}" alt="client" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">John Smith</p>
                                <span class="d-block">Satisfied Client</span>
                            </div>
                        </li>
                        @endforelse
                    </ul>

                    <div class="pagination-outer">
                        <a class="carousel-control-prev" href="#testimonial_slider" role="button" data-slide="prev">
                            <i class="prev-arrow fa-solid fa-arrow-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#testimonial_slider" role="button" data-slide="next">
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
<div class="spacer"></div>

<section class="float-left w-100 service-location-con position-relative padding-top padding-bottom main-box">
    <div class="main-container">
        <div class="heading-title-con text-center">
            <span class="special-text d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">{{ get_setting('cms_testimonials_regions_subtitle', 'Service Locations') }}</span>
            <h2 class="text-size-60 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">{!! nl2br(e(get_setting('cms_testimonials_regions_heading', 'Service Regions Across the Phoenix Area'))) !!}</h2>
            <p>{{ get_setting('cms_testimonials_regions_description', 'Full mobilization available across the Phoenix Metropolitan Area.') }}</p>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-5">
                        <div class="location-wrapper">
                            @forelse($locations as $loc)
                            <div class="location-box{{ $loop->first ? ' active' : '' }}">
                                <figure class="icon-box">
                                    <img src="{{ asset('assets/images/map-icon.png') }}" alt="marker" class="img-fluid">
                                </figure>
                                <span>{{ $loc->name }}</span>
                            </div>
                            @empty
                            <div class="location-box active">
                                <figure class="icon-box">
                                    <img src="{{ asset('assets/images/map-icon.png') }}" alt="marker" class="img-fluid">
                                </figure>
                                <span>Phoenix</span>
                            </div>
                            @endforelse
                        </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="map-container position-relative z-1">
                    <figure><img src="{{ asset('assets/images/location-icon.png') }}" alt="location-img" class="img-fluid"></figure>
                    @php
                        $mapVal = get_setting('google_maps_embed');
                        if ($mapVal && preg_match('/src="([^"]+)"/', $mapVal, $m)) {
                            $mapVal = $m[1];
                        }
                        $defaultMap = 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3329.0347949550764!2d-112.074!3d33.4484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzPCsDI2JzU0LjIiTiAxMTLCsDA0JzI2LjQiVw!5e0!3m2!1sen!2s!4v1774432584918!5m2!1sen!2s';
                    @endphp
                    <iframe src="{{ $mapVal ?: $defaultMap }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

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
