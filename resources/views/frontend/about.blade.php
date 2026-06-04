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

<section class="float-left w-100 position-relative about-con padding-top padding-bottom main-box about-con2"
    id="about">
    <div class="main-container">
        <div class="row">
            <div class="col-lg-5 col-md-12 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">
                <div class="about-content-con position-relative p-0">
                    <div class="heading-title-con">
                        <span class="special-text d-block">About</span>
                        <h2 class="text-size-60">
                            Built for High-
                            Velocity Projects</h2>
                        <p>We operate with the speed, structure, and accountability required
                            for demanding commercial and industrial environments. Our teams
                            are trained to mobilize quickly, coordinate seamlessly with project
                            stakeholders, & execute scopes without disrupting schedules.</p>
                    </div>
                    <figure class=""><img src="{{ asset('assets/images/about-img3.jpg') }}" alt="about image"
                            class="img-fluid br-40">
                    </figure>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">
                <div class="about-img-con position-relative about2-img-con">
                    <div class="position-relative">
                        <figure class=""><img src="{{ asset('assets/images/about-img4.jpg') }}" alt="about image"
                                class="img-fluid br-40">
                        </figure>
                        <figure class="about2-logo"><img src="{{ asset('assets/images/about-logo2.png') }}" alt="about image"
                                class="img-fluid">
                        </figure>
                    </div>
                    <p class="mb-0">From preconstruction through closeout, we focus on efficiency, safety, and
                        consistent performance—so your project keeps moving forward without
                        compromise.</p>
                    <div class="users-details-con">
                        <div class="user-detrail-box pl-0">
                            <span class="d-inline-block counter">500</span><span
                                class="d-inline-block alphabet">+</span>
                            <p class="mb-0 text-black">Jobs Done</p>
                        </div>
                        <div class="user-detrail-box">
                            <span class="d-inline-block counter">95</span><span
                                class="d-inline-block alphabet">+</span>
                            <p class="mb-0 text-black">Roofing Awards</p>
                        </div>
                        <div class="user-detrail-box">
                            <span class="d-inline-block counter">100</span><span
                                class="d-inline-block alphabet">%</span>
                            <p class="mb-0 text-black">Client Satisfaction</p>
                        </div>
                        <div class="user-detrail-box border-right-0">
                            <span class="d-inline-block counter">240</span><span
                                class="d-inline-block alphabet">+</span>
                            <p class="mb-0 text-black">Site Installers</p>
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
                <div class="col-lg-3 col-md-6 all_column wow fadeInUp" data-wow-duration="2s"
                    data-wow-delay="0.05s">
                    <div class="team-box text-center position-relative all_boxes">
                        <figure><img src="{{ asset('assets/images/team-person1.jpg') }}" alt="team" class="img-fluid">
                        </figure>
                        <h3 class="text-size-22">Aria Bennett </h3>
                        <span class="designation text-color d-block"> Lead Project Manager</span>
                        <ul class="list-unstyled p-0 mb-0">
                            <li class="d-inline-block"><a href="https://www.facebook.com/login/" class="ml-0"><i
                                        class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li class="d-inline-block"><a href="https://www.instagram.com/"><i
                                        class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li class="d-inline-block"><a href="https://www.linkedin.com/"><i
                                        class="fa-brands fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 all_column wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s">
                    <div class="team-box text-center position-relative all_boxes">
                        <figure><img src="{{ asset('assets/images/team-person2.jpg') }}" alt="team" class="img-fluid">
                        </figure>
                        <h3 class="text-size-22">Marcus Langford </h3>
                        <span class="designation text-color d-block">Roofing Supervisor</span>
                        <ul class="list-unstyled p-0 mb-0">
                            <li class="d-inline-block"><a href="https://www.facebook.com/login/" class="ml-0"><i
                                        class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li class="d-inline-block"><a href="https://www.instagram.com/"><i
                                        class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li class="d-inline-block"><a href="https://www.linkedin.com/"><i
                                        class="fa-brands fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 all_column wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                    <div class="team-box text-center position-relative all_boxes">
                        <figure><img src="{{ asset('assets/images/team-person3.jpg') }}" alt="team" class="img-fluid">
                        </figure>
                        <h3 class="text-size-22">Sofia Chen</h3>
                        <span class="designation text-color d-block">Compliance Manager</span>
                        <ul class="list-unstyled p-0 mb-0">
                            <li class="d-inline-block"><a href="https://www.facebook.com/login/" class="ml-0"><i
                                        class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li class="d-inline-block"><a href="https://www.instagram.com/"><i
                                        class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li class="d-inline-block"><a href="https://www.linkedin.com/"><i
                                        class="fa-brands fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 all_column wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.7s">
                    <div class="team-box text-center position-relative all_boxes">
                        <figure><img src="{{ asset('assets/images/team-person4.jpg') }}" alt="team" class="img-fluid">
                        </figure>
                        <h3 class="text-size-22">Daniel Reyes</h3>
                        <span class="designation text-color d-block">Relations Coordinator</span>
                        <ul class="list-unstyled p-0 mb-0">
                            <li class="d-inline-block"><a href="https://www.facebook.com/login/" class="ml-0"><i
                                        class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li class="d-inline-block"><a href="https://www.instagram.com/"><i
                                        class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li class="d-inline-block"><a href="https://www.linkedin.com/"><i
                                        class="fa-brands fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
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
                                <p class="review-text">"Jake was honest, professional, and hands-on from the first inspection to the final repair. He clearly explained the issue, provided a fair quote, and completed the work exactly as promised."</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="client-review-box">
                                <figure class="rating-stars">
                                    <img src="{{ asset('assets/images/rating-stars.png') }}" alt="rating-stars">
                                </figure>
                                <p class="review-text">"Highly impressed with their construction expertise. They handled everything from roof repairs to structural improvements with precision. The project was completed on time and within budget."</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="client-review-box">
                                <figure class="rating-stars">
                                    <img src="{{ asset('assets/images/rating-stars.png') }}" alt="rating-stars">
                                </figure>
                                <p class="review-text">"Reliable and professional roofing contractors. They quickly identified the issue, fixed leaks, and reinforced the structure. I feel confident knowing my home is now protected."</p>
                            </div>
                        </div>
                    </div>
                    <ul class="carousel-indicators">
                        <li data-target="#about_testimonial_slider" data-slide-to="0">
                            <figure class="mb-0">
                                <img src="{{ asset('assets/images/client-img1.jpg') }}" alt="client" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">Jennifer Troyer</p>
                                <span class="d-block">Satisfied Customer</span>
                            </div>
                        </li>
                        <li data-target="#about_testimonial_slider" data-slide-to="1" class="active">
                            <figure class="mb-0">
                                <img src="{{ asset('assets/images/client-img2.jpg') }}" alt="client" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">Mark Reynolds</p>
                                <span class="d-block">Homeowner</span>
                            </div>
                        </li>
                        <li data-target="#about_testimonial_slider" data-slide-to="2">
                            <figure class="mb-0">
                                <img src="{{ asset('assets/images/client-img3.jpg') }}" alt="client" class="img-fluid">
                            </figure>
                            <div class="name_wrapper">
                                <p class="client-name">Lucy Smith</p>
                                <span class="d-block">Satisfied Customer</span>
                            </div>
                        </li>
                        <li data-target="#about_testimonial_slider" data-slide-to="3">
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
                                    <div class="accordion-card">
                                        <div class="card-header" id="aboutHeadingOne">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#aboutCollapseOne" aria-expanded="false" aria-controls="aboutCollapseOne">
                                                <h3 class="text-size-26"><span class="d-inline-block sora-font text-light-blue font-weight-600">01</span>Do you handle roof inspections and repairs yourself?</h3>
                                            </a>
                                        </div>
                                        <div id="aboutCollapseOne" class="collapse" aria-labelledby="aboutHeadingOne" data-parent="#about_faq_accordion" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">Yes, our experienced team handles all roof inspections and repairs directly. We carefully assess your roof condition, identify any issues, and provide reliable solutions without outsourcing the work.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-card">
                                        <div class="card-header" id="aboutHeadingTwo">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#aboutCollapseTwo" aria-expanded="false" aria-controls="aboutCollapseTwo">
                                                <h3 class="text-size-26"><span class="d-inline-block sora-font text-light-blue font-weight-600">02</span>How much does a roof repair typically cost?</h3>
                                            </a>
                                        </div>
                                        <div id="aboutCollapseTwo" class="show collapse" aria-labelledby="aboutHeadingTwo" data-parent="#about_faq_accordion" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">Most standard roof repairs start at an affordable rate depending on the issue. After a full inspection, we provide a clear and upfront estimate so you know exactly what to expect—no hidden costs.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-card">
                                        <div class="card-header" id="aboutHeadingThree">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#aboutCollapseThree" aria-expanded="false" aria-controls="aboutCollapseThree">
                                                <h3 class="text-size-26"><span class="d-inline-block sora-font text-light-blue font-weight-600">03</span>Do you offer emergency or same-day roofing services?</h3>
                                            </a>
                                        </div>
                                        <div id="aboutCollapseThree" class="collapse" aria-labelledby="aboutHeadingThree" data-parent="#about_faq_accordion" role="region">
                                            <div class="card-body">
                                                <p class="text-left mb-0">Yes, we provide emergency and same-day services for urgent roofing problems such as leaks, storm damage, or structural concerns to prevent further damage to your property.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-card mb-0">
                                        <div class="card-header" id="aboutHeadingFour">
                                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#aboutCollapseFour" aria-expanded="false" aria-controls="aboutCollapseFour">
                                                <h3 class="text-size-26"><span class="d-inline-block sora-font text-light-blue font-weight-600">04</span>Are you fully licensed and properly insured?</h3>
                                            </a>
                                        </div>
                                        <div id="aboutCollapseFour" class="collapse" aria-labelledby="aboutHeadingFour" data-parent="#about_faq_accordion" role="region">
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
