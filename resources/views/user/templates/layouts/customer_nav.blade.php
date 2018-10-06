
	<!-- header-container start -->
	<div class="header-container">
		<!-- header-top start -->
		<!-- classes:  -->
		<!-- "dark": dark version of header top e.g. class="header-top dark" -->
		<!-- "colored": colored version of header top e.g. class="header-top colored" -->
		<!-- ================ -->

		<div class="header-top dark">
			<div class="container">
				<div class="row">
					<div class="col-3 col-sm-6 col-lg-9">
						
						<!-- header-top-first start -->
						<!-- ================ -->
						<div class="header-top-first clearfix">
							<ul class="social-links circle small clearfix hidden-sm-down">
								<!-- <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li> -->
								<!-- <li class="skype"><a href="#"><i class="fa fa-skype"></i></a></li> -->
								<!-- <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li> -->
								
								<!-- <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li> -->
								<!-- <li class="flickr"><a href="#"><i class="fa fa-flickr"></i></a></li> -->
								<li class="facebook">
									<a href="{{ URL::asset('https://www.facebook.com/kdotcutaran') }}" target="_blank">
										<i class="fa fa-facebook"></i>
									</a>
								</li>
								<li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<!-- <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
							</ul>
							<div class="social-links hidden-md-up circle small">
								<div class="btn-group dropdown">
									<button id="header-top-drop-1" type="button" class="btn dropdown-toggle
											dropdown-toggle--no-caret" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-share-alt"></i>
									</button>
									<ul class="dropdown-menu dropdown-animation" aria-labelledby="header-top-drop-1"
										style="min-width: 76px">
									<!-- <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li> -->
									<!-- <li class="skype"><a href="#"><i class="fa fa-skype"></i></a></li> -->
									<!-- <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li> -->
									
									<!-- <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li> -->
									<!-- <li class="flickr"><a href="#"><i class="fa fa-flickr"></i></a></li> -->
									<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<!-- <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
									</ul>
								</div>
							</div>
							<ul class="list-inline hidden-md-down">
								<li class="list-inline-item">
									<i class="fa fa-map-marker pr-1 pl-2"></i>Santorini, Talamban, Cebu City
								</li>
								<li class="list-inline-item">
									<i class="fa fa-phone pr-1 pl-2"></i>+63 933 689 2054
								</li>
								<li class="list-inline-item">
									<i class="fa fa-envelope-o pr-1 pl-2"></i> kdotshop2k18@gmail.com
								</li>
							</ul>
						</div>
						<!-- header-top-first end -->
					</div>

					<div class="col-9 col-sm-6 col-lg-3">
						<!-- header-top-second start -->
						<!-- ================ -->
						<div id="header-top-second"  class="clearfix">
							<!-- header top dropdowns start -->
							<!-- ================ -->
							<div class="header-top-dropdown text-right">
								<div class="btn-group">
									<a href="/page-signup" class="btn btn-default btn-sm"><i class="fa fa-user pr-2"></i> Sign Up</a>
								</div>
								<div class="btn-group">
									<a href="/page-login" class="btn btn-default btn-sm"><i class="fa fa-user pr-2"></i> Login</a>
								</div>
							</div>
							<!--  header top dropdowns end -->
						</div>
						<!-- header-top-second end -->
					</div>
				</div>
			</div>
		</div>
		<!-- header-top end -->


		<!-- header start -->
		<!-- classes:  -->
		<!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
		<!-- "fixed-desktop": enables fixed navigation only for desktop devices e.g. class="header fixed fixed-desktop clearfix" -->
		<!-- "fixed-all": enables fixed navigation only for all devices desktop and mobile e.g. class="header fixed fixed-desktop clearfix" -->
		<!-- "dark": dark version of header e.g. class="header dark clearfix" -->
		<!-- "centered": mandatory class for the centered logo layout -->
		<!-- ================ -->

		<header class="header fixed fixed-desktop clearfix">
			<div class="container">
				<div class="row">
					<div class="col-md-auto hidden-md-down">
						<!-- header-first start -->
						<!-- ================ -->
						<div class="header-first clearfix">

							<!-- logo-->
							<div id="logo" class="logo">
								<a href="/"><img id="logo_img" src="{{ asset('image/kdot_newlogo.png') }}"
									alt="kdot_newlogo"></a>
							</div>

							<!-- name-and-slogan
							<div class="site-slogan">
							<h3 style="color:White">Kdot Cutaran</h3>
							</div>
							-->
						</div>
						<!-- header-first end -->
					</div>

					<div class="col-lg-8 ml-auto">
						<!-- header-second start -->
						<!-- ================ -->
						<div class="header-second clearfix">

							<!-- main-navigation start -->
							<!-- classes: -->
							<!-- "onclick": Makes the dropdowns open on click, this the default bootstrap behavior e.g. class="main-navigation onclick" -->
							<!-- "animated": Enables animations on dropdowns opening e.g. class="main-navigation animated" -->
							<!-- ================ -->
							<div class="main-navigation main-navigation--mega-menu onclick animated">
								<nav class="navbar navbar-expand-lg navbar-light p-0">
									<div class="navbar-brand clearfix hidden-lg-up">
										<!-- logo -->
										<div id="logo-mobile" class="logo">
											<a href="/">
												<img src="{{ asset('image/kdot_newlogo.png') }}"
													id="logo-img-mobile" " alt="kdot_newlogo">
											</a>
										</div>
										<!-- name-and-slogan -->
										<div class="site-slogan">
											Multipurpose HTML5 Template
										</div>
									</div>

									<!-- header dropdown buttons -->
									<div class="header-dropdown-buttons hidden-lg-up p-0 ml-auto mr-3">
										<div class="btn-group">
											<button type="button" class="btn dropdown-toggle dropdown-toggle--no-caret" id="header-drop-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="fa fa-search"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-right dropdown-animation" aria-labelledby="header-drop-3">
												<li>
													<form role="search" class="search-box margin-clear">
														<div class="form-group has-feedback">
															<input type="text" class="form-control" placeholder="Search">
															<i class="fa fa-search form-control-feedback"></i>
														</div>
													</form>
												</li>
											</ul>
										</div>
										<div class="btn-group">
											<button type="button" id="header-drop-4"  
													class="btn dropdown-toggle dropdown-toggle--no-caret gotoshopcart"
													aria-haspopup="true" aria-expanded="false">
												<i class="fa fa-shopping-basket"></i>
												<span id="basket-reload" class="cart-count default-bg">{{ Cart::count() }}</span>
											</button>
										</div>
									</div>
									<!-- header dropdown buttons end -->

									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-1"
										aria-controls="navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
										<span class="navbar-toggler-icon"></span>
									</button>

									<div class="collapse navbar-collapse" id="navbar-collapse-1">
										<!-- main-menu -->
										<ul class="navbar-nav ml-xl-auto">

										<!-- mega-menu start -->
										<li class="nav-item dropdown home-alert mega-menu mega-menu--wide">
											<a href="/" class="nav-link" >Home</a>
										<!--  -->
										</li>
										<!-- mega-menu end -->

										<!-- mega-menu start -->
										<li class="nav-item dropdown products-alert mega-menu mega-menu--wide">
											<a href="/product" class="nav-link " >Products</a>
										</li>
										<!-- mega-menu end -->

										<!-- mega-menu start -->
										<li class="nav-item dropdown about-us-alert mega-menu mega-menu--narrow">
										<a href="/about-us" class="nav-link " >About Us</a>

										</li>

										</ul>
										<!-- main-menu end -->
									</div>
								</nav>
							</div>
							<!-- main-navigation end -->
						</div>
						<!-- header-second end -->
					</div>


					<div class="col-auto hidden-md-down">
						<!-- header dropdown buttons -->
						<div class="header-dropdown-buttons">
							<div class="btn-group">
								<button type="button" class="btn dropdown-toggle dropdown-toggle--no-caret" id="header-drop-1"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-search"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-right dropdown-animation" aria-labelledby="header-drop-1">
									<li>
										<form role="search" class="search-box margin-clear">
											<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="Search">
												<i class="fa fa-search form-control-feedback"></i>
											</div>
										</form>
									</li>
								</ul>
							</div>
							<div class="btn-group">
								<button type="button" id="header-drop-2"
										class="btn dropdown-toggle dropdown-toggle--no-caret gotoshopcart " 
										aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-shopping-basket" ></i>
									<span class="cart-count default-bg">{{ Cart::count() }}</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- header end -->
	</div>
  <!-- header-container end -->
  <!-- breadcrumb start -->
  <!-- ================ -->