@extends('admin.master')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title"> Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);"> Prodcuts </a></li>
                <li class="breadcrumb-item active" aria-current="page">  Products</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title"> Prodcut Details</h3>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-hover">
                         <tr>
                            <th> Product </th>
                            <th>{{ $product_type->name ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th> Product Type</th>
                            <th>{{ $product_type->description ?? "N/A"}}</th>
                        </tr>
                          <tr>
                            <th>Status</th>
                            <th>{{ $product_type->status ?  "active" : "inactive"}}</th>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
