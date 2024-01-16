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
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 text-center mb-2">
                            {{-- <img src="{{asset($product->image)}}" class="img-fluid" height="200" width="200"> --}}
                        </div>
                       {{--  <div class="col-md-7">
                            <h3 class="text-dark fw-bold">{{$product->name}}</h3>
                            <p class="text-dark"><span class="fw-bold">Product Type : </span>{{$product->type->name ?? ''}}</p>
                            <h5>{{$product->short_description}}</h5>
                            <h5><span class="fw-bold">Stock Amount :</span> {{$product->stock}}</h5>
                            <h5><span class="fw-bold">Color :</span>
                               <span>{{ $product->color->name }}</span>
                            </h5>
                            <h5><span class="fw-bold">Regular Price :</span>
                                <del>{{$product->regular_price}} Tk</del>
                            </h5>
                            <h5><span class="fw-bold">Selling Price :</span>
                                <span> {{$product->selling_price}} Tk</span>
                            </h5>

                        </div> --}}
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
                           {{--  <td>
                                @foreach($product->productImages as $productImage)
                                    <img src="{{asset($productImage->image)}}" height="100" width="70">
                                @endforeach
                            </td> --}}
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <th>{{$product->category->name}}</th>
                        </tr>
                        <tr>
                            <th>SubCategory Name</th>
                            <th>{{$product->subCategory->name}}</th>
                        </tr>
                        <tr>
                            <th> Brand Name </th>
                            <th>{{$product->brand->name}}</th>
                        </tr>
                        <tr>
                            <th> Unit Name </th>
                            <th>{{$product->unit->name}}</th>
                        </tr>
                        <tr>
                            <th> Product Color</th>
                            <th>
                               {{ $product->color->name }}
                            </th>
                        </tr>
                        <tr>
                            <th>Product Sizes</th>
                            <th>
                              {{ $product->size->name }}
                            </th>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <th>{{$product->description}}</th>
                        </tr>


                        <tr>
                            <th> Stock Amount</th>
                            <td>{{$product->stock}}</td>
                        </tr>
                         <tr>
                            <th> Discount</th>
                            <td>{{$product->discount}}</td>
                        </tr>
                        <tr>
                            <th> Sale date</th>
                            <td>{{$product->sale_date}}</td>
                        </tr>
                        <tr>
                            <th> Sale</th>
                            <td>{{$product->sale}}</td>
                        </tr>

                        <tr>
                            <th>  Status</th>
                            <td>{{$product->status == 1 ? "active" : "inactive"}}</td>
                        </tr>
                        <tr>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

