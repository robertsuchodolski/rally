<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rally - Home Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('styles')

</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="197">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">WebSiteName</a>
        </div>
        <!-- /.navbar-header -->

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Aktualności</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">WRC<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Aktualności</a></li>
                        <li><a href="#">Kalendarz</a></li>
                        <li><a href="#">Punktacja</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">ERC<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Aktualności</a></li>
                        <li><a href="#">Kalendarz</a></li>
                        <li><a href="#">Punktacja</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">RSMP<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Aktualności</a></li>
                        <li><a href="#">Kalendarz</a></li>
                        <li><a href="#">Punktacja</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Inne<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Aktualności</a></li>
                        <li><a href="#">Kalendarz</a></li>
                        <li><a href="#">Punktacja</a></li>
                    </ul>
                </li>
                <li><a href="#">Galeria</a></li>
                <li><a href="#">O Nas</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/register')}}"><span class="glyphicon glyphicon-user"></span> Zarejestruj się</a></li>
                    <li><a href="{{ url('/login')}}"><span class="glyphicon glyphicon-log-in"></span> Zaloguj się</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}
                        </a>


                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{url('/admin')}}"><span class="glyphicon glyphicon-wrench"></span> Ustawienia</a></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span> Wyloguj się</a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        @yield('content')

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="{{asset('js/jquery.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

    @yield('scripts')

</body>

</html>
