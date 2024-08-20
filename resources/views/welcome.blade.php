@extends('layouts.app')
@section('content')
    @include('common/trainline')
    <section class="section-gray fadeInUp animated">
        <div class="container">
            <h1 class="heading mb-3">{{ $pageDetail->title }}</h1>
            <div class="row">
                @foreach ($citieshome as $cities)
                    <div class="col-md-4 col-sm-12 plr-0">
                        <div class="column-inner">
                            <div class="column-wrapper">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/images/cttimg/' . $cities->smallbanner) }}"
                                        title="{{ $cities->name }}" width="80%" height="70%">
                                </div>
                                <div class="heading3">Cheap Train Tickets to {{ $cities->name }}</div>
                                <div class="banner-txt">{!! $cities->shortdesc !!}</div>
                                <div class="view-box">
                                    <a class="view-btn" href="{{ '/trains-to-' . $cities->slug }}.html " title="">View
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="clear"></div>
    </section>

    <section class="popular-bg fadeInUp animated">
        <div class="container">
            <div class="shortcode_title">
                <div class="title_subtitle">Book Cheap Train Tickets to the Most</div>
                <h2 class="title_primary">Popular Train Routes in the United Kingdom</h2>
                <span class="line_after_title"></span>
            </div>
            <div class="row">
                @foreach ($trainroutes as $routes)
                    @php
                        $cities = explode('-to-', $routes->slug);
                    @endphp
                    <div class="col-md-3 plr-0 flex-none">
                        <div class="column-inner">
                            <div class="column-wrapper">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/images/cttimg/' . $routes->logo) }}"
                                        title="{{ $routes->name }}" width="80%" height="70%">
                                </div>
                                <div class="heading4">{{ $routes->name }} Train</div>
                                <div class="banner-txt text-justify">{!! substr($routes->shortdesc, 0, 160) !!}</div>
                                <div class="view-box">
                                    <a class="view-btn"
                                        href="{{ '/trains-to-' . $cities[1] . '/' . $routes->slug . '-train' }}.html"
                                        title="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
        <div class="clear"></div>
    </section>

    <section class="popular-bg2 fadeInUp animated">
        <div class="container">
            <div class="title_subtitle">Find Out UK's</div>
            {{-- <h2 class="title_primary">Top Cheap Travel Ticket Providers</h2> --}}
            <h2 class="heading mb-3">Top Cheap Travel Ticket Providers</h2>
            <div class="imageslide-container">
                <div class="imageSlide">
                    <a href="/rail-providers/caledonian-sleeper.html"><img
                            src="/assets/images/cttimg/caledonian-sleeper-370x370.jpg" style="width:150px"
                            alt="Caledonian Sleeper"></a>
                </div>
                <div class="imageSlide">
                    <a href="/rail-providers/london-north-eastern-railway.html"><img
                            src="/assets/images/cttimg/lner-370x370.jpg" style="width:150px"
                            alt="London North Eastern Railway"></a>
                </div>
                <div class="imageSlide">
                    <a href="/bus-providers/megabus.html"><img src="/assets/images/cttimg/megabus-370x370.jpg"
                            style="width:150px" alt="megabus"></a>
                </div>
                <div class="imageSlide">
                    <a href="/bus-providers/national-express-coaches.html"><img
                            src="/assets/images/cttimg/national_express-370x370.jpg" style="width:150px"
                            alt="National Express"></a>
                </div>
                <div class="imageSlide">
                    <a href="/bus-providers/eurolines.html"><img src="/assets/images/cttimg/eurolines-370x370.jpg"
                            style="width:150px" alt="Eurolines"></a>
                </div>
                <div class="imageSlide">
                    <a href="/travel-agents/the-trainline.html"><img src="/assets/images/cttimg/trainline-370x370.jpg"
                            style="width:150px" alt="The Trainline"></a>
                </div>
                <div class="imageSlide">
                    <a href="/travel-agents/raileasy.html"><img src="/assets/images/cttimg/raileasy-370X370.jpg"
                            style="width:150px" alt="Raileasy"></a>
                </div>
            </div>
            <div class="clear"></div>
    </section>

    <section class="section-gray fadeInUp animated">
        <div class="container">
            <div class="col-md-12 tracking">
                {!! $pageDetail->description !!}
            </div>
            <div class="accordion-box">
                {{-- <h2 class="heading mt-4">Guide to Cheap Train Tickets - Search, Compare, Book and Travel</h2> --}}
                <h2 class="heading mt-3">Guide to Cheap Train Tickets - Search, Compare, Book and Travel</h2>
                <div class="accordion" id="accordionExample">
                    @foreach ($guideData as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                    aria-controls="collapse{{ $faq->id }}">
                                    {{ $faq->title }}
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! $faq->description !!}
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </section>

    <section class="fadeInUp animated">
        <div class="container">
            {{-- <h3 style="text-align:center; margin-top: 1rem !important;" class="mb-2">Deals, Discounts & Coupons</h3> --}}
            <h3 class="heading mb-3">Deals, Discounts & Coupons</h3>
            <div class="row">

                <div class="col-md-3 plr-0 flex-none">
                    <div class="column-inner">
                        <div class="column-wrapper">
                            <div class="banner-img">
                                <img src="{{ asset('assets/images/cttimg/trainline-370x370.jpg') }}" title="trainline"
                                    width="80%" height="70%">
                            </div>
                            <div class="heading2">The Trainline</div>
                            <div class="banner-txt">Save 51% on Advance Ticket Bookings at the Trainline.com website.</div>
                            <div class="view-box">
                                <a class="view-btn" href="{{ url('/travel-agents/the-trainline.html') }}"
                                    title="">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 plr-0 flex-none">
                    <div class="column-inner">
                        <div class="column-wrapper">
                            <div class="banner-img">
                                <img src="{{ asset('assets/images/cttimg/eurolines-370x370.jpg') }}" title="trainline"
                                    width="80%" height="70%">
                            </div>
                            <div class="heading2">Eurolines</div>
                            <div class="banner-txt">Eurolines UK Deals – Start your journey from €5 in all of Europe.</div>
                            <div class="view-box">
                                <a class="view-btn" href="{{ url('/bus-providers/eurolines.html') }}"
                                    title="Eurolines">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 plr-0 flex-none">
                    <div class="column-inner">
                        <div class="column-wrapper">
                            <div class="banner-img">
                                <img src="{{ asset('assets/images/cttimg/national_express-370x370.jpg') }}"
                                    title="trainline" width="80%" height="70%">
                            </div>
                            <div class="heading2">National Express</div>
                            <div class="banner-txt">National Express Coaches – Buy Senior Coach Cards for Savings.</div>
                            <div class="view-box">
                                <a class="view-btn" href="{{ url('/bus-providers/national-express-coaches.html') }}"
                                    title="national express coaches">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 plr-0 flex-none">
                    <div class="column-inner">
                        <div class="column-wrapper">
                            <div class="banner-img">
                                <img src="{{ asset('assets/images/cttimg/Rail-Europe-logo.png') }}" title="trainline"
                                    width="80%" height="70%">
                            </div>
                            <div class="heading2">Rail Europe</div>
                            <div class="banner-txt">The easiest way to buy European train & bus tickets online..</div>
                            <div class="view-box">
                                <a class="view-btn" href="{{ url('/travel-agents/rail-europe.html') }}"
                                    title="">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <div class="clear"></div>
    </section>


    <section class="section-gray fadeInUp animated">
        <div class="container">
            <div class="col-md-12 tracking">
                {!! $pageDetail->description !!}
            </div>
            <div class="accordion-box">
                {{-- <h2 class="heading mt-4">Cheap Train Tickets - FAQs</h2> --}}
                <h2 class="heading mt-3">Cheap Train Tickets - FAQs</h2>
                <div class="accordion" id="accordionExample">
                    @foreach ($faqData as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                    aria-controls="collapse{{ $faq->id }}">
                                    {{ $faq->title }}
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! $faq->description !!}
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </section>



    {{-- <section class="section-gray2 fadeInUp animated">
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
                                <div class="glsr-review-date"><span>{{ $review->created_at->format('d F Y') }}</span></div>
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
        </div>
        <div class="clear"></div>
    </section> --}}
    @include('common/reviewform')
@endsection
