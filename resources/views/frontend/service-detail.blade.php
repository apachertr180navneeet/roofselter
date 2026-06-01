@extends('frontend.layout.app')
@section('meta_title', $service->meta_title ?: ($service->title . ' | ' . get_setting('website_name')))
@section('meta_description', $service->meta_description ?: $service->short_description)
@section('meta_keywords', $service->meta_keywords)
@section('content')
<section class="page-header">
    <div class="container">
        <div class="page-header__inner">
            <h2>{{ $service->title }}</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-chevron-right"></span></li>
                <li>{{ $service->title }}</li>
            </ul>
        </div>
    </div>
</section>

<section class="service-detail">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="service-detail__left">
                    @if($service->image)
                    <div class="service-detail__img">
                        <img src="{{ asset('img/'.$service->image) }}" alt="{{ $service->title }}">
                    </div>
                    @endif
                    <h3>{{ $service->subtitle ?? $service->title }}</h3>
                    <p>{!! $service->description !!}</p>

                    @if($service->subtitle2)
                        <h4>{{ $service->subtitle2 }}</h4>
                    @endif

                    @if($service->features->count() > 0)
                    <div class="service-detail__features mt-4">
                        <h4>{{ $service->features_headings ?? 'Key Features' }}</h4>
                        <ul>
                            @foreach($service->features as $feature)
                            <li><span class="icon-verified"></span> {{ $feature->title }}: {{ $feature->description }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($service->benefits->count() > 0)
                    <div class="service-detail__benefits mt-4">
                        <h4>{{ $service->benefits_headings ?? 'Benefits' }}</h4>
                        <ul>
                            @foreach($service->benefits as $benefit)
                            <li><span class="icon-verified"></span> {{ $benefit->title }}: {{ $benefit->description }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($service->essentials->count() > 0)
                    <div class="service-detail__essentials mt-4">
                        <h4>{{ $service->essentials_headings ?? 'Essentials' }}</h4>
                        <ul>
                            @foreach($service->essentials as $essential)
                            <li><span class="icon-verified"></span> {{ $essential->title }}: {{ $essential->description }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($service->faqs->count() > 0)
                    <div class="service-detail__faqs mt-4">
                        <h4>FAQ</h4>
                        <div class="accrodion-grp">
                            @foreach($service->faqs as $faq)
                            <div class="accrodion {{ $loop->first ? 'active' : '' }}">
                                <div class="accrodion-title"><h4>{{ $faq->question }}</h4></div>
                                <div class="accrodion-content"><div class="inner"><p>{{ $faq->answer }}</p></div></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="service-detail__cta mt-4">
                        <a href="{{ route('home.contact-us') }}" class="thm-btn">Get a Quote <span class="icon-next1"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="service-detail__right">
                    @if($relatedServices->count() > 0)
                    <div class="service-detail__related">
                        <h4>Related Services</h4>
                        <ul>
                            @foreach($relatedServices as $related)
                            <li><a href="{{ route('home.service-detail', $related->slug) }}">{{ $related->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
