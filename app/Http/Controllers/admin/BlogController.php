<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogImage;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $blog,$images,$fileName,$extension;
    public function index()
    {
        return view('admin.blog.index',[
            'blogs'=>Blog::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.add',[
            'blogCategories'=>BlogCategory::where('status',1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required | max:255',
//            'banner'=>'dimensions:width=500,height=500','mimes:jpg,png,jpeg,gif,svg','max:2048',
        ],[
            'name.required'=>'Blog Title Required',
//            'banner.dimensions'=>'image Must Be Width 500 & Height : 500',
//            'banner.mimes'=>'image Must Be jpg,png,jpeg,gif,svg',
//            'banner.max'=>'image Maximum 2048',
        ]);

        $this->blog = Blog::newBlog($request);
        if ($request->other_images)
        {
            BlogImage::newBlogImage( $request->other_images, $this->blog->id);
        }
        return back()->with('message','blog post info save successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.show',[
            'blog'=>$blog,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit',[
            'blog'=>Blog::find($blog->id),
            'blogCategories'=>BlogCategory::where('status',1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request,[
            'title'=>'required | max:255',
//            'banner'=>'dimensions:width=500,height=500','mimes:jpg,png,jpeg,gif,svg','max:2048',
        ],[
            'name.required'=>'Blog Title Required',
//            'banner.dimensions'=>'image Must Be Width 500 & Height : 500',
//            'banner.mimes'=>'image Must Be jpg,png,jpeg,gif,svg',
//            'banner.max'=>'image Maximum 2048',
        ]);
        Blog::updateBlog($request,$blog->id);
        if ($request->other_images)
        {
            BlogImage::updateBlogImage( $request->other_images, $blog->id);
        }
        return redirect('admin/blogs')->with('message','update blog info success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Blog::deleteBlog($blog->id);
        return back()->with('message','delete blog post success.');
    }
}
