@extends('frontend.layout.app')
@section('meta_title', 'Testimonials | ' . (get_setting('website_name') ?: 'RoofShelter'))
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

<section class="testimonials-two" style="padding-bottom: 120px;">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style2">
            <div class="section-title__tagline title-animation"><h4>// Testimonials //</h4></div>
            <h2 class="section-title__title title-animation">What Our Clients Say</h2>
        </div>
        <div class="row">
            @forelse($testimonials as $testimonial)
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->index * 100 }}ms">
                <div class="testimonial-card">
                    <div class="testimonial-card__quote">
                        <span class="icon-quote1"></span>
                    </div>
                    <div class="testimonial-card__stars">
                        <i class="star-display p-0" data-rating="{{ $testimonial->rating }}"></i>
                    </div>
                    <div class="testimonial-card__text">
                        <p>{!! $testimonial->message !!}</p>
                    </div>
                    <div class="testimonial-card__author">
                        <div class="testimonial-card__author-img">
                            <img src="{{ $testimonial->image ? asset('img/'.$testimonial->image) : asset('webtheme/assets/images/resources/testimonial-1-1.jpg') }}" alt="{{ $testimonial->name }}">
                        </div>
                        <div class="testimonial-card__author-info">
                            <h4>{{ $testimonial->name }}</h4>
                            <p>{{ $testimonial->designation }}</p>
                        </div>
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
.testimonial-card {
    position: relative;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    padding: 35px 30px 30px;
    margin-bottom: 30px;
    transition: all 0.3s ease;
}
.testimonial-card:hover {
    border-color: var(--reroof-base, #ffb324);
    box-shadow: 0 12px 40px rgba(0,0,0,0.08);
    transform: translateY(-4px);
}
.testimonial-card__quote {
    position: absolute;
    top: 18px;
    right: 25px;
    font-size: 28px;
    color: var(--reroof-base, #ffb324);
    opacity: 0.3;
}
.testimonial-card__stars {
    margin-bottom: 14px;
}
.testimonial-card__text p {
    color: #555;
    line-height: 1.7;
    font-size: 15px;
    margin-bottom: 20px;
}
.testimonial-card__author {
    display: flex;
    align-items: center;
    gap: 14px;
    border-top: 1px solid #f0f0f0;
    padding-top: 18px;
}
.testimonial-card__author-img {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    overflow: hidden;
    flex-shrink: 0;
    border: 2px solid var(--reroof-base, #ffb324);
}
.testimonial-card__author-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.testimonial-card__author-info h4 {
    font-size: 16px;
    font-weight: 600;
    margin: 0;
    color: #222;
}
.testimonial-card__author-info p {
    font-size: 13px;
    color: #888;
    margin: 2px 0 0;
}
</style>
@endpush
@endsection