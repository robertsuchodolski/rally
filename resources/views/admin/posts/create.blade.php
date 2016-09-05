@extends('layouts.admin')

@section('admin_content')

    <h1>Dodaj artykuł:</h1>

    {!!Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files' => true])!!}

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
            {!! Form::select('category_id', [''=>'Wybierz'] + $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Zdjęcie:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Dodaj', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

    @include('errors.form_errors')

@stop