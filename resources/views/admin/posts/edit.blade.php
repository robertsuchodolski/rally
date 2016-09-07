@extends('layouts.admin')

@section('content')

    <h1>Edytuj artykuł:</h1>

    {!!Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files' => true])!!}

        <div class="form-group">
            {!! Form::label('title', 'Tytuł:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Treść:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Kategoria:') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Zdjęcie:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Edytuj', ['class'=>'btn btn-primary col-sm-2 ']) !!}
        </div>

        {!! Form::close() !!}

        {!!Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]])  !!}

        <div class="form-group">
            {!! Form::submit('Usuń', ['class'=>'btn btn-danger col-sm-2']) !!}
        </div>
        {!! Form::close() !!}

        @include('errors.form_errors')

@stop