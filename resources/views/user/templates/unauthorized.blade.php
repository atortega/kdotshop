<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>
	@include('user.templates.layouts.header')

	<title>KDot | Unauthorized </title>
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
						Unauthorized
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
						<div class="alert alert-warning" role="alert">
							<h4 class="alert-heading">Unauthorized!</h4>
							<p>You don't have permission to access this page!</p>
							<hr>
							<p class="mb-0">Please contact the Administrator if you think that this is an error.</p>
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