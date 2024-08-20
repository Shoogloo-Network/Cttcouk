@extends('layouts.app')
@section('content')
    @if($pageDetail->topbanner_image)
        <div class="container">
        @if ($pageDetail->merchant_link)
            <a href="{{$pageDetail->merchant_link}}">
            <img width="100%" src="/assets/images/cttimg/{{ $pageDetail->topbanner_image }}" style="margin-top:73px" alt="">
            </a>
        @else
            <img width="100%" src="/assets/images/cttimg/{{ $pageDetail->topbanner_image }}" style="margin-top:73px" alt="">
        @endif
	</div>
    @else
        @if ($pageId == '32' && $slug == 'raileasy')
            @include('common/raileasy')
        @else
            @include('common/trainline')
        @endif
    @endif

    @if(count($dealsData)>0)
    <section class="blog-section fadeInUp animated">
            <div class="container">
                <div class="heading">Latest Deals, Offers, Coupons and Discount Codes in {{ $otaData->name }}</div>
                @include('common/deals')
            </div>
        <div class="clear"></div>
    </section>
    @endif
    <section class="section-gray fadeInUp animated">
        <div class="container">
            <h1 class="heading mb-5">{{ $otaData->name }} Tickets, Information, Timetable and Destinations</h1>
            <div class="row">
                <div class="col-md-12 tracking" id="locateRM">
                    <a href="https://www.cheaptrainitickets.co.uk/" target="_blank">
                        <img height="347" src="/assets/images/cttimg/{{ $pageDetail->banner }}"
                            class="vc_single_image-img attachment-full" alt="{{$otaData->name }}">
                    </a>

                    <div class="slide-read-more"> {!! $pageDetail->description !!} </div>
                    <div class="slide-read-more-button read-more-button">Read More</div>
                    <div class="slide-read-more-button">Read Less</div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </section>
    @if(count($popData)>0)
    <section class="section-gray fadeInUp animated">
        <div class="container">
            <h3 class="heading mb-4">{{ $otaData->name }} Top Routes</h3>
            <div class="row">
                @foreach ($popData as $routes)
                    <div class="col-md-3 plr-0 flex-none">
                        <div class="column-inner">
                            <div class="column-wrapper">
                                <div class="banner-img">
                                    <img src="/assets/images/cttimg/{{ $routes->route_logo }}"
                                        alt="{{ $routes->route_name }}">
                                </div>
                                <div class="heading2 min-height">{{ $routes->route_name }} Train</div>
                                <div class="banner-txt" style="text-align: justify"> {!! substr($routes->route_shdesc, 0, 212) !!}</div>
                                <div class="view-box">
                                    <a class="view-btn"
                                        href="{{ url('trains-to-'. $routes->route_slug . '.html') }}"
                                        title="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="clear"></div>
    </section>
    @endif
    @if(count($attrData)>0)
    <section class="section-gray fadeInUp animated">
        <div class="container">
            <h3 class="heading mb-4">{{ $otaData->name }}: Collection of Brands</h3>
            <div class="row">
                @foreach ($attrData as $attractions)
                    <div class="col-md-4 col-sm-12 plr-0">
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

    @if( $otaData->name != 'Marriott' && $otaData->name != 'Expedia' )
    <section class="section-gray fadeInUp animated">
        <div class="container">
            <h3 class="heading mb-4">How to Get Cheap {{ $otaData->name }} Tickets?</h3>
            @include('common/tickets')
        </div>
        <div class="clear"></div>
    </section>
    <section class="popular-bg2 fadeInUp animated">
        <div class="container">
            <div class="row">
                <div class="heading mb-4">{{ $otaData->name }} Seating Classes</div>
                <div class="col-sm-4 mb-5">
                    <img src="/assets/images/cttimg/{{ $pageDetail->banner }}" class="megaBusimg" alt="MegaBus Tickets">
                </div>
                <div class="col-sm-4">
                    {!! $pageDetail->merchant_details !!}
                    {!! $pageDetail->search_right !!}
                </div>
                <div class="col-sm-4">
                    {!! $pageDetail->rightbanner_code !!}
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </section>
    @endif

    <?php if( count($faqData) > 0 ){ ?>
    <section class="section-gray fadeInUp animated">
        <div class="container">
            <div class="accordion-box">
                <h3 class="heading mt-4">{{ $otaData->name }} FAQs</h3>
                @include('common/faqs')
            </div>
        </div>
        <div class="clear"></div>
    </section>
    <?php } ?>
    @include('common/reviewform')
@endsection
