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
                <a class="navbar-brand" href="">Kategorie</a>
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
                            <h4 class="title">Kategorie</h4>
                            <p class="category">Kategorie artykułów na blogu</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            @if($categories)

                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Kategoria</th>
                                        <th>Data utworzenia</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($categories as $category)

                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                                            <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'Nieokreślono'}}</td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>

                            @endif

                        </div>
                        <div class="footer text-center">
                            {{$categories->render()}}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">



                    <div class="card">
                        <div class="header">
                            <h4 class="title">Dodaj nową kategorie</h4>
                        </div>
                        <div class="content">

                            {!!Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store'])!!}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Kategoria:') !!}
                                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            {!! Form::submit('Dodaj kategorie', ['class'=>'btn btn-info btn-fill pull-right']) !!}
                            <div class="clearfix"></div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop
