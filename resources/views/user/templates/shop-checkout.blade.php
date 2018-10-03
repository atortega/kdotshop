<!DOCTYPE html>
<html dir="ltr" lang="zxx">

  <head>
    
    @include('user.templates.header')

    <title>KDot | Checkout </title>
    
    
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

      <!-- header-container end -->
      <!-- breadcrumb start -->
      <!-- ================ -->
      <div class="breadcrumb-container">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="index.html">Home</a></li>
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
              <h1 class="page-title">Checkout</h1>
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
                  <tr>
                    <td class="product"><a href="shop-product.html">Product Title 1</a> <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</small></td>
                    <td class="price">$99.50 </td>
                    <td class="quantity">
                      <div class="form-group">
                        <input type="text" class="form-control" value="2" disabled>
                      </div>                      
                    </td>
                    <td class="amount">$199.00 </td>
                  </tr>
                  <tr>
                    <td class="product"><a href="shop-product.html">Product Title 2</a> <small>Quas inventore modi</small></td>
                    <td class="price"> $99.66 </td>
                    <td class="quantity">
                      <div class="form-group">
                        <input type="text" class="form-control" value="3" disabled>
                      </div>                      
                    </td>
                    <td class="amount">$299.00 </td>
                  </tr>
                  <tr>
                    <td class="product"><a href="shop-product.html">Product Title 3</a> <small>Fugiat nemo enim officiis repellendus</small></td>
                    <td class="price"> $499.66 </td>
                    <td class="quantity">
                      <div class="form-group">
                        <input type="text" class="form-control" value="3" disabled>
                      </div>                      
                    </td>
                    <td class="amount">$1499.00 </td>
                  </tr>
                  <tr>
                    <td class="total-quantity" colspan="3">Subtotal</td>
                    <td class="amount">$1997.00</td>
                  </tr>
                  <tr>                    
                    <td class="total-quantity" colspan="2">Discount Coupon</td>
                    <td class="price">TheProject25672</td>
                    <td class="amount">-20%</td>
                  </tr>
                  <tr>
                    <td class="total-quantity" colspan="3">Total 8 Items</td>
                    <td class="total-amount">$1597.00</td>
                  </tr>
                </tbody>
              </table>
              <div class="space-bottom"></div>
              <fieldset>
                <legend>Billing information</legend>
                <form class="form-horizontal">
                  <div class="row">
                    <div class="col-xl-3">
                      <h3 class="title">Personal Info</h3>
                    </div>
                    <div class="col-xl-8 ml-xl-auto">
                      <div class="form-group row">
                        <label for="billingFirstName" class="col-lg-2 control-label text-lg-right col-form-label">First Name<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="billingFirstName" value="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="billingLastName" class="col-lg-2 control-label text-lg-right col-form-label">Last Name<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="billingLastName" value="Last Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="billingTel" class="col-lg-2 control-label text-lg-right col-form-label">Telephone<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="billingTel" value="Telephone">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="billingFax" class="col-lg-2 control-label text-lg-right col-form-label">Fax</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="billingFax" value="Fax">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="billingemail" class="col-lg-2 control-label text-lg-right col-form-label">Email<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="email" class="form-control" id="billingemail" value="Email">
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
                        <label for="billingAddress1" class="col-lg-2 control-label text-lg-right col-form-label">Address 1<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="billingAddress1" value="Address 1">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="billingAddress2" class="col-lg-2 control-label text-lg-right col-form-label">Address 2</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="billingAddress2" value="Address 2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-2 control-label text-lg-right col-form-label">Country<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <select class="form-control">
                            <option value="PH" selected >Philippines</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="billingCity" class="col-lg-2 control-label text-lg-right col-form-label">City<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="billingCity" value="City">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="billingPostalCode" class="col-lg-2 control-label text-lg-right col-form-label">Zip Code<small class="text-default">*</small></label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="billingPostalCode" value="Postal Code">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="space"></div>
                  <div class="row">
                    <div class="col-xl-3">
                      <h3 class="title mt-5 mt-lg-0">Additional Info</h3>
                    </div>
                    <div class="col-xl-8 ml-xl-auto">
                      <div class="form-group row">
                        <div class="col-12">
                          <textarea class="form-control" rows="4"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </fieldset>
              <fieldset>
                <legend>Shipping information</legend>
                <form class="form-horizontal">
                  <div id="shipping-information" class="space-bottom">
                    <div class="row">
                      <div class="col-xl-3">
                        <h3 class="title mt-5 mt-lg-0">Personal Info</h3>
                      </div>
                      <div class="col-xl-8 ml-xl-auto">
                        <div class="form-group row">
                          <label for="shippingFirstName" class="col-lg-2 control-label text-lg-right col-form-label">First Name<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="shippingFirstName" value="First Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="shippingLastName" class="col-lg-2 control-label text-lg-right col-form-label">Last Name<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="shippingLastName" value="Last Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="shippingTel" class="col-lg-2 control-label text-lg-right col-form-label">Telephone<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="shippingTel" value="Telephone">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="shippingFax" class="col-lg-2 control-label text-lg-right col-form-label">Fax</label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="shippingFax" value="Fax">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="shippingemail" class="col-lg-2 control-label text-lg-right col-form-label">Email<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="email" class="form-control" id="shippingemail" value="Email">
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
                          <label for="shippingAddress1" class="col-lg-2 control-label text-lg-right col-form-label">Address 1<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="shippingAddress1" value="Address 1">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="shippingAddress2" class="col-lg-2 control-label text-lg-right col-form-label">Address 2</label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="shippingAddress2" value="Address 2">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-2 control-label text-lg-right col-form-label">Country<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <select class="form-control">  
                              <option value="PH" selected>Philippines</option> 
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="shippingCity" class="col-lg-2 control-label text-lg-right col-form-label">City<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="shippingCity" value="City">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="shippingPostalCode" class="col-lg-2 control-label text-lg-right col-form-label">Zip Code<small class="text-default">*</small></label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="shippingPostalCode" value="Postal Code">
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

      @include('user.templates.footer')
      <!-- footer end -->
    </div>
    <!-- page-wrapper end -->

    <!-- JavaScript files placed at the end of the document so the pages load faster -->
    <!-- ================================================== -->
    <!-- Jquery and Bootstap core js files -->


  </body>
</html>