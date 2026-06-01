@extends('frontend.layout.app')
@section('meta_title', 'Gallery | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', 'Browse our project gallery showcasing our roofing work.')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="page-header__inner">
            <h2>Gallery</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-chevron-right"></span></li>
                <li>Gallery</li>
            </ul>
        </div>
    </div>
</section>

<section class="gallery-page">
    <div class="container">
        @if($projects->count() > 0 || $projectImages->count() > 0 || $galleryImages->count() > 0)
            @if($projects->count() > 0)
            <div class="section-title text-center sec-title-animation animation-style2">
                <div class="section-title__tagline title-animation"><h4>// Our Projects //</h4></div>
                <h2 class="section-title__title title-animation">Project Gallery</h2>
            </div>
            <div class="row">
                @foreach($projects as $project)
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp">
                    <div class="gallery-one__single">
                        <div class="gallery-one__single-img">
                            <img src="{{ $project->image ? asset('img/'.$project->image) : asset('webtheme/assets/images/portfolio/portfolio-1-1.jpg') }}" alt="{{ $project->title }}">
                            <div class="gallery-one__single-img-overlay">
                                <a href="{{ $project->image ? asset('img/'.$project->image) : asset('webtheme/assets/images/portfolio/portfolio-1-1.jpg') }}" class="img-popup">
                                    <span class="icon-plus"></span>
                                </a>
                            </div>
                        </div>
                        <div class="gallery-one__single-content">
                            @if($project->slug)
                            <h3><a href="{{ route('home.blog-details', $project->slug) }}">{{ $project->title }}</a></h3>
                            @else
                            <h3>{{ $project->title }}</h3>
                            @endif
                            @if($project->location)
                                <p><span class="icon-gps"></span> {{ $project->location }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @if($projectImages->count() > 0)
            <div class="section-title text-center sec-title-animation animation-style2 mt-5">
                <div class="section-title__tagline title-animation"><h4>// Extra Shots //</h4></div>
                <h2 class="section-title__title title-animation">More Photos</h2>
            </div>
            <div class="row">
                @foreach($projectImages as $image)
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp">
                    <div class="gallery-one__single">
                        <div class="gallery-one__single-img">
                            <img src="{{ asset('img/'.$image->image) }}" alt="{{ $image->label ?? 'Gallery image' }}">
                            <div class="gallery-one__single-img-overlay">
                                <a href="{{ asset('img/'.$image->image) }}" class="img-popup">
                                    <span class="icon-plus"></span>
                                </a>
                            </div>
                        </div>
                        @if($image->label)
                        <div class="gallery-one__single-content">
                            <p>{{ $image->label }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @if($galleryImages->count() > 0)
            <div class="section-title text-center sec-title-animation animation-style2 mt-5">
                <div class="section-title__tagline title-animation"><h4>// Gallery //</h4></div>
                <h2 class="section-title__title title-animation">Photo Gallery</h2>
            </div>
            <div class="row">
                @foreach($galleryImages as $image)
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp">
                    <div class="gallery-one__single">
                        <div class="gallery-one__single-img">
                            <img src="{{ asset('img/'.$image->image) }}" alt="{{ $image->caption ?? 'Gallery image' }}" style="height:200px;width:100%;object-fit:cover;">
                            <div class="gallery-one__single-img-overlay">
                                <a href="{{ asset('img/'.$image->image) }}" class="img-popup">
                                    <span class="icon-plus"></span>
                                </a>
                            </div>
                        </div>
                        @if($image->caption)
                        <div class="gallery-one__single-content">
                            <p>{{ $image->caption }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        @else
            <div class="text-center py-5">
                <h4>No gallery images available yet.</h4>
                <p>Please check back later or <a href="{{ route('home.contact-us') }}">contact us</a> for recent project photos.</p>
            </div>
        @endif
    </div>
</section>
@endsection