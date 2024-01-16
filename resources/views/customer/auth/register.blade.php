@extends('website.layout.app')
@section('title','Customer Login')

@section('body')

    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="title pt-0">create account</h3>
                    <div class="theme-card">
                        <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                        <form class="theme-form" action="{{route('customer.register')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">User Name</label>
                                    <input type="text" class="form-control" id="fname" name="name" placeholder="First Name" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="review">Password</label>
                                    <input type="text" class="form-control" name="password" id="lname" placeholder="Last Name" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Enter your password" required="">
                                </div>
                                <button type="submit" class="btn btn-solid w-auto">create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

@endsection
