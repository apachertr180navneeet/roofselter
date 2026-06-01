<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from scriptfusions.mnsithub.com/html/reroof/main-html/index-one-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Sep 2025 09:59:42 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('meta_title', (get_setting('website_name') ?: 'rooftopper') . ' | ' . (get_setting('site_motto') ?: 'Home'))</title>
    <meta name="description" content="@yield('meta_description', get_setting('site_motto', 'Professional Roofing Services'))">
    <meta name="keywords" content="@yield('meta_keywords', 'roofing, roof repair, roof installation, Sydney roofing')">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/'.get_setting('site_logo'))}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/'.get_setting('site_logo'))}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/'.get_setting('site_logo'))}}" />
    <link rel="manifest" href="{{asset('img/'.get_setting('site_logo'))}}" />
    <meta property="og:title" content="@yield('meta_title', get_setting('website_name') . ' | ' . get_setting('site_motto'))">
    <meta property="og:description" content="@yield('meta_description', get_setting('site_motto', 'Professional Roofing Services'))">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "{{ get_setting('website_name', 'Sydney Crown Roofing and Gutters') }}",
        "image": "{{ asset('img/'.get_setting('site_logo')) }}",
        "description": "{{ get_setting('site_motto', 'Professional Roofing Services') }}",
        "telephone": "{{ get_setting('contact_phone', '+61 451873035') }}",
        "email": "{{ get_setting('contact_email', 'sydneycrownroofingandgutters@gmail.com') }}",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ get_setting('contact_address', '79 Governors Way, Macquarie Links NSW 2565') }}",
            "addressLocality": "Sydney",
            "addressRegion": "NSW",
            "addressCountry": "AU"
        },
        "url": "{{ url('/') }}",
        "priceRange": "$$",
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
            "opens": "09:00",
            "closes": "18:00"
        },
        "sameAs": [
            @if(get_setting('social_facebook'))"{{ get_setting('social_facebook') }}",@endif
            @if(get_setting('social_instagram'))"{{ get_setting('social_instagram') }}",@endif
            @if(get_setting('social_twitter'))"{{ get_setting('social_twitter') }}",@endif
            @if(get_setting('social_linkedin'))"{{ get_setting('social_linkedin') }}"@endif
        ]
    }
    </script>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&amp;family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{asset('webtheme/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/custom-animate.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/swiper.min.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/font-awesome-all.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/jarallax.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/jquery.magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/aos.css')}}" />


    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/slider.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/footer.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/brand.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/services.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/about.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/why-choose.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/process.html')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/portfolio.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/testimonial.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/pricing.html')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/blog.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/newsletter.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/features.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/working-process.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/team.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/faq.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/module-css/contact.css')}}" />


    <!-- template styles -->
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('webtheme/assets/css/responsive.css')}}" />
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17313118139">
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'AW-17313118139');
    </script>
</head>

