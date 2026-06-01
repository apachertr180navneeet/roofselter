@extends('frontend.layout.app')
@section('content')

       <!--Start Main Slider One-->
        <section class="main-slider-one" id="home">
            <div class="main-slider-one__top-text text-center">
                <div class="border-left"></div>
                <div class="text">
                    <p>Expert Roofing</p>
                </div>
                <div class="border-right"></div>
            </div>
            <div class="main-slider__carousel owl-carousel owl-theme">
                <!--Start Main Slider One Single-->
                @foreach($sliders as $key => $slider)
                <div class="main-slider-one__single">
                    <div class="main-slider-one__bg"
                        style="background-image: url('{{ $slider->banner ? asset('img/'.$slider->banner) : asset('assets/img/placeholder-image-3.jpg') }}');"></div>
                    <div class="container">
                        <div class="main-slider-one__single-inner">
                            <div class="main-slider-one__content">
                                <div class="title-box">
                                    <h2>{{ $slider->title }} <span></span></h2>
                                </div>

                                <div class="text-box">
                                    <p>{{ $slider->short_desc }}</p>
                                </div>

                                <div class="btn-box d-none">
                                    <a class="thm-btn" href="#contact">About Us
                                        <span class="icon-next1"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--End Main Slider One Single-->

            </div>

            <div class="main-slider__form">
                <div class="title-box">
                    <h2>Request A Free Estimate</h2>
                </div>
                

                <!-- Contact Form -->
                <form id="contactForm" action="{{ route('contact.store') }}" method="POST" novalidate>
                    @csrf
                    <div style="position:absolute;left:-9999px;"><input type="text" name="website" tabindex="-1" autocomplete="off"></div>
                    <input type="hidden" name="_form_token" value="{{ encrypt(time()) }}">

                    <div class="form-group">
                        <input type="text" id="username" name="username" placeholder="Your Name" required>
                        <span class="text-danger error-text username_error"></span>
                    </div>

                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Your Email (optional)">
                        <span class="text-danger error-text email_error"></span>
                    </div>

                    <div class="form-group">
                        <input type="text" id="phone" name="phone" placeholder="Phone No." required>
                        <span class="text-danger error-text phone_error"></span>
                    </div>

                    <div class="form-group">
                        <input type="text" name="date" placeholder="Inspection Date" id="datepicker">
                        <span class="text-danger error-text date_error"></span>
                    </div>

                    <div class="form-group">
                        <textarea id="message" name="message" placeholder="Add Your Notes" rows="4" style="padding-top: 8px;height:114px"></textarea>
                        <span class="text-danger error-text message_error"></span>
                    </div>

                    

                    <!-- <div class="form-group">
                        <button type="submit" id="contactSubmit" class="thm-btn">Make An Appointment</button>
                    </div> -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="button-box">
                                <button class="thm-btn" type="submit" id="contactSubmit" data-loading-text="Please wait...">
                                    Make An Appintment <span class="icon-next1"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div id="form-response" class="mt-2"></div>

            </div>
        </section>
        <!--End Main Slider One-->

        <!--Start Features One-->
        <section class="features-one" id="services">
            <div class="container">
                <div class="row">
                    <!--Start Features One Single-->
                    @foreach($services as $key => $service)
                    <div class="col-xl-6 col-lg-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
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
                    @endforeach
                    <!--End Features One Single-->
                </div>
            </div>
        </section>
        <!--End Features One-->

        <!--Start About One-->
        @foreach($abouts as $key => $about)
        <section class="about-one" id="about">
            <div class="container">
                <div class="row">
                    <!--Start About One Img-->
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="about-one__img">
                            <div class="about-one__img-inner">
                                <div class="about-one__img1">
                                    <img src="{{ $about->image ? asset('img/'.$about->image) : asset('assets/img/placeholder-image-3.jpg') }}" alt="">
                                </div>
                            </div>

                            <div class="about-one__counter-box">
                                <div class="icon-box">
                                    <span class="icon-roof-3"></span>
                                </div>

                                <div class="content-box">
                                    <div class="count-box">
                                        <h2 class="count-text" data-stop="9" data-speed="1500">00</h2>
                                        <span class="k">k</span>
                                        <span class="plus">+</span>
                                    </div>
                                    <p>Complete Projects</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End About One Img-->

                    <!--Start About One Content-->
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="about-one__content">
                            <div class="section-title sec-title-animation animation-style2">
                                <div class="section-title__tagline title-animation">
                                    <h4>// About Us //</h4>
                                </div>
                                <h2 class="section-title__title title-animation">{{ $about->title }}</h2>
                            </div>

                            <div class="about-one__content-text">
                                <p>{!! $about->description !!}</p>
                            </div>

                            <div class="about-one__content-list-box d-none">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="about-one__content-list">
                                            <ul>
                                                <li>
                                                    <p><span class="icon-verified"></span> Expert & Professional</p>
                                                </li>

                                                <li>
                                                    <p><span class="icon-verified"></span> Professional Approach</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="about-one__content-list">
                                            <ul>
                                                <li>
                                                    <p><span class="icon-verified"></span> Hight Quality Work</p>
                                                </li>

                                                <li>
                                                    <p><span class="icon-verified"></span> Satisfaction Guarantee</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="about-one__content-btn d-none">
                                <a href="about.html" class="thm-btn">About Us <span class="icon-next1"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--End About One Content-->
                </div>
            </div>
        </section>
        @endforeach
        <!--End About One-->

        <!--Start Service One-->
        <section class="service-one">
            <div class="container">
                <div class="row">
                    <!--Start Service One Content-->
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="service-one__content">
                            <div class="section-title sec-title-animation animation-style2">
                                <h2 class="section-title__title title-animation">Top-Quality Roof Repairs <br> and
                                    Installations
                                </h2>
                            </div>

                            <div class="service-one__content-text">
                                <p>Experience superior roof repairs and installations with our expert <br> team. We use
                                    premium
                                    materials </p>
                            </div>

                            <div class="service-one__content-bottom">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="service-one__single">
                                            <div class="service-one__single-icon">
                                                <span class="icon-roof-4"></span>
                                            </div>
                                            <h2><a href="#">Pure Proof Services</a></h2>
                                            <p>Perfect Proof Services, we take <br> your written content</p>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="service-one__single">
                                            <div class="service-one__single-icon">
                                                <span class="icon-roof-11"></span>
                                            </div>
                                            <h2><a href="#">Prime Proof Editors</a></h2>
                                            <p>Perfect Proof Services, we take <br> your written content</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--End Service One Content-->

                    <!--Start Service One Video-->
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="service-one__video">
                            <div class="service-one__video-img">
                                <img src="{{asset('webtheme/assets/images/services/service-v1-img1.jpg')}}" alt="">

                                <div class="service-one__video-box">
                                    <a href="{{asset('webtheme/assets/images/resources/RoofShelter-video.mp4')}}" class="video-popup">
                                        <div class="service-one__video-icon">
                                            <span class="icon-play-buttton"></span>
                                            <i class="ripple"></i>
                                        </div>
                                    </a>
                                    <span class="border-animation border-1"></span>
                                    <span class="border-animation border-2"></span>
                                    <span class="border-animation border-3"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--End Service One Video-->
                </div>
            </div>
        </section>
        <!--End Service One-->

        <!--Start Projects One-->
        <section class="projects-one" id="projects">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style2">
                    <div class="section-title__tagline title-animation">
                        <h4>// Our Projects //</h4>
                    </div>
                    <h2 class="section-title__title title-animation">Comprehensive Roof Maintenance <br> and Inspections
                    </h2>
                </div>

                <!--Start Projects One Menu Box-->
                <div class="projects-one__menu-box">
                    <ul class="project-filter clearfix post-filter has-dynamic-filters-counter">
                        <li data-filter=".filter-item" class="active"><span class="filter-text"> All</span></li>
                        @foreach($projects_categories as $category)
                            <li data-filter=".{{ Str::slug($category) }}">
                                <span class="filter-text">{{ $category }}</span>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <!--End Projects One Menu Box-->

                <div class="row filter-layout masonary-layout">
                    @foreach($projects as $project)
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item {{ Str::slug($project->category->category_name ?? '') }}">
                            <div class="projects-one__single wow fadeInUp" data-wow-delay="0ms">
                                <div class="projects-one__single-img">
                                    <div class="projects-one__single-icon">
                                        <a class="img-popup" href="{{ asset('img/'.$project->image) }}">
                                            <span class="icon-plus"></span>
                                        </a>
                                    </div>

                                    <div class="projects-one__single-img-inner">
                                        <img src="{{ asset('img/'.$project->image) }}" alt="{{ $project->title }}">
                                    </div>

                                    <div class="projects-one__overlay-content">
                                        <div class="content-box">
                                            <p>{{ $project->category->category_name }}</p>
                                            <h2><a href="#">{{ $project->title }}</a></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
        <!--End Projects One-->

        <!--Start Why Choose Us-->
        @if($why_choose_us->count() > 0)
        <section class="work-process-one" id="why-choose-us">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style2">
                    <div class="section-title__tagline title-animation">
                        <h4>// Why Choose Us //</h4>
                    </div>
                    <h2 class="section-title__title title-animation">Why Choose Sydney Crown Roofing?</h2>
                </div>
                <div class="row mt-4">
                    @foreach($why_choose_us as $item)
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->index * 100 }}ms">
                        <div class="work-process-one__single-tab">
                            <div class="work-process-one__single-tab-inner text-center p-4">
                                @if($item->icon)
                                <div class="icon-box mb-3">
                                    <span class="{{ $item->icon }}" style="font-size: 3rem;"></span>
                                </div>
                                @endif
                                <h3>{{ $item->title }}</h3>
                                @if($item->description)
                                <p class="mt-2">{{ $item->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        <!--End Why Choose Us-->

        <!--Start Team One-->
        <section class="team-one" id="team">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style2">
                    <div class="section-title__tagline title-animation">
                        <h4>// Our Team Member //</h4>
                    </div>
                    <h2 class="section-title__title title-animation">Expert Fast and Reliable Roofing <br> Services
                        Members</h2>
                </div>

                <div class="row">
                    <!--Start Team One Single-->
                    @foreach($team_members as $key => $team)
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="team-one__single">
                            <div class="team-one__single-img">
                                <img src="{{ $team->image ? asset('img/'.$team->image) : asset('assets/img/placeholder-image-3.jpg') }}" alt="#">
                            </div>

                            <div class="team-one__single-content">
                                <h2><a href="#">{{ $team->name }}</a></h2>
                                <p>{{ $team->designation }}</p>

                                <ul class="social-links">
                                    @if($team->instagram_url != null)
                                        <li><a href="{{ $team->instagram_url }}" target="_blank"><span class="icon-instagram"></span></a></li>
                                    @endif
                                    @if($team->linkedin_url != null)
                                        <li><a href="{{ $team->linkedin_url }}" target="_blank"><span class="icon-linkedin"></span></a></li>
                                    @endif
                                    @if($team->twitter_url != null)
                                        <li><a href="{{ $team->twitter_url }}" target="_blank"><span class="icon-twitter"></span></a></li>
                                    @endif
                                    @if($team->facebook_url != null)
                                        <li><a href="{{ $team->facebook_url }}" target="_blank"><span class="icon-facebook-app-symbol"></span></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--End Team One Single-->

                    <!--Start Team One Single-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp d-none" data-wow-delay="200ms">
                        <div class="team-one__single">
                            <div class="team-one__single-img">
                                <img src="{{asset('webtheme/assets/images/team/team-v1-img2.jpg')}}" alt="#">
                            </div>

                            <div class="team-one__single-content">
                                <h2><a href="#">Cameron Williamson</a></h2>
                                <p>Project Manager</p>

                                <ul class="social-links">
                                    <li><a href="#"><span class="icon-instagram"></span></a></li>
                                    <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon-facebook-app-symbol"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End Team One Single-->

                    <!--Start Team One Single-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp d-none" data-wow-delay="300ms">
                        <div class="team-one__single">
                            <div class="team-one__single-img">
                                <img src="{{asset('webtheme/assets/images/team/team-v1-img3.jpg')}}" alt="#">
                            </div>

                            <div class="team-one__single-content">
                                <h2><a href="#">Arlene McCoy</a></h2>
                                <p>Project Manager</p>

                                <ul class="social-links">
                                    <li><a href="#"><span class="icon-instagram"></span></a></li>
                                    <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon-facebook-app-symbol"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End Team One Single-->
                </div>
            </div>
        </section>
        <!--End Team One-->

        <!--Start Before After One-->
        @if($before_after_images->count() > 0)
        <section class="before-after-one" id="before-after">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style2">
                    <div class="section-title__tagline title-animation">
                        <h4>// Before & After //</h4>
                    </div>
                    <h2 class="section-title__title title-animation">See Our Transformation <br> Results</h2>
                </div>
                <div class="row">
                    @foreach($before_after_images as $b4)
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="row g-0">
                                <div class="col-6">
                                    <div class="position-relative">
                                        <img src="{{ asset('img/'.$b4->before_image) }}" class="img-fluid" style="height:200px;width:100%;object-fit:cover;" alt="Before">
                                        <span class="position-absolute bottom-0 start-0 bg-danger text-white px-2 py-1 small">Before</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="position-relative">
                                        <img src="{{ asset('img/'.$b4->after_image) }}" class="img-fluid" style="height:200px;width:100%;object-fit:cover;" alt="After">
                                        <span class="position-absolute bottom-0 end-0 bg-success text-white px-2 py-1 small">After</span>
                                    </div>
                                </div>
                            </div>
                            @if($b4->title || $b4->description)
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $b4->title }}</h5>
                                @if($b4->description)<p class="card-text small text-muted">{{ $b4->description }}</p>@endif
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        <!--End Before After One-->

        <!--Start Testimonials One-->
        <section class="testimonials-one clearfix" id="testimonial">
            <div class="testimonials-one__bg"
                style="background-image: url(webtheme/assets/images/backgrounds/testimonials-v1-bg.jpg);"></div>
            <div class="container">
                <div class="row">
                    <!--Start Testimonials One Img-->
                    <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="testimonials-one__img clearfix">
                            <div class="testimonials-one__img-inner">
                                <img src="{{asset('webtheme/assets/images/testimonial/testimonials-v1-img4.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <!--End Testimonials One Img-->

                    <!--Start Testimonials One Content-->
                    <div class="col-xl-7">
                        <div class="testimonials-one__content">
                            <div class="testimonials-one__carousel owl-carousel owl-theme">

                                <!--Start Testimonials One Single-->
                                @foreach($testimonials as $key => $test)
                                <div class="testimonials-one__single">
                                    <div class="testimonials-one__single-img">
                                        <img src="{{ $test->image ? asset('img/'.$test->image) : asset('assets/img/person-img.png') }}" alt="#">
                                    </div>

                                    <div class="testimonials-one__single-inner">
                                        <div class="shape1"><img src="{{asset('webtheme/assets/images/shapes/testimonials-v1-shape1.png')}}"
                                                alt=""></div>
                                        <div class="testimonials-one__single-author-info">
                                            <h3>{{ $test->name }}</h3>
                                            <p>{{ $test->designation }}</p>

                                            <div class="rating-box">
                                                <i class="star-display mt-3 p-0" data-rating="{{ $test->rating }}"></i>
                                            </div>
                                        </div>

                                        <div class="testimonials-one__single-text">
                                            <p>{!! $test->message !!}</p>
                                            <!-- <p>Perfect Proof Services transformed my documents with their meticulous
                                                attention to detail. Their is the our professionals proo freaders
                                                ensureds
                                                everything was error-free and then polished. Highly recommend for anyone
                                            </p> -->
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!--End Testimonials One Single-->

                            </div>
                        </div>
                    </div>
                    <!--End Testimonials One Content-->
                </div>
            </div>
        </section>
        <!--End Testimonials One-->

        <!--Start Faq One-->
        <section class="faq-one" id="faq">
            <div class="container">
                <div class="row">
                    <!--Start Faq One-->
                    <div class="col-xl-5 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="faq-one__faq">
                            <div class="section-title sec-title-animation animation-style2">
                                <div class="section-title__tagline title-animation">
                                    <h4>// FAQ //</h4>
                                </div>
                                <h2 class="section-title__title title-animation">Do You Have Any <br>
                                    Question Please?</h2>
                            </div>

                            <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion-1">

                                <div class="accrodion active">
                                    <div class="accrodion-title">
                                        <h4>How can I track my shipment?</h4>
                                    </div>

                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>It is recommended to inspect your roof at least twice a year, in the
                                                spring and fall. Signs include</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>How long does a roof replacement?</h4>
                                    </div>

                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>It is recommended to inspect your roof at least twice a year, in the
                                                spring and fall. Signs include</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Why does a roof Install take?</h4>
                                    </div>

                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>It is recommended to inspect your roof at least twice a year, in the
                                                spring and fall. Signs include</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Faq One-->

                    <!--Start Faq One Counter-->
                    <div class="col-xl-7 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="faq-one__counter">
                            <div class="faq-one__counter-text">
                                <p>Their is the our professionals proof feeders ensured to everything <br> was
                                    error-free and then polished. Highly for anyone seeking's top- <br>notch proofing
                                    services provide
                                </p>
                            </div>
                            <div class="faq-one__counter-inner">
                                <div class="row">

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="faq-one__counter-single">
                                            <div class="faq-one__counter-single-icon">
                                                <span class="icon-completion"></span>
                                            </div>

                                            <div class="faq-one__counter-single-content">
                                                <div class="count-box">
                                                    <h2 class="count-text" data-stop="450" data-speed="1500">00</h2>
                                                    <span class="plus">+</span>
                                                </div>

                                                <p>Project Completed</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="faq-one__counter-single">
                                            <div class="faq-one__counter-single-icon">
                                                <span class="icon-costumer"></span>
                                            </div>

                                            <div class="faq-one__counter-single-content">
                                                <div class="count-box">
                                                    <h2 class="count-text" data-stop="370" data-speed="1500">00</h2>
                                                    <span class="plus">+</span>
                                                </div>

                                                <p>Satisfied Client</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="faq-one__counter-single">
                                            <div class="faq-one__counter-single-icon">
                                                <span class="icon-team-1"></span>
                                            </div>

                                            <div class="faq-one__counter-single-content">
                                                <div class="count-box">
                                                    <h2 class="count-text" data-stop="100" data-speed="1500">00</h2>
                                                    <span class="plus">+</span>
                                                </div>

                                                <p>Team Member</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="faq-one__counter-single">
                                            <div class="faq-one__counter-single-icon">
                                                <span class="icon-trophy"></span>
                                            </div>

                                            <div class="faq-one__counter-single-content">
                                                <div class="count-box">
                                                    <h2 class="count-text" data-stop="10" data-speed="1500">00</h2>
                                                    <span class="plus">+</span>
                                                </div>

                                                <p>Year Experience</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Faq One Counter-->
                </div>
            </div>
        </section>
        <!--End Faq One-->

        <!--Start Newsletter One-->
        <section class="newsletter-one d-none">
            <div class="container">
                <div class="newsletter-one__inner">
                    <div class="newsletter-one__content text-center sec-title-animation animation-style2">
                        <h2 class="title-animation">Subscribe to Our Newsletter</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable <br> content
                            of a page when looking at its layout</p>
                    </div>
                    <div class="newsletter-one__form">
                        <form class="newsletter-form" action="#">
                            <input type="email" name="email" placeholder="Enter Your Email">
                            <button type="submit" class="thm-btn">Subscribe Now <span
                                    class="icon-next1"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--End Newsletter One-->

        <!--Start Blog One-->
        <section class="blog-one d-none" id="blog">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style2">
                    <div class="section-title__tagline title-animation">
                        <h4>// Latest News //</h4>
                    </div>
                    <h2 class="section-title__title title-animation">Global Economy Signs of Recovery <br> Latest News
                        Updates</h2>
                </div>

                <div class="row">
                    <!--Start Blog One Single-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img">
                                <div class="blog-one__single-img-inner">
                                    <img src="assets/images/blog/blog-v1-img1.jpg" alt="#">
                                </div>
                                <div class="date-box">
                                    <h4>27 August</h4>
                                </div>
                            </div>

                            <div class="blog-one__single-content">
                                <h2><a href="#">Severe Weather Causes Widespread <br> Damage</a></h2>
                                <div class="btn-box d-none">
                                    <a href="blog-details.html">Read More <span class="icon-next1"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Blog One Single-->

                    <!--Start Blog One Single-->
                    <div class="col-xl-4 col-lg-4 wow fadeInDown" data-wow-delay=".3s">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img">
                                <div class="blog-one__single-img-inner">
                                    <img src="assets/images/blog/blog-v1-img2.jpg" alt="#">
                                </div>
                                <div class="date-box">
                                    <h4>27 August</h4>
                                </div>
                            </div>

                            <div class="blog-one__single-content">
                                <h2><a href="#">Major Sports Event Postponed Due <br> to Health</a></h2>
                                <div class="btn-box d-none">
                                    <a href="blog-details.html">Read More <span class="icon-next1"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Blog One Single-->

                    <!--Start Blog One Single-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img">
                                <div class="blog-one__single-img-inner">
                                    <img src="assets/images/blog/blog-v1-img3.jpg" alt="#">
                                </div>
                                <div class="date-box">
                                    <h4>27 August</h4>
                                </div>
                            </div>

                            <div class="blog-one__single-content">
                                <h2><a href="#">Innovative Startup Disrupts <br> Traditional Market</a>
                                </h2>
                                <div class="btn-box d-none">
                                    <a href="blog-details.html">Read More <span class="icon-next1"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Blog One Single-->
                </div>
            </div>
        </section>
        <!--End Blog One-->

                <!--Start Certifications One-->
        @if(isset($certifications) && $certifications->count() > 0)
        <section class="certifications-one py-5" id="certifications">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style2">
                    <div class="section-title__tagline title-animation"><h4>// Certifications //</h4></div>
                    <h2 class="section-title__title title-animation">Our Certifications & Licenses</h2>
                </div>
                <div class="row justify-content-center">
                    @foreach($certifications as $cert)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center mb-4">
                        <div class="cert-item p-3 bg-white shadow-sm rounded">
                            <img src="{{ asset('img/'.$cert->image) }}" alt="{{ $cert->title }}" class="img-fluid" style="max-height:80px;">
                            @if($cert->title)<p class="small mt-2 mb-0 fw-bold">{{ $cert->title }}</p>@endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        <!--End Certifications One-->

        <!-- Start Contact Page -->
        <section class="contact-page" id="contact">
            <div class="container">
                <div class="row">
                    <!--Start Contact Page Contact Info-->
                    <div class="col-xl-6">
                        <div class="contact-page__contact-info">
                            <div class="title-box">
                                <h2>Contact Information</h2>
                            </div>

                            <div class="contact-page__contact-info-box">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="contact-page__contact-info-single">
                                            <div class="icon-box">
                                                <span class="icon-phone"></span>
                                            </div>
                                            <div class="content-box">
                                                <h3>Phone Number :</h3>
                                                <p><a href="tel:{{ get_setting('contact_phone', '+61 451873035') }}">{{ get_setting('contact_phone', '+61 451873035') }}</a></p>
                                            </div>
                                        </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="contact-page__contact-info-single">
                                            <div class="icon-box">
                                                <span class="icon-email"></span>
                                            </div>
                                            <div class="content-box">
                                                <h3>Email Address</h3>
                                                <p><a href="mailto:{{ get_setting('contact_email', 'sydneycrownroofingandgutters@gmail.com') }}">{{ get_setting('contact_email', 'sydneycrownroofingandgutters@gmail.com') }}</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="contact-page__contact-info-single">
                                            <div class="icon-box">
                                                <span class="icon-gps"></span>
                                            </div>
                                            <div class="content-box">
                                                <h3>Our Address</h3>
                                                <p>{{ get_setting('contact_address', '79 Governors Way, Macquarie Links NSW 2565, Australia') }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="contact-page__contact-info-single">
                                            <div class="icon-box">
                                                <span class="fa fa-regular fa-clock"></span>
                                            </div>
                                            <div class="content-box">
                                                <h3>Working Hours</h3>
                                                <p>{{ get_setting('contact_hours', 'Monday - Saturday : 9:00 AM - 6:00 PM') }}</p>
                                            </div>
                                        </div>
                                    </div>

                                            <div class="content-box">
                                                <h3>Phone Number :</h3>
                                                <p><a href="tel:+61 451873035">+61 451873035</a></p>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="contact-page__contact-info-single">
                                            <div class="icon-box">
                                                <span class="icon-email"></span>
                                            </div>

                                            <div class="content-box">
                                                <h3>Email Address</h3>
                                                <p><a href="mailto:sydneycrownroofingandgutters@gmail.com">sydneycrownroofingandgutters@gmail.com</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="contact-page__contact-info-single">
                                            <div class="icon-box">
                                                <span class="icon-gps"></span>
                                            </div>

                                            <div class="content-box">
                                                <h3>Our Address</h3>
                                                <p>79 Governors Way, Macquarie Links NSW 2565, Australia</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="contact-page__contact-info-single">
                                            <div class="icon-box">
                                                <span class="fa fa-regular fa-clock"></span>
                                            </div>

                                            <div class="content-box">
                                                <h3>Working Time</h3>
                                                <p>Monday - Saturday : <br>
                                                    9:00 AM - 6:00 PM</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-page__contact-info-bottom mb-5">
                                <div class="text-box">
                                    <h2>Follow The Social Media:</h2>
                                    <p>It is a long established fact that a reader will be distracted readable.
                                    </p>
                                </div>

                                <div class="social-links">
                                    <ul>
                                        @if(get_setting('social_facebook'))<li><a href="{{ get_setting('social_facebook') }}" target="_blank"><span class="icon-facebook-app-symbol"></span></a></li>@endif
                                        @if(get_setting('social_twitter'))<li><a href="{{ get_setting('social_twitter') }}" target="_blank"><span class="icon-twitter"></span></a></li>@endif
                                        @if(get_setting('social_instagram'))<li><a href="{{ get_setting('social_instagram') }}" target="_blank"><span class="icon-instagram"></span></a></li>@endif
                                        @if(get_setting('social_linkedin'))<li><a href="{{ get_setting('social_linkedin') }}" target="_blank"><span class="icon-linkedin"></span></a></li>@endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Contact Page Contact Info-->

                    <!--Start Contact Page Form-->
                    <div class="col-xl-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3308.536270820157!2d150.87039919999998!3d-33.97875679999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12eb7adb766a3b%3A0x6e412e9a45d63c16!2sSydney%20Crown%20Roofing%20and%20Gutters%20%7C%20Roof%20Repair%20Sydney!5e0!3m2!1sen!2sin!4v1778689752441!5m2!1sen!2sin"
                            class="google-map-one__map">
                        </iframe>
                        <div class="contact-page__form d-none">
                            <div class="title-box">
                                <h2>Get In Touch</h2>
                            </div>
                            <form class="contact-form-validated contact-page__form-box"
                                action="https://scriptfusions.mnsithub.com/html/reroof/main-html/assets/inc/sendemail.php" method="post" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="input-box">
                                            <input type="text" name="name" placeholder="Name" required="">
                                            <div class="icon"><span class="fa fa-user"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="input-box">
                                            <input type="email" name="email" placeholder="Email" required="">
                                            <div class="icon"><span class="icon-email"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="input-box">
                                            <input type="text" name="Phone" placeholder="Phone" required="">
                                            <div class="icon"><span class="icon-phone"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="input-box">
                                            <div class="select-box">
                                                <select class="selectmenu wide">
                                                    <option selected="selected">Subject</option>
                                                    <option>Subject 01</option>
                                                    <option>Subject 02</option>
                                                    <option>Subject 03</option>
                                                    <option>Subject 04</option>
                                                    <option>Subject 05</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="input-box">
                                            <textarea name="message" placeholder="Message"></textarea>
                                            <div class="icon style2"><span class="fa fa-pencil"></span></div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="contact-page__form-btn">
                                            <button type="submit" class="thm-btn">
                                                Submit Now <span class="icon-next1"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="result"></div>
                        </div>
                    </div>
                    <!--End Contact Page Form-->
                </div>
            </div>
        </section>
        <!-- End Contact Page -->

@endsection