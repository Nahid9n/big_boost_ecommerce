@extends('admin.master')
@section('title','Manage Order page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Blog Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Order Module</li>
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
                            <h3 class="card-title">Orders Table</h3>
                        </div>
                        <div class="text-end">
                            <a href="{{route('orders.index')}}" class="btn btn-success my-1 float-end text-center">All Orders</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                            <tr>
                                <th class="border-bottom-0">order</th>
                                <th class="border-bottom-0">order total</th>
                                <th class="border-bottom-0">Customer</th>
                                <th class="border-bottom-0">Order Date</th>
                                <th class="border-bottom-0">Order Status</th>
                                <th class="border-bottom-0"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($sum = 0)
                            @foreach($orders as $order)
                                <tr class="{{$order->order_status == 'Pending' ? 'bg-warning':'' }} {{$order->order_status == 'Processing' ? 'bg-info text-white':'' }}{{$order->order_status == 'Complete' ? 'bg-success text-dark':'' }}{{$order->order_status == 'Cancel' ? 'bg-danger text-white':'' }} ">
                                    <td>#{{$order->id}}</td>
                                    <td>{{$order->order_total}}</td>
                                    <td>{{isset($order->customer->name)|| isset($order->phone) ? $order->customer->name.'('.$order->phone.')' : ''}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td class="d-flex justify-content-center bg-white">
                                        <a href="{{route('orders.show', $order->id)}}" class="btn btn-info btn-sm me-1" title="View Order Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('orders.edit', $order->id)}}" class="btn btn-success-gradient btn-sm me-1" title="Edit Order">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('order.invoice-show',['id'=>$order->id])}}" class="btn btn-primary btn-sm me-1 {{$order->order_status == 'Pending'? 'disabled' :''}} {{$order->order_status == 'Processing'? 'disabled' :''}} "  title="View Order Invoice">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="" target="_blank" class="btn btn-warning-gradient btn-sm me-1" title="Downlod Order Invoice">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <form action="{{route('orders.destroy', $order->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger btn-sm {{$order->order_status == 'Complete' ? 'disabled' : ''}}"  onclick="return confirm('Are you sure to delete this');">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @php($sum = $sum + $order->order_total)
                            @endforeach
                                <tr>
                                    <td></td>
                                    <td>Total : {{$sum}} .Tk</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection


