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
                <a class="navbar-brand" href="">Odpowiedzi na komentarz <b>"{{$comment->body}}"</b></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="btn" href="{{route('comments.index')}}">Powrót do komentarzy</a></li>
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
                            <h4 class="title">Odpowiedzi</h4>
                            <p class="category">Odpowiedzi do komentarza</p>
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

                                    <td>
                                        @if($reply->is_active == 1)

                                            {!!Form::model($reply, ['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]])!!}

                                            <input type="hidden" name="is_active" value="0">

                                                {!! Form::submit('Aktywny', ['class'=>'btn btn-success btn-fill btn-xs']) !!}

                                            {!! Form::close() !!}

                                        @else

                                            {!!Form::model($reply, ['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]])!!}

                                            <input type="hidden" name="is_active" value="1">

                                                {!! Form::submit('Nieaktywny', ['class'=>'btn btn-warning btn-fill btn-xs']) !!}

                                            {!! Form::close() !!}

                                        @endif
                                    </td>

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
                            {{--{{$comments->render()}}--}}
                        </div>

                    @else

                        <h1 class="text-center">Brak odpowiedzi<br><small>Nikt nie odpowiedział na ten komentarz</small></h1>

                    @endif

                    </div>
                </div>

            </div>
        </div>
    </div>

@stop








