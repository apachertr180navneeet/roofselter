        <header class="main-header main-header-two">
            <nav class="main-menu">
                <div class="main-menu__wrapper">
                    <div class="container">
                        <div class="main-menu__wrapper-inner">
                            <div class="main-menu__left">
                                <div class="main-menu__logo">
                                    <a href="{{route('home')}}"><img src="{{ asset(get_setting('system_logo_white') ? 'img/'.get_setting('system_logo_white') : 'webtheme/assets/images/resources/RoofShelter-Logo1.jpg') }}" alt=""></a>
                                </div>
                            </div>

                            <div class="main-menu__main-menu-box">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>

                                <ul class="main-menu__list one-page-scroll-menu">
                                    <li>
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="{{ route('home.services') }}">Services</a>
                                        <ul>
                                            <li><a href="{{ route('home.services') }}">All Services</a></li>
                                            <li><a href="{{ route('home.service-detail', 'roof-repairs') }}">Roof Repairs</a></li>
                                            <li><a href="{{ route('home.service-detail', 'roof-restorations') }}">Roof Restorations</a></li>
                                            <li><a href="{{ route('home.service-detail', 'new-roof-installation') }}">New Roof Installation</a></li>
                                            <li><a href="{{ route('home.pricing') }}">Pricing</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.about') }}">About</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="{{ route('home.projects') }}">Projects</a>
                                        <ul>
                                            <li><a href="{{ route('home.projects') }}">Our Projects</a></li>
                                            <li><a href="{{ route('home.gallery') }}">Gallery</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.team') }}">Team</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.testimonials') }}">Testimonials</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">More</a>
                                        <ul>
                                            <li><a href="{{ route('home.faq') }}">FAQ</a></li>
                                            <li><a href="{{ route('home.contact-us') }}">Contact</a></li>
                                            <li><a href="{{ route('home.become-a-partner') }}">Become a Partner</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="main-menu__right">
                                <div class="main-menu__search d-none">
                                    <a href="#"><span
                                            class="searcher-toggler-box icon-search-interface-symbol"></span></a>
                                </div>

                                <div class="main-menu__btn">
                                    <a href="{{ route('home.contact-us') }}" class="thm-btn">Get a quote <span
                                            class="icon-next1"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->