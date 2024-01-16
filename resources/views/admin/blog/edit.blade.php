@extends('admin.master')
@section('title','Blog Post page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Blog Post Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Blog Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Blog Post</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Update Blog Post</h3>
                </div>
                <div class="text-end">
                    <a href="{{route('blogs.index')}}" class="btn btn-success my-1 mx-2 float-end text-center">All Blog Post</a>
                </div>
                <div class="card-body">
                    <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('blogs.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="title" class="col-md-3 form-label">Blog Post Title <sup class="text-danger">*</sup></label>
                            <div class="col-md-9">
                                <input class="form-control" id="title" required value="{{$blog->title}}" name="title" placeholder="Enter your Blog Post Title" type="text">
                                <span class="text-danger">{{$errors->has('title') ? $errors->first('title'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Category</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 select2-show-search form-select" name="category_id" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    @foreach($blogCategories as $blogCategory)
                                        <option value="{{$blogCategory->id}}" {{$blogCategory->id == $blog->category_id ? 'selected':''}}>{{$blogCategory->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id'):''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="slug" class="col-md-3 form-label">slug <sup class="text-danger">*</sup></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$blog->slug}}" id="slug" name="slug" placeholder="Enter your slug here" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="banner" class="col-md-3 form-label">Banner (1300x650)</label>
                            <div class="col-md-9">
                                <input type="file" class="dropify" name="banner" data-default-file="https://laravel8.spruko.com/noa/assets/images/photos/1.jpg" data-height="200"/>
                                <img src="{{asset($blog->banner)}}" width="100" alt="Banner">
                                <span class="text-danger">{{$errors->has('banner') ? $errors->first('banner'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Product Other Image</label>
                            <div class="col-md-9">
                                <input type="file" name="other_images[]" class="form-control" multiple>
                                @foreach($blog->blogImages as $other_image)
                                <img width="100" height="100" src="{{asset($other_image->image)}}" alt="">
                                @endforeach
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="short_description" id="short_description" placeholder="Short Description" >{{$blog->short_description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="long_description" id="summernote" placeholder="Long Description">{{$blog->long_description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="meta_title" class="col-md-3 form-label">Meta Title</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$blog->meta_title}}" id="meta_title" name="meta_title" placeholder="Enter Meta Title" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="meta_image" class="col-md-3 form-label">Meta Image (200x200)</label>
                            <div class="col-md-9">
                                <input type="file" class="dropify" name="meta_image" data-default-file="https://laravel8.spruko.com/noa/assets/images/photos/1.jpg" data-height="200"/>
                                <img src="{{asset($blog->meta_image)}}" alt="meta Image" width="100">
                                <span class="text-danger">{{$errors->has('meta_image') ? $errors->first('meta_image'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="meta_description" class="col-md-3 form-label">Meta Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Description" type="text">{{$blog->meta_description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="meta_keyword" class="col-md-3 form-label">Meta Keyword</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$blog->meta_keyword}}" id="meta_keyword" name="meta_keyword" placeholder="Enter keywords" type="text">
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option selected value="1" {{$blog->status == 1 ? 'selected':''}}>Active</option>
                                    <option value="0" {{$blog->status == 0 ? 'selected':''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4" type="submit">Update Blog Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection


