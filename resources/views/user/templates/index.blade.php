<!DOCTYPE html>
<html dir="ltr" lang="zxx">

  <head>
    <meta charset="utf-8">
    <title>The Project | Home</title>
    <meta name="description" content="The Project a Bootstrap-based, Responsive HTML5 Template">
    <meta name="author" content="author">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="{{ URL::asset('fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Plugins -->
    <link href="{{ URL::asset('plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/rs-plugin-5/css/settings.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/rs-plugin-5/css/layers.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/rs-plugin-5/css/navigation.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/user/animations.css" rel="stylesheet') }}">
    <link href="{{ URL::asset('plugins/slick/slick.css') }}" rel="stylesheet">
    
    <!-- The Project's core CSS file -->
    <!-- Use css/rtl_style.css for RTL version -->
    <link href="{{ URL::asset('css/user/style.css') }}" rel="stylesheet" >
    <!-- The Project's Typography CSS file, includes used fonts -->
    <!-- Used font for body: Roboto -->
    <!-- Used font for headings: Raleway -->
    <!-- Use css/rtl_typography-default.css for RTL version -->
    <link href="{{ URL::asset('css/user/typography-default.css') }}" rel="stylesheet" >
    <!-- Color Scheme (In order to change the color scheme, replace the blue.css with the color scheme that you prefer) -->
    <link href="{{ URL::asset('css/user/skins/light_blue.css') }}" rel="stylesheet">

    <!-- Custom css -->
    <link href="{{ URL::asset('css/user/custom.css') }}" rel="stylesheet">
    
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
      <div class="header-container">
        <!-- header-top start -->
        <!-- classes:  -->
        <!-- "dark": dark version of header top e.g. class="header-top dark" -->
        <!-- "colored": colored version of header top e.g. class="header-top colored" -->
        <!-- ================ -->

        @include('user.templates.layouts.header')

        <!-- header end -->
      </div>
    

      <!-- header-container end -->
      <!-- banner start -->
      <!-- ================ -->
      @include('user.templates.layouts.banner')
      <!-- banner end -->

      <div id="page-start"></div>

      <!-- section start -->
      <!-- ================ -->
      <section class="light-gray-bg pv-30 clearfix">
         @include('user.templates.section_latest_products')
      </section>
    <!-- section end -->

          <!-- section start -->
          <!-- ================ -->
          <section class="section default-bg clearfix">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="call-to-action text-center">
                    <div class="row">
                      <div class="col-lg-8">
                        <h1 class="title">Don't Miss Our Products</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem quasi explicabo consequatur consectetur, a atque voluptate officiis eligendi nostrum.</p>
                      </div>
                      <div class="col-lg-4">
                        <br>
                        <p><a href="#" class="btn btn-lg btn-gray-transparent btn-animated">Shop Now<i class="fa fa-arrow-right pl-20"></i></a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- section end -->

          <!-- section start -->
          <!-- ================ -->
          <section class="section light-gray-bg clearfix">
            @include('user.templates.section_featured_categories')
          </section>
          <!-- section end -->
        </div>
      </section>
      <!-- section end -->



      <!-- section start -->
      <!-- ================ -->
      <section class="light-gray-bg pv-20">
      </section>
      <!-- section end -->

      <!-- section -->
      <!-- ================ -->
      <section class="pv-30">
        @include('user.templates.section_top_sellers')
        
        </div>
        <br>
      </section>
      
        <!-- footer top end -->
      </section>
      <!-- section end -->
      <!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
      <!-- ================ -->
      @include('user.templates.layouts.footer')
      
      <!-- footer end -->
    </div>
    <!-- page-wrapper end -->

    <!-- JavaScript files placed at the end of the document so the pages load faster -->
    <!-- ================================================== -->
    <!-- Jquery and Bootstap core js files -->
    <script src="plugins/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery Revolution Slider  -->
    <script src="plugins/rs-plugin-5/js/jquery.themepunch.tools.min.js"></script>
    <script src="plugins/rs-plugin-5/js/jquery.themepunch.revolution.min.js"></script>
    <!-- Isotope javascript -->
    <script src="plugins/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="plugins/isotope/isotope.pkgd.min.js"></script>
    <!-- Magnific Popup javascript -->
    <script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Appear javascript -->
    <script src="plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="plugins/waypoints/sticky.min.js"></script>
    <!-- Count To javascript -->
    <script src="plugins/countTo/jquery.countTo.js"></script>
    <!-- Slick carousel javascript -->
    <script src="plugins/slick/slick.min.js"></script>
    <!-- Initialization of Plugins -->
    <script src="js/template.js"></script>
    <!-- Custom Scripts -->
    <script src="js/custom.js"></script>

  </body>
</html>
