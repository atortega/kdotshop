<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>

@include('user.templates.layouts.header')


<title>KDot | My Account </title>


</head>

<!-- body classes:  -->
<!-- "boxed": boxed layout mode e.g. <body class="boxed"> -->
<!-- "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> -->
<!-- "transparent-header": makes the header transparent and pulls the banner to top -->
<!-- "gradient-background-header": applies gradient background to header -->
<!-- "page-loader-1 ... page-loader-6": add a page loader to the page (more info @components-page-loaders.html) -->
<body class="front-page transparent-header">

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
                    <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Page Account</li>
                     <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- main-container start -->
    <!-- ================ -->
    <section class="main-container"> 

      <div class="container">
             <div class="row">

                <!-- main start -->
                <!-- ================ -->

                <!-- page-title start -->
                <!-- ================ -->
                <!-- page-title end -->

                <div class="col-3">
                    @include('user.templates.layouts.page-profile-sidebar')

                </div>
                <!--   Another Column -->
           
                <!-- <div class="row-8s"> -->
                     <div class="main col-lg-8 order-lg-2 ml-xl-auto">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form method="POST" action="/saveProfile">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>First Name</h5>
                                        <input id="fname" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name')== '' ? Auth::user()->first_name : old('first_name') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Last Name</h5>
                                         <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name')== '' ? Auth::user()->last_name : old('last_name') }}" required autofocus>
                                    </div>
                                </div>


                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Birthdate</h5>
                                        <input id="birthdate" type="text" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ old('birthdate')== '' ? $birthdate : old('birthdate') }}" required autofocus>
                                    </div>
                                </div>
                            </div>

                            <!---2nd Column --->
                            <div class="col">
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Middle Name</h5>
                                        <input id="mname" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{ old('middle_name')== '' ? Auth::user()->middle_name : old('middle_name') }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Gender</h5>
                                        <!--<input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender')== '' ? Auth::user()->gender : old('gender') }}" required autofocus>-->
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="M" {{ Auth::user()->gender == 'M' ? " selected " : "" }}>Male</option>
                                            <option value="F" {{ Auth::user()->gender == 'F' ? " selected " : "" }}>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Phone Number</h5>
                                        <input id="phonenumber" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                     {{ __('Save Changes') }}
                                </button>
                            </div>
                         </div>
                     </div>
                    </form>
                </div>
                </div>
                

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
