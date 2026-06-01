@extends('frontend.layout.app')
@section('meta_title', 'Become a Partner | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', 'Partner with us to grow your roofing business.')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="page-header__inner">
            <h2>Become a Partner</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-chevron-right"></span></li>
                <li>Become a Partner</li>
            </ul>
        </div>
    </div>
</section>

<section class="partner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="contact-page__contact-info text-center mb-4">
                    <h2>Partner Registration</h2>
                    <p class="mt-2">Fill out the form below to apply as a partner. We'll review your application and get back to you.</p>
                </div>
                <div class="card shadow-sm border-0 p-4">
                    <form id="partnerForm">
                        @csrf
                        <div style="position:absolute;left:-9999px;"><input type="text" name="website" tabindex="-1" autocomplete="off"></div>
                        <input type="hidden" name="_form_token" value="{{ encrypt(time()) }}">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="fullname" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Website</label>
                                <input type="url" name="website" class="form-control" placeholder="https://">
                            </div>
                            <div class="col-md-6">
                                <label>Designation <span class="text-danger">*</span></label>
                                <input type="text" name="designation" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>State <span class="text-danger">*</span></label>
                                <input type="text" name="state" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>City <span class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input type="checkbox" name="agree" class="form-check-input" id="agreeCheck" required>
                                    <label class="form-check-label" for="agreeCheck">I agree to the terms and conditions <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="thm-btn">Submit Application</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $('#partnerForm').on('submit', function(e) {
        e.preventDefault();
        var btn = $(this).find('button[type="submit"]');
        btn.prop('disabled', true).text('Submitting...');
        $.ajax({
            url: '{{ route("become-partner.store") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(res) {
                alert(res.message);
                $('#partnerForm')[0].reset();
            },
            error: function(xhr) {
                var errs = xhr.responseJSON.errors;
                var msg = '';
                $.each(errs, function(k, v) { msg += v[0] + '\n'; });
                alert(msg);
            },
            complete: function() {
                btn.prop('disabled', false).text('Submit Application');
            }
        });
    });
</script>
@endsection
