@extends('admin.master')
@section('title','category page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Update Category</h3>
                </div>
                <div class="text-end">
                    <a href="{{route('categories.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Category</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" required value="{{$category->name}}" name="name" placeholder="Enter your category name" type="text">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Type</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="type_id" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    @foreach($productTypes as $productType)
                                    <option value="{{$productType->id}}" {{$productType->id == $category->type_id ? 'selected':''}}>{{$productType->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('type_id') ? $errors->first('type_id'):''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="orderNumber" class="col-md-3 form-label">Ordering Number</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$category->orderNumber}}" id="orderNumber" name="orderNumber" placeholder="Enter your Ordering Number" type="number">
                                <small class="text-dark">Higher number has high priority</small>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="banner" class="col-md-3 form-label">Banner (200x200)</label>
                            <div class="col-md-9">
                                <input type="file" class="dropify" name="banner" data-default-file="https://laravel8.spruko.com/noa/assets/images/photos/1.jpg" data-height="200"/>
                                <img width="200" height="200" src="{{asset($category->banner)}}" class="img-fluid mt-1" alt="">
                                <span class="text-danger">{{$errors->has('banner') ? $errors->first('banner'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="icon" class="col-md-3 form-label">Icon (32x32)</label>
                            <div class="col-md-9">
                                <input type="file" class="dropify" name="icon" data-default-file="https://laravel8.spruko.com/noa/assets/images/photos/1.jpg" data-height="200"/>
                                <img width="200" height="200" src="{{asset($category->icon)}}" class="img-fluid mt-1" alt="">
                                <span class="text-danger">{{$errors->has('icon') ? $errors->first('icon'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="cover" class="col-md-3 form-label">Cover Image (360x360)</label>
                            <div class="col-md-9">
                                <input type="file" class="dropify" name="cover" data-default-file="https://laravel8.spruko.com/noa/assets/images/photos/1.jpg" data-height="200"/>
                                <img width="200" height="200" src="{{asset($category->cover)}}" class="img-fluid mt-1" alt="">
                                <span class="text-danger">{{$errors->has('cover') ? $errors->first('cover'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="meta" class="col-md-3 form-label">Meta Title</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$category->meta}}" id="meta" name="meta" placeholder="Enter Meta Title" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="metaDescription" class="col-md-3 form-label">Meta Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="metaDescription" name="metaDescription" placeholder="Enter Meta Description" type="text">{{$category->metaDescription}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{$category->status == 1 ? 'selected':''}}>Active</option>
                                    <option value="0" {{$category->status == 0 ? 'selected':''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection



