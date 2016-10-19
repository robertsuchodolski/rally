<!DOCTYPE html>
<html>
<head>
    <!-- Site made with Mobirise Website Builder v3.6.1, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v3.6.1, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="image/x-icon">
    <meta name="description" content="">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900">
    <link rel="stylesheet" href="{{asset('css/et-line-font-plugin/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-material-design-font/css/material.css')}}">
    <link rel="stylesheet" href="{{asset('css/tether/tether.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/socicon/css/socicon.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dropdown/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/theme/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/mobirise-gallery/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/mobirise/css/mbr-additional.css')}}" type="text/css">

    @yield('styles')



</head>
<body>
<section id="menu-0">

    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="{{route('index')}}" class="navbar-logo"><img src="{{asset('images/logo.png')}}" alt="Mobirise"></a>
                        <a class="navbar-caption" href="{{route('index')}}">shakedown</a>
                    </div>



                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                        <li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="{{route('gallery')}}">galeria</a></li>
                        <li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="{{route('about')}}">o nas</a></li>
                            @if (Auth::guest())
                                <li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="{{url('register')}}" >zarejestruj się</a></li>
                                <li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="{{route('login')}}">zaloguj się</a></li>
                            @else
                            <li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="{{route('article.create')}}">dodaj artykuł</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu" href="">
                                         {{ Auth::user()->name }}</a>
                                        <div class="dropdown-menu">
                                            @if(Auth::user()->role->name == 'administrator')
                                            <a class="dropdown-item" href="{{url('/user')}}">Mój profil</a>
                                            <a class="dropdown-item" href="{{url('/admin/index')}}">Zarządzaj</a>
                                                @else
                                                <a class="dropdown-item" href="{{url('/user')}}">Mój profil</a>
                                            @endif

                                            <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Wyloguj się</a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            </form>
                                        </div>
                                </li>
                        @endif

                    </ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>



                </div>
            </div>

        </div>
    </nav>

</section>

@yield('content')



<section class="mbr-section mbr-section-md-padding mbr-footer footer1" id="contacts1-0" style="background-color: rgb(46, 46, 46); padding-top: 90px; padding-bottom: 90px;">

    <div class="container">
        <div class="row">
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <div><img src="{{asset('images/logo.png')}}"></div>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Adres</strong><br>
                    Robert Suchodolski</p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Kontakt</strong><br>
                    Email: suchodolskirobert87@gmail.com<br>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Linki</strong><br>
                    <a class="text-primary" href="https://wrc.com/" target="_blank">WRC</a><br>
                    <a class="text-primary" href="https://rajdy24.pl" target="_blank">rajdy24.pl</a><br>
                    <a class="text-primary" href="https://wrc.net.pl" target="_blank">Magazyn WRC</a></p>
            </div>

        </div>
    </div>
</section>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-2" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">

    <div class="container">
        <p class="text-xs-center">&copy; 2016 <a href="{{route('index')}}">shakedown</a>, Robert Suchodolski</p>
    </div>
</footer>


<script src="{{asset('js/web/assets/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/tether/tether.min.js')}}"></script>
<script src="{{asset('js/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/smooth-scroll/SmoothScroll.js')}}"></script>
<script src="{{asset('js/viewportChecker/jquery.viewportchecker.js')}}"></script>
<script src="{{asset('js/dropdown/js/script.min.js')}}"></script>
<script src="{{asset('js/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
<script src="{{asset('js/jarallax/jarallax.js')}}"></script>
<script src="{{asset('js/masonry/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('js/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('js/cookies-alert-plugin/cookies-alert-core.js')}}"></script>
<script src="{{asset('js/cookies-alert-plugin/cookies-alert-script.js')}}"></script>
<script src="{{asset('js/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js')}}"></script>
<script src="{{asset('js/social-likes/social-likes.js')}}"></script>
<script src="{{asset('js/theme/js/script.js')}}"></script>
<script src="{{asset('js/mobirise-gallery/script.js')}}"></script>

@yield('scripts')




<input name="animation" type="hidden">
<input name="cookieData" type="hidden" data-cookie-text="We use cookies to give you the best experience. Read our <a href='privacy.html'>cookie policy</a>.">
</body>
</html>