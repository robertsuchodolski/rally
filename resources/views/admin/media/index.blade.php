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
                <a class="navbar-brand" href="">Zdjęcia</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="btn" href="{{route('media.create')}}">Dodaj zdjęcie</a></li>
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
                            <h4 class="title">Zdjęcia</h4>
                            <p class="category">Zdjęcia z artykułów na blogu</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            @if($photos)

                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Zdjęcie</th>
                                        <th>Data utworzenia</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($photos as $photo)
                                        <tr>
                                            <td>{{$photo->id}}</td>
                                            <td><img height="50px" src="{{$photo->file}}" alt=""></td>
                                            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'Nieokreślono'}}</td>
                                            <td>
                                                {!!Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]])!!}

                                                {!! Form::submit('Usuń zdjęcie', ['class'=>'btn btn-danger btn-fill btn-xs pull-right']) !!}


                                                {!! Form::close() !!}
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>

                            @endif

                        </div>
                        <div class="footer text-center">
                            {{$photos->render()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop