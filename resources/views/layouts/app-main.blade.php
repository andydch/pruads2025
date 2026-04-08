<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    @livewireStyles

    <meta name="description" content="">
    <meta name="author" content="soukhinkhan">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->

    <link rel="preconnect" href="https://fonts.googleapis.com" data-navigate-track>
    <link rel="preconnect" href="https://fonts.gstatic.com" data-navigate-track>
    {{-- <link href="../css2?family=Sofia&display=swap" rel="stylesheet"> --}}
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/bootstrap.min.css') }}" data-navigate-track>
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/animate.min.css') }}" data-navigate-track>
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/odometer.min.css') }}" data-navigate-track>
    <link rel="stylesheet" href="{{ url('/assets/css/plugins/swiper.min.css') }}" data-navigate-track>
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/magnific-popup.css') }}" data-navigate-track>
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/fontawesome-pro.css') }}" data-navigate-track> 
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/spacing.css') }}" data-navigate-track>
    <link rel="stylesheet" href="{{ url('/assets/css/vendor/custom-font.css') }}" data-navigate-track>
    <link rel="stylesheet" href="{{ url('/assets/css/main.css') }}" data-navigate-track>
    <!-- text animation  -->
    <link rel="stylesheet" href="{{ url('/assets/css/content.css') }}" data-navigate-track>
    <!----->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" data-navigate-track>
    <!----->

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
    
        .dropdown-item.active {
            background-color: #dc3545;
        }
    
        /* ukuran layar > 800px */
        .cari {width:300px;}
        .bg_ucapan {background: url(assets/imgs/img_bg_board.png) fixed top no-repeat;background-size:cover; padding-top:50px;}
        .bg_thanks {background: url(assets/imgs/bg_thanks.png) fixed top no-repeat; background-size:cover;}
        .bg_agen {background: url(assets/imgs/bgrd_pruad02a.jpg) top center; margin-top:-50px;}
        .lebarthanks {width:90%; margin-top:30px;}
        .lebarlogo {width:60%;}
        .ucapan {text-align:left;width:90%;}
        .besarboard {width:100%;}
        .transparan {background:url(assets/imgs/bg_trans.png); border-radius:15px;}
        .tulisan_tac {height:40px;}
        /* .popup-width {width:50%;} */
        /* ukuran layar > 800px */
    
        @media (min-width: 800px) { 
            .cari {width:300px;}
            .bg_ucapan {background: url(assets/imgs/img_bg_board.png) fixed top no-repeat;background-size:cover; padding-top:50px;}
            .bg_thanks {background: url(assets/imgs/bg_thanks.png) fixed top no-repeat; background-size:cover;}
            .bg_agen {background: url(assets/imgs/bgrd_pruad02a.jpg) top center; margin-top:-50px;}
            .lebarthanks {width:90%; margin-top:30px;}
            .lebarlogo {width:60%;}
            .ucapan {text-align:left;width:90%;}
            .besarboard {width:100%;}
            .transparan {background:url(assets/imgs/bg_trans.png); border-radius:15px;}
            .tulisan_tac {height:40px;}
        }
        
        @media (max-width: 810px) { 
            /* .popup-width {width:90%;} */
        }
    
        @media only screen and (max-device-width: 480px) {
            .cari { font-size:13px; width:150px;}
            .bg_ucapan {background: url(assets/imgs/img_bg_board.png) bottom; background-size:contain;padding-top:20px;}
            .bg_thanks {background: url(assets/imgs/bg_thanks.png) bottom center no-repeat; background-size:cover;}
            .bg_agen {background: url(assets/imgs/bgrd_pruad_mobile01.jpg) top center;}
            .lebarthanks {width:100%;}
            .lebarlogo {width:80%;}
            .ucapan {text-align:center;width:100%;}
            .besarboard {width:30%; margin: auto; display: block; }
            .tulisan_tac {width:80%;}
            /* .popup-width {width:90%;} */
        }

        /* dropdown di top regional */
        /* Kontainer untuk membungkus elemen Select */
        .flat-select-container {
            position: relative;
            width: 300px;
        }

        /* Desain kotak Select Flat */
        .flat-select {
            /* Mematikan gaya 3D dan panah bawaan dari browser */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            
            width: 100%;
            background-color: #fff; /* Warna dasar solid (Midnight Blue) */
            color: #656565; /* Teks putih */
            padding: 10px 45px 15px 20px;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            
            /* Rata: Tanpa border, tanpa shadow, sudut lancip 0px */
            border: none;
            border-radius: 10px; 
            outline: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: 1px solid #dc3545;
            height: 50px;

            /* content: '\25BC';*/

            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 10 10'%3E%3Cpolygon points='0,2 10,2 5,8' fill='%23000000'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 90px center;
            background-size: 10px;
        }

        /* Perubahan warna saat kotak select diklik/fokus */
        .flat-select:focus, .flat-select:hover {
            /* background-color: #dc3545; 
			color: #fff;
            border: 1px solid #dc3545; */

            background-color: #dc3545;
            color: #fff;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 10 10'%3E%3Cpolygon points='0,2 10,2 5,8' fill='%23ffffff'/%3E%3C/svg%3E");
        }

        /* Membuat Ikon Panah Kustom (Flat) */
        /* Karena panah bawaan browser dimatikan, kita buat panah sendiri menggunakan CSS */
        /* .flat-select-container::before {
            content: '\25BC';
            position: absolute;
            top: 50%;
            right: 70px;
            transform: translateY(-50%);
            color: #656565;
            font-size: 14px;
            pointer-events: none; 
        }
        .flat-select-container::after {
            content: '\25BC';
            position: absolute;
            top: 50%;
            right: 70px;
            transform: translateY(-50%);
            color: #fff;
            font-size: 14px;
            pointer-events: none; 
        } */

        /* Desain untuk anak (Option) */
        .flat-select:focus, .flat-select:hover option {
            background-color: #ffffff; /* Warna latar putih solid */
            color: #656565;
            padding: 10px; /* Catatan: Padding pada tag option tidak didukung di semua browser */
        }
        .flat-select option {
            background-color: #ffffff; /* Warna latar putih solid */
            color: #dc3545; /* Teks gelap */
            padding: 10px; /* Catatan: Padding pada tag option tidak didukung di semua browser */
        }
        /* dropdown di top regional */
    </style>
