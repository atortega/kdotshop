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

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="tAndCModal"
    tabindex="-1" role="dialog" aria-labelledby="tAndCModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tAndCModalLabel">Terms and Conditions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Introduction</h3> 
                <div class="separator-2"></div>
                <p>These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, KDot Shop accessible at www.kdotshop.com.</p>
                <p>These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.</p>
                <p>Minors or people below 18 years old are not allowed to use this Website.</p>

                
                <h3 class="space-top">Intellectual Property Rights</h3>
                <div class="separator-2"></div>
                <p>Other than the content you own, under these Terms, KDot Shop and/or its licensors own all the intellectual property rights and materials contained in this Website.</p>
                <p>You are granted limited license only for purposes of viewing the material contained on this Website.</p>

                <h3 class="space-top">Restrictions</h3>
                <div class="separator-2"></div>
                <p>You are specifically restricted from all of the following:</p>
                <ul>
                    <li>publishing any Website material in any other media;</li>
                    <li>selling, sublicensing and/or otherwise commercializing any Website material;</li>
                    <li>publicly performing and/or showing any Website material;</li>
                    <li>using this Website in any way that is or may be damaging to this Website;</li>
                    <li>using this Website in any way that impacts user access to this Website;</li>
                    <li>using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</li>
                    <li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li>
                    <li>using this Website to engage in any advertising or marketing.</li>
                </ul>
                <p>Certain areas of this Website are restricted from being access by you and KDot Shop may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.</p>

                <h3 class="space-top">Your Content</h3>
                <div class="separator-2"></div>
                <p>In these Website Standard Terms and Conditions, "Your Content" shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant KDot Shop a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.</p>
                <p>Your Content must be your own and must not be invading any third-party’s rights. KDot Shop reserves the right to remove any of Your Content from this Website at any time without notice.</p>

                <h3 class="space-top">No warranties</h3>
                <div class="separator-2"></div>
                <p>This Website is provided "as is," with all faults, and KDot Shop express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising you.</p>

                <h3 class="space-top">Limitation of liability</h3>
                <div class="separator-2"></div>
                <p>In no event shall KDot Shop, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  KDot Shop, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>

                <h3 class="space-top">Indemnification</h3>
                <div class="separator-2"></div>
                <p>You hereby indemnify to the fullest extent KDot Shop from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.</p>

                <h3 class="space-top">Severability</h3>
                <div class="separator-2"></div>
                <p>If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.</p>

                <h3 class="space-top">Variation of Terms</h3>
                <div class="separator-2"></div>
                <p>KDot Shop is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.</p>

                <h3 class="space-top">Assignment</h3>
                <div class="separator-2"></div>
                <p>The KDot Shop is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.</p>

                <h3 class="space-top">Entire Agreement</h3>
                <div class="separator-2"></div>
                <p>These Terms constitute the entire agreement between KDot Shop and you in relation to your use of this Website, and supersede all prior agreements and understandings.</p>

                <h3 class="space-top">Governing Law & Jurisdiction</h3>
                <div class="separator-2"></div>
                <p>These Terms will be governed by and interpreted in accordance with the laws of the State of ph, and you submit to the non-exclusive jurisdiction of the state and federal courts located in ph for the resolution of any disputes.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

