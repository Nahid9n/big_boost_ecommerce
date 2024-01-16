@extends('admin.master')
@section('title','Delivery Boy Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Delivery Boy Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Delivery Boy</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row justify-content-center">
        <div class="col-lg-12 shadow">
            <div class="card shadow">
                <div class="card-header justify-content-center border-bottom">
                    <h2 class="fw-bold">Add Delivery Boy Form</h2>
                    <hr>
                    <div class="col-5 text-end me-1">
                        <a href="{{route('delivery-boy.index')}}" class="btn text-dark px-5 btn-success">All Delivery Boy</a>
                    </div>
                </div>

                <div class="card-body">
                    <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                    <form action="{{route('delivery-boy.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Delivery Boy Image</label>
                            <div class="col-md-9">
                                <input type="file" id="imgInp" class="dropify" name="image" data-height="200"/>
                                <span class="text-danger">{{$errors->has('image')?$errors->first('image'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Delivery Boy name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="Delivery Boy name" type="text">
                                <span class="text-danger">{{$errors->has('name')?$errors->first('name'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="designation" class="col-md-3 form-label">Delivery Boy Designation</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('designation')}}" id="designation" name="designation" placeholder="Delivery Boy Designation" type="text">
                                <span class="text-danger">{{$errors->has('designation')?$errors->first('designation'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email Address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('email')}}" id="email" name="email" placeholder="email address" type="email">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="mobile" class="col-md-3 form-label">Mobile Number</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('mobile')}}" name="mobile" id="mobile" placeholder="Delivery Boy Mobile" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="blood" class="col-md-3 form-label">Blood group</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('blood')}}" name="blood" id="blood" placeholder="Blood group" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="gender" class="col-md-3 form-label">Gender Group</label>
                            <div class="col-md-9">
                                <select name="gender" data-value="{{old('gender')}}" class="form-control" id="gender">
                                    <option value="" disabled selected>select gender</option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                    <option value="other">other</option>
                                </select>
                                <span class="text-danger">{{$errors->has('gender')?$errors->first('gender'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label" for="">Date of Birth</label>
                            <div class="input-group col-md-9">
                                <div class="input-group-text bg-primary-transparent text-primary">
                                    <i class="fe fe-calendar text-20"></i>
                                </div>
                                <input class="form-control fc-datepicker" value="{{old('date')}}" name="date" id="fc-datepicker" placeholder="select date" type="text">
                            </div>
                            <!-- input-group -->
                        </div>
                        <div class="row mb-4">
                            <label for="present_address" class="col-md-3 form-label">Present Address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('present_address')}}" name="present_address" id="present_address" placeholder="Permanent Address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="permanentAddress" class="col-md-3 form-label">Permanent Address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('permanentAddress')}}" name="permanentAddress" id="permanentAddress" placeholder="Permanent Address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="short_description" class="col-md-3 form-label">Short About Me</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="3">{{old('short_description')}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="biography" class="col-md-3 form-label">Biography</label>
                            <div class="col-md-9">
                                <textarea name="biography" class="summernote form-control" id="biography" cols="30"  rows="3">{{old('biography')}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="experience" class="col-md-3 form-label">Experience</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('experience')}}" name="experience" id="experience" placeholder="Experience" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="facebook" class="col-md-3 form-label">Facebook address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('facebook')}}" name="facebook" id="facebook" placeholder="Facebook address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="twitter" class="col-md-3 form-label">Twitter address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('twitter')}}" name="twitter" id="twitter" placeholder="Twitter address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="LinkedIn" class="col-md-3 form-label">LinkedIn address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('linkedIn')}}" name="linkedIn" id="LinkedIn" placeholder="LinkedIn address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="website" class="col-md-3 form-label">Website address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('website')}}" name="website" id="website" placeholder="website address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" selected>Active</option>
                                    <option value="0" >Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="radio" class="col-md-3 form-label"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary" type="submit">Add Delivery Boy</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
