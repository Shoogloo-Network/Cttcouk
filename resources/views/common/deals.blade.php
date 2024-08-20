@foreach ($dealsData as $dealRow)
    <div class="row">
        <div class="heading mb-4"></div>
        <div class="col-sm-12">
            <div class="coupon-default">
                <div class="get-deal">
                    @if ($dealRow->discount && $dealRow->discount != 'Get Deal')
                        <div class="discount-text">{{ $dealRow->discount }}</div>
                    @else
                        @if ($pageId != 27 && $pageId != 28 && $pageId != 31)
                            <div class="discount-text">
                                <img width="75" src="/assets/images/cttimg/{{ $pageDetail->logo }}" alt="">
                            </div>
                        @else
                            <div class="discount-text">
                                <img width="75" src="/assets/images/cttimg/ctt-logo.jpg" alt="">
                            </div>
                        @endif
                    @endif
                    <div class="deal-type">{{ ucwords($dealRow->discount_type) }}</div>
                </div>
                <div class="coupon-content">
                    <div class="coupon-header">
                        <div class="title-box">
                            <h3 class="coupon-title">{{ $dealRow->title }}</h3>
                        </div>
                        <div class="coupon-col-1-4">
                            <div class="coupon-code">
                                     <a href="{{ url($dealRow->dealurl != null ? $dealRow->dealurl : $pageDetail->merchant_link ) }}" rel="nofollow"
                                    class="coupon-btn" title="{{ $dealRow->title }}" target="_blank">
                                
                                    <span class="coupon_deal_icon">
                                        <img class="" src="{{ url('/assets/images/cttimg') }}/deal-24.png"
                                            alt="Cheaptraintickets Deal" />
                                    </span>{{ strtoupper($dealRow->discount_tag) }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="extra-content">
                        <div class="col-3-4">
                            <div class="coupon-description">
                                <span class="full-description" id="ShowLess">
                                    <p> {!! substr($dealRow->description, 0, 200) !!} <a style="cursor:pointer">... Show More</a>
                                    </p>
                                </span>
                                <span class="full-description" id="ShowMore" style="display:none">
                                    <p> {!! $dealRow->description !!} <a style="cursor:pointer">Show Less</a></p>
                                </span>
                            </div>
                        </div>
                        <div class="col-1-4">
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
@endforeach
