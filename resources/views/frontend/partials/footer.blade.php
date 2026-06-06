<div class="padding-rl float-left w-100">
    <div class="float-left w-100 footer-con position-relative main-box br-50">
        <div class="main-container position-relative">
            <div class="middle_portion d-flex align-items-center justify-content-between">
                <div class="logo-content">
                    <a href="{{ url('/') }}" class="footer-logo">
                        <figure class="mb-0"><img src="{{ asset(get_setting('site_logo') ? 'img/'.get_setting('site_logo') : 'assets/images/footer-logo.png') }}" alt="footer-logo" class="img-fluid" style="width:160px;">
                        </figure>
                    </a>
                </div>
                <div class="links">
                    <ul class="list-unstyled mb-0">
                        <li class="text">
                            <a href="mailto:{{ get_setting('contact_email', 'Roofora@gmail.com') }}" class="text-decoration-none">{{ get_setting('contact_email', 'Roofora@gmail.com') }}</a>
                        </li>
                        <li class="text footer-number mb-0">
                            <a href="tel:{{ get_setting('contact_phone', '+568925896325') }}" class="text-decoration-none">{{ get_setting('contact_phone', '+5689 2589 6325') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="contact">
                    <ul class="list-unstyled mb-0">
                        <li class="text">
                            <a class="address mb-0" href="https://maps.app.goo.gl/gJqedixd1Vmn4kN38">{!! nl2br(e(get_setting('contact_address', "121 King Street Melbourne, 3000,\nAustralia"))) !!}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="copyright-con d-flex align-items-center justify-content-between text-center">
                <ul class="footer-links list-unstyled mb-0">
                    <li><a href="{{ url('/') }}" class="text-decoration-none">Home</a></li>
                    <li><a href="{{ route('home.about-us') }}" class="text-decoration-none">About</a></li>
                    <li><a href="{{ route('home.services') }}" class="text-decoration-none">Services</a></li>
                    <li><a href="{{ route('home.pricing') }}" class="text-decoration-none">Pricing</a></li>
                    <li><a href="{{ route('home.contact-us') }}" class="text-decoration-none">Contact</a></li>
                </ul>
                <ul class="list-unstyled mb-0 social-icons">
                    @php $fb = get_setting('social_facebook'); @endphp
                    @if($fb)
                    <li><a href="{{ $fb }}" class="text-decoration-none" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f social-networks" aria-hidden="true"></i></a></li>
                    @endif
                    @php $ig = get_setting('social_instagram'); @endphp
                    @if($ig)
                    <li><a href="{{ $ig }}" class="text-decoration-none" target="_blank" rel="noopener"><i class="fa-brands fa-instagram social-networks" aria-hidden="true"></i></a></li>
                    @endif
                    @php $ln = get_setting('social_linkedin'); @endphp
                    @if($ln)
                    <li><a href="{{ $ln }}" class="text-decoration-none" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin social-networks" aria-hidden="true"></i></a></li>
                    @endif
                </ul>
                <p class="mb-0">{{ get_setting('footer_copyright_text', 'Copyright &copy; '.date('Y').' Roofora. All Rights Reserved.') }}</p>
            </div>
        </div>
    </div>
</div>