<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Login</title>
	<link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">


</head>


<body>


	<!-- @foreach (['danger', 'warning', 'success', 'info'] as $msg)
	@if(Session::has('alert-' . $msg))
	<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
	@endif
	@endforeach -->

	@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

	<section id="form">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
						<h2>Login to your account</h2>
						<form method="POST" action="{{url('/Application/Form')}}">
							@csrf
							<input type="email" placeholder="Email" name="email" />
							<input type="password" placeholder="Passoward" name="password" />

							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div>
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>



				<div class="flash-message">

				</div>
				<div class="col-sm-4">
					<div class="signup-form">
						<h2>New User Signup!</h2>
						<form method="POST" action="{{route('register')}}">
							@csrf
							<input type="text" placeholder="Full Name" name="name" required="" />
							<input type="email" placeholder="Email Address" name="email" required="" />
							<input type="password" placeholder="Password" name="password" required="" />
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>







</body>

</html>