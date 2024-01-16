@extends('admin.master')
@section('title','Manage Order page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Seller Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Seller Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Seller Order Module</li>
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
                            <h3 class="card-title">Seller Orders Table</h3>
                        </div>
                        <div class="text-end">
                            <a href="{{route('blogs.create')}}" class="btn btn-success my-1 float-end text-center">Create New Blog Post</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                            <tr>
                                <th class="border-bottom-0">Thumbnail</th>
                                <th class="border-bottom-0">Title</th>
                                <th class="border-bottom-0">Category</th>
                                <th class="border-bottom-0">Short Description</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td><img src="{{asset($product->image)}}" width="100" height="80" alt=""></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name ?? 'No Category'}}</td>
                                    <td>{{$product->short_description}}</td>
                                    <td>{{$product->status == 1 ? 'active':'Inactive'}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('blogs.edit',$product->id)}}" class="btn btn-success mx-2"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('blogs.destroy',$product->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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


