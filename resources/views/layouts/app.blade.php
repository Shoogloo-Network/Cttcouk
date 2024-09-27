<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="/assets/images/cttimg/CTTFavicon.png">
    @if($pageId == 33 || $pageId == 37)
        <meta name="robots" content="noindex">
    @endif
    @if($pageDetail != "" )
    <title>{{ $pageDetail->metatitle }}</title>
    <meta name="description" content="{{ $pageDetail->metadescription }}" />
    <meta name="keywords" content="{{ $pageDetail->metakeyword }}" />
	@else
	<title>@yield('title', 'Default Title')</title>
    <meta name="description" content="@yield('meta-description', 'Default Description')">
    <meta name="keywords" content="@yield('meta-keyword', '')">
    @endif

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Google tag (gtag.js) --> <script async src=https://www.googletagmanager.com/gtag/js?id=G-LRYKRCRRS8></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-LRYKRCRRS8'); </script>

    <!-- Google tag (gtag.js) --> <script async src=https://www.googletagmanager.com/gtag/js?id=AW-11172733581></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-11172733581'); </script>
   <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '734307041543115');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src=https://www.facebook.com/tr?id=734307041543115&ev=PageView&noscript=1/></noscript>
    <!-- End Meta Pixel Code -->
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="verify-admitad" content="f59567e18a" />
    <link rel='stylesheet' href='/assets/styles/css.php' type='text/css'>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WW3Z2DTL');</script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src=https://www.googletagmanager.com/ns.html?id=GTM-WW3Z2DTL
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="wrapper-box">
        @include('common/cttheader')
        @include('layouts/flash-messages')
        @yield('content')
        <footer> @include('common/cttfooter') </footer>
    </div>
	<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Cheap Train Tickets",
      "url": "https://www.cheaptraintickets.co.uk/",
      "logo": "https://www.cheaptraintickets.co.uk/assets/images/ctt-logo.jpg",
      "sameAs": [
        "https://www.facebook.com/CheapTrainTickets/",
        "https://www.instagram.com/cheaptrainticketsuk/",
        "https://twitter.com/Traintickets_UK",
        "https://www.linkedin.com/company/cheaptraintickets"
      ]
    }
    </script>
	</script>
    <script type="application/ld+json">
        {
        "@context": "https://schema.org/",
        "@type": "WebSite",
        "name": "Cheap Train Tickets",
        "alternateName" : "Cheap Train Tickets",
        "url": "https://www.cheaptraintickets.co.uk/"
        }
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script>
        $('#stars li').on('mouseover', function() {
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e) {
                if (e < onStar) {
                    $(this).addClass('hover');
                } else {
                    $(this).removeClass('hover');
                }
            });

        }).on('mouseout', function() {
            $(this).parent().children('li.star').each(function(e) {
                $(this).removeClass('hover');
            });
        });

        $('#stars li').on('click', function() {
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            var msg = "";
            if (ratingValue > 2) {
                msg = "Thanks! You rated this " + ratingValue + " stars.";
            } else {
                msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
            }
            $('#rating').val(ratingValue);
            responseMessage(msg);
        });


        function responseMessage(msg) {
            $('.rating-box').hide();
            $('.success-box').show();
            $('.success-box div.text-message').html(msg);
        }

        $(".blog-button").click(function(event) {
            event.preventDefault();
            var title = $("#title").val();
            var description = $("#description").val();
            var name = $("#name").val();
            var email = $("#email").val();
            var rating = $("#rating").val();

            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,4}$/;

            if (title == "") {
                document.getElementById('title').style.backgroundColor = '#ffc6c6';
                document.getElementById("title").focus();
                return false;
            } else {
                document.getElementById('title').style.backgroundColor = '#fff';
            }

            if (description == "") {
                document.getElementById('description').style.backgroundColor = '#ffc6c6';
                document.getElementById("description").focus();
                return false;
            } else {
                document.getElementById('description').style.backgroundColor = '#fff';
            }

            if (name == "") {
                document.getElementById('name').style.backgroundColor = '#ffc6c6';
                document.getElementById("name").focus();
                return false;
            } else {
                document.getElementById('name').style.backgroundColor = '#fff';
            }

            if (email == "") {
                document.getElementById('email').style.backgroundColor = '#ffc6c6';
                document.getElementById("email").focus();
                return false;
            } else if (!emailPattern.test(email)) {
                document.getElementById('email').style.backgroundColor = '#ffc6c6';
                document.getElementById("email").focus();

                return false;
            } else {
                document.getElementById('email').style.backgroundColor = '#fff';
            }

            if (rating == "") {
                $('.rating-box').show();
                $('.rating-box div.text-message').html("Please rate us to Submit your Review.");
                document.getElementById('goUp').scrollIntoView();
                return false;
            } else {
                document.getElementById('rating').style.backgroundColor = '#fff';
            }

            $.ajax({
                url: "/posts",
                type: "POST",
                data: $('#reviewForm').serialize(),
                success: function(response) {
                    $('.success-box').hide();
                    $("#stars li").removeClass("selected");
                    $('#reviewForm')[0].reset();
                    $('#thnkyou-msg').show();
                    document.getElementById('review-submit-success-msg').scrollIntoView();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle AJAX errors
                    console.error(textStatus + ": " + errorThrown);
                    alert("An error occurred!");
                }
            });

        });
    </script>

    <script>
        const clickableDiv = document.getElementById('ferry-eng');
        clickableDiv.addEventListener('click', function(e) {
            e.preventDefault();
            const newLink = document.createElement('a');
            newLink.href = 'https://poferries.jyae.net/c/3882848/170847/3038?subId1=CTT&subId2=1230';
            newLink.rel = 'nofollow';
            newLink.click();
        });
    </script>
</body>

</html>
