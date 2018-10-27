<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>

@include('user.templates.layouts.header')

<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload{
        width: 100%;
    }
</style>

<title>KDot | My Account </title>


</head>

<!-- body classes:  -->
<!-- "boxed": boxed layout mode e.g. <body class="boxed"> -->
<!-- "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> -->
<!-- "transparent-header": makes the header transparent and pulls the banner to top -->
<!-- "gradient-background-header": applies gradient background to header -->
<!-- "page-loader-1 ... page-loader-6": add a page loader to the page (more info @components-page-loaders.html) -->
<body class="front-page">

<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop circle"><i class="fa fa-angle-up"></i></div>

    <!-- page wrapper start -->
    <!-- ================ -->
    <div class="page-wrapper">
        <!-- header-container start -->

        <!-- header-top start -->
        <!-- classes:  -->
        <!-- "dark": dark version of header top e.g. class="header-top dark" -->
        <!-- "colored": colored version of header top e.g. class="header-top colored" -->
        <!-- ================ -->

        @include('user.templates.layouts.customer_nav')
        <!-- header-container end -->
        <!-- breadcrumb start -->
        <!-- ================ -->
        <div class="breadcrumb-container">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home pr-2"></i><a class="link-dark" href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item active"><a class="link-dark" href="/account">My Account</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
            </div>
        </div>
        <!-- breadcrumb end -->

        <!-- main-container start -->
        <!-- ================ -->
        <section class="main-container"> 

            <div class="container">
                <div class="row">

                    <!-- page-title start -->
                    <!-- ================ -->
                    <!-- page-title end -->

                    <div class="col-3">
                        @include('user.templates.layouts.page-profile-sidebar')

                    </div>

                    <!-- main start -->
                    <!-- ================ -->
                    <div class="main col-lg-8 order-lg-2 ml-xl-auto">

                        @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ session()->get('message') }}</strong>
                            </div>
                        @elseif(session()->has('removed'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ session()->get('removed') }}</strong>
                            </div>
                        @endif

                        <form method="POST" action="/saveNewAvatar" role="form"
                            runat="server" enctype="multipart/form-data">
                            @csrf

                            <div class="row card-footer border-clear">
                                <div class="col-md-6" style="margin: auto;">
                                    <div class="form-group row mb-0 clearfix">
                                        <div class="col-md-12">
                                            <h6 for="user_avatar">Change Avatar</h6>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Browse… <input type="file" id="imgInp" name="imgInp">
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" id="readOnlyInp" 
                                                    style="margin-top: 10px; height: 36px;" Readonly>
                                            </div>

                                            @if(Auth::user()->avatar != NULL &&
                                                Auth::user()->avatar_original != NULL &&
                                                Auth::user()->provider_id != NULL &&
                                                Auth::user()->provider != NULL)
                                                <img src='{{ Auth::user()->avatar_original }}'
                                                    id='img-upload'/>
                                            @elseif(Auth::user()->avatar == NULL &&
                                                    Auth::user()->avatar_original != NULL)
                                                <img
                                                    src='{{ asset("storage/$result->avatar_original") }}'
                                                    id='img-upload'/>
                                            @elseif(Auth::user()->avatar == NULL &&
                                                    Auth::user()->avatar_original == NULL)
                                                <img src='{{ asset("image/templates/default-avatar.jpg") }}'
                                                    id='img-upload'/>    
                                            @endif

                                            <div class="card-footer border-clear">
                                                @if(Auth::user()->avatar_original != NULL)
                                                    <a href="/removeAvatar" id="removeAvatarBtn" 
                                                        class="btn btn-animated btn-danger btn-sm pull-right">
                                                        Remove Avatar
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                @endif
                                                <button type="submit" class="btn btn-animated btn-default btn-sm uploadBtn">
                                                    Upload Image
                                                    <i class="fa fa-upload"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form method="POST" action="/saveProfile">
                            @csrf

                            <div class="card-header row border-clear">
                                <!-- 1st Column start -->
                                <div class="col">
                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>First Name</h5>
                                            <input id="fname" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name')== '' ? Auth::user()->first_name : old('first_name') }}" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Last Name</h5>
                                             <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name')== '' ? Auth::user()->last_name : old('last_name') }}" required autofocus>
                                        </div>
                                    </div>


                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Birthdate</h5>
                                            <input id="birthdate" type="text" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ old('birthdate')== '' ? $birthdate : old('birthdate') }}" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <!-- 1st Column end -->

                                <!---2nd Column --->
                                <div class="col">
                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Middle Name</h5>
                                            <input id="mname" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{ old('middle_name')== '' ? Auth::user()->middle_name : old('middle_name') }}" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Gender</h5>
                                            <!--<input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender')== '' ? Auth::user()->gender : old('gender') }}" required autofocus>-->
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="M" {{ Auth::user()->gender == 'M' ? " selected " : "" }}>Male</option>
                                                <option value="F" {{ Auth::user()->gender == 'F' ? " selected " : "" }}>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Phone Number</h5>
                                            <input id="phonenumber" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number')== '' ? Auth::user()->phone_number : old('phone_number') }}" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2nd Column end -->
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group row mb-0 clearfix">
                                <div class="card-footer col-md-12 text-center">
                                    <button type="submit" class="btn btn-animated btn-default btn-md">
                                         {{ __('Save Changes') }}
                                         <i class="fa fa-save"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- main end -->
                </div>
            </div>
        </section>
        <!-- main-container end -->

        <!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
        <!-- ================ -->
        @include('user.templates.layouts.footer')
        <!-- footer end -->
    </div>
    <!-- page-wrapper end -->

<!-- JavaScript files placed at the end of the document so the pages load faster -->
<!-- ================================================== -->
<!-- Jquery and Bootstap core js files -->


</body>
</html>

