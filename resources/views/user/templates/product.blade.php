<!DOCTYPE html>
<html dir="ltr" lang="zxx">

	<head>

	@include('user.templates.layouts.header')

	<title>KDot | Products </title>


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
			@include('user.templates.layouts.customer_nav')
		<!-- header-container end -->


		<!-- breadcrumb start -->
		<!-- ================ -->
		<div class="breadcrumb-container">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="/">Home</a></li>
					<li class="breadcrumb-item active">Products</li>
				</ol>
			</div>
		</div>
		<!-- breadcrumb end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="light-gray-bg section">
			<div class="container-fluid">
				<!-- filters start -->
				<div class="sorting-filters text-center mb-20 d-flex justify-content-center">
					<form class="form-inline">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Sort by</label>
							<select class="form-control">
								<option selected="selected">Date</option>
								<option>Price</option>
								<!-- <option>Model</option> -->
							</select>
						</div>

						<div class="form-group ml-1">
							<label>Order</label>
							<select class="form-control">
								<option selected="selected">Acs</option>
								<option>Desc</option>
							</select>
						</div>
						<!--
						<div class="form-group ml-1">
							<label>Price $ (min/max)</label>
							<input type="text" class="form-control">
						</div>

						<div class="form-group ml-1">
							<label class="invisible">Price $ (max)</label>
							<input type="text" class="form-control">
						</div>
						-->
						
						<div class="form-group ml-1">
							<label>Category</label>
							<select class="form-control" id="category" name="category">
								<option selected="selected">-- Select --</option>
								@foreach($sortByCategoryResult as $row)
								<option value="{{$row->category_id}}">{{ $row->category_name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group ml-1">
							<label>Sub Category</label>
							<select class="form-control" id="sub_category" name="sub_category">
								<option selected="selected">-- Select --</option>
								@foreach($sortBySubCategoryResult as $row)
								<option value="{{$row->sub_category_id}}">
									{{ $row->sub_category_name }}
								</option>
								@endforeach
							</select>
						</div>

						<div class="form-group ml-1">
							<a href="#" class="btn btn-default">Submit</a>
						</div>
					</form>
				</div>
				<!-- filters end -->
			</div>
		</div>
		<!-- section end -->

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
						<h1 class="page-title">Welcome To Shop</h1>
						<div class="separator-2"></div>
						<!-- page-title end -->
						<!-- pills start -->
						<!-- ================ -->
						<!-- Nav tabs -->
						<ul class="nav nav-pills" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="#pill-1" role="tab" data-toggle="tab" title="Latest Arrivals">
									<i class="fa fa-star"></i> Latest Arrivals
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#pill-2" role="tab" data-toggle="tab" title="Featured">
									<i class="fa fa-heart"></i> Featured
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#pill-3" role="tab" data-toggle="tab" title="Top Sellers">
									<i class=" fa fa-arrow-up"></i> Top Sellers
								</a>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content clear-style">
							<div class="tab-pane active" id="pill-1">
								<div class="row grid-space-10">
<!--
									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-1.jpg')}}" alt="">
												<a class="overlay-link popup-img-single" href="images/product-1.jpg"><i class="fa fa-search-plus"></i></a>
												<span class="badge">30% OFF</span>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="/shop-productDetails">Suscipit consequatur velit</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price"><del>$100.00</del> $70.00</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-2.jpg')}}" alt="">
												<span class="badge">25% OFF</span>
												<a class="overlay-link popup-img-single" href="images/product-2.jpg"><i class="fa fa-search-plus"></i></a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Consectetur adipisicing elit</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price"><del>$199.00</del> $150.00</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-3.jpg')}}" alt="">
												<span class="badge">33% OFF</span>
												<a class="overlay-link popup-img-single" href="images/product-3.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Quas inventore modi</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price"><del>$9.99</del> $6.66</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-4.jpg')}}" alt="">
												<span class="badge">20% OFF</span>
												<a class="overlay-link popup-img-single" href="images/product-4.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Lorem ipsum dolor sit</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price"><del>$86.25</del> $69.00</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-5.jpg')}}" alt="">
												<span class="badge">30% OFF</span>
												<a class="overlay-link popup-img-single" href="images/product-5.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link">
															<i class="fa fa-heart-o pr-10"></i>Add to Wishlist
														</a>
														<a href="#" class="btn-sm-link">
															<i class="fa fa-link pr-1"></i>View Details
														</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Velit Suscipit consequatur</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price"><del>$12.00</del> $8.40</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent 
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-6.jpg')}}" alt="">
												<span class="badge">50% OFF</span>
												<a class="overlay-link popup-img-single" href="images/product-6.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link">
															<i class="fa fa-heart-o pr-10"></i>Add to Wishlist
														</a>
														<a href="#" class="btn-sm-link">
															<i class="fa fa-link pr-1"></i>View Details
														</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Reprehenderit a reiciendis</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price"><del>$158.00</del> $129.00</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent 
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-7.jpg')}}" alt="">
												<span class="badge">40% OFF</span>
												<a class="overlay-link popup-img-single" href="images/product-7.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link">
															<i class="fa fa-heart-o pr-10"></i>Add to Wishlist
														</a>
														<a href="#" class="btn-sm-link">
															<i class="fa fa-link pr-1"></i>View Details
														</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Cumque sequi repellat</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price"><del>$49.99</del> $29.99</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent 
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
-->
									@foreach($result as $row)
									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												
												<img src='{{ asset("storage/$row->product_image") }}' alt="">
												<a class="overlay-link popup-img-single"
													href='{{ asset("storage/$row->product_image") }}'>
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href='{{ asset("/shop-productDetails/$row->product_id") }}'
															class="btn-sm-link">
															<i class="fa fa-link pr-1"></i>View Details
														</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3>
													<a href='{{ asset("/shop-productDetails/$row->product_id") }}'>
														{{ $row->product_name }}
													</a>
												</h3>
												<p class="small">
													{{ $row->product_desc }}
												</p>
												<div class="elements-list clearfix" style="color: #ff87c3;">
													<span class="price">₱ {{ $row->unit_price }}</span>
													
												<!-- {!! Form::open(['url'=>'/cart-add', 'method'=>'POST']) !!}

													<input type="hidden" name="product_id" value="{{ $row->product_id }}">
													<input type="hidden" name="qty" value="1">
													<button type="submit" class="pull-right margin-clear btn btn-sm
														btn-default-transparent btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</button>

												{!! Form::close()!!} -->

												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
							
<!-- 
							<div class="tab-pane" id="pill-2">
								<div class="row grid-space-10">
									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-2.jpg')}}" alt="">
												<a class="overlay-link popup-img-single" href="images/product-2.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Consectetur adipisicing elit</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price">$199.00</span>
													<a href="#" class="pull-right margin-clear btn btn-sm 
													btn-default-transparent
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-1.jpg')}}" alt="">
												<span class="badge">New</span>
												<a class="overlay-link popup-img-single" href="images/product-1.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Suscipit consequatur velit</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price">$70.00</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent 
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-4.jpg')}}" alt="">
												<span class="badge">30% OFF</span>
												<a class="overlay-link popup-img-single" href="images/product-4.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Lorem ipsum dolor sit</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price"><del>$99.00</del> $69.00</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent 
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-3.jpg')}}" alt="">
												<a class="overlay-link popup-img-single" href="images/product-3.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Quas inventore modi</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price">$9.99</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent 
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-6.jpg')}}" alt="">
												<span class="badge">20% OFF</span>
												<a class="overlay-link popup-img-single" href="images/product-6.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Reprehenderit a reiciendis</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price"><del>$161.25</del> $129.00</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent 
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-5.jpg')}}" alt="">
												<a class="overlay-link popup-img-single" href="images/product-5.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Velit Suscipit consequatur</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price">$12.99</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-8.jpg')}}" alt="">
												<span class="badge">Offer</span>
												<a class="overlay-link popup-img-single" href="images/product-8.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>

											<div class="body">
												<h3><a href="shop-product.html">Soluta suscipit dolore</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price">$11.99</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-7.jpg')}}" alt="">
												<a class="overlay-link popup-img-single" href="images/product-7.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
													<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
													<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Cumque sequi repellat</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price">$29.99</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="pill-3">
								<div class="row grid-space-10">
									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-4.jpg')}}" alt="">
												<span class="badge">30% OFF</span>
												<a class="overlay-link popup-img-single" href="images/product-4.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Lorem ipsum dolor sit</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price"><del>$99.00</del> $69.00</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-3.jpg')}}" alt="">
												<span class="badge">New</span>
												<a class="overlay-link popup-img-single" href="images/product-3.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Quas inventore modi</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price">$9.99</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-2.jpg')}}" alt="">
												<span class="badge">30% OFF</span>
												<a class="overlay-link popup-img-single" href="images/product-2.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Consectetur adipisicing elit</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price"><del>$199.00</del> $140.00</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-1.jpg')}}" alt="">
												<span class="badge">Last 3 Pieces</span>
												<a class="overlay-link popup-img-single" href="images/product-1.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Suscipit consequatur velit</a></h3>
												<p class="small">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.
												</p>
												<div class="elements-list clearfix">
													<span class="price">$70.00</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-8.jpg')}}" alt="">
												<a class="overlay-link popup-img-single" href="images/product-8.jpg"><i class="fa fa-search-plus"></i></a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Soluta suscipit dolore</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price">$11.99</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent 
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-7.jpg')}}" alt="">
												<a class="overlay-link popup-img-single" href="images/product-7.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Cumque sequi repellat</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price">$29.99</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-6.jpg')}}" alt="">
												<a class="overlay-link popup-img-single" href="images/product-6.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Reprehenderit a reiciendis</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price">$129.00</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-6">
										<div class="listing-item white-bg bordered mb-20">
											<div class="overlay-container">
												<img src="{{ URL::asset('image/products/product-5.jpg')}}" alt="">
												<a class="overlay-link popup-img-single" href="images/product-5.jpg">
													<i class="fa fa-search-plus"></i>
												</a>
												<div class="overlay-to-top links">
													<span class="small">
														<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
														<a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
													</span>
												</div>
											</div>
											<div class="body">
												<h3><a href="shop-product.html">Velit Suscipit consequatur</a></h3>
												<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
												<div class="elements-list clearfix">
													<span class="price">$12.99</span>
													<a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent
														btn-animated">
														Add To Cart<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
 -->

						</div>
						<!-- pills end -->

						<!-- pagination start -->
						<nav aria-label="Page navigation">

							<ul class="pagination justify-content-center">
								{!! $result->render() !!}
<!-- 								<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous">
										<i aria-hidden="true" class="fa fa-angle-left"></i>
										<span class="sr-only">Previous</span>
									</a>
								</li>
								
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">4</a></li>
								<li class="page-item"><a class="page-link" href="#">5</a></li>
								
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Next">
										<i aria-hidden="true" class="fa fa-angle-right"></i>
										<span class="sr-only">Next</span>
									</a>
								</li> -->
							</ul>
						</nav>
						<!-- pagination end -->

					</div>
					<!-- main end -->

				</div>
			</div>
		</section>
		<!-- main-container end -->

		<!-- section start -->
		<!-- ================ -->

	</div>
	<!-- page-wrapper end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster -->
		<!-- ================================================== -->
		<!-- Jquery and Bootstap core js files -->
		@include('user.templates.layouts.footer')

		<script>
			$('#sub_category').empty().append('<option value="0">-- Select --</option>');
			$('#category').on('change', function(e) {
				$('#sub_category').empty();
				$.ajax({
					url: '/products/sub-categories/get/' + e.target.value,
					success: data => {
						$('#sub_category').append('<option value="0">-- Select --</option>')
						$.each(data, function(index,subCatObj) {
							$('#sub_category').append(
							'<option value="'+ subCatObj.sub_category_id +'">'+subCatObj.sub_category_name+'</option>'
							)
						})
					}
				})
			});
		</script>

	</body>
</html>
