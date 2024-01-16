<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    private $timeout = 3000;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.brand.index',[
            'brands'=>Brand::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required | unique:brands,name|max:255',
            'logo'=>'dimensions:width=120,height=80',
        ],[
            'name.required'=>'Brands Name Required',
            'name.unique'=>'Already Have This Brand',
            'logo.dimensions'=>'Logo Must Be Width 120 & Height : 80',
        ]);
        Brand::newBrand($request);
        return redirect('admin/brands')->with('message','Brand create success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.product.brand.edit',[
            'brand'=>Brand::find($brand->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request,[
            'name'=> Rule::unique('brands')->ignore($brand->id),'required max:255',
            'logo'=>'dimensions:width=120,height=80',
        ],[
            'logo.dimensions'=>'Logo Must Be Width 120 & Height : 80',
            'name.unique'=>'Already Have This Brand',
        ]);
        Brand::updateBrand($request,$brand->id);
        return redirect('admin/brands')->with('message','update brand info success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        Brand::deleteBrand($brand->id);
        return back()->with('message','delete brand success');
    }
}
