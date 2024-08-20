<?php
use App\Models\Footerlink;
$footr_others = Footerlink::where(['col_head' => 'others', 'status' => '1'])->get();
?>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-6">
            <h3 class="footer-title">Top Countries</h3>
            <ul class="list-arrow">
                <li><a href="{{ url('countries/latvia.html') }}">Trains to Latvia</a></li>
                <li><a href="{{ url('countries/norway.html') }}">Trains to Norway</a></li>
                <li><a href="{{ url('countries/luxembourg.html') }} ">Trains to Luxembourg</a></li>
                <li><a href="{{ url('/countries/lithuania.html') }}">Trains to Lithuania</a></li>
                <li><a href="{{ url('/countries/poland.html') }}">Trains to Poland</a></li>
                <li><a href="{{ url('/countries/italy.html') }}">Trains to Italy</a></li>
                <li><a href="{{ url('/countries.html') }}">Others</a></li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-6 col-6">
            <h3 class="footer-title">Top Cities</h3>
            <ul class="list-arrow">
                <li><a href="{{ url('/trains-to-london.html') }}">Trains to London</a></li>
                <li><a href="{{ url('/trains-to-birmingham.html') }}">Trains to Birmingham</a></li>
                <li><a href="{{ url('/trains-to-liverpool.html') }}">Trains to Liverpool</a></li>
                <li><a href="{{ url('/trains-to-cardiff.html') }}">Trains to Cardiff</a></li>
                <li><a href="{{ url('/trains-to-aberdeen.html') }}">Trains to Aberdeen</a></li>
                <li><a href="{{ url('/trains-to-blackpool.html') }}">Trains to Blackpool</a></li>
                <li><a href="{{ url('cities.html') }}">Others</a></li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-6 col-6">
            <h3 class="footer-title">Top Routes</h3>
            <ul class="list-arrow">
                <li><a href="{{ url('/trains-to-edinburgh/london-to-edinburgh-train.html') }}">London to Edinburgh</a>
                </li>
                <li><a href="{{ url('/trains-to-york/london-to-york-train.html') }}">London to York</a></li>
                <li><a href="{{ url('/trains-to-newcastle/london-to-newcastle-train.html') }}">London to Newcastle</a>
                </li>
                <li><a href="{{ url('/trains-to-edinburgh/aberdeen-to-edinburgh-train.html') }}">Aberdeen to
                        Edinburgh</a></li>
                <li><a href="{{ url('trains-to-glasgow/aberdeen-to-glasgow-train.html') }}">Aberdeen to Glasgow</a>
                </li>
                <li><a href="{{ url('/trains-to-leeds/aberdeen-to-leeds-train.html') }}">Aberdeen to Leeds</a></li>
                <li><a href="{{ url('/popular-routes.html') }}">Others</a></li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-6 col-6">
            <h3 class="footer-title">Top OTA</h3>
            <ul class="list-arrow">
                <li><a href="{{ url('/travel-agents/the-trainline.html') }}">The Trainline</a></li>
                <li><a href="{{ url('/travel-agents/raileasy.html') }}">Raileasy</a></li>
                <li><a href="{{ url('/travel-agents/expedia.html') }}">Expedia</a></li>
                <li><a href="{{ url('/travel-agents/red-spotted-hanky.html') }}">Red Spotted Hanky</a></li>
                <li><a href="{{ url('/travel-agents/mytrainticket.html') }}">MyTrainTicket</a></li>
                <li><a href="{{ url('/travel-agents/omio.html') }}">Omio</a></li>
                <li><a href="{{ url('/travel-agents.html') }}">Others</a></li>
            </ul>
        </div>

        <div class="col-sm-12">
            <h3 class="footer-title mt-3">Top Bus Providers</h3>
            <div class="footer-link">
                <a href="{{ url('/bus-providers/megabus.html') }}">megabus</a> |
                <a href="{{ url('/bus-providers/national-express-coaches.html') }}">National Express Coaches</a> |
                <a href="{{ url('/bus-providers/arriva-bus.html') }}">Arriva Bus</a> |
                <a href="{{ url('/bus-providers/eurolines.html') }}">Eurolines</a> |
                <a href="{{ url('/bus-providers/oxford-tube.html') }}">Oxford Tube</a> |
                <a href="{{ url('/bus-providers/citylink.html') }}">Citylink</a>
            </div>
        </div>
        <div class="col-sm-12">
            <h3 class="footer-title mt-3">Voucher, Coupon And Discount Codes</h3>
            <div class="footer-link">
                <a href="{{ url('/travel-agents/the-trainline.html') }}">Trainline Discount Codes</a> |
                <a href="{{ url('/bus-providers/national-express-coaches.html') }}">National Express Coaches Discount
                    Codes</a> |
                <a href="{{ url('/bus-providers/megabus.html') }}">Megabus Discount Codes</a> |
                <a href="{{ url('/travel-agents/raileasy.html') }}">RailEasy Discount Codes</a>
            </div>
        </div>
        <div class="col-sm-12">
            <h3 class="footer-title mt-3">Others</h3>
            <div class="footer-link">
                @foreach ($footr_others as $ftrOthK => $ftrV)
                    <a href="{{ URL::to(strtolower($ftrV['urllink'] . '.html')) }}"
                        title="{!! ucwords($ftrV['title']) !!}">{{ ucwords($ftrV['name']) }}</a> |
                @endforeach
                <a href="{{ URL::to('/split')}}" title="Split Train Tickets">Split Train Tickets</a>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <div class="social-icons">
                <a href="https://www.facebook.com/CheapTrainTickets/" target="_blank"><i
                        class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/cheaptraintickets.co.uk/" target="_blank"><i
                        class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/company/cheaptraintickets" target="_blank"><i
                        class="fab fa-linkedin"></i></a>
                <a href="https://blog.cheaptraintickets.co.uk"  target="_blank"><i class="fas fa-edit"></i></a>
            </div>
            <p class="copy-text">Copyright © 2018-24. All Rights Reserved by Cheaptraintickets.co.uk and
                <a href="https://www.shoogloo.com" target="_blank">Shoogloo.com</a> (Shoogloo Network Pvt. Ltd.)
            </p>
        </div>
    </div>
</div>
