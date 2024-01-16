@extends('admin.master')
@section('title','All Customer page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">All Customer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">All Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Customer Module</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="">
                            <h3 class="card-title">All Customer Table</h3>
                            <hr>
                        </div>
                        <div class="text-end">
                            <a href="{{route('customers.create')}}" class="btn btn-success my-1 float-end text-center">Create New customer</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                            <tr class="text-center">
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr class="text-center">
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td class="justify-content-center d-flex">
                                    <form action="{{route('admin.login.as.customer',$customer->id)}}" method="post">
                                        @csrf
                                        <input hidden type="email" name="email" value="{{$customer->email}}">
                                        <button type="submit" onclick="return confirm('are you sure to login as customer ? ')" class="btn btn-primary mx-1 my-2">Login</button>
                                    </form>
                                    <a href="{{route('customers.edit',$customer->id)}}" class="btn btn-success my-2 me-2"><i class="fa fa-edit"></i></a>
                                    <form action="{{route('customers.destroy',$customer->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-danger my-2"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection


