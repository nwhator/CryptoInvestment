<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{$general->web_name}} | @yield('title') </title>
    <link rel=icon href="{{asset('images/logo/favicon.png')}}" sizes="20x20" type="image/png">

    <!-- Vendor Stylesheet -->
    <link rel="stylesheet" href="{{asset('user/css/vendor.css')}}">
    <!-- animate -->
    <link rel="stylesheet" href="{{asset('user/css/animate.css')}}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('user/css/owl.carousel.min.css')}}">
    <!-- lineawesome -->
    <link rel="stylesheet" href="{{asset('user/css/line-awesome.min.css')}}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('user/css/magnific-popup.css')}}">
    <!-- signin Stylesheet -->
    <link rel="stylesheet" href="{{asset('user/css/signin.css')}}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <!-- responsive Stylesheet -->
    <link rel="stylesheet" href="{{asset('user/css/responsive.css')}}">
    <link href="{{asset('admin/plugins/bootoast/src/bootoast.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user/css/custom.css')}}">
    <link href="{{asset('user/css/color.php?color='.$general->color_code)}}" rel="stylesheet">
    @yield('style')
    <script src="//code.jivosite.com/widget/j0A5XML4v5" async></script>
</head>

<body>

<!-- preloader area start -->
<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->


<!-- navbar start -->
<div class="navbar-area navbar-area-2">
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 text-sm-left text-center">
                    <ul class="topbar-left">
                        <li class="topbar-single-info"><i class="fa fa-envelope"></i>{{$general->contact_email}}</li>
                        <li class="topbar-single-info ml-3 ml-lg-0"><i class="fa fa-phone"></i>{{$general->contact_phone}}</li>
                    </ul>
                </div>
                <div class="col-sm-5 text-sm-right text-center">
                    <ul class="topbar-right float-md-right">
                        @foreach($social as $data)
                        <li class="topbar-single-info topbar-social-icon"><a href="{{$data->link}}" target="_blank"><i class="fa fa-{{$data->icon}}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-area navbar-expand-lg nav-transparent">
        <div class="container nav-container nav-white">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#investon_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo">
                <a href="{{url('/')}}"> <img src="{{asset('images/logo/logo.png')}}" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse" id="investon_main_menu">
                <ul class="navbar-nav menu-open">
                    @auth
                        <li>
                            <a href="{{route('home')}}">{{__('Dashboard')}}</a>
                        </li>

                        <li class="menu-item-has-children">
                            <a href="#">{{__('Deposit')}} <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{{route('users.showDepositMethods')}}"><i class="fa fa-long-arrow-right"></i>{{__('Add Deposit')}}</a></li>
                                <li><a href="{{route('user.deposit.log')}}"><i class="fa fa-long-arrow-right"></i>{{__('Deposit Log')}}</a></li>
                            </ul>
                        </li>


                        <li class="menu-item-has-children">
                            <a href="#">{{__('Investment')}} <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{{route('invest.index')}}"><i class="fa fa-long-arrow-right"></i>{{__('Investment Plan')}}</a></li>
                                <li><a href="{{route('invest.log')}}"><i class="fa fa-long-arrow-right"></i>{{__('Invest Log')}}</a></li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children">
                            <a href="#">{{__('Transaction')}} <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{{route('user.ref.index')}}"><i class="fa fa-long-arrow-right"></i>{{__('My Referral Tree')}}</a></li>
                                <li><a href="{{route('fund.transfer')}}"><i class="fa fa-long-arrow-right"></i>{{('Fund Transfer')}}</a></li>
                                <li><a href="{{route('transaction.log')}}"><i class="fa fa-long-arrow-right"></i>{{__('Transaction Log')}}</a></li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children">
                            <a href="#">{{__('Withdraw')}} <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{{route('user.withdraw.method')}}"><i class="fa fa-long-arrow-right"></i>{{__('Withdraw')}}</a></li>
                                <li><a href="{{route('user.withdraw.log')}}"><i class="fa fa-long-arrow-right"></i>{{__('Withdraw Log')}}</a></li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children">
                            <a href="#">{{split_name(auth()->user()->name)[0]}} <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{{route('profile.index')}}"><i class="fa fa-long-arrow-right"></i>{{__('Profile')}}</a></li>
                                <li><a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{route('logout')}}"><i class="fa fa-long-arrow-right"></i>{{__('Logout')}}</a></li>
                            </ul>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display-none">
                            @csrf
                        </form>
                        @else
                        <li>
                            <a href="{{url('/')}}">{{__('Home')}}</a>
                        </li>
                        @foreach($frontMenu as $data)
                            <li>
                                <a href="{{route('single.page',['class' => 'Menu', 'id' =>$data->id])}}">{{$data->title}}</a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{route('news.index')}}">{{__('News')}}</a>
                        </li>
                        <li>
                            <a href="{{route('contacts.index')}}">{{__('Contact')}}</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">{{__('Account')}} <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{{route('register')}}"><i class="fa fa-long-arrow-right"></i>{{__('Sign Up')}}</a></li>
                                <li><a href="{{route('login')}}"><i class="fa fa-long-arrow-right"></i>{{__('Sign In')}}</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- navbar end -->

