@extends('frontend.front_layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<idv class="shopper-informations">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form action="{{url('/shipping_details')}}" method="post">
									@csrf
									<input type="email" placeholder="Email*" required="" name="shipping_email">
									<input type="text" placeholder="First Name *" required="" name="shipping_first_name">
									<input type="text" placeholder="Last Name *" required="" name="shipping_last_name">
									<input type="text" placeholder="Mobile Number" required="" name="shipping_mobile_number">
									<input type="text" placeholder="Address" required="" name="shipping_address">
									<input type="text" placeholder="City" required="" name="shipping_city">
									<input type="submit" value="submit" class="btn btn-block btn-default">
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection