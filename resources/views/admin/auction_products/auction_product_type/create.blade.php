@extends('admin.master')
@section('title', 'Create Auction Product ')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Auction Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Action-Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Acution-Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create Auction-Product Form</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('auction.product.type.store') }}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Auction Product Type</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('auction_product_type') }}" name="auction_product_type" id="code"
                                    placeholder="Type Name" type="text" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Auction Product Description</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('description') }}" name="description"
                                    placeholder="Description" type="text" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Auction Product Status</label>
                            <div class="col-md-9">
                               <select name="status" class="form-control" id="">
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
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
