@extends('admin.master')
@section('title', 'Create Auction Product ')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Seller Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Seller</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Seller</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create Seller Form</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('seller.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-4">
                            <label for="first_name" class="col-md-3 form-label">First Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('first_name') }}" name="first_name" id="first_name"
                                    placeholder="First Name" type="first_name" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="last_name" class="col-md-3 form-label">Last Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('last_name') }}" name="last_name" id="first_name"
                                    placeholder="Last Name" type="text" />
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('email') }}" name="email" id="email"
                                    placeholder="x@gmail.com" type="email" />

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password" class="col-md-3 form-label">Password </label>
                            <div class="col-md-9">
                                <input class="form-control" id="password" name="password" placeholder="password"
                                    type="password" value="{{ old('password') }}"  />
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label for="dob" class="col-md-3 form-label">Date of Birth </label>
                            <div class="col-md-9">
                                <input class="form-control" id="dob" name="dob" type="date"
                                    value="{{ old('dob') }}" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="gender" class="col-md-3 form-label">Gender </label>
                            <div class="col-md-9">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="phone" class="col-md-3 form-label">Phone Number </label>
                            <div class="col-md-9">
                                <input class="form-control" id="phone" name="phone" type="phone"
                                    value="{{ old('phone') }}" placeholder="+088" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="join_date" class="col-md-3 form-label">Join Date </label>
                            <div class="col-md-9">
                                <input class="form-control" id="join_date" name="join_date" type="date"
                                    value="{{ old('join_date') }}" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="salary" class="col-md-3 form-label">Shop Name </label>
                            <div class="col-md-9">
                                <input class="form-control" id="salary" name="shop_name" type="text"
                                    value="{{ old('shop_name') }}" placeholder="Shop Name" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="dropify" data-height="200" />

                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="address" class="col-md-3 form-label"> Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="address" id="address" placeholder="Address"></textarea>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Status</label>
                            <div class="col-md-9 pt-3">
                                <select name="status" id="" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
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
