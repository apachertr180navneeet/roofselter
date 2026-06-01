<!--Site Footer Start-->
        <footer class="site-footer">
            <div class="site-footer__pattern"
                style="background-image: url(webtheme/assets/images/pattern/site-footer-v1-pattern.png);"></div>

            <div class="site-footer__top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms">
                            <div class="footer-widget__about">
                                <div class="footer-widget__about-logo">
                                    <a href="{{route('home')}}"><img src="{{ asset(get_setting('system_logo_black') ? 'img/'.get_setting('system_logo_black') : 'webtheme/assets/images/resources/RoofShelter-Logo1.jpg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget__links">
                                <h4 class="footer-widget__title">Quick Links</h4>
                                <ul class="footer-widget__links-list">
                                    <li><a href="{{ route('home') }}#about">About Us</a></li>
                                    <li><a href="{{ route('home.faq') }}">FAQ</a></li>
                                    <li><a href="{{ route('home.pricing') }}">Pricing</a></li>
                                    <li><a href="{{ route('home.gallery') }}">Gallery</a></li>
                                    <li><a href="{{ route('home.blog') }}">Projects</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget__links">
                                <h4 class="footer-widget__title">Services</h4>
                                <ul class="footer-widget__links-list">
                                    <li><a href="#">New roof installation</a></li>
                                    <li><a href="#">Roof restorations</a></li>
                                    <li><a href="#">Gutter cleaning</a></li>
                                    <li><a href="#">Repointing</a></li>
                                    <li><a href="#">Leak identification & repairs</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="250ms">
                            <div class="footer-widget__links">
                                <h4 class="footer-widget__title">Service Areas</h4>
                                <ul class="footer-widget__links-list">
                                    <li><a href="#">Ingleburn & surrounds</a></li>
                                    <li><a href="#">South West Sydney</a></li>
                                    <li><a href="#">Campbelltown</a></li>
                                    <li><a href="#">Liverpool</a></li>
                                    <li><a href="#">Macarthur region</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                            <div class="footer-widget__contact">
                                <h4 class="footer-widget__title">Contact Info</h4>

                                <ul class="footer-widget__contact-list">
                                    <li>
                                        <div class="text">
                                            <p>{{ get_setting('contact_address', '79 Governors Way, Macquarie Links NSW 2565, Australia') }}</p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="text">
                                            <p><a href="tel:{{ get_setting('contact_phone', '+61 451873035') }}">{{ get_setting('contact_phone', '+61 451873035') }}</a></p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="text">
                                            <p><a href="mailto:{{ get_setting('contact_email', 'sydneycrownroofingandgutters@gmail.com') }}">{{ get_setting('contact_email', 'sydneycrownroofingandgutters@gmail.com') }}</a></p>
                                        </div>
                                    </li>
                                    
                                    <li>
                                        <div class="text mt-4">
                                            <pre>ABN      678671880</pre>
                                        </div>
                                    </li>
                                </ul>

                                <div class="footer-widget__contact-social-links">
                                    <a href="https://www.instagram.com/sydneycrownroofingandgutters"><span class="icon-instagram"></span></a>
                                    <a href="#"><span class="icon-linkedin"></span></a>
                                    <a href="#"><span class="icon-twitter"></span></a>
                                    <a href="https://www.facebook.com/profile.php?id=61588821460338"><span class="icon-facebook-app-symbol"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="site-footer__bottom-inner">
                                <div class="site-footer__copyright">
                                    <p class="site-footer__copyright-text">
                                        &copy; {{ date('Y') }} Sydney Crown Roofing and Gutters By
                                        <a target="_blank"
                                            href="https://digigrowinfotech.com">Digi Grow Infotech</a>.
                                        All Rights Reserved.
                                    </p>
                                </div>

                                <div class="site-footer__bottom-menu">
                                    <ul>
                                        <li>
                                            <p><a href="#">Trams & Condition</a></p>
                                        </li>
                                        <li>
                                            <p><a href="#">Privacy Policy</a></p>
                                        </li>
                                        <li>
                                            <p><a href="#contact">Contact Us</a></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer End-->
        
        <style>
            /* From Uiverse.io by Gaurang7717 */ 
            .whatsapp-Btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 65px;
            height: 65px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: fixed;
            overflow: hidden;
            transition-duration: 0.3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: #00d757;
            top: 70%;
            right: 12px;
            z-index: 999;
            }

            .whatsapp-sign {
            width: 100%;
            transition-duration: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            }

            .whatsapp-sign svg {
            width: 35px;
            }

            .whatsapp-sign svg path {
            fill: white;
            }
            .whatsapp-text {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: white;
            font-size: 1.2em;
            font-weight: 600;
            transition-duration: 0.3s;
            }

            .whatsapp-Btn:hover {
            width: 170px;
            border-radius: 40px;
            transition-duration: 0.3s;
            }

            .whatsapp-Btn:hover .whatsapp-sign {
            width: 30%;
            transition-duration: 0.3s;
            padding-left: 15px;
            }

            .whatsapp-Btn:hover .whatsapp-text {
            opacity: 1;
            width: 65%;
            transition-duration: 0.3s;
            padding-right: 10px;
            }
            .whatsapp-Btn:active {
            transform: translate(2px, 2px);
            }

        </style>
        
        <!--call button -->
        <a href="tel:61451873035" class="whatsapp-Btn">
            <div class="whatsapp-sign">
                <svg viewBox="0 0 24 24" fill="white">
                    <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.357 11.357 0 003.58.57 1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57a1 1 0 01-.25 1.02l-2.2 2.2z"/>
                </svg>
            </div>

            <div class="whatsapp-text">Call Us</div>
        </a>
