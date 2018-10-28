<!DOCTYPE html>
<html dir="ltr" lang="zxx">

  <head>
    
    @include('user.templates.layouts.header')

    <title>KDot | Shopping Cart</title>
    
    
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
            <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="/">Home</a></li>
            <li class="breadcrumb-item active">Shopping Cart</li>
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
              <h3 class="page-title">Shopping Cart</h3>
              <!-- page-title end -->
              
              <!-- Alert Messages -->
              <div class="pull-right">
                @if(session()->has('item-removed-message'))
                <div class="alert alert-danger alert-dismissible fade show pull-left" role="alert">
                    <strong>{{ session()->get('item-removed-message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif(session()->has('clear-items-message'))
                <div class="alert alert-danger alert-dismissible fade show pull-left" role="alert">
                    <strong>{{ session()->get('clear-items-message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
              </div>

              <div class="separator-2"></div>

              <table class="table cart table-hover table-colored">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th style="text-align: center">Action</th>
                    <th class="amount">Subtotal</th>
                    
                  </tr>
                </thead>
                <tbody>
                 
                  @foreach($cartProducts as $cartProduct)   
                  <tr class="remove-data">

                    <td class="product">
                      <div class="row">
                        <div class="col-md-3">
                          <img src="{{ asset('storage/'.$cartProduct->options->image) }}"
                            style="margin: auto; max-height: 100% ;" onerror="this.onerror=null;this.src='storage/products/default-product-image.jpg'" />
                        </div>
                        <div class="col-md-9" style="vertical-align: middle; margin: auto 0 auto 0;">
                          <a href='{{ asset("/shop-productDetails/$cartProduct->id") }}'>
                            {{$cartProduct->name}}
                          </a>
                          <small>
                            {{$cartProduct->desc}}<br>
                          </small>
                        </div>
                      </div>
                    </td>

                    <td class="price">
                      ₱ {{$cartProduct->price}}
                    </td>

                    <td class="color">
                       {{$cartProduct->options->color}}
                    </td>

                    <td class="size">
                       {{$cartProduct->options->size}}
                    </td>

                    <td class="quantity">
                      <div class="form-group">
                        <input id="qty_{{ $cartProduct->rowId }}" class="form-control"
                          value="{{$cartProduct->qty}}" type="number" min="1">
                        <!-- <p id="qty_display"></p> -->
                      </div>
                    </td>

                    <td class="remove" align="center">
                      <div style="margin-top: auto;">                    

                      </div>
                      <div style="margin-top: auto;">
                        <button class="btn btn-sm btn-info update-cart" data-cart="{{ $cartProduct->rowId }}"
                          style="padding: 2px 16px;">
                          Update
                        </button>
                        <a href="/cart-remove/{{ $cartProduct->rowId }}" style="padding: 2px 14px;" 
                          class="btn btn-sm btn-danger">
                          Remove
                        </a>
                      </div>
                    </td>

                      <?php
                        $subTotal = $cartProduct->qty * $cartProduct->price;
                      ?>

                    <td class="amount">
                      ₱ {{$subTotal}}
                    </td>



                  </tr>
                  <!-- <tr>
                    <td colspan="3">Discount Coupon</td>
                    <td colspan="2">
                      <div class="form-group">
                        <input type="text" class="form-control">
                      </div>
                    </td> -->
                    @endforeach

                  <tr>
                    <td class="total-quantity" colspan="4">Total {{ Cart::count() }} Items</td>
                    <td class="total-amount">₱ {{ Cart::total() }}</td>
                  </tr>
                    
                </tbody>
              </table>
              <div class="text-right">
                <a href="/cart-destroy" class="btn btn-group btn-danger">Clear Item(s)</a>
                <a href="/shop-checkout" class="btn btn-group btn-default">Checkout</a>
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