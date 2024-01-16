@extends('admin.master')
@section('title','Order Invoice Page')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Invoice-Details</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Apps</li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Invoices</a></li>
                <li class="breadcrumb-item active" aria-current="page">Invoice Details</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-start">
                            <h3 class="card-title mb-0">#INV-{{$order->id}}</h3>
                        </div>
                        <div class="float-end">
                            <h3 class="card-title">Date: {{$order->order_date}}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4 ">
                            <p class="h3">Customer Info</p>
                            <address>
                                {{$order->customer->name}}<br>
                                {{$order->phone}}<br>
                                {{$order->delivery_address}}<br>
                                {{$order->customer->email}}
                            </address>
                        </div>
                        <div class="col-lg-4">
                            <img src="{{asset('/')}}uploads/website-details/logo/logo.png" alt="">
                        </div>
                        <div class="col-lg-4 text-end">
                            <p class="h3">Payment Info </p>
                            <address>
                                 {{$order->payment_method}}<br>
                                {{$order->payment_date}}<br>
                                {{$order->payment_status}}<br>
                                <br>
                            </address>
                        </div>
                    </div>
                    <div class="table-responsive export-table push">
                        <table class="table table-bordered table-hover mb-0 text-nowrap border-bottom">
                            <tbody><tr class=" ">
                                <th class="text-center"></th>
                                <th>Item</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-end">Unit Price</th>
                                <th class="text-end">Sub Total</th>
                            </tr>
                            @php($sum = 0)
                            @foreach($order->OrderDetails as $item)
                            <tr>
                                <td class="text-center">1</td>
                                <td>
                                    <p class="font-w600 mb-1">{{$item->product_name}}</p>
                                    <div class="text-muted"><div class="text-muted">doloremque laudantium unde ut perspiciatis  omnis iste natus voluptatem accusantium Sed error sit </div></div>
                                </td>
                                <td class="text-center">{{$item->product_qty}}</td>
                                <td class="text-end">{{$item->product_price}}</td>
                                <td class="text-end">{{$subtotal = $item->product_qty * $item->product_price}}</td>
                            </tr>
                            @php($sum = $sum + $subtotal)
                            @endforeach
                            <tr>
                                <td colspan="4" class="fw-bold text-uppercase text-end">Net Total</td>
                                <td class="fw-bold text-end h4">{{$sum}} .Tk</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="fw-bold text-uppercase text-end">Tax Total</td>
                                <td class="fw-bold text-end h4">{{$order->tax_total}} .Tk</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="fw-bold text-uppercase text-end">Shipping Total</td>
                                <td class="fw-bold text-end h4">{{$order->shipping_total}} .Tk</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="fw-bold text-uppercase text-end">Total Payable</td>
                                <td class="fw-bold text-end h4">{{$sum + $order->tax_total + $order->shipping_total }} .Tk</td>
                            </tr>
                            </tbody></table>
                    </div>
                </div>
                <div class="card-footer text-end">
{{--                    <button type="button" class="btn btn-primary mb-1" onclick="javascript:window.print();"><i class="si si-wallet"></i> Pay Invoice</button>--}}
                    <button type="button" class="btn btn-success mb-1" onclick="javascript:window.print();"><i class="si si-paper-plane"></i> Send Invoice</button>
                    <button type="button" class="btn btn-info mb-1" onclick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->

@endsection
