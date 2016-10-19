@extends('layouts.admin')

@section('content')

    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Statystyki</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="btn" href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Wyloguj się</a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><i class="pe-7s-news-paper"></i> Artykuły</h4>
                            <p class="category"></p>
                        </div>
                        <div class="content">
                            <ul class="list-group">
                                <li class="list-group-item">Wszystkie artykuły<span class="badge">{{$posts->count()}}</span></li>
                                <li class="list-group-item">WRC<span class="badge">{{$posts->where('category_id', 2)->count()}}</span></li>
                                <li class="list-group-item">WRC 2<span class="badge">{{$posts->where('category_id', 3)->count()}}</span></li>
                                <li class="list-group-item">ERC<span class="badge">{{$posts->where('category_id', 6)->count()}}</span></li>
                                <li class="list-group-item">RSMP<span class="badge">{{$posts->where('category_id', 5)->count()}}</span></li>
                                <li class="list-group-item">Dakar<span class="badge">{{$posts->where('category_id', 4)->count()}}</span></li>
                                <li class="list-group-item">RallyCross<span class="badge">{{$posts->where('category_id', 1)->count()}}</span></li>
                                <li class="list-group-item">Formula 1<span class="badge">{{$posts->where('category_id', 7)->count()}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><i class="pe-7s-users"></i> Użytkownicy</h4>
                        </div>
                        <div class="content">
                            <ul class="list-group">
                                <li class="list-group-item">Liczba użytkowników<span class="badge">{{$users->count()}}</span></li>
                                <li class="list-group-item">Aktywni użytkownicy<span class="badge">{{$users->where('is_active', 1)->count()}}</span></li>
                                <li class="list-group-item">Nieaktywni użytkownicy<span class="badge">{{$users->where('is_active', 0)->count()}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ">
                        <div class="header">
                            <h4 class="title"><i class="pe-7s-comment"></i> Komentarze</h4>
                        </div>
                        <div class="content">
                            <ul class="list-group">
                                <li class="list-group-item">Aktywne komentarze<span class="badge">{{$comments->where('is_active',1)->count()}}</span></li>
                                <li class="list-group-item">Nieaktywne komentarze<span class="badge">{{$comments->where('is_active', 0)->count()}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ">
                        <div class="header">
                            <h4 class="title"><i class="pe-7s-photo"></i> Zdjęcia</h4>
                        </div>
                        <div class="content">
                            <ul class="list-group">
                                <li class="list-group-item">Wszystkie zdjęcia<span class="badge">{{$medias->count()}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@stop