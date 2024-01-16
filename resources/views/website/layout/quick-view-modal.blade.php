
@foreach($products as $product)
    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <form action="{{route('cart.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <div class="quick-view-img"><img src="{{asset($product->image)}}" alt="" class="img-fluid "></div>
                            </div>
                            <div class="col-lg-6 rtl-text">
                                <div class="product-right">
                                    <input type="text" name="name" value="{{$product->name}}" readonly hidden>
                                    <input type="number" name="id" value="{{$product->id}}" readonly hidden>
                                    <h2>{{$product->name}}</h2>
                                    <h3>{{$product->selling_price}}.Tk</h3>
                                    <input hidden type="number" name="price" value="{{$product->selling_price}}" readonly>
                                    <p><span class="fw-bold">Category: </span>{{$product->category->name ?? ''}}</p>
{{--                                    <p><span class="fw-bold">Brand: </span>{{$product->brand->name }}</p>--}}
                                    <div class="border-product">
                                        <h6 class="product-title">product details:</h6>
                                        <p>{{$product->short_description}}</p>
                                    </div>
                                    <div class="product-description border-product">
                                        <h6 class="product-title">color:</h6>
                                        <ul class="color-variant">
                                            @foreach($product->colors as $key => $color)
                                                <li class="rounded-circle p-1" style="background-color: {{$color->color->code}}">
                                                    <label for="color"><input class="p-3 text-center" type="radio" id="color" name="color" {{ $key == 0 ? 'checked' : '' }} style="width: 20px; height: 15px;" value="{{$color->color->name}}"></label>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <h6 class="product-title">size:</h6>
                                        <div class="size-box">
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
                                    </div>
                                    <div class="product-buttons">
                                        <button type="submit" class="btn btn-solid">add to cart</button>
                                        <a href="{{route('product.details',['id'=>$product->id])}}" class="btn btn-solid">view detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach


