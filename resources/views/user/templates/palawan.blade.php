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


    <!-- breadcrumb start -->
    <!-- ================ -->
    <div class="breadcrumb-container">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="/">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
        </ol>
      </div>
    </div>


    <div class='container'>
			<div class='row'>
				<div class='col-md-10 col-md-offset-1' style='padding:0;margin:0;width:100%;'>
					<h2>Palawan Express Instructions</h2><br>
					<div class="alert alert-danger">
						<strong><i>Reminder: Don't forget the Total Payment of the Products you want to buy. <button onclick="window.open('/invoice', '_blank')" style="background-color: white;width: 150px">See Invoice Here</button></i></strong>
					</div>

					<div class="alert alert-warning">
							<strong>STEP 1: </strong> Go to any Palawan Branches near you.<br><br>
							<strong>STEP 2: </strong> Get a Palawan Express Form titled "SEND MONEY FORM".<br><br>
							<strong>STEP 3: </strong> Fill up the required fields:		
							<button id='thisButton'  data-toggle='modal' data-target='#seeImage' style="background-color: white;width: 150px"><strong>See Sample Form</strong></button>
						<br><br>
							<table class="table table-bordered" style="background-color: white">
								<tr class='active'>
									<td colspan="2">SENDER</td>
								</tr>
								<tr>
									<td>Name: </td>
									<td><font color="red">(Insert your Name here) </font><i>Ex: Juan de la Cruz</i></td>
								</tr>
								<tr>
									<td>Mobile No: </td>
									<td><font color="red">(Insert your mobile number here) </font><i>Ex: 0912345678</i></td>
								</tr>
								<tr class='active'>
									<td colspan="2">RECEIVER</td>
								</tr>
								<tr>
									<td>Name: </td>
									<td><font color="red">Khristyl Alyssa U. Cutaran </font><i>(This is the name you will be sending money from)</i></td>
								</tr>
								<tr>
									<td>Mobile No: </td>
									<td><font color="red">09085488476 </font><i>(This is the mobile number that will contact our company to secure your payment)</i></td>
								</tr>
								<tr class='active'>
									<td colspan="2">AMOUNT</td>
								</tr>
								<tr>
									<td colspan="2"><i>(Enter the total amount of the products.) Ex: Php 13,000</i></td>
									
								</tr>
								<tr class='danger'>
									<td colspan="3" ><strong><i>NOTE: We will validate the amount, so be sure to enter the exact amount.</i></strong></td>
								</tr>
							</table><br>
							<strong>STEP 4: </strong>Go back to our website and Log in. Go to "My Account > My Purchase > View Order Details"<br><br>
							<strong>STEP 5: </strong>Screenshot or Capture a Picture of your form provided by Palawan Express Form <br><br>
							<strong>STEP 6: </strong>Wait for your orders to be proccessed. It will be delivered based on the Method you choose during your purchase. Thank you! 
					</div>
					
						 
						



						

				</div>

			</div>
			

		</div>

    <div class='modal fade' id='seeImage' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body'>
    
        <img src='{{ asset("image/palawan_form.png") }}'>
        </div>
      </div>
    </div>
  </div>

        @include('user.templates.layouts.footer')
      <!-- footer end -->
    </div>
    <!-- page-wrapper end -->

    <!-- JavaScript files placed at the end of the document so the pages load faster -->
    <!-- ================================================== -->
    <!-- Jquery and Bootstap core js files -->


  </body>
</html>
\ 