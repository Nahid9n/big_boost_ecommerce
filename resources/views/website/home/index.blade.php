@extends('website.layout.app')
@section('title','Home Page')

@section('body')

    <!-- tab section start -->
    <section class="section-b-space tab-layout1 ratio_square">
        <div class="theme-tab">
            <div class="drop-shadow">
                <div class="left-shadow">
                    <img src="{{asset('/')}}website/assets/images/left.png" alt="" class=" img-fluid">
                </div>
                <div class="right-shadow">
                    <img src="{{asset('/')}}website/assets/images/right.png" alt="" class=" img-fluid">
                </div>
            </div>
            <ul class="tabs">
                <li class="current">
                    <a href="tab-2">on sale</a>
                </li>
            </ul>
            <div class="tab-content-cls">
                <div id="tab-2" class="tab-content active default" >
                    <div class="container">
                        <div class="row border-row1">
                            @foreach($products as $product)
                            <div class="col-lg-2 col-sm-4 col-6 p-0">
                                <form action="{{route('cart.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="product-box">
                                        <div class="img-block">
                                            <a href="{{route('product.details',['id'=>$product->id])}}"><img src="{{asset($product->image)}}" class=" img-fluid bg-img" alt=""></a>
                                            <div class="cart-details">
                                                <button title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></button>
                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view{{$product->id}}"  title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                                <a href="compare.html"  title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="add-btn">
                                                <a href="javascript:void(0)" class="btn btn-outline addcart-box" tabindex="0">quick shop</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#"><h6>{{$product->name}}</h6></a>
                                            <input type="text" name="name" value="{{$product->name}}" readonly hidden>
                                            <input type="text" name="id" value="{{$product->id}}" readonly hidden>
                                            <input type="text" name="price" value="{{$product->selling_price}}" readonly hidden>
                                            <h5>{{$product->selling_price}}.Tk</h5>
                                        </div>
                                        <div class="addtocart_box">
                                            <div class="addtocart_detail">
                                                <div>
                                                    <div class="color">
                                                        <h5>color</h5>
                                                        <ul class="color-variant">
                                                            @foreach($product->colors as $key => $color)
                                                                <li class="rounded-circle p-1" style="background-color: {{$color->color->code}}">
                                                                    <label for="color"><input class="p-3 text-center" type="radio" id="color" name="color" {{ $key == 0 ? 'checked' : '' }} style="width: 20px; height: 15px;" value="{{$color->color->name}}"></label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="size">
                                                        <h5>size</h5>
                                                        <ul class="size-box">
                                                            @foreach($product->sizes as $size)
                                                                <li class="">{{$size->size->code}}
                                                                    <label for="size"><input class="p-3 text-center" type="radio" id="size" name="size" {{ $key == 0 ? 'checked' : '' }} style="width: 20px; height: 15px;" value="{{$size->size->name}}"></label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <h6 class="product-title">quantity:</h6>
                                                    <div class="qty-box">
                                                        <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                                            <input type="text" name="qty" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                                                    </div>
                                                    <div class="addtocart_btn">
                                                        <button type="submit"  data-bs-toggle="modal" class="closeCartbox btn btn-success" data-bs-target="#addtocart" tabindex="0">add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="close-cart">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tab section start -->

    <!-- feature section start -->
    @include('website.layout.feature')
    <!-- feature section end -->

    <!-- banner section start -->
    @include('website.layout.banner')
    <!-- banner section start -->

    <!-- Category section start -->
    <section class="category no-arrow">
        <div class="container">
            <div class="category-6">
                <div>
                    <div class="category-block">
                        <img src="{{asset('/')}}website/assets/images/category/layout-1/fashion.png" alt="">
                        <div class="category-content">
                            <h6>20% off</h6>
                            <h5>fashion</h5>
                            <a href="#" class="btn btn-solid btn-solid-sm">view more</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="category-block">
                        <img src="{{asset('/')}}website/assets/images/category/layout-1/mobile.png" alt="">
                        <div class="category-content">
                            <h6>-10% off</h6>
                            <h5>mobile</h5>
                            <a href="#" class="btn btn-solid btn-solid-sm">view more</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="category-block">
                        <img src="{{asset('/')}}website/assets/images/category/layout-1/furniture.png" alt="">
                        <div class="category-content">
                            <h6>30% off</h6>
                            <h5>furniture</h5>
                            <a href="#" class="btn btn-solid btn-solid-sm">view more</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="category-block">
                        <img src="{{asset('/')}}website/assets/images/category/layout-1/light.png" alt="">
                        <div class="category-content">
                            <h6>sale</h6>
                            <h5>light</h5>
                            <a href="#" class="btn btn-solid btn-solid-sm">view more</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="category-block">
                        <img src="{{asset('/')}}website/assets/images/category/layout-1/bag.png" alt="">
                        <div class="category-content">
                            <h6>-5% off</h6>
                            <h5>bag</h5>
                            <a href="#" class="btn btn-solid btn-solid-sm">view more</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="category-block">
                        <img src="{{asset('/')}}website/assets/images/category/layout-1/razer.png" alt="">
                        <div class="category-content">
                            <h6>$99</h6>
                            <h5>razer</h5>
                            <a href="#" class="btn btn-solid btn-solid-sm">view more</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="category-block">
                        <img src="{{asset('/')}}website/assets/images/category/layout-1/razer.png" alt="">
                        <div class="category-content">
                            <h6>$99</h6>
                            <h5>razer</h5>
                            <a href="#" class="btn btn-solid btn-solid-sm">view more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category section end -->


    <!-- Category banner section start -->
    <section class="ratio_45">
        <div class="container">
            <div class="row partition-3">
                <div class="col-md-4">
                    <a href="#">
                        <div class="collection-banner p-left">
                            <div class="img-part">
                                <img src="{{asset('/')}}website/assets/images/banner/1.jpg" class=" img-fluid bg-img" alt="">
                            </div>
                            <div class="contain-banner banner-3">
                                <div>
                                    <div class="banner-deal">
                                        <h6>save 10% off</h6>
                                    </div>
                                    <h3>leather bag</h3>
                                    <h6>shop now</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="collection-banner p-left">
                            <div class="img-part">
                                <img src="{{asset('/')}}website/assets/images/banner/2.jpg" class=" img-fluid bg-img" alt="">
                            </div>
                            <div class="contain-banner banner-3">
                                <div>
                                    <div class="banner-deal">
                                        <h6>-50% off</h6>
                                    </div>
                                    <h3>sports shoes</h3>
                                    <h6>shop now</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="collection-banner p-left">
                            <div class="img-part">
                                <img src="{{asset('/')}}website/assets/images/banner/3.jpg" class=" img-fluid bg-img" alt="">
                            </div>
                            <div class="contain-banner banner-3">
                                <div>
                                    <div class="banner-deal">
                                        <h6>free shipping</h6>
                                    </div>
                                    <h3>mac book</h3>
                                    <h6>shop now</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Category banner section end -->


    <!-- Product slider section start -->
    <section class="section-b-space slider-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 ratio_asos">
                    <div class="deal-box">
                        <div >
                            <h2 class="title">today's deal</h2>
                            <div class="slide-1 border-0">
                                <div>
                                    <div class="product">
                                        <div>
                                            <a href="#"><img src="{{asset('/')}}website/assets/images/product/p-1.jpg" class=" img-fluid bg-img" alt=""></a>
                                        </div>
                                        <div>
                                            <div class="timer">
                                                <p id="demo"></p>
                                            </div>
                                            <a href="#"><p>Use Lorem Ipsum as their default model text,</p></a>
                                            <h5>$63.00 <del>$70.55</del></h5>
                                            <div class="add-btn">
                                                <a href="javascript:void(0)" class="btn btn-outline" tabindex="0">buy now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="product">
                                        <div>
                                            <img src="{{asset('/')}}website/assets/images/product/p-1.jpg" class=" img-fluid bg-img" alt="">
                                        </div>
                                        <div class="timer">
                                            <p id="demo1"></p>
                                        </div>
                                        <a href="#"><p>Use Lorem Ipsum as their default model text,</p></a>
                                        <h5>$63.00 <del>$70.55</del></h5>
                                        <div class="add-btn">
                                            <a href="javascript:void(0)" class="btn btn-outline" tabindex="0">buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 side-banner side-banner1 pe-0 d-none d-xl-block">
                    <a href="#"><img src="{{asset('/')}}website/assets/images/side-banner.jpg" alt="" class=" img-fluid "></a>
                </div>
                <div class="col-xl-6 col-lg-7 ps-0 padding-cls ratio_square">
                    <div class="tab-head">
                        <h2 class="title">last chance to buy</h2>
                    </div>
                    <div class="slider-3">
                        <div>
                            <div class="product-box">
                                <div class="img-block">
                                    <a href="#"><img src="{{asset('/')}}website/assets/images/product/31.jpg" class=" img-fluid bg-img" alt=""></a>
                                    <div class="cart-details">
                                        <button title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></button>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"  title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                        <a href="compare.html"  title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="add-btn">
                                        <a href="javascript:void(0)" class="btn btn-outline addcart-box" tabindex="0">quick shop</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#"><h6>richard mcClintock</h6></a>
                                    <h5>$963.00</h5>
                                </div>
                                <div class="addtocart_box">
                                    <div class="addtocart_detail">
                                        <div>
                                            <div class="color">
                                                <h5>color</h5>
                                                <ul class="color-variant">
                                                    <li class="light-purple active"></li>
                                                    <li class="theme-blue"></li>
                                                    <li class="theme-color"></li>
                                                </ul>
                                            </div>
                                            <div class="size">
                                                <h5>size</h5>
                                                <ul class="size-box">
                                                    <li class="active">xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <div class="addtocart_btn">
                                                <a href="javascript:void(0)"  data-bs-toggle="modal" class="closeCartbox" data-bs-target="#addtocart" tabindex="0">add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="close-cart">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-block">
                                    <a href="#"><img src="{{asset('/')}}website/assets/images/product/1.jpg" class=" img-fluid bg-img" alt=""></a>
                                    <div class="lable-wrapper">
                                        <span class="lable1">new</span>
                                        <span class="lable2">sale</span>
                                    </div>
                                    <div class="cart-details">
                                        <button title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></button>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"  title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                        <a href="compare.html"  title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="add-btn">
                                        <a href="javascript:void(0)" class="btn btn-outline addcart-box" tabindex="0">quick shop</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#"><h6>richard mcClintock</h6></a>
                                    <h5>$963.00</h5>
                                </div>
                                <div class="addtocart_box">
                                    <div class="addtocart_detail">
                                        <div>
                                            <div class="color">
                                                <h5>color</h5>
                                                <ul class="color-variant">
                                                    <li class="light-purple active"></li>
                                                    <li class="theme-blue"></li>
                                                    <li class="theme-color"></li>
                                                </ul>
                                            </div>
                                            <div class="size">
                                                <h5>size</h5>
                                                <ul class="size-box">
                                                    <li class="active">xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <div class="addtocart_btn">
                                                <a href="javascript:void(0)"  data-bs-toggle="modal" class="closeCartbox" data-bs-target="#addtocart" tabindex="0">add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="close-cart">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-box">
                                <div class="img-block">
                                    <a href="#"><img src="{{asset('/')}}website/assets/images/product/29.jpg" class=" img-fluid bg-img" alt=""></a>
                                    <div class="cart-details">
                                        <button title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></button>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"  title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                        <a href="compare.html"  title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="add-btn">
                                        <a href="javascript:void(0)" class="btn btn-outline addcart-box" tabindex="0">quick shop</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#"><h6>richard mcClintock</h6></a>
                                    <h5>$963.00</h5>
                                </div>
                                <div class="addtocart_box">
                                    <div class="addtocart_detail">
                                        <div>
                                            <div class="color">
                                                <h5>color</h5>
                                                <ul class="color-variant">
                                                    <li class="light-purple active"></li>
                                                    <li class="theme-blue"></li>
                                                    <li class="theme-color"></li>
                                                </ul>
                                            </div>
                                            <div class="size">
                                                <h5>size</h5>
                                                <ul class="size-box">
                                                    <li class="active">xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <div class="addtocart_btn">
                                                <a href="javascript:void(0)"  data-bs-toggle="modal" class="closeCartbox" data-bs-target="#addtocart" tabindex="0">add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="close-cart">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-block">
                                    <a href="#"><img src="{{asset('/')}}website/assets/images/product/27.jpg" class=" img-fluid bg-img" alt=""></a>
                                    <div class="cart-details">
                                        <button title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></button>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"  title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                        <a href="compare.html"  title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="add-btn">
                                        <a href="javascript:void(0)" class="btn btn-outline addcart-box" tabindex="0">quick shop</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#"><h6>richard mcClintock</h6></a>
                                    <h5>$963.00</h5>
                                </div>
                                <div class="addtocart_box">
                                    <div class="addtocart_detail">
                                        <div>
                                            <div class="color">
                                                <h5>color</h5>
                                                <ul class="color-variant">
                                                    <li class="light-purple active"></li>
                                                    <li class="theme-blue"></li>
                                                    <li class="theme-color"></li>
                                                </ul>
                                            </div>
                                            <div class="size">
                                                <h5>size</h5>
                                                <ul class="size-box">
                                                    <li class="active">xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <div class="addtocart_btn">
                                                <a href="javascript:void(0)"  data-bs-toggle="modal" class="closeCartbox" data-bs-target="#addtocart" tabindex="0">add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="close-cart">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-box">
                                <div class="img-block">
                                    <a href="#"><img src="{{asset('/')}}website/assets/images/product/25.jpg" class=" img-fluid bg-img" alt=""></a>
                                    <div class="cart-details">
                                        <button title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></button>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"  title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                        <a href="compare.html"  title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="add-btn">
                                        <a href="javascript:void(0)" class="btn btn-outline addcart-box" tabindex="0">quick shop</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#"><h6>richard mcClintock</h6></a>
                                    <h5>$963.00</h5>
                                </div>
                                <div class="addtocart_box">
                                    <div class="addtocart_detail">
                                        <div>
                                            <div class="color">
                                                <h5>color</h5>
                                                <ul class="color-variant">
                                                    <li class="light-purple active"></li>
                                                    <li class="theme-blue"></li>
                                                    <li class="theme-color"></li>
                                                </ul>
                                            </div>
                                            <div class="size">
                                                <h5>size</h5>
                                                <ul class="size-box">
                                                    <li class="active">xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <div class="addtocart_btn">
                                                <a href="javascript:void(0)"  data-bs-toggle="modal" class="closeCartbox" data-bs-target="#addtocart" tabindex="0">add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="close-cart">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-block">
                                    <a href="#"><img src="{{asset('/')}}website/assets/images/product/23.jpg" class=" img-fluid bg-img" alt=""></a>
                                    <div class="cart-details">
                                        <button title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></button>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"  title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                        <a href="compare.html"  title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="add-btn">
                                        <a href="javascript:void(0)" class="btn btn-outline addcart-box" tabindex="0">quick shop</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#"><h6>richard mcClintock</h6></a>
                                    <h5>$963.00</h5>
                                </div>
                                <div class="addtocart_box">
                                    <div class="addtocart_detail">
                                        <div>
                                            <div class="color">
                                                <h5>color</h5>
                                                <ul class="color-variant">
                                                    <li class="light-purple active"></li>
                                                    <li class="theme-blue"></li>
                                                    <li class="theme-color"></li>
                                                </ul>
                                            </div>
                                            <div class="size">
                                                <h5>size</h5>
                                                <ul class="size-box">
                                                    <li class="active">xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <div class="addtocart_btn">
                                                <a href="javascript:void(0)"  data-bs-toggle="modal" class="closeCartbox" data-bs-target="#addtocart" tabindex="0">add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="close-cart">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-box">
                                <div class="img-block">
                                    <a href="#"><img src="{{asset('/')}}website/assets/images/product/21.jpg" class=" img-fluid bg-img" alt=""></a>
                                    <div class="cart-details">
                                        <button title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></button>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"  title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                        <a href="compare.html"  title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="add-btn">
                                        <a href="javascript:void(0)" class="btn btn-outline addcart-box" tabindex="0">quick shop</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#"><h6>richard mcClintock</h6></a>
                                    <h5>$963.00</h5>
                                </div>
                                <div class="addtocart_box">
                                    <div class="addtocart_detail">
                                        <div>
                                            <div class="color">
                                                <h5>color</h5>
                                                <ul class="color-variant">
                                                    <li class="light-purple active"></li>
                                                    <li class="theme-blue"></li>
                                                    <li class="theme-color"></li>
                                                </ul>
                                            </div>
                                            <div class="size">
                                                <h5>size</h5>
                                                <ul class="size-box">
                                                    <li class="active">xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <div class="addtocart_btn">
                                                <a href="javascript:void(0)"  data-bs-toggle="modal" class="closeCartbox" data-bs-target="#addtocart" tabindex="0">add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="close-cart">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-block">
                                    <a href="#"><img src="{{asset('/')}}website/assets/images/product/19.jpg" class=" img-fluid bg-img" alt=""></a>
                                    <div class="cart-details">
                                        <button title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></button>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"  title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                        <a href="compare.html"  title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="add-btn">
                                        <a href="javascript:void(0)" class="btn btn-outline addcart-box" tabindex="0">quick shop</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#"><h6>richard mcClintock</h6></a>
                                    <h5>$963.00</h5>
                                </div>
                                <div class="addtocart_box">
                                    <div class="addtocart_detail">
                                        <div>
                                            <div class="color">
                                                <h5>color</h5>
                                                <ul class="color-variant">
                                                    <li class="light-purple active"></li>
                                                    <li class="theme-blue"></li>
                                                    <li class="theme-color"></li>
                                                </ul>
                                            </div>
                                            <div class="size">
                                                <h5>size</h5>
                                                <ul class="size-box">
                                                    <li class="active">xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <div class="addtocart_btn">
                                                <a href="javascript:void(0)"  data-bs-toggle="modal" class="closeCartbox" data-bs-target="#addtocart" tabindex="0">add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="close-cart">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product slider section end -->


    <!-- banner section start -->
    <section class="section-b-space banner-sec landscape-layout ">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-6 pe-0">
                    <a href="#">
                        <div class="left-banner">
                            <h2>5% off</h2>
                            <img src="{{asset('/')}}website/assets/images/banner/5.png" class=" img-fluid" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-lg-7 col-12 ps-0 order-class">
                    <div class="center-banner">
                        <div class="center">
                            <a href="#"><img src="{{asset('/')}}website/assets/images/banner/4.jpg" alt="" class=" img-fluid"></a>
                        </div>
                        <div class="contain-left">
                            <div>
                                <h4>today</h4>
                                <h4><span>money savers</span></h4>
                            </div>
                        </div>
                        <div class="contain-right">
                            <div>
                                <a href="#"><h6>Richard McClintock</h6></a>
                                <h5>$963.00</h5>
                                <h6><span>sale ending</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="#">
                        <div class="right-banner">
                            <div>
                                <h5>summer sale</h5>
                                <h2>sale</h2>
                                <h6>save 30% off</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section end -->


    <!-- detail section start -->
    <section class="">
        <div class="container">
            <div class="row partition-3">
                <div class="col-xl-4 col-md-6">
                    <div class="blog-box blog-pattern">
                        <div class="blog-white contact">
                            <h5>need help? contact us</h5>
                            <h3>info@bigboost.com</h3>
                            <div class="contact-form">
                                <h5><span>contact us</span></h5>
                                <form class="theme-form">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail1"  placeholder="your name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="number">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="message" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-solid btn-block">send a enquary</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12 order-cls">
                    <div class="blog-box blog-pattern blog">
                        <div class="blog-white">
                            <h2 class="title">success story</h2>
                            <div class="slide-1">
                                <div>
                                    <div class="media">
                                        <a href="#"><img src="{{asset('/')}}website/assets/images/blog/multi-category/4.jpg" class=" img-fluid me-3" alt=""></a>
                                        <div class="media-body blog-info blog-vertical">
                                            <div>
                                                <a href="#"><h5>25 july 2018</h5></a>
                                                <h6>by: admin, 0 comment</h6>
                                                <p>Sometimes on purpose ected humour. dummy text.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a href="#"><img src="{{asset('/')}}website/assets/images/blog/multi-category/5.jpg" class=" img-fluid me-3" alt=""></a>
                                        <div class="media-body blog-info blog-vertical">
                                            <div>
                                                <a href="#"><h5>25 july 2018</h5></a>
                                                <h6>by: admin, 0 comment</h6>
                                                <p>Sometimes on purpose ected humour. dummy text.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a href="#"><img src="{{asset('/')}}website/assets/images/blog/multi-category/6.jpg" class=" img-fluid me-3" alt=""></a>
                                        <div class="media-body blog-info blog-vertical">
                                            <div>
                                                <a href="#"><h5>25 july 2018</h5></a>
                                                <h6>by: admin, 0 comment</h6>
                                                <p>Sometimes on purpose ected humour. dummy text.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="media">
                                        <a href="#"><img src="{{asset('/')}}website/assets/images/blog/multi-category/1.jpg" class=" img-fluid me-3" alt=""></a>
                                        <div class="media-body blog-info blog-vertical">
                                            <div>
                                                <a href="#"><h5>25 july 2018</h5></a>
                                                <h6>by: admin, 0 comment</h6>
                                                <p>Sometimes on purpose ected humour. dummy text.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a href="#"><img src="{{asset('/')}}website/assets/images/blog/multi-category/2.jpg" class=" img-fluid me-3" alt=""></a>
                                        <div class="media-body blog-info blog-vertical">
                                            <div>
                                                <a href="#"><h5>25 july 2018</h5></a>
                                                <h6>by: admin, 0 comment</h6>
                                                <p>Sometimes on purpose ected humour. dummy text.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a href="#"><img src="{{asset('/')}}website/assets/images/blog/multi-category/3.jpg" class=" img-fluid me-3" alt=""></a>
                                        <div class="media-body blog-info blog-vertical">
                                            <div>
                                                <a href="#"><h5>25 july 2018</h5></a>
                                                <h6>by: admin, 0 comment</h6>
                                                <p>Sometimes on purpose ected humour. dummy text.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="blog-box blog-pattern">
                        <div class="blog-white app-white">
                            <h5>download the <span>bigboost app</span></h5>
                            <div class="app-buttons">
                                <a href="#"><img src="{{asset('/')}}website/assets/images/app/app-storw.png" class=" img-fluid" alt=""></a>
                                <a href="#"><img src="{{asset('/')}}website/assets/images/app/play-store.png" class=" img-fluid" alt=""></a>
                            </div>
                            <img src="{{asset('/')}}website/assets/images/app/1.png" class=" img-fluid mobile1" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- detail section end -->


    <!-- logo section start -->
    <section class=" section-b-space logo">
        <div class="container">
            <h2 class="title">trusted brand</h2>
            <div class="logo-4 border-logo">
                <div>
                    <div class="logo-img">
                        <img src="{{asset('/')}}website/assets/images/logo/1.png" class=" img-fluid" alt="">
                    </div>
                    <div class="logo-img">
                        <img src="{{asset('/')}}website/assets/images/logo/2.png" class=" img-fluid" alt="">
                    </div>
                </div>
                <div>
                    <div class="logo-img">
                        <img src="{{asset('/')}}website/assets/images/logo/3.png" class=" img-fluid" alt="">
                    </div>
                    <div class="logo-img">
                        <img src="{{asset('/')}}website/assets/images/logo/4.png" class=" img-fluid" alt="">
                    </div>
                </div>
                <div>
                    <div class="logo-img">
                        <img src="{{asset('/')}}website/assets/images/logo/5.png" class=" img-fluid" alt="">
                    </div>
                    <div class="logo-img">
                        <img src="{{asset('/')}}website/assets/images/logo/6.png" class=" img-fluid" alt="">
                    </div>
                </div>
                <div>
                    <div class="logo-img">
                        <img src="{{asset('/')}}website/assets/images/logo/7.png" class=" img-fluid" alt="">
                    </div>
                    <div class="logo-img">
                        <img src="{{asset('/')}}website/assets/images/logo/8.png" class=" img-fluid" alt="">
                    </div>
                </div>
                <div>
                    <div class="logo-img">
                        <img src="{{asset('/')}}website/assets/images/logo/2.png" class=" img-fluid" alt="">
                    </div>
                    <div class="logo-img">
                        <img src="{{asset('/')}}website/assets/images/logo/3.png" class=" img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- logo section end -->


@endsection
