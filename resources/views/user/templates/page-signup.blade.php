<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>
	@include('user.templates.layouts.header')

	<title>KDot | Sign Up</title>
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
						Page Signup
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
				<div class="col-md-auto">

					<!-- main start -->
					<!-- ================ -->
					<div class="main" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
						<div class="form-block-signUp p-30 light-gray-bg border-clear">
							<a href="{{ url('/login')}}" class="d-inline-block float-right"
								style="color: #f49ac1; font-weight: bold; text-decoration:none;">
								Login
							</a> 
							<h2 class="title">Sign Up</h2>

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

							<form class="form-horizontal" action="{{ url('/signup/submit')}}" method="post">
								{{ csrf_field() }} 

								<div class="form-group has-feedback row" > 
									<label class="col-md-3 text-md-right control-label col-form-label"
										for="phone_number">
										Mobile Phone<strong style="color: #ff0d0c; font-size: 18px;"> *</strong>
									</label>
									<div class="col-md-8">
										<input type="phone_number" class="form-control" id="phonenumber"
											placeholder="Enter Phone Number (required)" name="phone_number" required>
										<i class="glyphicon glyphicon-phone form-control-feedback pr-4"></i>
										<button type="submit" class="btn btn-animated btn-default pull-right">
											Send Verification Code 
											<i class="fa fa-send"></i>
										</button>
									</div>  
								</div>   

								<div class="form-group has-feedback row"> 
									<label class="col-md-3 text-md-right control-label col-form-label"
										for="verification-code">
									</label>
									<div class="col-md-8">
										<input type="vCode" class="form-control" id="vCode"
											placeholder="Verification Code" name="code">
										<i class="glyphicon glyphicon-comment form-control-feedback pr-4"></i>
									</div>
								</div> 
								<div class="separator"></div>
								<div class="form-group has-feedback row"> 
									<label class="col-md-3 text-md-right control-label col-form-label"
										for="firstname">
										First Name<strong style="color: #ff0d0c; font-size: 18px;"> *</strong>
									</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="fname"
											placeholder="First Name" name="first_name" required>
										<i class="fa fa-user form-control-feedback pr-4"></i>
									</div>
								</div> 

								<div class="form-group has-feedback row" > 
									<label class="col-md-3 text-md-right control-label col-form-label"
										for="last_name">
										Last Name<strong style="color: #ff0d0c; font-size: 18px;"> *</strong>
									</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="lname"
											placeholder="Last Name" name="last_name" required>
										<i class="fa fa-user form-control-feedback pr-4"></i>
									</div>
								</div> 

								<div class="form-group has-feedback row" > 
									<label class="col-md-3 text-md-right control-label col-form-label"
										for="middle_name">
										Middle Name<strong style="color: #ff0d0c; font-size: 18px;"> *</strong>
									</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="mname"
											placeholder="Middle Name" name="middle_name" required>
										<i class="fa fa-user form-control-feedback pr-4"></i>
									</div>
								</div> 

								<div class="form-group has-feedback row" > 
									<label class="col-md-3 text-md-right control-label col-form-label"
										for="dob">
										Birthdate
									</label>
									<div class="col-md-8">
										<input type="date" class="form-control" id="dob"
											placeholder="Date of Birth" name="birthdate" required>
										<i class="fa fa-birthday-cake form-control-feedback pr-4"></i>
									</div>
								</div> 

								<div class="form-group has-feedback row" > 
									<label class="col-md-3 text-md-right control-label col-form-label"
										for="gender">
										Gender
									</label>
									<div class="col-md-8">
										<select class="form-control" id="gender" style="height: 40px" 
												placeholder="Gender" name="gender">
											<option>Male</option>
											<option>Female</option>
										</select>  
										<!-- <i class="fa fa-venus-mars form-control-feedback pr-4"></i> -->
									</div>
								</div> 

								<div class="form-group has-feedback row" >
									<label class="col-md-3 text-md-right control-label col-form-label"
										for="email">
										Email<strong style="color: #ff0d0c; font-size: 18px;"> *</strong>
									</label>
									<div class="col-md-8">
										<input type="email" class="form-control" id="email"
											placeholder="E-mail" name="email" required>
										<i class="fa fa-envelope form-control-feedback pr-4"></i>
									</div>
								</div>


								<div class="form-group has-feedback row">
									<label class="col-md-3 text-md-right control-label col-form-label"
										for="password">
									</label>
									<div class="col-md-8">
										<input type="password" class="form-control" id="password"
											placeholder="Password" name="password" required>
										<i class="fa fa-unlock-alt form-control-feedback pr-4"></i>
									</div>
								</div>

								<div class="form-group has-feedback row" >
									<label class="col-md-3 text-md-right control-label col-form-label"
										for="confirm_password">
									</label>
									<div class="col-md-8">
										<input type="password" class="form-control" id="confirm_password"
											placeholder="Confirm Password" name="confirm_password" required>
										<i class="fa fa-lock form-control-feedback pr-4"></i>
									</div>
								</div>

								<div class="form-group has-feedback row">
									<label class="col-md-3 text-md-right control-label col-form-label space-top"
										for="checkbox">
										<strong style="color: #ff0d0c; font-size: 18px;"> *</strong>
									</label>
									<div class="ml-md-auto col-md-9">
										<div class="checkbox form-check space-top">
											<input id="signUpCheckBoxID" class="form-check-input"
												name="checkbox" type="checkbox" required>
											<div class="form-check">
												<label class="form-check-label">
													<span class="pr-12" style="color: red;">
														By signing up, you agree to our
														<a href="/terms-and-conditions" style="color: red; font-weight: bold;">
															Terms and Conditions
														</a>
													</span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-12 text-md-center">
									<button id="signUpButtonID" class="btn btn-group btn-default btn-lg btn-animated"
										type="submit">
										SIGN UP
										<i class="fa fa-arrow-right"></i>
									</button>
								</div>

								<div class="separator mt-10"></div>

								<div class="form-group row">
									<div class="col-md-12 text-center">						
										<span class="text-center text-muted">Login with</span>
										
										<ul class="social-links circle colored margin-clear space-top">
											<li class="facebook">
												<a href="#">
													<i class="fa fa-facebook"></i>
												</a>
											</li>
											<li class="googleplus">
												<a href="{{ url('/redirect') }} ">
													<i class="fa fa-google-plus"></i>
												</a>
											</li>
										</ul>
									</div>
								</div>

							</form>
						</div>   
						<!-- main end -->
					</div>
				</div>
			</div>
		</div>
		<!-- </div> -->
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