@extends('admin.master')
@section('title','Blog Post page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Blog Post Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Blog Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog Post Module</li>
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
                            <h3 class="card-title">Blog Post Table</h3>
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
                                <th class="border-bottom-0">Banner</th>
                                <th class="border-bottom-0">Title</th>
                                <th class="border-bottom-0">Category</th>
                                <th class="border-bottom-0">Short Description</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                <td><img src="{{asset($blog->banner)}}" width="100" height="80" alt=""></td>
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->category->name ?? 'No Category'}}</td>
                                <td>{{$blog->short_description}}</td>
                                <td>{{$blog->status == 1 ? 'active':'Inactive'}}</td>
                                <td class="d-flex">
                                    <a href="{{route('blogs.edit',$blog->id)}}" class="btn btn-success mx-2"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('blogs.show',$blog->id)}}" class="btn btn-success mx-2"><i class="fa fa-eye"></i></a>
                                    <form action="{{route('blogs.destroy',$blog->id)}}" method="post">
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


