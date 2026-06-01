@extends('frontend.layout.app')
@section('meta_title', 'Our Projects | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', 'Browse our completed roofing projects and portfolio.')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="page-header__inner">
            <h2>Our Projects</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-chevron-right"></span></li>
                <li>Projects</li>
            </ul>
        </div>
    </div>
</section>

<section class="blog-one">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-xl-4 col-lg-4 wow fadeInUp">
                <div class="blog-one__single">
                    <div class="blog-one__single-img">
                        <div class="blog-one__single-img-inner">
                            <img src="{{ $blog->image ? asset('img/'.$blog->image) : asset('assets/img/placeholder-image-3.jpg') }}" alt="{{ $blog->title }}">
                        </div>
                        <div class="date-box">
                            <h4>{{ $blog->created_at->format('d M') }}</h4>
                        </div>
                    </div>
                    <div class="blog-one__single-content">
                        @if($blog->slug)
                        <h2><a href="{{ route('home.blog-details', $blog->slug) }}">{{ $blog->title }}</a></h2>
                        @else
                        <h2>{{ $blog->title }}</h2>
                        @endif
                        <p>{{ \Illuminate\Support\Str::limit($blog->short_description, 100) }}</p>
                        @if($blog->slug)
                        <div class="btn-box">
                            <a href="{{ route('home.blog-details', $blog->slug) }}">Read More <span class="icon-next1"></span></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
