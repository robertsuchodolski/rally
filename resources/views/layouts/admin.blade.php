<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('imgages/logo.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('imgages/logo.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Blog Rajdowy - Panel Administracyjny</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset('css/paper-dashboard.css')}}" rel="stylesheet"/>

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('css/themify-icons.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('css/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/theme/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/mobirise/css/mbr-additional.css')}}" type="text/css">

    @yield('styles')

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="warning">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="navbar-logo"><img height="25" src="{{asset('images/logo.png')}}" alt="Blog Rajdowy"></a>
                <a class="navbar-caption" href="{{route('index')}}">BLOG RAJDOWY</a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="{{route('users.index')}}">
                        <i class="ti-user"></i>
                        <p>Użytkownicy</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('posts.index')}}">
                        <i class="ti-list-ol"></i>
                        <p>Artykuły</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('comments.index')}}">
                        <i class="ti-comment"></i>
                        <p>Komentarze</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('categories.index')}}">
                        <i class="ti-tag"></i>
                        <p>Kategorie</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('media.index')}}">
                        <i class="ti-camera"></i>
                        <p>Media</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Panel administracyjny</a>
                </div>
                <div class="collapse navbar-collapse">


                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    @yield('content')

                </div>
            </div>
        </div>
    </div>
</div>


<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-2" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">

    <div class="container">
        <p class="text-xs-center">Wszelkie prawa autorskie zastrzeżone (c) 2016 Robert Suchodolski.</p>
    </div>
</footer>

</body>

<!--   Core JS Files   -->
<script src="{{asset('js/jquery-1.10.2.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{asset('js/bootstrap-checkbox-radio.js')}}"></script>

<!--  Charts Plugin -->
<script src="{{asset('js/chartist.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('js/bootstrap-notify.js')}}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

@yield('scripts')

</html>
