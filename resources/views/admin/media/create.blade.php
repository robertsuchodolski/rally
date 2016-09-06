@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@stop

@section('admin_content')

    <h1>Dodaj zdjęcia</h1>

    {!!Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'class'=>'dropzone'])!!}


    {!! Form::close() !!}


@stop


@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@stop