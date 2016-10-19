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
                <a class="navbar-brand" href="{{route('posts.index')}}">Artykuły</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('posts.create')}}" class="btn">Dodaj artykuł</a></li>
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
                            <h4 class="title">Edytuj artykuł: {{$post->title}}</h4>
                        </div>
                        <div class="content">

                            {!!Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files' => true])!!}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('title', 'Tytuł:') !!}
                                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::label('body', 'Treść:') !!}
                                    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('category_id', 'Kategoria:') !!}
                                        {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
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

                            {!! Form::submit('Edytuj artykuł', ['class'=>'btn btn-info btn-fill pull-right']) !!}

                            {!! Form::close() !!}

                            {!!Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]])  !!}

                            {!! Form::submit('Usuń', ['class'=>'btn btn-warning btn-fill pull-right']) !!}

                            {!! Form::close() !!}
                            <div class="clearfix"></div>


                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-img">
                        <div class="image">
                            <img src="{{$post->photo ? $post->photo->file : 'https://placehold.it/400x400'}}" alt="" class="img-thumbnail">
                        </div>

                        <hr>

                    </div>
                </div>

            </div>
        </div>
    </div>

@stop



