@extends('frontend.layouts.app')

@section('title', 'Projects | ' . get_setting('website_name', 'RoofShelter'))

@section('content')
<div class="padding-rl float-left w-100">
    <div class="home-outer-wrapper float-left w-100 position-relative main-box">
        <section class="float-left w-100 position-relative sub-banner-con br-50 main-box">
            <div class="main-container">
                <div class="sub-banner-inner-con position-relative z-1">
                    <h1 class="text-white text-size-90">Projects</h1>
                    <p class="text-white">Explore our completed roofing and construction projects.</p>
                    <div class="breadcrumb-con d-inline-block">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Projects</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="spacer"></div>

<section class="float-left w-100 position-relative blog-con padding-top padding-bottom main-box">
    <div class="main-container">
        <div class="row">
            @forelse($blogs as $blog)
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="main-service-box w-100 position-relative">
                    <div class="position-relative">
                        <figure><img src="{{ asset($blog->image ? 'img/'.$blog->image : 'assets/images/main-services-img1.jpg') }}" alt="{{ $blog->title }}" class="img-fluid"></figure>
                    </div>
                    <div class="inner-service">
                        <h3 class="text-size-26 font-weight-700">{{ $blog->title }}</h3>
                        @if($blog->service_type || $blog->location)
                        <div class="mb-2">
                            @if($blog->service_type)<span class="d-inline-block key-tags mr-2">{{ $blog->service_type }}</span>@endif
                            @if($blog->location)<span class="d-inline-block key-tags">{{ $blog->location }}</span>@endif
                        </div>
                        @endif
                        @if($blog->short_description)
                        <p>{{ Str::limit($blog->short_description, 120) }}</p>
                        @endif
                        <a href="{{ route('home.blog-details', $blog->slug) }}" class="d-inline-block read-more-link">View Project</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>No projects available at the moment.</p>
            </div>
            @endforelse
        </div>
        @if(method_exists($blogs, 'links'))
        <div class="d-flex justify-content-center mt-4">
            {{ $blogs->links() }}
        </div>
        @endif
    </div>
</section>

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