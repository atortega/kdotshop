<!DOCTYPE html>
<html dir="ltr" lang="zxx">

  <head>
    
     @include('user.templates.layouts.header')

    <title>KDot | Product Details</title>
    
    
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
                    <li class="breadcrumb-item active">Page Verification</li>

                  </ol>
                </div>
              </div>
            
              <!-- breadcrumb end -->

              <!-- main-container start -->
              <!-- ================ -->
             <!--  <div class="main-container dark-translucent-bg" style="background-image:url('images/background-img-6.jpg');"> -->
                <div class="container">
                        <div class="row justify-content-center">
                          <div class="col-auto">
                            <!-- main start -->
                            <!-- ================ -->
                            <div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                              <div class="form-block-login p-30 light-gray-bg border-clear">
                                
                                <h2 class="title">Verification Code</h2>
                                   @if ($error = $errors->first('password'))
                                      <div class="alert alert-danger">
                                        {{ $error }}
                                      </div>
                                    @endif
                                <form class="form-horizontal" action="{{ url('/login/submit')}}" method="get">
                                  <div class="form-group has-feedback row">
                                    <label for="code" class="col-md-3 text-md-right control-label col-form-label"></label>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" id="code" placeholder="Verification Code" name="code" required>
                                      <i class="fa fa-user form-control-feedback pr-4"></i>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <!-- main end -->
                          </div>
                        </div>
                      </div>
              
              <!-- main-container end -->

      @include('user.templates.layouts.footer')
      <!-- footer end -->
    
    <!-- page-wrapper end -->

    <!-- JavaScript files placed at the end of the document so the pages load faster -->
    <!-- ================================================== -->
    <!-- Jquery and Bootstap core js files -->


  </body>
</html>