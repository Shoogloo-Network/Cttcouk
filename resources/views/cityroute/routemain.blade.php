@extends('layouts.app')
@section('content')
    @include('common/trainline')
    <section class="blog-section fadeInUp animated pt130">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="heading mb-4">{{ $pageDetail->title }}</h1>
                    <div class="text-justify">{!! $pageDetail->description !!}</div>
                    <ul class="split-train-list row">
                        @foreach ($data as $route)
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                <a
                                    href="{{ url('trains' . substr($route['slug'], strpos($route['slug'], '-to-')), [$route['slug']]) . '-train.html' }}">{{ $route['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
