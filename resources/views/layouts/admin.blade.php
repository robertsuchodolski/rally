<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>shakedown - panel administracyjny</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>

    @yield('styles')


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="grey" data-image="{{asset('images/wrc-sidebar.jpg')}}" >

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{route('index')}}" class="simple-text">
                    shakedown
                </a>
            </div>

            <ul class="nav">
                <li class="item {{active_route('admin.index')}}">
                    <a href="{{route('admin.index')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Statystyki</p>
                    </a>
                </li>
                <li class="item {{active_route('users.index')}}">
                    <a href="{{route('users.index')}}">
                        <i class="pe-7s-users"></i>
                        <p>Użytkownicy</p>
                    </a>
                </li>
                <li class="item {{active_route('posts.index')}}">
                    <a href="{{route('posts.index')}}">
                        <i class="pe-7s-news-paper"></i>
                        <p>Artykuły</p>
                    </a>
                </li>
                <li class="item {{active_route('comments.index')}}">
                    <a href="{{route('comments.index')}}">
                        <i class="pe-7s-comment"></i>
                        <p>Komentarze</p>
                    </a>
                </li>
                <li class="item {{active_route('categories.index')}}">
                    <a href="{{route('categories.index')}}">
                        <i class="pe-7s-ticket"></i>
                        <p>Kategorie</p>
                    </a>
                </li>
                <li class="item {{active_route('media.index')}}">
                    <a href="{{route('media.index')}}">
                        <i class="pe-7s-photo"></i>
                        <p>Zdjęcia</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">

        @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; 2016 <a href="{{route('index')}}">shakedown</a>, Robert Suchodolski
                </p>
            </div>
        </footer>

    </div>
    </div>

</body>

<!--   Core JS Files   -->
<script src="{{asset('js/jquery-1.10.2.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{asset('js/bootstrap-checkbox-radio-switch.js')}}"></script>

<!--  Charts Plugin -->
<script src="{{asset('js/chartist.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('js/bootstrap-notify.js')}}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{asset('js/light-bootstrap-dashboard.js')}}"></script>

@yield('scripts')

</html>
