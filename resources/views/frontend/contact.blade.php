@extends('frontend.layout.app')
@section('meta_title', 'Contact Us | ' . get_setting('website_name'))
@section('meta_description', 'Get in touch with us for roofing services. Free quotes available.')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="page-header__inner">
            <h2>Contact Us</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-chevron-right"></span></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</section>

<section class="contact-page" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="contact-page__contact-info">
                    <div class="title-box"><h2>Contact Information</h2></div>
                    <div class="contact-page__contact-info-box">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="contact-page__contact-info-single">
                                    <div class="icon-box"><span class="icon-phone"></span></div>
                                    <div class="content-box">
                                        <h3>Phone Number :</h3>
                                        <p><a href="tel:{{ get_setting('contact_phone', '+61 451873035') }}">{{ get_setting('contact_phone', '+61 451873035') }}</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="contact-page__contact-info-single">
                                    <div class="icon-box"><span class="icon-email"></span></div>
                                    <div class="content-box">
                                        <h3>Email Address</h3>
                                        <p><a href="mailto:{{ get_setting('contact_email', 'sydneycrownroofingandgutters@gmail.com') }}">{{ get_setting('contact_email', 'sydneycrownroofingandgutters@gmail.com') }}</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="contact-page__contact-info-single">
                                    <div class="icon-box"><span class="icon-gps"></span></div>
                                    <div class="content-box">
                                        <h3>Our Address</h3>
                                        <p>{{ get_setting('contact_address', '79 Governors Way, Macquarie Links NSW 2565, Australia') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="contact-page__contact-info-single">
                                    <div class="icon-box"><span class="fa fa-regular fa-clock"></span></div>
                                    <div class="content-box">
                                        <h3>Working Hours</h3>
                                        <p>{{ get_setting('contact_hours', 'Monday - Saturday : 9:00 AM - 6:00 PM') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-page__contact-info-bottom mb-5">
                        <div class="text-box">
                            <h2>Follow Us On Social Media:</h2>
                        </div>
                        <div class="social-links">
                            <ul>
                                @if(get_setting('social_facebook'))<li><a href="{{ get_setting('social_facebook') }}" target="_blank"><span class="icon-facebook-app-symbol"></span></a></li>@endif
                                @if(get_setting('social_instagram'))<li><a href="{{ get_setting('social_instagram') }}" target="_blank"><span class="icon-instagram"></span></a></li>@endif
                                @if(get_setting('social_twitter'))<li><a href="{{ get_setting('social_twitter') }}" target="_blank"><span class="icon-twitter"></span></a></li>@endif
                                @if(get_setting('social_linkedin'))<li><a href="{{ get_setting('social_linkedin') }}" target="_blank"><span class="icon-linkedin"></span></a></li>@endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                @if(get_setting('google_maps_embed'))
                    <iframe src="{{ get_setting('google_maps_embed') }}" class="google-map-one__map" allowfullscreen="" loading="lazy"></iframe>
                @else
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3308.536270820157!2d150.87039919999998!3d-33.97875679999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12eb7adb766a3b%3A0x6e412e9a45d63c16!2sSydney%20Crown%20Roofing%20and%20Gutters%20%7C%20Roof%20Repair%20Sydney!5e0!3m2!1sen!2sin!4v1778689752441!5m2!1sen!2sin" class="google-map-one__map"></iframe>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
