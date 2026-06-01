@extends('frontend.layout.app')
@section('meta_title', 'Our Team | ' . get_setting('website_name'))
@section('meta_description', 'Meet our expert roofing team members.')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="page-header__inner">
            <h2>Our Team</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-chevron-right"></span></li>
                <li>Team</li>
            </ul>
        </div>
    </div>
</section>

<section class="team-one">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style2">
            <div class="section-title__tagline title-animation"><h4>// Our Team //</h4></div>
            <h2 class="section-title__title title-animation">Meet Our Expert Team</h2>
        </div>
        <div class="row">
            @forelse($team_members as $team)
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="{{ $loop->index * 100 }}ms">
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
            @empty
            <div class="col-12 text-center py-5">
                <h4>No team members added yet.</h4>
                <p>Check back soon.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection