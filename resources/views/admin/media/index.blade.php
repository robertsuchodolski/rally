@extends('layouts.admin')

@section('admin_content')

    <h1>Zdjęcia</h1>

    @if($photos)

        <table class="table">
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

                            <div class="form-group">
                                {!! Form::submit('Usuń', ['class'=>'btn btn-danger']) !!}
                            </div>

                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

    @endif

@stop
