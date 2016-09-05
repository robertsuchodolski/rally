@extends('layouts.admin')

@section('admin_content')

    <h1>Kategorie</h1>

    <div class="col-sm-6">

        {!!Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store'])!!}

            <div class="form-group">
                {!! Form::label('name', 'Kategoria:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Dodaj', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

    </div>

    <div class="col-sm-6">

        @if($categories)

            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Kategoria</th>
                    <th>Data utworzenia</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'Nieokreślono'}}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        @endif

    </div>

@stop