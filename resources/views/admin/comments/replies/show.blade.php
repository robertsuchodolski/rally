@extends('layouts.admin')

@section('content')

    @if(count($replies) > 0)

        <h1>Odpowiedzi</h1>

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Autor</th>
                <th>Email</th>
                <th>Treść</th>
                <th>Utworzony</th>
            </tr>
            </thead>
            <tbody>

            @foreach($replies as $reply)

                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td>{{$reply->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->id)}}">Zobacz komentarz</a></td>

                    <td>
                        @if($reply->is_active == 1)

                            {!!Form::model($reply, ['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]])!!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Dezaktywuj', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else

                            {!!Form::model($reply, ['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]])!!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Aktywuj', ['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif
                    </td>

                    <td>

                        {!!Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]])!!}

                        <div class="form-group">
                            {!! Form::submit('Usuń', ['class'=>'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}

                    </td>

                </tr>

            @endforeach

            </tbody>
        </table>


    @else

        <h1 class="text-center">Brak odpowiedzi do komentarza</h1>


    @endif

@stop