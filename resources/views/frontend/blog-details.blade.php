@extends('frontend.layouts.app')

@section('title', ($blog->meta_title ? $blog->meta_title : $blog->title) . ' | Roofora — Roofing & Construction Services')

@section('content')
<div class="padding-rl float-left w-100">
    <div class="home-outer-wrapper float-left w-100 position-relative main-box">
        <section class="float-left w-100 position-relative sub-banner-con br-50 main-box">
            <div class="main-container">
                <div class="sub-banner-inner-con position-relative z-1">
                    <h1 class="text-white text-size-90">{{ $blog->title }}</h1>
                    <p class="text-white">{{ $blog->short_description }}</p>
                    <div class="breadcrumb-con d-inline-block">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('home.projects') }}">Projects</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<section class="float-left w-100 position-relative single-service-outer-con padding-top padding-bottom main-box">
    <div class="main-container">
        <div class="single-service-inner-con position-relative wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">
            @if($blog->image)
            <figure class="single-main-img"><img src="{{ asset('img/'.$blog->image) }}" alt="{{ $blog->title }}" class="img-fluid br-40"></figure>
            @endif
            <h2 class="text-size-60">{{ $blog->title }}</h2>
            <div class="mb-3">
                @if($blog->service_type)<span class="d-inline-block key-tags mr-2">{{ $blog->service_type }}</span>@endif
                @if($blog->location)<span class="d-inline-block key-tags mr-2">{{ $blog->location }}</span>@endif
                @if($blog->completion_date)<span class="d-inline-block key-tags">{{ date('M d, Y', strtotime($blog->completion_date)) }}</span>@endif
            </div>
            <p>{!! nl2br(e($blog->short_description)) !!}</p>
            @if($blog->description)
            <div class="blog-description">
                {!! $blog->description !!}
            </div>
            @endif
        </div>

        @if($blog->galleryImages && $blog->galleryImages->count() > 0)
        <div class="row only-images-outer mt-4">
            @foreach($blog->galleryImages as $gallery)
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="only-img w-100">
                    <figure><img src="{{ asset('img/'.$gallery->image) }}" alt="{{ $gallery->label ?? $blog->title }}"></figure>
                    @if($gallery->label)
                    <p class="text-center mt-2">{{ $gallery->label }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

@if($recentPosts && $recentPosts->count() > 0)
<div class="padding-rl float-left w-100">
    <section class="float-left w-100 padding-top why-choose-con padding-bottom position-relative main-box br-50 bg-sky">
        <div class="main-container">
            <div class="heading-title-con text-center">
                <span class="special-text d-block">Recent Projects</span>
                <h2 class="text-size-60">More Projects</h2>
                <p>Check out our latest roofing and construction projects.</p>
            </div>
            <div class="row">
                @foreach($recentPosts as $recent)
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="main-service-box w-100 position-relative">
                        <div class="position-relative">
                            <figure><img src="{{ asset($recent->image ? 'img/'.$recent->image : 'assets/images/main-services-img1.jpg') }}" alt="{{ $recent->title }}" class="img-fluid"></figure>
                        </div>
                        <div class="inner-service">
                            <h3 class="text-size-26 font-weight-700">{{ $recent->title }}</h3>
                            @if($recent->short_description)
                            <p>{{ Str::limit($recent->short_description, 100) }}</p>
                            @endif
                            <a href="{{ route('home.blog-details', $recent->slug) }}" class="d-inline-block read-more-link">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endif

<div class="padding-rl float-left w-100">
    <section class="float-left w-100 position-relative book-now-con main-box br-50 bg-lemon">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="heading-title-con mb-0">
                    <span class="special-text d-block">Book Now</span>
                    <h2 class="text-size-120 text-blue">Start Your Roofing.</h2>
                    <p class="text-blue">Fast, reliable roofing service you can trust—personally handled <br> from start to finish.</p>
                    <a href="{{ route('home.contact-us') }}" class="font-weight-bold secondary_btn d-inline-block">
                        Get a Quote <span><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                    </a>
                    <a href="{{ route('home.contact-us') }}" class="font-weight-bold elementary_btn d-inline-block">
                        Call Me Now <span><img src="{{ asset('assets/images/arrow.png') }}" alt="arrow icon" class="img-fluid d-inline-block"></span>
                    </a>
                </div>
            </div>
            <div class="book-now-img">
                <figure><img src="{{ asset('assets/images/book-now-vector.png') }}" alt="book now house"></figure>
                <figure><img src="{{ asset('assets/images/mustard-elipse.png') }}" alt="elipse shape" class="img-fluid position-absolute elipse"></figure>
            </div>
        </div>
    </section>
</div>

<div class="padding-rl float-left overflow-hidden w-100">
    <section class="float-left w-100 newsletter-con position-relative main-box br-50 bg-blue">
        <div class="main-container">
            <div class="d-flex justify-content-between">
                <div class="newsletter-img-con">
                    <figure><img src="{{ asset('assets/images/footer-vector.png') }}" alt=""></figure>
                </div>
                <div class="newsletter-content-con">
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