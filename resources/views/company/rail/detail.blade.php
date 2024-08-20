@extends('layouts.app')
@section('content')
    @if ($pageId == '32' && $slug == 'raileasy')
        @include('common/raileasy')
    @else
        @include('common/trainline')
    @endif
    @if (count($dealsData) > 0)
        <section class="blog-section fadeInUp animated">
            <div class="container">
                <div class="heading">{{ $railData->name }} Discount Codes and Deals for 2024</div>
                @include('common/deals')
            </div>
            <div class="clear"></div>
        </section>
    @endif

    <section class="section-gray fadeInUp animated">
        <div class="container">
            <h1 class="heading mb-5">Book Cheap {{ $railData->name }} Train Tickets | Find Schedules, Fares & More</h1>
            <div class="row">
                <div class="col-md-12 tracking" id="locateRM">
                    <a href="{{ URL::to($pageDetail->merchant_link) }}" target="_blank">
                        <img width="100%" height="347" src="/assets/images/cttimg/{{ $pageDetail->banner }}"
                            class="vc_single_image-img attachment-full" alt="{{ $railData->name }}">
                    </a>

                    <div class="slide-read-more"> {!! $pageDetail->description !!} </div>
                    <div class="slide-read-more-button read-more-button">Read More</div>
                    <div class="slide-read-more-button">Read Less</div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </section>

    <section class="section-gray fadeInUp animated">
        <div class="container">
            <h3 class="heading mb-4">How to Get Cheap {{ $railData->name }} Tickets?</h3>
            @include('common/tickets')
        </div>
        <div class="clear"></div>
    </section>
    @if ($pageDetail->topbanner_code != '' || $pageDetail->search_right != '' || $pageDetail->rightbanner_code != '')
        <section class="popular-bg2 fadeInUp animated">
            <div class="container">
                <div class="row">
                    <div class="heading mb-4">{{ $railData->name }} Seating Classes</div>
                    <div class="col-sm-4">
                        <img src="/assets/images/cttimg/{{ $pageDetail->banner }}" class="megaBusimg" alt="MegaBus Tickets">
                    </div>
                    <div class="col-sm-4">
                        {!! $pageDetail->topbanner_code !!}
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
                <h3 class="heading mt-4">More About {{ $railData->name }}</h3>
                @include('common/faqs')
            </div>
        </div>
        <div class="clear"></div>
    </section>
    <?php } ?>
    @include('common/reviewform')
@endsection
