@extends('layouts.admin')

@section('content')

    <h1>Kategorie</h1>

    <div class="col-sm-6">

        {!!Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]])!!}

        <div class="form-group">
            {!! Form::label('name', 'Kategoria:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Zaktualizuj', ['class'=>'btn btn-primary col-sm-3']) !!}
        </div>

        {!! Form::close() !!}

        {!!Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]])!!}

        <div class="form-group">
            {!! Form::submit('Usuń', ['class'=>'btn btn-danger col-sm-2']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    <div class="col-sm-6">


    </div>

@stop