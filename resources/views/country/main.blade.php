@extends('layouts.app')
@section('content')
    @include('common/trainline')
    <section class="blog-section fadeInUp animated">
        <div class="container herobanner">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="heading mb-4">{{ $pageDetail['title'] }}</h1>
                    <div class="text-justify">{!! $pageDetail['description'] !!}</div>
                    <ul class="split-train-list row">
                        @foreach ($data as $country)
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                <a href="{{ 'countries/' . $country['slug'] . '.html' }}"> Cheap Trains to
                                    {{ $country['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
