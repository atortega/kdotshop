<!doctype html>
<html>
	<head>
		 @include('user.templates.layouts.header')

		 <title>KDot | Invoice </title>

		<script src="script.js"></script>
		<link href="{{ URL::asset('css/user/invoice.css') }}" rel="stylesheet">
	</head>
	<body class="invoicebody">
		<header >
			<h1>Invoice</h1>
			<address>
				<p>Santorini, Talamban</p>
				<p>Cebu City,<br>6000 Cebu.</p>
				<p>+63 933 689 2054 </p>
				
			</address>
			<span><img src="{{ asset('image/kdot_newlogo.png') }}"></span>
		</header>
		<article>
			<table class="meta">
				<tr>
					<th><span  >Customer Name</span></th>
					<td><span  >{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<!-- <th><span  >Image</span></th> -->
						<th><span>Product</span></th>
						<!-- <th><span  >Color</span></th> -->
						<th><span>Price</span></th>
						<th><span>Quantity</span></th>
						<th><span>Total</span></th>
						<!--<th><span  >Remove</span></th>-->
					</tr>
				</thead>
				<tbody>
                  @foreach($cartProducts as $cartProduct)   
                 	<tr>

	                    <td style="text-align: center;">
							{{$cartProduct->name }}
	                    </td>

	                    <td style="text-align: center;">
							₱ {{$cartProduct->price}}
	                    </td>
	                    
	                    <!-- <td class="tax">
	                      Cart : : tax()
	                    </td> -->

	                    <td style="text-align: center;">
	                    	{{ $cartProduct->qty }}
	                    </td>

	                    <!-- <td class="remove" align="center">
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
	                    </td> -->

						<?php
						$subTotal = $cartProduct->qty * $cartProduct->price;
						?>

						<td style="text-align: center;">
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

				<!-- <tr>
					<td>₱ {{ Cart::total() }}</td>
				</tr> -->
                    
                </tbody>
				
				<!--<tr>
					<td><span  >Front End Consultation</span></td>
					<td><span  >Experience Review</span></td>
					<td><span data-prefix>$</span><span  >150.00</span></td>
					<td><span  >4</span></td>
					<td><span data-prefix>$</span><span>600.00</span></td>
				</tr> -->
			</table>
			
			<table class="balance">
				<thead>
					<tr>
						<th><strong>Total Amount</strong></th>
						<td style="text-align: center;"><span data-prefix>₱ {{ Cart::total() }}</span>
					</tr>
				</thead>
			</table>
		</article>
		<aside>
			<h1><span>Additional Notes</span></h1>
			<div>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
				<br><br>
				<div align="center" >
					<button onclick="printpage();"
							style="cursor: pointer;padding:6px 12px;border:1px solid transparent;
							border-radius:4px" id="printpagebutton" class='btn'>
						<span class="fa fa-print"></span> Print this page
					</button>
				</div>
			</div>
		</aside>
	</body>
</html>


<script type="text/javascript">
	function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
    }
</script>