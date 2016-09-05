@extends('layouts.admin')

@section('admin_content')

    <h1>Dodaj użytkownika:</h1>

    {!!Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files' => true])!!}

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
            {!! Form::select('role_id', [''=>'Wybierz'] + $roles, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', array(''=>'Wybierz', 1=>'Aktywny', 0=>'Nie aktywny'), null, ['class'=>'form-control']) !!}
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

    @include('errors.form_errors')

@stop