<body class="custom-cursor">


    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <!--Start Preloader-->
    <div class="loader js-preloader d-none">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!--End Preloader-->

    <div class="page-wrapper">


    @include('frontend.layout.header')
    @yield('content')
    @include('frontend.layout.footer')


    

    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
            <div class="logo-box">
                <a href="{{route('home')}}" aria-label="logo image"><img src="{{asset('webtheme/assets/images/resources/RoofShelter-Logo1.jpg')}}" style="border-radius: 10px" width="140"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:sydneycrownroofingandgutters@gmail.com">sydneycrownroofingandgutters@gmail.com</a>
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    <a href="tel:+61 451873035">+61 451873035</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="https://www.facebook.com/profile.php?id=61588821460338" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="https://www.instagram.com/sydneycrownroofingandgutters" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->

        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->



    <!-- Search Popup -->
    <div class="search-popup">
        <div class="color-layer"></div>
        <button class="close-search"><span class="far fa-times fa-fw"></span></button>
        <form method="post" action="#">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search Here" required="">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- End Search Popup -->


    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
        <span class="scroll-to-top__text"> Go Back Top</span>
    </a>


    <script src="{{asset('webtheme/assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/jarallax.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/jquery.appear.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/swiper.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/wNumb.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/wow.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/isotope.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/marquee.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/countdown.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/jquery.circleType.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/jquery.fittext.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/jquery.lettering.min.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/jquery-sidebar-content.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/aos.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/typed-2.0.11.js')}}"></script>


    <script src="{{asset('webtheme/assets/js/gsap/gsap.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/gsap/ScrollTrigger.js')}}"></script>
    <script src="{{asset('webtheme/assets/js/gsap/SplitText.js')}}"></script>




    <!-- template js -->
    <script src="{{asset('webtheme/assets/js/script.js')}}"></script>

    <!-- RateYo CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.css">

    <!-- RateYo JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.js"></script>

    <script>
        $(function () {
            $(".star-display").each(function () {
                let rating = parseFloat($(this).data("rating"));
                $(this).rateYo({
                    rating: rating,
                    readOnly: true,
                    starWidth: "18px",
                    ratedFill: "#f39c12",
                    normalFill: "#ddd"
                });
            });
        });
    </script>

    <script>
$(document).ready(function () {
    // quick client-side required field check before AJAX (shows small inline messages)
    function clientValidate($form) {
        var ok = true;
        var username = $.trim($('#username').val());
        var phone = $.trim($('#phone').val());

        // clear previous
        $form.find('span.error-text').text('');

        if (username === '') {
            $form.find('span.username_error').text('Name is required.');
            ok = false;
        }
        if (phone === '') {
            $form.find('span.phone_error').text('Phone is required.');
            ok = false;
        }
        return ok;
    }

    $(document).on('submit', '#contactForm', function(e) {
        e.preventDefault();
        var form = this;
        var $form = $(form);

        // client side quick check
        if (!clientValidate($form)) return;

        var $btn = $('#contactSubmit');
        var formData = new FormData(form);

        $.ajax({
            url: $form.attr('action'),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {
                $form.find('span.error-text').text('');
                $('#form-response').html('');
                $btn.prop('disabled', true).text('Please wait...');
            },
            success: function(response) {
                $btn.prop('disabled', false).text('Make An Appointment');
                if (response.status === 'success') {
                    $('#form-response').html('<div id="success-msg" class="alert alert-success">'+ response.message +'</div>');
                    form.reset();

                    // auto-hide success message after 3 seconds with fade
                    setTimeout(function(){
                        $('#success-msg').fadeOut('slow', function(){ $(this).remove(); });
                    }, 3000);
                } else {
                    $('#form-response').html('<div class="alert alert-danger">Something went wrong. Try again.</div>');
                }
            },
            error: function(xhr) {
                $btn.prop('disabled', false).text('Make An Appointment');
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, val) {
                        $form.find('span.' + key + '_error').text(val[0]);
                    });
                    // scroll to first error (optional)
                    var $firstErr = $form.find('span.error-text:visible').first();
                    if ($firstErr.length) {
                        $('html, body').animate({ scrollTop: $firstErr.offset().top - 120 }, 400);
                    }
                } else {
                    $('#form-response').html('<div class="alert alert-danger">Server error. Please try later.</div>');
                }
            }
        });
    });
});
</script>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/61451873035" class="whatsapp-float" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-whatsapp whatsapp-icon"></i>
    </a>

    <style>
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .whatsapp-float:hover {
            background-color: #128c7e;
            color: #FFF;
            transform: scale(1.1);
        }
        .whatsapp-icon {
            font-size: 35px;
        }
        /* Pulse Animation */
        .whatsapp-float::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #25d366;
            opacity: 0.7;
            z-index: -1;
            animation: whatsapp-pulse 1.5s infinite;
        }
        @keyframes whatsapp-pulse {
            0% {
                transform: scale(1);
                opacity: 0.7;
            }
            50% {
                transform: scale(1.4);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 0;
            }
        }
    </style>
</body>
</html>