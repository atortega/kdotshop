<!DOCTYPE html>
<html dir="ltr" lang="zxx">

  <head>
    
    @include('user.templates.layouts.header')

    <title>KDot | Checkout Payment</title>
    
    
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
            <li class="breadcrumb-item active">Checkout Payment</li>
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
              <h3 class="title-page">Checkout Payment</h3>
              <div class="separator-2"></div>
              <!-- page-title end -->

              <fieldset>
                <legend>Payment</legend>
                <form class="form-horizontal">
                  <div class="row">
                    <div class="col-xl-3">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="optionsRadios1" value="option1" checked>
                        <label class="form-check-label">
                          <img src='{{ asset("image/payment-methods/paymaya-218x48.png") }}'>
                          <i class="fa fa-cc-mastercard pl-10"></i>
                          <i class="fa fa-cc-visa pl-10"></i>
                        </label>
                      </div>
                      <div class="space-bottom"></div>
                    </div>
                    <!-- <div class="col-xl-9">
                      <p></p>
                    </div> -->
                  </div>
                  <div class="space"></div>
                  <div class="row">
                    <div class="col-xl-3">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="optionsRadios2" value="option2">
                        <label class="form-check-label">
                          <img src='{{ asset("image/payment-methods/paypal-180x48.png") }}'>
                          <i class="fa fa-cc-paypal pl-10"></i>
                        </label>
                      </div>
                      <div class="space-bottom"></div>
                    </div>
                    <div class="col-xl-9">
                      <p>After submitting your order, you will be redirected to the PayPal website where you can make your payment. Once your payment has been successfully completed and confirmed by PayPal, delivery of the ordered products will be initiated.</p>
                       
                        <div class="col-lg-9">
                          <div class="row">
                            <div class="col-lg-8">
                              
                            </div>
                          </div>
                        </div>
                      
                    </div>
                  </div>
                  <div class="space"></div>
                  <div class="row">
                    <div class="col-xl-3">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="optionsRadios3" value="option3">
                        <label class="form-check-label">
                          <img src='{{ asset("image/payment-methods/palawan-express-padala-180x60.png") }}'>
                        </label>
                      </div>
                      <!-- <div class="space-bottom"></div> -->
                    </div>
                    <!-- <div class="col-xl-9">
                      <p></p>
                    </div> -->
                  </div>
                </form>
              </fieldset>
              <div class="text-right">
                <a href="/shop-checkout" class="btn btn-group btn-default">Go Back</a>
                <a href="/shop-checkoutReview" class="btn btn-group btn-default">Review and Complete Your Order</a>
              </div>

            </div>
            <!-- main end -->

          </div>
        </div>
      </section>
      <!-- main-container end -->

      <!-- section start -->
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