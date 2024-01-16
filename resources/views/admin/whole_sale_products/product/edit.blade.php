@extends('admin.master')
@section('title', 'Create Auction Product ')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Auction Product Module</h1>
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
                    <h3 class="card-title"> Edit Product Form</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('whole-sale-product.update',$product->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-4">
                            <div class="form-group">
                                <label class="form-label">Category Name</label>
                                <select name="category_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($categories as $category)
                                        <option @if ($category->id == $product->product_id) checked

                                        @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Category --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="form-group">
                                <label class="form-label">SubCategory </label>
                                <select name="sub_category_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($subCategories as $subcategory)
                                        <option  @if ($subcategory->id == $product->subCategory_id) checked

                                        @endif value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO SubCategory --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="form-group">
                                <label class="form-label">Brand Name</label>
                                <select name="brand_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($brands as $brand)
                                        <option  @if ($brand->id == $product->brand_id) checked

                                        @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Brand --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="form-group">
                                <label class="form-label">Unit </label>
                                <select name="unit_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($units as $unit)
                                        <option  @if ($unit->id == $product->unit_id) checked

                                        @endif value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Unit --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="form-group">
                                <label class="form-label">Color </label>
                                <select name="color_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($colors as $color)
                                        <option  @if ($color->id == $product->color_id) checked

                                        @endif value="{{ $color->id }}">{{ $color->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Color --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                            <div class="row mb-4">
                            <div class="form-group">
                                <label class="form-label">Size </label>
                                <select name="size_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($sizes as $size)
                                        <option  @if ($size->id == $product->size_id) checked

                                        @endif value="{{ $size->id }}">{{ $size->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Type --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="form-group">
                                <label class="form-label">Type </label>
                                <select name="type_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($types as $type)
                                        <option  @if ($type->id == $product->type_id) checked

                                        @endif value="{{ $type->id }}">{{ $type->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Type --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$product->name}}" name="name" id="name"
                                    placeholder="name " type="text" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Product Code</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $product->code }}" name="code" id="code"
                                    placeholder="Product Code" type="text" />

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="discount" class="col-md-3 form-label">Discount </label>
                            <div class="col-md-9">
                                <input class="form-control" id="discount" name="discount" placeholder="Enter Discount"
                                    type="number" value="{{ $product->discount }}"  />
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label for="stock" class="col-md-3 form-label">Stock </label>
                            <div class="col-md-9">
                                <input class="form-control" id="stock" name="stock" type="number"
                                    value="{{ $product->stock }}" placeholder="number" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="date" class="col-md-3 form-label">Sale Date </label>
                            <div class="col-md-9">
                                <input class="form-control" type="date" id="date" name="sale_date"
                                    value="{{ $product->sale_date }}" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="sale" class="col-md-3 form-label">Sale </label>
                            <div class="col-md-9">
                                <input class="form-control" id="sale" name="sale" type="number"
                                    value="{{ $product->sale }}" placeholder="sale" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Product Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="dropify" data-height="200" />

                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Product Other Image</label>
                            <div class="col-md-9">
                                <input type="file" name="other_images[]" class="form-control" multiple>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label"> Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description" placeholder="Description">{{ $product->description }}</textarea>
                            </div>
                        </div>


                          <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type"> Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{$product->status == 1 ? 'selected':''}}>Active</option>
                                    <option value="0" {{$product->status == 0 ? 'selected':''}}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
