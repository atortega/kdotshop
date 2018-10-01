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
  <body class="front-page transparent-header">


    <!-- scrollToTop -->
    <!-- ================ -->
    <div class="scrollToTop circle"><i class="fa fa-angle-up"></i></div>


    <!-- page wrapper start -->
    <!-- ================ -->
    <div class="page-wrapper">

    </div>

      <!-- header-container start -->
      
        <!-- header-top start -->
        <!-- classes:  -->
        <!-- "dark": dark version of header top e.g. class="header-top dark" -->
        <!-- "colored": colored version of header top e.g. class="header-top colored" -->
        <!-- ================ -->

        @include('user.templates.layouts.customer_nav')
                
                <!-- header-top end -->

                <!-- header start -->
                <!-- classes:  -->
                <!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
                <!-- "fixed-desktop": enables fixed navigation only for desktop devices e.g. class="header fixed fixed-desktop clearfix" -->
                <!-- "fixed-all": enables fixed navigation only for all devices desktop and mobile e.g. class="header fixed fixed-desktop clearfix" -->
                <!-- "dark": dark version of header e.g. class="header dark clearfix" -->
                <!-- "centered": mandatory class for the centered logo layout -->
                <!-- ================ -->
                 
                <!-- header end -->
              
           
              <!-- header-container end -->
              <!-- breadcrumb start -->
              <!-- ================ -->
          <div>
             <div class="breadcrumb-container">
                <div class="container">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="/">Home</a></li>
                    <li class="breadcrumb-item active">Page Signup</li>

                  </ol>
                </div>
              </div>
            </div>  
            
              <!-- breadcrumb end -->

              <!-- main-container start -->
              <!-- ================ -->
              <!-- <div class="main-container dark-translucent-bg" style="background-image:url('images/background-img-6.jpg');"> -->
                <!-- <br><br><br><br> -->
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-auto">
                      <!-- main start -->
                      <!-- ================ -->
                      <div class="main" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                        <div class="form-block-signUp p-30 light-gray-bg border-clear">
                            <a href="{{ url('/login')}}" class="d-inline-block float-right"
                              style="color: #f49ac1; font-weight: bold; text-decoration:none;">Login
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
                                <label for="phone_number" class="col-md-3 text-md-right control-label col-form-label"></label>
                                  <div class="col-md-8">
                                    <input type="phone_number" class="form-control" id="phone_number" placeholder="Enter Phone Number" name="phone_number" required>
                                     <i class="fa fa-user form-control-feedback pr-4"> </i> <button type="submit" class="btn" style="background-color: pink; float:right;">Submit</button>
                                  </div>  
                              </div>   

                               <div class="form-group has-feedback row" > 
                                <label for="firstname" class="col-md-3 text-md-right control-label col-form-label"></label>
                                  <div class="col-md-8">
                                    <input type="fname" class="form-control" id="fname" placeholder="First Name" name="fname" required>
                                    <i class="fa fa-user form-control-feedback pr-4"></i>
                                  </div>
                              </div> 

                              <div class="form-group has-feedback row" > 
                                <label for="full_name" class="col-md-3 text-md-right control-label col-form-label"></label>
                                  <div class="col-md-8">
                                    <input type="name" class="form-control" id="name" placeholder="Last Name" name="full_name" required>
                                    <i class="fa fa-user form-control-feedback pr-4"></i>
                                  </div>
                              </div> 


                              <div class="form-group has-feedback row" >
                                <label for="email" class="col-md-3 text-md-right control-label col-form-label"></label>
                                  <div class="col-md-8">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" required>
                                    <i class="fa fa-user form-control-feedback pr-4"></i>
                                  </div>
                              </div> 


                            <div class="form-group has-feedback row">
                              <label for="password" class="col-md-3 text-md-right control-label col-form-label"></label>
                              <div class="col-md-8">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                <i class="fa fa-lock form-control-feedback pr-4"></i>
                              </div>
                            </div>

                              <div class="form-group has-feedback row" >
                                <label for="confirm_password" class="col-md-3 text-md-right control-label col-form-label"></label>
                                <div class="col-md-8">
                                  <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" required>
                                  <i class="fa fa-user form-control-feedback pr-4"></i>
                                </div>
                              </div>


                              <div class="form-group has-feedback row" >
                                <label for="phone_number" class="col-md-3 text-md-right control-label col-form-label"></label>
                                <div class="col-md-8">
                                  <input type="text" class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number" required>
                                  <i class="fa fa-user form-control-feedback pr-4"></i>
                                </div>
                              </div>

                              
                              <div class="form-group row">
                                <div class="ml-md-auto col-md-9">
                                  <div class="checkbox form-check">
                                    <input class="form-check-input" type="checkbox" required>
                                    <label class="form-check-label">
                                      <p style="color: red;">By signing this, you agree to <a href="termsandconditions.php" style="color: red; font-weight: bold;"> KDot's Terms and Conditions</a></p>
                                    </label>
                                  </div>
                                   <!--  <button type="submit" class="btn btn-group btn-default btn-animated">Log In <i class="fa fa-user"></i></button> -->
                                    <button type="submit" class="btn" style="background-color: pink">SignUp</button>
                                    <button type="button" class="btn">Cancel</button>
                                    <br>

                                    <span class="text-center text-muted">Login with</span>
                                    <ul class="social-links colored circle clearfix">
                                      <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                      <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>  
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
              <!-- main-container end -->

  

              <!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
              <!-- ================ -->
              @include('user.templates.layouts.footer')
            <!-- page-wrapper end -->

            <!-- JavaScript files placed at the end of the document so the pages load faster -->
            <!-- ================================================== -->
            <!-- Jquery and Bootstap core js files -->
            
  </body>  
         
</html>
