@extends('frontend.layout.app')
@section('meta_title', $blog->meta_title ?: ($blog->title . ' | ' . (get_setting('website_name') ?: 'RoofShelter')))
@section('meta_description', $blog->meta_description ?: $blog->short_description)
@section('meta_keywords', $blog->meta_keywords)
@section('content')
<section class="page-header">
    <div class="container">
        <div class="page-header__inner">
            <h2>{{ $blog->title }}</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-chevron-right"></span></li>
                <li><a href="{{ route('home.blog') }}">Projects</a></li>
                <li><span class="icon-chevron-right"></span></li>
                <li>{{ $blog->title }}</li>
            </ul>
        </div>
    </div>
</section>

<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="blog-details__left">
                    <div class="blog-details__img">
                        <img src="{{ $blog->image ? asset('img/'.$blog->image) : asset('assets/img/placeholder-image-3.jpg') }}" alt="{{ $blog->title }}">
                        <div class="blog-details__date">
                            <h4>{{ $blog->created_at->format('d M Y') }}</h4>
                        </div>
                    </div>
                    @if($blog->category)
                    <div class="blog-details__category">
                        <p>{{ $blog->category->category_name }}</p>
                    </div>
                    @endif
                    <div class="blog-details__content">
                        <h3>{{ $blog->title }}</h3>
                        @if($blog->location)
                            <p><strong>Location:</strong> {{ $blog->location }}</p>
                        @endif
                        @if($blog->service_type)
                            <p><strong>Service Type:</strong> {{ $blog->service_type }}</p>
                        @endif
                        @if($blog->completion_date)
                            <p><strong>Completed:</strong> {{ $blog->completion_date }}</p>
                        @endif
                        <div class="blog-details__description">
                            {!! $blog->description ?? $blog->short_description !!}
                        </div>
                    </div>

                    @if($blog->galleryImages->count() > 0)
                    <div class="blog-details__gallery mt-4">
                        <h4>Project Gallery</h4>
                        <div class="row">
                            @foreach($blog->galleryImages as $img)
                            <div class="col-md-4 mb-3">
                                <a href="{{ asset('img/'.$img->image) }}" class="img-popup">
                                    <img src="{{ asset('img/'.$img->image) }}" alt="{{ $img->label ?? 'Gallery Image' }}" class="img-fluid rounded">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="blog-details__right">
                    <div class="blog-details__recent-posts">
                        <h4>Recent Projects</h4>
                        <ul>
                            @foreach($recentPosts as $recent)
                            <li>
                                @if($recent->slug)
                                <h5><a href="{{ route('home.blog-details', $recent->slug) }}">{{ $recent->title }}</a></h5>
                                @else
                                <h5>{{ $recent->title }}</h5>
                                @endif
                                <span>{{ $recent->created_at->format('M d, Y') }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
