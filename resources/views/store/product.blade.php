@extends('layouts.main')
@section('content')
<!-- page-title -->
<section class="page-title centred">
    <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>{{$product->name}}</h1>
            <ul class="bread-crumb clearfix">
                <li><i class="flaticon-home-1"></i><a href="{{route('welcome')}}">Home</a></li>
                <li>Services Details</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->

<!-- product-details -->
<section class="product-details product-details-1">
    <div class="auto-container">
        <div class="product-details-content">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <figure class="product-image">
                        <img src="{{asset('uploads/products/' . $product->image)}}" alt="">
                        <a href="{{asset('uploads/products/' . $product->image)}}" class="lightbox-image"><i
                                class="flaticon-search-2"></i></a>
                    </figure>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="product-info">
                        <h3>{{$product->name}}</h3>
                        <div class="text">
                            <p>{{$product->short_description}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="product-discription">
            <div class="tabs-box">
                <div class="tab-btn-box">
                    <ul class="tab-btns tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#tab-1">Description</li>
                    </ul>
                </div>
                <div class="tabs-content">
                    <div class="tab active-tab" id="tab-1">
                        <div class="text">
                            <p>{{$product->description}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function validateQuantity(input) {
        const currentValue = parseInt(input.value, 10);
        if (currentValue < 1 || isNaN(currentValue)) {
            input.value = 1;
        }
    }
</script>

@endsection