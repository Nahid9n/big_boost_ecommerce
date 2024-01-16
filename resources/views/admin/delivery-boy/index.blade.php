@extends('admin.master')
@section('title','Manage Delivery Boy Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Delivery Boy Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Delivery Boy</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom py-5">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="fw-bold text-end">Delivery Boy Table</h3>
                        </div>
                        <div class="col-5 text-end me-1">
                            <a href="{{route('delivery-boy.create')}}" class="btn text-dark px-5 btn-success">Add Delivery Boy</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Designation</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deliveryBoys as $deliveryBoy)
                                <tr class="text-center">
                                    <td><img width="120" height="100" src="{{asset($deliveryBoy->image)}}" alt=""></td>
                                    <td>{{$deliveryBoy->name}}</td>
                                    <td>{{$deliveryBoy->designation}}</td>
                                    <td>{{$deliveryBoy->status == 1 ? 'published':'unpublished'}}</td>
                                    <td class="text-center">
                                        <a href="{{route('delivery-boy.show',$deliveryBoy->id)}}" class="btn btn-primary mb-1"><i class="fa fa-regular fa-eye"></i></a>
                                        <a href="{{route('delivery-boy.edit',$deliveryBoy->id)}}" class="btn btn-primary mb-1"><i class="fa fa-regular fa-edit"></i></a>
                                        <form action="{{ route('delivery-boy.destroy', $deliveryBoy->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('are you sure to delete ?')" class="btn btn-danger"><i class="fa fa-regular fa-trash"></i></button>
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

