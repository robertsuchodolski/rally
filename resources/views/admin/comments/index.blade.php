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
                <a class="navbar-brand" href="{{route('comments.index')}}">Komentarze</a>
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
                <div class="col-md-12">
                    <div class="card">

                        @if(count($comments) > 0)

                        <div class="header">
                            <h4 class="title">Komentarze</h4>
                            <p class="category">Komentarze dodane przez użytkowników</p>
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

                                            <td>
                                                @if($comment->is_active == 1)

                                                    {!!Form::model($comment, ['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]])!!}

                                                    <input type="hidden" name="is_active" value="0">

                                                        {!! Form::submit('Aktywny', ['class'=>'btn btn-success btn-fill btn-xs']) !!}

                                                    {!! Form::close() !!}

                                                @else

                                                    {!!Form::model($comment, ['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]])!!}

                                                    <input type="hidden" name="is_active" value="1">

                                                        {!! Form::submit('Nieaktywny', ['class'=>'btn btn-warning btn-fill btn-xs']) !!}

                                                    {!! Form::close() !!}

                                                @endif
                                            </td>

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
                            <h1 class="text-center">Brak komentarzy<br><small>Nikt nie dodał jeszcze komentarzy</small></h1>

                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop


