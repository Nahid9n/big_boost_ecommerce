<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $timeout = 3000 ;
    private $category;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.category.index',[
            'categories'=>Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.category.add',[
            'productTypes'=>ProductType::where('status',1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required | unique:categories,name|max:255',
            'type_id'=>'required',
//            'banner'=>'dimensions:width=100,height=100',
//            'icon'=>'dimensions:width=32,height=32',
//            'cover'=>'dimensions:width=360,height=360',
        ],[
            'name.required'=>'Category Name Required',
            'name.unique'=>'Already Have This Category',
            'type_id.required'=>'Type Is Required',
//            'banner.dimensions'=>'Image Must Be Width 100 & Height : 100',
            'icon.dimensions'=>'Image Must Be Width 32 & Height : 32',
            'cover.dimensions'=>'Image Must Be Width 360 & Height : 360',
        ]);

        Category::newCategory($request);
        return redirect('admin/categories')->with('message','category create success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.product.category.edit',[
            'category'=>Category::find($category->id),
            'productTypes'=>ProductType::where('status',1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'type_id'=>'required',
//            'banner'=>'dimensions:width=100,height=100',
//            'icon'=>'dimensions:width=32,height=32',
//            'cover'=>'dimensions:width=360,height=360',
        ],[
            'type_id.required'=>'Type Is Required',
//            'banner.dimensions'=>'Image Must Be Width 100 & Height : 100',
//            'icon.dimensions'=>'Image Must Be Width 32 & Height : 32',
//            'cover.dimensions'=>'Image Must Be Width 360 & Height : 360',
        ]);
        $this->category = Category::updateCategory($request,$category->id);
        return redirect('admin/categories')->with('message','update category info success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::deleteCategory($category->id);
        return back()->with('message','delete category success');
    }
}
