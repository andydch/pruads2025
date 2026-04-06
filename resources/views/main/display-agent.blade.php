<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    @livewireStyles

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    {{-- <link href="../css2?family=Sofia&display=swap" rel="stylesheet"> --}}
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/animate.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/plugins/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/fontawesome-pro.css') }}"> 
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/spacing.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/custom-font.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/main.css') }}">
    <!-- text animation  -->
    <link rel="stylesheet" href="{{ url('/assets/css/content.css') }}">
    <!----->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!----->

</head>

<style>
    .page-link {
        color: #ea1c2e;
        border: 1px solid #dee2e6;
        font-size: 16px;
    }

    .active > .page-link {
        color: #fff;
        border-color: #ea1c2e;
        background-color: #ea1c2e;
        font-size: 16px;
    }

    p.small.text-muted {
        font-size: 80%;
    }

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

    .f-height {
        height: 850px;
    }

    @media (max-width: 800px) { 
        .f-height {
            height: 525px;
        }
    }

    @media (max-width: 400px) { 
        .f-height {
            height: 500px;
        }
    }

    @media (min-width: 800px) { 
        .cari {width:300px;}
        .bg_ucapan {background: url({{ url('/assets/imgs/img_bg_board.png') }}) fixed top no-repeat;background-size:cover; padding-top:50px;}
        .bg_thanks {background: url({{ url('/assets/imgs/bg_thanks.png') }}) fixed top no-repeat; background-size:cover;}
        .bg_agen {background: url({{ url('/assets/imgs/bgrd_pruad02a.jpg') }}) top center; margin-top:-50px;}
        .lebarthanks {width:90%; margin-top:30px;}
        .lebarlogo {width:60%;}
        .ucapan {text-align:left;width:90%;}
        .besarboard {width:100%;}
        .transparan {background:url({{ url('/assets/imgs/bg_trans.png') }}); border-radius:15px;}
        .tulisan_tac {height:40px;}
    }

    @media only screen and (max-device-width: 480px) {
        .cari { font-size:13px; width:150px;}
        .bg_ucapan {background: url({{ url('assets/imgs/img_bg_board.png') }}) bottom; background-size:contain;padding-top:20px;}
        .bg_thanks {background: url({{ url('assets/imgs/bg_thanks.png') }}) bottom center no-repeat; background-size:cover;}
        .bg_agen {background: url({{ url('assets/imgs/bgrd_pruad_mobile01.jpg') }}) top center;}
        .lebarthanks {width:100%;}
        .lebarlogo {width:80%;}
        .ucapan {text-align:center;width:100%;}
        .besarboard {width:30%; margin: auto; display: block; }
        .tulisan_tac {width:80%;}
    }
</style>

<body>

    <div class="container">
        <div class="row">
            <div class="testimonial-4__wrapper col-md-6 m-auto f-height" style="background:url({{ url('/assets/imgs/bg_popup2.png') }}); background-size:cover;background-position: center;">
                <div align="center" class="m-auto" >
                    <div><img src="{{ url('/assets/imgs/logo_popup.png') }}" width="50%" class="mb-5" alt=""></div>
                    <img src="{{ Storage::disk('public')->exists('agents/'.$agent->photo)?asset('storage/agents/'.$agent->photo):asset('assets/images/blank.png') }}"
                        alt="{{ $agent->photo }}" style="width: 50%;">
                </div>
                                            
                <div class="team-details__content text-center">
                    <div class="text-black mt-4" align="center" style="font-family:'FSAlbertPro'; font-size:18px;line-height:18px;">
                        <strong>{{ $agent->name }}</strong>
                    </div>
                    <div class="mt-2 text-black m-auto" style="font-size:16px; line-height:16px;">Great Achievers</div>
                    <div class="text-black m-auto mt-4" style="font-size:15px; line-height:16px;">
                        @php
                            $ach_s = '';
                        @endphp
                        @foreach ($ach as $a)
                            @php
                                $ach_s .= $a->achievement_name.'<br/>';
                                // $ach_s .= ucwords(strtolower($a->achievement_name)).'<br/>';
                            @endphp
                        @endforeach
                        {!! $ach_s !!}
                    </div>  
                </div>  
                                    
                <div class="mb-5 text-black mt-4" align="center" style="font-family:'FSAlbertPro'; font-size:16px;line-height:16px;">
                    <strong>Selamat atas pencapaian Anda, <br>Great Achievers Prudential Indonesia di 2025!</strong>
                </div>
            </div>
        </div>
    </div>

<!-- JS here -->
<script src="{{ url('/assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
<script src="{{ url('/assets/js/vendor/chroma.min.js') }}"></script>
<script src="{{ url('/assets/js/plugins/waypoints.min.js') }}"></script>
<script src="{{ url('/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('/assets/js/plugins/meanmenu.min.js') }}"></script>
<script src="{{ url('/assets/js/plugins/swiper.min.js') }}"></script>
<script src="{{ url('/assets/js/plugins/gsap.js') }}"></script>
<script src="{{ url('/assets/js/plugins/ScrollSmoother.js') }}"></script>
<script src="{{ url('/assets/js/plugins/ScrollToPlugin.js') }}"></script>
<script src="{{ url('/assets/js/plugins/ScrollTrigger.js') }}"></script>
<script src="{{ url('/assets/js/plugins/SplitText.js') }}"></script>
<script src="{{ url('/assets/js/plugins/wow.js') }}"></script>
<script src="{{ url('/assets/js/vendor/magnific-popup.min.js') }}"></script>
<script src="{{ url('/assets/js/vendor/type.js') }}"></script>
<script src="{{ url('/assets/js/vendor/vanilla-tilt.js') }}"></script>
<script src="{{ url('/assets/js/plugins/nice-select.min.js') }}"></script>
<script src="{{ url('/assets/js/vendor/odometer.min.js') }}"></script>
<script src="{{ url('/assets/js/vendor/jquery-ui.min.js') }}"></script>
<script src="{{ url('/assets/js/vendor/jquery.counterup.min.js') }}"></script>
<script src="{{ url('/assets/js/vendor/jarallax.min.js') }}"></script>
<script src="{{ url('/assets/js/plugins/parallax-scroll.js') }}"></script>
<script src="{{ url('/assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ url('/assets/js/plugins/isotope-docs.min.js') }}"></script>
<script src="{{ url('/assets/js/vendor/ajax-form.js') }}"></script>

<script src="{{ url('/assets/js/popper.min.js') }}"></script>
<script src="{{ url('/assets/js/html2canvas.js') }}"></script>
<script src="{{ url('/assets/js/filesaver.min.js') }}"></script>
<script src="{{ url('/assets/js/aos.js') }}"></script>

<script src="{{ url('/assets/js/main.js') }}"></script>
<!--H2 hero animation js-->
<script src="{{ url('/assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ url('/assets/js/vendor/text-animation.min.js') }}"></script>
<script src="{{ url('/assets/js/vendor/scripts.js') }}"></script>
<!---->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>