@extends('website.layout.app')
@section('title','your cart page')
@section('body')

    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            <form action="{{route('cart.update-Product')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        @if(Cart::content()->count())
                        <table class="table cart-table table-responsive-xs striped-table">
                            <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">total</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>
                            @php($sum = 0)
                            @php($subtotal = 0)
                            @foreach(Cart::content() as $key=> $item)
                                <tbody>
                                <tr>
                                    <td>
                                        <a href="#"><img src="{{asset($item->options->image)}}" alt=""></a>
                                    </td>
                                    <td><a href="{{route('product.details',['id'=>$item->id])}}">{{$item->name}}</a>
                                        <p>Color : {{$item->options->color}}</p>
                                        <p>Size : {{$item->options->size}}</p>
                                        <div class="mobile-cart-content row">
                                            <div class="col-xs-3">
                                                <div class="qty-box">
                                                    <div class="input-group">
                                                        <input type="number" min="1" name="data[{{$key}}][qty]" class="form-control input-number" value="{{$item->qty}}">
                                                        <input hidden type="text" name="data[{{$key}}][rowId]" class="form-control input-number" value="{{$item->rowId}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <h2 class="td-color">{{$item->price}}.Tk</h2></div>
                                            <div class="col-xs-3">
                                                <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a></h2></div>
                                        </div>
                                    </td>
                                    <td>
                                        <h2>{{$item->price}}.Tk</h2>
                                    </td>
                                    <td>
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="number" min="1" name="data[{{$key}}][qty]" class="form-control input-number" value="{{$item->qty}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td><h2 class="td-color">{{$subtotal = $item->subtotal}}</h2></td>
                                    <td><a href="{{route('cart.delete',['rowId'=>$item->rowId])}}" class="icon btn btn-danger rounded-circle"><i class="ti-close text-white"></i></a></td>
                                </tr>
                                </tbody>
                                @php($sum = $sum + $subtotal)
                            @endforeach
                        </table>
                        <table class="table cart-table table-responsive-md">
                            <tfoot>
                            <tr>
                                <td>Sub Total :</td>
                                <td><h2>{{$sum ?? '0'}}.Tk</h2></td>
                            </tr>
                            <tr>
                                <td>Tax :</td>
                                <td><h2>{{$tax = $subtotal * 0.05}}.Tk</h2></td>
                            </tr>
                            <tr>
                                <td>Shipping Cost :</td>
                                <td>
                                    <h2>{{$shipping = 100}}.Tk</h2></td>
                            </tr>
                            <tr>
                                <td>total price :</td>
                                <td>
                                    <h2>{{$sum+$tax+$shipping}}.Tk</h2></td>
                            </tr>
                            </tfoot>
                        </table>
                        @else
                        <div class="">
                            <table class="table cart-table table-responsive-xs striped-table">
                                <thead>
                                <tr class="table-head">
                                    <th>Items</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p>No Item</p>
                                        </td>
                                    </tr>
                                    </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row cart-buttons">
                    <div class="col-6">
                        <a href="{{route('product')}}" class="btn btn-solid">continue shopping</a>
                        <button type="submit" class="btn btn-solid">Update Cart</button>
                    </div>
                    <div class="col-6"><a href="#" class="btn btn-solid">check out</a></div>
                </div>
            </form>
        </div>
    </section>
    <!--section end-->

@endsection

