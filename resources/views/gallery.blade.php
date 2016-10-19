@extends('layouts.master')

@section('content')

    <section class="engine"><a rel="external" href="https://mobirise.com">simple wysiwyg website development software</a></section><section class="mbr-section mbr-parallax-background mbr-after-navbar" id="content5-0" style="background-image: url({{asset('images/gallery.jpg')}}); padding-top: 160px; padding-bottom: 160px;">

        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);">
        </div>

        <div class="container">
            <h2 class="mbr-section-title display-2" style="color: #ffffff">shakedown |<small> galeria</small></h2>
        </div>

    </section>


    <section class="mbr-gallery mbr-section mbr-section-nopadding mbr-slider-carousel" id="gallery4-0" data-filter="true" style="padding-top: 0rem; padding-bottom: 0rem;">
    @if($posts)
        <!-- Filter -->
            <div class="mbr-gallery-filter container gallery-filter-active"></div>

            <!-- Gallery -->
            <div class="mbr-gallery-row container">
                <div class=" mbr-gallery-layout-default">
                    <div>
                        <div>


                            @foreach($posts->where('category_id', 2) as $post)
                                <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-tags="WRC" data-video-url="false">

                                    <div href="#lb-gallery4-0" data-slide-to="0" data-toggle="modal">

                                        <img alt="" src="{{$post->photo->file}}" class="img-responsive">

                                        <span class="icon-focus"></span>

                                    </div>

                                </div>

                            @endforeach

                            @foreach($posts->where('category_id', 6) as $post)

                                <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-tags="ERC" data-video-url="false">
                                    <div href="#lb-gallery4-0" data-slide-to="1" data-toggle="modal">

                                        <img alt="" src="{{$post->photo->file}}">

                                        <span class="icon-focus"></span>

                                    </div>
                                </div>

                            @endforeach

                            @foreach($posts->where('category_id', 5) as $post)

                                <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-tags="RSMP" data-video-url="false">
                                    <div href="#lb-gallery4-0" data-slide-to="2" data-toggle="modal">

                                        <img alt="" src="{{$post->photo->file}}">

                                        <span class="icon-focus"></span>

                                    </div>
                                </div>

                            @endforeach

                            @foreach($posts->where('category_id', 4) as $post)

                                <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-tags="Dakar" data-video-url="false">
                                    <div href="#lb-gallery4-0" data-slide-to="3" data-toggle="modal">

                                        <img alt="" src="{{$post->photo->file}}">

                                        <span class="icon-focus"></span>

                                    </div>
                                </div>

                            @endforeach

                            @foreach($posts->where('category_id', 7) as $post)

                                <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-tags="Formula 1" data-video-url="false">
                                    <div href="#lb-gallery4-0" data-slide-to="4" data-toggle="modal">

                                        <img alt="" src="{{$post->photo->file}}">

                                        <span class="icon-focus"></span>

                                    </div>
                                </div>

                            @endforeach

                            @foreach($posts->where('category_id', 1) as $post)

                                <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-tags="RallyCross" data-video-url="false">
                                    <div href="#lb-gallery4-0" data-slide-to="5" data-toggle="modal">

                                        <img alt="" src="{{$post->photo->file}}">

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

                                    @foreach($posts->chunk(1) as $count => $post)

                                        <div class="carousel-item {{$count == 0 ? 'active' : '' }}">

                                            @foreach($post as $image)

                                                <img src="{{$image->photo->file}}" alt="">

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




@stop