<div class="padding-rl float-left w-100">
    <div class="float-left w-100 footer-con position-relative main-box br-50">
        <div class="main-container position-relative">
            <div class="middle_portion d-flex align-items-center justify-content-between">
                <div class="logo-content">
                    <a href="{{ url('/') }}" class="footer-logo">
                        <figure class="mb-0"><img src="{{ asset('assets/images/footer-logo.png') }}" alt="footer-logo" class="img-fluid">
                        </figure>
                    </a>
                </div>
                <div class="links">
                    <ul class="list-unstyled mb-0">
                        <li class="text">
                            <a href="mailto:Roofora@gmail.com" class="text-decoration-none">Roofora@gmail.com</a>
                        </li>
                        <li class="text footer-number mb-0">
                            <a href="tel:+568925896325" class="text-decoration-none">+5689 2589 6325</a>
                        </li>
                    </ul>
                </div>
                <div class="contact">
                    <ul class="list-unstyled mb-0">
                        <li class="text">
                            <a class="address mb-0" href="https://maps.app.goo.gl/gJqedixd1Vmn4kN38">121 King
                                Street Melbourne, 3000, <br>
                                Australia</a>
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
                    <li><a href="https://www.facebook.com/" class="text-decoration-none"><i
                                class="fa-brands fa-facebook-f social-networks" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="https://www.instagram.com/" class="text-decoration-none"><i
                                class="fa-brands fa-instagram social-networks" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="https://www.linkedin.com/" class="text-decoration-none"><i
                                class="fa-brands fa-linkedin social-networks" aria-hidden="true"></i></a>
                    </li>
                </ul>
                <p class="mb-0">Copyright &copy; {{ date('Y') }} Roofora. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>
