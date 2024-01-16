@extends('website.layout.app')
@section('title','Product Details')
@section('body')

    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <form action="{{route('cart.store')}}" method="post">
                    @csrf
                    <div class="row">
                            <div class="col-lg-6">
                                <div class="product-slick">
                                    @foreach($product->productImages as $productImage)
                                        <div><img src="{{asset($productImage->image)}}" alt="" class="img-fluid  image_zoom_cls-0"></div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <div class="col-12 p-0">
                                        <div class="slider-nav">
                                            @foreach($product->productImages as $productImage)
                                                <div><img src="{{asset($productImage->image)}}" alt="" class="img-fluid "></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 rtl-text">
                                <div class="product-right">
                                    <h2>{{$product->name}}</h2>
                                    <input type="number" readonly hidden name="id" value="{{$product->id}}">
                                    <input type="text" readonly hidden name="name" value="{{$product->name}}">
                                    <input type="number" readonly hidden name="price" value="{{$product->selling_price}}">
                                    <h4><del>{{$product->regular_price}}.Tk</del><span>55% off</span></h4>
                                    <h3>{{$product->selling_price}}.Tk</h3>
                                    <ul class="color-variant">
                                        @foreach($product->colors as $key => $color)
                                            <li class="rounded-circle p-1" style="background-color: {{$color->color->code}}">
                                                <label for="color"><input class="p-3 text-center" type="radio" id="color" name="color" {{ $key == 0 ? 'checked' : '' }} style="width: 20px; height: 15px;" value="{{$color->color->name}}"></label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="product-description border-product">
                                        <h6 class="product-title size-text">select size <span><a href="#" data-bs-toggle="modal" data-bs-target="#sizemodal">size chart</a></span></h6>
                                        <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Sheer Straight Kurta</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body"><img src="../assets/images/size-chart.jpg" alt="" class="img-fluid "></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="size-box">
                                            <ul>
                                                @foreach($product->sizes as $key1 => $size)
                                                    <li class="">{{$size->size->code}}
                                                        <label for="size"><input class="rounded-circle text-center" type="radio" id="size" name="size" {{ $key1 == 0 ? 'checked' : '' }} style="width: 20px; height: 15px;" value="{{$size->size->name}}"></label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <h6 class="product-title">quantity</h6>
                                        <div class="qty-box">
                                            <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                                <input type="text" name="qty" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                                        </div>
                                    </div>
                                    <div class="product-buttons">
                                        <button type="submit" data-bs-toggle="modal" data-bs-target="#addtocart" class="btn btn-solid">add to cart</button>
                                        <button type="submit" class="btn btn-solid">buy now</button>
                                    </div>
                                    <div class="border-product">
                                        <h6 class="product-title">product details</h6>
                                        <p>{{$product->short_description}}</p>
                                        <p><span class="fw-bold">Brand :</span> {{$product->brand->name}}</p>
                                        <p><span class="fw-bold">Category :</span> {{$product->category->name}}</p>
                                    </div>
                                    <div class="border-product">
                                        <h6 class="product-title">share it</h6>
                                        <div class="product-icon">
                                            <ul class="product-social">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                            </ul>
                                            <form class="d-inline-block">
                                                <button class="wishlist-btn"><i class="fa fa-heart"></i><span class="title-font">Add To WishList</span></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="border-product">
                                        <h6 class="product-title">Time Reminder</h6>
                                        <div class="timer">
                                            <p id="demo"><span>25 <span class="padding-l">:</span> <span class="timer-cal">Days</span> </span><span>22 <span class="padding-l">:</span> <span class="timer-cal">Hrs</span> </span><span>13 <span class="padding-l">:</span> <span class="timer-cal">Min</span> </span><span>57 <span class="timer-cal">Sec</span></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- product-tab starts -->
    <section class="tab-product m-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-selected="true">Description</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-selected="false">Details</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-selected="false">Video</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="review-top-tab" data-bs-toggle="tab" href="#top-review" role="tab" aria-selected="false">Write Review</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                            <p>{!! $product->long_description !!}</p>
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <div class="single-product-tables">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>Febric</td>
                                        <td>Chiffon</td>
                                    </tr>
                                    <tr>
                                        <td>Color</td>
                                        <td>Red</td>
                                    </tr>
                                    <tr>
                                        <td>Material</td>
                                        <td>Crepe printed</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>Length</td>
                                        <td>50 Inches</td>
                                    </tr>
                                    <tr>
                                        <td>Size</td>
                                        <td>S, M, L .XXL</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                            <div class="mt-4 text-center">
                                <iframe width="560" height="315" src="../../../www.youtube.com/embed/BUWzX78Ye_8.html" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                            <form class="theme-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="media">
                                            <label>Rating</label>
                                            <div class="media-body ms-3">
                                                <div class="rating three-star"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter Your name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control"  placeholder="Email" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="review">Review Title</label>
                                        <input type="text" class="form-control"  placeholder="Enter your Review Subjects" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="review">Review Title</label>
                                        <textarea class="form-control" placeholder="Wrire Your Testimonial Here" id="exampleFormControlTextarea1" rows="6"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-solid" type="submit">Submit YOur Review</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-tab ends -->


    <!-- product section start -->
    <section class="section-b-space ratio_square product-related">
        <div class="container">
            <div class="row">
                <div class="col-12 product-related">
                    <h2 class="title pt-0">related products</h2></div>
            </div>
            <div class="slide-6">
                @foreach($relatedProducts as $product)
                <div class="">
                    <div class="product-box">
                        <div class="img-block">
                            <a href="#"><img src="{{asset($product->image)}}" class=" img-fluid bg-img" alt=""></a>
                            <div class="cart-details">
                                <button tabindex="0" class="addcart-box" title="Quick shop"><i class="ti-shopping-cart" ></i></button>
                                <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view"  title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                <a href="compare.html"  title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#"><h6>{{$product->name}}</h6></a>
                            <h5>{{$product->selling_price}}</h5>
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
                @endforeach
            </div>
        </div>
    </section>
    <!-- product section end -->

@endsection
