@extends('admin.master')
@section('title','Product Detail')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Product Detail Information</h3>
                </div>
                <div class="text-end">
                    <a href="{{route('product.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Product</a>
                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-success my-1 float-end mx-2 text-center">Edit this Product</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 text-center mb-2">
                            <img src="{{asset($product->image)}}" class="img-fluid" height="200" width="200">
                        </div>
                        <div class="col-md-7">
                            <h3 class="text-dark fw-bold">{{$product->name}}</h3>
                            <p class="text-dark"><span class="fw-bold">Product Type : </span>{{$product->type->name ?? ''}}</p>
                            <h5>{{$product->short_description}}</h5>
                            <h5><span class="fw-bold">Stock Amount :</span> {{$product->stock_amount}}</h5>
                            <h5><span class="fw-bold">Color :</span>
                                <span>
                                    @foreach($product->colors as $color)
                                        <span>{{$color->color->name}} ,</span>
                                    @endforeach
                                </span>
                            </h5>
                            <h5><span class="fw-bold">Regular Price :</span>
                                <del>{{$product->regular_price}} Tk</del>
                            </h5>
                            <h5><span class="fw-bold">Selling Price :</span>
                                <span> {{$product->selling_price}} Tk</span>
                            </h5>

                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Product ID</th>
                            <th>{{$product->id}}</th>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <th>{{$product->name}}</th>
                        </tr>
                        <tr>
                            <th>Product Code</th>
                            <th>{{$product->code}}</th>
                        </tr>
                        <tr>
                            <th>Product Other Image</th>
                            <td>
                                @foreach($product->productImages as $productImage)
                                    <img src="{{asset($productImage->image)}}" height="100" width="70" alt="No Images">
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <th>{{$product->category->name ?? 'No category'}}</th>
                        </tr>
                        <tr>
                            <th>SubCategory Name</th>
                            <th>{{$product->subCategory->name ?? 'No sub Category'}}</th>
                        </tr>
                        <tr>
                            <th> Brand Name </th>
                            <th>{{$product->brand->name ?? 'No brand'}}</th>
                        </tr>
                        <tr>
                            <th> Unit Name </th>
                            <th>{{$product->unit->name  ?? 'No unit'}}</th>
                        </tr>
                        <tr>
                            <th> Product Colors</th>
                            <th>
                                @foreach($product->colors as $color)
                                    <span>{{$color->color->name ?? 'No color'}},</span>
                                @endforeach
                            </th>
                        </tr>
                        <tr>
                            <th>Product Sizes</th>
                            <th>
                                @foreach($product->sizes as $size)
                                    <span>{{$size->size->name}},</span>
                                @endforeach
                            </th>
                        </tr>

                        <tr>
                            <th>Short Description</th>
                            <th>{{$product->short_description ?? 'No Description' }}</th>
                        </tr>
                        <tr>
                            <th>Long Description</th>
                            <th>{!! $product->long_description  ?? 'No Long Description' !!}</th>
                        </tr>
                        <tr>
                            <th> Price</th>
                            <th class="d-flex">
                                <span class="mx-4 "> Regular: {{$product->regular_price}}.Tk</span> <br />
                                <span> Selling: {{$product->selling_price}}.Tk</span>
                            </th>
                        </tr>
                        <tr>
                            <th> Stock Amount</th>
                            <td>{{$product->stock_amount}}</td>
                        </tr>
                        <tr>
                            <th> Total View</th>
                            <td>{{$product->hit_count}}</td>
                        </tr>
                        <tr>
                            <th> Total Sale</th>
                            <td>{{$product->sales_count}}</td>
                        </tr>
                        <tr>
                            <th> Total Sale</th>
                            <td>{{$product->sales_count}}</td>
                        </tr>

                        <tr>
                            <th> Feature status</th>
                            <td>{{$product->featured_status == 1 ? "Featured" : "Not Featured"}}</td>
                        </tr>
                        <tr>
                            <th> Cash On</th>
                            <td>{{$product->cash_on == 1 ? "cash on" : "not cash on"}}</td>
                        </tr>
                        <tr>
                            <th> Flash Deal</th>
                            <td>{{$product->flash_deal == 1 ? "flash deal" : "not flash deal"}}</td>
                        </tr>
                        <tr>
                            <th> Flash Deal Discount</th>
                            <td>{{$product->flash_deal_discount ?? 'no discount' }}</td>
                        </tr>
                        <tr>
                            <th> Publication Status</th>
                            <td>{{$product->status == 1 ? "Published" : "Not Published"}}</td>
                        </tr>
                        <tr>
                            <th>Tags</th>
                            <td>
                                <div class="">
                                    <input type="text" readonly disabled data-role="tagsinput" value="{{$product->tags}}" name="tags" class="form-control">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

