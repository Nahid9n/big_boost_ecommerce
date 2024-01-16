@extends('admin.master')
@section('title', 'Create Auction Product ')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Whole Sale Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Whole Sale Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Whole Sale Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create Whole Sale Product Form</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('whole-sale-product-type.store') }}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">WholeSaleProductType</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('name') }}" name="name" id="code"
                                    placeholder="WholeSaleProductType" type="text" />

                            </div>
                        </div>
                         <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="short_description" placeholder="Description" ></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label"> Status</label>
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
