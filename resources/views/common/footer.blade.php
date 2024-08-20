<div>
    <div class="container">
        <div class="row">
            @foreach ($result as $nav)
                <div class="col-sm-12">
                    <div>{{ $nav['parent_name'] }}</div>
                    <?php
                    $parent = $nav['parent_name'];
                    switch ($parent) {
                        case 'Home':
                            $prefix = '';
                            $suffix = '';
                            $urlpre = '';
                            break;
                        case 'Split Train Tickets':
                            $prefix = 'Split Train Tickets to ';
                            $suffix = '';
                            $urlpre = '/split-train-tickets-to-';
                            break;
                        case 'Top Routes':
                            $prefix = '';
                            $suffix = ' Trains';
                            $urlpre = '/split-train-ticket/';
                            break;
                        case 'Train Companies':
                            $prefix = '';
                            $suffix = '';
                            $urlpre = '/train-companies/';
                            break;
 			case 'Ferries':
                            $prefix = '';
                            $suffix = '';
                            $urlpre = '/ferries/';
                            break;

                        default:
                            $prefix = '';
                    }
                    ?>
                    @foreach ($nav['children'] as $subnav)
                        <a
                            href="{{ $urlpre . $subnav['child_slug'] }}.html">{{ $prefix . $subnav['child_name'] . $suffix }}</a>
                        |
                    @endforeach
                    <a href="{{ '/' . $nav['parent_slug'] }}.html">View Complete List..</a>
                </div>
            @endforeach
            <div class="col-sm-12">
                <div>Others</div>
                <div class="mb-4">
                    <a href="{{ url('/about-us.html') }}" title="Split your Train Tickets and Save More with Split Saving">About
                        Us</a> |
                    <a href="https://trainsplit.com/contact-us" title="Contact Us - Cheap Train Tickets">Contact
                        Us</a> |
                    <a href="{{ url('/privacy-policy.html') }}" title="Privacy Policy - splitsaving.co.uk">Privacy Policy</a> |
                    <a href="https://trainsplit.com/cookies" title="">Cookie Policy</a> |
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="social-icons">
                    <a href="https://twitter.com/Splittraintick1"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/splittraintickets"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/splittraintickets"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/splittraintickets"><i class="fab fa-linkedin"></i></a>
                </p>
                <p class="col-white fsize14">Copyright © 2018-24. All Rights Reserved by Splittraintickets.net
                    and <a href="https://www.shoogloo.com/" target="_blank"  rel="noopener">Shoogloo.com</a>.</p>
            </div>
        </div>
    </div>
</div>
