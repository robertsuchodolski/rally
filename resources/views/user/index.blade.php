@extends('layouts.user')

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
                <a class="navbar-brand" href="#">Mój profil</a>
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

    <div class="col-sm-9">@include('errors.form_errors')</div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-user">
                        <div class="image">
                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                        </div>
                        <div class="content">
                            <div class="author">
                                <a href="#">

                                    <a href="{{route('user.edit', Auth::user()->id)}}"><img class="avatar border-gray" src="{{$user->photo ? $user->photo->file : 'https://placehold.it/400x400'}}" alt="..."/></a>

                                    <h4 class="title"><a href="{{route('user.edit', Auth::user()->id)}}">{{$user->name}}</a><br />
                                        <small>{{$user->email}}</small>
                                    </h4>
                                </a>
                            </div>
                            <hr>
                            <p class="description text-center">
                                rola: {{$user->role->name}}<br>
                                status: {{$user->is_active == 1 ? 'Aktywny' : 'Nie aktywny'}}
                            </p>
                            <hr>
                            <p class="stats text-center">
                                <i class="pe-7s-news-paper"></i>{{$posts->count()}}
                                <i class="pe-7s-comment"></i>{{$comments->count()}}
                                <i class="pe-7s-repeat"></i>{{$replies->count()}}
                            </p>
                        </div>
                        <hr>
                    </div>
                </div>


            </div>
        </div>
    </div>


@stop