@extends('frontend.layout.app')
@section('content')

<!--Start Page Header-->
<section class="page-header" style="background-image: url('{{ $service->image ? asset('img/'.$service->image) : asset('webtheme/assets/images/backgrounds/page-header-bg.jpg') }}'); position: relative; padding: 120px 0 120px; background-size: cover; background-position: center;">
    <div class="container" style="position: relative; z-index: 2;">
        <div class="page-header__inner" style="text-align: center;">
            <h2 style="color: #fff; font-size: 50px; font-weight: 700; margin-bottom: 10px;">{{ $service->title }}</h2>
            <ul class="thm-breadcrumb list-unstyled" style="display: inline-flex; align-items: center; justify-content: center; gap: 10px; background: rgba(0,0,0,0.5); padding: 8px 20px; border-radius: 30px;">
                <li><a href="{{ route('home') }}" style="color: #ffaa17; font-weight: 600;">Home</a></li>
                <li style="color: #fff;">/</li>
                <li style="color: #fff;">{{ $service->title }}</li>
            </ul>
        </div>
    </div>
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.6); z-index: 1;"></div>
</section>
<!--End Page Header-->

<!--Start Service Details-->
<section class="service-details" style="padding: 120px 0 90px; background: #f9f9f9;">
    <div class="container">
        <div class="row">
            <!--Left Column (Service Content)-->
            <div class="col-xl-8 col-lg-7">
                <div class="service-details__left">
                    <div class="service-details__img" style="margin-bottom: 40px; border-radius: 10px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                        <img src="{{ $service->image ? asset('img/'.$service->image) : asset('assets/img/placeholder-image-3.jpg') }}" alt="{{ $service->title }}" style="width: 100%; height: auto;">
                    </div>

                    <div class="service-details__content">
                        <h3 style="font-size: 32px; font-weight: 700; color: #1c1c24; margin-bottom: 20px;">Overview of {{ $service->title }}</h3>
                        <div style="font-size: 16px; color: #5e5e6a; line-height: 1.8; margin-bottom: 40px;">
                            {!! $service->description !!}
                        </div>

                        @if($service->features->count() > 0)
                        <!--Features Section-->
                        <div class="service-details__features" style="margin-bottom: 50px; background: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.03);">
                            <h4 style="font-size: 24px; font-weight: 700; color: #1c1c24; margin-bottom: 10px;">{{ $service->features_headings ?? 'Key Features' }}</h4>
                            <p style="color: #7b7b8a; margin-bottom: 25px;">{{ $service->features_short_description ?? 'Here are the outstanding features that make our service reliable.' }}</p>
                            <div class="row">
                                @foreach($service->features as $feature)
                                <div class="col-md-6" style="margin-bottom: 15px;">
                                    <div style="display: flex; align-items: flex-start; gap: 10px;">
                                        <span class="icon-verified" style="color: #ffaa17; font-size: 20px; margin-top: 3px;"></span>
                                        <div>
                                            <h5 style="font-size: 16px; font-weight: 600; color: #1c1c24; margin: 0 0 5px;">{{ $feature->title }}</h5>
                                            @if(!empty($feature->short_description))
                                                <p style="font-size: 14px; color: #7b7b8a; margin: 0;">{{ $feature->short_description }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($service->benefits->count() > 0)
                        <!--Benefits Section-->
                        <div class="service-details__benefits" style="margin-bottom: 50px;">
                            <h4 style="font-size: 24px; font-weight: 700; color: #1c1c24; margin-bottom: 10px;">{{ $service->benefits_headings ?? 'Service Benefits' }}</h4>
                            <p style="color: #7b7b8a; margin-bottom: 25px;">{{ $service->benefits_short_description ?? 'Enjoy premium benefits tailored specifically for your roofing needs.' }}</p>
                            <div class="row">
                                @foreach($service->benefits as $benefit)
                                <div class="col-md-6" style="margin-bottom: 20px;">
                                    <div style="background: #fff; padding: 25px; border-radius: 8px; border-left: 4px solid #ffaa17; box-shadow: 0 5px 20px rgba(0,0,0,0.02);">
                                        <h5 style="font-size: 18px; font-weight: 600; color: #1c1c24; margin-bottom: 8px;">{{ $benefit->title }}</h5>
                                        <p style="font-size: 14px; color: #7b7b8a; margin: 0;">{{ $benefit->short_description }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($service->essentials->count() > 0)
                        <!--Essentials Section-->
                        <div class="service-details__essentials" style="margin-bottom: 50px;">
                            <h4 style="font-size: 24px; font-weight: 700; color: #1c1c24; margin-bottom: 10px;">{{ $service->essentials_headings ?? 'Project Essentials' }}</h4>
                            <p style="color: #7b7b8a; margin-bottom: 25px;">{{ $service->essentials_short_description ?? 'Essential steps we take to ensure premium delivery and customer satisfaction.' }}</p>
                            <div class="row">
                                @foreach($service->essentials as $essential)
                                <div class="col-md-4" style="margin-bottom: 20px;">
                                    <div style="text-align: center; background: #fff; padding: 30px 20px; border-radius: 8px; box-shadow: 0 5px 20px rgba(0,0,0,0.02); height: 100%;">
                                        <div style="width: 50px; height: 50px; background: #fff3db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; color: #ffaa17; font-size: 20px; font-weight: bold;">
                                            {{ $loop->iteration }}
                                        </div>
                                        <h5 style="font-size: 16px; font-weight: 600; color: #1c1c24; margin-bottom: 10px;">{{ $essential->title }}</h5>
                                        <p style="font-size: 13px; color: #7b7b8a; margin: 0;">{{ $essential->short_description }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($service->faqs->count() > 0)
                        <!--Faq Section-->
                        <div class="service-details__faq" style="margin-bottom: 50px;">
                            <h4 style="font-size: 24px; font-weight: 700; color: #1c1c24; margin-bottom: 20px;">Frequently Asked Questions</h4>
                            <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion-1">
                                @foreach($service->faqs as $key => $faq)
                                <div class="accrodion {{ $key == 0 ? 'active' : '' }}" style="background: #fff; margin-bottom: 15px; border-radius: 8px; box-shadow: 0 5px 20px rgba(0,0,0,0.02); overflow: hidden;">
                                    <div class="accrodion-title" style="padding: 20px 25px; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                                        <h4 style="font-size: 16px; font-weight: 600; color: #1c1c24; margin: 0;">{{ $faq->question }}</h4>
                                        <span class="fa fa-angle-right" style="color: #ffaa17; transition: transform 0.3s;"></span>
                                    </div>
                                    <div class="accrodion-content" style="padding: 0 25px 20px; display: {{ $key == 0 ? 'block' : 'none' }}; border-top: 1px solid #f1f1f1; margin-top: 5px; padding-top: 15px;">
                                        <div class="inner">
                                            <p style="font-size: 14px; color: #7b7b8a; margin: 0; line-height: 1.6;">{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!--Right Column (Sidebar)-->
            <div class="col-xl-4 col-lg-5">
                <div class="service-details__sidebar" style="margin-top: 0;">
                    <!--Category Widget-->
                    <div class="service-details__sidebar-widget service-details__sidebar-widget-category" style="background: #fff; padding: 35px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); margin-bottom: 30px;">
                        <h3 style="font-size: 20px; font-weight: 700; color: #1c1c24; margin-bottom: 20px; border-left: 4px solid #ffaa17; padding-left: 15px;">Our Services</h3>
                        <ul class="list-unstyled" style="margin: 0; padding: 0;">
                            @foreach($all_services as $as)
                            <li style="margin-bottom: 12px;">
                                <a href="{{ route('home.service-detail', $as->slug) }}" style="display: flex; justify-content: space-between; align-items: center; padding: 12px 20px; background: #f9f9f9; color: #1c1c24; font-weight: 600; border-radius: 6px; transition: all 0.3s;">
                                    {{ $as->title }}
                                    <span class="icon-next1" style="font-size: 12px; color: #ffaa17;"></span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!--Quick Appointment Widget-->
                    <div class="service-details__sidebar-widget service-details__sidebar-widget-contact" style="background: #1c1c24; padding: 35px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); color: #fff; margin-bottom: 30px;">
                        <h3 style="font-size: 20px; font-weight: 700; color: #fff; margin-bottom: 25px; border-left: 4px solid #ffaa17; padding-left: 15px;">Book Appointment</h3>
                        <form id="appointmentForm" action="{{ route('appointment.store') }}" method="POST">
                            @csrf
                            <div style="position:absolute;left:-9999px;"><input type="text" name="website" tabindex="-1" autocomplete="off"></div>
                            <input type="hidden" name="_form_token" value="{{ encrypt(time()) }}">
                            <input type="hidden" name="service_required" value="{{ $service->title }}">

                            <div style="margin-bottom: 15px;">
                                <input type="text" name="customer_name" placeholder="Your Name" required style="width: 100%; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); padding: 12px 20px; border-radius: 6px; color: #fff; outline: none;">
                                <span class="text-danger error-text customer_name_error" style="font-size: 12px;"></span>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <input type="email" name="email" placeholder="Your Email" style="width: 100%; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); padding: 12px 20px; border-radius: 6px; color: #fff; outline: none;">
                                <span class="text-danger error-text email_error" style="font-size: 12px;"></span>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <input type="text" name="phone" placeholder="Phone Number" required style="width: 100%; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); padding: 12px 20px; border-radius: 6px; color: #fff; outline: none;">
                                <span class="text-danger error-text phone_error" style="font-size: 12px;"></span>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <input type="date" name="preferred_date" required style="width: 100%; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); padding: 12px 20px; border-radius: 6px; color: #fff; outline: none;">
                                <span class="text-danger error-text preferred_date_error" style="font-size: 12px;"></span>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <input type="text" name="preferred_time" placeholder="Preferred Time (e.g. 10:00 AM)" required style="width: 100%; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); padding: 12px 20px; border-radius: 6px; color: #fff; outline: none;">
                                <span class="text-danger error-text preferred_time_error" style="font-size: 12px;"></span>
                            </div>

                            <div style="margin-bottom: 20px;">
                                <textarea name="notes" placeholder="Any special requests?" style="width: 100%; height: 100px; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); padding: 12px 20px; border-radius: 6px; color: #fff; outline: none; resize: none;"></textarea>
                                <span class="text-danger error-text notes_error" style="font-size: 12px;"></span>
                            </div>

                            <button type="submit" id="appointmentSubmit" class="thm-btn" style="width: 100%; justify-content: center; text-align: center; border: none;">
                                Book Now <span class="icon-next1"></span>
                            </button>
                        </form>
                        <div id="appointment-response" class="mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Service Details-->

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Accordion toggle logic if standard template logic is not working
    $('.accrodion-title').on('click', function() {
        var parent = $(this).closest('.accrodion');
        var content = parent.find('.accrodion-content');
        
        if(parent.hasClass('active')) {
            parent.removeClass('active');
            content.slideUp(300);
        } else {
            $('.accrodion').removeClass('active');
            $('.accrodion-content').slideUp(300);
            parent.addClass('active');
            content.slideDown(300);
        }
    });

    // Appointment Form Submit
    $('#appointmentForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        var $form = $(form);
        var $btn = $('#appointmentSubmit');

        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: new FormData(form),
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {
                $form.find('span.error-text').text('');
                $('#appointment-response').html('');
                $btn.prop('disabled', true).text('Please wait...');
            },
            success: function(response) {
                $btn.prop('disabled', false).html('Book Now <span class="icon-next1"></span>');
                if (response.status === 'success') {
                    $('#appointment-response').html('<div class="alert alert-success">' + response.message + '</div>');
                    form.reset();
                    setTimeout(function() {
                        $('#appointment-response').fadeOut('slow', function() { $(this).remove(); });
                    }, 4000);
                }
            },
            error: function(xhr) {
                $btn.prop('disabled', false).html('Book Now <span class="icon-next1"></span>');
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, val) {
                        $form.find('span.' + key + '_error').text(val[0]);
                    });
                } else {
                    $('#appointment-response').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
                }
            }
        });
    });
});
</script>
@endsection
