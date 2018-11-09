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
						<a class="link-dark" href="/">
							Home
						</a>
					</li>
					<li class="breadcrumb-item active">
						My Purchase
					</li>
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
					<div class="col-3">
                    @include('user.templates.layouts.page-purchase-sidebar')
                	</div>

					
        			<div class="container-fluid">
           				<div class="row">
                			<div class="col-lg-12">
								<div class="container-fluid">
									<table class="table-condensed table-hover table-colored" id="table">
										<thead>
											<tr>
												<th>Date Purchased</th>
												<th>Payment Method</th>
												<th>Delivery Method</th>
												<th>Reference Code</th>
												<th>Shipping Fee</th>
												<th>Amount Paid</th>
												<th>Status</th>
											</tr>
										</thead>
									</table>
								</div>
                			</div>
						</div>
					</div>
					<!-- /.container-fluid -->

					
					<!-- main end -->
				</div>
			</div>
		</section>
		<!-- main-container end -->
	</div>
	<!-- page-wrapper end -->

	<!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
	<!-- ================ -->
	@include('user.templates.layouts.footer')
	<!-- footer end -->
	<script>
		$(function() {
			$('#table').DataTable({
				processing: true,
				serverSide: true,
				ajax: '{{ url('purchase/index') }}',
				aaSorting: [ [0, 'desc'] ],
				columns: [
					{ data: 'order_date', name: 'order_date' },
					{ data: 'payment_name', name: 'payment_name' },
					{ data: 'delivery_method_name', name: 'delivery_method_name' },
					{ data: 'reference_code', name: 'reference_code' },
					{ data: 'shipping_fee', name: 'shipping_fee' },
					{ data: 'total_amount', name: 'total_amount' },
					{ data: 'status', name: 'status' }
				]
			});
		});
	</script>
	<!-- JavaScript files placed at the end of the document so the pages load faster -->
	<!-- ================================================== -->
	<!-- Jquery and Bootstap core js files -->

</body>
</html>