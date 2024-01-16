@extends('admin.master')
@section('title','Delivery Boy Details')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Delivery Boy Profile</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Delivery Boy</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row" id="user-profile">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="profile-img-main rounded">
                                    <img src="{{asset($deliveryBoy->image)}}" alt="img" class="m-0 p-1 rounded hrem-6">
                                </div>
                                <div class="ms-4">
                                    <h4>{{$deliveryBoy->name}}</h4>
                                    <p class="text-muted mb-2">Member Since: {{$deliveryBoy->created_at}}</p>
                                    <a href="{{$deliveryBoy->facebook}}" class="btn btn-primary btn-sm"><i class="fa fa-facebook"></i> facebook</a>
                                    <a target="_blank" href="mailto:{{$deliveryBoy->email}}"  class="btn btn-secondary btn-sm"><i class="fa fa-envelope"></i> E-mail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <div class="d-md-flex flex-wrap justify-content-end">
                                <div class="col-5 text-end me-1">
                                    <a href="{{route('delivery-boy.index')}}" class="btn text-dark px-5 btn-success">All Delivery Boy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="wideget-user-tab">
                        <div class="tab-menu-heading">
                            <div class="tabs-menu1">
                                <ul class="nav">
                                    <li><a href="#profileMain" class="active show" data-bs-toggle="tab">Profile</a></li>
                                    <li><a href="#editProfile" data-bs-toggle="tab">Edit Profile</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active show" id="profileMain">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-5">
                                <h3 class="card-title">Biodata</h3>
                                <p class="text-dark-light">{{$deliveryBoy->biography}}</p>
                            </div>
                            <div class="border-top"></div>
                            <div class="table-responsive p-5">
                                <h3 class="card-title">Personal Info</h3>
                                <table class="table row table-borderless">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <tr>
                                        <td><strong>Full Name :</strong> {{$deliveryBoy->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Location :</strong> {{$deliveryBoy->permanentAddress}}</td>
                                    </tr>

                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0 border-top-0">
                                    <tr>
                                        <td><strong>Website :</strong> {{$deliveryBoy->website}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email :</strong> {{$deliveryBoy->email}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone :</strong> {{$deliveryBoy->mobile}} </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="border-top"></div>
                            <div class="p-5">
                                <h3 class="card-title">Statistics</h3>
                                <div class="profile-cover__info ms-4 ms-auto p-0">
                                    <ul class="nav p-0 border-bottom-0 mb-0">
                                        <li class="border p-2 br-5 bg-light-lightest wpx-100 hpx-70 text-center my-1">
                                            <span class="border-0 mb-0 pb-0 fs-21">113</span>
                                            work done
                                        </li>
                                        <li class="border p-2 br-5 bg-light-lightest wpx-100 hpx-70 text-center mx-2 my-1">
                                            <span class="border-0 mb-0 pb-0 fs-21">245</span>
                                            pending work
                                        </li>
                                        <li class="border p-2 br-5 bg-light-lightest wpx-100 hpx-70 text-center my-1">
                                            <span class="border-0 mb-0 pb-0 fs-21">128</span>
                                            Following
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="border-top"></div>
                            <div class="p-5">
                                <h3 class="card-title">Contact</h3>
                                <div class="d-sm-flex">
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-primary-transparent text-primary"> <i class="fe fe-phone fs-21"></i> </div>
                                                <div class="media-body ms-1">
                                                    <span class="text-muted">Mobile</span>
                                                    <p class="mb-0"> {{$deliveryBoy->mobile}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-success-transparent text-success"> <i class="fe fe-slack fs-21"></i> </div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Blood Gorup</span>
                                                    <p class="mb-0"> {{$deliveryBoy->blood}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="fe fe-map-pin fs-21"></i> </div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Current Address</span>
                                                    <p class="mb-0"> {{$deliveryBoy->name}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top"></div>
                            <div class="p-5">
                                <h3 class="card-title">Social</h3>
                                <div class="d-md-flex">
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-primary-transparent text-primary"> <i class="fe fe-github fs-21"></i> </div>
                                                <div class="media-body ms-1">
                                                    <span class="text-muted">Github</span>
                                                    <p class="mb-0"> <a href="javascript:void(0)" class="text-default">{{$deliveryBoy->name}}</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-success-transparent text-success"> <i class="fe fe-twitter fs-21"></i> </div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Twitter</span>
                                                    <p class="mb-0"> <a href="javascript:void(0)" class="text-default">{{$deliveryBoy->name}}</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="fe fe-linkedin fs-21"></i> </div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Linkedin</span>
                                                    <p class="mb-0"> <a href="javascript:void(0)" class="text-default">{{$deliveryBoy->name}}</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="editProfile">
                    <div class="card">
                        <div class="card-body border-0">
                            <form action="{{route('deliveryBoy.updateProfile',['id'=>$deliveryBoy->id])}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row mb-4">
                                    <label for="name" class="col-md-3 form-label">Delivery Boy name</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$deliveryBoy->name}}" id="name" name="name" placeholder="Delivery Boy name" type="text">
                                        <span class="text-danger">{{$errors->has('name')?$errors->first('name'):''}}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="designation" class="col-md-3 form-label">Delivery Boy Designation</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$deliveryBoy->designation}}" id="designation" name="designation" placeholder="Delivery Boy name" type="text">
                                        <span class="text-danger">{{$errors->has('designation')?$errors->first('designation'):''}}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="imgInp" class="col-md-3 form-label">Delivery Boy Image</label>
                                    <div class="col-md-9">
                                        <input class="form-control-file dropify" value="{{asset($deliveryBoy->image)}}" id="imgInp" name="image" placeholder="Delivery Boy Image" type="file">
                                        <img width="100" class="mt-2" src="{{asset($deliveryBoy->image)}}" id="inputImage" alt="">
                                        <span class="text-danger">{{$errors->has('image')?$errors->first('image'):''}}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="email" class="col-md-3 form-label">Email Address</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$deliveryBoy->email}}" id="email" name="email" placeholder="email address" type="email">
                                        <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="mobile" class="col-md-3 form-label">Mobile Number</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$deliveryBoy->mobile}}" name="mobile" id="mobile" placeholder="Delivery Boy Mobile" type="text">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="blood" class="col-md-3 form-label">Blood group</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$deliveryBoy->blood}}" name="blood" id="blood" placeholder="Blood group" type="text">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="gender" class="col-md-3 form-label">Gender Group</label>
                                    <div class="col-md-9">
                                        <select name="gender" data-value="{{$deliveryBoy->gender}}" class="form-control" id="gender">
                                            <option value="" disabled selected>select gender</option>
                                            <option {{$deliveryBoy->gender == 'male' ? 'selected':''}} value="male">male</option>
                                            <option {{$deliveryBoy->gender == 'female' ? 'selected':''}} value="female">female</option>
                                            <option {{$deliveryBoy->gender == 'other' ? 'selected':''}} value="other">other</option>
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
                                        <input class="form-control fc-datepicker" value="{{$deliveryBoy->date}}" name="date" id="fc-datepicker" placeholder="select date" type="text">
                                    </div>
                                    <!-- input-group -->
                                </div>
                                <div class="row mb-4">
                                    <label for="present_address" class="col-md-3 form-label">Present Address</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$deliveryBoy->present_address}}" name="present_address" id="present_address" placeholder="Permanent Address" type="text">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="permanentAddress" class="col-md-3 form-label">Permanent Address</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$deliveryBoy->permanentAddress}}" name="permanentAddress" id="permanentAddress" placeholder="Permanent Address" type="text">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="short_description" class="col-md-3 form-label">Short About Me</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="3">{{$deliveryBoy->short_description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="biography" class="col-md-3 form-label">Biography</label>
                                    <div class="col-md-9">
                                        <textarea name="biography" class="summernote form-control" id="biography" cols="30"  rows="3">{{$deliveryBoy->biography}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="experience" class="col-md-3 form-label">Experience</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$deliveryBoy->experience}}" name="experience" id="experience" placeholder="Experience" type="text">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="facebook" class="col-md-3 form-label">Facebook address</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$deliveryBoy->facebook}}" name="facebook" id="facebook" placeholder="Facebook address" type="text">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="twitter" class="col-md-3 form-label">Twitter address</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$deliveryBoy->twitter}}" name="twitter" id="twitter" placeholder="Twitter address" type="text">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="LinkedIn" class="col-md-3 form-label">LinkedIn address</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$deliveryBoy->linkedIn}}" name="linkedIn" id="LinkedIn" placeholder="LinkedIn address" type="text">
                                    </div>
                                </div>

                                <div class="row mb-4 d-flex form-group">
                                    <div class="col-md-3">
                                        <label class="" for="type">Publication Status</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                            <option class="form-control" label="Choose one" disabled selected></option>
                                            <option value="1" {{$deliveryBoy->status == 1 ? 'selected':''}}>Active</option>
                                            <option value="0" {{$deliveryBoy->status == 0 ? 'selected':''}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="radio" class="col-md-3 form-label"></label>
                                    <div class="col-md-9">
                                        <button class="btn btn-primary" type="submit">Update Delivery Boy Info</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
        </div><!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->
@endsection


