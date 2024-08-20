@extends('layouts.app')
@section('content')
    @include('common/trainline')
    @if (count($dealsData) > 0)
        <section class="blog-section fadeInUp animated">
            <div class="container">
                <h2 class="heading mb-4">Coupons, Deals, Vouchers and Discount Codes</h2>
                @include('common/deals')
            </div>
            <div class="clear"></div>
        </section>
    @endif

    <section class="section-gray fadeInUp animated">
        <div class="container">
            <h1 class="heading mb-4">{{ $routeData->name }} Trains | Find {{ $routeData->name }} Cheap Train Tickets,
                Schedules, Fares & More</h1>
            <div class="row">
                <div class="col-md-12 tracking">
                    <div class="tracking-imgbox">
                        <a href="{{ URL::to($pageDetail->merchant_link) }}" target="_blank">
                            <img
                                src="{{ url('/assets/images/cttimg/' . $pageDetail->banner) }}"
                                class="vc_single_image-img attachment-full" alt="{{ $routeData->name }}Cheap Train Ticket">
                        </a>
                    </div>
                    <div class="slide-read-more" id="locateRM"> {!! $pageDetail->description !!} </div>
                    <div class="slide-read-more-button read-more-button">Read More</div>
                    <div class="slide-read-more-button">Read Less</div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </section>
    <section class="popular-bg2 fadeInUp animated">
        <div class="container">
            <h3 class="heading mb-4">Popular Train Companies to Book {{ $routeData->name }} Train Tickets</h3>
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
                                <div class="banner-txt">{!! substr($companies->provider_shdesc, 0, 160) !!}</div>
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

    <?php if( count($faqData) > 0 ){ ?>
    <section class="section-gray fadeInUp animated">
        <div class="container">
            <div class="accordion-box">
                <h3 class="heading mt-4">Learn More About {{ $routeData->name }}</h3>
                @include('common/faqs')
            </div>
        </div>
        <div class="clear"></div>
    </section>
    <?php } ?>

    @include('common/reviewform')
@endsection
