<!DOCTYPE html>
<html dir="ltr" lang="zxx">

  <head>
    
    @include('user.templates.layouts.header')

    <title>KDot | Checkout </title>
    
    
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
            <li class="breadcrumb-item">
              <i class="fa fa-home pr-2"></i>
              <a class="link-dark" href="/">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a class="link-dark" href="/shop-cart">Shopping Cart</a>
            </li>
            <li class="breadcrumb-item active">Checkout</li>
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
              <h3 class="title-page">Checkout</h3>
              <div class="separator-2"></div>
              <!-- page-title end -->

              <table class="table cart">
                <thead>
                  <tr>
                    <th>Product </th>
                    <th>Price </th>
                    <th>Quantity</th>
                    <th class="amount">Total </th>
                  </tr>
                </thead>
                <tbody>
                   
                   @foreach($cartProducts as $cartProduct)   
                  <tr>
                    <td class="product">
                      <a href="/shop-productDetails/{{$cartProduct->product_id}}">
                        {{$cartProduct->product_name}}
                      </a> 
                      <small>
                        {{$cartProduct->desc}}
                      </small>
                    </td>
                    <td class="price">₱ {{$cartProduct->price}}  </td>
                    <td class="quantity">
                      <div class="form-group">
                        <input type="text" class="form-control" value="{{$cartProduct->qty}}" disabled>
                      </div>                      
                    </td>
                     
                      <?php
                        $subTotal = $cartProduct->qty * $cartProduct->price;
                      ?>

                    <td class="amount">₱ {{$subTotal}}</td>
                  </tr>
                   @endforeach
                  <!-- <tr>
                    <td class="total-quantity" colspan="3">Subtotal</td>
                    <td class="amount">₱ {{$subTotal}}</td>
                  </tr> -->
                  <!-- <tr>                    
                    <td class="total-quantity" colspan="2">Discount Coupon</td>
                    <td class="price">TheProject25672</td>
                    <td class="amount">-20%</td>
                  </tr> -->
                 
                  <tr>
                    <td class="total-quantity" colspan="3">Total {{Cart::count()}} Items</td>
                    
                    <td class="total-amount">₱ {{ Cart::total() }}</td>
                  </tr>
                </tbody>
              </table>
              <div class="space-bottom"></div>
              <fieldset>
                <legend>Billing information</legend>
                <form class="form-horizontal">
                  <div class="row">
                    <div class="col-xl-3">
                      <h3 class="title">Personal Information</h3>
                    </div>
                    <div class="col-xl-8 ml-xl-auto">
                      <div class="form-group row">
                        <label for="billingFirstName" class="col-lg-2 control-label text-lg-right col-form-label">First Name<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="first_name" placeholder ="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="billingLastName" class="col-lg-2 control-label text-lg-right col-form-label">Last Name<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="last_name" placeholder ="Last Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="billingTel" class="col-lg-2 control-label text-lg-right col-form-label">Contact Number<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="contact_number" placeholder ="Contact Number">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="billingemail" class="col-lg-2 control-label text-lg-right col-form-label">Email<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="email" class="form-control" id="email" placeholder ="Email">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="space"></div>
                  <div class="row">
                    <div class="col-xl-3">
                      <h3 class="title mt-5 mt-lg-0">Your Address</h3>
                    </div>
                    <div class="col-xl-8 ml-xl-auto">
                      <div class="form-group row">
                        <label for="billingAddress1" class="col-lg-2 control-label text-lg-right col-form-label">Address <small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="address" placeholder ="Address ">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-2 control-label text-lg-right col-form-label">Country<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <select class="form-control">
                            <option placeholder ="PH" selected >Philippines</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="billingCity" class="col-lg-2 control-label text-lg-right col-form-label">City<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="city" placeholder ="City">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="billingPostalCode" class="col-lg-2 control-label text-lg-right col-form-label">Zip Code<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="zip_code" placeholder ="Postal Code">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--     -->
                </form>
              </fieldset>
              <fieldset>
                <legend>Shipping information</legend>
                <form class="form-horizontal">
                  <div id="shipping-information" class="space-bottom">
                    <div class="row">
                      <div class="col-xl-3">
                        <h3 class="title mt-5 mt-lg-0">Personal Information</h3>
                      </div>
                      <div class="col-xl-8 ml-xl-auto">
                        <div class="form-group row">
                          <label for="first_name" class="col-lg-2 control-label text-lg-right col-form-label">First Name<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="first_name" placeholder ="First Name">
                          </div>placeholder 
                        </div>
                        <div class="form-group row">
                          <label for="last_name" class="col-lg-2 control-label text-lg-right col-form-label">Last Name<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="last_name" placeholder ="Last Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="contact_number" class="col-lg-2 control-label text-lg-right col-form-label">Contact Number<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="contact_number" placeholder ="Contact Number">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-lg-2 control-label text-lg-right col-form-label">Email<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="email" class="form-control" id="email" placeholder ="Email">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="space"></div>
                    <div class="row">
                      <div class="col-xl-3">
                        <h3 class="title mt-5 mt-lg-0">Your Address</h3>
                      </div>
                      <div class="col-xl-8 ml-xl-auto">
                        <div class="form-group row">
                          <label for="address" class="col-lg-2 control-label text-lg-right col-form-label">Address <small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="address" placeholder ="Address ">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-2 control-label text-lg-right col-form-label">Country<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <select class="form-control">  
                              <option placeholder ="PH" selected>Philippines</option> 
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="city" class="col-lg-2 control-label text-lg-right col-form-label">City<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="city" placeholder ="City">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="zip_code" class="col-lg-2 control-label text-lg-right col-form-label">Zip Code<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="zip_code" placeholder ="Postal Code">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="checkbox padding-top-clear form-check">
                    <input class="form-check-input" type="checkbox" id="shipping-info-check" checked>
                    <label class="form-check-label">
                      My Shipping information is the same as my Billing information.
                    </label>
                  </div>
                </form>
              </fieldset>
              <div class="text-right">  
                <a href="/shop-cart" class="btn btn-group btn-default">Go Back To Cart</a>
                <a href="/shop-checkoutPayment" class="btn btn-group btn-default">Next Step</a>
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
