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

        @include('user.templates.customer_nav')

        <!-- header end -->
      

      <!-- header-container end -->
      <!-- breadcrumb start -->
      <!-- ================ -->
      <div class="breadcrumb-container">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Shop Product</li>
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
              <h1 class="page-title">Shop Product</h1>
              <div class="separator-2"></div>
              <!-- page-title end -->
            @extends('front.master')
            @section('content')
            @foreach($products as $product)
              <div class="row">
                <div class="col-lg-4">
                  <!-- pills start -->
                  <!-- ================ -->
                  <!-- Nav tabs -->
                  
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#pill-1" data-toggle="tab" title="images"><i class="fa fa-camera pr-1"></i> Photo</a></li>
                      
                    </ul>
                    <!-- Tab panes -->
                  
                    <div class="tab-content clear-style">
                      <div class="tab-pane active" id="pill-1">
                          <div class="slick-carousel content-slider-with-large-controls">
                            <div class="overlay-container overlay-visible">
                              <img src='{{ asset("storage/$product->product_image") }}' alt="">
                              <a href='{{ asset("storage/$product->product_image") }}' class="slick-carousel--popup-img overlay-link" title="image title"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="overlay-container overlay-visible">
                              <img src='{{ asset("storage/$product->product_image") }}' alt="">
                              <a href='{{ asset("storage/$product->product_image") }}' class="slick-carousel--popup-img overlay-link" title="image title"><i class="fa fa-plus"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="pill-2">
                          <div class="overlay-container">
                            <img src='{{ asset("storage/$product->product_image") }}' alt="">
                            <a class="overlay-link" href="#"><i class="fa fa-link"></i></a>
                          </div>
                        </div>
                      </div>
                    <!-- pills end -->
                    </div>
                    <div class="col-lg-8 pv-30">
                      <h2 class="mt-4">{{ $product->product_name }}</h2>
                      
                      
                      <hr class="mb-10">
                        <form class="clearfix row grid-space-10">
                            <div class="form-group col-lg-4">
                              <label>Quantity</label>
                              <input type="text" class="form-control" value="1">
                            </div>
                            <div class="form-group col-lg-4">
                              <label>Color</label>
                              <select class="form-control">
                                <option>{{ $product->color }}</option>
                                
                              </select>
                            </div>
                            <div class="form-group col-lg-4">
                              <label>Size</label>
                              <select class="form-control">
                                <option>{{ $product->size }}</option>
                                <option>5.7"</option>
                              </select>
                            </div>
                        </form>
                      <div class="light-gray-bg p-20 bordered clearfix">
                        <span class="product price"><i class="fa fa-tag pr-10"></i>PHP {{ $product->unit_price }}</span>
                        <div class="product elements-list pull-right clearfix">
                          <a href="/shop-cart">
                            <input type="submit" value="Add to Cart" class="margin-clear btn btn-default"/>
                          </a>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  @endsection
                </div>
              </div>
            <!-- main end -->
          </div>
        </div>
      </section>
      <!-- main-container end -->

      <!-- section start -->
      <!-- ================ -->

      <!-- section end -->

      <!-- footer top start -->
      <!-- ================ -->

      @include('user.templates.layouts.footer')
    </div>
    <!-- page-wrapper end -->

    <!-- JavaScript files placed at the end of the document so the pages load faster -->
    <!-- ================================================== -->

  </body>
</html>
