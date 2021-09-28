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


     @foreach (['danger', 'warning', 'success', 'info'] as $msg)
	@if(Session::has('alert-' . $msg))
	<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
	@endif
	@endforeach

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
                        <form method="POST" action="{{url('/employee_page')}}">
                            @csrf
                            <input type="email" placeholder="Email" name="employee_email" />
                            <input type="password" placeholder="Passoward" name="employee_password" />
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div>
                </div>


    </section>



</body>

</html>
