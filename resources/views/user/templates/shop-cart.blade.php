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

        @include('user.templates.layouts.customer_nav')
      <!-- header-container end -->
      <!-- breadcrumb start -->
      <!-- ================ -->
      <div class="breadcrumb-container">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="index.html">Home</a></li>
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
              <h1 class="page-title">Shopping Cart</h1>
              <div class="separator-2"></div>
              <!-- page-title end -->

              <table class="table cart table-hover table-colored">
                <thead>
                  <tr>
                    <th>Product </th>
                    <th>Price </th>
                    <th>Quantity</th>
                    <th>Remove </th>
                    <th class="amount">Total </th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="remove-data">
                    <td class="product"><a href="shop-product.html">Product Title 1</a> <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</small></td>
                    <td class="price">$99.50 </td>
                    <td class="quantity">
                      <div class="form-group">
                        <input type="text" class="form-control" value="2">
                      </div>
                    </td>
                    <td class="remove"><a href="#" class="btn btn-remove btn-sm btn-default">Remove</a></td>
                    <td class="amount">$199.00 </td>
                  </tr>
                  <tr class="remove-data">
                    <td class="product"><a href="shop-product.html">Product Title 2</a> <small>Quas inventore modi</small></td>
                    <td class="price"> $99.66 </td>
                    <td class="quantity">
                      <div class="form-group">
                        <input type="text" class="form-control" value="3">
                      </div>
                    </td>
                    <td class="remove"><a href="#" class="btn btn-remove btn-sm btn-default">Remove</a></td>
                    <td class="amount">$299.00 </td>
                  </tr>
                  <tr class="remove-data">
                    <td class="product"><a href="shop-product.html">Product Title 3</a> <small>Fugiat nemo enim officiis repellendus</small></td>
                    <td class="price"> $499.66 </td>
                    <td class="quantity">
                      <div class="form-group">
                        <input type="text" class="form-control" value="3">
                      </div>
                    </td>
                    <td class="remove"><a href="#" class="btn btn-remove btn-sm btn-default">Remove</a></td>
                    <td class="amount">$1499.00 </td>
                  </tr>
                  <tr>
                    <td colspan="3">Discount Coupon</td>
                    <td colspan="2">
                      <div class="form-group">
                        <input type="text" class="form-control">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="total-quantity" colspan="4">Total 8 Items</td>
                    <td class="total-amount">$1997.00</td>
                  </tr>
                </tbody>
              </table>
              <div class="text-right">
                <a href="/shop-cart" class="btn btn-group btn-default">Update Cart</a>
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
