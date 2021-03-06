{{-- <!DOCTYPE html>
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
    <link href="{{ asset('frontend2/css/style_table.css') }}" rel="stylesheet" />





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
                            <li><a href="{{URL::to('/update_profile')}}"><i class="fa fa-cog"></i> Update Profile</a></li>
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

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- core CSS -->
    <link href="{{asset('user_css/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('user_css/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('user_css/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('user_css/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('user_css/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('user_css/css/icomoon.css')}}" rel="stylesheet">
    <link href="{{asset('user_css/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('user_css/css/responsive.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('user_css/images/ico/favicon.ico')}}">
    <link href="{{ asset('frontend2/css/style_table.css') }}" rel="stylesheet" />

    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
</head>
<!--/head-->

<body class="homepage">

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="top-number">
                            <p><i class="fa fa-phone-square"></i> +880 1992 632069</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="social">
                            {{-- <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="{{asset('user_css/images/logo1.png')}}" alt="logo"></a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::is('form') ? 'active':'' }}"><a href="{{URL::to('/form')}}">Home</a></li>
                        <li class="{{ Request::is('view_profile*') ? 'active':'' }}"><a href="{{URL::to('/view_profile/'.Session::get('user_id') )}}">View</a></li>
                        <li class="{{ Request::is('update_profile') ? 'active':'' }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{URL::to('/update_profile')}}"">Update Profile</a></li>
                                <li><a href="{{URL::to('/user_logout')}}">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>

    </header>

    <section style="margin-top: -25px;">
        @yield('content')
    </section>


    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div id="footer_text" class="col-sm-6">
                    &copy; 2021 <a target="_blank" href="{{URL::to('/form')}}" title="This is a simple website which created by shakib for job exam purpose">Simple Site</a>. All person can use it.
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <script src="{{asset('user_css/js/jquery.js')}}"></script>
    <script src="{{asset('user_css/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('user_css/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('user_css/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('user_css/js/jquery.isotope.min.js')}}"></script>
    <script src="{{asset('user_css/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('script')
</body>

</html>

