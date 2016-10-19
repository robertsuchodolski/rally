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
                <a class="navbar-brand" href="{{route('categories.index')}}">Kategorie</a>
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
                <div class="col-md-6">

                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edytuj kategorie {{$category->name}}</h4>
                        </div>
                        <div class="content">

                            {!!Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]])!!}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Kategoria:') !!}
                                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            {!! Form::submit('Edytuj kategorie', ['class'=>'btn btn-info btn-fill pull-right']) !!}

                            {!! Form::close() !!}

                            {!!Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]])  !!}

                            {!! Form::submit('Usuń kategorie', ['class'=>'btn btn-warning btn-fill pull-right']) !!}

                            {!! Form::close() !!}
                            <div class="clearfix"></div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop