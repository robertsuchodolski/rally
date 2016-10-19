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
                <a class="navbar-brand" href="{{route('users.index')}}">Użytkownicy</a>
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Dodaj nowego użytkownika</h4>
                        </div>
                        <div class="content">

                            {!!Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files' => true])!!}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Imię i nazwisko:') !!}
                                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('email', 'Email:') !!}
                                            {!! Form::text('email', null, ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::label('role_id', 'Rola:') !!}
                                        {!! Form::select('role_id', [''=>'wybierz'] + $roles, null, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('is_active', 'Status:') !!}
                                            {!! Form::select('is_active', array(''=>'wybierz', 1=>'Aktywny', 0=>'Nieaktywny'), null, ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('password', 'Hasło:') !!}
                                            {!! Form::password('password', ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('photo_id', 'Zdjęcie:') !!}
                                            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                            {!! Form::submit('Dodaj użytkownika', ['class'=>'btn btn-info btn-fill pull-right']) !!}
                                <div class="clearfix"></div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="image">
                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                        </div>
                        <div class="content">
                            <div class="author">
                                <a href="#">

                                    <img class="avatar border-gray" src="{{'https://placehold.it/400x400'}}" alt="..."/>

                                    <h4 class="title">Imię i nazwisko<br />
                                        <small>Adres e-mail</small>
                                    </h4>
                                </a>
                            </div>
                            <hr>
                            <p class="description text-center">
                                rola: brak<br>
                                status: brak
                            </p>
                        </div>
                        <hr>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop