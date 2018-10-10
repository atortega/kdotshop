@extends('layouts.app')

@section('content')
<div class="container">
    <div class="clearfix"></div>
    <div class="row justify-content-center">
        <div class="main space-top" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
            <div class="form-block-login p-30 light-gray-bg border-clear">
                <a href="{{ url('/signup')}}" class="d-inline-block float-right"
                     style="color: #f49ac1; font-weight: bold; text-decoration:none;">SignUp
                </a>
                <h2 class="title">{{ __('Login') }}</h2>

                <!-- <div class="card-body"> -->
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                    
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a href="{{ url('/redirect') }}" class="btn btn-primary">Login With Google</a>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                     <div class="card-header">
                                <p class="text-center space-top">Don't have an account yet? <a href="/signup">Sign Up</a> now.</p>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection