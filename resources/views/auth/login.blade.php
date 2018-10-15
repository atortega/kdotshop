@extends('layouts.app')

@section('content')

    <title>KDot | Login </title>
</head>

<body class="front-page">

    <div class="scrollToTop circle"><i class="fa fa-angle-up"></i></div>
    <!-- page-wrapper start -->
    <!-- ================ -->
    <div class="page-wrapper">

        <!-- breadcrumb start -->
        <!-- ================ -->
        <div class="breadcrumb-container">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home pr-2"></i>
                        <a class="link-dark" href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Login
                    </li>
                </ol>
            </div>
        </div>
        <!-- breadcrumb end -->

        <!-- div #app start -->
        <div id="app">
            <!-- main start -->
            <main class="py-4">

<div class="container">
    <div class="clearfix"></div>
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <!-- main start -->
            <!-- ================ -->
            <div class="main" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                <div class="form-block-login p-30 light-gray-bg border-clear">
                    <a href="{{ url('/register')}}" class="d-inline-block float-right"
                        style="color: #f49ac1; font-weight: bold; text-decoration:none;">
                        Sign Up
                    </a>
                    <h2 class="title">{{ __('Login') }}</h2>

                    <form method="POST" action="{{ route('login') }}"
                        class="form-horizontal" aria-label="{{ __('Login') }}">
                        @csrf

                    
                        <div class="form-group has-feedback row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">
                                {{ __('E-mail Address') }}
                            </label>

                            <div class="col-md-12">
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                                    type="email" name="email" value="{{ old('email') }}" required autofocus>
                                <i class="fa fa-user form-control-feedback pr-4"></i>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    

                        <div class="form-group has-feedback row">
                            <label for="password" class="col-sm-3 col-form-label text-md-right">
                                {{ __('Password') }}
                            </label>

                            <div class="col-md-12">
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password"
                                    type="password" name="password" required>
                                <i class="fa fa-lock form-control-feedback pr-4"></i>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="ml-md-auto col-md-12">
                                <div class="d-inline-block col-md-12">
                                    <div class="checkbox form-check pull-left">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <div class="form-check">
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-animated btn-default pull-right">
                                        {{ __('Login') }}
                                        <i class="fa fa-sign-in"></i>
                                    </button>
                                </div>

                                <div class="col-md-12 text-center space-top">
                                    <a class="btn-md-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>

                                <div class="separator mt-10"></div>

                                <div class="row">
                                    <div class="col-md-12 text-center">                     
                                        <span class="text-center text-muted clearfix">Login with</span>
                                        <a href="{{ url('/redirect') }}" class="btn btn-animated googleplus clearfix">
                                            Sign in with Google
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a href="{{ url('#') }}" class="btn btn-animated twitter clearfix">
                                            Sign in with Twitter
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-header col-md-12 border-clear">
                        <p class="text-center space-top">Don't have an account yet?
                            <a href="{{ url('/register')}}">Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- main end -->
        </div>
    </div>
</div>
@endsection