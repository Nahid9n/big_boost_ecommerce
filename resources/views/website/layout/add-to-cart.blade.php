<div id="cart_side" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my cart</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
            <ul class="cart_product">
                @php($sum = 0)
                @foreach(Cart::content() as $item)
                <li>
                    <div class="card text-dark">
                        <div class="card-header">
                            <a href="{{route('product.details',['id'=>$item->id])}}">
                                <img alt="" class="me-3" width="60" height="60" src="{{asset($item->options->image)}}">
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="{{route('product.details',['id'=>$item->id])}}">
                                <p class="text-dark">{{$item->name}}</p>
                            </a>
                            <p>
                                <span class="text-dark">{{$item->qty}} x {{$item->price}} = {{$item->qty * $item->price}}.Tk</span>
                            </p>
                        </div>
                    </div>
                    <div class="close-circle">
                        <a href="{{route('cart.delete',['rowId'=>$item->rowId])}}">
                            <i class="ti-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
                    @php($sum = $sum + $item->subtotal )
                @endforeach
            </ul>
            <ul class="cart_total">
                <li>
                    <div class="total">
                        <h5 class="text-dark">subtotal : <span>{{$sum}}.Tk</span></h5>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="{{route('cart.index')}}" class="btn btn-solid btn-block btn-solid-sm view-cart">view cart</a>
                        <a href="#" class="btn btn-solid btn-solid-sm btn-block checkout">checkout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

