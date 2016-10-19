@extends('layouts.admin')

@section('content')
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('users.index')}}">Użytkownicy</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('users.create')}}" class="btn">Dodaj użytkownika</a></li>
                    <li>
                        <a class="btn" href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Wyloguj się</a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Użytkownicy</h4>
                            <p class="category">Użytkownicy zarejstrowani na blogu</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            @if($users)

                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Zdjęcie</th>
                                        <th>Imię i nazwisko</th>
                                        <th>Rola</th>
                                        <th>Status</th>
                                        <th>Email</th>
                                        <th>Utworzony</th>
                                        <th>Zaktualizowany</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $user)

                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td><img height="25" src="{{$user->photo ? $user->photo->file : 'https://placehold.it/400x400'}}" alt=""></td>
                                            <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                                            <td>{{$user->role ? $user->role->name : 'Brak przydzielonej roli'}}</td>
                                            <td>{{$user->is_active == 1 ? 'Aktywny' : 'Nieaktywny'}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->created_at->diffForHumans()}}</td>
                                            <td>{{$user->updated_at->diffForHumans()}}</td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>

                            @endif

                        </div>
                        <div class="footer text-center" >
                            {{$users->render()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop