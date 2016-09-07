@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        Autor: <a href="">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->

    <p><span class="glyphicon glyphicon-time"></span>Utworzony: {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{str_limit($post->body, 200)}}</p>
    <p class="text-justify">{{$post->body}}</p>

    <hr>

    @if(Session::has('comment_message'))

            {{session('comment_message')}}

    @endif
    <!-- Blog Comments -->

    @if(Auth::check())

    <!-- Comments Form -->
    <div class="well">
        <h4>Dodaj komentarz:</h4>

        {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

            <div class="form-group">
                {!! Form::label('body', 'Treść') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Dodaj komentarz', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

    @else
        <h3 class="alert alert-warning">Musisz być zalogowany aby dodawać komentarze</h3>

    @endif

    <hr>


    @if(count($comments) > 0)
    <!-- Posted Comments -->
        @foreach($comments as $comment)
        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                {{$comment->body}}

                    @if(count($comment->replies) > 0)

                        @foreach($comment->replies as $reply)

                            @if($reply->is_active == 1)

                                <!-- Nested Comment -->
                                    <div id="nested-comment" class="media">
                                        <a class="pull-left" href="#">
                                            <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{$reply->author}}
                                                <small>{{$reply->created_at->diffForHumans()}}</small>
                                            </h4>
                                            {{$reply->body}}
                                        </div>
                                    <!-- End Nested Comment -->
                                    </div>
                            @endif

                            @endforeach

                        @else

                            <h5 class="alert alert-warning text-center">Brak odpowiedzi na ten komentarz</h5>

                    @endif
            </div>


            <div class="comment-reply-container">

                <button class="toggle-reply btn btn-primary pull-right">Odpowiedz</button>

                <div class="comment-reply col-sm-9">

                    {!!Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply'])!!}

                    <input type="hidden" name="comment_id" value="{{$comment->id}}">

                    <div class="form-group">
                        {!! Form::label('body', 'Odpowiedź:') !!}
                        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows' => 1]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Dodaj odpowiedź', ['class'=>'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

        @endforeach

        @else

            <h5 class="alert alert-warning text-center">Brak komentarzy</h5>

        @endif


    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Wyszukaj</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Kategorie</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>

    </div>

@stop

@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function(){

            $(this).next().slideToggle("slow");

        });

    </script>

@stop