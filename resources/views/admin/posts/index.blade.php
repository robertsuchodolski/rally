@extends('layouts.admin')

@section('content')
    <h1>Artykuły</h1>

    @if($posts)

    <table class="table ">
        <thead>
        <tr>
            <th>Id</th>
            <th>Zdjęcie</th>
            <th>Autor</th>
            <th>Kategoria</th>
            <th>Tytuł</th>
            <th>Treść</th>
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
            <td>{{str_limit($post->body, 10)}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
            <td><a href="{{route('home.post', $post->id)}}">Zobacz artykuł</a></td>
            <td><a href="{{route('comments.show', $post->id)}}">Zobacz komentarze</a></td>

        </tr>

            @endforeach

        </tbody>
    </table>
    @endif
@stop