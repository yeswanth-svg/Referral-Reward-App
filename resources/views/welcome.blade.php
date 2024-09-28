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
                                <h1 style="color:#000000">Refer a Friend</h1>
                                <p style="color:#000000">Invite friends to earn rewards.</p>
                                <div class="btn-box">
                                    <a href="{{route('shop')}}" class="btn btn-dark">Click Here <i
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
                                <h1 style="color:#000000">Refer a Friend</h1>
                                <p style="color:#000000">Invite friends to earn rewards.</p>
                                <div class="btn-box">
                                    <a href="{{route('shop')}}" class="btn btn-dark">Click Here <i
                                            class="flaticon-right-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item"
                            style="background-image: url('assets/constructionsimages/rewardsandachievements1.jpg'); background-size:cover;height:600px; border-radius: 10px;">
                            <div class="pattern-layer"
                                style="background-image: url('assets/images/shape/shape-8.png');"></div>
                            <div class="content-box text-center" style="top:50%
                            ">
                                <h1 style="color:#000000">Credits</h1>
                                <p style="color:#0024FF">Exclusive rewards for our members.</p>
                                <div class="btn-box">
                                    <a href="{{route('shop')}}" class="btn btn-dark">Redeem Now <i
                                            class="flaticon-right-1"></i></a>
                                </div>
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
                        <div class="icon-box"><i class="flaticon-truck"></i></div>
                        <h3><a href="{{route('welcome')}}">Free Shipping</a></h3>
                        <p>Free shipping on oder over $100</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="200ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="flaticon-credit-card"></i></div>
                        <h3><a href="{{route('welcome')}}">Secure Payment</a></h3>
                        <p>We ensure secure payment with PEV</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="400ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="flaticon-24-7"></i></div>
                        <h3><a href="{{route('welcome')}}">Support 24/7</a></h3>
                        <p>Contact us 24 hours a day, 7 days a week</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="600ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="flaticon-undo"></i></div>
                        <h3><a href="{{route('welcome')}}">30 Days Return</a></h3>
                        <p>Simply return it within 30 days for an exchange.</p>
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
            <div class="col-lg-3 col-md-12 col-sm-12 advice-column">
                <div class="advice-block wow fadeInLeft animated animated" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <div class="advice-box centred gray-bg">
                        <h3>Summer 2020</h3>
                        <h2>Exclusive Discount</h2>
                        <div class="price"><span><del>$89.00</del> $49.00</span></div>
                        <figure class="image-box"><img src="{{asset('assets/images/resource/headphone-1.png')}}" alt="">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 shop-column">
                <div class="shop-inner">
                    <div class="tabs-box">
                        <div class="tab-btn-box clearfix">
                            <h2>Top Selling Items</h2>
                        </div>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="tab-1">
                                <div class="row clearfix">
                                    @foreach($products as $product)
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-three">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <img src="{{asset('uploads/products/' . $product->image)}}" alt="">
                                                        <span class="category">New</span>
                                                        <ul class="info-list clearfix">
                                                            <li>
                                                                <!-- make an ajax request to add to cart -->
                                                                <a onclick="addToCart(this)" style="cursor: pointer;"
                                                                    data-id="{{$product->id}}" data-quantity="1"
                                                                    id="addCart">
                                                                    <i class="flaticon-shopping-cart-1"></i>
                                                                </a>
                                                                <span>Add to cart</span>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <div class="lower-content">
                                                        <a
                                                            href="{{route('product', $product->slug)}}">{{$product->name}}</a>
                                                        <span class="price">${{$product->price}}</span>
                                                    </div>
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
    <div class="image-layer" style="background-image: url('assets/constructionsimages/construction4.jpg');background-size:contain;"></div>
    <div class="auto-container">
        <div class="cta-inner centred">
            <h2>Sale Upto 50% Off</h2>
            <p>Welcome to the new range of shaving products from master barber. We have over three decades of
                experience
                in the male grooming industry</p>
            <a href="{{route('shop')}}" class="theme-btn-one">Shop Now<i class="flaticon-right-1"></i></a>
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
                    <span>CEO, Company</span>
                </div>
            </div>
            <div class="testimonial-box">
                <p class="testimonial-text">"A fantastic experience from start to finish!"</p>
                <div class="client-info">
                    <h4>Jane Smith</h4>
                    <span>Marketing Manager, Another Company</span>
                </div>
            </div>
            <div class="testimonial-box">
                <p class="testimonial-text">"Professional and reliable, exceeded our expectations!"</p>
                <div class="client-info">
                    <h4>Sarah Johnson</h4>
                    <span>Project Lead, Some Company</span>
                </div>
            </div>
            <div class="testimonial-box">
                <p class="testimonial-text">"Great team to work with. I would definitely recommend them!"</p>
                <div class="client-info">
                    <h4>Michael Brown</h4>
                    <span>Founder, Startup</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonials-style-two -->>


@endsection