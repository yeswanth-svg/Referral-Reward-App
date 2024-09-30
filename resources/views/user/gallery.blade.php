@extends('layouts.main')
@section('content')
<section class="page-title centred">
    <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Gallery</h1>
            <ul class="bread-crumb clearfix">
                <li><i class="flaticon-home-1"></i><a href="{{route('welcome')}}">Home</a></li>
                <li>Gallery</li>
            </ul>
        </div>
    </div>
</section>

<!-- shop-page-section -->
<section class="shop-page-section shop-page-1">
    <div class="auto-container">
        <div class="our-shop">
            <div class="row clearfix">
                @foreach($images as $image)
                    <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                        <div class="shop-block-one">
                            <div class="inner-box">

                                <figure class="image-box"
                                    style="box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
                                    <img src="{{asset('uploads/gallery/' . $image->name)}}" alt="">
                                </figure>
                                <div class="lower-content">

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection