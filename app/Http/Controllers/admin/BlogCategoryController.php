<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog.category.index',[
            'categories'=>BlogCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required | unique:blog_categories,name|max:255',
        ],[
            'name.required'=>'Category Name Required',
            'name.unique'=>'Already Have This Category Name',
        ]);
        BlogCategory::newBlogCategory($request);
        return back()->with('message','Blog Category create success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog.category.edit',[
            'blogCategory'=>BlogCategory::find($blogCategory->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        BlogCategory::updateBlogCategory($request,$blogCategory->id);
        return redirect('admin/blog_categories')->with('message','update Blog Category info success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        BlogCategory::deleteBlogCategory($blogCategory->id);
        return back()->with('message','delete Blog Category success');
    }
}
