<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.units.index',[
            'units'=>Unit::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.units.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required | unique:units,name|max:255',
        ],[
            'name.required'=>'Unit Name Required',
            'name.unique'=>'Already Have This Unit',
        ]);
        Unit::createUnit($request);
        return back()->with('message','Unit create success.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('admin.product.units.edit',[
            'unit'=>Unit::find($unit->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $this->validate($request,[
            'name'=>Rule::unique('units')->ignore($unit->id),'max:255',
        ],[
            'name.required'=>'Unit Name Required',
            'name.unique'=>'Already Have This Unit',
        ]);
        Unit::updateUnit($request,$unit->id);
        return redirect('admin/units')->with('message','update unit info success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        Unit::deleteUnit($unit->id);
        return back()->with('message','delete unit success');
    }
}
