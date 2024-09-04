@extends('layouts.app')
@section('content')
    @include('common/trainline')
    @if(count($dealsData)>0)
    <section class="blog-section fadeInUp animated">
            <div class="container">
               <div class="heading">Latest Deals, Offers, Coupons and Discount Codes in {{ $pageData->name }}</div>
                @include('common/deals')
            </div>
        <div class="clear"></div>
    </section>
    @endif
    <section class="section-gray fadeInUp animated">
        <div class="container">
            <h1 class="heading mb-5">Book {{ $pageData->name }} Cheap Train Tickets | Find Schedules, Fares & More</h1>
            <div class="row">
                <div class="col-md-12 tracking" id="locateRM">
                    <a href="{{ URL::to($pageDetail->merchant_link) }}" target="_blank">
                        <img height="347" src="/assets/images/cttimg/{{ $pageDetail->banner }}"
                            class="vc_single_image-img attachment-full"
                            alt="Split Train Tickets to London">
                    </a>

                    <div class="slide-read-more"> {!! $pageDetail->description !!} </div>
                    <div class="slide-read-more-button read-more-button">Read More</div>
                    <div class="slide-read-more-button">Read Less</div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </section>
    <section class="popular-bg2 fadeInUp animated">
        <div class="container">
            <h3 class="heading mb-4">Popular Train Companies to {{ $pageData->name }}</h3>
            <div class="row">
                @foreach ($providerData as $companies)
                    <div class="col-md-3 plr-0 flex-none">
                        <div class="column-inner">
                            <div class="column-wrapper">
                                <div class="banner-img">
                                    <img src="/assets/images/cttimg/{{ $companies->provider_logo }}"
                                        alt="{{ $companies->provider_name }}" height="370" width="370">
                                </div>
                                <div class="heading4">{{ $companies->provider_name }}</div>
                                <div class="banner-txt"> {!! $companies->provider_shdesc !!}</div>
                                <div class="view-box">
                                    <a class="view-btn"
                                        href="{{ url('rail-providers/' . $companies->provider_slug . '.html') }}"
                                        title=" {{ $companies->provider_slug }} train tickets ">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="clear"></div>
    </section>
    @if(count($attrData)>0)
    <section class="section-gray fadeInUp animated">
        <div class="container">
            <h3 class="heading">{{ $pageData->name }} Attractions and Things to Do</h3>
            <p style="text-align:center">There are a number of exciting attractions to visit in {{ $pageData->name }}, some
                of which can be seen below.</p>
            <div class="row">
                @foreach ($attrData as $attractions)
                    <div class="col-md-4 col-sm-12 plr-0 col-4">
                        <div class="column-inner">
                            <div class="column-wrapper">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/images/cttimg/' . $attractions->banner) }}"
                                        title="{{ $attractions->title }}" width="80%" height="70%">
                                </div>
                                <div class="heading2">{{ $attractions->title }}</div>
                                <div class="banner-txt2">{!! $attractions->description !!}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="clear"></div>
    </section>
    @endif
    <?php if( count($faqData) > 0 ){ ?>
    <section class="section-gray fadeInUp animated">
        <div class="container">
            <div class="accordion-box">
                <h3 class="heading mt-4">More About {{ $pageData->name }}</h3>
                @include('common/faqs')
            </div>
        </div>
        <div class="clear"></div>
    </section>
    <?php } ?>
    @include('common/reviewform')
@endsection
