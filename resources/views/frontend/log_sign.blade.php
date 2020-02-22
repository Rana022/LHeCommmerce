@extends('frontend.front_layout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{url('/customer_login')}}" method="post">
							@csrf
							<input type="email" placeholder="Email Address" name="log_email" />
							<input type="password" placeholder="Password" name="log_pass" />
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{url('/user_registration')}}" method="post">
							@csrf
							<input type="text" placeholder="Name" required="" name="sign_name" />
							<input type="email" placeholder="Email Address" required="" name="sign_email" />
							<input type="text" placeholder="Phone Number" required="" name="sign_number" />
							<input type="password" placeholder="Password" required="" name="sign_pass" />
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection