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
                <a class="navbar-brand" href="#">Komentarze</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('replies')}}" class="btn">Moje odpowiedzi</a></li>
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
                        @if(count($comments) > 0)
                        <div class="header">
                            <h4 class="title">Moje Komentarze</h4>
                            <p class="category">Tu wyświetlają się komentarze które dodałeś</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Autor</th>
                                        <th>Treść</th>
                                        <th>Utworzony</th>
                                        <th>Artykuł</th>
                                        <th>Odpowiedzi</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)

                                        <tr>
                                            <td>{{$comment->id}}</td>
                                            <td>{{$comment->author}}</td>
                                            <td>{{$comment->body}}</td>
                                            <td>{{$comment->created_at->diffForHumans()}}</td>
                                            <td><a href="{{route('home.post', $comment->post->id)}}">Zobacz artykuł</a></td>
                                            <td><a href="{{route('replies.show', $comment->id)}}">Zobacz odpowiedzi</a></td>
                                            <td>{{$comment->is_active == 1 ? 'Aktywny' : 'Nieaktywny'}}</td>
                                            <td>

                                                {!!Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]])!!}
                                                {!! Form::submit('Usuń', ['class'=>'btn btn-danger btn-fill btn-xs']) !!}
                                                {!! Form::close() !!}

                                            </td>

                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>

                        </div>
                        <div class="footer text-center">
                            {{$comments->render()}}
                        </div>


                    @else

                        <h1 class="text-center">Brak komentarzy<br><small>Nie dodałeś żadnego komentarza</small></h1>

                    @endif
                    </div>
                </div>

            </div>

        </div>
    </div>
@stop


