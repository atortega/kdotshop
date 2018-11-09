@extends('layouts.app')

@section('content')

    <title>KDot | Sign Up </title>
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
                        Sign Up
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
                <div class="form-block-signUp p-30 light-gray-bg border-clear">
                    <a href="{{ url('/login')}}" class="d-inline-block float-right"
                        style="color: #f49ac1; font-weight: bold; text-decoration:none;">
                        Login
                    </a> 
                    <h2 class="title">{{ __('Sign Up') }}</h2>

                    <form method="POST" action="{{ route('register') }}"
                        class="form-horizontal" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group has-feedback row" > 
                            <label class="col-md-3 text-md-right control-label col-form-label"
                                for="phone_number">
                                {{ __('Mobile Phone') }}
                                <strong class="text-default" style="font-size: 18px;"> *</strong>
                            </label>
                            <div class="col-md-8">
                                <input type="phone_number" class="form-control" id="phonenumber"
                                    placeholder="Enter Phone Number (required)" name="phone_number" required>
                                <i class="glyphicon glyphicon-phone form-control-feedback pr-4"></i>
                                <button type="submit" class="btn btn-animated btn-default pull-right">
                                    {{ __('Send Verification Code') }}
                                    <i class="fa fa-send"></i>
                                </button>
                            </div>  
                        </div>   

                        <div class="form-group has-feedback row"> 
                            <label class="col-md-3 text-md-right control-label col-form-label"
                                for="verification-code">
                            </label>
                            <div class="col-md-8">
                                <input type="vCode" class="form-control" id="vCode"
                                    placeholder="Verification Code" name="code">
                                <i class="glyphicon glyphicon-comment form-control-feedback pr-4"></i>
                            </div>
                        </div>

                        <div class="separator"></div>

                        <div class="form-group has-feedback row"> 
                            <label class="col-md-3 text-md-right control-label col-form-label"
                                for="firstname">
                                {{ __('First Name') }}
                                <strong class="text-default" style="font-size: 18px;"> *</strong>
                            </label>
                            <div class="col-md-8">
                                <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                    id="first_name" type="text" name="first_name" value="{{ old('first_name') }}"
                                    placeholder="First Name" required autofocus>

                                <i class="fa fa-user form-control-feedback pr-4"></i>
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row"> 
                            <label class="col-md-3 text-md-right control-label col-form-label"
                                for="middle_name">
                                {{ __('Middle Name') }}
                                <strong class="text-default" style="font-size: 18px;"> *</strong>
                            </label>
                            <div class="col-md-8">
                                <input class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" 
                                    id="middle_name" type="text" name="middle_name" value="{{ old('middle_name') }}"
                                    placeholder="Middle Name" required autofocus>

                                <i class="fa fa-user form-control-feedback pr-4"></i>
                                @if ($errors->has('middle_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row" > 
                            <label class="col-md-3 text-md-right control-label col-form-label"
                                for="last_name">
                                {{ __('Last Name') }}
                                <strong class="text-default" style="font-size: 18px;"> *</strong>
                            </label>
                            <div class="col-md-8">
                                <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                    id="last_name" type="text"  name="last_name" value="{{ old('last_name') }}"
                                    placeholder="Last Name" required autofocus>
                                <i class="fa fa-user form-control-feedback pr-4"></i>
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group has-feedback row" > 
                            <label class="col-md-3 text-md-right control-label col-form-label"
                                for="dob">
                                {{ __('Date of Birth') }}
                            </label>
                            <div class="col-md-8">
                                <input class="form-control{{ $errors->has('birthdate') ? 'is-invalid' : '' }}"
                                    id="birthdate" type="date" name="birthdate" value="{{ old('birthdate') }}" 
                                    placeholder="Date of Birth" required autofocus>
                                <i class="fa fa-birthday-cake form-control-feedback pr-4"></i>
                                @if ($errors->has('birthdate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group has-feedback row" > 
                            <label class="col-md-3 text-md-right control-label col-form-label"
                                for="gender">
                                {{ __('Gender') }}
                            </label>
                            <div class="col-md-8">
                                <select class="form-control" id="gender" placeholder="Gender" name="gender">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>  
                                <!-- <i class="fa fa-venus-mars form-control-feedback pr-4"></i> -->
                            </div>
                        </div> 

                        <div class="form-group has-feedback row" >
                            <label class="col-md-3 text-md-right control-label col-form-label"
                                for="email">
                                {{ __('E-mail') }}
                                <strong class="text-default" style="font-size: 18px;"> *</strong>
                            </label>
                            <div class="col-md-8">
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    id="email" type="email" name="email" value="{{ old('email') }}"
                                    placeholder="E-mail" required autofocus>
                                <i class="fa fa-envelope form-control-feedback pr-4"></i>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group has-feedback row">
                            <label class="col-md-3 text-md-right control-label col-form-label"
                                for="password">
                                {{ __('Password') }}
                                <strong class="text-default" style="font-size: 18px;"> *</strong>
                            </label>
                            <div class="col-md-8">
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                    id="password" type="password" name="password"
                                    placeholder="Password" required autofocus>
                                <i class="fa fa-unlock-alt form-control-feedback pr-4"></i>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row" >
                            <label class="col-md-3 text-md-right control-label col-form-label"
                                for="confirm_password">
                            </label>
                            <div class="col-md-8">
                                <input class="form-control" id="password-confirm"
                                    type="password" name="password_confirmation"
                                    placeholder="Confirm Password" required autofocus>
                                <i class="fa fa-lock form-control-feedback pr-4"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback row">
                            <label class="col-md-3 text-md-right control-label col-form-label space-top"
                                for="checkbox">
                                <strong class="text-default" style="font-size: 18px;"> *</strong>
                            </label>
                            <div class="ml-md-auto col-md-9">
                                <div class="checkbox form-check space-top">
                                    <input id="signUpCheckBoxID" class="form-check-input"
                                        name="checkbox" type="checkbox" required>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <span class="text-default">
                                                I have read and agree to the
                                                <a href="#" data-toggle="modal" data-target="#tAndCModal"
                                                    class="text-default"
                                                    style="font-weight: bold;">
                                                    Terms and Conditions
                                                </a>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="ml-md-auto col-md-12">
                                <div class="text-center">
                                    <button id="signUpButtonID" class="btn btn-group btn-default btn-lg btn-animated"
                                        type="submit">
                                        {{ __('SIGN UP') }}
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                        
                                <div class="separator mt-10"></div>
                                
                                <div class="row">
                                    <div class="col-md-12 text-center">                     
                                        <span class="text-center text-muted clearfix">Connect with</span>
                                        <a href="{{ url('/redirect/google') }}"
                                                class="btn btn-animated googleplus clearfix">
                                            Sign in with Google
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a href="{{ url('/redirect/twitter') }}"
                                                class="btn btn-animated twitter clearfix">
                                            Sign in with Twitter
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-header col-md-12 border-clear">
                        <p class="text-center space-top">Already have an account?
                            <a href="{{ url('/login')}}">Login</a>
                        </p>
                    </div>
                </div>   
            </div>
            <!-- main end -->
        </div>
    </div>
</div>
@endsection

