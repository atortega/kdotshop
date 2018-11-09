<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>
	@include('user.templates.layouts.header')

	<title>KDot | Verify User </title>
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
						<i class="fa fa-home pr-2"></i>
						<a class="link-dark" href="/">Home</a>
					</li>
					<li class="breadcrumb-item active">
						Verification Code
					</li>
				</ol>
			</div>
		</div>

		<!-- breadcrumb end -->

		<!-- main-container start -->
		<!-- ================ -->
		<!-- <div class="main-container dark-translucent-bg" style="background-image:url('image/background-img-6.jpg');"> -->
			<div class="container">
				<div class="clearfix"></div>
				<div class="row justify-content-center">
					<div class="col-md-6">
						<!-- main start -->
						<!-- ================ -->
						<div class="main space-top" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
							<div class="form-block-login p-30 light-gray-bg border-clear">

								
								<h2 class="title">Verification Code</h2>

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

								<form class="form-horizontal" action="{{ url('/customer-verification-page/submit')}}" method="post">
									{{ csrf_field() }}
									<div class="form-group has-feedback row">
										<!--<label for="verification_code" class="col-md-12 text-md-right control-label col-form-label">Verification Code</label>-->
										<div class="col-md-12">
											<input type="text" class="form-control" id="verification_code" placeholder="Enter Verification Code"
												name="verification_code" required>
											<i class="fa fa-user form-control-feedback pr-4"></i>
										</div>
									</div>

									<div class="form-group row">
										<div class="ml-md-auto col-md-12">
											<div class="d-inline-block col-md-12">

												<button type="submit" class="btn btn-animated btn-default pull-right">
													Submit
													<i class="fa fa-sign-in"></i>
												</button>
											</div>

										</div>
									</div>
								</form>

							</div>

						</div>
						<!-- main end -->
					</div>
				</div>
			</div>
		<!-- </div> -->
		<!-- main-container end -->
	</div>
	<!-- page-wrapper end -->

	<!-- JavaScript files placed at the end of the document so the pages load faster -->

    <script src="{{ URL::asset('plugins/jquery.min.js') }}"></script>
    <!-- Bootstrap Scripts -->
    <script src="{{ URL::asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('js/user/bootstrap-notify.min.js') }}"></script>
    <!-- jQuery Revolution Slider  -->
    <script src="{{ URL::asset('plugins/rs-plugin-5/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/rs-plugin-5/js/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- Isotope javascript -->
    <script src="{{ URL::asset('plugins/isotope/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/isotope/isotope.pkgd.min.js') }}"></script>
    <!-- Magnific Popup javascript -->
    <script src="{{ URL::asset('plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <!-- Appear javascript -->
    <script src="{{ URL::asset('plugins/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/waypoints/sticky.min.js') }}"></script>
    <!-- Count To javascript -->
    <script src="{{ URL::asset('plugins/countTo/jquery.countTo.js') }}"></script>
    <!-- Slick carousel javascript -->
    <script src="{{ URL::asset('plugins/slick/slick.min.js') }}"></script>
    <!-- Initialization of Plugins -->
    <script src="{{ URL::asset('js/user/template.js') }}"></script>
    <!-- Custom Scripts -->
    <script src="{{ URL::asset('js/user/custom.js') }}"></script>

</body>       
</html>