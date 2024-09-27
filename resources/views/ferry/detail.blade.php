@extends('layouts.app')
@section('content')
    <section class="section-gray herobanner3 fadeInUp animated" style="padding-bottom: 10px !important">
        {{-- <h1 class="heading mb-4">{{ $railcardData->name }} Tickets, Information, Timetable and Destinations</h1> --}}
        <div class="">
            <div class="col-md-12 tracking">
                <a href="https://poferries.jyae.net/c/3882848/170847/3038?subId1=CTT&subId2=1230" target="_blank">
                    <img width="100%" height="auto" src="/assets/images/cttimg/{{ $pageDetail->herobanner }}"
                        class="vc_single_image-img attachment-full desktop-img" alt="{{ $railcardData->name }}">
                    <img width="100%" height="auto" src="/assets/images/cttimg/{{ $pageDetail->mob_herobanner }}"
                        class="vc_single_image-img attachment-full mob-img" alt="{{ $railcardData->name }}">
                </a>
            </div>
        </div>
    </section>

    <section class="section-gray fadeInUp animated" style="padding: 10px 0 !important">
        <div class="container">
            {{-- <div class="row"><a href="https://poferries.jyae.net/c/3882848/170847/3038?subId1=CTT&subId2=1230"
                    target="_blank">
                    <img src="/assets/images/sttimg/po-ferries-booking.jpg" width="100%" height="100%"
                        alt="{{ $railcardData->name }} banner"></a>
            </div> --}}
            <div class="row">
                <div id="ferry-eng">
                    <ul class="tabs">
                        <li class="tab-link active" data-tab="tab1">Return <span>&#8646;</span></li>
                        <li class="tab-link" data-tab="tab2">One Way <span>&#8594;</span></li>
                    </ul>
                    <div id="tab1" class="tab-content active">
                        <div class="list-boxouter">
                            <div class="list-box bg-box">
                                <div class="list-ficons">
                                    <i class="fa fa-route"></i>
                                </div>
                                <div class="">
                                    <div class="level-box">
                                        <label>Route</label>
                                    </div>
                                    <div class="select-box">
                                        <select class="custom-select" style="margin-right: 10px;">
                                            <option value="option1">Dover to Calais</option>
                                        </select>
                                        <span class="custom-select-arrow"><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box bg-box">
                                <div class="list-ficons">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="">
                                    <div class="level-box">
                                        <label>Passenger</label>
                                    </div>
                                    <div class="select-box">
                                        <select class="custom-select">
                                            <option value="option1">Passenger 1</option>
                                        </select>
                                        <span class="custom-select-arrow"><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box bg-box">
                                <div class="list-ficons">
                                    <i class="fa fa-car"></i>
                                </div>
                                <div class="">
                                    <div class="level-box">
                                        <label>Vehicle</label>
                                    </div>
                                    <div class="select-box">
                                        <select class="custom-select">
                                            <option value="option1">Car</option>
                                        </select>
                                        <span class="custom-select-arrow"><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box bg-box">
                                <div class="list-ficons">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="">
                                    <div class="level-box">
                                        <label>Current</label>
                                    </div>
                                    <div class="select-box">
                                        @php $dt = new DateTime(); @endphp
                                        <input class="custom-select custom-select-date" type="date" id="date"
                                            value="@php echo $dt->format('Y-m-d'); @endphp "/>
                                        <span class="custom-select-date-icon"><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box">
                                <button class="btn-custom">Book Now</button>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-content">
                        <div class="list-boxouter">
                            <div class="list-box bg-box">
                                <div class="list-ficons">
                                    <i class="fa fa-route"></i>
                                </div>
                                <div class="">
                                    <div class="level-box">
                                        <label>Route</label>
                                    </div>
                                    <div class="select-box">
                                        <select class="custom-select">
                                            <option value="option1">Route 1</option>
                                            <option value="option2">Route 2</option>
                                            <option value="option3">Route 3</option>
                                        </select>
                                        <span class="custom-select-arrow"><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box bg-box">
                                <div class="list-ficons">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="">
                                    <div class="level-box">
                                        <label>Passenger</label>
                                    </div>
                                    <div class="select-box">
                                        <select class="custom-select">
                                            <option value="option1">Passenger 1</option>
                                            <option value="option2">Passenger 2</option>
                                            <option value="option3">Passenger 3</option>
                                        </select>
                                        <span class="custom-select-arrow"><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box bg-box">
                                <div class="list-ficons">
                                    <i class="fa fa-car"></i>
                                </div>
                                <div class="">
                                    <div class="level-box">
                                        <label>Vehical</label>
                                    </div>
                                    <div class="select-box">
                                        <select class="custom-select">
                                            <option value="option1">Car</option>
                                            <option value="option2">Bus</option>
                                            <option value="option3">Train</option>
                                        </select>
                                        <span class="custom-select-arrow"><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box bg-box">
                                <div class="list-ficons">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="">
                                    <div class="level-box">
                                        <label>Current</label>
                                    </div>
                                    <div class="select-box">
                                        <input class="custom-select custom-select-date" type="date" id="date"
                                            name="date" />
                                        <span class="custom-select-date-icon"><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-box">
                                <button class="btn-custom">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- page description --}}
        </div>
        <div class="clear"></div>
    </section>
    @if(count($dealsData)>0)
    <section class="blog-section fadeInUp animated">
            <div class="container">
                <h2 class="heading mb-4">Latest Deals, Offers, Coupons and Discount Codes in {{ $railcardData->name }}</h2>
                @include('common/deals')
            </div>
        <div class="clear"></div>
    </section>
    @endif
    <section class="section-gray fadeInUp animated">
        <div class="container">
            <h1 class="heading mb-4"> {{ $railcardData->name }} - Ferry Tickets, Prices & Schedules</h1>
            <div class="row">
                <div class="col-md-12 tracking" id="locateRM">
                    <a href="https://www.splitsaving.co.uk/" target="_blank">
                        <img height="347" src="/assets/images/cttimg/{{ $pageDetail->banner }}"
                            class="vc_single_image-img attachment-full" alt="PO Ferries">
                    </a>
                    <div class="slide-read-more"> {!! $pageDetail->description !!} </div>
                    <div class="slide-read-more-button read-more-button">Read More</div>
                    <div class="slide-read-more-button">Read Less</div>

                    <!-- <div class="coupon-description">
                                <span class="full-description" id="ShowLess">
                                    <p> {!! substr($pageDetail->description, 0, 1500) !!} <a class="readbox">... Read More</a></p>
                                </span>
                                <span class="full-description" id="ShowMore" style="display:none">
                                    <p> {!! $pageDetail->description !!} <a class="readbox">Read Less</a></p>
                                </span>
                            </div> -->
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </section>

    <section class="section-gray fadeInUp animated">
        <div class="container">
            <div class="accordion-box">
                <h3 class="heading mt-4">P&O Ferries FAQs</h3>
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
    <script>
        $(document).ready(function() {
            $('.tab-link').on('click', function() {
                var tab = $(this).data('tab');
                $('.tab-content').removeClass('active');
                $('.tab-link').removeClass('active');
                $('#' + tab).addClass('active');
                $(this).addClass('active');
            });
        });
    </script>
    @include('common/reviewform')
@endsection
