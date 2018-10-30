<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>
	@include('user.templates.layouts.header')
	<title>KDot | Checkout </title>
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
					<li class="breadcrumb-item">
						<a class="link-dark" href="/shop-cart">
							Shopping Cart
						</a>
					</li>
					<li class="breadcrumb-item active">
						Checkout
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
					<div class="main col-12">

						<!-- page-title start -->
						<!-- ================ -->
						<h3 class="title-page">Checkout</h3>
						<div class="separator-2"></div>
						<!-- page-title end -->

						<table class="table cart table-hover table-colored">
							<thead>
								<tr>
									<th>Product </th>
									<th>Price </th>
									<th>Color</th>
									<th>Size</th>
									<th>Quantity</th>
									<th class="amount">Total </th>
								</tr>
							</thead>

							<tbody>
								@foreach($cartProducts as $cartProduct)   
								<tr style="max-height: 10px;">
									<td class="product">
										<div class="row">
											<div class="col-md-3">
												<img src="{{ asset('storage/'.$cartProduct->options->image) }}"
													style="margin: auto; max-height: 100% ;"
													onerror="this.onerror=null;
													this.src='storage/products/default-product-image.jpg'" />
											</div>
											<div class="col-md-9" style="vertical-align: middle; margin: auto 0 auto 0;">
												<a href='{{ asset("/shop-productDetails/$cartProduct->id") }}'>
													{{$cartProduct->name}}
												</a>
												<small>
													{{$cartProduct->options->desc}}
												</small>
											</div>
										</div>
									</td>

									<td class="price" style="width: 10px !important;">
										₱ {{$cartProduct->price}} 
									</td>

				                    <td class="color" style="width: 10px !important;">
				                       {{$cartProduct->options->color}}
				                    </td>

				                    <td class="size" style="width: 10px !important;">
				                       {{$cartProduct->options->size}}
				                    </td>

									<td class="quantity">
										<div class="form-group">
											<input class="form-control" value="{{$cartProduct->qty}}" 
												type="text" disabled>
										</div>
									</td>

									<?php
										$subTotal = $cartProduct->qty * $cartProduct->price;
									?>

									<?php
										$subTotal = $cartProduct->qty * $cartProduct->price;
									?>

									<td class="amount">
										₱ {{$subTotal}}
									</td>
								</tr>
								@endforeach

								<!-- <tr>                    
								<td class="shipping_fee" colspan="6">Shipping Fee</td>
											₱ {{59.00}}
																	

								</tr> -->

								<tr>
									<td class="total-quantity" colspan="5">
										Total {{Cart::count()}} Items
									</td>
									<td class="total-amount">
										₱ {{ Cart::total() }}
									</td>
								</tr>
							</tbody>
						</table>

						<div class="space-bottom"></div>
							@if(session()->has('flash_message_error'))
				                <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
				                    <button type="button" class="close" data-dismiss="alert"></button>
				                    <strong>{{ session()->get('flash_message_error') }}</strong>   
				                </div>
				            @endif

						<fieldset>
							<legend>Billing information</legend>
							<form class="form-horizontal" action="{{ url('/cartShowCheckout')}}" method="post">{{ csrf_field()}}
								<!-- <div class="row">
									<div class="col-xl-3">
										<h3 class="title">Personal Information</h3>
									</div>

									<div class="col-xl-8 ml-xl-auto">
										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="billingFirstName">
												First Name
											<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">
												<input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" 
													type="text" name="first_name" value="{{ Auth::user()->first_name }}" disabled>
											</div>
										</div>

										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="billingLastName">
												Last Name
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">
												<input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" 
													type="text" name="last_name" value="{{ Auth::user()->last_name }}" disabled>
											</div>
										</div>

										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="billingTel">
												Contact Number
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">
												<input class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
													type="text" name="phone_number" value="{{ Auth::user()->phone_number }}" disabled>
											</div>
										</div>

										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="billingemail" >
												E-mail
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">
												<input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
													type="text" name="email" value="{{ Auth::user()->email }}" disabled>
											</div>
										</div>
									</div>
								</div>

								<div class="space"></div> -->
								<div class="row">
									<div class="col-xl-3">
										<h3 class="title">Your Address</h3>
									</div>

									<div class="col-xl-8 ml-xl-auto">
										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="billingAddress">
												House No., Street
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">
												<input class="form-control" id="billing_address1"
													type="text" name="billing_address1" value="{{ $user->billing_address1 }}">
											</div>
										</div>

										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="billingAddress">
												Barangay
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">
												<input class="form-control" id="billing_barangay"
													type="text" name="billing_barangay" value="{{ $user->billing_barangay }}">
											</div>
										</div>

										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="billingAddress">
												Municipality/City
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">
												<input id="billing_city" type="text" class="form-control" name="billing_city" value="{{ $user->billing_city }}">
											</div>
										</div>

										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="billingCity">
												Province
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">

												<input id="billing_province" type="text" class="form-control" name="billing_province" value="{{ $user->billing_province }}">
											</div>
										</div>

										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="billingPostalCode">
												Zip Code
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">
												<input class="form-control" id="billing_zipcode" name="billing_zipcode" 

													type="text" value="{{ $user->billing_zipcode }}">		
											</div>
										</div>

										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label">
												Country
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">
												<select class="form-control" id="billing_country" name="billing_country">
                                            		@foreach($countries as $country)
                                                		<option value="{{$country->code}}" {{ $country->code == $user->billing_country ? 'selected' : '' }}> {{$country->name}}</option>

                                            		@endforeach
                                        		</select>
											</div>
										</div>
									</div>
								</div>

								<div class="space"></div>

								<div class="space"></div>

								<div class="row">
									<!--
										<div class="col-xl-3">
											<h3 class="title mt-5 mt-lg-0">Additional Info</h3>
										</div>
										<div class="col-xl-8 ml-xl-auto">
											<div class="form-group row">
												<div class="col-12">
													<textarea class="form-control" rows="4"></textarea>
												</div>
											</div>
										</div>
									-->
								</div>
							</form>
						</fieldset>

						<fieldset>
							<legend>Shipping information</legend>
							<!-- <form class="form-horizontal"> -->
								<div id="shipping-information" class="space-bottom">
									<!-- <div class="row">
										<div class="col-xl-3">
											<h3 class="title mt-5 mt-lg-0">Personal Information</h3>
										</div>
										
										<div class="col-xl-8 ml-xl-auto">
											<div class="form-group row">
												<label class="col-lg-3 control-label text-lg-right col-form-label"
													for="shippingFirstName" >
													First Name
													<strong class="text-default" style="font-size: 18px;"> *</strong>
												</label>
												<div class="col-lg-9">
													<input class="form-control" id="shippingFirstName"
														type="text" placeholder="First Name">
												</div> 
											</div>

											<div class="form-group row">
												<label class="col-lg-3 control-label text-lg-right col-form-label"
													for="shippingLastName">
													Last Name
													<strong class="text-default" style="font-size: 18px;"> *</strong>
												</label>
												<div class="col-lg-9">
													<input class="form-control" id="shippingLastName"
														type="text" placeholder="Last Name">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 control-label text-lg-right col-form-label"
													for="shippingTel">
													Contact Number
													<strong class="text-default" style="font-size: 18px;"> *</strong>
												</label>
												<div class="col-lg-9">
													<input class="form-control" id="shippingTel"
														type="text" placeholder="Contact Number">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 control-label text-lg-right col-form-label"
													for="shippingemail">
													E-mail
													<strong class="text-default" style="font-size: 18px;"> *</strong>
												</label>
												<div class="col-lg-9">
													<input class="form-control" id="shippingemail"
														type="email" placeholder="E-mail">
												</div>
											</div>
										</div>
									</div>
									
									<div class="space"></div> -->
									<div class="row">
										<div class="col-xl-3">
											<h3 class="title mt-5 mt-lg-0">Your Address</h3>
										</div>
										
										<div class="col-xl-8 ml-xl-auto">
											<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="shippingAddress">
												House No., Street
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">

												<input class="form-control" id="shipping_address1"
													type="text" name="shipping_address1" value="">
											</div>
										</div>

										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="shipping_barangay">
												Barangay
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">

												<input class="form-control" id="shipping_barangay"
													type="text" name="shipping_barangay" value="">
											</div>
										</div>

										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="shipping_city">
												Municipality/City
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">

												<input id="shipping_city" type="text" class="form-control" name="shipping_city" value="">
											</div>
										</div>

										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="shipping_province">
												Province
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">

												<input id="shipping_province" type="text" class="form-control" name="shipping_province" value="">
											</div>
										</div>
										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label"
												for="shipping_zipcode">
												Zip Code
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">

												<input id="shipping_zipcode" type="text" class="form-control" name="shipping_zipcode" value="">
											</div>
										</div>
										<div class="form-group has-feedback row">
											<label class="col-lg-3 control-label text-lg-right col-form-label">
												Country
												<strong class="text-default" style="font-size: 18px;"> *</strong>
											</label>
											<div class="col-lg-9">

												<select class="form-control" id="shipping_country" name="shipping_country">
                                            		@foreach($countries as $country)
                                                		<option value="{{$country->code}}" {{ $country->code == $user->shipping_country ? 'selected' : '' }}> {{$country->name}}</option>
                                                		
                                            		@endforeach
                                        		</select>
											</div>
										</div>
										</div>
									</div>
									
									<div class="space"></div>

									<div class="row">
										

										<div class="col-xl-8 ml-xl-auto">	
										
										</div>
									</div>
								</div>
									
								<div class="checkbox padding-top-clear form-check">
									<input class="form-check-input" type="checkbox" id="shipping-info-check" checked>
									<div class="form-check" for="shipping-info-check">
										<label class="form-check-label">
											My Shipping information is the same as my Billing information.
										</label>
									</div>
								</div>
						<!-- 	</form> -->
						</fieldset>

						<div class="text-right">  
							<a href="/shop-cart" class="btn btn-group btn-default">
								Go Back To Cart
							</a>
							<a href="/shop-checkoutPayment" class="btn btn-group btn-default">
								Next Step
							</a>
						</div>

					</div>
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

	<!-- JavaScript files placed at the end of the document so the pages load faster -->
	<!-- ================================================== -->
	<!-- Jquery and Bootstap core js files -->	


</body>
</html>