<!DOCTYPE html>
<html dir="ltr" lang="zxx">

  <head>
    
    @include('user.templates.layouts.header')

    <title>KDot | Checkout Completed</title>
    
    
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
            <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i>
              <a class="link-dark" href="/">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a class="link-dark" href="/shop-cart">Shopping Cart</a>
            </li>
            <li class="breadcrumb-item">
              <a class="link-dark" href="/shop-checkout">Checkout</a>
            </li>
            <li class="breadcrumb-item">
              <a class="link-dark" href="/shop-checkoutPayment">Checkout Payment</a>
            </li>
             <li class="breadcrumb-item">
              <a class="link-dark" href="/shop-checkoutReview">Checkout Review</a>
            </li>
            <li class="breadcrumb-item active">Thank You</li>
          </ol>
        </div>
      </div>
      <!-- breadcrumb end -->

      <!-- main-container start -->
      <!-- ================ -->
      <section class="main-container">

        <div class="container">
          <div class="row justify-content-lg-center">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-lg-8">

              <!-- page-title start -->
              <!-- ================ -->
              <h1 class="page-title text-center">Thank You <i class="fa fa-smile-o pl-10"></i></h1>
              <div class="separator"></div>
              <!-- page-title end -->

              <p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis a deleniti sequi necessitatibus, rem asperiores, magnam labore ullam sint placeat excepturi. Vero corrupti consequuntur id eum esse, rerum, iure neque.</p>
              <p class="text-center">
                <a href="/" class="btn btn-default btn-lg">Continue Shopping!</a> 
              </p>

            </div>
            <!-- main end -->

          </div>
        </div>
      </section>
      <!-- main-container end -->

      <!-- footer top start -->
      <!-- ================ -->

        <!-- .subfooter end -->

      @include('user.templates.layouts.footer')
      <!-- footer end -->
    </div>
    <!-- page-wrapper end -->

    <!-- JavaScript files placed at the end of the document so the pages load faster -->
    <!-- ================================================== -->
    <!-- Jquery and Bootstap core js files -->


  </body>
</html>
