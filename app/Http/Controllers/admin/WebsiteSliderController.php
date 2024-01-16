<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSlider;
use Illuminate\Http\Request;

class WebsiteSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slider.index',[
            'sliders'=>WebsiteSlider::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
        ],[
            'title.required'=>'title Required',
        ]);
            WebsiteSlider::newSlider($request);
            return back()->with('message','Create Slider Info Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(WebsiteSlider $websiteSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return view('admin.slider.edit',[
            'slider'=>WebsiteSlider::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id )
    {
        WebsiteSlider::updateSlider($request,$id);
        return redirect('admin/slider')->with('message','Update Slider Info Success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        WebsiteSlider::deleteSlider($id);
        return back()->with('message','Delete Slider Info Success.');
    }
}
