@extends('admin.master')
@section('title','Color page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Color Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Color</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Color</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Update Color</h3>
                </div>
                <div class="text-end">
                    <a href="{{route('colors.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Color</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('colors.update',$color->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Color Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" value="{{$color->name}}" name="name" placeholder="Enter your Color name" type="text">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name'):''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="code" class="col-md-3 form-label">Color Code</label>
                            <div class="col-md-9">
                                <input class="form-control" id="colorCode" name="code" value="{{$color->code}}" onkeyup="ColorCode(this)" placeholder="Color Code" type="color"/>
                                <input class="form-control" readonly value="{{$color->code}}" id="code" placeholder="Enter Short Color Code" type="text">
                            </div>
                        </div>

                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{$color->status == 1 ? 'selected':''}}>Active</option>
                                    <option value="0" {{$color->status == 0 ? 'selected':''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection



