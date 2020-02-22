@extends('frontend.front_layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@php
						$content = Cart::content();
						@endphp
						@foreach($content as $row)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($row->options->product_image)}}" alt="" width="100px" height="70px"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>{{$row->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{url('/updatecartitem')}}" method="post">
										@csrf
										<input class="cart_quantity_input" type="text" name="qty" value="{{$row->qty}}" autocomplete="off" size="1">
										<input type="hidden" name="rowid" value="{{$row->rowId}}">
										<button class="btn btn-sm btn-default" type="submit">Update</button>
									</form>									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$row->total}} TK</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('/deletecartitem/'. $row->rowId)}}" id="delete"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-md-offset-2">
					<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
							<li>Eco Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							   @php
								$customer = Session::get('customer');
								@endphp
                                @if($customer != NULL)
							<a class="btn btn-default check_out" href="{{url('/checkout')}}">Check Out</a>
                                @else
							<a class="btn btn-default check_out" href="{{url('/log_sign')}}">Check Out</a>
                                @endif
					</div>
					<h3>payment Method</h3>
					<form action="{{url('/order_place')}}" method="post">
						<input type="radio" name="payment_gateway" value="handcash">Handcash <br>
						<input type="radio" name="payment_gateway" value="paypal">Paypal <br>
						<input type="radio" name="payment_gateway" value="bkash">Bkash <br>
						<input type="submit" value="Done" class="btn btn-default check_out">
					</form>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection