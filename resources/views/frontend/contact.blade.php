@extends('frontend.layouts.app')

@section('title', 'Contact Us | Roofora — Roofing & Construction Services')

@section('content')
<div class="padding-rl float-left w-100">
    <div class="home-outer-wrapper float-left w-100 position-relative main-box">
        <section class="float-left w-100 position-relative sub-banner-con br-50 main-box">
            <div class="main-container">
                <div class="sub-banner-inner-con position-relative z-1">
                    <h1 class="text-white text-size-90">Contact Us</h1>
                    <p class="text-white">Reach out to our team for inventory questions, logistics support, <br> and order coordination.</p>
                    <div class="breadcrumb-con d-inline-block">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="spacer"></div>

<section class="float-left w-100 position-relative contact-information-con padding-top padding-bottom main-box">
    <div class="container">
        <div class="row">
            <div class="col-md-5 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">
                <div class="contact-left-con">
                    <span class="special-text d-block">Our Information</span>
                    <h2 class="text-size-60">Contact Info & Details</h2>
                    <p class="text-size-18">Get the contact details you need to connect with our team. Fast responses for orders, delivery, and general inquiries.</p>
                    <div class="info-card">
                        <figure class="info-icon">
                            <img src="{{ asset('assets/images/contact-phone.png') }}" alt="phone" class="img-fluid">
                        </figure>
                        <div class="info-text">
                            <h3 class="text-size-22 font-weight-700">Call us at:</h3>
                            <a href="tel:{{ get_setting('contact_phone', '+01234567899') }}">{{ get_setting('contact_phone', '+012 (345) 678 99') }}</a>
                            @php $phone2 = get_setting('contact_phone_2'); @endphp
                            @if($phone2)<a href="tel:{{ $phone2 }}">{{ $phone2 }}</a>@endif
                        </div>
                    </div>
                    <div class="info-card">
                        <figure class="info-icon">
                            <img src="{{ asset('assets/images/contact-email.png') }}" alt="email" class="img-fluid">
                        </figure>
                        <div class="info-text">
                            <h3 class="text-size-22 font-weight-700">Email us at:</h3>
                            <a href="mailto:{{ get_setting('contact_email', 'support@roofora.com') }}">{{ get_setting('contact_email', 'support@roofora.com') }}</a>
                            @php $email2 = get_setting('contact_email_2'); @endphp
                            @if($email2)<a href="mailto:{{ $email2 }}">{{ $email2 }}</a>@endif
                        </div>
                    </div>
                    <div class="info-card mb-0">
                        <figure class="info-icon">
                            <img src="{{ asset('assets/images/contact-location.png') }}" alt="location" class="img-fluid">
                        </figure>
                        <div class="info-text">
                            <h3 class="text-size-22 font-weight-700">Our Location:</h3>
                            <a href="https://maps.app.goo.gl/gehuAyDZ9d5vrZXw9">{!! nl2br(e(get_setting('contact_address', "121 King Street, Melbourne\nVictoria 3000 Australia"))) !!}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">
                <div class="quote-card">
                    <h3 class="quote-title text-size-40">Request a Quote</h3>
                    <div class="divider"></div>
                    <form id="quoteForm" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <label class="form-label">Full Name:</label>
                        <input type="text" class="form-control" name="username" placeholder="Kevin Doe" required>

                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="kevindoe@gmail.com" required>

                        <label class="form-label">Phone:</label>
                        <input type="text" class="form-control" name="phone" placeholder="(214) 555 013258" required>

                        <label class="form-label">What do you need?</label>
                        <select class="form-control" name="service_required">
                            <option value="">Select a service</option>
                            <option value="Delivery Quote">Delivery Quote</option>
                            <option value="Roofing">Roofing</option>
                            <option value="Repair">Repair</option>
                        </select>

                        <label class="form-label">Project Details:</label>
                        <textarea class="form-control" name="message" placeholder="Tell us the jobsite city, roof squares..."></textarea>

                        <button type="submit" class="submit-btn">
                            Submit Request
                            <span class="btn-circle"><img src="{{ asset('assets/images/dark-arrow.png') }}" alt="arrow"></span>
                        </button>
                    </form>
                    <div id="form_result"></div>
                    <div class="footer-text">
                        By submitting, you agree to be contacted about inventory and pricing.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="padding-rl float-left w-100">
    <div class="float-left w-100 position-relative contact-map-con main-box text-center">
        <div class="container-fluid">
            <div class="position-relative wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.05s">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.724065759603!2d144.95450157673454!3d-37.81993173439205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d52754eaecb%3A0x2433bdca35db435a!2s21%20King%20St%2C%20Melbourne%20VIC%203000%2C%20Australia!5e0!3m2!1sen!2s!4v1763556889816!5m2!1sen!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
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

@push('scripts')
<script>
$(function() {
    $('#quoteForm').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var data = form.serialize();
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#form_result').html('<span class="form-success alert alert-success d-block">' + response.message + '</span>');
                    form[0].reset();
                }
                $('#form_result').show();
            },
            error: function(xhr) {
                var errors = xhr.responseJSON;
                var msg = '';
                if (errors && errors.errors) {
                    $.each(errors.errors, function(key, val) {
                        msg += val[0] + '<br>';
                    });
                } else if (errors && errors.message) {
                    msg = errors.message;
                } else {
                    msg = 'Something went wrong. Please try again.';
                }
                $('#form_result').html('<span class="form-error alert alert-danger d-block">' + msg + '</span>');
                $('#form_result').show();
            }
        });
    });
});
</script>
@endpush
