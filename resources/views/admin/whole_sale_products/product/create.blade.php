@extends('admin.master')
@section('title', 'Create Auction Product ')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Whole Sale Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Whole Sale Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Whole Sale Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create Whole Sale Product Form</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('whole-sale-product.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">

                                <label class="">Category Name</label>

                            </div>
                            <div class="form-group col-md-9">
                                <select name="category_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Category --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">

                                <label class="">SubCategory </label>

                            </div>
                            <div class="form-group col-md-9">
                                <select name="sub_category_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($subCategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO SubCategory --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">

                                <label class="">Brand Name</label>

                            </div>
                            <div class="form-group col-md-9">
                                <select name="brand_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Brand --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">

                                <label class="">Unit </label>

                            </div>
                            <div class="form-group col-md-9">
                                <select name="unit_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Unit --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">

                                <label class="">Color </label>

                            </div>
                            <div class="form-group col-md-9">
                                <select name="color_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Color --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                            <div class="row mb-4">
                                <div class="col-md-3 md-3 form-label">

                                    <label class="">Size </label>
                                </div>
                            <div class="form-group col-md-9">
                                <select name="size_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Type --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">

                                <label class="">Type </label>

                            </div>
                            <div class="form-group col-md-9">
                                <select name="type_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">
                                    @forelse ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Type --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('name') }}" name="name" id="name"
                                    placeholder="name " type="text" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Product Code</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('code') }}" name="code" id="code"
                                    placeholder="Product Code" type="text" />

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="discount" class="col-md-3 form-label">Discount </label>
                            <div class="col-md-9">
                                <input class="form-control" id="discount" name="discount" placeholder="Enter Discount"
                                    type="number" value="{{ old('discount') }}"  />
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label for="stock" class="col-md-3 form-label">Stock </label>
                            <div class="col-md-9">
                                <input class="form-control" id="stock" name="stock" type="number"
                                    value="{{ old('stock') }}" placeholder="number" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="date" class="col-md-3 form-label">Sale Date </label>
                            <div class="col-md-9">
                                <input class="form-control" type="date" id="date" name="sale_date"
                                    value="{{ old('sale_date') }}" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="sale" class="col-md-3 form-label">Sale </label>
                            <div class="col-md-9">
                                <input class="form-control" id="sale" name="sale" type="number"
                                    value="{{ old('sale') }}" placeholder="sale" />
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
                                <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">

                                <label class=""> Status</label>

                            </div>
                            <div class="col-md-9 pt-3 form-group">
                                <label for=""><input type="radio" value="1" checked name="status"><span>
                                        Active </span></label>
                                <label for=""><input type="radio" value="0" checked name="status"><span>
                                        Inactive </span></label>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
