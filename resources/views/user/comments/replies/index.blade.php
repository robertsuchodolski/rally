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
                <a class="navbar-brand" href="#">Odpowiedzi</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('comments')}}" class="btn">Wróć do komentarzy</a></li>
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
                <div class="col-md-12">
                    <div class="card">

                        @if(count($replies) > 0)


                                <div class="header">
                                    <h4 class="title">Moje odpowiedzi</h4>
                                    <p class="category">Tu wyświetlają się Twoje odpowiedzi na komentarze</p>
                                </div>
                                <div class="content table-responsive table-full-width">

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Autor</th>
                                            <th>Treść</th>
                                            <th>Utworzony</th>
                                            <th>Komentarz</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($replies as $reply)

                                        <tr>
                                            <td>{{$reply->id}}</td>
                                            <td>{{$reply->author}}</td>
                                            <td>{{$reply->body}}</td>
                                            <td>{{$reply->created_at->diffForHumans()}}</td>
                                            <td><a href="{{route('home.post', $reply->comment->post->id)}}">Zobacz komentarz</a></td>
                                            <td>{{$reply->is_active == 1 ? 'Aktywny' : 'Nieaktywny'}}</td>
                                            <td>

                                                {!!Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]])!!}

                                                {!! Form::submit('Usuń', ['class'=>'btn btn-danger btn-fill btn-xs']) !!}

                                                {!! Form::close() !!}

                                            </td>

                                        </tr>

                                        @endforeach

                                        </tbody>
                                    </table>

                                </div>
                                <div class="footer text-center">
                                    {{$replies->render()}}
                                </div>

                                @else

                                    <h1 class="text-center">Brak odpowiedzi<br><small>Nie odpowiedziałeś jeszcze na żaden komentarz</small></h1>

                                @endif

                    </div>
                </div>

            </div>
        </div>
    </div>

@stop








