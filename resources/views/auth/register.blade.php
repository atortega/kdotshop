@extends('layouts.app')

@section('content')
<div class="container">

    <div class="clearfix"></div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- <div class="card"> -->
                <div class="main space-top" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                    <div class="form-block-login p-30 light-gray-bg border-clear">
                        <a href="{{ url('/signup')}}" class="d-inline-block float-right"
                                  style="color: #f49ac1; font-weight: bold; text-decoration:none;">SignUp
                                 </a> 
                            <h2 class="title">{{ __('Register') }}</h2>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                        @csrf

                                        <div class="form-group has-feedback row">
                                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                                <i class="fa fa-user form-control-feedback pr-4"></i>
                                                @if ($errors->has('first_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group has-feedback row">
                                            <label for="middle_name" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{ old('middle_name') }}" autofocus>
                                                <i class="fa fa-user form-control-feedback pr-4"></i>
                                                @if ($errors->has('middle_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group has-feedback row">
                                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
                                                <i class="fa fa-user form-control-feedback pr-4"></i>
                                                @if ($errors->has('last_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group has-feedback row">
                                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Date Of birth') }}</label>

                                            <div class="col-md-6">
                                                <input id="birthdate" type="date" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ old('birthdate') }}" required autofocus>
                                                <i class="fa fa-user form-control-feedback pr-4"></i>
                                                @if ($errors->has('birthdate'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group has-feedback row">
                                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                            <div class="col-md-6">
                                                <select class="form-control" id="gender" name="gender">
                                                    <option value="M" >Male</option>
                                                    <option value="F" >Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group has-feedback row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                                <i class="fa fa-user form-control-feedback pr-4"></i>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group has-feedback row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                <i class="fa fa-lock form-control-feedback pr-4"></i>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group has-feedback row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                <i class="fa fa-lock form-control-feedback pr-4"></i>
                                            </div>
                                        </div>
                                        
                                           
                                             <p style="color: red;">By signing up, you agree to <a href="termsandconditions.php" style="color: red; font-weight: bold;"> KDot's Terms and Conditions</a></p>
                                            
                                        


                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                 </div>
                            <div class="card-header"></div>
                    </div>
                </div> 

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
