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
                    <li class="breadcrumb-item active">Addresses</li>
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
                    <form method="POST" action="/addresses/add">
                        @csrf
                        <div class="card-header row border-clear">
                            <!-- 1st Column start -->
                            <div class="col-md-6">
                                <h2 class="clearfix" style="color: gray">Billing Address</h2>

                                <div class="separator-2"></div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>House No., Street</h5>
                                        <input id="billing_address1" type="text" class="form-control" name="billing_address1" value="{{ $user->billing_address1 }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>Barangay</h5>
                                        <input id="billing_barangay" type="text" class="form-control" name="billing_barangay" value="{{ $user->billing_barangay }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>Municipality/City</h5>
                                         <input id="billing_city" type="text" class="form-control" name="billing_city" value="{{ $user->billing_city }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>Province</h5>
                                       <input id="billing_province" type="text" class="form-control" name="billing_province" value="{{ $user->billing_province }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>Country</h5>
                                        <select class="form-control" id="billing_country" name="billing_country">
                                            @foreach($countries as $country)
                                                <option value="{{$country->code}}" {{ $country->code == $user->billing_country ? 'selected' : '' }}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>Zipcode</h5>
                                      <input id="billing_zipcode" type="text" class="form-control" name="billing_zipcode" value="{{ $user->billing_zipcode }}" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <!-- 1st Column end -->

                            <!---2nd Column start --->
                            <div class="col-md-6">
                                <h2 class="clearfix" style="color: gray">Shipping Address</h2>
                                
                                <div class="separator-2"></div>

                                <div id="shipping" style="display:none">
                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>House No., Street</h5>
                                            <input id="shipping_address1" type="text" class="form-control" name="shipping_address1" value="{{ $user->shipping_address1 }}" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Barangay</h5>
                                           <input id="shipping_barangay" type="text" class="form-control" name="shipping_barangay" value="{{ $user->shipping_barangay }}" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Municipality/City</h5>
                                           <input id="shipping_city" type="text" class="form-control" name="shipping_city" value="{{ $user->shipping_city }}" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Province</h5>
                                           <input id="shipping_province" type="text" class="form-control" name="shipping_province" value="{{ $user->shipping_province }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Country</h5>
                                            <select class="form-control" id="shipping_country" name="shipping_country">
                                                @foreach($countries as $country)
                                                    <option value="{{$country->code}}" {{ $country->code == $user->shipping_country ? 'selected' : '' }}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Zipcode</h5>
                                           <input id="shipping_zipcode" type="text" class="form-control" name="shipping_zipcode" value="{{ $user->shipping_zipcode }}" autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 2nd Column end -->
                        </div>

                        <div class="card-header row border-clear">
                            <div class="checkbox padding-top-clear form-check">
                                <input class="form-check-input" type="checkbox" id="shipping-info-check" name="same_ss_billing" checked>
                                <div class="form-check">
                                    <strong class="form-check-label">
                                        My Shipping information is the same as my Billing information.
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="form-group row mb-0 clearfix">
                            <div class="card-footer col-md-12 text-center">
                                <button type="submit" class="btn btn-animated btn-default btn-md">
                                     {{ __('Save Changes') }}
                                     <i class="fa fa-save"></i>
                                </button>

                                <button type="reset" class="btn btn-animated btn-danger btn-md">
                                    {{ __('Reset Form') }}
                                    <i class="fa fa-refresh"></i>
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

    <script>
        $(function() {
            $("#shipping-info-check").click(function() {
                if ($(this).prop('checked')) {
                    $("#shipping").hide();
                } else {
                    $("#shipping").show();
                }
            });
        });
    </script>
</body>
</html>
