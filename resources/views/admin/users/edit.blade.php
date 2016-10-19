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
                    <li><a href="{{route('users.create')}}" class="btn">Dodaj użytkownika</a></li>
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
                            <h4 class="title">Edytuj użytkownika <b>{{$user->name}}</b></h4>
                        </div>
                        <div class="content">

                            {!!Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files' => true])!!}

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
                                    {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('is_active', 'Status:') !!}
                                        {!! Form::select('is_active', array( 1=>'Aktywny', 0=>'Nieaktywny'), null, ['class'=>'form-control']) !!}
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
                            {!! Form::submit('Edytuj użytkownika', ['class'=>'btn btn-info btn-fill pull-right']) !!}

                            {!! Form::close() !!}

                            {!!Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]])!!}

                                {!! Form::submit('Usuń', ['class'=>'btn btn-danger btn-fill pull-right']) !!}

                            {!! Form::close() !!}

                            <div class="clearfix"></div>


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

                                    <img class="avatar border-gray" src="{{$user->photo ? $user->photo->file : 'https://placehold.it/400x400'}}" alt="..."/>

                                    <h4 class="title">{{$user->name}}<br />
                                        <small>{{$user->email}}</small>
                                    </h4>
                                </a>
                            </div>
                            <hr>
                            <p class="description text-center">
                                rola: {{$user->role->name}}<br>
                                status: {{$user->is_active == 1 ? 'Aktywny' : 'Nie aktywny'}}<br>
                                utworzony: {{$user->created_at->diffForHumans()}}<br>
                                zaktualizowany: {{$user->updated_at->diffForHumans()}}
                            </p>
                        </div>
                        <hr>
                    </div>
                </div>


            </div>
        </div>
    </div>

@stop


