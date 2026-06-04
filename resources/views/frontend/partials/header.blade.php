<div class="padding-rl float-left w-100">
    <div class="home-outer-wrapper float-left w-100 position-relative main-box">
        <div class="wrapper1605">
            <header class="w-100 float-left header-con position-relative main-box">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <figure class="mb-0">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo-icon">
                        </figure>
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item mr-0">
                                <a class="nav-link p-0 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-0 {{ request()->routeIs('home.about*') ? 'active' : '' }}" href="{{ route('home.about-us') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-0 {{ request()->routeIs('home.services') || request()->routeIs('home.service-detail') ? 'active' : '' }}" href="{{ route('home.services') }}">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-0 {{ request()->routeIs('home.gallery') ? 'active' : '' }}" href="{{ route('home.gallery') }}">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-0 {{ request()->routeIs('home.testimonials') ? 'active' : '' }}" href="{{ route('home.testimonials') }}">Testimonials</a>
                            </li>
                        </ul>
                    </div>
                    <div class="header-contact">
                        <ul class="list-unstyled mb-0 d-flex align-items-center">
                            <li class="d-inline-block"><a href="{{ route('home.contact-us') }}" class="contact-btn d-inline-block">
                                    Book Inspection <figure><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow">
                                    </figure></a>
                            </li>
                            <li class="d-flex align-items-center position-relative">
                                <figure class="header-phone mb-0">
                                    <img src="{{ asset('assets/images/call-icon.png') }}" alt="call-icon"
                                        class="img-fluid d-inline-block">
                                </figure>
                                <div>
                                    <a href="tel:+568925896325" class="text-decoration-none cell-no">
                                        <span class="number d-inline-block urbanist-font">+5689 2589 6325</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
        </div>
    </div>
</div>
