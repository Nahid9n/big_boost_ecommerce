@extends('admin.master')
@section('title','Edit Product ')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Product Form</h3>
                </div>
                <div class="text-end">
                    <a href="{{route('product.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Product</a>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="myInput1" onkeyup="myChangeFunction(this)" value="{{ $product->name }}" name="name" placeholder="Product name" />
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="sku" class="col-md-3 form-label">SKU</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" value="{{ $product->sku }}" name="sku" id="myInput2"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select name="category_id" onchange="setSubCategory(this.value)" id="" class="form-control" required>
                                    <option value="" disabled selected> -- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}> {{$category->name}} </option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <select name="sub_category_id" id="subCategoryId" class="form-control" required>
                                    <option value="" disabled selected> -- Select Sub Category --</option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}" @selected($sub_category->id = $product->sub_category_id)> {{$sub_category->name}} </option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{$errors->has('sub_category_id') ? $errors->first('sub_category_id') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <select name="brand_id" id="" class="form-control" required>
                                    <option value="" disabled selected> -- Select Brand --</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" @selected($brand->id = $brand->name)> {{$brand->name}} </option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Unit Name</label>
                            <div class="col-md-9">
                                <select name="unit_id" id="" class="form-control" required>
                                    <option value="" disabled selected> -- Select Unit --</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}"@selected($unit->id = $unit->name)> {{$unit->name}} </option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{$errors->has('unit_id') ? $errors->first('unit_id') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Color Name</label>
                            <div class="col-md-9 form-group">
                                <select multiple name="colors[]"  class="form-control select2 select2-show-search form-select" data-placeholder="Select Product Color" required >
                                    {{--                                    <option value="" disabled selected> -- Select Color --</option>--}}
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}" @foreach($product->colors as $singleColor) @selected($color->id == $singleColor->color_id) @endforeach > {{$color->name}} </option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{$errors->has('color_id') ? $errors->first('color_id') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Size Name</label>
                            <div class="col-md-9 form-group">
                                <select multiple name="sizes[]"  class="form-control select2 select2-show-search form-select" data-placeholder="Select Product Size" required >
                                    {{--                                    <option value="" disabled selected> -- Select Color --</option>--}}
                                    @foreach($sizes as $size)
                                        <option value="{{$size->id}}" @foreach($product->sizes as $singleSize) @selected($size->id == $singleSize->size_id) @endforeach > {{$size->name}} </option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{$errors->has('size_id') ? $errors->first('size_id') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Product Code</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$product->code}}" name="code" id="code" placeholder="Product Code" type="text"/>
                                <span class="text-danger">{{$errors->has('code') ? $errors->first('code') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Product Type</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 select2-show-search form-select" name="type_id" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    @foreach($productTypes as $productType)
                                        <option value="{{$productType->id}}" {{$productType->id == $product->type_id ? 'selected':''}}>{{$productType->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('type_id') ? $errors->first('type_id'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="short_description" id="short_description" placeholder="Short Description" > {{$product->short_description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="long_description" id="summernote" placeholder="Long Description" >{{$product->long_description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Product Image (500x500)</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="dropify" data-height="200" />
                                <img src="{{asset($product->image)}}" alt="" height="100" width="100">
                                <span class="text-danger">{{$errors->has('image') ? $errors->first('image'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Product Other Image</label>
                            <div class="col-md-9">
                                <div class="gallery mt-2">
                                    <input type="file" name="other_images[]" id="gallery-photo-add" class="form-control" multiple>
                                    @foreach($product->productImages as $productImage)
                                        <img src="{{asset($productImage->image)}}" alt="" height="100" width="100">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Product Price</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input class="form-control" value="{{$product->regular_price}}" name="regular_price" placeholder="Regular Price" type="number" />
                                    <input class="form-control" value="{{$product->selling_price}}" name="selling_price" placeholder="Selling Price" type="number" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="stockAmount" class="col-md-3 form-label">Stock Amount</label>
                            <div class="col-md-9">
                                <input class="form-control" id="stockAmount" value="{{$product->stock_amount}}" name="stock_amount" placeholder="Stock Amount" type="number"/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="shipping_cost" class="col-md-3 form-label">Shipping Cost</label>
                            <div class="col-md-9">
                                <input class="form-control" id="shipping_cost"  name="shipping_cost" value="{{$product->shipping_cost}}" placeholder="Shipping Cost" type="number"/>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <label for="stockAmount" class="col-md-3 form-label">Tags</label>
                            <div class="example col-md-9">
                                <input type="text" data-role="tagsinput" name="tags" value="{{$product->tags}}" class="form-control" placeholder="type & press enter">
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Refund</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="refund" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{$product->refund == 1 ? 'selected':''}}>Refundable</option>
                                    <option value="0" {{$product->refund == 0 ? 'selected':''}}>Non-Refundable</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Cash On</label>
                            </div>
                            <div class="col-md-9">
                                <div class="material-switch">
                                    <input id="uncheckedDangerSwitch" value="1" name="cash_on" {{$product->cash_on == 1 ? 'checked':''}} type="checkbox"/>
                                    <label for="uncheckedDangerSwitch" class="label-danger"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Flash Deal</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="material-switch">
                                        <input id="uncheckedPrimarySwitch1" value="1" name="flash_deal" {{$product->flash_deal == 1 ? 'checked':''}} type="checkbox"/>
                                        <label for="uncheckedPrimarySwitch1" class="label-danger"></label>
                                    </div>
                                    <input class="form-control"  name="flash_deal_discount" placeholder="flash deal discount" type="number" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Feature Product</label>
                            </div>
                            <div class="col-md-9">
                                <div class="material-switch">
                                    <input id="uncheckedPrimarySwitch" value="1" name="featured_status" {{$product->featured_status == 1 ? 'checked':''}} type="checkbox"/>
                                    <label for="uncheckedPrimarySwitch" class="label-danger"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{$product->status == 1 ? 'selected':''}}>Active</option>
                                    <option value="0" {{$product->status == 0 ? 'selected':''}}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update Product</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
