<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryBoy;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DeliveryBoyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.delivery-boy.index',[
            'deliveryBoys'=>DeliveryBoy::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.delivery-boy.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required | max:255',
            'mobile'=>'required|unique:delivery_boys,mobile',
            'image'=>'required',
            'email'=>'unique:delivery_boys,email',
            'gender'=>'required',
        ],[
            'name.required'=>'name field is required',
            'mobile.required'=>'mobile field is required',
            'mobile.unique'=>'this mobile number is already have',
            'image.required'=>'image field is required',
            'email.unique'=>'this email is already have',
            'gender.required'=>'gender field is required',
        ]);
        DeliveryBoy::addDeliveryBoy($request);
        return back()->with('message','Add Delivery Boy info Success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryBoy $deliveryBoy)
    {
        return view('admin.delivery-boy.show',[
            'deliveryBoy'=>$deliveryBoy,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryBoy $deliveryBoy)
    {
        return view('admin.delivery-boy.edit',[
            'deliveryBoy'=>DeliveryBoy::find($deliveryBoy->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeliveryBoy $deliveryBoy)
    {
        $this->validate($request,[
            'name'=>'required | max:255',
            'mobile'=>Rule::unique('delivery_boys')->ignore($deliveryBoy->id),
            'email'=> Rule::unique('delivery_boys')->ignore($deliveryBoy->id),
            'gender'=>'required',
        ],[
            'name.required'=>'name field is required',
            'mobile.required'=>'mobile field is required',
            'mobile.unique'=>'this mobile number is already have',
            'email.unique'=>'this email is already have',
            'gender.required'=>'gender field is required',
        ]);
        DeliveryBoy::updateDeliveryBoy($request,$deliveryBoy->id);
        return redirect('admin/delivery-boy')->with('message','update delivery boy info successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryBoy $deliveryBoy)
    {
        DeliveryBoy::deleteDeliveryBoy($deliveryBoy->id);
        return back()->with('message','Delivery Boy info delete Successfully.');
    }

    public function updateProfile(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required | max:255',
            'mobile'=>Rule::unique('delivery_boys')->ignore($id),'required',
            'email'=> Rule::unique('delivery_boys')->ignore($id),
            'gender'=>'required',
        ],[
            'name.required'=>'name field is required',
            'mobile.required'=>'mobile field is required',
            'mobile.unique'=>'this mobile number is already have',
            'email.unique'=>'this email is already have',
            'gender.required'=>'gender field is required',
        ]);
        DeliveryBoy::updateDeliveryBoy($request,$id);
        return back()->with('message','update delivery boy info successfully.');
    }

    public function paymentHistory(){
        return view('admin.delivery-boy.payment-history',[
            'deliveryBoys'=>DeliveryBoy::all(),
        ]);
    }

    public function collectedHistory(){
        return view('admin.delivery-boy.collected-history',[
            'deliveryBoys'=>DeliveryBoy::all(),
        ]);
    }
    public function cancel(){
        return view('admin.delivery-boy.cancel-requests',[
            'deliveryBoys'=>DeliveryBoy::all(),
        ]);
    }
}
