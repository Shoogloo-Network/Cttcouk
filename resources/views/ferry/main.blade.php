@extends('layouts.app')
@section('content')
    <section class="section-gray herobanner fadeInUp animated" style="padding-bottom: 10px !important">
        <div class="container">
            <div class="row">
                <div class="col-md-12 tracking">
                    <a href="https://poferries.jyae.net/c/3882848/170847/3038?subId1=CTT&subId2=1230" target="_blank">
                        <img width="100%" height="100%" src="/assets/images/cttimg/{{ $pageDetail->herobanner }}"
                            class="vc_single_image-img attachment-full" alt="{{ $pageDetail->name }}">
                    </a>
                </div>
            </div>
        </div>
    </section>

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
                @foreach ($data as $operator)
                    <div class="col-md-3 plr-0">
                        <div class="column-inner">
                            <div class="column-wrapper column-25wid column-mferries">
                                <div class="banner-img">
                                    <img src="/assets/images/cttimg/{{ $operator['logo'] }}" alt="">
                                </div>
                                <div class="heading2">{{ $operator['name'] }}</div>
                                <div class="banner-txt">{!! $operator['shortdesc'] !!}</div>
                                <div class="view-box">
                                    <a class="view-btn"
                                        href="https://poferries.jyae.net/c/3882848/170847/3038?subId1=CTT&subId2=1230"
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
@endsection
