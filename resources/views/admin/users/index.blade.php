@extends('layouts.admin')

@section('content')

    <h1>Użytkownicy:</h1>

    @if($users)

    <table class="table table-condensed table-hover">
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
             <td>{{$user->is_active == 1 ? 'Aktywny' : 'Nie aktywny'}}</td>
             <td>{{$user->email}}</td>
             <td>{{$user->created_at->diffForHumans()}}</td>
             <td>{{$user->updated_at->diffForHumans()}}</td>
         </tr>

       @endforeach

       </tbody>
     </table>

    @endif

@stop