<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style2.css')}}" rel="stylesheet">



</head>


<body>

    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">

                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">

                        <ul class="nav navbar-nav">
                            <li><a href="{{URL::to('/form')}}"><i class="fa fa-wpforms"></i> Form</a></li>
                            <li><a href="{{URL::to('/view_profile/'.Session::get('user_id') )}}"><i class="fa fa-eye"></i> View</a></li>
                            <li><a href="{{URL::to('/update_profile' )}}"><i class="fa fa-cog"></i> Update Profile</a></li>
                            <li><a href="{{URL::to('/user_logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <!-- <script src="{{asset('frontend/js/jquery.js')}}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('script')
</body>

</html>