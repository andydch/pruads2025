<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    {{-- <link href="../css2?family=Sofia&display=swap" rel="stylesheet"> --}}
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/odometer.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/plugins/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/fontawesome-pro.css"> 
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/spacing.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/custom-font.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/main.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/aos.css">
    <!-- text animation  -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/content.css">
    <!----->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!----->
     
</head>

<style>
    .dropdown-toggle{
        width: auto; background-color: #ffffff; 
        display: flex; font-size:16px; padding-left:50px; padding-right:50px;
        justify-content: space-between; color:#656565;
        align-items: center;
        height: 50px;
        border: 1px solid #ec1e31;
        border-radius:10px;
    }

    .dropdown-toggle:focus{
        box-shadow: none !important;
    }

    .dropdown-toggle::after {
        display: none;
    }

    .dropdown-menu{
        width: auto;font-size:18px; background-color:#74c5c2; 
            border: 0px solid #ec1e31; border-radius:10px;
            padding-left:40px; padding-right:40px;
        transform: translate3d(0px, 50px, 0px) !important;
    }

    .dropdown-item:focus, .dropdown-item:hover {
        color: #ec1e31;
        background: transparent;
        padding: 10px;
    }

    .dropdown-item {
        display: block;color:#ffffff; 
        width: 100%;
        padding: 10px;
    }

    @media (min-width: 800px) { 
        .cari {width:300px;}
        .bg_ucapan {background: url({{ asset('assets') }}/imgs/img_bg_board.png) fixed top no-repeat;background-size:cover;}
        .bg_thanks {background: url({{ asset('assets') }}/imgs/bg_thanks.png) fixed top no-repeat; background-size:cover;}
        .lebarthanks {width:90%;}
        .lebarlogo {width:60%;}
    }

    @media only screen and (max-device-width: 480px) {
        .cari { font-size:13px; width:150px;}
        .bg_ucapan {background: url({{ asset('assets') }}/imgs/img_bg_board.png) fixed top;background-size:contain;}
        .bg_thanks {background: url({{ asset('assets') }}/imgs/bg_thanks.png) center no-repeat; background-size:cover;}
        .lebarthanks {width:100%;}
        .lebarlogo {width:80%;}
    }

</style>

<body>

    <div class="container">
        <div class="row">
            <div class="testimonial-4__wrapper col-md-8 m-auto">
                <div align="center" class="m-auto" >
                    <img src="{{ asset('assets') }}/imgs/foto_agent.png" width="300" alt="">
                </div>
                                                    
                <div class="team-details__content text-center">
                    <h3 id="agent_name_modal" class="team-details__name text-black">LILIYANA</h3>
                    <span class="team-details__author__position text-black">GREAT ACHIEVERS</span>
                    <div class="text-black m-auto mt-5"> Agency of the Year 2025<br>
                        Top Leader Builder 2024<br>
                        Million Dollar Round Table<br>
                        The President's Club - Leader<br>
                        President's Cabinet's Club - Leader<br>
                        Star Club - Producer
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS here -->
    <script src="{{ asset('assets') }}/js/vendor/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/chroma.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/waypoints.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/meanmenu.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/swiper.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/gsap.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/ScrollSmoother.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/ScrollToPlugin.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/ScrollTrigger.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/SplitText.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/wow.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/magnific-popup.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/type.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/vanilla-tilt.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/nice-select.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/odometer.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/jquery-ui.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/jquery.counterup.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/jarallax.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/parallax-scroll.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/jquery.countdown.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/isotope-docs.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/ajax-form.js"></script>

    <script src="{{ asset('assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/html2canvas.js"></script>
    <script src="{{ asset('assets') }}/js/filesaver.min.js"></script>
    <script src="{{ asset('assets') }}/js/aos.min.js"></script>

    <script src="{{ asset('assets') }}/js/main.js"></script>
    <!--H2 hero animation js-->
    <script src="{{ asset('assets') }}/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/text-animation.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/scripts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>