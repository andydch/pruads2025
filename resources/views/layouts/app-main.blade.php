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

    <!-- Header area start -->
    <header>
        <div id="header-sticky" class="header header-3">
            <div class="container">
                <div class="mega__menu-wrapper p-relative">
                    <div class="header__main header-3__main">
                            <div align="center">
                                <div class="logo">
                                    <img src="{{ asset('assets') }}/imgs/img_header.png" class="lebarlogo" alt="">
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- <div id="popup-search-box">
        <div class="box-inner-wrap d-flex align-items-center">
            <form id="form" action="#" method="get" role="search">
                <input id="popup-search" type="text" name="s" placeholder="Type keywords here...">
            </form>
            <div class="search-close"><i class="fa-sharp fa-regular fa-xmark"></i></div>
        </div>
    </div> --}}
    <!-- Header area end -->

    <!-- Body main wrapper start -->
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                
                <!-- Banner area start -->
                <section id="hero" class="banner-2__area p-relative overflow-hidden z-1 bg_thanks">
                    <div class="container custom-container-3">
                        <div class="row">
                            <div class="col-12">
                                <div align="center" id="hero-caption" class="parallax-scroll-caption banner-2__content p-relative">
                                    <img src="{{ asset('assets') }}/imgs/img_text_thanks_1.png" class="lebarthanks"  alt=""/>                              
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="project-section-2__area project-section-2  bg_ucapan">
                    <div class="container-fluid">
                        <div class="project-section-2__wrapper">
                            <div class="project-section-2__item project-panel">
                                <div class="row">
                                <div class="col-md-5">
                                        <img src="{{ asset('assets') }}/imgs/img_tony_2025.png" width="100%" alt=""/> 
                                    </div>
                                    <div align="center" class="col-md-7">
                                        <img src="{{ asset('assets') }}/imgs/text_tony_2025.png" width="90%" alt=""/> 
                                    </div>
                                </div>
                            </div>
                            <div class="project-section-2__item project-panel">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="{{ asset('assets') }}/imgs/img_iskandar_2025.png" width="100%" alt=""/> 
                                    </div>
                                    <div align="center" class="col-md-7">
                                        <img src="{{ asset('assets') }}/imgs/text_iskandar_2025.png" width="90%" alt=""/> 
                                    </div>
                                </div>
                            </div>
                            <div class="project-section-2__item project-panel">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="{{ asset('assets') }}/imgs/img_rusli_2025.png" width="100%" alt=""/> 
                                    </div>
                                    <div align="center" class="col-md-7">
                                        <img src="{{ asset('assets') }}/imgs/text_rusli_2025.png" width="90%" alt=""/> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="project-panel-area"></div>
                    <div class="project-section-2__area btn-wrap pb-50">
                        <a href="#" class="rr-btn before-btn">Download Production Ad 2025</a>
                    </div>
                    
                    <div class="project-panel-area"></div>
                </section>
                <!--  -->

                {{ $slot }}

            </main>
        </div>
    </div>

    <div id="scroll-percentage"><span id="scroll-percentage-value"></span></div>

    <x-modal-view />

    @livewireScripts
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

    <script>
        function displayModal(nama){
            // Inisialisasi modal
            const myModal = new bootstrap.Modal(document.getElementById('myModal'));
            
            // Memanggil/membuka modal
            myModal.show();

            // Menutup modal
            // myModal.hide();

            $('#agent_name_modal').text(nama);
            // $('#agent_name_modal').html(nama);
        }

        function myCopyFunction(valCopy) {
            /* Get the text field */
            var copyText = document.getElementById(valCopy);

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            if (typeof (navigator.clipboard) == 'undefined') {
                alert("Tautan tidak bisa disalin. \nSilakan lakukan secara manual!");
            }else{
                /* Copy the text inside the text field - navigator.clipboard di https */
                navigator.clipboard.writeText(copyText.value);

                /* Alert the copied text */
                alert("Tautan sudah disalin: \n"+copyText.value);
            }
        }

        function mySaveImg(img) {
            var a = document.createElement('a');
            a.href = img;
            a.download = img;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }

        function dowloadImage(elID){
            let scrollPos = $(window).scrollTop();
            $(window).scrollTop(0);
            html2canvas(document.getElementById("area-"+elID), {
                allowTaint: true,
                useCORS: true
            }).then(
                canvas => {
                    $(window).scrollTop(scrollPos);
                    canvas.toBlob(function(blob) {
                        saveAs(blob, "profile-agent-"+elID+".png");
                    });
            });
            return false;
        }
    </script>

</body>
</html>