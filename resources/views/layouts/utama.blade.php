<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="{{url('assets/images/logo2.png')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/css/font.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/css/li-scroller.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/css/jquery.fancybox.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/css/theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/css/style.css')}}">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
<header id="header">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="header_top">
                <div class="header_top_left">
                    <ul class="top_nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{Route('login')}}">Login</a></li>
                        <li><a href="{{Route('register')}}">Register</a></li>
                    </ul>
                </div>
                <div class="header_top_right">
                    <p id="clock"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="header_bottom">
                <div class="logo_area">
                    <a href="/" class="logo"><img src="{{url('assets/images/logo2.jpeg')}}" alt=""></a>
                </div>
                <div class="add_banner"><a href="/"><img src="{{url('assets/images/Banner1.jpeg')}}" alt=""></a></div>
            </div>
        </div>
    </div>
</header>
<section id="navArea" >
    <nav class="navbar navbar-inverse" role="navigation" >
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only" >Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse" style="background-color: green" >
            <ul class=" navbar-nav main_nav"  >
                <li class="active"><a href="/"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                <li><a href="/seni">Seni-Budaya</a></li>
                <li><a href="/saudagar">Saudagar</a></li>
                <li><a href="/milenial">Milenial</a></li>
                <li><a href="infopersyarikatan">Info Persyarikatan</a></li>
                <li><a href="/tokoh">Tokoh</a></li>
                <li><a href="/sejarah">Sejarah</a></li>
                <li><a href="/kiprah">Kiprah</a></li>
                <li><a href="/aisyiyah">Aisyiyah</a></li>
                <li><a href="/artikel">Artikel</a></li>
                <li><a href="/kultum">Kultum</a></li>
            </ul>
        </div>
    </nav>
</section>

@yield('content')

<footer id="footer">
    <div class="footer_top">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInLeftBig">
                <h2></h2>
                <img src="{{url('assets/images/logo2.jpeg')}}" alt="" width="340px">
                <p>Menyuarakan Kebaikan</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInDown">
                <h2>Tag</h2>
                <ul class="tag_nav">
                    <li><a href="/seni">Seni-Budaya</a></li>
                    <li><a href="/saudagar">Saudagar</a></li>
                    <li><a href="/milenial">Milenial</a></li>
                    <li><a href="infopersyarikatan">Info Persyarikatan</a></li>
                    <li><a href="/tokoh">Tokoh</a></li>
                    <li><a href="/sejarah">Sejarah</a></li>
                    <li><a href="/kiprah">Kiprah</a></li>
                    <li><a href="/aisyiyah">Aisyiyah</a></li>
                    <li><a href="/artikel">Artikel</a></li>
                    <li><a href="/kultum">Kultum</a></li>
                </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInRightBig">
                    <h2>Contact</h2>
                    <p>Tim Sosmed : Instagram (Sdm Media Buleleng), Facebook (Sdm Muhammadiyah Buleleng), Twitter (-), Line (- ), Youtube (-) 
                        Penerbit : Pemuda Muhammadiyah Buleleng</p>
                    <address>
                        Alamat Redaksi : Jl. Pattimura 118 Singaraja – Bali 81116
                        Telpon: 087701342406
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <p class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
        <p class="developer">Developed By Filla Jr</p>
    </div>
</footer>
</div>
<script src="{{url('assets/js/jquery.min.js')}}"></script> 
<script src="{{url('assets/js/wow.min.js')}}"></script> 
<script src="{{url('assets/js/bootstrap.min.js')}}"></script> 
<script src="{{url('assets/js/slick.min.js')}}"></script> 
<script src="{{url('assets/js/jquery.li-scroller.1.0.js')}}"></script> 
<script src="{{url('assets/js/jquery.newsTicker.min.js')}}"></script> 
<script src="{{url('assets/js/jquery.fancybox.pack.js')}}"></script> 
<script src="{{url('assets/js/custom.js')}}"></script>
<script src="{{url('assets/js/time.js')}}"></script>
</body>
</html>