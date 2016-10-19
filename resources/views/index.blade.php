@extends('layouts.master')

@section('content')

    <section class="engine"><a rel="external" href=""></a></section><section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-section-with-arrow mbr-after-navbar" id="header1-1" style="background-image: url({{asset('images/jumbotron.jpg')}});">



        <div class="mbr-table-cell">

            <div class="container">
                <div class="row">
                    <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">

                        <h1 class="mbr-section-title display-1">shakedown</h1>
                        <p class="mbr-section-lead lead">Witaj na moim blogu!!! <br> Zapraszam Cię do świata sportów motorowych. <br> Twórz wspólnie ze mną najlepszy blog rajdowy w Polsce.</p>

                    </div>
                </div>
             </div>

            <div class="mbr-arrow mbr-arrow-floating" aria-hidden="true"><a href="#slider-0"><i class="mbr-arrow-icon"></i></a></div>

        </div>

    </section>

    <section class="mbr-slider mbr-section mbr-section__container carousel slide mbr-section-nopadding" data-ride="carousel" data-keyboard="false" data-wrap="true" data-pause="false" data-interval="5000" id="slider-0">
        <div class=" container boxed-slider" style="padding-top: 120px; padding-bottom: 120px;">
            <div>
                <div>
                    <ol class="carousel-indicators">
                        <li data-app-prevent-settings="" data-target="#slider-0" class="active" data-slide-to="0"></li><li data-app-prevent-settings="" data-target="#slider-0" data-slide-to="1"></li><li data-app-prevent-settings="" data-target="#slider-0" data-slide-to="2"></li>
                    </ol>
                    @if($slides)
                    <div class="carousel-inner" role="listbox">

                        @foreach($slides->chunk(1)->take(3) as $count => $post)

                            @foreach($post as $slide)

                                <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full {{$count == 0 ? 'active' : '' }}" data-bg-video-slide="false" style="background-image: url({{$slide->photo->file}});">
                                    <div class="mbr-table-cell">
                                        <div class="mbr-overlay"></div>
                                        <div class="container-slide container">

                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-3 text-xs-right">
                                                    <h2 class="mbr-section-title display-1">{{$slide->title}} <small>| {{$slide->category->name}}</small></h2>

                                                    <div class="mbr-section-btn"><a class="btn btn-lg btn-info" href="{{route('home.post', $slide->id)}}">Więcej</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                @endforeach
                           @endforeach

                        </div>
                    </div>
                    @endif

                    <a data-app-prevent-settings="" class="left carousel-control" role="button" data-slide="prev" href="#slider-0">
                        <span class="icon-prev" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a data-app-prevent-settings="" class="right carousel-control" role="button" data-slide="next" href="#slider-0">
                        <span class="icon-next" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-0" style="background-color: rgb(255, 255, 255);">

        @if($posts)
            @foreach($posts->chunk(3) as $articles)

                <div class="mbr-cards-row row">

                    @foreach($articles as $post)

                    <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 40px; padding-bottom: 40px;">
                        <div class="container">
                            <div class="card cart-block">
                                <div class="card-img"><img src="{{$post->photo->file}}" class="card-img-top img-responsive"></div>
                                <div class="card-block">
                                    <h4 class="card-title">{{$post->title}}</h4>
                                    <h5 class="card-subtitle">{{$post->category->name}}</h5>
                                    <p class="card-text">{{str_limit($post->body, 160)}}</p>
                                    <div class="card-btn"><a href="{{route('home.post', $post->id)}}" class="btn btn-primary">Więcej</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endforeach

            @endif

    </section>

    <section class="mbr-section mbr-section__container" id="buttons1-0" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">

        <div class="container">
            <div class="row">
                <div class="pager">
                    {{$posts->render()}}
                </div>
            </div>
        </div>

    </section>

    <section class="mbr-gallery mbr-section mbr-section-nopadding mbr-slider-carousel" id="gallery4-0" data-filter="true" style="padding-top: 0rem; padding-bottom: 0rem;">
    @if($photos)
        <!-- Filter -->
            <div class="mbr-gallery-filter container gallery-filter-active"></div>

            <!-- Gallery -->
            <div class="mbr-gallery-row container">
                <div class=" mbr-gallery-layout-default">
                    <div>
                        <div>


                            @foreach($photos->where('category_id', 2) as $photo)
                                <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-tags="WRC" data-video-url="false">

                                    <div href="#lb-gallery4-0" data-slide-to="0" data-toggle="modal">

                                        <img alt="" src="{{$photo->photo->file}}" class="img-responsive">

                                        <span class="icon-focus"></span>

                                    </div>

                                </div>

                            @endforeach

                            @foreach($photos->where('category_id', 6) as $photo)

                                <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-tags="ERC" data-video-url="false">
                                    <div href="#lb-gallery4-0" data-slide-to="1" data-toggle="modal">

                                        <img alt="" src="{{$photo->photo->file}}">

                                        <span class="icon-focus"></span>

                                    </div>
                                </div>

                            @endforeach

                            @foreach($photos->where('category_id', 5) as $photo)

                                <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-tags="RSMP" data-video-url="false">
                                    <div href="#lb-gallery4-0" data-slide-to="2" data-toggle="modal">

                                        <img alt="" src="{{$photo->photo->file}}">

                                        <span class="icon-focus"></span>

                                    </div>
                                </div>

                            @endforeach

                            @foreach($photos->where('category_id', 4) as $photo)

                                <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-tags="Dakar" data-video-url="false">
                                    <div href="#lb-gallery4-0" data-slide-to="3" data-toggle="modal">

                                        <img alt="" src="{{$photo->photo->file}}">

                                        <span class="icon-focus"></span>

                                    </div>
                                </div>

                            @endforeach

                            @foreach($photos->where('category_id', 7) as $photo)

                                <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-tags="Formula 1" data-video-url="false">
                                    <div href="#lb-gallery4-0" data-slide-to="4" data-toggle="modal">

                                        <img alt="" src="{{$photo->photo->file}}">

                                        <span class="icon-focus"></span>

                                    </div>
                                </div>

                            @endforeach

                            @foreach($photos->where('category_id', 1) as $photo)

                                <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-tags="RallyCross" data-video-url="false">
                                    <div href="#lb-gallery4-0" data-slide-to="5" data-toggle="modal">

                                        <img alt="" src="{{$photo->photo->file}}">

                                        <span class="icon-focus"></span>

                                    </div>
                                </div>

                            @endforeach

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!-- Lightbox -->
                <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery4-0">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <ol class="carousel-indicators">
                                    <li data-app-prevent-settings="" data-target="#lb-gallery4-0" class=" active" data-slide-to="0"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-0" data-slide-to="1"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-0" data-slide-to="2"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-0" data-slide-to="3"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-0" data-slide-to="4"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-0" data-slide-to="5"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-0" data-slide-to="6"></li><li data-app-prevent-settings="" data-target="#lb-gallery4-0" data-slide-to="7"></li>
                                </ol>
                                <div class="carousel-inner">

                                    @foreach($photos->chunk(1) as $count => $photo)

                                        <div class="carousel-item {{$count == 0 ? 'active' : '' }}">

                                            @foreach($photo as $image)

                                                <img src="{{$image->photo->file}}" alt="" class="img-responsive">

                                            @endforeach

                                        </div>


                                    @endforeach
                                </div>
                                <a class="left carousel-control" role="button" data-slide="prev" href="#lb-gallery4-0">
                                    <span class="icon-prev" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" role="button" data-slide="next" href="#lb-gallery4-0">
                                    <span class="icon-next" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>

                                <a class="close" href="#" role="button" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                    <span class="sr-only">Close</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif

    </section>
    <section class="mbr-section mbr-section-md-padding" id="social-buttons1-0" style="background-color: rgb(255, 255, 255); padding-top: 90px; padding-bottom: 90px;">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-xs-center">
                    <h3 class="mbr-section-title display-2">udostępnij tą stronę!</h3>
                    <div>

                        <div class="mbr-social-likes" data-counters="false">
                    <span class="btn btn-social facebook" title="Share link on Facebook">
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