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
                <a class="navbar-brand" href="{{route('posts.index')}}">Artykuły</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('posts.create')}}" class="btn">Dodaj artykuł</a></li>
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
                            <h4 class="title">Artykuły</h4>
                            <p class="category">Artykuły dostępne na blogu</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            @if($posts)

                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Zdjęcie</th>
                                        <th>Autor</th>
                                        <th>Kategoria</th>
                                        <th>Tytuł</th>
                                        <th>Utworzony</th>
                                        <th>Zaktualizowany</th>
                                        <th>Link</th>
                                        <th>Komentarze</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($posts as $post)

                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td><img height="50px" src="{{$post->photo ? $post->photo->file : 'https://placehold.it/400x400'}}" alt=""></td>
                                            <td>{{$post->user->name}}</td>
                                            <td>{{$post->category ? $post->category->name : 'Brak'}}</td>
                                            <td><a href="{{route('posts.edit', $post->id)}}">{{str_limit($post->title, 10)}}</a></td>
                                            <td>{{$post->created_at->diffForHumans()}}</td>
                                            <td>{{$post->updated_at->diffForHumans()}}</td>
                                            <td><a href="{{route('home.post', $post->id)}}">Zobacz artykuł</a></td>
                                            <td><a href="{{route('comments.show', $post->id)}}">Zobacz komentarze</a></td>

                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>

                            @endif

                        </div>
                        <div class="footer text-center">
                            {{$posts->render()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop



