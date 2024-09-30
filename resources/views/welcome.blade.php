@extends('layouts.main')
@section('content')

<!-- banner-section -->
<section class="banner-style-three alternet-2">
    <div class="large-container">
        <div class="row clearfix">
            <!-- Carousel Column First -->
            <div class="col-lg-12 col-md-12 col-sm-12 carousel-column">
                <div class="carousel-content">
                    <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
                        <div class="slide-item"
                            style="background-image: url('assets/constructionsimages/referral1.jpg'); background-size:cover;height:600px; border-radius: 10px;">
                            <div class="pattern-layer"
                                style="background-image: url('assets/images/shape/shape-8.png');"></div>
                            <div class="content-box text-center" style="top:50%
                            ">
                                <h1 style="color:#000000">Become a Partner</h1>
                                <p style="color:#000000">By Simple Registration </p>
                                <div class="btn-box">
                                    <a href="{{route('register')}}" class="btn btn-dark">Become a Partner<i
                                            class="flaticon-right-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item"
                            style="background-image: url('assets/constructionsimages/referalls1.jpg'); background-size:cover;height:600px; border-radius: 10px;">
                            <div class="pattern-layer"
                                style="background-image: url('assets/images/shape/shape-8.png');"></div>
                            <div class="content-box text-center" style="top:50%
                            ">
                                <h1 style="color:#000000">Refer to Clients</h1>
                                <p style="color:#000000">To avail our services</p>
                                <!-- <div class="btn-box">
                                    <a href="{{route('shop')}}" class="btn btn-dark">Click Here <i
                                            class="flaticon-right-1"></i></a>
                                </div> -->
                            </div>
                        </div>
                        <div class="slide-item"
                            style="background-image: url('assets/constructionsimages/rewardsandachievements1.jpg'); background-size:cover;height:600px; border-radius: 10px;">
                            <div class="pattern-layer"
                                style="background-image: url('assets/images/shape/shape-8.png');"></div>
                            <div class="content-box text-center" style="top:50%
                            ">
                                <h1 style="color:#000000">Earn Rewards</h1>
                                <p style="color:#0024FF">Earn Rewards and grow our community</p>
                                <!-- <div class="btn-box">
                                    <a href="{{route('shop')}}" class="btn btn-dark">Redeem Now <i
                                            class="flaticon-right-1"></i></a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- banner-section end -->


<!-- service-style-three -->
<section class="service-style-three">
    <div class="large-container">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="fa fa-user-plus" aria-hidden="true"></i></div>
                        <h3><a href="{{route('register')}}">Become a Partner</a></h3>
                        <p>Become a Partner by simple Registration</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="200ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="fa fa-share-alt"></i></div>
                        <h3><a href="{{route('welcome')}}">Refer to Clients</a></h3>
                        <p>Refere the services to the clients </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="400ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="fa fa-wrench"></i></div>
                        <h3><a href="{{route('welcome')}}">Avail Services</a></h3>
                        <p>Avail the services provided for the growth</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="600ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="fas fa-award"></i></div>
                        <h3><a href="{{route('welcome')}}">Rewards </a></h3>
                        <p>Earn Rewards and grow our community</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service-style-three end -->


<!-- shop-style-three -->
<section class="shop-style-three">
    <div class="large-container">
        <div class="row clearfix">
            <!-- Advice Column (Top Users Table) -->
            <div class="col-lg-3 col-md-12 col-sm-12 advice-column">
                <div class="advice-block wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="advice-box centred gray-bg">
                        <h3>Top Users</h3>
                        <table class="table table-striped">
                            <thead class="text-light fw-bolder fs-3">
                                <tr>
                                    <th>Rank</th>
                                    <th>User</th>
                                    <th>Total Credits</th>
                                </tr>
                            </thead>
                            <tbody class="text-light fw-bolder fs-3">
                                @foreach($top10Users as $index => $user)
                                    <tr>
                                        <td>
                                            @if($index + 1 === 1)
                                                <i class="fas fa-crown text-warning rank-medal"></i>
                                            @elseif($index + 1 === 2)
                                                <i class="fas fa-medal  rank-medal" style="color: #a09a9a !important;"></i>
                                            @elseif($index + 1 === 3)
                                                <i class="fas fa-medal rank-medal" style="color: #CD7F32 !important;"></i>
                                            @else
                                                {{ $index + 1 }}
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->total_credits }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Top Users Table -->
                    <div class="top-users-table">


                    </div>
                </div>
            </div>

            <!-- Shop Column (Owl Carousel for Products) -->
            <div class="col-lg-9 col-md-12 col-sm-12 shop-column">
                <div class="shop-inner">
                    <div class="tabs-box">
                        <div class="tab-btn-box clearfix">
                            <h2>Services</h2>
                        </div>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="tab-1">
                                <div class="products owl-carousel owl-theme">
                                    @foreach($products as $product)
                                        <div class="shop-block-three">
                                            <div class="inner-box">
                                                <figure class="image-box m-2" style="margin: 15px;">
                                                    <img src="{{asset('uploads/products/' . $product->image)}}" alt="">
                                                </figure>
                                                <div class="lower-content">
                                                    <a href="{{route('product', $product->slug)}}">
                                                        {{$product->name}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- shop-style-three -->

<!--leaderboard -->
<section class="leaderboard">
    <div class="container my-5">
        <div class="text-center mb-4">
            <h2 class="font-weight-bold">Top Users</h2>
            <p class="lead">Check out the leaders in our community!</p>
        </div>

        <div class="row">
            @foreach($topUsers as $index => $user)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">
                                <i class="fa-solid fa-coins text-warning"></i>
                                <span class="font-weight-bold">{{ $user->total_credits }} Credits</span>
                            </p>
                            <p class="card-text">Referral Code: <strong>{{ $user->referral_code }}</strong></p>
                            <div class="rank-badge">
                                @if($index === 0)
                                    <i class="fas fa-crown text-warning fa-2x"></i>
                                @elseif($index === 1)
                                    <i class="fas fa-medal text-secondary fa-2x"></i>
                                @elseif($index === 2)
                                    <i class="fas fa-medal text-bronze fa-2x" style="color: #cd7f32;"></i>
                                @else
                                    <span class="badge badge-light">{{ $index + 1 }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- leaderboard -->

<!-- deals-style-two -->
<section class="deals-style-two">
    <div class="large-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                <div class="single-item wow fadeInLeft animated animated" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('assets/constructionsimages/3d.png')}}" alt="">
                        </figure>
                        <h4>Interior Designs</h4>
                        <h2>3D-interior</h2>
                        <div class="timer">
                            <div class="cs-countdown" data-countdown="05/24/2024 05:06:59"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                <div class="single-item wow fadeInRight animated animated" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><img
                                src="{{asset('assets/constructionsimages/2d-removebg-preview.png')}}" alt="">
                        </figure>
                        <h4>Interior Designs</h4>
                        <h2>2D-interior</h2>
                        <div class="timer">
                            <div class="cs-countdown" data-countdown="05/24/2024 05:06:59"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- deals-style-two end -->


<!-- cta-section -->
<section class="cta-section alternet-2" style="margin-top:120px;">
    <div class="image-layer"
        style="background-image: url('assets/constructionsimages/construction4.jpg');background-size:contain;"></div>
    <div class="auto-container">
        <div class="cta-inner centred">
            <!-- <h2>Sale Upto 50% Off</h2>
            <p>Welcome to the new range of shaving products from master barber. We have over three decades of
                experience
                in the male grooming industry</p> -->
            <a href="{{route('register')}}" class="theme-btn-one">Become a Partner<i class="flaticon-right-1"></i></a>
        </div>
    </div>
</section>
<!-- cta-section end -->


<!-- testimonials-style-two -->
<section class="testimonials-style-two sec-pad">
    <div class="large-container">
        <div class="sec-title">
            <h2>What Our Clients Say</h2>
            <p>Excepteur sint occaecat cupidatat non proident</p>
            <span class="separator" style="background-image: url('assets/images/icons/separator-1.png');"></span>
        </div>
        <div class="testimonials-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
            <div class="testimonial-box">
                <p class="testimonial-text">"The service was outstanding! Highly recommend."</p>
                <div class="client-info">
                    <h4>John Doe</h4>
                    <span< /span>
                </div>
            </div>
            <div class="testimonial-box">
                <p class="testimonial-text">"A fantastic experience from start to finish!"</p>
                <div class="client-info">
                    <h4>Jane Smith</h4>
                    <span></span>
                </div>
            </div>
            <div class="testimonial-box">
                <p class="testimonial-text">"Professional and reliable, exceeded our expectations!"</p>
                <div class="client-info">
                    <h4>Sarah Johnson</h4>
                    <span></span>
                </div>
            </div>
            <div class="testimonial-box">
                <p class="testimonial-text">"Great team to work with. I would definitely recommend them!"</p>
                <div class="client-info">
                    <h4>Michael Brown</h4>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonials-style-two -->


@endsection