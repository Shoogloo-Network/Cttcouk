@extends('layouts.app')
@section('content')
    @include('common/raileasy')
    <section class="section-gray fadeInUp animated">
        <div class="container">
            <h1 class="heading mb-4">Split Train Tickets to Top Cities in UK</h1>
            <div class="row">
                @foreach ($citieshome as $cities)
                    <div class="col-md-4 col-sm-12 plr-0">
                        <div class="column-inner">
                            <div class="column-wrapper">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/images/cttimg/' . $cities->smallbanner) }}"
                                        title="{{ $cities->name }}" width="80%" height="70%">
                                </div>
                                <div class="heading2">Cheap Train Tickets to {{ $cities->name }}</div>
                                <div class="banner-txt2">{!! $cities->shortdesc !!}</div>
                                <div class="view-box">
                                    <a class="view-btn" href="{{ '/split-train-tickets-to-' . $cities->slug }}.html "
                                        title="">View More</a>
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
            <!-- <h3 class="heading mb-4">Popular Train Routes in UK</h3> -->
            <h3 style="text-align:center;" class="mb-4">Popular Train Routes in UK</h3>
            <div class="row">
                @foreach ($trainroutes as $routes)
                    <div class="col-md-3 plr-0 flex-none">
                        <div class="column-inner">
                            <div class="column-wrapper">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/images/cttimg/' . $routes->logo) }}"
                                        title="{{ $routes->name }}" width="80%" height="70%">
                                </div>
                                <div class="heading2">{{ $routes->name }}</div>
                                <div class="banner-txt">{!! $routes->shortdesc !!}</div>
                                <div class="view-box">
                                    <a class="view-btn" href="{{ '/split-train-ticket/' . $routes->slug }}.html"
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
    @include('common/reviewform')
@endsection
