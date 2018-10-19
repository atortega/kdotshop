<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>
  @include('user.templates.layouts.header')
  <title>KDot | My Account </title>
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
            <a class="link-dark" href="/">
              Home
            </a>
          </li>
          <li class="breadcrumb-item active">
            My Purchase
          </li>
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
                <div class="col-3">
                    @include('user.templates.layouts.page-purchase-sidebar')

                </div>

                <!-- page-title start -->
                <!-- ================ -->
                <!-- page-title end -->

               

        
            <!-- another column-->
            <!-- ================ -->
            <div class="main col-9">

            <!-- page-title start -->
            <!-- ================ -->
            <h3 class="page-title">Completed Orders</h3>
            <!-- page-title end -->

            <!-- Alert Messages -->

            <div class="separator"></div>

            <table class="table cart table-hover table-colored">
              <thead>
                <tr>
                  <th>Order Number</th>
                  <th>Product Name</th>                 
                  <th>Payment Methods</th>
                  <th>Date Purchased</th>
                  <th>Serial Number</th>
                  <th>Invoice Number</th>
                  <th>Total Quantity</th>
                  <th>Total Payments</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="total-quantity" colspan="7"></td>
                  <td class="total-amount"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- main end -->
        </div>
      </div>
    </section>
    <!-- main-container end -->
  </div>
  <!-- page-wrapper end -->

  <!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
  <!-- ================ -->
  @include('user.templates.layouts.footer')
  <!-- footer end -->

  <!-- JavaScript files placed at the end of the document so the pages load faster -->
  <!-- ================================================== -->
  <!-- Jquery and Bootstap core js files -->  
</body>
</html>