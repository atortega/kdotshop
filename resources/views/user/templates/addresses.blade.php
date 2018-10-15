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

                <div class="col-3">
                    @include('user.templates.layouts.page-profile-sidebar')

                </div>

                


                <!--   Another Column -->
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
                                <h2 style="color: gray">Billing Address</h2><br>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Barangay</h5>
                                        <input id="fname" type="text" class="form-control" name="barangay" value="" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Municipality</h5>
                                         <input id="fname" type="text" class="form-control" name="municipality" value="" required autofocus>
                                    </div>
                                </div>


                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>City</h5>
                                       <input id="fname" type="text" class="form-control" name="city" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Province</h5>
                                       <input id="fname" type="text" class="form-control" name="province" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Country</h5>
                                       <input id="fname" type="text" class="form-control" name="country" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Zipcode</h5>
                                       <input id="fname" type="text" class="form-control" name="zipcode" value="" required autofocus>
                                    </div>
                                </div>

                            </div>

                            <!---2nd Column --->
                            <div class="col">
                                <h2 style="color: gray">Shipping Address</h2><br>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Barangay</h5>
                                       <input id="fname" type="text" class="form-control" name="barangay" value="" required autofocus>
                                    </div>
                                </div>
                                
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Municipality</h5>
                                       <input id="fname" type="text" class="form-control" name="municipality" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>City</h5>
                                       <input id="fname" type="text" class="form-control" name="city" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Province</h5>
                                       <input id="fname" type="text" class="form-control" name="province" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Country</h5>
                                       <input id="fname" type="text" class="form-control" name="country" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-8">
                                        <h5>Zipcode</h5>
                                       <input id="fname" type="text" class="form-control" name="zipcode" value="" required autofocus>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                     {{ __('Save Changes') }}
                                </button>
                            </div>
                         </div>
                    </form>
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
