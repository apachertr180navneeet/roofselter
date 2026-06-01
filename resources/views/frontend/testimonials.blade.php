@extends('frontend.layout.app')
@section('meta_title', 'Testimonials | ' . get_setting('website_name'))
@section('meta_description', 'Hear from our satisfied customers about our roofing services.')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="page-header__inner">
            <h2>Testimonials</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-chevron-right"></span></li>
                <li>Testimonials</li>
            </ul>
        </div>
    </div>
</section>

<section class="testimonials-page">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style2">
            <div class="section-title__tagline title-animation"><h4>// Testimonials //</h4></div>
            <h2 class="section-title__title title-animation">What Our Clients Say</h2>
        </div>
        <div class="row">
            @forelse($testimonials as $testimonial)
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->index * 100 }}ms">
                <div class="testimonials-page__single">
                    <div class="testimonials-page__single-content">
                        <div class="d-flex align-items-center mb-3">
                            <div class="testimonials-page__single-img me-3">
                                <img src="{{ $testimonial->image ? asset('img/'.$testimonial->image) : asset('webtheme/assets/images/resources/testimonial-1-1.jpg') }}" alt="{{ $testimonial->name }}" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                            </div>
                            <div>
                                <h4 class="mb-0">{{ $testimonial->name }}</h4>
                                <p class="mb-0 small">{{ $testimonial->designation }}</p>
                            </div>
                        </div>
                        <div class="rating-box mb-2">
                            <i class="star-display p-0" data-rating="{{ $testimonial->rating }}"></i>
                        </div>
                        <p>{!! $testimonial->message !!}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <h4>No testimonials available yet.</h4>
                <p>Check back soon.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@push('style')
<style>
    .testimonials-page__single {
        background: #fff;
        border-radius: 10px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 0 30px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        border: 1px solid #f0f0f0;
    }
    .testimonials-page__single:hover {
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        transform: translateY(-5px);
    }
</style>
@endpush
@endsection