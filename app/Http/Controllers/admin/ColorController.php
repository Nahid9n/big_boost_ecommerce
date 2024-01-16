<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.color.index',[
            'colors'=>Color::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.color.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required | unique:colors,name|max:255',
            'code'=>'required | unique:colors,code',
        ],[
            'name.required'=>'Color Name Required',
            'name.unique'=>'Already Have This Color',
            'code.required'=>'Color Short Code Is Required',
            'code.unique'=>'Already Have This Color Code',
        ]);
        Color::createColor($request);
        return back()->with('message','Color create success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('admin.product.color.edit',[
            'color'=>Color::find($color->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $this->validate($request,[
            'name'=> Rule::unique('colors')->ignore($color->id),
            'code'=> Rule::unique('colors')->ignore($color->id),
        ],[
            'name.required'=>'Color Name Required',
            'name.unique'=>'Already Have This Color',
            'code.required'=>'Color Short Code Is Required',
            'code.unique'=>'Already Have This Color Code',
        ]);
        Color::updateColor($request,$color->id);
        return redirect()->route('colors.index')->with('message','update color info success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        Color::deleteColor($color->id);
        return back()->with('message','delete color success');
    }
}