</head>

<body>

    <!-- Header area start -->
    <header>
        <div id="header-sticky" class="header header-3">
            <div class="container">
                <div class="mega__menu-wrapper p-relative">
                    <div class="header__main header-3__main">
                        <div align="center">
                            <div class="logo">
                                <img src="assets/imgs/img_header.png" class="lebarlogo" alt="">
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
                                <img src="assets/imgs/img_text_thanks_1.png" class="lebarthanks" alt=""/>                              
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="project-section-2__area project-section-2  bg_ucapan">
                <div class="container-fluid">
                    <div class="project-section-2__wrapper">
                        <div class="project-section-2__item project-panel">
                            <div class="row m-0 p-0">
                               <div class="col-md-3 m-0 p-0">
                                	<img src="assets/imgs/img_tony_2025a.png" class="besarboard" alt=""/> 
                                </div>
                                <div class="col-md-9 m-0 p-0">
                                     <img src="assets/imgs/text_tony_2025.png" class="ucapan" alt=""/> 
                                </div>
                            </div>
                        </div>
                        <div class="project-section-2__item project-panel">
                            <div class="row m-0 p-0">
                                <div class="col-md-3 m-0 p-0">
                                	<img src="assets/imgs/img_iskandar_2025a.png"  class="besarboard" alt=""/> 
                                </div>
                                <div class="col-md-9 m-0 p-0">
                                     <img src="assets/imgs/text_iskandar_2025.png" class="ucapan" alt=""/> 
                                </div>
                            </div>
                        </div>
                        <div class="project-section-2__item project-panel">
                            <div class="row m-0 p-0">
                                 <div class="col-md-3 m-0 p-0">
                                	<img src="assets/imgs/img_rusli_2025a.png" class="besarboard" alt=""/> 
                                </div>
                                <div class="col-md-9 m-0 p-0">
                                     <img src="assets/imgs/text_rusli_2025.png" class="ucapan" alt=""/> 
                                </div>
                            </div>
                        </div>
 			            <div class="project-section-2__item project-panel">
                            <div class="row m-0 p-0">
                                 <div class="col-md-3 m-0 p-0">
                                	<img src="assets/imgs/img_nazsul_2025a.png"  class="besarboard" alt=""/> 
                                </div>
                                <div class="col-md-9 m-0 p-0">
                                     <img src="assets/imgs/text_nazsul_2025.png" class="ucapan" alt=""/> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="project-panel-area"></div>
                <div class="project-section-2__area btn-wrap pb-50 pt-50">
                    <a href="{{ url('/assets/FA_PRUAD_PRU2025_download.pdf') }}" download="" class="rr-btn before-btn">Download Production Ad 2025</a>
                </div>
                <div class="project-panel-area"></div>
                
            </section>
            <!--  -->

            {{ $slot }}

        </main>
    </div>
</div>

{{-- scroll up --}}
<div id="scroll-percentage"><span id="scroll-percentage-value"></span></div>

<!-- Modal -->
<!-- The Modal -->
<div class="modal" id="agentModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">&nbsp;</h4>
                <button type="button" class="btn-close" data-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row" id="area-download-photo" style="overflow: hidden;">
                    <div class="testimonial-4__wrapper col-md-6 m-auto popup-width" style="background:url(assets/imgs/bg_popup2.png); background-size:cover;background-position: center;">
                        <div align="center" class="m-auto" >
                            <div><img src="assets/imgs/logo_popup.png" width="50%" class="mb-5" alt=""></div>
                            <span id="photo-agent"></span>
                        </div>
                                                    
                    <div class="team-details__content text-center">
                        <div class="text-black mt-4" align="center" style="font-family:'FSAlbertPro'; font-size:18px;line-height:12px;">
                            <span id="agent_name_modal" style="font-weight: bold;"></span>
                        </div>
                        <div class="mt-2 text-black m-auto" style="font-size:16px; line-height:18px;">Great Achievers</div>
                        <div class="text-black m-auto mt-4" style="font-size:13px; line-height:16px;">
                            <span id="agent_achievement_modal"></span>
                        </div>  
                    </div>  
                                            
                    <div class="mb-5 text-black mt-4" align="center" style="font-family:'FSAlbertPro'; font-size:16px;line-height:16px;">
                        <strong>Selamat atas pencapaian Anda, <br>Great Achievers Prudential Indonesia di 2025!</strong>
                    </div>
                </div>
            </div>
                                  
            <div class="m-auto mt-5 mb-100" style="font-family:'FSAlbertPro'">
                <div align="center">
                    <a id="fb-link" href="#" target="_new"><img src="assets/imgs/s-fb.png" width="120" alt=""/></a>
                    <a id="twit-link" href="#" target="_new"><img src="assets/imgs/s-tw.png" width="120" alt=""/></a>
                    <a id="wa-link" href="#" target="_new"><img src="assets/imgs/s-wa.png" width="120" alt=""/></a>
                    <a id="in-link" href="#" target="_new"><img src="assets/imgs/s-linkedin.png" width="120" alt=""/></a>
                                        
                    <div class="mt-2">   
                        or link <form action="#" class="rr-subscribe-form cari form-check-inline">
                            <input id="url-agent-link" type="text" class=" form-control text-center" value="">
                        </form>&nbsp;&nbsp;
                        <img onclick="myCopyFunction('url-agent-link');" src="assets/imgs/b_copylink.png" width="120" alt="" style="cursor: pointer;" />&nbsp;
                        <img id="download-photo" onClick="dowloadImage2('download-photo');" src="assets/imgs/b_download.png" width="120" alt="" style="cursor: pointer;" />
                    </div>
                                            
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      
        {{-- </div> --}}
    </div>
</div>    
<!-- Modal -->

@livewireScripts
<!-- JS here -->
<script src="{{ url('/assets/js/vendor/jquery-3.7.1.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/vendor/chroma.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/plugins/waypoints.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/vendor/bootstrap.bundle.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/plugins/meanmenu.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/plugins/swiper.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/plugins/gsap.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/plugins/ScrollSmoother.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/plugins/ScrollToPlugin.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/plugins/ScrollTrigger.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/plugins/SplitText.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/plugins/wow.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/vendor/magnific-popup.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/vendor/type.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/vendor/vanilla-tilt.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/plugins/nice-select.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/vendor/odometer.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/vendor/jquery-ui.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/vendor/jquery.counterup.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/vendor/jarallax.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/plugins/parallax-scroll.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/plugins/jquery.countdown.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/plugins/isotope-docs.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/vendor/ajax-form.js') }}" data-navigate-track></script>

<script src="{{ url('/assets/js/popper.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/html2canvas.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/filesaver.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/aos.js') }}" data-navigate-track></script>

<script src="{{ url('/assets/js/main.js') }}" data-navigate-track></script>
<!--H2 hero animation js-->
<script src="{{ url('/assets/js/vendor/imagesloaded.pkgd.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/vendor/text-animation.min.js') }}" data-navigate-track></script>
<script src="{{ url('/assets/js/vendor/scripts.js') }}" data-navigate-track></script>
<!---->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" data-navigate-track></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" data-navigate-track></script>

<script data-navigate-track>
    function goRegionalArea(no){
        location.href = "{{ route('top-regional').'?q=reg' }}"+(no.length==1?'0'+no:no);
    }

    function goSubCategory(no){
        location.href = no;
    }

    function displayModal(nama, achievement, slug, photo){
        // Inisialisasi modal
        const agentModal = new bootstrap.Modal(document.getElementById('agentModal'));
        
        // Memanggil/membuka modal
        agentModal.show();

        // Menutup modal
        // agentModal.hide();

        $('#agent_name_modal').text(nama);
        $('#agent_achievement_modal').html(achievement);
        $('#photo-agent').html('<img src="'+photo+'" alt="" style="width:50%;">');
        // $('#photo-agent').html('<img src="'+photo+'" width="160" alt="">');
        $('#fb-link').attr('href', 'https://www.facebook.com/sharer/sharer.php?u={{ url('/display-agent/') }}/'+slug);
        $('#twit-link').attr('href', 'https://twitter.com/intent/tweet?&url={{ url('/display-agent/') }}/'+slug);
        $('#wa-link').attr('href', 'whatsapp://send?text=Coba%20cek%20laman%20Prudential%20Achiever%20ini!%20{{ url('/display-agent/') }}/'+slug);
        $('#in-link').attr('href', 'https://www.linkedin.com/shareArticle?mini=true&?&url={{ url('/display-agent/') }}/'+slug);
        $('#url-agent-link').val('{{ url('/display-agent/') }}/'+slug);
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

    function dowloadImage2(elID){
        let scrollPos = $(window).scrollTop();
        $(window).scrollTop(0);

        let targetArea = document.getElementById("area-" + elID);

        html2canvas(targetArea, {
            allowTaint: true,
            useCORS: true,
            width: targetArea.offsetWidth,    // Kunci lebar persis sebesar elemen
            height: targetArea.offsetHeight,  // Kunci tinggi persis sebesar elemen
            scrollX: 0, 
            scrollY: 0
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