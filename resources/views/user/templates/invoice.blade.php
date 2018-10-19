<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link href="{{ URL::asset('userside-favicon.ico') }}" rel="shortcut icon">
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="http://www.opensource.org/licenses/mit-license/">
		<script src="script.js"></script>
	</head>
	<body>
		<header>
			<h1>Invoice</h1>
			<address>
				<p>268 Magallanes St,</p>
				<p>Cebu City,<br>Orange,6000 Cebu.</p>
				<p>(032) 253 2622 </p>
				
			</address>
			<span><img src="{{ asset('image/kdot_newlogo.png') }}"></span>
		</header>
		<article>
			<table class="meta">
				<tr>
					<th><span  >Customer Name</span></th>
					<td><span  >{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}></span></td>
				</tr>
				   
				
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<!-- <th><span  >Image</span></th> -->
						<th><span  >Product</span></th>
						<!-- <th><span  >Color</span></th> -->
						<th><span  >Price</span></th>
						<th><span  >Quantity</span></th>
						<th><span  >Total</span></th>
						<!--<th><span  >Remove</span></th>-->
					</tr>
				</thead>
				<tbody>
				

                 
                  @foreach($cartProducts as $cartProduct)   
                  <tr>

                    <td style="width:200px">
                      <a href='{{ asset("/shop-productDetails/$cartProduct->id") }}'>
                        {{$cartProduct->name}}
                      </a>
                      <!-- <small>
                        {{$cartProduct->desc}}
                      </small> -->
                    </td>

                    <td>
                      ₱ {{$cartProduct->price}}
                    </td>
                    
                    <!-- <td class="tax">
                      Cart : : tax()
                    </td> -->

                    <td align="center">
                     <!--  <div class="form-group"> -->
                        <input id="qty_{{ $cartProduct->rowId }}" 
                          value="{{$cartProduct->qty}}" type="text" min="1">
                        <!-- <p id="qty_display"></p> -->
                      </div>
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

                    <td>
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
                    <td>₱ {{ Cart::total() }}</td>
                  </tr>
                    
                </tbody>
              </table>
				
				
					<!--<tr>
						<td><span  >Front End Consultation</span></td>
						<td><span  >Experience Review</span></td>
						<td><span data-prefix>$</span><span  >150.00</span></td>
						<td><span  >4</span></td>
						<td><span data-prefix>$</span><span>600.00</span></td>
					</tr> -->
				</tbody>
			</table>
			
			<table class="balance">
				<tr>
					<th><span  >Total Amount</span></th>
					<td><span data-prefix>P</span><span>
				
			</table>
		</article>
		<aside>
			<h1><span  >Additional Notes</span></h1>
			<div  >
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
				<br>
				<br>
			    <button onclick="printpage();" style="cursor: pointer;padding:6px 12px;border:1px solid transparent;
	border-radius:4px" id="printpagebutton" class='btn'>Print this page</button>
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