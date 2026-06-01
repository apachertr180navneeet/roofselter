@extends('frontend.layout.app')
@section('meta_title', 'About Us | ' . get_setting('website_name'))
@section('meta_description', 'Learn about our company, mission, and team.')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="page-header__inner">
            <h2>About Us</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-chevron-right"></span></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</section>

@foreach($abouts as $about)
<section class="about-one" id="about">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 wow fadeInRight">
                <div class="about-one__img">
                    <div class="about-one__img-inner">
                        <div class="about-one__img1">
                            <img src="{{ $about->image ? asset('img/'.$about->image) : asset('assets/img/placeholder-image-3.jpg') }}" alt="{{ $about->title }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInLeft">
                <div class="about-one__content">
                    <div class="section-title sec-title-animation animation-style2">
                        <div class="section-title__tagline title-animation"><h4>// {{ $about->category->category_name ?? 'About Us' }} //</h4></div>
                        <h2 class="section-title__title title-animation">{{ $about->title }}</h2>
                    </div>
                    <div class="about-one__content-text"><p>{!! $about->description !!}</p></div>
                    @if($about->description2)
                        <div class="about-one__content-text mt-3"><p>{!! $about->description2 !!}</p></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach

<section class="team-one" id="team">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style2">
            <div class="section-title__tagline title-animation"><h4>// Our Team //</h4></div>
            <h2 class="section-title__title title-animation">Meet Our Expert Team</h2>
        </div>
        <div class="row">
            @foreach($team_members as $team)
            <div class="col-xl-4 col-lg-4 wow fadeInUp">
                <div class="team-one__single">
                    <div class="team-one__single-img">
                        <img src="{{ $team->image ? asset('img/'.$team->image) : asset('assets/img/placeholder-image-3.jpg') }}" alt="{{ $team->name }}">
                    </div>
                    <div class="team-one__single-content">
                        <h2><a href="#">{{ $team->name }}</a></h2>
                        <p>{{ $team->designation }}</p>
                        <ul class="social-links">
                            @if($team->facebook_url)<li><a href="{{ $team->facebook_url }}" target="_blank"><span class="icon-facebook-app-symbol"></span></a></li>@endif
                            @if($team->instagram_url)<li><a href="{{ $team->instagram_url }}" target="_blank"><span class="icon-instagram"></span></a></li>@endif
                            @if($team->linkedin_url)<li><a href="{{ $team->linkedin_url }}" target="_blank"><span class="icon-linkedin"></span></a></li>@endif
                            @if($team->twitter_url)<li><a href="{{ $team->twitter_url }}" target="_blank"><span class="icon-twitter"></span></a></li>@endif
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
