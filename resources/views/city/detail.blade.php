@extends('layouts.app')
@section('content')
    @include('common/trainline')
    @if (count($dealsData) > 0)
        <section class="blog-section fadeInUp animated">
            <div class="container">
                <h2 class="heading mb-4">Latest Deals, Offers, Coupons and Discount Codes in {{ $pageData->name }}</h2>
                @include('common/deals')
            </div>
            <div class="clear"></div>
        </section>
    @endif
    <section class="section-gray fadeInUp animated">
        <div class="container">
            <h1 class="heading mb-4">Trains to {{ $pageData->name }} | Find Cheap Train Tickets to {{ $pageData->name }},
                Schedules, Fare
                &amp; More</h1>
            <div class="row">
                <div class="col-md-12 tracking">
                    <div class="tracking-imgbox">
                        <a href="{{ URL::to($pageDetail->merchant_link) }}" target="_blank">
                            <img max-width:"100%" height="auto" src="/assets/images/cttimg/{{ $pageDetail->banner }}"
                                class="vc_single_image-img attachment-full"
                                alt="Cheap Train Tickets to {{ $pageData->name }}">
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
    @if (count($routeData) > 0)
        <section class="section-gray fadeInUp animated">
            <div class="container">
                <h3 class="heading mb-4">Popular Train Routes to {{ $pageData->name }}</h3>
                <div class="row">
                    @foreach ($routeData as $routes)
                        @php
                            $cities = explode('-to-', $routes->route_slug);
                        @endphp
                        <div class="col-md-3 plr-0 flex-none">
                            <div class="column-inner">
                                <div class="column-wrapper">
                                    <div class="banner-img">
                                        <img src="{{ asset('assets/images/cttimg/' . $routes->route_logo) }}"
                                            alt="{{ $routes->route_name }}">
                                    </div>
                                    <div class="heading4">{{ $routes->route_name }} Train</div>
                                    <div class="banner-txt" style="text-align: justify">{!! substr($routes->route_shdesc, 0, 212) !!}</div>
                                    <div class="view-box">
                                        <a class="view-btn"
                                            href="{{ url('trains-to-' . $cities[1] . '/' . $routes->route_slug . '-train.html') }}"
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
    <section class="popular-bg2 fadeInUp animated">
        <div class="container">
            <h3 class="heading mb-4">Popular Train Companies to Book Train Tickets to {{ $pageData->name }}</h3>
            <div class="row">
                @foreach ($providerData as $companies)
                    <div class="col-md-3 plr-0 flex-none">
                        <div class="column-inner">
                            <div class="column-wrapper">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/images/cttimg/' . $companies->provider_logo) }}"
                                        alt="{{ $companies->provider_name }}" height="370" width="370">
                                </div>
                                <div class="heading4">{{ $companies->provider_name }}</div>
                                <div class="banner-txt">{!! $companies->provider_shdesc !!}</div>
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
    @if (count($attrData) > 0)
        <section class="section-gray fadeInUp animated">
            <div class="container">
                <h2 class="heading mb-1">{{ $pageData->name }} Attractions and Things to Do</h2>
                <p style="text-align:center">There are a number of exciting attractions to visit in {{ $pageData->name }},
                    some
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
                <h3 class="heading mt-4">{{ $pageData->name }} FAQs</h3>
                @include('common/faqs')
            </div>
        </div>
        <div class="clear"></div>
    </section>
    <?php } ?>

    <?php if( count($reviews) > 0 ){ ?>
    <section class="section-gray2 fadeInUp animated">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="heading-section">Reviews</h3>
                    <div class="review-box">
                        @foreach ($reviews as $review)
                            <div class="glsr-review">
                                <div class="glsr-review-title">
                                    <h3>{{ $review->title }}</h3>
                                </div>
                                <div class="glsr-review-rating">
                                    <div class="glsr-stars"><span class="screen-reader-text">5.0 rating</span>
                                        <div class="fa {{ $review->rating >= 1 ? 'fa-star' : 'fa-star-o' }}"
                                            aria-hidden="true"></div>
                                        <div class="fa {{ $review->rating >= 2 ? 'fa-star' : 'fa-star-o' }}"
                                            aria-hidden="true"></div>
                                        <div class="fa {{ $review->rating >= 3 ? 'fa-star' : 'fa-star-o' }}"
                                            aria-hidden="true"></div>
                                        <div class="fa {{ $review->rating >= 4 ? 'fa-star' : 'fa-star-o' }}"
                                            aria-hidden="true"></div>
                                        <div class="fa {{ $review->rating >= 5 ? 'fa-star' : 'fa-star-o' }}"
                                            aria-hidden="true"></div>
                                    </div>
                                </div>
                                <div class="glsr-review-date"><span>{{ $review->created_at->format('d F Y') }}</span>
                                </div>
                                <div class="glsr-review-assigned_to"><span>Review of <a
                                            href="https://www.splitsaving.co.uk">Split
                                            Saving</a></span></div>
                                <div class="glsr-review-content" id="ShowLess">{!! Str::limit($review->description, 300) !!}...
                                    <a style="cursor:pointer">Show More</a>
                                </div>
                                <div class="glsr-review-content" id="ShowMore" style="display:none">
                                    {!! $review->description !!}...<a style="cursor:pointer">Show Less</a></div>
                                <div class="glsr-review-author"><span>{{ $review->name }}</span></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="clear"></div>
    </section>
    <?php } ?>

    @include('common/reviewform')
@endsection
