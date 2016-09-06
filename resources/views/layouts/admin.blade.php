@extends('layouts.master')


@section('content')
    <div class="col-sm-3">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1">Użytkownicy</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{route('users.create')}}">Dodaj</a></li>
                        <li class="list-group-item"><a href="{{route('users.index')}}">Pokaż / Edytuj</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse2">Artykuły</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{route('posts.create')}}">Dodaj</a></li>
                        <li class="list-group-item"><a href="{{route('posts.index')}}">Pokaż / Edytuj</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse3">Kategorie</a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{route('categories.create')}}">Dodaj</a></li>
                        <li class="list-group-item"><a href="{{route('categories.index')}}">Pokaż / Edytuj</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse4">Media</a>
                    </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{route('media.create')}}">Dodaj</a></li>
                        <li class="list-group-item"><a href="{{route('media.index')}}">Pokaż / Edytuj</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-9">

        @yield('admin_content')

    </div>

@stop
