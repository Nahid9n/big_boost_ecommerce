@extends('website.layout.app')
@section('title','Customer Login')

@section('body')

    <!--section start-->
    <section class="login-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="title">Login</h3>
                    <div class="theme-card">
                        <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                        <form class="theme-form" action="{{route('customer.login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <label for="review">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter your password" required="">
                            </div><button type="submit" class="btn btn-solid">Login</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 right-login">
                    <h3 class="title">New Customer</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font"><a href="">Create A Account</a></h6>
                        <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be able to order from our shop. To start shopping click register.</p><a href="#" class="btn btn-solid">Create an Account</a></div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

@endsection
