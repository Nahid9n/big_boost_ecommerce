@extends('admin.master')
@section('title','Website Setting Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Website Setting Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Website Setting</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row justify-content-center">
        <div class="col-lg-12 shadow">
            <div class="card shadow">
                <div class="card-header justify-content-center border-bottom">
                    <h2 class="fw-bold">Update Website Setting Form</h2>
                    <hr>
                    <div class="col-5 text-end me-1">
                        <a href="{{route('website-settings.index')}}" class="btn text-dark px-5 btn-success">Website Details</a>
                    </div>
                </div>

                <div class="card-body">
                    <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                    <form action="{{route('website-settings.update',$websiteSetting->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Logo</label>
                            <div class="col-md-9">
                                <input type="file" id="imgInp" class="dropify" name="logo" data-height="200"/>
                                <img src="{{asset($websiteSetting->logo)}}" class="img-fluid" width="120" height="100" alt="logo here">
                                <span class="text-danger">{{$errors->has('logo')?$errors->first('logo'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Banner</label>
                            <div class="col-md-9">
                                <input type="file" id="imgInp" class="dropify" name="banner" data-height="200"/>
                                <img src="{{asset($websiteSetting->banner)}}" class="img-fluid" width="120" height="100" alt="Banner here">
                                <span class="text-danger">{{$errors->has('banner')?$errors->first('banner'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Icon</label>
                            <div class="col-md-9">
                                <input type="file" id="imgInp" class="dropify" name="icon" data-height="200"/>
                                <img src="{{asset($websiteSetting->icon)}}" class="img-fluid" width="120" height="100" alt="Icon here">
                                <span class="text-danger">{{$errors->has('icon')?$errors->first('icon'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="slogan" class="col-md-3 form-label">Motto</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$websiteSetting->slogan}}" id="slogan" name="slogan" placeholder="write your website slogan" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email Address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$websiteSetting->email}}" id="email" name="email" placeholder="email address" type="email">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="mobile" class="col-md-3 form-label">Mobile Number</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$websiteSetting->mobile}}" name="mobile" id="mobile" placeholder="Mobile Number" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="address" class="col-md-3 form-label">Address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$websiteSetting->email}}" name="address" id="address" placeholder="type Address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">About Us</label>
                            <div class="col-md-9">
                                <textarea name="about" class="" id="summernote" cols="30"  rows="3">{{$websiteSetting->about}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="facebook" class="col-md-3 form-label">Facebook address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$websiteSetting->facebook}}" name="facebook" id="facebook" placeholder="Facebook address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="twitter" class="col-md-3 form-label">Twitter address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$websiteSetting->twitter}}" name="twitter" id="twitter" placeholder="Twitter address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="LinkedIn" class="col-md-3 form-label">LinkedIn address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$websiteSetting->linkedIn}}" name="linkedIn" id="LinkedIn" placeholder="LinkedIn address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="youtube" class="col-md-3 form-label">Youtube</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$websiteSetting->youtube}}" name="youtube" id="youtube" placeholder="youtube address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="map" class="col-md-3 form-label">Google Map</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$websiteSetting->map}}" name="map" id="map" placeholder="google map link" type="text">
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{$websiteSetting->status == 1 ? 'selected':''}} >Active</option>
                                    <option value="0" {{$websiteSetting->status == 0 ? 'selected':''}} >Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="radio" class="col-md-3 form-label"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary" type="submit">Update Website Info</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