@if(request()->route()->uri() == '/')
<!-- banner area start -->
<div class="banner-area-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="banner-inner text-center text-lg-left">
                    <p class="subtitle">{{$general->banner_header}}</p>
                    <h2>{{$general->banner_body}}</h2>
                    <p>{{$general->banner_footer}}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 align-self-center banner-thumb-wrap">
                <div class="banner-thumb item-bounce text-center d-none d-lg-block">
                    <img src="{{asset('images/banner/front.png')}}" alt="banner">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner area end -->
    @else

    <!-- page-title area start -->
    <div class="page-title-area mg-bottom-105 bref-bg" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h3 class="title"> @yield('title') </h3>
                </div>
                <div class="col-sm-6 text-center align-self-center">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url()->previous()}}">{{__('Back')}}</a></li>
                        @isset($page_title)
                        <li class="breadcrumb-item active" aria-current="page">{{$page_title}}</li>
                        @endisset
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title area end -->

@endif

@yield('content')

<!-- footer area start -->
<footer class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer-widget widget widget-about-us">
                        <p class="footer-menu">{{$general->footer_text}}</p>
                        <br>
                        <p class="footer-menu">{{$general->footer_text2}}</p>
                    </div>
                </div>                           
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="copyright">{{$general->copyright_text}}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->


<!-- vendor js here -->
<script src="{{asset('user/js/vendor.js')}}"></script>
<!--signin -->
<script src="{{asset('user/js/signin.js')}}"></script>
<!--coundown timer JS-->
<script src="{{asset('user/js/countdown-timer.js')}}"></script>
<!-- magnific popup -->
<script src="{{asset('user/js/jquery.magnific-popup.min.js')}}"></script>
<!-- counterup -->
<script src="{{asset('user/js/jquery.counterup.min.js')}}"></script>
<!-- waypoint -->
<script src="{{asset('user/js/jquery.waypoints.js')}}"></script>
<!-- main js  -->
<script src="{{asset('user/js/main.js')}}"></script>

<script src="{{asset('admin/plugins/bootoast/dist/bootoast.min.js')}}"></script>

@yield('script')

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            bootoast.toast({
                message: '{{ $error }}',
                type: 'warning',
                icon:'exclamation-sign',
                position:'top',
            });
        </script>
    @endforeach
@endif

@if(session()->has('success'))
    <script>
        bootoast.toast({
            message: '{{ session()->get('success') }}',
            type: 'success',
            position:'top',
        });
    </script>
@endif

@if(session()->has('alert'))
    <script>
        bootoast.toast({
            message: '{{ session()->get('alert') }}',
            type: 'danger',
            position:'top',
        });
    </script>
@endif
</body>

</html>
