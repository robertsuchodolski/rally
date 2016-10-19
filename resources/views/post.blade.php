@extends('layouts.master')

@section('content')

    <section class="engine"><a rel="external" href="https://mobirise.com">easy web site maker</a></section><section class="mbr-section mbr-parallax-background mbr-after-navbar" id="msg-box8-0" style="background-image: url({{$post->photo->file}}); padding-top: 160px; padding-bottom: 600px;">

        <div class="mbr-arrow mbr-arrow-floating" aria-hidden="true"><a href="#header3-0"><i class="mbr-arrow-icon"></i></a></div>

        </div>

    </section>

    <section class="mbr-section mbr-section__container" id="header3-0" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="mbr-section-title display-2">{{$post->title}}</h3>
                    <small class="mbr-section-subtitle">autor {{$post->user->name}}, kategoria {{$post->category->name}} opublikowany {{$post->created_at->diffForHumans()}}</small>
                </div>
            </div>
        </div>
    </section>

    <section class="mbr-section article mbr-section__container" id="content2-0" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">

        <div class="container">
            <div class="row">
                <div class="col-xs-12 lead"><blockquote>{{str_limit($post->body, 260)}}.</blockquote></div>
            </div>
        </div>

    </section>

    <section class="mbr-section mbr-section__container" id="image2-0" style="background-color: rgb(255, 255, 255); padding-top: 80px; padding-bottom: 80px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <figure class="mbr-figure">
                        <div><img src="{{$post->photo->file}}"class="img-responsive"></div>

                        <figcaption class="mbr-figure-caption mbr-figure-caption-over">
                            <div class="container">{{$post->title}}</div>
                        </figcaption>

                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="mbr-section article mbr-section__container" id="content7-0" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">

        <div class="container">
            <div class="row">
                <div class="text-justify lead"><p>{{$post->body}}</p></div>
            </div>
        </div>

    </section>

    <section class="mbr-section mbr-section__comments" id="facebook-comments-block-0" style="background-color: rgb(255, 255, 255);">

        <div class="mbr-section__container mbr-section__container--isolated container">
            <div class="row">

            @if(Auth::check())

                <!-- Comments Form -->
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

                @else
                    <h3 class="alert alert-warning">Musisz być zalogowany aby dodawać komentarze</h3>

                @endif

                <hr>
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="facebookPlaceholder" data-numposts="5">
                    @if(count($comments) > 0)
                        <!-- Posted Comments -->
                        @foreach($comments as $comment)
                            <!-- Comment -->
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media">{{$comment->author}}
                                            <small>{{$comment->created_at->diffForHumans()}}</small>
                                        </h4>
                                    {{$comment->body}}

                                    @if(count($comment->replies) > 0)

                                        @foreach($comment->replies as $reply)

                                            @if($reply->is_active == 1)

                                                <!-- Nested Comment -->
                                                    <div id="nested-comment" class="media">
                                                        <a class="pull-left row-sm-offset" href="#">
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
                </div>



            </div>
        </div>
    </section>


    <section class="mbr-section mbr-section-md-padding" id="social-buttons1-0" style="background-color: rgb(255, 255, 255); padding-top: 90px; padding-bottom: 90px;">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-xs-center">
                    <h3 class="mbr-section-title display-2">UDOSTĘPNIJ TĄ STRONĘ!</h3>
                    <div>

                        <div class="mbr-social-likes" data-counters="false">
                    <span class="btn btn-social facebook" title="Facebook">
                        <i class="socicon socicon-facebook"></i>
                    </span>
                            <span class="btn btn-social twitter" title="Share link on Twitter">
                        <i class="socicon socicon-twitter"></i>
                    </span>
                            <span class="btn btn-social plusone" title="Share link on Google+">
                        <i class="socicon socicon-google"></i>
                    </span>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


@stop

@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function(){

            $(this).next().slideToggle("slow");

        });

    </script>

@stop