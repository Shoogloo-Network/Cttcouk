@extends('layouts.app')
@section('content')
    @include('common/trainline')
    <section class="popular-bg2 fadeInUp animated">
        <div class="container">
            <h1 class="heading mb-4">{{ $pageDetail['title'] }}</h1>
            <div class="row">
                <div class="col-md-12 tracking">
                    <p>{!! $pageDetail['description'] !!}</p>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </section>
    <section class="popular-bg2 fadeInUp animated">
        <div class="container">
            <div class="row">
                @foreach ($data as $provider)
                    <div class="col-md-3 plr-0 flex-none">
                        <div class="column-inner">
                            <div class="column-wrapper">
                                <div class="banner-img">
                                    <img src="/assets/images/cttimg/{{ $provider['logo'] }}"alt="{{ $provider['logo'] }}">
                                </div>
                                <div class="heading2">{{ $provider['name'] }}</div>
                                <div class="banner-txt">{!! $provider['shortdesc'] !!}</div>
                                <div class="view-box">
                                    <a class="view-btn"
                                        href="{{ route('company.rail.detail', [$provider['slug']]) . '.html' }}"
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
@endsection
