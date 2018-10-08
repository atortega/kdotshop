<!DOCTYPE html>
<html dir="ltr" lang="zxx">

  <head>
    
    @include('user.templates.layouts.header')

    <title>KDot | Home</title>
    
    
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

        <!-- header-container start -->
        @include('user.templates.layouts.customer_nav')
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


  </body>
</html>