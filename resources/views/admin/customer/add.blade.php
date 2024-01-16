@extends('admin.master')
@section('title','Customer Module')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Customer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Customer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create New Customer</h3>
                </div>
                <div class="text-end">
                    <a href="{{route('customers.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Customer</a>
                </div>
                <div class="card-body">
                    <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Customer Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" required value="{{old('name')}}" name="name" placeholder="Enter your Customer name" type="text">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="email" name="email"/>
                                <span class="text-danger">{{$errors->has('email') ? $errors->first('email'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="password" class="col-md-3 form-label">Password</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('password')}}" id="password" name="password" placeholder="Enter Password" type="password">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="confirm_password" class="col-md-3 form-label">Confirm Password</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('confirm_password')}}" id="confirm_password" name="confirm_password" placeholder="Enter password Again" type="password">
                            </div>
                        </div>
                        <button class="btn btn-primary px-4" type="submit">Create Customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection


