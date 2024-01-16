@extends('admin.master')
@section('title','Product page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Seller Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Seller</a></li>
                <li class="breadcrumb-item active" aria-current="page">Seller Module</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="">
                            <h3 class="card-title">All Seller Table</h3>
                        </div>
                        <div class="text-end">
                            <a href="{{route('seller.create')}}" class="btn btn-success my-1 float-end text-center"><span>+</span><i class="fa fa-user-o"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Full Name</th>
                                <th class="border-bottom-0">Status </th>
                                <th class="border-bottom-0">Gender</th>
                                <th class="border-bottom-0">Phone</th>
                                <th class="border-bottom-0">Shop Name </th>
                                <th class="border-bottom-0">Added </th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                @endphp
                            @foreach($sellers as $sellerId => $seller)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$seller->full_name ?? "N/A"}}</td>
                                    <td>{{$seller->status == 1 ? "Active" : "Inactive"}}</td>
                                    <td>{{$seller->gender ?? "N/A"}}</td>
                                    <td>{{$seller->phone ?? "N/A"}}</td>
                                    <td>{{$seller->shop_name ?? "N/A"}}</td>
                                    <td>{{$seller->added_by ?? "N/A"}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('seller.show', $seller->id)}}" class="btn btn-success btn-sm me-1">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('seller.edit', $seller->id)}}" class="btn btn-success btn-sm me-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('seller.delete', $seller->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
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

@endsection


