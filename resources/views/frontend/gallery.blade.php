@extends('frontend.layouts.app')

@section('title', get_setting('cms_gallery_meta_title', 'Gallery') . ' | ' . get_setting('website_name', 'RoofShelter'))

@section('content')
<div class="padding-rl float-left w-100">
    <div class="home-outer-wrapper float-left w-100 position-relative main-box">
        <section class="float-left w-100 position-relative sub-banner-con br-50 main-box">
            <div class="main-container">
                <div class="sub-banner-inner-con position-relative z-1">
                    <h1 class="text-white text-size-90">Gallery</h1>
                    <p class="text-white">Explore Our Gallery and Discover the Craftsmanship, Quality, <br> and Attention to Detail in Every Project.</p>
                    <div class="breadcrumb-con d-inline-block">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="spacer"></div>

<section class="float-left w-100 position-relative gallery-con padding-top padding-bottom main-box text-center">
    <div class="main-container wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
        <div class="heading-title-con text-center">
            <span class="special-text d-block wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">Projects</span>
            <h2 class="text-size-60 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">Explore Our Projects <br> Through Stunning Visuals</h2>
            <p class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">A Visual Journey Through Our Most Impressive Projects.</p>
        </div>
        <div class="tabs-box tabs-options wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.05s">
            <ul class="nav nav-tabs">
                <li><a class="active" data-toggle="tab" href="#tabAll">All</a></li>
                @foreach($projects as $project)
                <li><a data-toggle="tab" href="#tab{{ $project->id }}">{{ $project->title }}</a></li>
                @endforeach
            </ul>
            <div class="tab-content">
                <div id="tabAll" class="tab-pane fade in active show">
                    <div class="row">
                        @forelse($galleryImages as $image)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="gallery-img-con">
                                <a href="#" class="zoom" data-toggle="modal" data-target="#lightbox" data-image="{{ asset('img/'.$image->image) }}">
                                    <img src="{{ asset('img/'.$image->image) }}" alt="{{ $image->label ?? 'gallery image' }}" class="img-fluid br-40">
                                </a>
                                @if($image->label)
                                <p class="mt-2">{{ $image->label }}</p>
                                @endif
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            @foreach($projectImages->take(6) as $idx => $pImage)
                            <div class="col-lg-4 col-md-6 mb-4 d-inline-block">
                                <div class="gallery-img-con">
                                    <a href="#" class="zoom" data-toggle="modal" data-target="#lightbox" data-image="{{ asset('img/'.$pImage->image) }}">
                                        <img src="{{ asset('img/'.$pImage->image) }}" alt="{{ $pImage->label ?? 'project image' }}" class="img-fluid br-40">
                                    </a>
                                    @if($pImage->label)
                                    <p class="mt-2">{{ $pImage->label }}</p>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforelse
                    </div>
                </div>
                @foreach($projects as $project)
                <div id="tab{{ $project->id }}" class="tab-pane fade">
                    <div class="row">
                        @forelse($project->galleryImages as $pImage)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="gallery-img-con">
                                <a href="#" class="zoom" data-toggle="modal" data-target="#lightbox" data-image="{{ asset('img/'.$pImage->image) }}">
                                    <img src="{{ asset('img/'.$pImage->image) }}" alt="{{ $pImage->label ?? $project->title }}" class="img-fluid br-40">
                                </a>
                                @if($pImage->label)
                                <p class="mt-2">{{ $pImage->label }}</p>
                                @endif
                            </div>
                        </div>
                        @empty
                        <div class="col-12"><p>No images for this project.</p></div>
                        @endforelse
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="modal-body">
                <img id="popupImage" src="" alt="gallery image">
            </div>
        </div>
    </div>
</div>

<div class="padding-rl float-left overflow-hidden w-100">
    <section class="float-left w-100 newsletter-con position-relative main-box br-50 bg-blue">
        <div class="main-container">
            <div class="d-flex justify-content-between">
                <div class="newsletter-img-con wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.05s">
                    <figure><img src="{{ asset('assets/images/footer-vector.png') }}" alt=""></figure>
                </div>
                <div class="newsletter-content-con wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.05s">
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

@push('scripts')
<script>
$(function() {
    $('.zoom').on('click', function() {
        var imgSrc = $(this).data('image');
        $('#popupImage').attr('src', imgSrc);
    });
});
</script>
@endpush