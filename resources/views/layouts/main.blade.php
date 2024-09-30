<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Affiliate System</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/css/custom-preloader.css')}}">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Include FontAwesome for medal icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Stylesheets -->
    <link href="{{asset('assets/css/font-awesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery.bootstrap-touchspin.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/color.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        .item-quantity {
            display: flex;
            align-items: center;
        }

        .quantity-input {
            width: 50px;
            height: 50px;
            margin: 0 5px;
            flex: 1;
        }
    </style>
</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">
        <div class="loadingio-spinner-spinner-fp2tsfk6ols">
            <div class="custom-preloader"></div>
        </div>
        <!-- main header -->
        <header class="main-header style-four">
            <div class="header-upper">
                <div class="large-container">
                    <div class="upper-inner">
                        <!-- <figure class="logo-box"><a href="{{route('welcome')}}"><img
                                    src="{{asset('assets/images/logo.png')}}" alt=""></a></figure> -->
                        <h3 class="text-dark fs-1 fw-bolder">D2D Partner</h3>
                        <div class="menu-area">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="{{request()->route()->getName() === 'welcome' ? 'current' : ''}}"><a
                                                href="{{route('welcome')}}">Home</a></li>
                                        <li class="{{request()->route()->getName() === 'services' ? 'current' : ''}}"><a
                                                href="{{route('shop')}}">Services<span>Hot</span></a></li>
                                        <li class="{{request()->route()->getName() === 'gallery' ? 'current' : ''}}"><a
                                                href="{{route('user.gallery')}}">Gallery</a></li>

                                        <li><a href="">Contact</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <ul class="menu-right-content clearfix">
                            <li><a href="{{route('login')}}">Login / Register</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- <div class="header-lower">
                <div class="large-container">
                    <div class="outer-box clearfix">
                        <div class="search-info pull-right">
                            <form action="" method="post" class="search-form">
                                <div class="form-group">
                                    <input type="search" name="search-field" placeholder="Search Product..." required="">
                                    <button type="submit"><i class="flaticon-search"></i><span>Search</span></button>
                                </div>
                            </form>
                            <div class="select-box">
                                <select class="wide">
                                   <option data-display="All Categories">All Categories</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box clearfix">
                        <div class="logo-box pull-left">
                            <!-- <figure class="logo"><a href="{{route('welcome')}}"><img
                                        src="{{asset('assets/images/small-logo.png')}}" alt=""></a></figure> -->
                            <h3 class="text-dark fw-bolder mt-4">D2D Partner</h3>
                        </div>
                        <div class="menu-area pull-right">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{route('welcome')}}"><img src="{{asset('assets/images/logo-2.png')}}"
                            alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="{{route('welcome')}}"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="{{route('welcome')}}"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="{{route('welcome')}}"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="{{route('welcome')}}"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="{{route('welcome')}}"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->

        @yield('content')

        <!-- main-footer -->
        <footer class="main-footer light">
            <div class="footer-top">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 big-column">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
                                    <div class="footer-widget logo-widget">
                                        <h3 class="text-light fs-1 fw-bolder">D2D Partner</h3>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
                                    <div class="footer-widget links-widget">
                                        <div class="widget-title">
                                            <h3>Menu</h3>
                                        </div>
                                        <div class="widget-content">
                                            <ul class="links-list clearfix">
                                                <li><a href="{{route('welcome')}}">Home</a></li>
                                                <li><a href="{{route('welcome')}}">Services</a></li>
                                                <li><a href="{{route('welcome')}}">Gallery</a></li>
                                                <!-- <li><a href="{{route('welcome')}}"></a></li> -->
                                                <li><a href="{{route('welcome')}}">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 big-column">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget contact-widget">
                                        <div class="widget-title">
                                            <h3>Contact</h3>
                                        </div>
                                        <ul class="info-list clearfix">
                                            <li><i class="flaticon-maps-and-flags"></i>4708 Ruecker Wall, Kassandratown,
                                                HI</li>
                                            <li><i class="flaticon-phone-ringing"></i><a href="tel:23055873407">+2(305)
                                                    587-3407</a></li>
                                            <li><i class="flaticon-email"></i><a
                                                    href="mailto:info@example.com">info@example.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget newsletter-widget">
                                        <div class="widget-title">
                                            <h3>Newsletter</h3>
                                        </div>
                                        <div class="widget-content">
                                            <p>4708 Ruecker Wall, Kassandratown, HI 97729</p>
                                            <form action="" method="post" class="newsletter-form">
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Enter your email"
                                                        required="">
                                                    <button type="submit" class="theme-btn-three">Subscribe</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container clearfix">
                    <div class="copyright text-center">
                        <ul class="footer-social clearfix">
                            <li><a href="{{route('welcome')}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{route('welcome')}}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{route('welcome')}}"><i class="fab fa-vimeo-v"></i></a></li>
                            <li><a href="{{route('welcome')}}"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                        <p><a href="{{route('welcome')}}">d2dPartner</a> &copy; 2024 All Right Reserved</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->


        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-long-arrow-alt-up"></i>
        </button>
    </div>
    <script>
        $(window).on('load', function () {
            // Hide the preloader
            $('.loadingio-spinner-spinner-fp2tsfk6ols').fadeOut('slow');
        });
    </script>

    <!-- jequery plugins -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.js')}}"></script>
    <script src="{{asset('assets/js/wow.js')}}"></script>
    <script src="{{asset('assets/js/validation.js')}}"></script>
    <script src="{{asset('assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('assets/js/TweenMax.min.js')}}"></script>
    <script src="{{asset('assets/js/appear.js')}}"></script>
    <script src="{{asset('assets/js/scrollbar.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.js')}}"></script>
    <script src="{{asset('assets/js/countdown.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/jquery.bootstrap-touchspin.js')}}"></script>

    <!-- main-js -->
    <script src="{{asset('assets/js/script.js')}}"></script>
</body><!-- End of .page_wrapper -->

</html>