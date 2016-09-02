@extends('layouts.admin')

@section('content')

    <h1>Edytuj użytkownika:</h1>

    <div class="col-sm-3">

        <img src="{{$user->photo ? $user->photo->file : 'https://placehold.it/400x400'}}" alt="" class="img-responsive img-thumbnail">

    </div>

    <div class="col-sm-9">

    {!!Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files' => true])!!}

    <div class="form-group">
        {!! Form::label('name', 'Imię i nazwisko:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Rola:') !!}
        {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array( 1=>'Aktywny', 0=>'Nie aktywny'), null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Hasło:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Zdjęcie:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Utwórz', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    </div>

    @include('errors.form_errors')

@stop