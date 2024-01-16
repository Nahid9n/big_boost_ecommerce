@extends('admin.master')
@section('body')
    <div class="row">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title"> Type Table</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive export-table">
                            <table id="editable-file-datatable"
                                class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Auction Product Type Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_types as $id => $type)
                                        <tr>
                                            <td>{{ ++$id }}</td>
                                            <td>{{ $type->name }}</td>
                                            <td>{{ $type->description }}</td>
                                            <td>{{ $type->staus ? "inactive" : "active"}}</td>

                                            <td class="d-flex ">
                                                <a class="btn btn-info btn-sm me-1" href="{{ route('whole-sale-product-type.show',$type->id) }}"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-warning btn-sm me-1" href="{{ route('whole-sale-product-type.edit',$type->id) }}"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('whole-sale-product-type.delete',$type->id) }}" method="post">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm me-1" type="submit"><i class="fa fa-trash"></i></button>
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
    </div>
@endsection
