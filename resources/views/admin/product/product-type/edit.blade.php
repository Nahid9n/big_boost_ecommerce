@extends('admin.master')
@section('title','Product Type page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Type Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Type</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Product Type</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Product Type</h3>
                </div>
                <div class="text-end">
                    <a href="{{route('product-type.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Product Type</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('product-type.update',$product_type->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Product Type Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" required value="{{$product_type->name}}" name="name" placeholder="Enter your Product Type name" type="text">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Product Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="dropify" data-height="200" />
                                <img src="{{asset($product_type->image)}}" alt="" width="100" class="img-fluid">
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option  value="1" {{$product_type->status == 1 ?'selected':''}}>Active</option>
                                    <option value="0" {{$product_type->status == 0 ?'selected':''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4" type="submit">Create Product Type</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection


