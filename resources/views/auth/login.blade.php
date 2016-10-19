@extends('layouts.master')

@section('content')

    <section class="engine"><a rel="external" href="https://mobirise.com">html web site building software download</a></section><section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-section-with-arrow mbr-after-navbar" id="header1-1" style="background-image: url({{asset('images/jumbotron.jpg')}});">



        <div class="mbr-table-cell">

            <div class="container">
                <div class="row">
                    <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">

                        <h1 class="mbr-section-title display-1">shakedown</h1>
                        <p class="mbr-section-lead lead">Witaj na moim blogu!!! <br> Zapraszam Cię do świata sportów motorowych. <br> Twórz wspólnie ze mną najlepszy blog rajdowy w Polsce.</p>

                    </div>
                </div>
            </div>

            <div class="mbr-arrow mbr-arrow-floating" aria-hidden="true"><a href="#login"><i class="mbr-arrow-icon"></i></a></div>

        </div>

    </section>



<div class="container" id="login">
    <div class="row" style="padding-top: 75px; padding-bottom: 75px">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Zaloguj się</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Adres email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Hasło</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Zapamiętaj mnie
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Zaloguj
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Zapomniałeś hasła?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
