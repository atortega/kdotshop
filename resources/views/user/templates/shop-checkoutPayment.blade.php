<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>
	@include('user.templates.layouts.header')
	<title>KDot | Checkout Payment</title>
</head>

<!-- body classes:  -->
<!-- "boxed": boxed layout mode e.g. <body class="boxed"> -->
<!-- "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> -->
<!-- "transparent-header": makes the header transparent and pulls the banner to top -->
<!-- "gradient-background-header": applies gradient background to header -->
<!-- "page-loader-1 ... page-loader-6": add a page loader to the page (more info @components-page-loaders.html) -->
<body class="front-page ">

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
					<li class="breadcrumb-item"><i class="fa fa-home pr-2"></i>
						<a class="link-dark" href="/">Home</a>
					</li>
					<li class="breadcrumb-item">
						<a class="link-dark" href="/shop-cart">Shopping Cart</a>
					</li>
					<li class="breadcrumb-item">
						<a class="link-dark" href="/shop-checkout">Checkout</a>
					</li>
					<li class="breadcrumb-item active">Checkout Payment</li>
				</ol>
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
					<div class="main col-12">

						<!-- page-title start -->
						<!-- ================ -->
						<h3 class="title-page">Checkout Payment</h3>
						<div class="separator-2"></div>
						<!-- page-title end -->

						<div class="container">
							@if ($message = Session::get('success'))
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<strong>{!! $message !!}</strong>
								</div>
								<?php Session::forget('success'); ?>
							@endif

							@if ($message = Session::get('error'))
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<strong>{!! $message !!}</strong>
								</div>
								<?php Session::forget('error'); ?>
							@endif
						</div>

						<fieldset>
							<legend>Payment</legend>
							<form class="form-horizontal">
								<!-- <div class="checkbox"> -->
									<div class="row">
										<div class="col-md-4" align="center">
											<!-- <input id="paymaya-option" class="form-check-input"
												type="radio" name="payment-radio-option" value="paymaya"> -->
											<label>
												<img id="img-paymaya" src='{{ asset("image/payment-methods/paymaya-218x48.png") }}' style="max-height: 42px;">
											</label>

											<div class="space"></div>

											<a href="#"
													id="proceedWithPayMaya"
													class="btn btn-animated btn-group btn-info"
													style="background-color: #42b72a; width: 180px;">
												Pay with PayMaya
												<i>
													<img style="padding-top: 8px;" src='{{ asset("image/payment-methods/fa-fa-paymaya.png") }}'>
												</i>
											</a>
										</div>

										<div class="col-md-4" align="center">
											<!-- <input id="paypal-option" class="form-check-input"
												type="radio" name="payment-radio-option" value="paypal"> -->
											<label>
												<img id="img-paypal" src='{{ asset("image/payment-methods/paypal-180x48.png") }}' style="max-height: 42px;">
											</label>

											<div class="space"></div>

											<a href="" data-toggle="modal" data-target="#myModal"
													id="proceedWithPayMaya"
													class="btn btn-animated btn-group btn-info"
													style="background-color: #002f86;">
												Pay with PayPal
												<i class="fa fa-paypal"></i>

											</a>
										</div>

										<div class="col-md-4" align="center">

											<!-- <input id="palawan-option" class="form-check-input"
												type="radio" name="payment-radio-option" value="palawan"> -->
											<label>
												<img id="img-palawan" src='{{ asset("image/payment-methods/palawan-express-padala-180x60.png") }}' style="max-height: 42px;">
											</label>

											<div class="space"></div>

											<a href="/palawan"
													id="proceedWithPalawan"
													class="btn btn-animated btn-group btn-info"
													style="background-color: #007236;">
												Pay with Palawan
												<i>
													<img style="padding-top: 8px;" src='{{ asset("image/payment-methods/fa-fa-palawan.png") }}'>
												</i>
											</a>
										</div>
									</div>

									

									<div class="row">


										<div class="col-xl-9">


											<div class="col-lg-9">
												<div class="row">
													<div class="col-lg-8">
													</div>
												</div>
											</div>
										</div>
									</div>

									

									<div class="row">

										<!-- <div class="col-xl-9">
										<p></p>
										</div> -->
									</div>
								<!-- </div> -->
							</form>
						</fieldset>

						<div class="text-right">
							<a href="/shop-checkout" class="btn btn-group btn-default">
								Go Back
							</a>
							<!-- <a href="/shop-checkoutReview" id="review-and-complete" class="btn btn-group btn-default">
								Review and Complete Your Order
							</a> -->
						</div>
					</div>
					<!-- main end -->
				</div>
			</div>
		</section>
		<!-- main-container end -->

	
		<div class="modal fade" id="myModal"
			tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="asdasd">Are you sure you want to proceed with PayPal?</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
					</div>
					<div class="modal-body">
						<p>After submitting your order, you will be redirected to the PayPal website where you can make your payment. Once your payment has been successfully completed and confirmed by PayPal, delivery of the ordered products will be initiated.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">
							Cancel
						</button>
						<a href="/pay-with-paypal"
								id="proceedWithPayMaya"
								class="btn btn-sm btn-default">
							Proceed
						</a>
					</div>
				</div>
			</div>
		</div>

		<!-- footer start -->
		@include('user.templates.layouts.footer')
		<!-- footer end -->
	</div>
	<!-- page-wrapper end -->
	


	<!-- JavaScript files placed at the end of the document so the pages load faster -->
	<!-- ================================================== -->
	<!-- Jquery and Bootstap core js files -->
</body>
</html>