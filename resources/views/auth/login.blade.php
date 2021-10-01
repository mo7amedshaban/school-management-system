<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ URL::asset('assets/login-form/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/login-form/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/login-form/css/bootstrap.min.css') }}">
    <link href=" {{ URL::asset('assets/login-form/css/style.css') }} " rel="stylesheet">

    <!-- Style -->

    <title>Login </title>
</head>
<body>
<style>
    a.register {
        text-decoration: none;
        background-color: #6c3620;
        color: white
    }

    a.register:hover {
        text-decoration: none;
        background-color: #6c3620;
        text-decoration: none;

        color: white


    }
</style>

<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2"
         style="background-image: url({{ URL::asset('assets/login-form/images/bg_1.jpg')}});"></div>

    <div class="contents order-2 order-md-1">

        <div class="container">

            <div class="btn-group mb-1">
                <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (App::getLocale() == 'ar')
                        {{ LaravelLocalization::getCurrentLocaleName() }}
                        <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                    @else
                        {{ LaravelLocalization::getCurrentLocaleName() }}
                        <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                    @endif
                </button>
                <div class="dropdown-menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </div>


            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <h3>{{__('auth.login_system')}}</h3>
                    <p class="mb-4">{{__('auth.system_name')}}</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group  last mb-3">
                            <label for="email">{{ __('auth.Email_address') }}</label>


                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group last mb-3">
                            <label for="password">{{ __('auth.password') }}</label>

                            <div>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="d-flex mb-5 align-items-center">

                            <span class="ml-4">
                                <label class="form-check-label" for="remember">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('auth.remmeber_me') }}

                                </label>
                            </span>


                            <span class="ml-auto">
                                @if (Route::has('password.request'))
                                    <a class="forgot-pass" href="{{ route('password.request') }}">
                                            {{ __('auth.forgot_pass') }}
                                        </a>
                                @endif
                            </span>


                        </div>

                        <button type="submit" class="btn btn-block btn-primary">
                            {{ __('auth.login') }}
                        </button>


                        <a href="{{ route('register') }}"
                           class="d-flex  mb-5 justify-content-center btn btn-block  active register"
                           role="button"><span class="my-auto">{{__('auth.register')}}</span></a>


                    </form>
                </div>
            </div>
        </div>
    </div>


</div>


@include('layouts.footer-scripts')

<script src="{{ URL::asset('assets/login-form/js/main.js') }}"></script>
</body>
</html>


