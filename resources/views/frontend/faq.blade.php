@extends('frontend.layout.app')
@section('meta_title', 'FAQ | ' . (get_setting('website_name') ?: 'RoofShelter'))
@section('meta_description', 'Frequently asked questions about our roofing services.')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="page-header__inner">
            <h2>FAQ</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-chevron-right"></span></li>
                <li>FAQ</li>
            </ul>
        </div>
    </div>
</section>

<section class="faq-page">
    <div class="container">
        @if($generalFaqs->count())
        <div class="faq-group mb-5">
            <h3 class="faq-group__title">General</h3>
            <div class="accrodion-grp" data-grp-name="general-faq">
                @foreach($generalFaqs as $index => $faq)
                <div class="accrodion {{ $loop->first ? 'active' : '' }}">
                    <div class="accrodion-title">
                        <h4>{{ $faq->question }}</h4>
                    </div>
                    <div class="accrodion-content" style="{{ $loop->first ? 'display: block;' : 'display: none;' }}">
                        <div class="inner">
                            <p>{{ $faq->answer }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if($serviceFaqs->count())
            @foreach($serviceFaqs as $serviceTitle => $faqs)
            <div class="faq-group mb-5">
                <h3 class="faq-group__title">{{ $serviceTitle }}</h3>
                <div class="accrodion-grp" data-grp-name="service-faq-{{ \Illuminate\Support\Str::slug($serviceTitle) }}">
                    @foreach($faqs as $index => $faq)
                    <div class="accrodion {{ $loop->first ? 'active' : '' }}">
                        <div class="accrodion-title">
                            <h4>{{ $faq->question }}</h4>
                        </div>
                        <div class="accrodion-content" style="{{ $loop->first ? 'display: block;' : 'display: none;' }}">
                            <div class="inner">
                                <p>{{ $faq->answer }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        @endif

        @if($industryFaqs->count())
            @foreach($industryFaqs as $industryTitle => $faqs)
            <div class="faq-group mb-5">
                <h3 class="faq-group__title">{{ $industryTitle }}</h3>
                <div class="accrodion-grp" data-grp-name="industry-faq-{{ \Illuminate\Support\Str::slug($industryTitle) }}">
                    @foreach($faqs as $index => $faq)
                    <div class="accrodion {{ $loop->first ? 'active' : '' }}">
                        <div class="accrodion-title">
                            <h4>{{ $faq->question }}</h4>
                        </div>
                        <div class="accrodion-content" style="{{ $loop->first ? 'display: block;' : 'display: none;' }}">
                            <div class="inner">
                                <p>{{ $faq->answer }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        @endif

        @if(!$generalFaqs->count() && !$serviceFaqs->count() && !$industryFaqs->count())
        <div class="text-center py-5">
            <h4>No FAQs available at the moment.</h4>
            <p>Please check back later or <a href="{{ route('home.contact-us') }}">contact us</a> for any questions.</p>
        </div>
        @endif
    </div>
</section>
@endsection