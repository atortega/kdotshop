<!DOCTYPE html>
<html dir="ltr" lang="zxx">

  <head>
    
     @include('user.templates.layouts.header')


    <title>KDot | Login </title>
    
    
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
                          <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="index.html">Home</a></li>
                          <li class="breadcrumb-item active">Page Login</li>
                        </ol>
                      </div>
                    </div>
                  </div>
                    <!-- breadcrumb end -->

                    <!-- main-container start -->
                    <!-- ================ -->
                    <!-- <div class="main-container dark-translucent-bg" style="background-image:url('images/background-img-6.jpg');"> -->
                      <div class="container">
                        <div class="clearfix"></div>
                        <div class="row justify-content-center">
                          <div class="col-md-6">
                            <!-- main start -->
                            <!-- ================ -->
                            <div class="main space-top" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                              <div class="form-block-login p-30 light-gray-bg border-clear">
                                <a href="{{ url('/signup')}}" class="d-inline-block float-right"
                                  style="color: #f49ac1; font-weight: bold; text-decoration:none;">SignUp
                                 </a> 
                              <h2 class="title">Login</h2>

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

                                <form class="form-horizontal" action="{{ url('/login/submit')}}" method="post">
                                  {{ csrf_field() }}
                                  <div class="form-group has-feedback row">
                                    <!-- <label for="email" class="col-md-3 text-md-right control-label col-form-label"></label> -->
                                    <div class="col-md-12">
                                      <input type="email" class="form-control" id="email" placeholder="User Name" name="email" required>
                                      <i class="fa fa-user form-control-feedback pr-4"></i>
                                    </div>
                                  </div>
                                  <div class="form-group has-feedback row">
                                    <!-- <label for="password" class="col-md-3 text-md-right control-label col-form-label"></label> -->
                                    <div class="col-md-12">
                                      <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                      <i class="fa fa-lock form-control-feedback pr-4"></i>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="ml-md-auto col-md-12">
                                      <div class="d-inline-block col-md-12">
                                        <div class="checkbox form-check pull-left">
                                          <input class="form-check-input" type="checkbox">
                                          <label class="form-check-label">
                                            Remember me.
                                          </label>
                                        </div>
                                        <button type="submit" class="btn pull-right" style="background-color: pink">Log-in</button>
                                      </div>

                                      <div class="space-top">
                                        <a href="forgetpassworrdchuchu.php" style="color: red; font-weight: bold;"> Forget Password ?</a>
                                      </div>
                                      <span class="text-center text-muted">Login with</span>
                                      <ul class="social-links colored circle clearfix">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                      </ul>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <p class="text-center space-top">Don't have an account yet? <a href="/signup">Sign Up</a> now.</p>
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
                <!-- footer end -->
              </div>
              <!-- page-wrapper end -->

              <!-- JavaScript files placed at the end of the document so the pages load faster -->
              <!-- ================================================== -->
              <!-- Jquery and Bootstap core js files -->
              

  </body>       
</html>
