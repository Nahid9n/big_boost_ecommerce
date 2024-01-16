@extends('admin.master')
@section('title','Manage Slider Details Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Website Details Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Slider Details</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom py-5">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <h3 class="fw-bold text-center">Slider Details Table</h3>
                        </div>
                        <div class="col-5 text-end me-1">
                            <a href="{{route('slider.create')}}" class="btn text-dark px-5 btn-success">Create New Slider</a>
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
                                <th class="border-bottom-0">Banner</th>
                                <th class="border-bottom-0">Title</th>
                                <th class="border-bottom-0">Meta</th>
                                <th class="border-bottom-0">Meta Description</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr class="text-center">
                                    <td><img width="120" height="100" src="{{asset($slider->image)}}" alt="no image"></td>
                                    <td><img width="120" height="100" src="{{asset($slider->banner)}}" alt="no banner"></td>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->meta}}</td>
                                    <td>{{$slider->meta_description}}</td>
                                    <td>{{$slider->status == 1 ? 'Active':'Inactive'}}</td>
                                    <td class="text-center">
                                        <a href="{{route('slider.show',$slider->id)}}" class="btn btn-primary mb-1"><i class="fa fa-regular fa-eye"></i></a>
                                        <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-primary mb-1"><i class="fa fa-regular fa-edit"></i></a>
                                        <form action="{{ route('slider.destroy', $slider->id) }}" method="post">
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

