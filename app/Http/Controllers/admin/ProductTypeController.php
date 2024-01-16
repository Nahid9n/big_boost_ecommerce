<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.product-type.index',[
            'productTypes'=>ProductType::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.product-type.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required | unique:product_types,name|max:255',
        ],[
            'name.required'=>'product type Name Required',
            'name.unique'=>'Already Have This product type',
        ]);
        ProductType::newProductType($request);
        return redirect('admin/product-type')->with('message','product type create success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductType $productType)
    {
        return view('admin.product.product-type.edit',[
            'product_type'=>ProductType::find($productType->id),

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductType $productType)
    {
        ProductType::updateProductType($request,$productType->id);
        return redirect('admin/product-type')->with('message','update product type info success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $productType)
    {
        ProductType::deleteProductType($productType->id);
        return back()->with('message','delete product type success');
    }
}
