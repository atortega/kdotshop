<!DOCTYPE html>
<html dir="ltr" lang="zxx">

  <head>

  @include('user.templates.layouts.header')

  <title>KDot | Products </title>


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
      @include('user.templates.layouts.customer_nav')
    <!-- header-container end -->



        <!-- header end -->
      

      <!-- header-container end -->
      <!-- breadcrumb start -->
      <!-- ================ -->
      <div class="breadcrumb-container">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="/">Home</a></li>
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
              <h3 class="title-page">Shop Product</h3>
              <div class="separator-2"></div>
              <!-- page-title end -->
            
            
              <div class="row">
                <div class="col-lg-4">
                  <!-- pills start -->
                  <!-- ================ -->
                  <!-- Nav tabs -->
                  
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#pill-1"
                          data-toggle="tab" title="images">
                        <i class="fa fa-camera pr-1"></i> Photo</a>
                      </li>
                    </ul>
                    <!-- Tab panes -->
                    
                    <div class="tab-content clear-style">
                      <div class="tab-pane active" id="pill-1">
                          <div class="slick-carousel content-slider-with-large-controls">
                            <div class="overlay-container overlay-visible">
                              <img src="{{ asset("storage/$getProductQuery->product_image") }}" onerror="this.onerror=null;this.src='/storage/products/default-product-image.jpg'" />
                              <a href='{{ URL::asset("storage/$getProductQuery->product_image") }}'
                                class="slick-carousel--popup-img overlay-link"
                                title="{{ $getProductQuery->product_name }}">
                                <i class="fa fa-plus"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!-- pills end -->
                    </div>
                    <div class="col-lg-8 pv-30">
                      <h2 class="mt-4">{{ $getProductQuery->product_name }}</h2> <!-- Product Name -->
                      
                      <p>{{ $getProductQuery->product_desc }}</p>

                      <hr class="mb-10">
                        <form class="clearfix row grid-space-10">
                            <div class="form-group col-lg-4">
                              <label>Quantity</label>
                              <input type="number" class="form-control" id="quantity" value="1" min="1" max="100">
                            </div>
                            <div class="form-group col-lg-4">
                              <label>Color</label>
                              <select class="form-control" id="color">
                                @foreach($getColorQuery as $colors)
                                  <option value="{{$colors->color_id}}">{{$colors->color}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group col-lg-4">
                              <label>Size</label>
                              <select class="form-control" id="size">
                                @foreach($getSizeQuery as $sizes)
                                  <option value="{{$sizes->size_id}}">{{$sizes->size}}</option>
                                @endforeach
                              </select>
                            </div>
                        </form>
                      <div class="light-gray-bg p-20 bordered clearfix">
                        <span class="product price"><i class="fa fa-tag pr-10"></i>
                            ₱ {{ $getSkuQuery->unit_price }}
                        </span>
                         {!! Form::open(['url'=>'/cart-add', 'method'=>'POST']) !!}

                                    <input type="hidden" name="product_id" value="{{ $getSkuQuery->product_id }}">
                                    <input type="hidden" name="qty" id="qty" value="1">
                                    <input type="hidden" name="color" id="color_id" value="">
                                    <input type="hidden" name="size" id="size_id" value="">
                                    <button type="submit" id="frmSubmit" class="pull-right margin-clear btn btn-sm btn-default-transparent btn-animated">Add To Cart<i class="fa fa-shopping-cart"></i></button>
                          {!! Form::close()!!}
                      </div>
                    </div>

                  
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

      
    </div>
    <!-- page-wrapper end -->

    <!-- JavaScript files placed at the end of the document so the pages load faster -->
    <!-- ================================================== -->
      @include('user.templates.layouts.footer')
      <script>
          $(function() {
              $("#frmSubmit").click(function() {
                  $("#qty").val($("#quantity").val());
                  $("#color_id").val($("#color").val());
                  $("#size_id").val($("#size").val());
              });
          });
      </script>
  </body>

</html>