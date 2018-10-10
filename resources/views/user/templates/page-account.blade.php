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
                <div class="col-3">
                    @include('user.templates.layouts.page-right-sidebar')

                </div>

                <!-- <div class="col-10"> -->
                  <div class="main col-lg-8 order-lg-2 ml-xl-auto">
                    <form method="POST" action="">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>First Name</h5>
                                        <input id="fname" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ Auth::user()->first_name }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Last Name</h5>
                                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ Auth::user()->last_name }}"disabled>
                                    </div>
                                </div>


                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Birthdate</h5>
                                        <input id="birthdate" type="text" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ Auth::user()->birthdate }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <!---2nd Column --->
                            <div class="col">
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Middle Name</h5>
                                         <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{ Auth::user()->middle_name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Gender</h5>
                                        <input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ Auth::user()->gender }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Phone Number</h5>
                                        <input id="phonenumber" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ Auth::user()->phone_number }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>E-mail</h5>
                                       <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" disabled>
                                    </div>
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