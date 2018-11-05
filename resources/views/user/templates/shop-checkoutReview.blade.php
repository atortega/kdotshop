<!DOCTYPE html>
<html dir="ltr" lang="zxx">

  <head>
    
    @include('user.templates.layouts.header')

    <title>KDot | Checkout Review</title>
    
    
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
            <li class="breadcrumb-item active">Checkout Review</li>
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
              <h3 class="title-page">Checkout Review</h3>
              <div class="separator-2"></div>
              <!-- page-title end -->

              <table class="table cart table-hover table-colored">
                <thead>
                  <tr>
                    <th>Product </th>
                    <th>Price </th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th class="amount">Total </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cartProducts as $cartProduct)   
                    <tr style="max-height: 10px;">
                        <td class="product">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/'.$cartProduct->options->image) }}"
                                        style="margin: auto; max-height: 100% ;"
                                        onerror="this.onerror=null;
                                        this.src='storage/products/default-product-image.jpg'" />
                                </div>
                                <div class="col-md-9" style="vertical-align: middle; margin: auto 0 auto 0;">
                                    <a href='{{ asset("/shop-productDetails/$cartProduct->id") }}'>
                                        {{$cartProduct->name}}
                                    </a>
                                    <small>
                                        {{$cartProduct->options->desc}}
                                    </small>
                                </div>
                            </div>
                        </td>

                        <td class="price" style="width: 10px !important;">
                            ₱ {{$cartProduct->price}} 
                        </td>

                        <td class="color" style="width: 10px !important;">
                           {{$cartProduct->options->color}}
                        </td>

                        <td class="size" style="width: 10px !important;">
                           {{$cartProduct->options->size}}
                        </td>

                        <td class="quantity">
                            <div class="form-group">
                                <input class="form-control" value="{{$cartProduct->qty}}" 
                                    type="text" disabled>
                            </div>
                        </td>

                        <?php
                            $subTotal = $cartProduct->qty * $cartProduct->price;
                        ?>

                        <td class="amount">
                            ₱ {{$subTotal}}
                        </td>
                    </tr>
                  @endforeach
                 <!--  <tr>
                    <td class="total-quantity" colspan="3">Subtotal</td>
                    <td class="amount">$1997.00</td>
                  </tr> -->
                  <!-- <tr>                    
                    <td class="total-quantity" colspan="2">Discount Coupon</td>
                    <td class="price">TheProject25672</td>
                    <td class="amount">-20%</td>
                  </tr> -->
                  <tr>                    
                    <td class="shipping_fee" colspan="6">Shipping Fee</td>
                    <!--  ₱ {{59.00}} -->
                  </tr>
                  <tr>
                    <td class="total-quantity" colspan="5">Total {{Cart::count()}} Items</td>
                    
                    <td class="total-amount">₱ {{ Cart::total() }}</td>
                  </tr>
                </tbody>
              </table>
              <div class="space-bottom"></div>
              <table class="table cart table-hover table-colored">
                <thead>
                  <tr>
                    <th colspan="2">Billing Information </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Full Name</td>
                    <td class="information">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td class="information">{{ Auth::user()->email }} </td>
                  </tr>
                  <tr>
                    <td>Contact Number</td>
                    <td class="information">{{ Auth::user()->phone_number }}</td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td class="information">{{ $user->billing_address1 }} {{ $user->billing_barangay }}, {{ $user->billing_city }}  {{ $user->billing_province }} ,{{ $user->billing_zipcode }} {{ $user->billing_country}} </td>
                  </tr>
                  
                </tbody>
              </table>
              <div class="space-bottom"></div>
              <table class="table cart table-hover table-colored">
                <thead>
                  <tr>
                    <th colspan="2">Shipping Information </th>
                  </tr>
                </thead>
                <tbody>
<!--                   <tr>
                    <td>Full Name</td>
                    <td class="information">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}  </td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td class="information">{{ Auth::user()->email }} </td>
                  </tr>
                  <tr>
                    <td>Contact Number</td>
                    <td class="information">{{ Auth::user()->phone_number }}</td>
                  </tr> -->
                  <tr>
                    <td>Address</td>
                    <td class="information">{{ $user->shipping_address1 }} {{ $user->shipping_barangay }}, {{ $user->shipping_city }}  {{ $user->shipping_province }} ,{{ $user->shipping_zipcode }} {{ $user->shipping_country}}</td>
                  </tr>
                </tbody>
              </table>
              <div class="space-bottom"></div>
              <table class="table cart table-hover table-colored">
                <thead>
                  <tr>
                    <th colspan="2">Delivery Method </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ session('delivery_method') }}</td>
                    <!-- <td class="information"></td> -->
                  </tr>
                </tbody>
              </table>
              <div class="text-right">  
                <a href="/shop-checkout" class="btn btn-group btn-default">Go Back</a>
                <a href="/shop-checkoutPayment" class="btn btn-group btn-default">Proceed to Payment</a>
              </div>

            </div>
            <!-- main end -->

          </div>
        </div>
      </section>
      <!-- main-container end -->

      <!-- section start -->

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